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
                                            <form action="{{route('store-post-type')}}" method="post" >
                                                @csrf
                                                <div class="form-group form-input-container">
                                                    <label for="">Post type title</label>
                                                    <input type="text" class="form-control input__theme  @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name" id="" aria-describedby="helpId" placeholder="Type Title">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                <div class="form-group form-input-container col-6 col-lg-6">
                                                    <label for="">Post Label Color</label>
                                                    <input type="color" class="form-control input__theme  @error('label_color') is-invalid @enderror"  value="{{ old('label_color') }}" name="label_color" id="" aria-describedby="helpId" placeholder="Type Label Color">
                                                    @error('label_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-input-container col-6 col-lg-6">
                                                    <label for="">Post type Label Background Color</label>
                                                    <input type="color" class="form-control input__theme  @error('label_background_color') is-invalid @enderror"  value="{{ old('label_background_color') }}" name="label_background_color" id="" aria-describedby="helpId" placeholder="Type Label Background Color">
                                                    @error('label_background_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-input-container col-6 col-lg-6">
                                                    <label for="">Post text color</label>
                                                    <input type="color" class="form-control input__theme  @error('lable_text_color') is-invalid @enderror"  value="{{ old('lable_text_color') }}" name="lable_text_color" id="" aria-describedby="helpId" placeholder="Type Label Background Color">
                                                    @error('lable_text_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                </div

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
