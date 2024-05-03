<?php

namespace App\Imports;

use App\Models\kategori;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class kategoriimport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {

        return new kategori([
            'Kategori' => $row['kategori'],
        ]);
    }

    public function headingRow()
    {
        return 3;
    }
}
