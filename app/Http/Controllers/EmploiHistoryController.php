<?php

namespace App\Http\Controllers;

use App\Models\EmploiHistory;
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
    
}
