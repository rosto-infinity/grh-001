<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.employees.list');
    }

    public function add(Request $request)
    {
        return view('admin.employees.add');
    }
    public function store(Request $request)
    {
        // 2Validate the request data
        $userData = $request->validate([
            'name'          => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'phone_number'  => 'required',
            'hire_date'     => 'required|date',
            'job_id'        => 'required',
            'salary'        => 'required|numeric',
            'commission_pct' => 'required|numeric',
            'manager_id'    => 'required',
            'departement_id' => 'required',
        ]);
    //  dd($userData);
        // 4Create a new employee record
        User::create($userData);

        // 2-Redirect or return a response
        return redirect()->route('admin.employees')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        // Fetch the employee data by ID
        return view('admin.employees.edit', compact('id'));
    }
    public function update(Request $request, $id)
    {
        // 3Validate and update the employee data

        // 5--Redirect or return a response
        return redirect()->route('admin.employees')->with('success', 'Employee updated successfully.');
    }
    public function delete($id)
    {
        //6- Delete the employee by ID
        // 7Redirect or return a response
        return redirect()->route('admin.employees')->with('success', 'Employee deleted successfully.');
    }
}
