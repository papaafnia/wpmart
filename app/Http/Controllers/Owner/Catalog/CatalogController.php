<?php

namespace App\Http\Controllers\Owner\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DataBarang\DataBarang;
use App\Kategori\Kategori;
use App\SubKategori\SubKategori;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $databarang = DataBarang::all();
        $kategori = Kategori::orderBy('kategori_nama','asc')->get();
        $subkategori = SubKategori::all(); 
        return view('owner.catalog.v_catalog')->with(compact('databarang','kategori','subkategori'));
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
        $show = SubKategori::where('kategori_id', $id)->orderBy('sub_kategori_nama','asc')->get();
        return view('owner.catalog.s_catalog')->with(compact('show'));
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
    }

    public function subdetails($id){
        $show = DataBarang::where('subkategori_data_barang',$id)->orderBy('hargapcs_data_barang','asc')->get();
        $sub = DataBarang::where('subkategori_data_barang',$id)->first();
        return view('owner.catalog.d_catalog')->with(compact('show','sub'));
    }
}
