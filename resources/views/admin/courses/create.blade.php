@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->

        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="section-header section-title-head section-lessons-md">
                                                <div class="section-header__title">
                                                    <h3 class="h3">
                                                        Please Add Course To manage lessons and quizes.
                                                    </h3>
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
                                                    <form action="{{route('store-course')}}" method="post"  novalidate enctype="multipart/form-data">
                                                        @csrf

                                                    <div class="form-group form-input-container">
                                                            <label for="">Course Type</label>
                                                            <select name="type" id="course_type" class="wide select @error('type') is-invalid @enderror">
                                                                <option value="">Please select course type</option>
                                                                <option value="1" @if(old('type')==ONLINE_COURSE) selected @endif>Online</option>
                                                                <option value="2" @if(old('type')==OFFLINE_COURSE) selected @endif>Offline</option>
                                                            </select>
                                                            @error('type')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Title</label>
                                                            <input type="text"  name='title' value="{{old('title')}}" class="form-control input__theme @error('title') is-invalid @enderror"  id="" aria-describedby="helpId" placeholder="Type title">
                                                           {{-- <small class="form-text">
                                                                70 characters max
                                                            </small>--}}
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
                                                                            @if(old('course_category')==$category->course_category_id) selected @endif
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
                                                            <input type="text" value="{{old('price')}}" class="form-control input__theme  @error('price') is-invalid @enderror" name="price" id="" aria-describedby="helpId" placeholder="Type Price in tokens">
                                                            @error('price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Overview</label>
                                                            <textarea class="form-control input__theme textarea__theme @error('overview') is-invalid @enderror" name="overview" id="" rows="3" placeholder="Type here...">{{old('overview')}}</textarea>
                                                            @error('overview')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                         <div class="form-group form-input-container @if(empty(old('address')) && old('tpe')==ONLINE_COURSE)d-none @endif" id="location">
                                                            <label for="search">Location</label>
                                                            <input type="search" class="form-control input__theme  @error('address') is-invalid @enderror"  value="{{ old('address') }}" name='address' id="address"
                                                                   autocomplete="some-random" placeholder="Enter your address"
                                                                   required="">
                                                            @error('address')
                                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                        <input type="hidden" name="lat" id="lat" value="{{ old('lat') }}">
                                                        <input type="hidden" name="lng"  id="lng" value="{{ old('lng') }}">

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Summary</label>
                                                            <textarea class="form-control input__theme textarea__theme @error('summary') is-invalid @enderror" name="summary" id="" rows="3" placeholder="Type here...">{{old('summary')}}</textarea>
                                                            @error('summary')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Method</label>
                                                            <input type="text" value="{{old('method')}}" class="form-control input__theme  @error('method') is-invalid @enderror" name="method" id="" aria-describedby="helpId" placeholder="Type Method">
                                                            @error('method')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Per Lesson Duration(Minutes)</label>
                                                            <input type="number" value="{{old('lesson_duration')}}" class="form-control input__theme  @error('lesson_duration') is-invalid @enderror" name="lesson_duration" id="" aria-describedby="helpId" placeholder="Per Lesson Duration">
                                                            @error('lesson_duration')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Start Date</label>
                                                            <input type="text"  readonly value="{{old('start_date')}}" id="from"
                                                                   class="form-control input__theme date-picker-input datepicker @error('start_date') is-invalid @enderror "
                                                                   name="start_date"   aria-describedby="helpId" placeholder="Select Date" autocomplete="false"  >
                                                             @error('start_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">End Date</label>
                                                            <input type="text" readonly value="{{old('end_date')}}"  id="to"
                                                                   class="form-control input__theme date-picker-input datepicker @error('end_date') is-invalid @enderror "
                                                                   name="end_date"   aria-describedby="helpId" placeholder="Select Date"  >
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
                                                                        <input type='file' name='image' class="@error('image') is-invalid @enderror" id="imageUpload"
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
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Tags</label>
                                                            <input type="text" class="form-control input__theme @error('tags') is-invalid @enderror"  value="{{old('tags')}}" name="tags" id="" aria-describedby="helpId" placeholder="Add tags by comma">
                                                            <!-- <input type="text" class="form-control input__theme" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" placeholder="Add tags" /> -->
                                                            @error('tags')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="button-group">
                                                            <input type="submit" class="btn btn__theme"  value="Submit"/>
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

