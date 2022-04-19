@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('store-meeting-package')}}"  method="post">
            @csrf
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="section-header section-title-head section-header-xs">
                                                <div class="section-header__title header-left--sm">
                                                    <h3 class="h3">
                                                        Create a Package
                                                    </h3>
                                                </div>
                                                
                                            </div>

                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="form-container">
                                                        <label>Token</label>
                                                        <input type="text" class="form-control input__theme  @error('token') is-invalid @enderror"
                                                               value="{{old('token')}}" name="token" id="" aria-describedby="helpId" placeholder="Type Number of Tokens">
                                                        @error('token')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container">
                                                        <label>Price</label>
                                                        <input type="text" class="text-editor form-control  @error('price') is-invalid @enderror" value="{{old('price')}}" name="price" placeholder="Write your package amount  here" >
                                                        @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container">
                                                        <label>Duration</label>
                                                        <input type="text" class="text-editor form-control  @error('duration') is-invalid @enderror" value="{{old('duration')}}" name="duration" placeholder="Write your package duration  here" >
                                                        @error('duration')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div id="tab-2" class="theme-tab-content">
                                                    <div class="input-images"></div>
                                                </div>
                                                <br/>
                                                <div class="form-container float-right">
                                                    <input type="submit" class="btn btn__theme  btn__add" value="Submit">
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
        </form>
        <!-- end -->
    </div>

@endsection
