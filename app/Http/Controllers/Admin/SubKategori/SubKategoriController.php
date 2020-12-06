<?php

namespace App\Http\Controllers\Admin\SubKategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SubKategori\SubKategori;
use App\Kategori\Kategori;
use App\DataBarang\DataBarang;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subkategori = SubKategori::orderBy('kategori_id','asc')->get();
        $kategori = Kategori::all();
        return view('admin.subkategori.v_subkategori')->with(compact('subkategori','kategori'));
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
        $store = new SubKategori;
        
        $store->sub_kategori_nama = $request->sub_kategori_nama;
        $store ->kategori_id = $request->kategori_id;
        $tujuan_upload = 'file/images/sub_kategori';
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
        $update = SubKategori::find($id);
        $update->sub_kategori_nama = $request->sub_kategori_nama;
        $update ->kategori_id = $request->kategori_id;
        $tujuan_upload = 'file/images/sub_kategori';
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $nama_file = time()."".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $update->gambar=$nama_file;
            
        }
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
        $destroy = SubKategori::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
