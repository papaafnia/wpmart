@extends('layouts.owner.app')

@section('content')
   
<section class="catalog" id="catalog" style="padding-top: 100px; padding-bottom:85px;">

    <div class="container">
        <div class="breadcrum">
            <a style="text-decoration: none;" href="{{ route('home.index')}}">Home</a>
            <i class="fa fa-arrow-right fa-1x"></i>
            <a style="text-decoration: none;" href="#">Kategori</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($kategori as $k)
            <div class="col-6 col-lg-2" style="padding-top: 15px; ">
                <div class="bungkus" style="border: solid 1px #f0f0f0; background:#fff; border-radius:5px">
                    <a href="{{ route('catalog-sub.show',$k->id) }}" style="text-decoration:none">
                        <div class="info-kategori text-center" style="padding:10px; height:100px;">
                            <img src="{{ url('file/images/kategori',$k->gambar)}}" width="70%" alt="">
                            <div class="name" style="padding:10px; font-size:0.75em;">
                                {{$k->kategori_nama}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>


@endsection