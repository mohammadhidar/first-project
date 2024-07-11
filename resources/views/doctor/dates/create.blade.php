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
<div class="x_content" style="margin: 20px auto; width: 50%;">
    <form action="{{isset($date) ? route('dates.update',$date->id):route('dates.store',$clinic_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($date))
        @method('PUT')
        @endif

        <div class="form-group">
            <label>Enter Day</label>
            <input class="@error('day') is-invalid @enderror form-control" type="text" value="{{ isset($date) ?$date->day:''}}" name="day" class="form-control  @error('day') is-invalid @enderror" required>
            @error('day')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label>Enter Start At</label>
            <input class="@error('start_at') is-invalid @enderror form-control" type="time" value="{{ isset($date) ?$date->day:''}}" name="start_at" class="form-control  @error('start_at') is-invalid @enderror" required>
            @error('start_at')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label>Enter End At</label>
            <input class="@error('end_at') is-invalid @enderror form-control" type="time" value="{{ isset($date) ?$date->end_at:''}}" name="end_at" class="form-control  @error('end_at') is-invalid @enderror" required>
            @error('break')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label>EnterBreak time</label>
            <input class="@error('break') is-invalid @enderror form-control" type="text" value="{{ isset($date) ?$date->break:''}}" name="break" class="form-control  @error('break') is-invalid @enderror" required>
            @error('break')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>

        <input type="hidden" name="clinic_id" value="{{$clinic_id}}">








        <button type="submit" style="margin-left: 150px" class="btn btn-info">

            {{ isset($date) ?"Update Date":"Add Date"}}



            </b utton>

    </form>
</div>

















@endsection