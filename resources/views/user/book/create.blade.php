@extends('layouts.clinic')
@section('content')

<div class="contact_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="contact_text">Create your book </h1>
                <form action="{{isset($book) ?route('book.update',$book->id): route('book.store',$clinic->id)}}" method="post">
                    @csrf
                    @if (isset($book))
                    @method('PUT')
                    @endif
                    <div class="form-group">
                        <label>Enter day</label>
                        <input type="text" class="email-bt" placeholder="Day" name="day" value="{{ isset($book) ?$book->day:''}}" required>
                    </div>
                    <input type="hidden" name="clinic_id" value="{{ isset($book) ?$book->clinic->id:$clinic->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label>Enter Date</label>
                        <input type="text" class="email-bt" placeholder="Date" name="date" value="{{ isset($book) ?$book->date:''}}" required>
                    </div>
                    <div class="form-group">
                        <label>Enter Time 1</label>
                        <input type="time" class="email-bt" placeholder="Time" name="time1" value="{{ isset($book) ?$book->time1:''}}" required>
                    </div>

                    <div class="form-group">
                        <label>Enter Alternative date</label>
                        <input type="text" class="email-bt" placeholder="Alternative date" name="time2" value="{{ isset($book) ?$book->time2:''}}" required>
                    </div>

                    <div class="form-group">
                        <label>Describe Your State</label>
                        <textarea class="massage-bt" placeholder="Your State" rows="5" id="comment" name="state" value="{{ isset($book) ?$book->state:''}}">

                        @isset($book)
                        {{$book->state}}
                        @endif
                        </textarea>
                    </div>
                    <div class="main_bt">
                        <button class="btn btn-success" type="submit">Register Appointment</button>

                    </div>
                </form>


            </div>
        </div>
    </div>
















    @endsection