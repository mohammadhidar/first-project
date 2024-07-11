@extends('layouts.clinic')
@section('content')
<div class="contact_section layout_padding">
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Clinic</th>
                        <th scope="col">Day</th>
                        <th scope="col">Time</th>
                        <th scope="col">Alternative Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td> {{$book->clinic->name}} </td>
                        <td> {{$book->day}} </td>
                        <td> {{$book->time1}} </td>
                        <td> {{$book->time2}} </td>
                        <td> {{$book->status}} </td>
                        <td>
                            <a href="{{route('book.show',$book->id)}}" class="btn-sm btn-primary">Update Date</a>
                            <form action="{{route('book.delete',$book->id)}}" method="POST" class=" btn btn-sm">
                                @csrf
                                @method('DELETE')
                                <button class="btn-sm btn-danger">Cancel Date</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection