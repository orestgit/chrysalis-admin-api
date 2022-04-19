@extends('../user_layouts.master')
@section('content')
<div class="container-fluid main-container">
    @include('user_layouts.header')
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
                                                <form method="post" action="{{route('update-user-profile')}}" enctype="multipart/form-data">
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
                                                        <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group form-input-container">
                                                                <label for="">
                                                                    <h4 class="h4" for="">Update Profile Picture</h4>
                                                                </label>
                                                                <input type="file" name="image">
                                                            </div>
                                                        </div>
                                                    <div class="clearfix" ></div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <div class="form-group form-input-container">
                                                            <label for="">
                                                                    <h4 class="h4" for="">facebook</h4>
                                                                </label>
                                                                <input type="text"  class="form-control input__theme" name="facebook" value="{{$user_bio['facebook']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <div class="form-group form-input-container">
                                                            <label for="">
                                                                    <h4 class="h4" for="">instagram</h4>
                                                                </label>   
                                                            <input type="text" id="title" class="form-control input__theme" name="instagram" value="{{$user_bio['instagram']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <div class="form-group form-input-container">
                                                        <label for="">
                                                                    <h4 class="h4" for="">linkedin</h4>
                                                                </label>
                                                                <input type="text" id="title" class="form-control input__theme" name="linkedin" value="{{$user_bio['linkedin']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <div class="form-group form-input-container">
                                                        <label for="">
                                                                    <h4 class="h4" for="">twitter</h4>
                                                                </label>       
                                                        <input type="text" id="title" class="form-control input__theme" name="twitter" value="{{$user_bio['twitter']}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group form-input-container">
                                                            <label for="">
                                                                    <h4 class="h4" for="">Country</h4>
                                                                </label>
                                                                <input type="text"  class="form-control input__theme" name="country" value="{{$user_bio['country']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group form-input-container">
                                                            <label for="">
                                                                    <h4 class="h4" for="">City</h4>
                                                                </label>   
                                                            <input type="text" id="title" class="form-control input__theme" name="city" value="{{$user_bio['city']}}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group form-input-container">
                                                        <label for="">
                                                                    <h4 class="h4" for="">About</h4>
                                                                </label>       
                                                                <textarea class="form-control input__theme textarea__theme" name="about" id="" rows="3" >{{$user_bio['about']}}</textarea>
                                                            </div>
                                                        </div>
                                                    @if($education!=null)
                                                        @foreach($education as $educat)
                                                    <div class="row">
                                                        <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="form-group form-input-container">
                                                            <input type="hidden"  class="form-control input__theme" name="id[]" value="{{$educat->education_id}}">

                                                                <input type="date" id="date" class="form-control input__theme" name="old_year[]" value="{{$educat->year}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group form-input-container">
                                                                <input type="text" id="title" class="form-control input__theme" name="old_degreetitle[]" value="{{$educat->details}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                        <a class="dropdown-item del-record"
                                                          data-url="{{route('delete-education',['id'=>$educat->education_id])}}">Delete</a>
                                                        </div>
                                                    </div>
                                                        @endforeach
                                                    @endif
                                                    <div id="education_field"></div>
                                                <div class="row">
                                                    <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <div class="container-fluid px-0">
                                                                <div class="card-inner__end card-paid-get">
                                                                    <input type="button" id="add_education" class="btn btn__theme btn__w100 w-100" value="Add Education" >
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                                                    <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <div class="container-fluid px-0">
                                                                <div class="card-inner__end card-paid-get">
                                                                    <input type="submit" class="btn btn__theme btn__w100 w-100" value="Sumbit" >
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

<script>
    $(document).ready(function(){
  $("#add_education").click(function(){
   var html ='<div class="row"><div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6"><div class="form-group form-input-container"><input type="date" id="date" class="form-control input__theme" name="year[]" ></div></div><div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6"><div class="form-group form-input-container"><input type="text" id="title" class="form-control input__theme" name="degreetitle[]" ></div></div></div>';
            $( "#education_field" ).append(html);

        });
});
</script>

@endsection
