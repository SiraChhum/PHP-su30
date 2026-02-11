<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class formController
{
    public function index ()
    {
        return view ('backend.form.index');
    }
}
