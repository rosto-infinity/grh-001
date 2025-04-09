<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emplois extends Model
{
    /*

    */
    protected $fillable =[
        'job_title',
        'min_salary',
        'max_salary'
    ];
    public static function filter($request)
    {
        $query = self::query();

        // 04-Filtrage par nom
        if ($request->filled('job_title')) {
            $query->where('job_title', 'like', '%' . $request->input('job_title') . '%');
        }

        // 05--Filtrage par nom de famille
        if ($request->filled('min_salary')) {
            $query->where('min_salary', 'like', '%' . $request->input('min_salary') . '%');
        }

        // 06-Filtrage par email
        if ($request->filled('max_salary')) {
            $query->where('max_salary', 'like', '%' . $request->input('max_salary') . '%');
        }

        // 07-Filtrage par date de création
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        return $query;
    }
}
