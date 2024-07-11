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
<div class="col-md-12 col-sm-12 " style="margin: 20px">
    <div class="x_panel" style="background-color: aquamarine;">
        <div class="x_title">
            <h2>User Profile </h2>

        </div>
        <div class="x_content">
            <div class="col-md-8 col-sm-8  profile_left" style=" margin-top: 20px;margin-right: 10px;  padding: 10px;">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="{{asset('images/users/'.Auth::user()->photo)}}" alt="Avatar" title="Change the avatar">
                    </div>
                </div>
                <!-- Information -->

                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('updateProfile',Auth::user()->id)}}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Email" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="messages"><i class="fa fa-map-marker user-profile-icon"></i>Address</label>
                        <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Address" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="messages">Work At</label>
                        <input type="text" name="work_at" value="{{Auth::user()->work_at}}" placeholder="Work At" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="messages">Mobile</label>
                        <input type="text" name="mobile" value="{{Auth::user()->mobile}}" placeholder="Mobile" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="messages">Photo</label>
                        <input type="file" name="photo" id="exampleInputFile">
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i>Update
                        Profile</button>

                </form>



                <br />



            </div>

        </div>
    </div>
</div>


@stop