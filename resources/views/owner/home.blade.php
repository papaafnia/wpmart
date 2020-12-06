@extends('layouts.owner.app')

@section('content')


  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('/file/images/slider/slide-1.jpg'); -webki-filter: brightness: (250%);">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Mamba</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. </p>
                <a style="text-decoration: none; background:#000;" href="#about" class="btn-get-started btn-xl animate__animated animate__fadeInUp scrollto">DAFTAR SEKARANG</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('/file/images/slider/slide-2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. </p>
                <a style="text-decoration: none; background:#000;" href="#about" class="btn-get-started btn-xl animate__animated animate__fadeInUp scrollto">DAFTAR SEKARANG</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('/file/images/slider/slide-3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. </p>
                <a style="text-decoration: none; background:#000;" href="#about" class="btn-get-started btn-xl animate__animated animate__fadeInUp scrollto">DAFTAR SEKARANG</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
{{-- <section style="width: 100%; min-height: 700px; background: #E70012;">

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
                        <a href="{{ route ('catalog.index')}}">
                            <button class="btn btn-default" >BELANJA</button>
                        </a>
                    </div>
                
                </div>
            </div>

            <div class="col-md-6">
            </div>

        </div>
    </div>





</section> --}}

@endsection