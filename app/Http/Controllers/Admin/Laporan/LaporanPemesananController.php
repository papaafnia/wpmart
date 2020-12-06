<?php

namespace App\Http\Controllers\Admin\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use PDF;
use App\Pemesanan\Pemesanan;
use App\Pemesanan\PemesananDetail;

class LaporanPemesananController extends Controller
{
    //
    public function viewlaporan(){
        return view('admin.laporan.v_laporanpemesanan');
    }

    public function cetaklaporan(Request $request){

        $star = $request->start;
        $end = $request->end;

        $s = date('Y-m-d',strtotime($star));
        $e = date('Y-m-d',strtotime($end));

        $pemesanan_detail = PemesananDetail::all();
        $pemesanan = Pemesanan::whereBetween('pemesanan_tgl',[$s,$e])->get();
        $date = date('Y-m-d');
        // return view('admin.laporan.c_laporanpemesanan')->with(compact('pemesanan','pemesanan_detail'));
        $pdf    = PDF::loadview('admin.laporan.c_laporanpemesanan',compact('pemesanan','pemesanan_detail','star','end'));
        return $pdf->stream(); // buat preview dulu
        
    }

}
