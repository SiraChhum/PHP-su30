<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class EmployeeController
{
    public function index()
    {
        return view('backend.employee.index');
    }
}
