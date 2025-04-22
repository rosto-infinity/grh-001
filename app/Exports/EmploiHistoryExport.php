<?php

namespace App\Exports;

use App\Models\Emploi;
use App\Models\EmploiHistory;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmploiHistoryExport implements FromView
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        // --Chargement des utilisateurs et des emplois
        $users = User::all();
        $emplois = Emploi::all();

        // --Chargement des historiques d'emploi avec les relations
        $emploisHistories = EmploiHistory::with(['user', 'emploi'])->get();

        return view('admin.emplois_histories.excel', [
            'users' => $users,
            'emplois' => $emplois,
            'emploisHistories' => $emploisHistories,
        ]);
    }
}
