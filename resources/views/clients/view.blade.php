@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="center">
            <img src="{{asset('img/man.svg')}}" alt="client" width="10%">
        </div>

        <div class="banner shadow-1" style="margin-top: 50px;">
            <h2>
                <a class="cyan-text" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Clients</span>
            </h2>
        </div>
        <hr class="divider-icon">
        <div class="row">
            <div class="col-sm-12" >
                <div class="card-large card-default card-body">

                </div>
            </div>
        </div>

    </div>

@endsection