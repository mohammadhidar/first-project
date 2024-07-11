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
<div class="x_content" style="margin: 20px auto; width: 50%;" >
              <form method="post" action="{{isset($section) ? route('sections.update',$section->id) :
                         route('sections.store')}}"  enctype="multipart/form-data">
                                        @csrf
                        @if (isset($section))
                            @method('PUT')
                        @endif
                                     <div class="form-group">
											<label >Section Name <span class="required">*</span>
											</label>
											<input type="text" name="name" id="name"
                                             value="{{isset($section)? $section->name:''}}"
                                             class="@error('name') is-invalid @enderror form-control">
                                                @error('name')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        <div class="form-group">
											<label>Section About <span class="required">*</span>
											</label>
												<input type="text" name="about" value="{{isset($section)? $section->about:''}}" id="name" class="@error('about') is-invalid @enderror form-control">
                                                @error('about')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>







                                        <div class="form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>





@endsection
