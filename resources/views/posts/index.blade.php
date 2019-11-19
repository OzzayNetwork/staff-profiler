@extends('layouts.app')
   @section('content')
   <section class="container-fluid the-container">
		<div class="row m-5 text-capitalize the-profile-table">
			<div class="col-12">
				<h3 class="text-capitalize">the team</h3>
				<p>below is your fellow workmeates, click on any to have a look at their profile</p>
				<hr>
				<table id="example" class="table  p-3 profile-table mt-3" style="width:100%">
        <thead>
            <tr class="d-none">
                <th></th>
            </tr>
        </thead>
        	<tbody>
                @if(count($posts)>0)
                    @foreach($posts as $post)
                         <tr>
                            <td class="d-flex align-items-center">
                                    
                                    <a href="{{route('posts.show', $post->id)}}" class="rounded-circle mr-3 d-flex align-items-center justify-content-center profile-pic-container">
                                            @if($post->pic=="")
                                                <img src="storage/cover_images/noimage.jpg" class="img">
                                            @else
                                                <img src="storage/cover_images/{{$post->pic}}" class="img">
                                            @endif
                                    </a>
                                <div>
                                    <h6 class="p-0 m-0 text-capitalize">{{$post->names}}</h6>
                                    <p class="text-uppercase mb-0 pb-0">{{$post->tittle}}</p>
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