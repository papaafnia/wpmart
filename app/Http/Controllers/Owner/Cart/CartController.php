<?php

namespace App\Http\Controllers\Owner\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Databarang\DataBarang;
use App\Pemesanan\Pemesanan;
use App\Pemesanan\PemesananDetail;

use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        return view('Owner.cart.v_cart');
    }
    public function cartStore(Request $request)
    {
        $penjualan = new Penjualan;
        $penjualan->pembeli_id          = \Auth::user()->id;
        $penjualan->penjualan_total     = $request->total;
        $penjualan->penjualan_status    = "Belum di Bayar";
        $penjualan->save();
        
        $pid = Penjualan::orderBy('penjualan_id','desc')->first();

        $cart = session()->get('cart');

        foreach(session('cart') as $id => $r){
            $pd = new PemesananDetail;
            $pd->penjualan_id   = $pid->penjualan_id;
            $pd->item_id        = $id;
            $pd->pd_jumlah      = $r['jumlah'];
            $pd->pd_harga       = $r['harga'];
            $pd->pd_total       = $r['jumlah'] * $r['harga'];
            $pd->save();

            // $item = Produk::find($id);
            // $inv = BarangInventory::where('barang_id',$item->barang_id)->first();
            // $inv->inv_stok = $inv->inv_stok - ( $r['jumlah'] * $item->produk_usage );
            // $inv->save();

            unset($cart[$id]);
 
            session()->put('cart', $cart);
        }

        $id = Penjualan::orderBy('penjualan_id','desc')->first();
        // $pembayaran = new Pembayaran;
        // $pembayaran->penjualan_id       = $id->penjualan_id;
        // $pembayaran->pembayaran_alamat  = $request->alamat;
        // $pembayaran->save();

        return redirect()->route('pemesanan.edit',$id->penjualan_id);
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
        $store = new Pemesanan;
        $store->pemesanan_id        = \Auth::user()->id;
        $store->pemesanan_subtotal  = $request->pemesanan_subtotal;
        $store->pemesanan_tgl       = $request->pemesanan_tgl;
        $store->pemesanan_status    = "Menunggu Konfirmasi";
        $store->save();

        $pid = Pemesanan::orderBy('id','desc')->first();

        $cart = session()->get('cart');

        foreach(session('cart') as $id => $r){
            $pd = new PemesananDetail;
            $pd->pemesanan_id                 = $pid->id;
            $pd->pemesanan_detail_barang_id   = $id;
            $pd->pemesanan_detail_jumlah      = $r['jumlah'];
            $pd->pemesanan_detail_harga       = $r['harga'];
            $pd->pemesanan_detail_total   = $r['jumlah'] * $r['harga'];
            $pd->save();

            unset($cart[$id]);
 
            session()->put('cart', $cart);
        }

        $id = Pemesanan::orderBy('pemesanan_id','desc')->first();
        return redirect()->route('menunggu-konfirmasi.index');

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

    public function addToCart(Request $request)
    {

        $item = DataBarang::find($request->item);
        $id = $item->id;

        if(!$item) {
            abort(404);
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "nama"      => $item->nama_data_barang,
                        "jumlah"    => $request->jumlah,
                        "harga"     => $item->hargapcs_data_barang,
                    ]
            ];
 
            session()->put('cart', $cart);
            
            return redirect()->back()->with(['success' => 'Barang sudah di simpan ke cart...']);
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['jumlah']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with(['success' => 'Barang sudah di simpan ke cart...']);
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
                        "nama"      => $item->nama_data_barang,
                        "jumlah"    => $request->jumlah,
                        "harga"     => $item->hargapcs_data_barang,
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with(['success' => 'Barang sudah di simpan ke cart...']);
    }

    public function cartRemove($id)
    {
        if($id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$id])) {
 
                unset($cart[$id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Item di Hapus!');
        }
        return redirect()->back();
    }
}
