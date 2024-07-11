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
    <form action="{{route('booksDates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Enter Message</label>
            <input class="@error('message') is-invalid @enderror form-control" type="text" name="message"
                class="form-control  @error('message') is-invalid @enderror" required>
            @error('message')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>


        <input type="hidden" name="save_date_id" value="{{$save_date_id}}">



        <button type="submit" style="margin-left: 150px" class="btn btn-info">

            Send Your Update



            </b utton>

    </form>
</div>



























@endsection