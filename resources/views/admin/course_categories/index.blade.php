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
                                                <a href="{{route('create-course-category')}}" class="btn btn__theme  btn__add">
                                                    Create course category</a>
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
                                                                                <th class="w-100">
                                                                                    {{--<div class="checkbox">
                                                                                        <input id="check1" type="checkbox" name="check" value="check1">
                                                                                        <label for="check1">

                                                                                        </label> Course Category Name
                                                                                    </div>--}}
                                                                                </th>
                                                                                <th>Image</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="">
                                                                            @foreach($course_categories as $category)
                                                                            <tr>
                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                         {{$category->name}}
                                                                                    </div>
                                                                                </td>
                                                                                <td class="w-60">
                                                                                    <img src="{{asset("uploads/courses/$category->icon")}}" class="img-thumb"/>
                                                                                </td>
                                                                                <td class="w-60">
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                             <a class="dropdown-item" href="{{route('edit-course-category',['course_category_id'=>$category->course_category_id])}}">Edit</a>
                                                                                             <a class="dropdown-item del-record"
                                                                                                data-url="{{route('delete-course-category',['course_category_id'=>$category->course_category_id])}}">Delete</a>
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
