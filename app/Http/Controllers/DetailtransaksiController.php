<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Http\Requests\StoredetailtransaksiRequest;
use App\Http\Requests\UpdatedetailtransaksiRequest;
use Exception;
use Illuminate\Database\QueryException;
use App\Exports\laporanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class DetailtransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['detail_transaksi'] = Detailtransaksi::get();
            return view('laporan.index')->with($data);
        }
        catch (QueryException | Exception | PDOException $error){
            $this->fsilrespon($error->getMessage(),$error->getCode());
        }
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new LaporanExport, $date . '_laporan.xlsx');
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
    public function store(StoredetailtransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detailtransaksi $detailtransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailtransaksi $detailtransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedetailtransaksiRequest $request, detailtransaksi $detailtransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detailtransaksi $detailtransaksi)
    {
        //
    }
}
