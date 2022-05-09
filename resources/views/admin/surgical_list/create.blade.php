@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('store-surgical-algorythm')}}"  method="post" enctype="multipart/form-data">
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
                                                        {{$heading}}
                                                    </h3>
                                                </div>

                                            </div>

                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="form-container ">
                                                        <label>Algorythm Title</label>
                                                        <input type="text" class="form-control input__theme  @error('title') is-invalid @enderror"
                                                               value="{{old('title')}}" name="title" id="" aria-describedby="helpId" placeholder="Type Algorythm Title">
                                                        @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

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
