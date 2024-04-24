<?php

namespace App\Imports;

use App\Models\stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jenisImport implements ToModel, WithHeadingRow
{
    public function model(array $rows)
    {
        return new stok([
            'menu' => $rows['menu'],
            'jumlah' => $rows['jumlah'],
        ]);
    }
    public function headingRow()
    {
        return 3;
    }
}
