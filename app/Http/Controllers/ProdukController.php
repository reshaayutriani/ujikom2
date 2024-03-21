<?php

namespace App\Http\Controllers;

use App\Models\produk;
use PDOException;
use PDF;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\produkExport;
use Illuminate\Database\QueryException;
use Exception;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        try {
            $data['title'] = 'produk';
            $data['produk'] = produk::get();
            return view('produk.index')->with($data);
        } catch (QueryException $e) {
            // Tangani jika terjadi kesalahan pada query
            return $this->failResponse($e->getMessage(), $e->getCode());
        } catch (PDOException | Exception $e) {
            // Tangani jika terjadi eksepsi lain
            return $this->failResponse($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Mengekspor data produk ke dalam file Excel.
     */
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new produkExport(), $date . '_produk.xlsx');
    }

    public function exportPDF()
{
    $produk = Produk::all();
    $pdf = PDF::loadView('pdf.produk', compact('produk'));
    return $pdf->download('produk.pdf');
}

    // Metode lainnya (create, store, show, edit, update, destroy) tidak mengalami perubahan

    /**
     * Menangani tanggapan kegagalan.
     */
    private function failResponse($message, $code)
    {
        // Lakukan tindakan yang sesuai untuk menangani kegagalan, misalnya: logging, redirect, dll.
        return redirect()->back()->with('error', $message);
    }
    public function store(StoreprodukRequest $request)
    {
        produk::create($request->all());
        return redirect('produk')->with('success','data produk berhasil di tambahkan');
    }
    public function update(UpdateprodukRequest $request, string $id)
    {
        $jenis = produk::find($id)->update($request->all());
        return redirect('produk')->with('success', 'Update data berhasil');
    }
    public function destroy($id)
    {
        produk::find($id)->delete();
        return redirect('produk')->with('success','Data produk berhasil dihapus!');
    }
}