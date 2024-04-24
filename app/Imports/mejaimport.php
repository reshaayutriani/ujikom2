<?php

namespace App\Imports;

use App\Models\meja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class mejaimport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {

        return new meja([
            'nomor_meja' => $row['nomor_meja'],
            'kapasitas' => $row['kapasitas'],
            'status' => $row['status'],
        ]);
    }

    public function headingRow()
    {
        return 3;
    }
}

