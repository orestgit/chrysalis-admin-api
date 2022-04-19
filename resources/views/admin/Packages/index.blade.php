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
                                                        <a href="{{route('create-package')}}" class="btn btn__theme  btn__add">
                                                            Create New Package</a>
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
                                                                                        <th>No of Tokens</th>
                                                                                        <th>Price</th>
                                                                                         <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody >
                                                                                    @foreach($packages as $package)
                                                                                    <tr>

                                                                                        <td>
                                                                                            {{$package['token']}}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{$package['price']}}
                                                                                        </td>




                                                                                        <td>
                                                                                            <div class="dropdown show">
                                                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                </a>

                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                    <a class="dropdown-item" href="{{route('edit-package',['id'=> $package->token_packages_id,'action'=>'edit'])}}">Edit</a>
                                                                                                    <a class="dropdown-item" href="{{route('edit-package',['id'=> $package->token_packages_id,'action'=>'view'])}}">View</a>
                                                                                                    <a class="dropdown-item del-record"
                                                                                                       data-url="{{route('delete-package',['id'=>$package->token_packages_id])}}">Delete</a>
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