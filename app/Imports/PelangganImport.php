<?php

namespace App\Imports;

use App\Models\pelanggan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new pelanggan([
            'nama' => $row['nama'],
            'email' => $row['email'],
            'no_telp' => $row['no_telp'],
            'alamat' => $row['alamat'],
        ]);
    }
    public function headingRow()
    {
        return 3;
    }
}
