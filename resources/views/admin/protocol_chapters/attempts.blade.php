@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
            <!-- bottom main -->

            <div class="row wrapper-space-top">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                    <div class="main-left-container">
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        @if(sizeof($protocols)>0)
                                            <p><strong>Submissions for : </strong> {{$protocols[0]->protocol_name}}</p>
                                        @endif
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
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">

                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-tdetail  table-add-action " id="table-1">

                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>User<th>
                                                                                        <th>Attempt Date<th>
                                                                                       <th>Actions<th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody >
                                                                                    @foreach($protocols as $protocol)
                                                                                    <tr>

                                                                                        <td> {{$protocol->protocol_quizze_id}}</td>
                                                                                        <td>  {{$protocol->first_name}} {{$protocol->last_name}} </td>
                                                                                         <td>
                                                                                        {{$protocol->attempt_date}}

                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="dropdown show">
                                                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                </a>

                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                    <a class="dropdown-item" href="{{route('protocol-submission-details',['submission_id'=> $protocol->submission_id,'protocol_id'=>$protocol_id,'user_id'=>$protocol->user_id])}}">View Details</a>

                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach


                                                                                    </tbody>
                                                                                </table>
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
