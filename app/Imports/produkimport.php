<?php

namespace App\Imports;

use App\Models\produk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class produkImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            produk::create([
                'nama_produk' => $row['nama_produk'],
            ]);
        }
    }
}