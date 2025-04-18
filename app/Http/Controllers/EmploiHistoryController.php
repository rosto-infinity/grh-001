<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmploiHistoryRequest;
use App\Models\Emploi;
use App\Models\EmploiHistory;
use App\Models\User;
use Illuminate\Http\Request;

class EmploiHistoryController extends Controller
{
    public function index()
    {
        // Re
        $emploiHistories = EmploiHistory::with(['user','emploi'])
                                         ->latest()
                                         ->paginate(2);
    
        return view('admin.emplois_histories.list', compact('emploiHistories'));
    }
    public function create()
{
    //  3-$users   = User::all();

    $users   = User::pluck('name', 'id');
    $emplois = Emploi::pluck('emploi_title', 'id');
    return view('admin.emplois_histories.add', compact('users', 'emplois'));
}
public function store(EmploiHistoryRequest $request)
{
    EmploiHistory:: create($request ->validated());

    return redirect()->route('admin.emplois_histories')->with('success', 'emplois_histories ajouté avec succès.');
}

    
}
