@extends('layouts.create-app')
@section('content')
<div class="container-fluid the-container2 p-5 ">
    <div class="row justify-content-center align-items-center  w-100">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <center class="">
                <div class="the-form p-md-5 px-5">
                        <div class="the-txt mb-3">
                                <h2 class="text-capitalize text-left mb-3">Create announcement</h2>
                                <p class="paragraph text-left">Enter the necessary details</p>
                                <hr class="color-white">
                            </div>
                    <form method="POST" action="{{ route('announcements.store') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="title" class="float-left">Announcement title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="details" class="float-left">Details of the announcement</label>
                                <input id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" required autocomplete="details" autofocus>

                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="category" class="float-left">Select the announcement category</label>
                                  <select class="form-control" id="category" name="category">
                                    <option value=" ">Select the announcement category</option>
                                    <option value="general">General</option>
                                    <option value="promotion">Promotion</option>
                                    <option value="birth">New Baby</option>
                                    <option value="wedding">Wedding</option>
                                    <option value="death">Death</option>
                                    
                                  </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-12">
                              <label for="employee" class="float-left">Select the employee concerned</label>
                              <select class="form-control" id="employee" name="user_id">
                                <option value=" ">All employees</option>
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn2 w-100">
                                    POST
                                </button>

                                <div class="col-12 pt-3 px-0">
                                        @if (Route::has('password.request'))
                                        <a class="text-capitalize text-white float-left" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-3 col-6 d-flex align-items-center justify-content-center"> <img src="../img/nouveta-white.png" class="responsive-img"> </div>
            </center>
        </div>
    </div>
</div>


@endsection
