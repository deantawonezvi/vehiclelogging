@extends('layouts.app')

@section('content')
    <div class="container">
        <center>
            <img src="{{asset('img/crane.svg')}}" alt="crane" width="15%">
        </center>
        <div class="row">
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title cyan-text">
                        <img src="{{asset('img/crane.svg')}}" alt="crane" width="20%">
                        <a class="cyan-text clickable">CRANES</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title cyan-text">
                        <img src="{{asset('img/driver.svg')}}" alt="crane" width="20%">
                        <a class="cyan-text clickable">DRIVERS</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title cyan-text">
                        <img src="{{asset('img/inspection.svg')}}" alt="crane" width="20%">
                        <a class="cyan-text clickable">JOBS</a>
                    </h3>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top: 45px">
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title cyan-text">
                        <img id="#anim-img1" src="{{asset('img/man.svg')}}" alt="crane" width="20%">
                        <a class="cyan-text clickable">CLIENTS</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title cyan-text">
                        <img id="#anim-img1" src="{{asset('img/analysis.svg')}}" alt="crane" width="20%">
                        <a class="cyan-text clickable">REPORTS</a>
                    </h3>

                </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title cyan-text">
                        <img id="#anim-img1" src="{{asset('img/settings.svg')}}" alt="crane" width="20%">
                        <a class="cyan-text clickable">SETTINGS</a>
                    </h3>

                </div>
            </div>
        </div>

    </div>

@endsection
