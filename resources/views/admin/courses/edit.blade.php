@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session()->get('success')}}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session()->get('error')}}
            </div>
        @endif
        <div class="row wrapper-space-top">

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">

                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container table-card--height p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="section-header section-title-head section-lessons-md">
                                                <div class="section-header__title">
                                                    <h3 class="h3">
                                                        {{$course['title']}}
                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container">
                                                    <ul class="theme-tabs">
                                                        <li class="theme-tab-item current" data-tab="tab-1" id="add_lesson">
                                                            Add Lesson
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content">
                                                <div id="tab-1" class="theme-tab-content current">
                                                    @if($lesson_count>0)

                                                            <div class="table-container table-container-fixed">
                                                                <div class="table-responsive">
                                                                    <table class="table table-variable " id="table-1">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Lesson Title</th>
                                                                            <th>Summary</th>
                                                                            <th>Overview</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($lessons as $lesson)
                                                                            <tr>
                                                                            <td>{{$lesson['title']}}</td>
                                                                            <td>
                                                                                 {{$lesson['summary']}}
                                                                            </td>
                                                                            <td>
                                                                                {{$lesson['overview']}}
                                                                            </td>
                                                                            <td>
                                                                                <div class="dropdown show">
                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    </a>

                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                        <a class="dropdown-item" href="{{route('lesson-detail',['course_id'=> $course['course_id'],'lesson_id'=> $lesson['lesson_id']])}}">View</a>
                                                                                        <a class="dropdown-item "
                                                                                           href="{{route('edit-lesson',['course_id'=> $course['course_id'],'lesson_id'=> $lesson['lesson_id']])}}">Edit</a>
                                                                                        <a class="dropdown-item del-record"
                                                                                           data-url="{{route('delete-lesson',['lesson_id'=>$lesson['lesson_id']])}}">Delete</a>
                                                                                        <a class="dropdown-item" href="{{route('manage-quiz',['lesson_id'=>$lesson['lesson_id']])}}">Manage Quiz</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach



                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            @else
                                                             <div class="container zero-margin">
                                                                 <div class="row">
                                                                     <div class="col-12 col-lg-8 s">
                                                                         <p>
                                                                             Currently there are no lessons, Please add new lessons.
                                                                         </p>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                    @endif

                                                    <section id="add_new_lesson" @if(!old('form_submitted'))class="d-none"@endif>

                                                        <div class="section-header section-title-head section-lessons-md">
                                                            <div class="section-header__title">
                                                                <h4 class="h4">
                                                                    Add New Lesson
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        @if($course['type']==2)
                                                            <form method="post" action="{{route('save-lesson')}}" enctype="multipart/form-data" />
                                                            @csrf
                                                                <input  type="hidden" name="course_id" value="{{$course['course_id']}}">
                                                                <input  type="hidden" name="type" value="{{$course['type']}}">
                                                                <input  type="hidden" name="form_submitted" value="1">
                                                                <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-8 px-0">
                                                                    <div class="form-container">

                                                                            <div class="form-group form-input-container">
                                                                                <label for="">Lesson Title</label>
                                                                                <input type="text" class="form-control input__theme @error('title') is-invalid @enderror" name="title" id="" aria-describedby="helpId" placeholder="Type Title">
                                                                                @error('title')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group form-input-container">
                                                                                <label for="">Lesson
                                                                                    Overview</label>
                                                                                <textarea class="form-control input__theme textarea__theme  @error('overview') is-invalid @enderror" name="overview" id="" rows="3" placeholder="Type"></textarea>
                                                                                @error('overview')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-4 px-0">
                                                                    <div class="form-container">

                                                                            <div class="form-group form-input-container  avatar-upload">

                                                                                <label for="">Generate QR
                                                                                    Code</label>
                                                                                <label class="image-picker-label">
                                                                                    <div id="imagePreview"  class=" qr-code-input  avatar-edit">
                                                                                        <div class="qr-code-view ">
                                                                                            <span  class="browse-btn" id="qr_generator" >  Generate
                                                                                                </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        <input type="hidden" name="qr_image" id="QR_Input" value="{{now()->timestamp}}">
                                                                        <input type="hidden" name="qr_code" id="qr_value" value="">
                                                                        <div id="output" ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                                <div class="container-fluid">

                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="form-group form-input-container select-time-picker">
                                                                                <label for="">Lesson Date</label>
                                                                                <input type="text"  readonly class="form-control input__theme @error('date') is-invalid @enderror" name="date" id="datepicker" aria-describedby="helpId" placeholder="Select Date">
                                                                                @error('date')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="form-group form-input-container select-time-picker">
                                                                                <label for="">Start Time</label>
                                                                                <input type="text" readonly class="form-control input__theme timepicker @error('start_time') is-invalid @enderror" name="start_time" id="start_time" aria-describedby="helpId" placeholder="Select Time">
                                                                                @error('start_time')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="form-group form-input-container select-time-picker">
                                                                                <label for="">End Time</label>
                                                                                <input type="text" readonly class="form-control input__theme timepicker @error('end_time') is-invalid @enderror"  id='end_time' name="end_time" id="" aria-describedby="helpId" placeholder="Select Time">
                                                                                @error('end_time')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>


                                                                        </div>
                                                                    </div>



                                                                </div>

                                                        </div>
                                                            <div class="container-fluid">

                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="button-group">
                                                                                <input type="submit" value="Save Lesson"  class="btn btn__theme" />

                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            </form>
                                                        @else
                                                            <form method="post" action="{{route('save-lesson')}}" enctype="multipart/form-data" />
                                                            @csrf
                                                                <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-12 px-0">
                                                                        <div class="form-container">
                                                                                <div class="form-group form-input-container">
                                                                                    <label for="">Lesson Title</label>
                                                                                    <input type="text" class="form-control input__theme @error('title') is-invalid @enderror" name="title"  value="{{ old('title') }}" id="" aria-describedby="helpId" placeholder="Type Title">
                                                                                    @error('title')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                    <input  type="hidden" name="course_id" value="{{$course['course_id']}}">
                                                                                    <input  type="hidden" name="type" value="{{$course['type']}}">
                                                                                    <input  type="hidden" name="form_submitted" value="1">
                                                                                </div>
                                                                                <div class="form-group form-input-container">
                                                                                    <label for="">Lesson
                                                                                        Overview</label>
                                                                                    <textarea class="form-control input__theme textarea__theme @error('overview') is-invalid @enderror" name="overview"  id="" rows="3" placeholder="Type">{{ old('overview') }}</textarea>
                                                                                    @error('overview')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                </div>
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-12 px-0">
                                                                            <div class="form-container">
                                                                                <div class="form-group form-input-container ">
                                                                                    <label for="">Summary</label>
                                                                                    <textarea class="form-control input__theme textarea__theme  @error('summary') is-invalid @enderror" name="summary" id="" rows="3" placeholder="Type">{{old('summary')}}</textarea>
                                                                                    @error('summary')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 px-0">
                                                                            <div class="form-container">
                                                                                <div class="form-group form-input-container ">
                                                                                    <label for="">Upload Video</label>
                                                                                    <input type="file" name="video"  class=" @error('video') is-invalid @enderror">
                                                                                    @error('video')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="container-fluid">

                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-4 px-0">
                                                                                <div class="form-container">

                                                                                    <div class="button-group">
                                                                                        <input type="submit" class="btn btn__theme" value="Save Lesson">

                                                                                    </div>


                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </form>
                                                        @endif

                                                    </section>
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
                                                    <h4 class="h4">
                                                        Course Details
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="section-content inline-content pb-3">
                                                <div class="form-container">
                                                    <form action="{{route('update-course')}}" method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Type </label>
                                                            <input type="text"  name='type' readonly value="@if($course['type']==ONLINE_COURSE)Online  @else Offline @endif " class="form-control input__theme"  id="" aria-describedby="helpId" >

                                                            <p>You cannot update course type</p>
                                                            @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Title</label>
                                                            <input type="text"  name='title' value="{{$course['title']}}" class="form-control input__theme @error('title') is-invalid @enderror"  id="" aria-describedby="helpId" placeholder="Type title">
                                                            <small class="form-text">
                                                                70 characters max
                                                            </small>
                                                            @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Category</label>
                                                            <select name="course_category" id="" class="wide select @error('course_category') is-invalid @enderror">
                                                                <option value="">Please select coruse category</option>
                                                                @foreach($course_categories as $category)
                                                                    <option value="{{$category->course_category_id}}"
                                                                            @if($course['course_category']==$category->course_category_id) selected @endif
                                                                    >{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('course_category')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Price</label>
                                                            <input type="text" value="{{$course['price']}}" class="form-control input__theme  @error('price') is-invalid @enderror" name="price" id="" aria-describedby="helpId" placeholder="Type Price in tokens">
                                                            @error('price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Overview</label>
                                                            <textarea class="form-control input__theme textarea__theme @error('overview') is-invalid @enderror" name="overview" id="" rows="3" placeholder="Type here...">{{$course['overview']}}</textarea>
                                                            @error('overview')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" name="course_id" value="{{$course['course_id']}}">
                                                        @if($course['type']==OFFLINE_COURSE)
                                                            <div class="form-group form-input-container" id="location">
                                                                <label for="search">Location</label>
                                                                <input type="search" class="form-control input__theme  @error('address') is-invalid @enderror"  value="{{ $course['address'] }}" name='address' id="address"
                                                                       autocomplete="some-random" placeholder="Enter your address"
                                                                       required="">
                                                                @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <input type="hidden" name="lat" id="lat" value="{{ $course['lat'] }}">
                                                            <input type="hidden" name="lng"  id="lng" value="{{ $course['lng'] }}">
                                                        @endif
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Summary</label>
                                                            <textarea class="form-control input__theme textarea__theme @error('summary') is-invalid @enderror" name="summary" id="" rows="3" placeholder="Type here...">{{$course['summary']}}</textarea>
                                                            @error('summary')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Method</label>
                                                            <input type="text" value="{{$course['method']}}" class="form-control input__theme  @error('method') is-invalid @enderror" name="method" id="" aria-describedby="helpId" placeholder="Type Method">
                                                            @error('method')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Per Lesson Duration</label>
                                                            <input type="text" value="{{$course['lesson_duration']}}" class="form-control input__theme  @error('lesson_duration') is-invalid @enderror" name="lesson_duration" id="" aria-describedby="helpId" placeholder="Per Lesson Duration">
                                                            @error('lesson_duration')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Start Date</label>
                                                            <input type="text" value="{{$course['start_date']}}" id="from"
                                                                   class="form-control input__theme date-picker-input datepicker @error('start_date') is-invalid @enderror "
                                                                   name="start_date"   aria-describedby="helpId" placeholder="Select Date">
                                                            @error('start_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">End Date</label>
                                                            <input type="text" value="{{$course['end_date']}}"  id="to" readonly
                                                                   class="form-control input__theme date-picker-input datepicker @error('end_date') is-invalid @enderror "
                                                                   name="end_date"   aria-describedby="helpId" placeholder="Select Date">
                                                            @error('end_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>



                                                        <div class="form-group form-input-container avatar-upload">

                                                            <label for="">Course Thumbnails</label>
                                                            <label class="image-picker-label" for="imageUpload">
                                                                <div id="imagePreview"
                                                                     class="image-picker-container  avatar-edit">
                                                                    <div class="placeholder-view ">
                                                                        <input type='file' name='image' id="imageUpload"
                                                                               accept=".png, .jpg, .jpeg" />

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
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Tags</label>
                                                            <input type="text" class="form-control input__theme @error('tags') is-invalid @enderror"  value="{{$course['tags']}}" name="tags" id="" aria-describedby="helpId" placeholder="Add tags by comma">
                                                            <!-- <input type="text" class="form-control input__theme" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" placeholder="Add tags" /> -->
                                                            @error('tags')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="button-group">

                                                            <input type="submit" class="btn btn__theme"  name="update_course" value="Update"/>
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

