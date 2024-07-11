@extends('layouts.clinic')

@section('content')
<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @isset($dates)
                    <div role="alert">
                        Your Dates
                        <br>
                        and <a href="{{route('book.index')}}">Your books</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Clinic </th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                @foreach($dates as $date)

                                <th scope="row">{{$date->id}}</th>
                                <td>{{$date->clinic->name}}</td>
                                <td>{{$date->date}} </td>
                                <td>{{$date->time}} </td>
                                <td>{{$date->messageToUser}} </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="{{asset('images/users/'.Auth::user()->photo)}}"
                            alt="Avatar" title="Change the avatar">
                    </div>
                </div>
                <!-- Information -->

                <form class="form-horizontal" method="post" enctype="multipart/form-data"
                    action="{{route('updateProfile',Auth::user()->id)}}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name"
                            class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Email"
                            class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="messages"><i class="fa fa-map-marker user-profile-icon"></i>Address</label>
                        <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Address"
                            class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="messages">Mobile</label>
                        <input type="text" name="mobile" value="{{Auth::user()->mobile}}" placeholder="Mobile"
                            class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="messages">Photo</label>
                        <input type="file" name="photo" id="exampleInputFile">
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i>Update
                        Profile</button>

                </form>

                <a class="nav-link" style="color:red" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <br />



















            </div>

        </div>
    </div>
</div>
@endsection