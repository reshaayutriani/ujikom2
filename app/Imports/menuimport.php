<?php

namespace App\Imports;

use App\Models\menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class menuImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        return new menu([
            'menu' => $rows[0],
        ]);
        }
    }
