<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class widgetController
{
    public function index()
    {
        return view('backend.widget.index');
    }
}
