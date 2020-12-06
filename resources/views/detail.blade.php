@extends('layouts.owner.app')

@section('content')
   
<section class="catalog" id="catalog" style="padding-top: 100px">

    <div class="container">
        <div class="breadcrum">
            @if ($sub == null)
            <div class="container" >
                <div class="" style="padding: 25px; background-color:#f0f0f0;">
                <h3 class="text-center">SUB KATEGORI INI TIDAK TERSEDIA BARANG</h3>
                </div>
            </div>
            @else
            <h5>Home/ Sub Kategori/ {{$sub->detailsubkategori->sub_kategori_nama}}</h5>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($show as $k)
            <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2 " style="padding-top: 15px;">
                <div class="bungkus" style="border: solid 1px #f0f0f0; border-radius:15px">
                    <a href="#" style="text-decoration:none" data-toggle="modal" data-target="#exampleModal{{$k->id}}">
                        <div class="info-kategori text-center" style="padding:10px;">
                            <img src="{{ url('file/images/data_barang',$k->gambar)}}" alt="" width="50px">
                            <p>Rp. {{ $k->hargapcs_data_barang}}</p>
                            <p style="margin:0px;">{{$k->nama_data_barang}}</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Ke Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="{{ route('add.to.cart')}}" method="POST">
                                {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <img src="{{ url('file/images/data_barang',$k->gambar)}}" alt="" width="100px">
                                </div>
                                <div class="col-sm-8">
                                    <p>Harga Rp. {{ $k->hargapcs_data_barang}}</p>
                                    <label for=""> Tersedia {{$k->qty_data_barang}} pcs</label>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Jumlah</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="item" value="{{$k->id}}" id="">
                                            <input type="hidden" name="harga" value="{{$k->hargapcs_data_barang}}" id="">
                                            <input type="number" min="1" name="jumlah" class="form-control"  placeholder="input jumlah order" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="" align="right">
                            {{-- <button type="submit" class="btn btn-primary">Add To Cart</button> --}}
                            </div>
                            </form>
                            <div align="right">
                            <a href="/login">
                                <button class="btn btn-danger" >LOGIN</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>


@endsection