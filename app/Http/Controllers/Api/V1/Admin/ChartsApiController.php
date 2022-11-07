<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Acamposm\Ping\Ping;
use Acamposm\Ping\PingCommandBuilder;
use Illuminate\Http\Request;

class ChartsApiController extends Controller
{
    public function index(Request $request)
    {
        $command = (new PingCommandBuilder($request->link))->count(1);

        $data = (new Ping($command))->run()->latency;

        return response()->json(compact('data'));
    }
}