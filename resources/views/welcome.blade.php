@extends('layouts.owner.app')

@section('content')


{{-- <section class="hero" id="hero" style="width: 100%; min-height: 760px; background: #E70012;">

                <div class="container" style="padding-top:72px;">
                    <div class="row" style="display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;">

            <div class="col-md-6">
                <div class="" style="padding: 25px; margin:50px;">
                    <div class="">
                    <span style="color:#fff">
                        <h1>PROMO SUPER BULAN NOVEMBER</h1>
                    </span>
                    </div>

                    <div class="" style="margin-top: 25px; ">
                    <span style="color:#fff; ">
                        <h3>DISCOUNT HINGGA Rp. 100.000 </h3> <span>*syarat dan ketentuan berlaku</span>
                    </span>
                    </div>

                    <div class="">
                        <a href="{{route('welcome.kategori')}}">
                            <button class="btn btn-default" >BELANJA</button>
                        </a>
                        <a href="{{ route('login') }}">
                            <button class="btn btn-default" >Login</button>
                        </a>
                    </div>
                
                </div>
            </div>

            <div class="col-md-6">
            </div>

        </div>
    </div>





</section> --}}


<section style="padding-top:100px;">
    <div class="col-xs-12 col-md-12">
        <div class="row">


            <div class="col-xs-4 col-md-4">
            </div>
            <!-- CONTENT  LOGIN-->
            <div class="col-xs-4 col-md-4">
                <div class="text-center">
                    <img src="{{ asset('file/images/logo/logo.jpeg')}}" width="150px" alt="">
                </div> 
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header " style="background-color:#E70012; color:#fff;">{{ __('Login') }}</div>

                    <div class="card-body ">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4" >
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        {{ __('Login') }}
                                    </button>
                                    
                                </div>
                                {{-- <div class="col-md-6">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link btn-xs" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-md-4">
            </div>


        </div>
    </div>
</section>


{{-- <div class="">
    <a href="{{route('welcome.kategori')}}">
        <button class="btn btn-default" >BELANJA</button>
    </a>
    <a href="{{ route('login') }}">
        <button class="btn btn-default" >Login</button>
    </a>
</div> --}}
@endsection