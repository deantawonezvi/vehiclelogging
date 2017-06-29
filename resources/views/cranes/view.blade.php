@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="center">
            <img src="{{asset('img/crane.svg')}}" alt="crane" width="10%">
        </div>

        <div class="banner shadow-1" style="margin-top: 50px;">
            <h2>
                <a class="red-text" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Cranes</span>
            </h2>
        </div>

        <hr class="divider-icon">
        <div class="row">
            <div class="col-sm-12" >
                <div class="card-large card-default card-body">
                    <h3 class="left">CRANES [100]</h3>

                    <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle red-text"></i></a></h3>
                    <br>
                    <table class="responsive-table bordered striped">
                        <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Model
                            </th>
                            <th>
                                Driver
                            </th>
                        </tr>
                        </thead>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">ADD CRANE</h4>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary red white-text">Save changes</button>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>

    </div>

@endsection