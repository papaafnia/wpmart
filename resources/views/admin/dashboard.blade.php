@extends('layouts.admin.template')

@section('content')


<div class="wrapper wrapper-content">
   <div class="row">
               <div class="col-lg-3">
                   <div class="ibox ">
                       <div class="ibox-title">
                           <span class="label label-success float-right">All</span>
                           <h5>Data Barang</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">{{$databarang}}</h1>
                           <div class="stat-percent font-bold text-navy">98% <i class="fa fa-level-up"></i></div>
                           <small>Total Barang</small>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="ibox ">
                       <div class="ibox-title">
                           <span class="label label-info float-right">Active</span>
                           <h5>User</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">{{$user}}</h1>
                           <div class="stat-percent font-bold text-info">89% <i class="fa fa-level-up"></i></div>
                           <small>Pengguna Sistem</small>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="ibox ">
                       <div class="ibox-title">
                           <span class="label label-primary float-right">All Order</span>
                           <h5>Order</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">{{$order}}</h1>
                           <div class="stat-percent font-bold text-navy">85% <i class="fa fa-level-up"></i></div>
                           <small>Semua Pesanan</small>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="ibox ">
                       <div class="ibox-title">
                           <span class="label label-primary float-right">All</span>
                           <h5>Income</h5>
                       </div>
                       <div class="ibox-content">
                           <h1 class="no-margins">
                               @php $inc  =0; @endphp
                               @foreach ($income as $in)
                                <input type="hidden" value="{{$inc = $inc + $in->pemesanan_subtotal}}">
                               @endforeach
                               Rp. {{number_format($inc,0,',','.')}}
                           </h1>
                           <div class="stat-percent font-bold text-warning">89% <i class="fa fa-bolt"></i></div>
                           <small>Total Income</small>
                       </div>
                   </div>
       </div>
   </div>
</div>
<!-- Mainly scripts -->
<script src="{{ asset ('admin/js/jquery-3.1.1.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset ('admin/js/plugins/toastr/toastr.min.js') }}"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('Welcome to WPM System');

        }, 1300);


    });
</script>

@endsection