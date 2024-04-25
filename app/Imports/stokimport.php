<?php

namespace App\Imports;

use App\Models\stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class stokimport implements ToModel, WithHeadingRow
{
    public function model(array $rows)
    {
        return new stok([
            'menu_id' => $rows['nama_menu'],
            'jumlah' => $rows['jumlah'],
        ]);
    }
    public function headingRow()
    {
        return 3;
    }
}
