<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Database\Seeders\PelangganSeeder;
use Exception;
use Illuminate\Database\QueryException;
use Mockery\Expectation;
use PDOException;

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
        } catch (QueryException | Expectation | PDOException $error) {
            return $error->getMessage() . $error->getCode();
        }
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
}
