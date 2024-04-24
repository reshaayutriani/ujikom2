<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Http\Requests\UpdateStokRequest;
use App\Http\Requests\StorestokRequest;
use App\Models\jenis;
use App\Models\menu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\stokExport;
use App\Imports\stokImport;
use PDF;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['stok'] = stok::with(['menu'])->get();
        $data['menu'] = menu::get();
        return view('stok.index')->with($data);
    }

    public function exportData()
    {
      $date = date('Y-m-d');
      return Excel::download(new stokExport, $date.'_stok.xlsx');
    }
    public function importData()
    {
        Excel::import(new stokImport, request()->file('import'));
        return redirect('stok')->with('success', 'Import data paket berhasil!');
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
    public function store(StoreStokRequest $request)
    { {
            $stok = Stok::where('menu_id', $request->menu_id)->get()->first();
            if (!$stok) {
                Stok::create($request->all());
                return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
            }
            $tambahJumlah = $stok->jumlah;
            $stok->jumlah = (int)$request->jumlah + $tambahJumlah;
            $stok->save();

            return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestokRequest $request, string $id)
    {
        $stok = stok::find($id)->update($request->all());
        return redirect('stok')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        stok::find($id)->delete();
        return redirect('stok')->with('success', 'Data stok berhasil dihapus!');
    }
    public function generatepdf()
    {
        $stok = stok::all();
        $pdf = Pdf::loadView('stok.table', compact('stok'));
        return $pdf->download('stok.pdf');
    }
}
