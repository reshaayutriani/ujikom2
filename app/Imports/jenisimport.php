<?php

namespace App\Imports;

use App\Models\jenis;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jenisImport implements ToModel
{
    public function model(array $rows)
    {
        return new jenis([
            'nama_jenis' => $rows[0],
        ]);
    }
}