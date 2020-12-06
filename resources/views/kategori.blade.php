@extends('layouts.owner.app')

@section('content')
   
<section class="catalog" id="catalog" style="padding-top: 100px">

    <div class="container">
    <div class="breadcrum">
        <h5>Home/ Kategori</h5>
    </div>
    </div>


    <div class="container">
        <div class="row">
            @foreach ($kategori as $k)
            <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2 " style="padding-top: 15px;">
                <div class="bungkus" style="border: solid 1px #f0f0f0; border-radius:15px">
                    <a href="{{ route('welcome.subkategori',$k->id) }}" style="text-decoration:none">
                        <div class="info-kategori text-center" style="padding:10px;">
                            <img src="{{ url('file/images/kategori',$k->gambar)}}" alt="">
                            <p style="margin:0px;">{{$k->kategori_nama}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>


@endsection