<?php

namespace App\Http\Controllers;

use App\Models\AbsensiKerja;
use App\Http\Requests\StoreAbsensiKerjaRequest;
use App\Http\Requests\UpdateAbsensiKerjaRequest;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiKerjaExport;
use App\Imports\AbsensiKerjaImport;
use PDF;
use Illuminate\Http\Request;
use PDOException;


class AbsensiKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'AbsensiKerja';
        $data['AbsensiKerja'] = AbsensiKerja::get();
        return view('AbsensiKerja.index')->with($data);
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiKerjaExport, $date . '_AbsensiKerja.xlsx');
    }
    public function importData()
    {
        Excel::import(new AbsensiKerjaImport, request()->file('import'));
        return redirect('AbsensiKerja')->with('success', 'Import data paket berhasil!');
    }

    public function generatePdf()
{
    $AbsensiKerja = AbsensiKerja::all();
    $pdf = PDF::loadView('Absensi_Kerja_pdf', compact('AbsensiKerja'));
    return $pdf->download('AbsensiKerja.pdf');
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
    public function store(StoreAbsensiKerjaRequest $request)
    {
        absensikerja::create($request->all());
        return redirect('AbsensiKerja')->with('success', 'Data AbsensiKerja berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiKerja $AbsensiKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiKerja $AbsensiKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiKerjaRequest $request, string $id)
    {
        $AbsensiKerja = AbsensiKerja::find($id)->update($request->all());
        return redirect('AbsensiKerja')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        AbsensiKerja::find($id)->delete();
        return redirect('AbsensiKerja')->with('success', 'Data AbsensiKerja berhasil dihapus!');
    }
}