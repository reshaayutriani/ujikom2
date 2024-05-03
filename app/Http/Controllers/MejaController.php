<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\meja;
use App\Http\Requests\StoremejaRequest;
use App\Http\Requests\UpdatemejaRequest;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\mejaExport;
use App\Imports\mejaImport;
use PDF;
use Illuminate\Database\QueryException;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tittle'] = 'meja';
        $data['meja'] = meja::get();
        return view('meja.index')->with($data);
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new mejaExport, $date . '_meja.xlsx');
    }

    public function importData()
    {
        Excel::import(new mejaImport, request()->file('import'));
        return redirect('meja')->with('success', 'Import data paket berhasil!');
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
    public function store(StoremejaRequest $request)
    {
        meja::create($request->all());
        return redirect('meja')->with('succes','data meja berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(meja $meja)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemejaRequest $request, string $id)
    {
        $meja = meja::find($id)->update($request->all());
        return redirect('meja')->with('success','update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        meja::find($id)->delete();
        return redirect('meja')->with('success', 'Data meja berhasil dihapus!');
    }
    public function generatepdf()
    {
        $meja = meja::all();
        $pdf = Pdf::loadView('meja.table', compact('meja'));
        return $pdf->download('meja.pdf');
    }
}
