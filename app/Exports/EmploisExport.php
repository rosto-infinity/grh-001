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
        // $emploisQuery = Emploi::filter($request);
    
         // 5-Pagination
        //  $emplois = $emploisQuery->paginate(4);
        $emplois = Emploi::all();
        return view('admin.emplois.excel', compact('emplois'));
    }
}
