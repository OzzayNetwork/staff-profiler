
@extends('layouts.create-app')
   @section('content')
   @include('includes.nav')
   <section class="container-fluid the-container2 p-5">
        <div id="you_hover" class="row the-row">
            <div class="col-12 col-md-9 col-lg-8 col-xl-6 form-container">
                <div class="title-container">
                    <div class="the-txt  mr-5 mb-3">
                        <h2 class="text-capitalize text-left mb-3">Welcome aboard {{Auth::user()->name}}!</h2>
                        <p class="paragraph text-left mb-5">Hi! We at Nouveta LTD would love to welcome you into the Veta family. With that being said, we would love to know some professional &amp; fun facts about you. Kindly fill the form below. Feel at home and welcome once again. </p>
                    </div>
                  
                  <div class="the-form p-md-5 p-3">
                    @include('includes.messages')
                  <form method="POST" name="usrform" enctype="multipart/form-data" id="usrform" action="{{route('posts.store')}}">
                    @csrf
                      <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="prof-img">
                                <label class="the-img" for="my-picture">
                                <img src="#" id="prof-picture" class="">
                                <div class="the-camera-icon"> <i data-feather="camera"></i>
                                  <p class="text-capitalize">upload a profile</p>
                                </div>
                                </label>
                              </div>
                        </div>
                        <div class="col-12 col-lg-7 p-0 m-0">
                            <div class="col-12">
                                <label>what's your Nickname</label>
                                <input type="text" name="nickname" placeholder="eg Maskio Pepe" autofocus class="form-control" title="write anything, we love to have fun" required >
                              </div>
                              <div class="col-12">
                                <label>facebook (optional)</label>
                                <input type="url" name="facebook" pattern="https?://.+" placeholder="eg https://www.facebook.com/nouvetaltd" title="copy paste your facebook account link" class="form-control">
                              </div>
                              <div class="col-12">
                                  <label>Git hub (optional)</label>
                                <input type="url" name="github" pattern="https?://.+" placeholder="eg https://github.com/nouvetaLtd" title="copy paste your github account link" class="form-control">
                                </div>
                            </div>
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <div class="col-md-6 col-12 pl-0">
                                  <label class="text-capitalize">date of birth</label>

                                  <input class="form-control" placeholder="select your date of birth" id="datepicker" value="{{ old('dob') }}"  type="text" name="dob">                           
                                </div>
                          </div>

                        {{-- skills and hobbies --}}
                        <div class="col-12 col-lg-6 mb-2">
                            <label>Interests and Hobbies</label>
                            <div class="chips chips-placeholder" id="hobby-input" title="eg traveling, cycling..."></div>
                            {{-- hidden hobbies --}}
                            <div class="col-12 col-lg-6 d-none">
                                <label>hobbies</label>
                                <input type="text" id="the-hobbies" name="hobbies" placeholder="What other name(s) do you go by?" class="form-control" required>
                              </div>
                            <input type="file" name="cover_img" id="my-picture" class="d-none" onChange="showimage.call(this)" accept="image/gif, image/jpeg, image/png" required>
                          </div>
                          
                        <div class="col-12 col-md-6 mb-2">
                          <label>My Skills</label>
                          <div class="chips chips-placeholder-skills" id="skills-input" title="both professional and social skills eg PHP, communication"></div>
                          {{-- hidden skills --}}
                        <div class="col-12 col-md-6 d-none">
                            <label>skills</label>
                            <input type="text" id="the-skills" name="skills" placeholder="What other name(s) do you go by?" class="form-control" required>
                          </div>
                        </div>
                        {{-- skills and hobbies --}}
                        <div class="col-12 mb-2">
                          <label>give us a bio about yourself</label>
                          <textarea rows="4" name="about"   cols="50" form="usrform" class="form-control" placeholder="About Me ..." title="eg your education background and so on" required></textarea>
                        </div>
                        <div class="col-12 mb-2">
                          <label>what are some of the intresting facts about you?</label>
                          <textarea name="facts" rows="3"  cols="50"  form="usrform" class="form-control" placeholder="Intresting fact about me ..." title="dont be afraid of letting us know the special gifts and likea about you" required></textarea>
                        </div>
                       
                        

                        
                        
                        <div class="col-12 d-flex flex-column mb-2 mt-3">
                            
                          <button class="btn2" type="submit">SUBMIT</button>
                        
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          <div class="col-12 col-md-3 col-lg-4 col-xl-6 greet-img h-100">
            <div class="welcome-msg position-relative">
                <div class="the-txt position-fixed mr-5 d-none">
                    <h2 class="text-capitalize text-left">Welcome aboard</h2>
                    <p class="paragraph text-left">Hi! We at Nouveta LTD would love to welcome you into the Veta family. With that being said, we would love to know some professional &amp; fun facts about you. Kindly fill the form below. Feel at home and welcome once again. </p>
                </div>
            </div>
            <div class="greetings-img h-75"> <img src="../img/bg.svg"> </div>
          </div>
          
        </div>
      </section>
	
    @endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker({
    changeYear:true,
    changeMonth:true,

  });
} );
</script>
@endsection