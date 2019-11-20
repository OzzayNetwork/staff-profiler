@extends('layouts.create-app')
   @section('content')
   <section class="container-fluid the-container2 p-5">
        <div class="row the-row">
            <div class="col-12 col-md-9 col-lg-8 col-xl-6 form-container">
                <div class="title-container">
                    <div class="the-txt  mr-5 mb-3">
                        <h2 class="text-capitalize text-left mb-3">Welcome aboard john!</h2>
                        <p class="paragraph text-left mb-5">Hi! We at Nouveta LTD would love to welcome you into the Veta family. With that being said, we would love to know some professional &amp; fun facts about you. Kindly fill the form below. Feel at home and welcome once again. </p>
                    </div>
                  
                  <div class="the-form p-md-5 p-3">
                  <form method="POST" name="usrform" enctype="multipart/form-data" id="usrform" action="{{route('posts.store')}}">
                    @csrf
                      <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="prof-img">
                                <label class="the-img" for="my-picture">
                                <img src="#" id="prof-picture" class="">
                                <div class="the-camera-icon"> <i data-feather="camera"></i>
                                  <p class="text-capitalize">upload your picture</p>
                                </div>
                                </label>
                              </div>
                        </div>
                        <div class="col-12 col-lg-7 p-0 m-0">
                            <div class="col-12">
                                <label>Your full name</label>
                                <input type="text" name="names" placeholder="What is your official name?" autofocus class="form-control">
                              </div>
                              <div class="col-12">
                                <label>Your Alias/Nickname</label>
                                <input type="text" name="aka" placeholder="What other name(s) do you go by?" class="form-control">
                              </div>
                              <div class="col-12">
                                  <label>facebook account name

                                  </label>
                                  <input type="text" name="aka" placeholder="facebook link" class="form-control" title="copy and paste the facebook link yo your account">
                                </div>
                            </div>

                            
    
                        
    
                              
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <label>Tell us something small about yourself</label>
                          <textarea rows="4" name="about"   cols="50" form="usrform" class="form-control" placeholder="About Me ..."></textarea>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label>What is something unique about you?</label>
                          <textarea name="unik" rows="3"  cols="50"  form="usrform" class="form-control" placeholder="Unique fact about me ..."></textarea>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                          <label>What are some interesting facts about you?</label>
                          <textarea rows="3" cols="50" name="intresting" form="usrform" class="form-control" placeholder="Interesting fact about me ..."></textarea>
                        </div>
                        <div class="col-12">
                          <p>For this section, enter at least three skills and at lead four items on the interests and hobbies section. remember to press enter once you are done with entering an item into the text box. </p>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                          <label>My Skills</label>
                          <div class="chips chips-placeholder-skills" id="skills-input"></div>
                          {{-- hidden skills --}}
                        <div class="col-12 col-lg-6 d-none">
                            <label>skills</label>
                            <input type="text" id="the-skills" name="skills" placeholder="What other name(s) do you go by?" class="form-control">
                          </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                          <label>Interests and Hobbies</label>
                          <div class="chips chips-placeholder" id="hobby-input"></div>
                          {{-- hidden hobbies --}}
                          <div class="col-12 col-lg-6 d-none">
                              <label>hobbies</label>
                              <input type="text" id="the-hobbies" name="hobbies" placeholder="What other name(s) do you go by?" class="form-control">
                            </div>
                          <input type="file" name="cover_img" id="my-picture" class="d-none" onChange="showimage.call(this)" accept="image/gif, image/jpeg, image/png" required>
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
