@extends('layouts.app')
   @section('content')
   @include('includes.nav')
   <section class="container-fluid the-container">
		<div class="row m-5 text-capitalize the-profile-table">
			<div class="col-12">
				<h3 class="text-capitalize">the team</h3>
				<p>below is your fellow workmeates, click on any to have a look at their profile</p>
				<hr>
				<table id="example" class="table  p-3 profile-table mt-3" style="width:100%">
        <thead>
            @if(Session::has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
            <tr class="d-none">
                <th></th>
            </tr>
        </thead>
        	<tbody class="">
                @if(count($posts)>0)
                    @foreach($posts as $post)
                         <tr class="d-flex justify-content-between row">
                            <td class="d-flex align-items-center w-25">
                                    
                                    <a href="{{route('posts.show', $post->id)}}" class="rounded-circle mr-3 d-flex align-items-center justify-content-center profile-pic-container">
                                                <img src="cover_images/{{$post->pic}}" class="img">
                                            
                                    </a>
                                <div>
                                    <h6 class="p-0 m-0 text-capitalize no-wrap">
                                        {{explode(' ', $post->user->name)[0]}} {{explode(' ', $post->user->name)[1]}}  
                                        @if(!is_null($post->user->created_at))
                                        @if($post->user->created_at->diffInDays(Carbon\Carbon::now()) <= 7)
                                        
                                        <span class="badge badge-pill badge-warning">New</span>
                                        @endif
                                    @endif</h6>


                                    <p class="text-uppercase mb-0 pb-0">{{$post->user->title}}</p>

                                </div>
                            </td>
                           
                            <td class="d-flex align-items-center w-75 justify-content-end">

                                    <span class="mr-5 user-phone"><i data-feather="phone-call" class="mr-2"></i>{{$post->user->phone}}</span>

                                    @if($post->github!="")
                                         <a href="{{$post->github}}" target="new" class="git-acc ml-3" title="view {{$post->user->name}}'s github profile"><i data-feather="github"></i></a>
                                    @endif
                                    @if($post->facebook!="")
                                    <a href="{{$post->facebook}}" target="new" class="facebook-acc mx-3" title="view {{$post->user->name}}'s facebook account page"><i data-feather="facebook"></i></a>

                                    @endif
                                    <div class="dropdown dropleft">
                                        <span class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if(Auth::user()->is_admin)

                                                @if($post->approval_status != 1)
                                                    <a class="dropdown-item" href="{{route('approve-profile', ['id' => $post->id])}}">Approve profile</a>
                                                @endif

                                                @if($post->approval_status = 1 && $post->user->is_admin == 0)
                                                <a class="dropdown-item" href="{{route('approve-profile', ['id' => $post->id])}}">Disapprove profile</a>
                                                @endif

                                                @if($post->user->is_admin)
                                                <a class="dropdown-item" href="{{route('make-admin', ['id' => $post->user_id])}}">Remove admin</a>
                                                @else
                                                <a class="dropdown-item" href="{{route('make-admin', ['id' => $post->user_id])}}">Make admin</a>
                                                @endif

                                                
                                                <a class="dropdown-item" href="#">Freeze account</a>
                                            @endif
                                            <a class="dropdown-item" href="#">Edit profile</a>
                                            
                                          </div>
                                      </div>
                            </td>
                        </tr>
                    @endforeach
                    {{$posts->links()}}

                @else
                    <p>no profiles found</p>
                @endif
				
			</tbody>
            </table>
            </div>
			
		</div>
	</section>
	
    @endsection

    <script>
            $(document).ready(function() {
        $('#example').DataTable();
    } );
        </script>