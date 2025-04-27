<?php

namespace App\Exports; // Déclare le namespace de la classe

use App\Models\EmploiGrade; // Importe le modèle EmploiGrade pour l'utiliser dans cette classe
use Illuminate\Contracts\View\View; // Importe l'interface View pour le type de retour
use Maatwebsite\Excel\Concerns\FromView; // Importe l'interface FromView pour l'exportation Excel

class EmploiGradeExport implements FromView // Déclare la classe EmploisGradesExport qui implémente l'interface FromView
{
    // Méthode qui retourne la vue à utiliser pour l'exportation
    public function view(): View
    {
        // Récupération de tous les grades d'emploi depuis la base de données
        return view(
            'admin.emploi_grades.excel', // Chemin de la vue à utiliser pour l'exportation
            [
                'emploi_grades' => EmploiGrade::all() // Passe les grades d'emploi récupérés à la vue
            ]
        );
    }
}
