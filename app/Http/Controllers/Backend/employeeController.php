<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index()
    {
        return view('Backend.employee.index');
    }
}
