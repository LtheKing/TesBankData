<?php

namespace App\Imports;

use App\DataNasabah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class DataNasabahImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    public function model(array $row){
        return new DataNasabah([
            'nama' => $row[0],
            'tlp' => $row[1],
            'alamat' => $row[2],
            'email' => $row[3],
        ]);
    }
}
