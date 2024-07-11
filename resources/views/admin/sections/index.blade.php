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
    <div class="col-lg-8" style="margin:10px auto;">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Sections Click here -> to add new section
                    <a href="{{route('sections.create')}}" class="btn btn-primary" style="border-radius: 20px;">
                        Create
                    </a>
                </strong>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>About</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                        <tr>
                            <th scope="row">{{$section->name}}</th>
                            <td>{{$section->about}}</td>
                            <td>
                                <a href="{{route('sections.show',$section->id)}}" class="btn btn-primary">
                                    Update
                                </a>
                                <form action="{{route('sections.destroy',$section->id)}}" method="POST" class="float-left btn-sm ml-2">
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
</div>
@endsection