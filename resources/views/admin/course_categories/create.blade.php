@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                <div class="main-left-container">
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">

                                    <div class="card-container px-0 py-4">
                                        <div class="form-container">
                                            <form action="{{route('store-course-category')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-5 col-lg-5 col-sm-6 d-inline-block">
                                                    <div class="form-group form-input-container">
                                                        <label for="">Course Category</label>
                                                        <input type="text" class="form-control input__theme  @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name" id="" aria-describedby="helpId" placeholder="Type Title">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-5 col-sm-6 d-inline-block">
                                                   {{-- <div class="form-group form-input-container avatar-upload">
                                                            <label for="">Course Thumbnails</label>
                                                            <label class="image-picker-label" for="imageUpload">
                                                                <div id="imagePreview"
                                                                     class="image-picker-container  avatar-edit">
                                                                    <div class="placeholder-view ">
                                                                        <input type='file' name='icon' id="imageUpload"
                                                                               accept=".png, .jpg, .jpeg" class="@error('icon') is-invalid @enderror"/>
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
                                                        @error('icon')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror--}}
                                                         <input type="file" class="@error('icon') is-invalid @enderror"   name="icon" id="" aria-describedby="helpId" />
                                                        @error('icon')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="button-group pull-right">
                                                    <input type="submit" class="btn btn__theme pull-right" value="Submit">
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
        <!-- end -->
    </div>

@endsection
