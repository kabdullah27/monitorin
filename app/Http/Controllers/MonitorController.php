<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;


class MonitorController extends Controller
{
    public function index(): View
    {
        $title = 'Monitor';

        return view('monitor.index', compact('title'));
    }
}
