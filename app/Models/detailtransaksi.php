<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtransaksi extends Model
{
    use HasFactory;
    protected $table = 'detailtransaksi';
    protected $fillable = ['transaksi_id', 'menu_id', 'jumlah', 'subtotal', 'harga'];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'transaksi_id');
    }

    public function menu()
    {
        return $this->hasOne(menu::class, 'id', 'menu_id');
    }
}
