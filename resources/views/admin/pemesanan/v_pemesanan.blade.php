@extends('layouts.admin.template')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Pemesanan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                
                <li class="breadcrumb-item active">
                    <strong>Data Pemesanan</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Data Pemesanan Barang WP Mart</h5> | 
                    
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Nilai Pemesanan</th>
                    <th>Tgl Pemesanan</th>
                    <th>Status Pemesanan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php $no =1; @endphp
                    @foreach ($pemesanan as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->pemesan->name}}</td>
                        <td>Rp. {{number_format($p->pemesanan_subtotal,0,',','.')}}</td>
                        <td>{{ $p->pemesanan_tgl}}</td>
                        <td>
                            @if($p->pemesanan_status == 'Menunggu Konfirmasi')
                            <span class="label label-warning">{{ $p->pemesanan_status}}</span>
                            @else
                            <span class="label label-primary">{{ $p->pemesanan_status}}</span>
                            @endif
                        </td>
                        <td align="center">
                            <i type="button" class="fa fa-info-circle" data-toggle="modal" data-target=".bd-example-modal-lg{{$p->id}}"></i>

                            <div class="modal fade bd-example-modal-lg{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <table class="table table-sm table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <td>Barang</td>
                                                <td>Jumlah</td>
                                                <td>Harga /pcs</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail->where('pemesanan_id',$p->id) as $d)
                                            <tr>
                                                <td>{{$d->nama_barang_details->nama_data_barang}}</td>
                                                <td>{{$d->pemesanan_detail_jumlah}}</td>
                                                <td>Rp. {{number_format($d->pemesanan_detail_harga,0,',','.')}}</td>
                                                <td>Rp. {{number_format($d->pemesanan_detail_total,0,',','.')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if($p->pemesanan_status == 'Menunggu Konfirmasi')
                                    <div align="right">
                                        <form action="{{ route('pemesanan.update', $p->id)}}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PUT') }}
                                            <input type="hidden" name="updatepemesanan" value="Dalam Proses">

                                            <button class="btn btn-primary btn-sm" type="submit">Konfirmasi</button>

                                        </form>
                                    </div>
                                    @else
                                    <div align="right">
                                        <form action="{{ route('pemesanan.update', $p->id)}}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PUT') }}
                                            <input type="hidden" name="updatepemesanan" value="Selesai">
                                            <button class="btn btn-success btn-sm" type="submit">Selesai</button>
                                        </form>
                                    </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            </div>
                          
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Nilai Pemesanan</th>
                    <th>Tgl Pemesanan</th>
                    <th>Status Pemesanan</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                </table>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
    
@endsection