
@extends('layouts.create-app')
@section('content')
<link rel="stylesheet" href="{{asset('css/swanky-style.css')}}">
<div class="container-fluid the-container2 p-5 d-flex align-items-center">
    <div class="row w-100 h-100">
        <div class="m-5 p-5 w-100">
                <div class="mt-3 col-6"> <img src="../img/nouveta-white.png" class="responsive-img mb-4 animated slideInDown" style=" max-height: 80px;"> </div>
                <div class="col-sm-11 col-md-10 col-lg-10 mt-5 animated slideInUp">
                    <h2 class="text-white text-left">The Nouveta Family Network</h2>
                    <p>Click on login to continue</p>

                    {{-- styled button --}}
                    <div class='swanky_title__social'>
                        <a href='/login' class="text-capitalize d-flex justify-content-center">
                          <div class='slide'>
                            <div class='arrow black-text'>
                              <i data-feather="arrow-right"></i>
                            </div>
                          </div>
                          <img src='../img/smile.png'>
                          <span class="the-text-text mt-2 pt-1">log in to continue</span>
                        </a>
                      </div>
                    {{-- styled button --}}
                    <span class="text-capitalize button underline-text d-none"><a href="/login" class="text-white">Login To continue</a></span>
                </div>
        </div>
    </div>
</div>


@endsection
