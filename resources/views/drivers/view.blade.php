@extends('layouts.app')

@section('content')
 @include('drivers.view_content')
@endsection
@section('scripts')
    <script src="{{asset('lib/angular/angular.min.js')}}"></script>
    <script src="{{asset('js/controllers/drivers.min.js')}}"></script>
@endsection