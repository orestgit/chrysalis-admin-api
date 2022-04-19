@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
            <!-- bottom main -->

            <div class="row wrapper-space-top">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 header-column--xs">
                        <div class="header-left header-left-back header-left--sm ">

                            <a href="{{route('view-protocol-attempts',['protocol_id'=>$protocol['protocol_id']])}}" class="btn btn__theme  btn__with-icon btn-theme--">
                                Go Back
                            </a>
                        </div>
                    </div>
                    <div class="main-left-container">
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{session()->get('success')}}
                                            </div>
                                        @endif

                                        <div id="tab-1" class="theme-tab-content current">
                                            <div class="tab-content_container">
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">

                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-3 py-4">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                        <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-4" >
                                                                                    <div class="d-flex">
                                                                                    <h3 class="h3">Submitted by : </h3>

                                                                                            <div>
                                                                                                <h4 class="h4">{{$user_details->first_name}} {{$user_details->last_name}}</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                    </div>
                                                                        <div class="row">
                                                                        @foreach($protocol_questions as $protocol)

                                                                                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-4" >
                                                                                    <div class="d-flex">
                                                                                            {{--<span class="pr-2">{{$protocol->protocol_quizze_id}}.</span>--}}
                                                                                            <div>
                                                                                                <h3 class="h3">{{$protocol->question}}</h4>
                                                                                                    <ul class="mt-2">
                                                                                                        @foreach($protocol->options as $protocol_options)

                                                                                                                <li>{{$protocol_options->option}}
                                                                                                                    @if($protocol_options->answer!=null)
                                                                                                                        @if($protocol_options->is_correct==1) <strong class="text-success">(Correct Answer)</strong> @else <strong class="text-danger">(Wrong Answer)</strong>
                                                                                                                         @endif

                                                                                                                    @endif
                                                                                                                </li>

                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                        @endforeach

                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

                                                            </div>
                                                        </div>
                                                    </section>

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
