@extends('layouts.success')

@section('title', 'Success Travel')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
       <div class="col text-center">
        <img src="{{url('frontend/img/ic_mail.png')}}" alt="">
        <h2 class="text-center mb-2">Yay! Success</h2>
        <p>We’ve sent you email for trip instruction
            please read it as well</p>
            <a href="/" class="btn btn-home-page px-5 pt-2">
                Home Page
            </a>
       </div>
    </div>
</main>
@endsection


