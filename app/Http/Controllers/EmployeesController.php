<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
// use App\Http\Requests\EmployeeRequest;

class EmployeesController extends Controller
{
    
    public function index(Request $request)
    {
        $employees = User::paginate(4);

        return view('admin.employees.list', compact('employees'));
    }
    /**
     * Summary of add
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function add(Request $request)
    {
        return view('admin.employees.add');
    }
    /**
     * Summary of store
     * @param \App\Http\Requests\EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        // 1. Validate the request
        User::create($request->validated());
    
        // 3. Redirect or return a response
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
