<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    // 1 --Les attributs qui peuvent être remplis en masse
    protected $fillable = [
        'region_name',  // -- Le nom de la région
        'created_at',   // -- Date de création
        'updated_at'    // -- Date de mise à jour
    ];

    public function scopeFilter(Builder $query, Request $request)
    {
        // 2 -- Filtrage par region_name
        if ($request->filled('region_name')) {
            $query->where('region_name', $request->input('region_name'));
        }

        // 3 - -Filtrage par date de création
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        // 4 - Filtrage par date de mise à jour
        if ($request->filled('dateUpdate')) {
            $query->whereDate('updated_at', $request->input('dateUpdate'));
        }

        return $query;
    }
}
