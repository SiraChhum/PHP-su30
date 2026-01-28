<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class DashboardController
{
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
