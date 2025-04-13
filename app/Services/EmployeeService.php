<?php

namespace App\Services;

use App\Models\Emploi;
/**
 * 1-Service pour gérer les employés.
 */
class EmployeeService
{
    public function getCommonData(): array
    {
        $emplois = Emploi::all();
        return compact('emplois');
    }
}
