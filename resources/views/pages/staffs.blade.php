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
				<tr>
					<td class="d-flex align-items-center">
						<img src="../img/116838.jpg" class="img rounded-circle mr-3">
						<div>
							<h6 class="p-0 m-0">fname sname</h6>
							<p class="text-uppercase mb-0 pb-0">title</p>
						</div>
					</td>
									
					
				</tr>
				<tr>
					
					<td class="d-flex align-items-center">
						<a href="new_member.html">
							<img src="../img/116838.jpg" class="img rounded-circle mr-3">
							</a>
						<div>
							<h6 class="p-0 m-0">fname sname</h6>
							<p class="text-uppercase mb-0 pb-0">title</p>
						</div>
						
					</td>
						
									
					
				</tr>
				<tr>
					<td class="d-flex align-items-center">
						<img src="../img/116838.jpg" class="img rounded-circle mr-3">
						<div>
							<h6 class="p-0 m-0">fname sname</h6>
							<p class="text-uppercase mb-0 pb-0">title</p>
						</div>
					</td>
									
					
				</tr>
				<tr>
					<td class="d-flex align-items-center">
						<img src="../img/116838.jpg" class="img rounded-circle mr-3">
						<div>
							<h6 class="p-0 m-0">fname sname</h6>
							<p class="text-uppercase mb-0 pb-0">title</p>
						</div>
					</td>
									
					
				</tr>
				<tr>
					<td class="d-flex align-items-center">
						<img src="../img/116838.jpg" class="img rounded-circle mr-3">
						<div>
							<h6 class="p-0 m-0">fname sname</h6>
							<p class="text-uppercase mb-0 pb-0">title</p>
						</div>
					</td>
									
					
				</tr>
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