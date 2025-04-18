<?php

namespace App\Http\Controllers;

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
                                         ->paginate(10);
    
        return view('admin.emploi_histories.list', compact('emploiHistories'));
    }
    public function create()
{
    $users   = User::pluck('name', 'id');
    $emplois = Emploi::pluck('emploi_title', 'id');
    return view('admin.emploi_histories.add', compact('users', 'emplois'));
}

    
}
