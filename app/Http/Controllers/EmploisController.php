<?php

namespace App\Http\Controllers;

use App\Models\Emplois;
use Illuminate\Http\Request;

class EmploisController extends Controller
{
    public function index(Request $request)
    {
        // 1-Utilisation de la méthode filter du modèle Employees
        $emplois = Emplois::all();
    
        // 2-Pagination
        // $employees = $employeesQuery->paginate(4);
    
        return view('admin.emplois.list', compact('emplois'));
    }
    
}
