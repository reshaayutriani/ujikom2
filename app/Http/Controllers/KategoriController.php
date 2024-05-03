<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use PDF;
use Illuminate\Database\QueryException;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['tittle'] = 'Kategori';
            $data['Kategori'] = Kategori::get();
            return view('Kategori.index')->with($data);
        } catch (QueryException | Exception | PDOException  $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new KategoriExport, $date . '_Kategori.xlsx');
    }
    public function importData()
    {
        Excel::import(new kategoriimport, request()->file('import'));
        return redirect('Kategori')->with('success', 'Import data paket berhasil!');
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
    public function store(StoreKategoriRequest $request)
    {
        // dd($request->all());
        Kategori::create($request->all());
        return redirect('Kategori')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $Kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $Kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, string $id)
    {
        $kategori = Kategori::find($id)->update($request->all());
        return redirect('Kategori')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect('Kategori')->with('success', 'Data Kategori berhasil dihapus!');
    }

    public function generatepdf()
    {
        $Kategori = Kategori::all();
        $pdf = Pdf::loadView('kategori.table', compact('Kategori'));
        return $pdf->download('kategori.pdf');
    }
}
