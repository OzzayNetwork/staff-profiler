@extends('layouts.create-app')
   @section('content')
   @include('includes.nav')
   <section class="container-fluid the-container p-5">
     
        <div class="row the-row">
          <div class="col-12 col-md-3 col-lg-4 col-xl-6 greet-img h-100">
            <div class="prof-img d-none">
              <label class="the-img" for="my-picture">
              <img src="#" id="prof-picture" class="">
              <div class="the-camera-icon"> <i data-feather="camera"></i>
                <p class="text-capitalize">upload your picture</p>
              </div>
              </label>
            </div>
            <div class="greetings-img h-75"> <img src="../img/bg.svg"> </div>
          </div>
          <div class="col-12 col-md-9 col-lg-8 col-xl-6 form-container">
            <div class="title-container">
              <h2 class="text-capitalize">Register employee</h2>
              <p class="paragraph">Fill in the details of the employee you'd like to add to Nouveta. </p>
              <div class="the-form p-md-5 px-5">
              <form method="POST" name="usrform" enctype="multipart/form-data" id="usrform" action="{{route('users.store')}}">
                @csrf
                  <div class="row">
                    <div class="col-6 ">
                      <label>Employee's Name</label>
                      <input type="text" name="name" placeholder="Enter the employee's full name" autofocus class="form-control" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group col-6">
                      <label for="gender">Select the gender</label>
                      <select class="form-control" id="gender" name="gender">
                        <option value=" ">--employee's gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        
                      </select>
                    </div>
                    <div class="col-12">
                      <label for="gender"></label>
                      
                    </div>

                    <div class="col-12">
                      <label>Employee's Title</label>
                      <input type="text" placeholder="Enter employee's title eg Backend Developer" class="form-control" name="title" value="{{old('title')}}" required>
                    </div>

                    
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <label>Enter the employee's email</label>
                      <input rows="4"  cols="50" form="usrform" class="form-control" placeholder="Email..." name="email" value="{{old('email')}}" required></input>
                    </div>
                    
                    <div class="col-12 col-md-6">
                      <label>Enter the employee's phone number</label>
                      <input rows="3"  cols="50"  form="usrform" class="form-control" placeholder="Phone number" name="phone" value="{{old('phone')}}" required></input>
                    </div>
                    
                    <div class="col-12 d-flex flex-column mb-2 mt-3">
                        @include('includes.messages')
                      <button class="btn2" type="submit">SUBMIT</button>
                    
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
	
    @endsection
<script type="text/javascript">
  <
</script>