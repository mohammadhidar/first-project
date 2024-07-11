@extends('admin.dashboard')

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
                <strong class="card-title">Clinics Click here -> to add new Clinic
                    <a href="{{route('clinics.create')}}" class="btn btn-primary" style="border-radius: 20px;">
                        Create
                    </a>
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
                                <a href="{{route('clinics.show',$clinic->id)}}" class="btn btn-primary">
                                    Edit</a>
                                <form action="{{route('clinics.destroy',$clinic->id)}}" method="POST" class="btn-sm ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>

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