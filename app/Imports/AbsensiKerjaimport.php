<?php

namespace App\Imports;

use App\Models\AbsensiKerja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiKerjaImport implements ToCollection, WithHeadingRow
{
    
public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        //check if the 'nama karyawan' key exist and is not null
        if (isset($row['nama_karyawan']) && $row ['nama_karyawan'] !== null) {
            AbsensiKerja::create([
           'nama_karyawan' => $row['nama_karyawan'],
           'tanggal_masuk' => $row['tanggal_masuk'],
           'waktu_masuk' => $row['waktu_masuk'],
           'status' => $row['status'],
           'waktu_keluar' => $row['waktu_keluar'],
            ]);
        }
    }

    public function headingRow(): int
    {
        return 1; // Sesuaikan dengan baris judul Anda
    }
}
