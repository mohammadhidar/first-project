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
    <form action="{{isset($clinic) ? route('clinics.update',$clinic->id):route('clinics.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($clinic))
        @method('PUT')
        @endif

        <div class="form-group">
            <label>Enter Name</label>
            <input class="@error('name') is-invalid @enderror form-control" type="text"
                value="{{ isset($clinic) ?$clinic->name:''}}" name="name"
                class="form-control  @error('name') is-invalid @enderror" required>
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label>Enter Location</label>
            <input class="form-control" type="text" value="{{ isset($clinic) ?$clinic->location:''}}" name="location"
                class="form-control @error('location') is-invalid @enderror" required>
            @error('location')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p class="help-block">Pleace input a location</p>
        </div>

        <div class="form-group">
            <label>Enter Phone</label>
            <input class="form-control" type="number" value="{{ isset($clinic) ?$clinic->phone:''}}" name="phone"
                class="form-control  @error('phone') is-invalid @enderror" required>
            @error('phone')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p class="help-block">Pleace input a phone</p>
        </div>

        <div class="form-group">
            <label>Enter A Details</label>
            <input class="form-control" type="text" value="{{ isset($clinic) ?$clinic->about:''}}" name="about"
                class="form-control  @error('about') is-invalid @enderror" required>
            @error('about')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p class="help-block">Pleace input a about this clinic</p>
        </div>

        @isset($clinic)

        <div class="form-group">
            <label>Doctor Name</label>
        </div>
        @endisset

        <div class="form-group">
            <label for="selectRole">Select a doctor</label>
            <select class="form-control" name="user_id" id="selectRole">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectRole">Select a nurse</label>
            <select class="form-control" name="nurse_id" id="selectRole">
                @foreach($nurses as $nurse)
                <option value="{{$nurse->id}}">{{$nurse->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectRole">Select a section</label>
            <select class="form-control" name="section_id" id="selectRole">
                @foreach($sections as $section)
                <option value="{{$section->id}}">{{$section->name}}</option>
                @endforeach
            </select>
        </div>





        <button type="submit" style="margin-left: 150px" class="btn btn-info">

            {{ isset($clinic) ?"Update Clinic":"Add Clinic"}}

            </b utton>

    </form>
</div>


@endsection