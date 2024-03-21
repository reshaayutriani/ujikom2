<?php

namespace App\Http\Controllers;
use PDOException;
use App\Models\jenis;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\jenisExport;
use App\Imports\jenisImport;
use Illuminate\Database\QueryException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $data['tittle'] = 'jenis';
        $data['jenis'] = jenis::get();
        return view('jenis.index')->with($data);
        }

        catch (QueryException | Exception | PDOException  $error){
            $this->failResponse($error->getMessage(),$error->getCode());
        }
    }

    public function exportData()
    {
      $date = date('Y-m-d');
      return Excel::download(new jenisExport,$date.'_jenis.xlsx');
    }
    public function importData(){
        Excel::import(new JenisImport, request()->file('import'));
        return redirect('jenis')->with('success', 'Import data paket berhasil!');
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
    public function store(StorejenisRequest $request)
    {
        Jenis::create($request->all());
        return redirect('jenis')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, string $id)
    {
        $jenis = Jenis::find($id)->update($request->all());
        return redirect('jenis')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jenis::find($id)->delete();
        return redirect('jenis')->with('success','Data jenis berhasil dihapus!');
    }
}