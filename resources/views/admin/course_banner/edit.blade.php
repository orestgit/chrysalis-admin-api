@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="container-fluid">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 ">
                            <div class="main-left-container">
                                <section>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 px-0">

                                                    <div class="section-content inline-content pb-3">
                                                        <div class="form-container">
                                                            <form action="{{route('update-course-advertisement')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" class="form-control input__theme" name="id"   value="{{$Advertisement['course_advertisements_id']}}">
                                                                <div class="form-group form-input-container">
                                                                    <label for="">Course Advertisement Description</label>
                                                                    <input type="text" class="form-control input__theme  @error('description') is-invalid @enderror"   name="description" id="" aria-describedby="helpId" placeholder="Type Title" value="{{$Advertisement['description']}}">
                                                                    @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group form-input-container">
                                                                    <label for="">Course Link</label>
                                                                    <input type="text" class="form-control input__theme  @error('link') is-invalid @enderror"  name="link" id="" aria-describedby="helpId" placeholder="Type Title" value="{{$Advertisement['link']}}">
                                                                    @error('link')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                
                                                                <div class="form-group form-input-container avatar-upload">

                                                                    <label for="">Post Thumbnails</label>
                                                                    <label class="image-picker-label" for="imageUpload">
                                                                        <div id="imagePreview"
                                                                            class="image-picker-container  avatar-edit">

                                                                            <div class="placeholder-view ">
                                                                                <input type='file' name="image" id="imageUpload"
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
                                                                    <label for="">Background Image</label>
                                                                    <br/>
                                                                    <input type="file" class="@error('background_image') is-invalid @enderror"   name="background_image" id="" aria-describedby="helpId" />
                                                                    @error('background_image')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="button-group">
                                                                    <input type="submit" class="btn btn__theme" value="Submit">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>

                            </div>
                    </div>
                </div>        
        </div>
        <!-- end -->
    </div>

@endsection
