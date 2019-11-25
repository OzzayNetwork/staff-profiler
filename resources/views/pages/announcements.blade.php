
@extends('layouts.create-app')
@section('content')
@include('includes.nav')
<section class="container-fluid home d-flex justify-content-center align-items-center" id="home" style="margin-top: -6%;" >
    <h1 class="coming-soon">Coming Soon...</h1>
     
   </section>
 
 @endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker" ).datepicker();
} );
</script>
@endsection