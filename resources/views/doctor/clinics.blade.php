@extends('doctor.dashboard')

@section('content2')
@if(session()->has('error'))

<div class="alert alert-danger">
    {{session()->get('error')}}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif
<div class="row">
    <div class="col-lg-10" style="margin:10px auto;">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">welcome doctor {{Auth::user()->name}}
                </strong>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>About</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clinics as $clinic)
                        <tr>
                            <td>{{$clinic->name}}</td>
                            <td>{{$clinic->location}}</td>
                            <td>{{$clinic->phone}}</td>
                            <td>{{$clinic->about}}</td>
                            <td>{{$clinic->section->name}}</td>
                            <td>
                                <a href="{{route('dates.index',$clinic->id)}}" class="btn btn-primary">
                                    Dates</a>

                                <i class="fa fa-bars"></i><a href="{{route('booksDates.index',$clinic->id)}}"> Dates
                                    have Accepted
                                </a>





                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End  Bas
ic Table  -->








</div>@endsection
