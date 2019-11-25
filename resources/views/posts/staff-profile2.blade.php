@extends('layouts.app')
   @section('content')
   @include('includes.nav')
<section class="container-fluid the-container p-0">
        
    <div class="wrapper"> 
        <!-- Main Start -->
        <div class="main-section">
                <div class="page-section">
                       <div class="container-fluid">
                            <div class="col-12 p-4 mb-4 text-white">
                                    <h1 class="text-capitalize text-white">the team</h1>
                                    <p class="text-white">below is your fellow workmates, click on any to have a look at their profile</p>
                                    <hr class="text-white bg-transparent">
                            </div>
                       </div>
                    </div>
          <div class="page-section" style="margin-bottom:90px;">
            <ul class="row cs-history-slider">
                    @if(count($posts)>0)
                    @foreach($posts as $post)
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p-0">
                <div class="cs-media">
                  <figure> <img src="../img/history-01.jpg" alt="" />
                    <figcaption>Baba yao</figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5>
                        @if($post->user_id==Auth::id())
                        {{'Me'}}
                    @else
                    {{explode(' ', $post->user->name)[0]}} {{explode(' ', $post->user->name)[1]}} 
                    @endif
                  </h5>
                  <h6 class="text-white">{{$post->user->title}}</h6>
                  <p>Through its curriculum of liberal arts and sciences an pre-professional programs, Stone hill College provides an education of the highest.</p>
                </div>
              </li>
              @endforeach
              @else
                    <p>no profiles found</p>
                @endif
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p-0">
                <div class="cs-media">
                  <figure> <img src="../img/history-02.jpg" alt="" />
                    <figcaption>1908</figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5>Register for classes</h5>
                  <p>Through its curriculum of liberal arts and sciences an pre-professional programs, Stone hill College provides an education of the highest.</p>
                </div>
              </li>
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p-0">
                <div class="cs-media">
                  <figure> <img src="../img/history-03.jpg" alt="" />
                    <figcaption>1963</figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5>Register for classes</h5>
                  <p>Through its curriculum of liberal arts and sciences an pre-professional programs, Stone hill College provides an education of the highest.</p>
                </div>
              </li>
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p-0">
                <div class="cs-media">
                  <figure> <img src="../img/history-04.jpg" alt="" />
                    <figcaption>2000</figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5>Register for classes</h5>
                  <p>Through its curriculum of liberal arts and sciences an pre-professional programs, Stone hill College provides an education of the highest.</p>
                </div>
              </li>
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p-0">
                <div class="cs-media">
                  <figure> <img src="../img/history-05.jpg" alt="" />
                    <figcaption>2004</figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5>Register for classes</h5>
                  <p>Through its curriculum of liberal arts and sciences an pre-professional programs, Stone hill College provides an education of the highest.</p>
                </div>
              </li>
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 selected p-0">
                <div class="cs-media">
                  <figure> <img src="../img/Blogs-grid-img2.jpg" alt="" />
                    <figcaption>1963</figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5>Register for classes</h5>
                  <p>Through its curriculum of liberal arts and sciences an pre-professional programs, Stone hill College provides an education of the highest.</p>
                </div>
              </li>
            </ul>
          </div>
          <!-- Main End --> 
        </div>
      </div>
    </section>
      @endsection