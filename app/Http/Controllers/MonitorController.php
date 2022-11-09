<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use App\Models\MtWebsite;


class MonitorController extends Controller
{
    public function index(): View
    {
        $title = 'Monitor';

        $websites = MtWebsite::where('is_active', true)->get();

        return view('monitor.index', compact('title', 'websites'));
    }
}
