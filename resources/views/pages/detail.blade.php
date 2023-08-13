@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
<main>
    <section class="section-details-header"></section>
      <section class="section-details-content" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col pl-4">
           <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                Paket Travel
              </li>
              <li class="breadcrumb-item active">
               Details
              </li>
            </ol>
           </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 p1-lg-0">
            <div class="card card-details">
              <h1>
                {{$item->title}}
              </h1>
              <p>
                {{$item->location}}
              </p>
              @if ($item->galleries->count())
              <div class="gallery">
                <div class="xzoom-container w-100">
                  <img src="{{Storage::url($item->galleries->first()->image)}}" class="xzoom mb-2" id="xzoom-default" xoriginal="{{Storage::url($item->galleries->first()->image)}}">
                </div>

                <div class="xzoom-thumbs">
                    @foreach ($item->galleries as $gallery)
                        <a href="{{Storage::url($gallery->image)}}">
                          <img src="{{Storage::url($gallery->image)}}" class="xzoom-gallery" width="128" xpreview="{{Storage::url($gallery->image)}}"
                          />
                        </a>
                    @endforeach
                </div>
              </div>
              @endif
              <div class="features row mt-3 d-flex justify-content-center">
                <div class="col-md-4">
                  <div class="description shadow">
                <img src="{{url('frontend/img/ic_event.png')}}" class="features-image"alt="" srcset="">
                    <h3>Featured Event</h3>
                    <p>{{$item->featured_event}}</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="description shadow" >
                  <img src="{{url('frontend/img/ic_language.png')}}" class="features-image"alt="" srcset="">
                    <h3>Language</h3>
                    <p>{{$item->language}}</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="description shadow">
                  <img src="{{url('frontend/img/ic_foods.png')}}" class="features-image"alt="" srcset="">
                    <h3>Foods</h3>
                    <p>{{$item->foods}}</p>
                  </div>
                </div>

              </div>
              <h2 class="mt-4">Tentang Wisata</h2>
              <p>
              {!! $item->about!!}
              </p>
             
          
            </div>

          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>Members are going</h2>
              <div class="members my-2">
              <img src="{{url('frontend/img/members-1.png')}}" class="member-image" alt="">
              <img src="{{url('frontend/img/members-2.png')}}" class="member-image" alt="">
              <img src="{{url('frontend/img/members-3.png')}}" class="member-image" alt="">
              <img src="{{url('frontend/img/members-4.png')}}" class="member-image" alt="">
              <img src="{{url('frontend/img/members-5.png')}}" class="member-image" alt="">
              </div>
              <hr>
              <h2>Trip Informations</h2>
              <table class="trip-information">
                <tr>
                  <th width="50%">Date of departure</th>
                  <td width="50%" class="text-right">
                   {{\Carbon\Carbon::create($item->date_of_departure)->format(' F n, Y')}}
                  </td>
                </tr>
                <tr>
                  <th width="50%">Duration</th>
                  <td width="50%" class="text-right">
                  {{$item->duration}}
                  </td>
                </tr>
                <tr>
                  <th width="50%">Type</th>
                  <td width="50%" class="text-right">
                   {{$item->type}}
                  </td>
                </tr>
                <tr>
                  <th width="50%">Price</th>
                  <td width="50%" class="text-right">
                    ${{$item->price}}/ person
                  </td>
                </tr>
              </table>
            </div>
            <div class="join-container">
             @auth
            <form action="{{ route('checkout_process', $item->id)}}" method="post">
                @csrf
                <button class="btn btn-block btn-join-now mt-3 py-2">
                    Join Now
                </button>
            </form>
             @endauth

             @guest
             <a href="{{url('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                Login or Register to Join
              </a>
             @endguest
            </div>
          </div>
        </div>
        </div>
      </section>
  </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.min.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth:500,
      title : false,
      tint : '#333',
      Xoffset : 15,
    });
  });
</script>
@endpush
