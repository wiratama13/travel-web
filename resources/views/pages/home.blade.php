@extends('layouts.app')

@section('title')
Travel
@endsection

@section('content')

      <!-- Header -->

      <header class="text-center">
        <h1 data-aos="fade-up"  data-aos-duration="1000">
          Explore Many Places
          <br />
          In One Click
        </h1>
        <p class="mt-3" data-aos="fade-up">
          You will see beautiful
          <br />
          moment you never see before
        </p>
        <a href="#travel-package" class="btn btn-get-started px-4 mt-4" data-aos="fade-up">
          Get Started
        </a>
      </header>


      <!-- Statistik -->

      <main>

        <section class="section-network" id="section-network" >
          <div class="container">
            <div class="row">
              <div class="col-md-4" data-aos="fade-up"  data-aos-duration="1000">
                <h2>Our Network</h2>
                <p>
                  Companies are trusted us
                  <br />
                  more than just a trip
                </p>
              </div>
              <div class="col-md-8 text-center" >
                <img class="img-partners" src="{{url('frontend/img/logos_partner.jpg')}}" alt="" data-aos="fade-up">
              </div>
            </div>
          </div>
        </section>
        
        <section class="section-popular" id="travel-package">
          <div class="container">
            <div class="row">
              <div class="col text-left section-popular-heading" data-aos="fade-up"  data-aos-duration="1000">
                <h2>Travel Pakcage</h2>
                <p>
                  Something that you never try
                  <br />
                  before in this world
                </p>

                <p>Swipe to more <i class="fa-solid fa-arrow-right"></i></p>
              </div>
            </div>
          </div>
        </section>
        <section class="section-popular-content" id="popularContent" data-aos="fade-up"  data-aos-duration="1000">
        <div class="container">
          <div class="section-popular-travel row justify-content-center owl-carousel owl-theme" id="owl-demo">
            @foreach ($items as $item)
           <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card-travel text-center d-flex flex-column item"
            style="background-image: url('{{$item->galleries->count() ? Storage::url
            ($item->galleries->first()->image) : '' }}')";
             >
              <div class="travel-country">{{$item->location}}</div>
              <div class="travel-location">{{$item->title}}</div>
              <div class="travel-button mt-auto">
                <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                  View Details
                </a>
              </div>
            </div>
          </div>

           @endforeach

          </div>
        </div>
    
        </section>

        <section class="about-us mt-5" id="about" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
           <div class="row d-flex justify-content-md-between">
           <div class="col-md-6">
            <h1>About us</h1>
           <p> We are a team of passionate travel enthusiasts who believe that travel is one of the most enriching experiences a person can have. Our mission is to inspire and empower people to explore the world and create unforgettable memories.</p>
          
           <p> We believe that travel is not just about visiting new places, but also about immersing oneself in the local culture, meeting new people, trying new things, and learning about different ways</p>
          </div>
          <div class="col-md-6 text-right img-fluid ">
            <img src="{{ url('frontend/img/picture-about.jpg') }}" class="image-about" alt="">
          </div>
         </div>
        </div>
        </section>
      </main>


@endsection
