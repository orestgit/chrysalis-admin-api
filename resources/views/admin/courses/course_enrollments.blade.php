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
                            <div class="col-12 col-lg-12">

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{session()->get('success')}}
                                    </div>
                                @endif

                                @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{session()->get('success')}}
                                        </div>
                                    @endif
                                <div class="card-container section-card-container p-0">

                                    <div class="section-header ">
                                        <div class="header-left">
                                            <div class="card-inner__end card-inner__start">
                                                <h2 class="h2">Course Title : {{$course_details['title']}}</h2>
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

                                                                                <th >Student Name</th>
                                                                                <th>Registered Date</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="">
                                                                            @foreach($enrollments as $enrollment)
                                                                            <tr>
                                                                                <td >

                                                                                         {{$enrollment['first_name']}}  {{$enrollment['last_name']}}

                                                                                </td>
                                                                                <td class="w-60">
                                                                                    {{$enrollment['created_at']}}
                                                                                </td>
                                                                                <td class="w-60">
                                                                                    @if($enrollment['status']==2) Finished @else In Progress @endif
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
