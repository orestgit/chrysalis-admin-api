@extends('admin_layouts.master')
@section('content')
<div class="container-fluid main-container">
    @include('admin_layouts.header')
     <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-xl-3 col-md-3 col-sm-3">
                                            <div class="setting-profile-image">
                                                @if(Auth::user()->image==null)
                                                    <img src="https://via.placeholder.com/150">
                                                @else
                                                    <img src="{{asset("uploads/users/".Auth::user()->image)}}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-9 col-lg-9 col-md-9 col-sm-9 px-0">
                                            <div class="setting-user-profile">
                                                <h3 class="h3">
                                                    {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                                                </h3>

                                                <ul class="px-0 mt-5">
                                                    <li>
                                                            <span>
                                                                <img class="contact-icon"
                                                                     src="../../assets/images/icons/message-icon.svg">
                                                               {{Auth::user()->email}}
                                                            </span>
                                                    </li>
                                                    <li class="pl-2">
                                                            <span>
                                                                <img class="contact-icon"
                                                                     src="../../assets/images/icons/telephone-icon.svg">
                                                              {{Auth::user()->phone}}
                                                            </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session()->get('error')}}
                    </div>
                @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session()->get('success')}}
                        </div>
                    @endif
                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="setting-user-input">
                                                <form method="post" action="{{route('update-admin-profile')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                    <div class="row align-items-center">

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">First Name</h4>
                                                                </label>
                                                                <input type="text" value="{{Auth::user()->first_name}}" class="form-control input__theme  @error('first_name') is-invalid @enderror" name="first_name" id="" aria-describedby="helpId" placeholder="First Name">
                                                                @error('first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Last Name</h4>
                                                                </label>
                                                                <input type="text" value="{{Auth::user()->last_name}}" class="form-control input__theme @error('last_name') is-invalid @enderror" name="last_name" id="" aria-describedby="helpId" placeholder="Last Name">
                                                                @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Email</h4>
                                                                </label>
                                                                <input type="email" readonly value="{{Auth::user()->email}}" class="form-control input__theme" name="email" id="" aria-describedby="helpId" placeholder="Email">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Current Password</h4>
                                                                </label>
                                                                <input type="password" class="form-control input__theme" name="current_password" id="" aria-describedby="helpId" placeholder="Password">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">New Password</h4>
                                                                </label>
                                                                <input type="password" class="form-control input__theme" name="new_password" id="" aria-describedby="helpId" placeholder="Password">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Confirm Password</h4>
                                                                </label>
                                                                <input type="password" class="form-control input__theme" name="confirm_password" id="" aria-describedby="helpId" placeholder="Confirm Password">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Country</h4>
                                                                </label>
                                                                <select name="countries" id="country" name="country" class="nice-select form-control w-100">
                                                                    <option value="">Please select country</option>
                                                                            @foreach($countries as $country)
                                                                                <option value="{{$country->id}}"
                                                                                        @if($user_bio && $user_bio['country']== $country->name) selected @endif
                                                                                >{{$country->name}}</option>
                                                                            @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">State</h4>
                                                                </label>
                                                                <select name="states" id="states" name="state" class="nice-select form-control w-100">
                                                                    @if($user_bio && $user_bio['state'])
                                                                        <option value="">{{$user_bio['state']}}</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">City</h4>
                                                                </label>
                                                                <select name="cities" id="cities"  class="nice-select form-control w-100">
                                                                    @if($user_bio && $user_bio['city'])
                                                                        <option value="">{{$user_bio['city']}}</option>
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Contact</h4>
                                                                </label>
                                                                <input type="text" value="{{Auth::user()->phone}}" class="form-control input__theme @error('phone') is-invalid @enderror" name="phone" id="" aria-describedby="helpId" placeholder="Contact">
                                                                @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">About</h4>
                                                                </label>
                                                                <textarea name="about" id="" cols="30" rows="10" class="form-control">@if ($user_bio) {{$user_bio['about']}} @endif</textarea>
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Facebook</h4>
                                                                </label>
                                                                <input type="text"   @if($user_bio) value="{{$user_bio['facebook']}}" @endif  class="form-control input__theme" name="facebook" id="" aria-describedby="helpId" placeholder="Facebook">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Twitter</h4>
                                                                </label>
                                                                <input type="text" @if($user_bio) value="{{$user_bio['twitter']}}"  @endif class="form-control input__theme" name="twitter" id="" aria-describedby="helpId" placeholder="Twitter">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Instagram</h4>
                                                                </label>
                                                                <input type="text" class="form-control input__theme" @if($user_bio) value="{{$user_bio['instagram']}}" @endif name="instagram" id="" aria-describedby="helpId" placeholder="Instagram">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Linkedin</h4>
                                                                </label>
                                                                <input type="text" @if($user_bio) value="{{$user_bio['linkedin']}}" @endif class="form-control input__theme" name="linkedin" id="" aria-describedby="helpId" placeholder="Linkedin">
                                                                <div class="error">error</div>
                                                            </div>
                                                        </div>
                                                        @if(sizeof($user_education)>0)
                                                            @foreach($user_education as $education)
                                                                <div id="{{$education->education_id}}" class="w-100">

                                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12 d-inline-block float-left">
                                                                            <div class="form-group form-input-container">
                                                                                <label>Details</label>
                                                                                <input class="form-control input__theme"  required  name="details_{{$education->education_id}}" placeholder="" value="{{$education->details}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12 d-inline-block float-left">
                                                                            <div class="form-group form-input-container">
                                                                                <label>Year</label>
                                                                                <input class="form-control  input__theme education_field date_picker"  required type="text" name="year_{{$education->education_id}}" placeholder="" value="{{$education->year}}"   >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12"><a class="btn btn-danger delete_education_row pull-right existing_record" data-id="{{$education->education_id}}">Delete</a></div>
                                                                        <br>

                                                                </div>
                                                            @endforeach

                                                        @endif
                                                        <input type="hidden" name="ids">
                                                        <div id="education_div" class="w-100"></div>

                                                            <div class="col-lg-12 text-center clarfix ">
                                                                <a href="#"  class="btn btn__theme w-25  pull-right d-block mt-2" id="add_education"  data-count="0">Add Education</a>
                                                            </div>

                                                        <div class="clearfix"></div>
                                                        <div class="form-group form-input-container avatar-upload  d-inline-block col-6 col-lg-6">
                                                            <h4 class="h4">Image</h4>
                                                            <br>
                                                            <label class="image-picker-label" for="imageUpload">
                                                                <div id="imagePreview"
                                                                     class="image-picker-container  avatar-edit">

                                                                    <div class="placeholder-view ">
                                                                        <input type='file' name="image" class="@error('image') is-invalid @enderror" id="imageUpload"
                                                                               accept=".png, .jpg, .jpeg" />
                                                                        @error('image')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                         <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                        @enderror

                                                                        <span class="browse-btn">
                                                                                        Browse Files
                                                                                    </span>
                                                                        <span class="browse-desc">
                                                                                        Min. 1170px wide, Max 2mb
                                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>


                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                            <div class="container-fluid px-0">
                                                                <div class="card-inner__end card-paid-get">
                                                                    <input type="submit" class="btn btn__theme pull-right " value="Sumbit" >
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    <!-- end -->
</div>

@endsection
