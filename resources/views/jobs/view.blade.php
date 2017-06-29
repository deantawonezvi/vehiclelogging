@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="center">
            <img src="{{asset('img/inspection.svg')}}" alt="jobs" width="10%">
        </div>

        <div class="banner shadow-1" style="margin-top: 50px;">
            <h2>
                <a class="cyan-text" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Jobs</span>
            </h2>
        </div>

    </div>

@endsection