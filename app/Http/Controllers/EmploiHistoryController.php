<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmploiHistoryRequest;
use App\Models\Emploi;
use App\Models\EmploiHistory;
use App\Models\User;
use Illuminate\Http\Request;

class EmploiHistoryController extends Controller
{
    public function index(Request $request)
    {
        // 1-. Listes pour les selects
        $users   = User::pluck('name', 'id');               // -ne charge que id et name :contentReference[oaicite:3]{index=3}
        $emplois = Emploi::pluck('emploi_title', 'id');
    
        // 2-. Requête principale avec relations + filtres
        $query = EmploiHistory::with(['user', 'emploi'])
                              ->filter($request);
    
        // 3-. Pagination (conserve ?user_id=..&emploi_id=..)
        $emploisHistories = $query->paginate(10)
                                  ->withQueryString();    // -pagination SQL-optimisée :contentReference[oaicite:4]{index=4}
    
        return view('admin.emplois_histories.list', compact('emploisHistories', 'users', 'emplois'));
    }
    public function create()
{
    //  3--$users   = User::all();

    $users   = User::pluck('name', 'id');
    $emplois = Emploi::pluck('emploi_title', 'id');
    return view('admin.emplois_histories.add', compact('users', 'emplois'));
}
public function store(EmploiHistoryRequest $request)
{
    EmploiHistory:: create($request ->validated());

    return redirect()->route('admin.emplois_histories')->with('success', 'emplois_histories ajouté avec succès.');
}

    public function destroy($id)
    {
        $emploisHistories =EmploiHistory::findOrFail($id);
        $emploisHistories->delete();
        return redirect()->route('admin.emplois_histories')->with('success', 'emploisHistory deleted successfully.');
    }
}
