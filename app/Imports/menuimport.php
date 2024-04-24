<?php

namespace App\Imports;

use App\Models\menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class menuImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        return new menu([
            'jenis_id' => $row['jenis_id'],
            'nama_menu' => $row['nama_menu'],
            'harga' => $row['harga'],
            'image' => $row['image'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }

    public function headingRow()
    {
        return 3;
    }
}
