@extends('layouts.admin.template')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Kategori</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                
                <li class="breadcrumb-item active">
                    <strong>Data Kategori</strong>
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
                    <h5>Data Kategori Barang WP Mart</h5> | 

                    <!-- Button trigger modal Kategori-->
                    <a class="" type="button" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"> Tambah Kategori</i>
                    </a>
                    
                    <!-- Modal Kategori-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('kategori.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="" class="col-lg-2">Kategori</label>
                                        <div class="col-lg-10">
                                        <input class="form-control" type="text" name="kategori_nama" placeholder="Masukan Nama Kategori" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="gambar">Gambar</label>
                                        <div class="col-lg-10">
                                        <input class="form-control" type="file" name="gambar" required>
                                        </div>
                                    </div>
                                    <div align="right">
                                        <button type="submit" class="btn btn-primary">Kirim</button>        
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    
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
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($kategori as $r)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$r->kategori_nama}}</td>
                        <td>
                            <a href="{{ route ('destroy.kategori',$r->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                            <a class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-target="#exampleModal1{{$r->id}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <div class="modal fade" id="exampleModal1{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route ('kategori.update', $r->id)}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }} {{method_field('PUT')}}
            
                                            <div class="form-group row">
                                                <label for="" class="col-lg-2">Kategori</label>
                                                <div class="col-lg-10">
                                                <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" class="form-control" type="text" name="kategori_nama" placeholder="Masukan Nama Kategori" value="{{$r->kategori_nama}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="gambar">Gambar</label>
                                                <div class="col-lg-10">
                                                <img src="{{ url ('file/image/kategori',$r->gambar)}}" alt="" width="50px">
                                                <input class="form-control" type="file" name="gambar">
                                                </div>
                                            </div>
                                            <div align="right">
                                            <button type="submit" class="btn btn-primary">Kirim</button>        
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <th>Nama Kategori</th>
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