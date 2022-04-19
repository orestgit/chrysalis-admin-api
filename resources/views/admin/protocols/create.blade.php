@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('store-protocol')}}"  method="post" enctype="multipart/form-data">
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
                                                        Create a Protocol
                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container header-tabs--sm">
                                                    <ul class="theme-tabs">
                                                        <li class="theme-tab-item current" data-tab="tab-1">
                                                            Main Text
                                                        </li>

                                                        <li class="theme-tab-item" data-tab="tab-2">
                                                            Gallery
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="form-container">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control input__theme  @error('title') is-invalid @enderror"
                                                               value="{{old('title')}}" name="title" id="" aria-describedby="helpId" placeholder="Type Title">
                                                        @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="text-editor-continer">
                                                        <label>Details</label>
                                                        <textarea class="text-editor form-control  @error('content') is-invalid @enderror" name="content" placeholder="Write your protocol text here" rows="10">{{old('content')}}</textarea>
                                                        @error('content')
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
