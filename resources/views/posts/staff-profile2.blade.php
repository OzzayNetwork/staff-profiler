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
                                    <h2 class="text-capitalize text-white">the team</h2>
                                    <p class="text-white paragraph text-capitalize">Hover on an image to have a deeper look on the person</p>
                                    <hr class="text-white bg-transparent">
                            </div>
                       </div>
                    </div>
          <div class="page-section m-0">
            <ul class="row cs-history-slider">
                    @if(count($posts)>0)
                    @foreach($posts as $post)
              <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p-0">
                <div class="cs-media">
                  <figure> <img src="cover_images/{{$post->pic}}"  alt="staff-img" />
                    <figcaption class="text-capitalize">
                            {{$post->user->title}}
                    </figcaption>
                  </figure>
                </div>
                <div class="cs-text">
                  <h5 class="mb-0">
                        @if($post->user_id==Auth::id())
                        {{'Me'}}
                    @else
                    {{explode(' ', $post->user->name)[0]}} {{explode(' ', $post->user->name)[1]}} 
                    @endif
                  </h5>
                  <h6 class="text-white text-capitalize">AKA {{$post->nickname}}</h6>
                  <hr class="bg-white">
                  <p class="mb-2">{{$post->about}}</p>
                  <div class="mt-2 more-link"><a href="#" class="">More</a></div>
                  @if($post->github!="")
                    <a href="{{$post->github}}" target="new" class="git-acc text-white" title="view {{$post->user->name}}'s github profile"><i data-feather="github"></i></a>
                        @endif
                        @if($post->facebook!="")
                        <a href="{{$post->facebook}}" target="new" class="facebook-acc mx-2 text-white" title="view {{$post->user->name}}'s facebook account page"><i data-feather="facebook"></i></a>
                        @endif
                        <i data-feather="phone-call" class="mr-2 text-white"></i><span class="more-link"><a href="tel://{{$post->user->phone}} " class=""> {{$post->user->phone}} </a></span>
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