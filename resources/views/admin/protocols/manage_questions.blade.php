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
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                <div class="main-left-container">
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-12 card">
                                    <div class="section-header section-lessons-md">
                                        <div class="alert alert-danger fade in alert-dismissible show w-100 d-none" id="error_blok">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="font-size:20px">×</span>
                                            </button>    <strong>Error!</strong> Please fill all the highlighted fields
                                        </div>
                                    </div>
                                    <input type="hidden" name="ids" value="">
                                    <div class="card-container section-card-container p-0">
                                        <div class="section-header ">
                                            <div class="header-left">
                                                <div class="tab-head-container">
                                                    <ul class="theme-tabs px-0" >

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tabs-select-bar section-header tabs-bar__md">

                                                <div class="section-header__controls">
                                                    <ul>
                                                        <li>
                                                            <select class="select" id="question_type">
                                                                <option value="1">Boolean</option>
                                                                <option value="2">Multiple Answers</option>
                                                                <option value="3">Single Answer</option>
                                                                <option value="4">Single Answer with images</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <a id="add_question" class="btn btn__theme  btn__add float-left" data-count="0">
                                                                Create New Question
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="section-content inline-content">
                                            <section>
                                                <div class="form-container">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <form method="post" action="{{route('create-protocol-questions')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="protocol_id" value="{{ Request::get('protocol_id') }}">
                                                                <div id="question_content"></div>
                                                                <input type="hidden" name="ids">
                                                                <input type="submit" value="Submit" class="theme btn__theme float-right" id="submit_questions">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

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
<script>


</script>
