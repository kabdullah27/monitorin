<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Laravolt\Epicentrum\Contracts\Requests\Account\Delete;
use Laravolt\Epicentrum\Contracts\Requests\Account\Store;
use Laravolt\Epicentrum\Mail\AccountInformation;
use Laravolt\Epicentrum\Repositories\RepositoryInterface;
use Laravolt\Platform\Models\User;
use Laravolt\Support\Contracts\TimezoneRepository;

class UserController extends Controller
{
    use AuthorizesRequests;

    protected RepositoryInterface $repository;

    protected TimezoneRepository $timezone;

    /**
     * UserController constructor.
     *
     * @param \Laravolt\Epicentrum\Repositories\RepositoryInterface $repository
     * @param \Laravolt\Support\Contracts\TimezoneRepository        $timezone
     */
    public function __construct(RepositoryInterface $repository, TimezoneRepository $timezone)
    {
        $this->repository = $repository;
        $this->timezone = $timezone;
    }

    /**
     * Display a listing of the resource.
     *
     * @throws \Exception
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $statuses = $this->repository->availableStatus();
        $roles = app('laravolt.epicentrum.role')->all()->pluck('name', 'id');
        $multipleRole = config('laravolt.epicentrum.role.multiple');
        $timezones = $this->timezone->all();

        return view('users.create', compact('statuses', 'roles', 'multipleRole', 'timezones'));
    }

    /**
     * Store the specified resource.
     *
     * @param Store $request
     *
     * @return Response
     */
    public function store(Store $request)
    {
        $this->authorize('create', User::class);

        // save to db
        $roles = $request->get('roles', []);
        $user = $this->repository->createByAdmin($request->all(), $roles);
        $password = $request->get('password');

        // send account info to email
        if ($request->has('send_account_information')) {
            Mail::to($user)->send(new AccountInformation($user, $password));
        }

        return redirect()->route('users.index')->withSuccess(trans('laravolt::message.user_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return redirect(route('account.edit', $id));
    }

    public function destroy(Delete $request, $id)
    {
        try {
            $this->repository->delete($id);

            return redirect(route('users.index'))->withSuccess(trans('laravolt::message.user_deleted'));
        } catch (QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function importView(Request $request)
    {
        return view('importFile');
    }

    public function import(Request $request)
    {
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
