@extends('layouts.admin.template')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Laporan Pemesanan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                {{-- <li class="breadcrumb-item">
                    <a>Barang</a>
                </li> --}}
                <li class="breadcrumb-item active">
                    <strong>Laporan Pemesanan</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
       <div class="row">
            <div class="col-sm-4">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Input Tanggal Pemesanan</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form action="{{ route('cetak.laporan') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group" id="data_5">
                            <label class="font-normal">Range select</label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="form-control-sm form-control" name="start" autocomplete="off" required/>
                                <span class="input-group-addon">to</span>
                                <input type="text" class="form-control-sm form-control" name="end" autocomplete="off" required/>
                            </div>
                        </div>
                        <div class="" align="right">
                            <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>


    
@endsection