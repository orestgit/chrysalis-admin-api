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
                                        @if (Session::has('success'))
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{session()->get('success')}}
                                            </div>
                                        @endif
                                        <div class="card-container section-card-container p-0">
                                            <div class="section-header ">
                                                <div class="header-left">
                                                    <div class="card-inner__end card-inner__start">
                                                        <a href="{{route('create-protocol')}}" class="btn btn__theme  btn__add">
                                                            Create New Protocol</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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
                                                                                        <th>Title</th>
                                                                                        <th>Id</th>
                                                                                        <th>User<th>
                                                                                       {{-- <th>Status<th>--}}
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody >
                                                                                    @foreach($protocols as $protocol)
                                                                                    <tr>

                                                                                        <td>
                                                                                            {{$protocol['title']}}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{$protocol['protocol_id']}}
                                                                                        </td>
                                                                                        <td>
                                                                                            Super Admin
                                                                                        </td>
                                                                                        {{--<td>
                                                                                            {{$protocol['status']}}
                                                                                        </td>--}}
                                                                                        <td></td>


                                                                                        <td>
                                                                                            <div class="dropdown show">
                                                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                </a>

                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                    <a class="dropdown-item" href="{{route('edit-protocol',['protocol_id'=> $protocol->protocol_id,'action'=>'edit'])}}">Edit</a>
                                                                                                    <a class="dropdown-item" href="{{route('edit-protocol',['protocol_id'=> $protocol->protocol_id,'action'=>'view'])}}">View</a>
                                                                                                    <a class="dropdown-item" href="{{route('manage-protocol-questions',['protocol_id'=> $protocol->protocol_id])}}">Manage Questions</a>
                                                                                                    <a class="dropdown-item" href="{{route('view-protocol-attempts',['protocol_id'=> $protocol->protocol_id])}}">View Submissions</a>
                                                                                                    <a class="dropdown-item del-record"
                                                                                                       data-url="{{route('delete-protocol',['protocol_id'=>$protocol->protocol_id])}}">Delete</a>
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
