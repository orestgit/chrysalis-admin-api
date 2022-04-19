@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
        <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session()->get('success')}}
                    </div>
                @elseif (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session()->get('error')}}
                        </div>
                @endif
                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container table-card--height p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">

                                            <div class="section-header section-title-head section-lessons-md">
                                                <div class="section-header__title">
                                                    <h3 class="h3">
                                                        User Profile
                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container">
                                                    <ul class="theme-tabs">
                                                        @if($user['user_role']==ADMIN || $user['user_role']==DOCTOR)
                                                            <li class="theme-tab-item current" data-tab="tab-1">
                                                                Posts
                                                            </li>

                                                            <li class="theme-tab-item" data-tab="tab-2">
                                                                Public Information
                                                            </li>
                                                        @endif


                                                        @if($user['user_role']==END_USER)
                                                            <li class="theme-tab-item current" data-tab="tab-3">
                                                                Tokens
                                                            </li>
                                                        @endif


                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content">
                                                @if($user['user_role']==ADMIN || $user['user_role']==SUPER_ADMIN || $user['user_role']==DOCTOR)
                                                <div id="tab-1" class="theme-tab-content current">
                                                    <div class="table-container">

                                                        <div class="table-responsive">
                                                            <table class="table table-variable table__lg" id="table-1">
                                                                <thead>
                                                                <tr>
                                                                    <th>Posts Title</th>
                                                                    <th>Views</th>
                                                                    <th>Likes</th>
                                                                    <th>Date Created</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($posts as $post)
                                                                <tr>
                                                                    <td>{{$post->title}}</td>
                                                                    <td>
                                                                        {{$post->views}}
                                                                    </td>
                                                                    <td>
                                                                       {{$post->likes}}
                                                                    </td>
                                                                    <td>
                                                                        {{$post->created_at->format('d M Y ')}}
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge @if ($post->status==APPROVED) badge__success @else badge__warning  @endif">
                                                                            @if($post->status==DRAFT)Draft
                                                                                @elseif($post->status==WAITING_APPROVAL)Waiting for approval
                                                                                @elseif($post->status==ARCHIVED)Archived
                                                                                @elseif($post->status==APPROVED)Approved
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown show">
                                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            </a>

                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                <a class="dropdown-item del-record"  data-url="{{route('delete-post',['post_id'=>$post->post_id])}} " >Delete</a>
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
                                                <div id="tab-2" class="theme-tab-content">
                                                    <section>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-6 px-0">
                                                                    <div class="section-content  post-reviews-text">
                                                                        <div class="section-header ">
                                                                            <div class="">
                                                                                <h4 class="h4 mb-4">
                                                                                    About Author
                                                                                </h4>
                                                                                <p class="mb-4 author-description">
                                                                                    @if($user_bio==null)
                                                                                        No Bio added yet
                                                                                    @else
                                                                                    {{$user_bio['about']}}
                                                                                    @endif
                                                                                </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 px-0">
                                                                    <div class="section-header section-education-part px-0">
                                                                        <div class="">
                                                                            <h4 class="h4">
                                                                                Education
                                                                            </h4>
                                                                            <div class="user-order-list">
                                                                                @if(count($user_education)==0)
                                                                                    No Education details updated
                                                                                @else
                                                                                    <ul class="px-0">
                                                                                        @foreach($user_education as $education)
                                                                                            <li class="education-schedule">
                                                                                                <h6 class="h6 ">
                                                                                                    {{$education->year}}
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li class="education-descriptions">
                                                                                                  {{$education->details}}
                                                                                            </li>
                                                                                            <br/>

                                                                                       @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6 px-0">
                                                                    <div class="section-content  post-reviews-text">
                                                                        <div class="section-header social-profile-links">
                                                                            <div class="">
                                                                                <h4 class="h4 mb-4">
                                                                                    Social Profiles
                                                                                </h4>
                                                                                <div class="btn-social-link">
                                                                                    <label>
                                                                                        Instagram
                                                                                    </label>
                                                                                    <button class="btn btn__theme btn__light">
                                                                                            <span class="svg-block">
                                                                                                <svg width="22"
                                                                                                     height="22"
                                                                                                     viewBox="0 0 22 22"
                                                                                                     fill="none"
                                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                                    <g class="admin-icon-color"
                                                                                                       opacity="0.6">
                                                                                                    <path
                                                                                                        d="M6.46875 0C2.91797 0 0 2.91406 0 6.46875V15.5312C0 19.082 2.91406 22 6.46875 22H15.5312C19.082 22 22 19.0859 22 15.5312V6.46875C22 2.91797 19.0859 0 15.5312 0H6.46875ZM6.46875 2H15.5312C18.0039 2 20 3.99609 20 6.46875V15.5312C20 18.0039 18.0039 20 15.5312 20H6.46875C3.99609 20 2 18.0039 2 15.5312V6.46875C2 3.99609 3.99609 2 6.46875 2ZM16.9062 4.1875C16.4023 4.1875 16 4.58984 16 5.09375C16 5.59766 16.4023 6 16.9062 6C17.4102 6 17.8125 5.59766 17.8125 5.09375C17.8125 4.58984 17.4102 4.1875 16.9062 4.1875ZM11 5C7.69922 5 5 7.69922 5 11C5 14.3008 7.69922 17 11 17C14.3008 17 17 14.3008 17 11C17 7.69922 14.3008 5 11 5ZM11 7C13.2227 7 15 8.77734 15 11C15 13.2227 13.2227 15 11 15C8.77734 15 7 13.2227 7 11C7 8.77734 8.77734 7 11 7Z"
                                                                                                        fill="black" />
                                                                                                        </g>
                                                                                                </svg>

                                                                                            </span>
                                                                                        <span>
                                                                                                <?php echo empty($user_bio['instagram']) ? "Instagram link not updated" : $user_bio['instagram'];?>
                                                                                            </span>
                                                                                    </button>

                                                                                </div>
                                                                                <div class="btn-social-link">
                                                                                    <label>
                                                                                        Facebook
                                                                                    </label>
                                                                                    <button class="btn btn__theme btn__light">
                                                                                            <span class="svg-block">
                                                                                                <svg class="svg-icon"
                                                                                                     width="32"
                                                                                                     height="32"
                                                                                                     viewBox="0 0 32 32"
                                                                                                     fill="none"
                                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                                    <g class="admin-icon-color"
                                                                                                       opacity="0.6">
                                                                                                        <path
                                                                                                            class="admin-icon-color"
                                                                                                            d="M18.4404 5.5C15.4839 5.5 13.75 7.06163 13.75 10.6196V13.75H10V17.5H13.75V26.5H17.5V17.5H20.5L21.25 13.75H17.5V11.2539C17.5 9.91366 17.9371 9.25 19.1948 9.25H21.25V5.65381C20.8945 5.60581 19.8587 5.5 18.4404 5.5Z"
                                                                                                            fill="black" />
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>
                                                                                        <span>
                                                                                                 <?=empty($user_bio['facebook']) ? "Facebook link not updated" : $user_bio['facebook'];?>
                                                                                            </span>
                                                                                    </button>

                                                                                </div>
                                                                                <div class="btn-social-link">
                                                                                    <label>
                                                                                        Linkedin
                                                                                    </label>
                                                                                    <button class="btn btn__theme btn__light">

                                                                                            <span class="svg-block">
                                                                                                <svg class="svg-icon"
                                                                                                     width="32"
                                                                                                     height="32"
                                                                                                     viewBox="0 0 32 32"
                                                                                                     fill="none"
                                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                                    <g class="admin-icon-color"
                                                                                                       opacity="0.6">
                                                                                                        <path
                                                                                                            class="admin-icon-color"
                                                                                                            d="M9.56226 5.5C8.28563 5.5 7.25 6.53392 7.25 7.81055C7.25 9.08717 8.2848 10.145 9.56055 10.145C10.8363 10.145 11.8728 9.08717 11.8728 7.81055C11.8728 6.5348 10.8389 5.5 9.56226 5.5ZM20.8433 11.625C18.9016 11.625 17.7907 12.6404 17.2578 13.6501H17.2014V11.8967H13.375V24.75H17.3621V18.3875C17.3621 16.711 17.4886 15.0908 19.5632 15.0908C21.6081 15.0908 21.6379 17.0024 21.6379 18.4934V24.75H25.6199H25.625V17.6902C25.625 14.2357 24.8823 11.625 20.8433 11.625ZM7.56787 11.8967V24.75H11.5583V11.8967H7.56787Z"
                                                                                                            fill="black" />
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>
                                                                                        <span>
                                                                                                <?=empty($user_bio['linkedin']) ? "Linkedin link not updated" : $user_bio['linkedin'];?>
                                                                                            </span>
                                                                                    </button>

                                                                                </div>

                                                                                <div class="btn-social-link">
                                                                                    <label>
                                                                                        Twitter
                                                                                    </label>
                                                                                    <button class="btn btn__theme btn__light">
                                                                                            <span class="svg-block">
                                                                                                <svg class="svg-icon"
                                                                                                     viewBox="0 0 26 24"
                                                                                                     fill="none">
                                                                                                    <g class="admin-icon-color"
                                                                                                       opacity="0.6">
                                                                                                        <path
                                                                                                            class="admin-icon-color"
                                                                                                            d="M26.5 9.48877C25.7275 9.83057 24.897 10.063 24.0254 10.1655C24.9141 9.63232 25.5977 8.78809 25.9189 7.7832C25.0884 8.27539 24.1655 8.63428 23.1846 8.8291C22.3984 7.9917 21.2773 7.46533 20.04 7.46533C17.6611 7.46533 15.73 9.39648 15.73 11.7754C15.73 12.1138 15.7676 12.4419 15.8428 12.7563C12.2607 12.5786 9.08545 10.8628 6.96289 8.25488C6.59033 8.89062 6.37842 9.63232 6.37842 10.4219C6.37842 11.9155 7.13721 13.2349 8.2959 14.0073C7.58838 13.9834 6.92529 13.792 6.34424 13.4673C6.34424 13.4878 6.34424 13.5049 6.34424 13.522C6.34424 15.6104 7.82764 17.3535 9.79981 17.7466C9.4375 17.8457 9.05811 17.9004 8.66504 17.9004C8.38818 17.9004 8.11475 17.873 7.85498 17.8218C8.40185 19.5342 9.99463 20.7783 11.8779 20.8159C10.4048 21.9712 8.54541 22.6582 6.52881 22.6582C6.18018 22.6582 5.83838 22.6377 5.5 22.5967C7.40723 23.8203 9.66992 24.5347 12.1035 24.5347C20.0298 24.5347 24.3638 17.9688 24.3638 12.2744C24.3638 12.0898 24.3569 11.9019 24.3501 11.7173C25.1909 11.1089 25.9224 10.3501 26.5 9.48877Z"
                                                                                                            fill="black" />
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>
                                                                                        <span>
                                                                                                  <?=empty($user_bio['twitter']) ? "Twitter link not updated" : $user_bio['twitter'];?>
                                                                                            </span>
                                                                                    </button>

                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                                @endif
                                                    @if($user['user_role']==END_USER)
                                                         <div id="tab-3" class="theme-tab-content current">
                                                                <div class="table-container">

                                                                    <div class="table-responsive">
                                                                        <table class="table  table-variable" id="table-1">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Date</th>
                                                                                <th>No of Tokens</th>
                                                                                <th>Amount</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($token_purchases as $purchase)
                                                                                <tr>
                                                                                    <td>{{$purchase->created_at->format('d M Y ')}}</td>

                                                                                    <td>
                                                                                        {{$purchase->tokens}}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{$purchase->payment}}

                                                                                    </td>

                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                <div class="main-right-container main-right-content main-p-0 p-0">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="user-profile-info">
                                                <div class="container-fluid px-0">
                                                    <div class="row">
                                                        <div class="col-12 col-xl-12 col-lg-4 col-md-12 col-sm-4 col-xs-12">

                                                            <div class="profile-image">
                                                                @if($user['image']==null)
                                                                    <img src="https://via.placeholder.com/150">
                                                                @else
                                                                    <img src="{{asset('uploads/users/'.$user['image'])}}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-xl-12 col-lg-8 col-md-12 col-sm-8 col-xs-12">

                                                            <div class="profile-label">
                                                                <div class="row">
                                                                    <div class="col-6 col-lg-6">
                                                                        <h6 class="h6">
                                                                            First Name
                                                                        </h6>
                                                                        <h4 class="h4">
                                                                            {{$user['first_name']}}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="col-6 col-lg-6">
                                                                        <h6 class="h6">
                                                                            Last Name
                                                                        </h6>
                                                                        <h4 class="h4">
                                                                            {{$user['last_name']}}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="profile-label">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-12">
                                                                        <h6 class="h6">
                                                                            Phone Number
                                                                        </h6>
                                                                        <h4 class="h4">
                                                                            {{$user['phone']}}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="profile-label">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-12">
                                                                        <h6 class="h6">
                                                                            Email Address
                                                                        </h6>
                                                                        <h4 class="h4">
                                                                            {{$user['email']}}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="profile-label">
                                                                <div class="row">
                                                                    @if($user['id']!=Auth::user()->id)
                                                                    <div class="col-6 col-lg-6">
                                                                        <h6 class="h6">
                                                                            User Type
                                                                        </h6>
                                                                        <h4 class="h4">
                                                                            @if($user['user_role']==ADMIN) Admin
                                                                            @elseif($user['user_role']==END_USER) User
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                    @endif
                                                                    <div class="col-6 col-lg-6">
                                                                        <h6 class="h6">
                                                                            Status
                                                                        </h6>
                                                                        <h4 class="h4">
                                                                            <?=$user['status']==0 ? "Blocked" : "Active";?>
                                                                        </h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                             @if(Auth::user()->id!==$user['id'])

                                                                <div class="social-links">
                                                                    @if($user['status']==1)
                                                                    <a class="btn btn__theme  btn-edit-remove"
                                                                       data-toggle="modal" data-target="#blockUser"
                                                                       id="block_user">Block User</a>
                                                                    @else
                                                                        <a class="btn btn__theme  btn-edit-remove"
                                                                           data-toggle="modal" data-target="#unblockUser"
                                                                           id="block_user">Unblock User</a>
                                                                    @endif
                                                                </div>

                                                             @endif
                                                        </div>
                                                    </div>
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
        <!-- end -->
    </div>
    <div class="modal fade bd-example-modal-md" id="blockUser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-delete modal-md" role="document">
            <div class="modal-content modal-field">
                <div class="container-fluid">
                    <div class="modal-header">
                        <div class="section-head">
                            <h3 class="h3 modal-title-delete" id="">
                                Block User
                            </h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">
                            <div class="pull-left col-12">

                                <div class="section-head text-black">
                                    <h3 class="h3">
                                        Do you want to block "this user"?
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-theme-secondary send-notification" data-dismiss="modal">Cancel</button>
                        <a href="{{route('block-user',['user_id'=>$user['id']])}}" type="submit" id="btn-green" class="btn btn-theme-primary modal-btn-delete">Block User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-md" id="unblockUser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-delete modal-md" role="document">
            <div class="modal-content modal-field">
                <div class="container-fluid">
                    <div class="modal-header">
                        <div class="section-head">
                            <h3 class="h3 modal-title-delete" id="">
                                Unblock
                            </h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">
                            <div class="pull-left col-12">

                                <div class="section-head text-black">
                                    <h3 class="h3">
                                        Do you want to unblock "this user"?
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-theme-secondary send-notification" data-dismiss="modal">Cancel</button>
                        <a href="{{route('unblock-user',['user_id'=>$user['id']])}}" type="submit" id="btn-green" class="btn btn-theme-primary modal-btn-delete">Unblock</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
