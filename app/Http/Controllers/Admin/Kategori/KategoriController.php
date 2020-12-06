<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kategori\Kategori;
use App\SubKategori\SubKategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('admin.kategori.v_kategori')->with(compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $store = new Kategori;
        $store->kategori_nama = $request->kategori_nama;
        $tujuan_upload = 'file/images/kategori';
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $nama_file = time()."".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $store->gambar=$nama_file;
            
        }
        $store->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $show = SubKategori::where('kategori_id', $id)->get();
        return view('owner.catalog.d_catalog')->with(compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = Kategori::find($id);
        $update->kategori_nama = $request->kategori_nama;
        $update->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Kategori::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
