<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class EmploiGrade extends Model
{
    // 1 - Les attributs qui peuvent être remplis en masse
    protected $fillable = [
        'grade_level',    // -Le niveau de grade (ex. : Junior, Senior, etc.)
        'lowest_salary',  // -Le salaire le plus bas associé à ce grade
        'highest_salary'  // -Le salaire le plus élevé associé à ce grade
    ];

    public function scopeFilter(Builder $query, Request $request)
    {
        // 2-Filtrage par grade_level
        if ($request->filled('grade_level')) {
            $query->where('grade_level', $request->input('grade_level'));
        }
    
        // 15-Filtrage par lowest_salary
        if ($request->filled('lowest_salary')) {
            $query->where('lowest_salary', $request->input('lowest_salary'));
        }
    
        // 15-Filtrage par highest_salary
        if ($request->filled('highest_salary')) {
            $query->where('highest_salary', $request->input('highest_salary'));
        }
    
        // 07---Filtrage par date de création
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }
    
        return $query;
    }
}
