
<!-- navbar -->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{url('frontend/img/logo-travel@2x.png')}}" alt="" srcset="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-3 ml-auto">
          <li class="nav-item mx-md-2">
            <a class="nav-link active" href="{{ route('home') }}">Home</a>
          </li>

          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#section-network">Network</a>
          </li>

          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#travel-package">Paket Travel</a>
          </li>

          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#about">About</a>
          </li>
        </ul>
        @guest
          <!-- mobile button -->
        <form action="" class="forn-inline d-sm-block d-md-none">
          @csrf
          <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';">
            Masuk
          </button>
        </form>

        <!-- Destrop button -->
        <form action="{{url('logout')}}" class="form-inline my-2 my-lg-0 d-none d-md-block">
          @csrf
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';">
            Masuk
          </button>
        </form>
        @endguest

        @auth

        @auth
          <!-- mobile button -->
        <form action="{{url('logout')}}" class="forn-inline d-sm-block d-md-none" method="POST">
        @csrf
          <button class="btn btn-login my-2 my-sm-0" type="button">
            Keluar
          </button>
        </form>

        <!-- Destrop button -->
        <form action="{{url('logout')}}" class="form-inline my-2 my-lg-0 d-none d-md-block" method="POST">
        @csrf
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" >
            Keluar
          </button>
        </form>
        @endauth

        @endauth
      </div>
    </nav>
  </div>
