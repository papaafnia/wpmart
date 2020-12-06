@extends('layouts.admin.template')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data User</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                
                <li class="breadcrumb-item active">
                    <strong>Data User</strong>
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
                    <h5>Data User WP Mart</h5> | 

                    <!-- Button trigger modal Import-->
                    <a class="" type="button" data-toggle="modal" data-target="#exampleModal1">
                        <i class="fa fa-plus"> Tambah User</i>
                    </a>
                    <!-- Button trigger modal Tambah-->
                    
                    <!-- Modal Import-->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route ('reg.owner')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autocomplete="off">
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                        <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                
                                            <div class="col-md-6">
                                                <select name="role" id="" class="form-control">
                                                    <option value="">Pilih Role</option>
                                                    <option value="1">Superadmin</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Kasir</option>
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $no =1 @endphp
                    @foreach ($user as $u)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->rolename->display_name}}</td>
                        <td>{{$u->rolename->description}}</td>
                        <th><label for="" class="label label-primary">{{$u->status}}</label></th>
                        <td align="center">
                            <a type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#exampleModalprofile{{$u->id}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <!-- Modal Profile-->
                            <div class="modal fade" id="exampleModalprofile{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update.profile', $u->id)}}" method="" enctype="multipart/form-data">
                                            {{ csrf_field() }} {{ method_field('PUT') }}
                                            <div class="form-group row"><label class="col-lg-2 col-form-label">Name</label>
                                                <div class="col-lg-10"><input type="text" name="name" placeholder="Name" class="form-control" required value="{{$u->name}}"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>
                                                <div class="col-lg-10"><input type="email" name="email" placeholder="Email" class="form-control" required value="{{$u->email}}"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 col-form-label">Status</label>
                                                <div class="col-lg-10">
                                                   <select name="status" id="" class="form-control">
                                                       <option value="{{$u->status}}" >{{$u->status}}</option>
                                                       <option value="Active">Active</option>
                                                       <option value="Non Active">Non Active</option>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 col-form-label">Password</label>
                                                <div class="col-lg-10"><input type="password" name="password" placeholder="Password"  class="form-control @error('password') is-invalid @enderror" ></div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 col-form-label">Confirm Password</label>
                                                <div class="col-lg-10"><input type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" class="form-control"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 col-form-label"></label>
                                                <a href="{{ url('file/images/avatar',$u->image)}}">
                                                <img src="{{ url('file/images/avatar',$u->image)}}" alt="" width="120px">
                                                </a>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 col-form-label">Image</label>
                                                <div class="col-lg-10"><input type="file" name="file" placeholder="Image" class="form-control"></div>
                                            </div>
                                            {{-- <div class="form-group row"><label class="col-lg-2 col-form-label">Role</label>
                                                <div class="col-lg-10">
                                                   <select name="role" id="" class="form-control">
                                                    <option value="{{$u->role}}" >{{$u->role}}</option>
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Anggota WPM</option>
                                                    <option value="3">Kasir</option>
                                                    </select> 
                                                </div>
                                            </div> --}}
                                            <div class="" align="right">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            <a type="button" class="btn btn-default btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
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