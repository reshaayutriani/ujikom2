<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\jenis;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\menuExport;
use App\Imports\menuImport;
use Dompdf\Dompdf;
use illuminate\Support\Facades\View;
use PDF;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['menu'] = menu::get();
        $data['jenis'] = jenis::get();
        return view('menu.index')->with($data);
    }

    public function exportData()
    {
      $date = date('Y-m-d');
      return Excel::download(new menuExport,$date.'_menu.xlsx');
    }

    public function importData(){
        Excel::import(new menuImport, request()->file('import'));
        return redirect('menu')->with('success', 'Import data paket berhasil!');
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
    public function store(StoremenuRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;
        
        menu::create($data);

        return redirect('menu')->with('success', 'Data menu berhasil di tambahkan!');

        return back()->with('success' . 'You have successfully uploaded ann image.')->with('images', $imageName);
    }
    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        $request->validate([
            'image' => 'required|images|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;

        $menu->update($data);
        return redirect('menu')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect('menu')->with('success','Data Menu berhasil dihapus!');
    }
    public function generatepdf()
    {
        // Get data
        $menu = menu::all();

        // Loop through menu items and encode images to base64
        foreach ($menu as $p) {
            $imagePath = public_path('images/' . $p->image);
            if (file_exists($imagePath)) {
                $imageData = base64_encode(file_get_contents($imagePath));
                $p->imageData = $imageData;
            } else {
                // Handle the case where the image file doesn't exist
                $p->imageData = null; // Or any other appropriate handling
            }
        }

        // Generate PDF
        $dompdf = new Dompdf();
        $html = View::make('menu.table', compact('menu'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Return the PDF as a download
        return $dompdf->stream('menu.pdf');
    }
}
