<?php

namespace App\Http\Controllers\Admin\Databarang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use App\Databarang\DataBarang;
use App\Kategori\Kategori;
use App\SubKategori\SubKategori;

use Session;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $databarang = DataBarang::orderBy('nama_data_barang','asc')->orderBy('hargapcs_data_barang','asc')->get();
        $kategori = Kategori::orderBy('kategori_nama','asc')->get();
        $subkategori = SubKategori::orderBy('sub_kategori_nama','asc')->get();
        return view('admin.databarang.v_databarang')->with(compact('databarang','kategori','subkategori'));
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
        $store =  new DataBarang;
        $store->nama_data_barang = $request->nama_data_barang;
        $store->hargapcs_data_barang = $request->hargapcs_data_barang;
        $store->qty_data_barang = $request->qty_data_barang;
        $store->kategori_data_barang = $request->kategori_data_barang;
        $store->subkategori_data_barang = $request->subkategori_data_barang;
        $tujuan_upload = 'file/images/data_barang';
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $nama_file = time()."".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $store->gambar=$nama_file;
            
        }
 
        // dd($store);

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
        
        $update = DataBarang::find($id);
        $update->nama_data_barang = $request->nama_data_barang;
        $update->hargapcs_data_barang = $request->hargapcs_data_barang;
        $update->qty_data_barang = $request->qty_data_barang;
        $update->kategori_data_barang = $request->kategori_data_barang;
        $update->subkategori_data_barang = $request->subkategori_data_barang;

        $tujuan_upload = 'file/images/data_barang';
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

        $destroy = DataBarang::find($id);
        $destroy->delete();

        return redirect()->back();
    }

    public function kategori($id)
    {

        if($id==0){
            $kategori = null;
        }else{
            $kategori = SubKategori::where('kategori_id',$id)->get();
        }
        return $kategori;

    }

    public function subkategori($id)
    {

        if($id==0){
            $kategori = null;
        }else{
            $kategori = SubKategori::where('id',$id)->get();
        }
        return $kategori;
        
    }

    public function import_excel(Request $request) 
	{   
        
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file/file_data_barang/',$nama_file);
 
		// import data
		Excel::import(new DataBarang, public_path('/file/file_data_barang/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
	}

  
}
