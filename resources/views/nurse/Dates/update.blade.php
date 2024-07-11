@extends('nurse.dashboard')

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
    <form action="{{ route('nurse.store',$date->id)}}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label>Enter date</label>
            <input class="@error('date') is-invalid @enderror form-control" type="date" name="date" class="form-control  @error('date') is-invalid @enderror" required>
            @error('date')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label>Enter time</label>

            <input class="@error('day') is-invalid @enderror form-control" type="time" name="time" class="form-control  @error('day') is-invalid @enderror" required>
            @error('day')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">
            <label>Message To Patient</label>
            <input class="@error('messageToUser') is-invalid @enderror form-control" type="text" name="messageToUser" class="form-control  @error('messageToUser') is-invalid @enderror" required>
            @error('messageToUser')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label>Message To Doctor</label>
            <input class="@error('messageToDoctor') is-invalid @enderror form-control" type="text" name="messageToDoctor" class="form-control  @error('messageToDoctor') is-invalid @enderror" required>
            @error('messageToDoctor')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <input type="hidden" name="clinic_id" value="{{$date->clinic_id}}">
        <input type="hidden" name="user_id" value="{{$date->user_id}}">

        <button type="submit" style="margin-left: 150px" class="btn btn-info">

            Save Date



        </button>

    </form>
</div>






































@endsection