<?php

namespace App\Exports;

use App\DataNasabah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Symfony\Component\VarDumper\Cloner\Data;

class DataNasabahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataNasabah::all();
    }
}
