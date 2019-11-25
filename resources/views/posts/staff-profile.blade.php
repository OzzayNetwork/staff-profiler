@extends('layouts.app')
   @section('content')
   @include('includes.nav')
<section class="container-fluid the-container">
		
		<div class="row m-5 the-row text-capitalize position-relative">
			<div class="col-lg-6 col-md-8 p-3 col-sm-12">
				<h2 class="text-capitalize mb-3">
					@if($post->id==Auth::id())
						My profile
					@else
						{{$firstname}}'s profile
					@endif
				</h2>
				<h5 class="mb-2">{{$post->user->name}} a.k.a {{$post->nickname}}</h5>
				<p class="text-uppercase primary-color mb-2 the-title">{{$post->user->title}}</p>				
				<div class="col-3 mb-3 line secondary-color bg-sec mb-3"></div>
				<h5 class="title mb-3 text-capitalize">about me</h5>
				<p class="mb-4 mt-3">{{$post->about}}</p>
				
				<div class="skills col-12 ml-0 pl-0 mb-3">
					<h5 class="title mb-3">Skills</h5>
					<div class="skills-container mb-4">
							@if($myskillsArray>0)
							@foreach($myskillsArray as $skill)
								<span class="skill p-2 text-uppercase cell">
									{{$skill}}
								</span>
							@endforeach
							@endif						
					</div>
				</div>
				
				<div class="intresrts col-12 col-12 ml-0 pl-0 mt-3 mb-4">
					<h5 class="title text-capitalize">intrest & hobbies</h5>
					<div class="skills-container">
							@if($myhobbiesArray>0)
							@foreach($myhobbiesArray as $hobby)
								<span class="skill p-2 text-uppercase cell">
									{{$hobby}}
								</span>
							@endforeach
							@endif
						
					</div>
				</div>
				
				<div class="skills col-12 ml-0 pl-0 mb-3 mt-3">
					
					
						<h5 class="title text-capitalize">interesting facts about me</h5>
					<p class="">{{$post->facts}}</p>
				</div>
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
				<div class="profile-container rounded-circle">
                        
                        <img src="/cover_images/{{$post->pic}}") alt="{{$post->pic}}">
                        
					
				</div>
			</div>
			@if($post->created_at->diffInDays(Carbon\Carbon::now()) <= 7)
			<div class="position-absolute new-staff"><span>New Member!!!</span></div>
			@endif
		</div>
    </section>
    @endsection