@extends('layouts.owner.app')

@section('content')


<form action="{{ route ('cart.store')}}" method="POST">
    {{csrf_field()}}
<section class="catalog" id="catalog" style="padding-top: 100px">

    <div class="container">
        @if(session('cart'))
        <table class="table table-sm table-responsive-sm ">
            <thead class="" style="color: #fff; background-color:#E70012">
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga/pcs</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $subtotal=0; @endphp
                @foreach(session('cart') as $id => $r)
                <tr>
                    <td>{{$r['nama']}}</td>
                    <td>Rp. {{number_format($r['harga'],0,',','.')}}</td>
                    <td>{{$r['jumlah']}} pcs</td>
                    <td>Rp. {{number_format($r['harga']*$r['jumlah'],0,',','.')}}</td>
                    <td>
                        <a href="{{route('remove.cart',$id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @php $subtotal = $subtotal + $r['harga']*$r['jumlah']@endphp
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td>Sub Total</td>
                    <td>Rp. {{number_format($subtotal,0,',','.')}}</td>
                    <td>
                    <input type="hidden" name="pemesanan_tgl" value="{{ date('Y-m-d')}}">
                    <input type="hidden" name="pemesanan_subtotal" value="{{$subtotal}}">
                        <button class="btn-btn-primary btn-sm" type="submit"><i class="fa fa-send"></i> Order</button>
                    </td>
                </tr>
            </tbody>
        </table>
        @else
            <div class="" style="padding: 25px; background-color:#f0f0f0;">
                <div class="text-center">
                    <img src="{{ url ('file/images/icon/empty-cart.png')}}" alt="" style="width:50%;">
                </div>
            </div>
        @endif
    </div>


</section>
</form>

@endsection