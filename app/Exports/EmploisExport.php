<?php

namespace App\Exports;

use App\Models\Emploi;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmploisExport implements FromCollection
{
    // app/Exports/EmploisExport.php
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Emploi::all();
    }
}
