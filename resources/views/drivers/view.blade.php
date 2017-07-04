@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('lib/sweetalert/dist/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('lib/pickadate/lib/themes/classic.css')}}">
    <link rel="stylesheet" href="{{asset('lib/pickadate/lib/themes/classic.date.css')}}">
@endsection

@section('content')
 @include('drivers.view_content')
@endsection
@section('scripts')
    <script src="{{asset('lib/angular/angular.min.js')}}"></script>
    <script src="{{asset('js/controllers/drivers.js')}}"></script>
    <script src="{{asset('lib/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('lib/pickadate/lib/compressed/picker.js')}}"></script>
    <script src="{{asset('lib/pickadate/lib/compressed/picker.date.js')}}"></script>
    <script>
        $('.date-picker').pickadate({
            selectMonths: true,
            selectYears: true,
            formatSubmit:'dd/mm/yyy'
        });
    </script>
@endsection