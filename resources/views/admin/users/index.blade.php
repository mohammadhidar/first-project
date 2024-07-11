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
                <strong class="card-title">Usesrs Click here -> to add new User
                    <a href="{{route('users.create')}}" class="btn btn-primary" style="border-radius: 20px;">
                        Create
                    </a>
                </strong>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->status}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}
                            <td>
                                <a href="{{route('users.show',$user->id)}}" class="btn btn-primary">
                                    Edit</a>
                                <form action="{{route('users.destroy',$user->id)}}" method="POST" class="btn-sm ml-2">
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
    <!-- End  Basic Table  -->
</div>@endsection