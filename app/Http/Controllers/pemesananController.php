<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Http\Requests\StorepemesananRequest;
use App\Http\Requests\UpdatepemesananRequest;
use App\Models\Jenis;
use App\Models\Menu;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class pemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pemesanan'] = pemesanan::orderBy('created_at', 'DESC')->get();
        $jenis = Jenis::all();
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
    public function store(StorepemesananRequest $request)
    {
        $data['pemesanan'] = pemesanan::orderBy('created_at', 'DESC')->get();
        $jenis = Jenis::all();
        return response()->json(['status'=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepemesananRequest $request, pemesanan $pemesanan)
    {
        $pemesanan->update($request->all());
        return redirect('pemesanan')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemesanan $pemesanan)
    {

        $pemesanan->delete();
        return redirect('pemesanan')->with('success', 'Data pemesanan berhasil dihapus!');
    }
}
