<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pelangganExport;
use App\Imports\PelangganImport;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;
use Illuminate\Database\QueryException;


class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['pelanggan'] = pelanggan::get();
            return view('pelanggan.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            return $error->getMessage() . $error->getCode();
        }
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new pelangganExport, $date . '_pelanggan.xlsx');
    }
    public function importData()
    {
        Excel::import(new PelangganImport, request()->file('import'));
        return redirect('pelanggan')->with('success', 'Import data paket berhasil!');
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
    public function store(StorepelangganRequest $request)
    {
        // dd($request->all());
        Pelanggan::create($request->all());
        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, string $id)
    {
        $pelanggan = pelanggan::find($id)->update($request->all());
        return redirect('pelanggan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pelanggan::find($id)->delete();
        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }
    public function generatepdf()
    {
        $pelanggan = pelanggan::all();
        $pdf = FacadePdf::loadView('pelanggan.table', compact('pelanggan'));
        return $pdf->download('pelanggan.pdf');
    }
}
