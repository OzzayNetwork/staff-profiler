@extends('layouts.app')
   @section('content')

        <h1>{{$title}}</h1>
        @if(count($services)>0)
            <ul>
                @foreach($services as $service)
                <li>{{$service}}</li>
                @endforeach
            </ul>
        @endif
        <p>some text on the text above here</p>

    @endsection
