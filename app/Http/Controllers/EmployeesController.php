<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.employees.list');
    }
}
