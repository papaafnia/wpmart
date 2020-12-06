@extends('layouts.admin.template')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Barang</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                {{-- <li class="breadcrumb-item">
                    <a>Barang</a>
                </li> --}}
                <li class="breadcrumb-item active">
                    <strong>Data Barang</strong>
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
                        <h5>Data Barang WP Mart</h5> | 
                        {{-- <a class="" type="button" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-save"> Import</i> 
                        </a> |  --}}
                        <!-- Button trigger modal Import-->

                        <a class="" type="button" data-toggle="modal" data-target="#exampleModal1">
                            <i class="fa fa-plus"> Tambah Barang</i>
                        </a>
                        <!-- Button trigger modal Tambah-->

                            {{-- notifikasi form validasi --}}
                            @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                    
                            {{-- notifikasi sukses --}}
                            @if ($sukses = Session::get('sukses'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $sukses }}</strong>
                            </div>
                            @endif
                            
                        <!-- Modal Import-->
                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Data Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route ('import.excel') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input class="form-control" type="file" name="file" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>        
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div> --}}

                        <!-- Modal Tambah Barang-->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route ('data-barang.store')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="nama_data_barang">Nama</label>
                                            <div class="col-lg-10">
                                            <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" class="form-control" type="text" name="nama_data_barang" placeholder="nama barang" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="hargapcs_data_barang">Harga /pcs</label>
                                            <div class="col-lg-10">
                                            <input class="form-control" type="number" name="hargapcs_data_barang" placeholder="harga barang / pcs" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="qty_data_barang">Qty</label>
                                            <div class="col-lg-10">
                                            <input class="form-control" type="text" name="qty_data_barang" placeholder="qty barang" value="1000" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="kategori_data_barang">Kategori</label>
                                            <div class="col-lg-10">
                                            <select class="form-control" name="kategori_data_barang" id="kategori_data_barang">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategori as $k)
                                                    <option value="{{$k->id}}">{{$k->kategori_nama}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="subkategori_data_barang">Sub Kategori</label>
                                            <div class="col-lg-10">
                                            <select class="form-control" name="subkategori_data_barang" id="subkategori_data_barang">

                                            </select>
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
                        <th>Nama</th>
                        <th>Harga/pcs</th>
                        <th>Qty</th>
                        <th>Kategori</th>
                        <th>Sub Kategori</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($databarang as $r)
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $r->nama_data_barang}}</td>
                            <td>Rp. {{ number_format($r->hargapcs_data_barang,0,',','.')}}</td>
                            <td>{{ $r->qty_data_barang}}</td>
                            <td>{{ $r->detailkategori->kategori_nama}}</td>
                            <td>{{ $r->subkategori_data_barang}}</td>
                            <td align="center">
                            @if($r->gambar == null)
                            <img src="{{ url('file/images/logo/no-image.jpeg')}}" width="50px" alt="">
                            @else
                                <a href="{{ url ('file/images/data_barang',$r->gambar)}}" target="_blank">
                                    <img src="{{ url ('file/images/data_barang',$r->gambar)}}" alt="" width="50px">
                                </a>
                            @endif
                            </td>
                            <td align="center">
                                <a href="{{ route ('destroy.data_barang',$r->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-target="#exampleModal1{{$r->id}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <div class="modal fade" id="exampleModal1{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route ('data-barang.update', $r->id)}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }} {{method_field('PUT')}}
                
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="nama_data_barang">Nama</label>
                                                    <div class="col-lg-10">
                                                    <input class="form-control" type="text" name="nama_data_barang" placeholder="nama barang" value="{{$r->nama_data_barang}}"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="hargapcs_data_barang">Harga /pcs</label>
                                                    <div class="col-lg-10">
                                                    <input class="form-control" type="number" name="hargapcs_data_barang" placeholder="harga barang /pcs" value="{{$r->hargapcs_data_barang}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="qty_data_barang">Qty</label>
                                                    <div class="col-lg-10">
                                                    <input class="form-control" type="number" name="qty_data_barang" placeholder="qty barang" value="{{$r->qty_data_barang}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="kategori_data_barang">Kategori</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control" name="kategori_data_barang">
                                                            <option value="">Pilih Kategori</option>
                                                            @foreach ($kategori as $k)
                                                                <option value="{{$k->id}}" {{$r->kategori_data_barang == $k->id ? 'selected' : ''}}>{{$k->kategori_nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="subkategori_data_barang">Sub Kategori</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control" name="subkategori_data_barang" id="update_subkategori_data_barang">
                                                            @foreach ($subkategori as $sk)
                                                                <option value="{{$sk->id}}" {{$r->subkategori_data_barang == $sk->id ? 'selected' : ''}}>{{$sk->sub_kategori_nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="gambar"></label>
                                                    <div class="col-lg-10">
                                                    @if($r->gambar == null)
                                                    <img src="{{ url('file/images/logo/no-image.jpeg')}}" width="50px" alt="">
                                                    @else
                                                        <a href="{{ url ('file/images/data_barang',$r->gambar)}}" target="_blank">
                                                            <img src="{{ url ('file/images/data_barang',$r->gambar)}}" alt="" width="120px">
                                                        </a>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="gambar">Gambar</label>
                                                    <div class="col-lg-10">
                                                    @if($r->gambar == null)
                                                    <img src="{{ url('file/images/logo/no-image.jpeg')}}" width="50px" alt="">
                                                    @else
                                                        <a href="{{ url ('file/images/data_barang',$r->gambar)}}" target="_blank">
                                                            <img src="{{ url ('file/images/data_barang',$r->gambar)}}" alt="" width="120px">
                                                        </a>
                                                    @endif
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
                        <th>Nama</th>
                        <th>Harga/pcs</th>
                        <th>Qty</th>
                        <th>Kategori</th>
                        <th>Sub Kategori</th>
                        <th>Gambar</th>
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

<script src="{{ asset ('admin/js/jquery-3.1.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
      $('#kategori_data_barang').on('change', function(e){
        var id = e.target.value;
        $.get('{{url('superadmin/data-barang/kategori/get')}}/'+id, function(data){
          $('#subkategori_data_barang').empty();
          $('#subkategori_data_barang').append('<option disabled selected>Pilih Sub Kategori</option>');
          $.each(data, function(index, val){
            $('#subkategori_data_barang').append('<option value='+val.id+'>'+val.sub_kategori_nama+'</option>');
          });
        });
      });
    });
</script>

<script>
    $(document).ready(function(){
      $('#update_kategori').on('change', function(e){
        var id = e.target.value;
        $.get('{{url('superadmin/data-barang/kategori/get')}}/'+id, function(data){
          $('#update_subkategori_data_barang').empty();
          $('#update_subkategori_data_barang').append('<option disabled selected>Pilih Sub Kategori</option>');
          $.each(data, function(index, val){
            $('#update_subkategori_data_barang').append('<option value='+val.id+'>'+val.sub_kategori_nama+'</option>');
          });
        });
      });
    });
</script>





    
@endsection