<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\menu;
use App\Models\pelanggan;
use App\Models\pemesanan;
use App\Models\transaksi;
use App\Models\stok;
use Illuminate\Http\Request;

class grafikController extends Controller
{
    public function index()
    {
        $menu = menu::get();
        $data['count_menu'] = $menu->count();
        $data['menu'] = $menu;

        $pelanggan = pelanggan::get();
        $data['count_pelanggan'] = $pelanggan->count();

        $transaksi = detailtransaksi::get();
        $data['count_transaksi'] = $transaksi->count();

        $stok = stok::get();
        $data['count_stok'] = $stok->count();

        $transaksi = Transaksi::get();
        $data['pendapatan'] = $transaksi->sum('total_harga');

        //tampilkan 10 data pelanggan terakhir
        $data['pelanggan'] = pelanggan::limit(5)->orderBy('created_at', 'desc')->get();

        $data['detail_transaksi'] = Detailtransaksi::limit(5)->orderBy('created_at', 'desc')->get();

        $data['stok'] = Stok::limit(5)->orderBy('jumlah', 'asc')->get();

        $data['transaksi'] = Transaksi::limit(5)->orderBy('created_at', 'desc')->get();
        


        return view('template.grafik')->with($data);
    }
}
