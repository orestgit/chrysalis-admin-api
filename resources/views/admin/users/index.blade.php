@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="main-left-container">
                    <section>
                        <?php
                            $users_listing = array(
                              0         =>  'all',
                              1         =>  'Admin',
                              2         =>  'Doctors',
                              5         =>  'Users'
                            );
                        ?>
                        <div class="card">
                            <div class="card-container table-card--height p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">

                                            <div class="section-header section-title-head section-lessons-md">
                                                <div class="section-header__title">
                                                    <h3 class="h3">
                                                        {{count($users)}} Users
                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container">
                                                    <ul class="theme-tabs">
                                                        @foreach($users_listing as $key=>$value)
                                                            <li class="theme-tab-item @if($key==0) current @endif" data-tab="tab-{{$key}}">
                                                                {{ucfirst($value)}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content">
                                                @foreach($users_listing as $key=>$value)
                                                <div id="tab-{{$key}}" class="theme-tab-content  @if($key==0) current @endif ">
                                                    <div class="table-container">
                                                        <div class="table-responsive">
                                                            <table class="table table-variable table__lg" id="table-{{$key}}">
                                                                <thead>
                                                                <tr>
                                                                    <th>Full Name</th>
                                                                    <th>Date Created</th>
                                                                    <th>City</th>
                                                                    <th>Country</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($users as $user)
                                                                    @if($key==0)
                                                                      <tr>
                                                                    <td>
                                                                        <div class="profile-image-container">
                                                                            @if($user['image']==null)
                                                                              <img src="https://via.placeholder.com/150"  >
                                                                            @endif
                                                                            <img src="../../assets/images/others/profile-img.jpg">
                                                                        </div>
                                                                        {{$user['first_name'].' '. $user['last_name']}}
                                                                     </td>
                                                                    <td>  {{$user['created_at']->format('d M Y ')}}</td>
                                                                    <td> {{$user['country']}}</td>
                                                                    <td> {{$user['city']}}</td>

                                                                    <td>
                                                                        <span class="badge <?=$user['status']==1 ? "badge__success" : "badge__warning";?>">
                                                                            <?php echo $user['status']==1 ? "Active" : "Blocked";?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class=" dropdown show">
                                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            </a>

                                                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                                                                                <a class="dropdown-item" href="{{route('user-profile',['user_id'=>$user['id']])}}">View</a>

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                    @elseif($key==1 && $user['user_role']==2)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    @if($user['image']==null)
                                                                                        <img src="https://via.placeholder.com/150"  >
                                                                                    @endif
                                                                                    <img src="../../assets/images/others/profile-img.jpg">
                                                                                </div>
                                                                                {{$user['first_name'].' '. $user['last_name']}}
                                                                            </td>

                                                                            <td>  {{$user['created_at']->format('d M Y ')}}</td>
                                                                            <td> {{$user['country']}}</td>
                                                                            <td> {{$user['city']}}</td>
                                                                            <td>
                                                                                 <span class="badge <?=$user['status']==1 ? "badge__success" : "badge__warning";?>">
                                                                                    <?php echo $user['status']==1 ? "Active" : "Blocked";?>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <div class=" dropdown show">
                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    </a>

                                                                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                                                                                        <a class="dropdown-item" href="{{route('user-profile',['user_id'=>$user['id']])}}">View</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @elseif($key==5 && $user['user_role']==5)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    @if($user['image']==null)
                                                                                        <img src="https://via.placeholder.com/150"  >
                                                                                    @endif
                                                                                    <img src="../../assets/images/others/profile-img.jpg">
                                                                                </div>
                                                                                {{$user['first_name'].' '. $user['last_name']}}
                                                                            </td>

                                                                            <td>  {{$user['created_at']->format('d M Y ')}}</td>
                                                                            <td> {{$user['country']}}</td>
                                                                            <td> {{$user['city']}}</td>
                                                                            <td>
                                                                                 <span class="badge <?=$user['status']==1 ? "badge__success" : "badge__warning";?>">
                                                                                    <?php echo $user['status']==1 ? "Active" : "Blocked";?>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <div class=" dropdown show">
                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    </a>

                                                                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                                                                                        <a class="dropdown-item" href="{{route('user-profile',['user_id'=>$user['id']])}}">View</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @else
                                                                        @if($key==2 && $user['user_role']==3 || $user['user_role']==4)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        @if($user['image']==null)
                                                                                            <img src="https://via.placeholder.com/150"  >
                                                                                        @endif
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    {{$user['first_name'].' '. $user['last_name']}}
                                                                                </td>

                                                                                <td>  {{$user['created_at']->format('d M Y ')}}</td>
                                                                                <td> {{$user['country']}}</td>
                                                                                <td> {{$user['city']}}</td>
                                                                                <td>
                                                                               <span class="badge <?=$user['status']==1 ? "badge__success" : "badge__warning";?>">
                                                                                    <?php echo $user['status']==1 ? "Active" : "Blocked";?>
                                                                                </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class=" dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="{{route('user-profile',['user_id'=>$user['id']])}}">View</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                <div class="main-right-container main-p-0 p-0">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="section-header ">
                                                <div class="section-header__title">
                                                    <h3 class="h3">
                                                        Add New User
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="section-content inline-content pb-3">
                                                <div class="form-container">
                                                    <form action="{{route('add-user')}}" method="post" >
                                                        @csrf
                                                        <div class="form-group form-input-container">
                                                            <label for="">User Role</label>
                                                            <select name="user_role" id="" class="wide select  @error('user_role') is-invalid @enderror">
                                                                <option value="">Please select user role</option>
                                                                <option value="1" @if(old('user_role')==2) selected @endif>Admin</option>
                                                                <option value="2" @if(old('user_role')==3) selected @endif>Doctor</option>
                                                            </select>
                                                            @error('user_role')
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Email Address</label>
                                                            <input type="email" class="form-control input__theme  @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="" aria-describedby="helpId" placeholder="Type Email">
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Add Personal Message</label>
                                                            <textarea class="form-control input__theme textarea__theme textarea-message @error('message') is-invalid @enderror" name="message" id="" rows="3" placeholder="Type">{{old('message')}}</textarea>
                                                            @error('message')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="button-group">
                                                            <input type="submit" value="Add User" class="btn btn__theme light-shadow">
                                                        </div>
                                                    </form>
                                                </div>
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
