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
                                <div class="col-12 col-lg-12 px-0">

                                    <div class="section-content inline-content pb-3">
                                        <div class="form-container">
                                            <form action="{{route('update-post-type')}}" method="post" >
                                                @csrf
                                                <div class="form-group form-input-container">
                                                    <label for="">Post type title</label>
                                                    <input type="text" class="form-control input__theme  @error('name') is-invalid @enderror"  value="{{ $post_data['name'] }}" name="name" id="" aria-describedby="helpId" placeholder="Type Title">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-input-container">
                                                    <label for="">Post Type Label Color</label>
                                                    <input type="color" class="form-control input__theme  @error('label_color') is-invalid @enderror"  value="{{ $post_data['label_color'] }}" name="label_color" id="" aria-describedby="helpId" placeholder="Type Title">
                                                    @error('label_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-input-container">
                                                    <label for="">Post Type Label Background Color</label>
                                                    <input type="color" class="form-control input__theme  @error('label_background_color') is-invalid @enderror"  value="{{ $post_data['label_background_color'] }}" name="label_background_color" id="" aria-describedby="helpId" placeholder="Type Title">
                                                    @error('label_background_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-input-container">
                                                    <label for="">Post Type lable text color</label>
                                                    <input type="color" class="form-control input__theme  @error('lable_text_color') is-invalid @enderror"  value="{{ $post_data['lable_text_color'] }}" name="lable_text_color" id="" aria-describedby="helpId" placeholder="Type Title">
                                                    @error('lable_text_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <input type="hidden" name="post_type_id" value="{{$post_data['post_type_id']}}">
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
