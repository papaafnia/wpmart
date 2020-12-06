@extends('layouts.owner.app')

@section('content')


<section class="history" style="padding-top: 150px">
    
    <div class="container">
        <table class="table table-responsive-sm table-sm">
            <thead>
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Total Harga</th>
                    <th>Tgl Pemesanan</th>
                    <th>Status Pemesanan</th>
                    <th>Detail Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $p)

                <tr>
                    <td>{{$p->pemesan->name}}</td>
                    <td>Rp. {{number_format($p->pemesanan_subtotal,0,',','.')}}</td>
                    <td>{{$p->pemesanan_tgl}}</td>
                    <td>{{$p->pemesanan_status}}</td>
                    <td>
                    <!-- Large modal -->
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
                            </div>
                        </div>
                    </div>
                    </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</section>

@endsection