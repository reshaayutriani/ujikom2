<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use App\Models\detailTransaksi;
use App\Models\jenis;
use App\Models\menu;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use PHPUnit\Runner\GarbageCollection\Subscriber;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pemesanan'] = transaksi::orderBy('created_at', 'DESC')->get();
        $jenis = jenis::all();
        return view('pemesanan.index', compact('data', 'jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretransaksiRequest $request)
    {
        try {
            DB::beginTransaction();
            $last_id = transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();

            $notrans = $last_id == null ? date('Ymd') . '0001' : date('Ymd') . sprintf('%04d', substr($last_id->id, 8, 4) + 1);
            $insertTransaksi = transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);
            if (!$insertTransaksi->exists) return 'error';

            // input detail transaksi
            foreach ($request->orderedList as $detail) {
                //dd($requuest);
                $menu = menu::find($detail['menu_id']);
                $menu->stok->jumlah = $menu->stok->jumlah - $detail['qty'];
                $menu->stok->save();
                $insertDetailTransaksi = detailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty'],
                    'harga' => $detail['harga']
                ]);
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pemesanan berhasil', 'notrans' => $notrans]);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => 'Pemesanan gagal', "error" => $e->getMessage()]);
        }
    }

    public function faktur($nofaktur)
    {

        try {
            $data['transaksi'] = transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query) {
                $query->with('menu');
            }])->first();

            return view('faktur.index')->with(($data));
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'Pemesanan gagal']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
