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
                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 header-column--xs">
                    <div class="header-left header-left-back header-left--sm ">
                        <a href="{{route('edit-course',['course_id'=>$course['course_id']])}}" class="btn btn__theme  btn__with-icon btn-theme--">
                            Go Back
                        </a>
                    </div>
                </div>
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
                                                        Edit Lesson Deails : {{$course['title']}}
                                                    </h3>
                                                </div>

                                            </div>

                                            <div class="section-content inline-content">
                                                <div id="tab-1" class="theme-tab-content current">
                                                      <div class="container zero-margin">
                                                          <section id="add_new_lesson" >

                                                                  <form method="post" action="{{route('update-lesson')}}" enctype="multipart/form-data" />
                                                                      @csrf
                                                                      <input  type="hidden" name="course_id" value="{{$course['course_id']}}">
                                                                      <input  type="hidden" name="type" value="{{$course['type']}}">
                                                                      <input  type="hidden" name="lesson_id" value="{{$lesson['lesson_id']}}">
                                                                      <div class="container-fluid">
                                                                          <div class="row">
                                                                              <div class="col-12 col-lg-12 px-0">
                                                                                  <div class="form-container">
                                                                                      <div class="form-group form-input-container">
                                                                                          <label for="">Lesson Title</label>
                                                                                          <input type="text" class="form-control input__theme @error('title') is-invalid @enderror" value="{{$lesson['title']}}" name="title" id="" aria-describedby="helpId" placeholder="Type Title">
                                                                                          @error('title')
                                                                                          <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                          @enderror
                                                                                  </div>

                                                                                          <div class="form-group form-input-container">
                                                                                              <label for="">Lesson
                                                                                                  Overview</label>
                                                                                              <textarea class="form-control input__theme textarea__theme  @error('overview') is-invalid @enderror" name="overview" id="" rows="3" placeholder="Type">{{$lesson['overview']}}</textarea>
                                                                                              @error('overview')
                                                                                              <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                              </span>
                                                                                              @enderror
                                                                                          </div>
                                                                                   @if($course['type']==ONLINE_COURSE)

                                                                                                  <div class="form-group form-input-container ">
                                                                                                      <label for="">Summary</label>
                                                                                                      <textarea class="form-control input__theme textarea__theme  @error('summary') is-invalid @enderror" name="summary" id="" rows="3" placeholder="Type">{{$lesson['summary']}}</textarea>
                                                                                                      @error('summary')
                                                                                                      <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                      </span>
                                                                                                      @enderror
                                                                                                  </div>

                                                                                            <div class="form-group form-input-container ">
                                                                                              <label for="">Upload Video</label>
                                                                                              <input type="file" name="video"  class=" @error('video') is-invalid @enderror">
                                                                                                @error('video')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                  @enderror
                                                                                            </div>


                                                                                  @endif
                                                                              </div>
                                                                          </div>

                                                                      </div>
                                                                  </div>
                                                                @if($course['type']==OFFLINE_COURSE)
                                                                  <div class="container-fluid">

                                                                      <div class="row">
                                                                          <div class="col-12 col-lg-4 px-0">
                                                                              <div class="form-container">

                                                                                  <div class="form-group form-input-container select-time-picker">
                                                                                      <label for="">Lesson Date</label>
                                                                                      <input type="text" value="{{$lesson['date']}}" class="form-control input__theme @error('date') is-invalid @enderror" name="date" id="datepicker" aria-describedby="helpId" placeholder="Select Date">
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
                                                                                      <input type="text" class="form-control input__theme timepicker @error('start_time') is-invalid @enderror"  value="{{$lesson['start_time']}}" name="start_time" id="" aria-describedby="helpId" placeholder="Select Time">
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
                                                                                      <input type="text" class="form-control input__theme timepicker @error('end_time') is-invalid @enderror"
                                                                                             value="{{$lesson['end_time']}}"  name="end_time" id="" aria-describedby="helpId" placeholder="Select Time">
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
                                                                @endif
                                                                  <div class="container-fluid">

                                                                      <div class="row">
                                                                          <div class="col-12 col-lg-4 px-0">
                                                                              <div class="form-container">

                                                                                  <div class="button-group">
                                                                                      <input type="submit" value="Update Lesson"  class="btn btn__theme" />

                                                                                  </div>


                                                                              </div>
                                                                          </div>

                                                                      </div>
                                                                  </div>
                                                                  </form>


                                                          </section>
                                                             </div>
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
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
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
                                                            <div class="form-group form-input-container  " id="location" >
                                                                <label for="">Course Location</label>
                                                                <input type="text" value="{{$course['location']}}" class="form-control input__theme  @error('location') is-invalid @enderror" name="location" id="" aria-describedby="helpId" placeholder="Type Location">
                                                                @error('location')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <input type="hidden" name="lat" value="41.2131313">
                                                            <input type="hidden" name="lng" value="41.2131313">
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
                                                            <input type="text" value="{{$course['end_date']}}"  id="to"
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

                                                            <input type="submit" class="btn btn__theme"  value="Update"/>
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

