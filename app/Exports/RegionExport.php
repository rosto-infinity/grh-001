<?php

namespace App\Exports; // --Déclare le namespace de la classe

use App\Models\Region; // -Importe le modèle Region pour l'utiliser dans cette classe
use Illuminate\Contracts\View\View; // -Importe l'interface View pour le type de retour
use Maatwebsite\Excel\Concerns\FromView; // -Importe l'interface FromView pour l'exportation Excel

class RegionExport implements FromView // D-éclare la classe RegionExport qui implémente l'interface FromView
{
    // -Méthode qui retourne la vue à utiliser pour l'exportation
    public function view(): View
    {
        // --Récupération de toutes les régions depuis la base de données
        return view(
            'admin.regions.excel', //--- Chemin de la vue à utiliser pour l'exportation
            [
                'regions' => Region::all() // --Passe les régions récupérées à la vue
            ]
        );
    }
}
