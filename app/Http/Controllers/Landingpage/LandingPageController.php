<?php

namespace App\Http\Controllers\Landingpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Databarang\DataBarang;
use App\Kategori\Kategori;
use App\SubKategori\SubKategori;

class LandingPageController extends Controller
{
    //

    public function kategori(){

        $databarang = DataBarang::all();
        $kategori = Kategori::all();
        $subkategori = SubKategori::all(); 
        return view('kategori')->with(compact('databarang','kategori','subkategori'));


    }

    public function subkategori($id){
        $show = SubKategori::where('kategori_id', $id)->get();
        return view('subkategori')->with(compact('show'));
    }

    public function detailbarang($id){
        $show = DataBarang::where('subkategori_data_barang',$id)->get();
        $sub = DataBarang::where('subkategori_data_barang',$id)->first();
        return view('detail')->with(compact('show','sub'));
    }
}
