<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploiGrade extends Model
{
    // 1 - Les attributs qui peuvent être remplis en masse
    protected $fillable = [
        'grade_level',    // -Le niveau de grade (ex. : Junior, Senior, etc.)
        'lowest_salary',  // Le salaire le plus bas associé à ce grade
        'highest_salary'  // Le salaire le plus élevé associé à ce grade
    ];
}
