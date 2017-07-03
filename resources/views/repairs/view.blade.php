@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('lib/sweetalert/dist/sweetalert.css')}}">
@endsection

@section('content')
    @include('repairs.view_content')
@endsection
@section('scripts')
    <script src="{{asset('lib/angular/angular.min.js')}}"></script>
    <script src="{{asset('js/controllers/repairs.js')}}"></script>
    <script src="{{asset('lib/sweetalert/dist/sweetalert.min.js')}}"></script>
@endsection