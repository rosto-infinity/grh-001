<?php

namespace App\Exports;

use App\Models\EmploiGrade;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmploiGradeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmploiGrade::all();
    }
}
