@extends('layouts.owner.app')

@section('content')
   
<section class="catalog" id="catalog" style="padding-top: 100px; padding-bottom:85px;">

    <div class="container">
        <div class="breadcrum">
            @if ($sub == null)
                <div class="text-center">
                    <img src="{{ url ('file/images/icon/empty.png')}}" alt="" style="width:30%;">
                </div>
                <div class="text-center">
                    barang tidak di temukan...
                </div>
            @else
            <a style="text-decoration: none;" href="{{ route('home.index')}}">Home</a>
            <i class="fa fa-arrow-right fa-1x"></i>
            <a style="text-decoration: none;" href="{{ route('catalog.index')}}">Kategori</a>
            <i class="fa fa-arrow-right fa-1x"></i>
            <a style="text-decoration: none;" href="#">Sub Kategori</a>
            <i class="fa fa-arrow-right fa-1x"></i>
            <a style="text-decoration: none;" href="#">{{$sub->detailsubkategori->sub_kategori_nama}} </a>
            
            @endif
        </div>
    </div>

    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            @foreach ($show as $k)
            <div class="col-6 col-lg-2" style="padding-top: 15px; ">
                <div class="bungkus" style="border: solid 1px #f0f0f0; background:#fff; border-radius:5px">
                    <a href="#" style="text-decoration:none" data-toggle="modal" data-target="#exampleModal{{$k->id}}">
                        <div class="info-kategori text-center" style="padding:10px;">
                            @if($k->gambar == null)
                            <img src="{{ url('file/images/logo/no-image.jpeg')}}" width="50px" alt="">
                            @else
                            <img src="{{ url('file/images/data_barang',$k->gambar)}}" alt="" width="50px">
                            @endif
                            <p>Rp. {{ number_format($k->hargapcs_data_barang,0,',','.')}}</p>
                            <p style="margin:0px; font-size:10px;">{{$k->nama_data_barang}}</p>
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
                                <div class="col-xs-4 text-center">
                                    <a href="{{ url('file/images/data_barang',$k->gambar)}}">
                                    <img src="{{ url('file/images/data_barang',$k->gambar)}}" alt="" width="100px">
                                    </a>
                                </div>
                                <div class="col-xs-8">
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
                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                            </div>
                            </form>
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