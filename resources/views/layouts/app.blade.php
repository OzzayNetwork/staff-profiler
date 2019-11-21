<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','staff profile')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
        <link rel="stylesheet" href="{{asset('css/nw_staff_css.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    </head>
    <body>
        {{-- @include('includes.nav') --}}
            @yield('content')

           <!-- scripts-->
            <script src="{{asset('js/popper.min.js')}}"></script> 
            <script src="{{asset('js/jquery.min.js')}}"></script> 
            <script src="{{asset('js/materialize.min.js')}}"></script> 
            <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script> 
            <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

            <script>
                feather.replace();
            </script>
	
            <!-- scripts-->
    </body>
</html>
