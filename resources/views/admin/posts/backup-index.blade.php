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
                                                        <a href="{{route('create-post')}}" class="btn btn__theme  btn__add">
                                                            Create New Post</a>
                                                    </div>
                                                </div>
                                                <div class="tabs-select-bar section-header tabs-bar__md">
                                                    <div class="tab-head-container">
                                                        <ul class="theme-tabs px-0">
                                                            <li class="theme-tab-item current" data-tab="tab-1">
                                                                All
                                                            </li>

                                                            <li class="theme-tab-item" data-tab="tab-2">
                                                                Published
                                                            </li>
                                                            <li class="theme-tab-item" data-tab="tab-3">

                                                                Waiting Approval
                                                            </li>
                                                            <li class="theme-tab-item" data-tab="tab-4">

                                                                Archive
                                                            </li>
                                                            <li class="theme-tab-item" data-tab="tab-5">

                                                                Drafts
                                                            </li>

                                                        </ul>

                                                    </div>
                                                    <div class="section-header__controls">
                                                        <ul>
                                                            <li>
                                                                <select class="select">
                                                                    <option data-display="Recent">Recent</option>
                                                                    <option value="1">Some option</option>
                                                                    <option value="2">Another option</option>
                                                                    <option value="3" disabled>A disabled option
                                                                    </option>
                                                                    <option value="4">Potato</option>
                                                                </select>
                                                            </li>
                                                        </ul>

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
                                                                                <table class="table tbody-tdetail table__xl table-add-action ">

                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check1" type="checkbox" name="check" value="check1">
                                                                                                <label for="check1">

                                                                                                </label> Post Title
                                                                                            </div>
                                                                                        </th>
                                                                                        <th>View</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Publication Date</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="">
                                                                                    @foreach($posts as $post)
                                                                                    <tr>

                                                                                        <td class="w-60">
                                                                                            <div class="checkbox">
                                                                                                <input id="check2" type="checkbox" name="check" value="check2">
                                                                                                <label for="check2">
                                                                                                </label> {{$post['title']}}
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            {{$post['views']}}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{$post['likes']}}
                                                                                        </td>
                                                                                        <td class="">
                                                                                            {{$post['created_at']}}
                                                                                        </td>

                                                                                        <td>
                                                                                            <div class="dropdown show">
                                                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                </a>

                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                    <a class="dropdown-item" href="{{route('edit-post',['post_id'=> $post->post_id,'action'=>'edit'])}}">Edit</a>
                                                                                                    <a class="dropdown-item" href="{{route('edit-post',['post_id'=> $post->post_id,'action'=>'view'])}}">View</a>
                                                                                                    <a class="dropdown-item del-record"
                                                                                                       data-url="{{route('delete-post',['post_id'=>$post->post_id])}}">Delete</a>
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

                                        <div id="tab-2" class="theme-tab-content ">
                                            <section class="section-space__top">
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                            <div class="card-container px-0 py-4">
                                                                <div class="table-container">

                                                                    <div class="table-responsive">
                                                                        <table class="table tbody-tdetail table__xl table-add-action ">

                                                                            <thead>
                                                                            <tr>
                                                                                <th class="w-30">
                                                                                    <div class="checkbox">
                                                                                        <input id="check5" type="checkbox" name="check" value="check5">
                                                                                        <label for="check5">

                                                                                        </label> Post Title
                                                                                    </div>
                                                                                </th>
                                                                                <th>View</th>
                                                                                <th>Likes</th>
                                                                                <th>Publicated Date</th>
                                                                                <th>Author</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="">
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check6" type="checkbox" name="check" value="check6">

                                                                                        <label for="check6">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check7" type="checkbox" name="check" value="check7">

                                                                                        <label for="check7">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="status-theme-change checked checked__pending">
                                                                                            Waiting
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check8" type="checkbox" name="check" value="check8">

                                                                                        <label for="check8">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>


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
                                        <div id="tab-3" class="theme-tab-content ">
                                            <section class="section-space__top">
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                            <div class="card-container px-0 py-4">
                                                                <div class="table-container">

                                                                    <div class="table-responsive">
                                                                        <table class="table tbody-tdetail table__xl table-add-action ">

                                                                            <thead>
                                                                            <tr>
                                                                                <th class="w-30">
                                                                                    <div class="checkbox">
                                                                                        <input id="check9" type="checkbox" name="check" value="check9">
                                                                                        <label for="check9">

                                                                                        </label> Post Title
                                                                                    </div>
                                                                                </th>
                                                                                <th>View</th>
                                                                                <th>Likes</th>
                                                                                <th>Publicated Date</th>
                                                                                <th>Author</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="">
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check10" type="checkbox" name="check" value="check10">

                                                                                        <label for="check10">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check11" type="checkbox" name="check" value="check11">

                                                                                        <label for="check11">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="status-theme-change checked checked__pending">
                                                                                            Waiting
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check12" type="checkbox" name="check" value="check12">

                                                                                        <label for="check12">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>


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
                                        <div id="tab-4" class="theme-tab-content ">
                                            <section class="section-space__top">
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                            <div class="card-container px-0 py-4">
                                                                <div class="table-container">

                                                                    <div class="table-responsive">
                                                                        <table class="table tbody-tdetail table__xl table-add-action ">

                                                                            <thead>
                                                                            <tr>
                                                                                <th class="w-30">
                                                                                    <div class="checkbox">
                                                                                        <input id="check13" type="checkbox" name="check" value="check13">
                                                                                        <label for="check13">

                                                                                        </label> Post Title
                                                                                    </div>
                                                                                </th>
                                                                                <th>View</th>
                                                                                <th>Likes</th>
                                                                                <th>Publicated Date</th>
                                                                                <th>Author</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="">
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check14" type="checkbox" name="check" value="check14">

                                                                                        <label for="check14">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check15" type="checkbox" name="check" value="check15">

                                                                                        <label for="check15">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="status-theme-change checked checked__pending">
                                                                                            Waiting
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check16" type="checkbox" name="check" value="check16">

                                                                                        <label for="check16">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>


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
                                        <div id="tab-5" class="theme-tab-content ">
                                            <section class="section-space__top">
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                            <div class="card-container px-0 py-4">
                                                                <div class="table-container">

                                                                    <div class="table-responsive">
                                                                        <table class="table tbody-tdetail table__xl table-add-action ">

                                                                            <thead>
                                                                            <tr>
                                                                                <th class="w-30">
                                                                                    <div class="checkbox">
                                                                                        <input id="check17" type="checkbox" name="check" value="check17">
                                                                                        <label for="check17">

                                                                                        </label> Post Title
                                                                                    </div>
                                                                                </th>
                                                                                <th>View</th>
                                                                                <th>Likes</th>
                                                                                <th>Publicated Date</th>
                                                                                <th>Author</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="">
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check18" type="checkbox" name="check" value="check18">

                                                                                        <label for="check18">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check19" type="checkbox" name="check" value="check19">

                                                                                        <label for="check19">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="status-theme-change checked checked__pending">
                                                                                            Waiting
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td class="w-60">
                                                                                    <div class="checkbox">
                                                                                        <input id="check20" type="checkbox" name="check" value="check20">

                                                                                        <label for="check20">

                                                                                        </label> Post title goes here
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    16,549
                                                                                </td>

                                                                                <td>

                                                                                    3,546

                                                                                </td>
                                                                                <td class="">
                                                                                    Thu 1/7/2021 05:24 AM
                                                                                </td>
                                                                                <td>
                                                                                    <div class="profile-image-container">
                                                                                        <img src="../../assets/images/others/profile-img.jpg">
                                                                                    </div>
                                                                                    Melinda
                                                                                </td>
                                                                                <td>
                                                                                        <span class="checked checked__success">
                                                                                            pubished
                                                                                        </span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        </a>

                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                            <a class="dropdown-item" href="./post-review.html">View</a>
                                                                                            <a class="dropdown-item" href="#">Edit</a>
                                                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>


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
                        </section>

                    </div>
                </div>

            </div>
        <!-- end -->
    </div>

@endsection
