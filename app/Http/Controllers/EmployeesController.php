<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeesController extends Controller
{

    
    public function index(Request $request)
    {
        // Utilisation de la méthode filter du modèle Employees
        $employeesQuery = User::filter($request);
    
        // Pagination
        $employees = $employeesQuery->paginate(4);
    
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
    public function view($id)
    {
        // 2. Fetch the employee data by ID
        $employee = User::findOrFail($id); // Find or fail
    
        return view('admin.employees.view', compact('employee'));
    }

    public function edit($id)
{
    // 3-Récupérer l'employé par ID
    $employee = User::findOrFail($id);

    // Retourner la vue avec les données de l'employé
    return view('admin.employees.edit', compact('employee'));
}

public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $id,
        // Ajoutez d'autres règles de validation selon vos besoins
    ]);

    // Récupérer l'employé par ID
    $employee = User::findOrFail($id);

    // Mettre à jour les informations de l'employé
    $employee->name = $request->input('name');
    $employee->email = $request->input('email');
    // Ajoutez d'autres champs à mettre à jour selon vos besoins

    // Sauvegarder les changements
    $employee->save();

    // Rediriger avec un message de succès
    return redirect()->route('admin.employees.index')->with('success', 'Employé mis à jour avec succès.');
}

    public function destroy($id)
{
    // 6 - Supprimer l'employé par ID
    $employee = User::findOrFail($id); // Trouver l'employé ou échouer
    $employee->delete(); // Supprimer l'employé

    // 7 - Rediriger ou retourner une réponse
    return redirect()->route('admin.employees')->with('success', 'Employee deleted successfully.');
}

}
