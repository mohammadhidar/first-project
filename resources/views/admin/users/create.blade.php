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
<div class="x_content" style="margin: 20px auto; width: 50%;">
    <form action="{{isset($user) ? route('users.update',$user->id):route('users.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($user))
        @method('PUT')
        @endif

        <div class="form-group">
            <label>Enter Name</label>
            <input class="@error('name') is-invalid @enderror form-control" type="text"
                value="{{ isset($user) ?$user->name:''}}" name="name"
                class="form-control  @error('name') is-invalid @enderror" required>
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label>Enter Email</label>
            <input class="form-control" type="text" value="{{ isset($user) ?$user->email:''}}" name="email"
                class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p class="help-block">Pleace input a email</p>
        </div>

        <div class="form-group">
            <label>Enter Password</label>
            <input class="form-control" type="password" value="{{ isset($user) ?$user->password:''}}" name="password"
                class="form-control  @error('password') is-invalid @enderror" required>
            @error('password')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p class="help-block">Pleace input a password</p>
        </div>

        @isset($user)

        <div class="form-group">
            <label>Currently Role</label>
            <p class="help-block"><strong>{{$user->role}}</strong></p>
        </div>
        @endisset

        <div class="form-group">
            <label for="selectRole">Select a role</label>
            <select class="form-control" name="role" id="selectRole">

                <option value="doctor">Doctor</option>
                <option value="nurse">Nurse</option>
            </select>
        </div>

        <div class="form-group">
            <label for="selectRole">Select a Status</label>
            <select class="form-control" name="status" id="selectRole">
                <option value="active">Active</option>
                <option value="decline">Decline</option>
            </select>
        </div>


        <button type="submit" style="margin-left: 150px" class="btn btn-info">

            {{ isset($user) ?"Update User":"Register User"}}
        </button>

    </form>
</div>


@endsection