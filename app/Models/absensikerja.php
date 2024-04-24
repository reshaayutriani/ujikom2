<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensikerja extends Model
{
    use HasFactory;

    protected $table = 'AbsensiKerja';
    protected $guarded = ['id'];
}
