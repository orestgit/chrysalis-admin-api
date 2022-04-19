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
                                            <form action="{{route('update-course-category')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="course_category_id" value="{{$course_categories['course_category_id']}}">
                                                <div class="form-group form-input-container">
                                                    <label for="">Category Name</label>
                                                    <input type="text" class="form-control input__theme  @error('name') is-invalid @enderror"  value="{{ $course_categories['name'] }}" name="name" id="" aria-describedby="helpId" placeholder="Type Title">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-input-container">
                                                    <label for="">Icon</label>
                                                    <br/>
                                                    <input type="file" class="@error('icon') is-invalid @enderror"   name="icon" id="" aria-describedby="helpId" />
                                                    @error('icon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <br/>
                                                    <br/>
                                                    <img src="{{asset("uploads/courses/".$course_categories['icon'])}}" class="img-thumb" />
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
        <!-- end -->
    </div>

@endsection
