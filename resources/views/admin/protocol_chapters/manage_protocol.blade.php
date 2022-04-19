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

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

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
                                                        {{$lesson['title']}}
                                                    </h3>
                                                </div>
                                                @if($quiz_exists && $question_count==0)
                                                    <div class="section-header__controls tab-head-container">
                                                        <a href="{{route('edit-quiz-questions',['lesson_id'=>$lesson['lesson_id'],'quiz_id'=>$quiz['quiz_id']])}}" class="btn btn__theme ">Add Questions</a>
                                                    </div>
                                                @elseif($quiz_exists && $question_count>0)
                                                    <div class="section-header__controls tab-head-container">
                                                        <a href="{{route('edit-quiz-questions',['lesson_id'=>$lesson['lesson_id'],'quiz_id'=>$quiz['quiz_id']])}}" class="btn btn__theme ">Edit Questions</a>
                                                    </div>
                                                @endif

                                            </div>

                                                <div class="section-content inline-content post-reviews-text">
                                                    @if(!$quiz_exists)
                                                    <div class="section-header">
                                                            <p>Currently there is no quiz for this question, Please add new quiz. </p>
                                                    </div>
                                                        <form  method="post" action="{{route('save-quiz')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                                <div class="container">
                                                                    <div class="row">
                                                                            <div class="col-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-0">
                                                                                <div class="form-group form-input-container">
                                                                                    <label for="">Quiz Title</label>
                                                                                    <input type="text"  name='title'  value="{{old('title')}}" class="form-control input__theme  @error('title') is-invalid @enderror">
                                                                                    @error('title')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        <input type="hidden" name="form_posted" value="1"/>
                                                                            <div class="col-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-0">
                                                                                <div class="form-group form-input-container avatar-upload">

                                                                                    <label for="">Image</label>
                                                                                    <label class="image-picker-label" for="imageUpload">
                                                                                        <div id="imagePreview" class="image-picker-container   avatar-edit">
                                                                                            <div class="placeholder-view ">
                                                                                                <input type="file"  class="@error('image') is-invalid @enderror" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                                                                <span class="browse-btn">Browse Files</span>
                                                                                                <span class="browse-desc">Min. 1170px wide, Max 2mb</span>
                                                                                            </div>

                                                                                        </div>
                                                                                    </label>
                                                                                    @error('image')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $message }}</strong>
                                                                                                </span>
                                                                                    @enderror
                                                                                </div>

                                                                            </div>
                                                                            <input type="hidden" name="lesson_id" value="{{$lesson['lesson_id']}}">
                                                                            <input type="hidden" name="form_submitted" value="1">

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-0">
                                                                            <div class="form-group form-input-container">
                                                                                <input type="submit" class="btn btn__theme " value="Submit">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </form>

                                                    @else
                                                        <form  method="post" action="{{route('update-quiz')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-0">
                                                                        <div class="form-group form-input-container">
                                                                            <label for="">Quiz Title</label>
                                                                            <input type="text"  name='title'  value="{{$quiz['title']}}" class="form-control input__theme  @error('title') is-invalid @enderror">
                                                                            @error('title')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="form_posted" value="1"/>
                                                                    <div class="col-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-0">
                                                                        <div class="form-group form-input-container avatar-upload">

                                                                            <label for="">Image</label>
                                                                            <label class="image-picker-label" for="imageUpload">
                                                                                <div id="imagePreview" class="image-picker-container   avatar-edit">
                                                                                    <div class="placeholder-view ">
                                                                                        <input type="file"  class="@error('image') is-invalid @enderror" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                                                        <span class="browse-btn">Browse Files</span>
                                                                                        <span class="browse-desc">Min. 1170px wide, Max 2mb</span>
                                                                                    </div>

                                                                                </div>
                                                                            </label>
                                                                            <img src="{{asset('uploads/courses/'.$quiz['image'])}}" class="d-block  img-thumb-w100"/>
                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" name="quiz_id" value="{{$quiz['quiz_id']}}">
                                                                    <input type="hidden" name="lesson_id" value="{{$lesson['lesson_id']}}">
                                                                    <input type="hidden" name="form_submitted" value="1">

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-0">
                                                                        <div class="form-group form-input-container">
                                                                            <input type="submit" class="btn btn__theme " value="Update">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    @endif

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

