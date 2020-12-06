@extends('layouts.owner.app')

@section('content')
   
<section class="catalog" id="catalog" style="padding-top: 100px; padding-bottom:85px;">

    <div class="container" >
        <div class="breadcrum">
            <a style="text-decoration: none;" href="{{ route('home.index')}}">Home</a>
            <i class="fa fa-arrow-right fa-1x"></i>
            <a style="text-decoration: none;" href="{{ route('catalog.index')}}">Kategori</a>
            <i class="fa fa-arrow-right fa-1x"></i>
            <a style="text-decoration: none;" href="#">Sub Kategori</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($show as $k)
            <div class="col-6 col-lg-2" style="padding-top: 15px;">
                <div class="bungkus" style="border: solid 1px #f0f0f0; background:#fff; border-radius:5px">
                    <a href="{{ route('subcat.details',$k->id) }}" style="text-decoration:none">
                        <div class="info-kategori text-center" style="padding:10px;">
                            @if($k->gambar == null)
                            <img src="{{ url('file/images/logo/no-image.jpeg')}}" width="50px" alt="">
                            @else
                            <img src="{{ url('file/images/sub_kategori',$k->gambar)}}" width="50px" alt="">
                            @endif
                            <p style="margin:0px; font-size:10px;">{{$k->sub_kategori_nama}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>


@endsection