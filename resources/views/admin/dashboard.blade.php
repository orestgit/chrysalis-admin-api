@extends('../admin_layouts.master')
@section('content')

    @if(Auth::user()->user_role==1)
    <div class="container-fluid main-container">
        <!-- header -->
        <div class="row ">
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="header-left">
                    <div class="date-picker-input">
                        <input type="text" name="" id="datepicker" placeholder="Select a date" value="2021-09-20">
                    </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                <div class="header-right">
                    <ul>
                        <!-- <li class="w-100">
                            <div class="search-input">
                                <input id="search-input" class="form-control focused" type="search" name="" value="" placeholder="Search here...">
                            </div>
                        </li> -->
                        <li class="header-right">
                            <a class="icon-button chatbox-open">
                                <img src="../../assets/images/icons/chat.svg" alt="" srcset="">
                                <span class="count chat">
                                        11
                                    </span>
                            </a>
                            <!-- ### CHAT_MESSAGE_BOX   ### -->

                            <div class="chat-message-popupbox">
                                <div class="chat-popup-header">
                                    <div class="message-chatbox-close">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="cross-chats"
                                                  d="M7.09939 5.98831L11.772 10.661C12.076 10.965 12.076 11.4564 11.772 11.7603C11.468 12.0643 10.9766 12.0643 10.6726 11.7603L5.99994 7.08762L1.32737 11.7603C1.02329 12.0643 0.532002 12.0643 0.228062 11.7603C-0.0760207 11.4564 -0.0760207 10.965 0.228062 10.661L4.90063 5.98831L0.228062 1.3156C-0.0760207 1.01166 -0.0760207 0.520226 0.228062 0.216286C0.379534 0.0646715 0.578697 -0.0114918 0.777717 -0.0114918C0.976738 -0.0114918 1.17576 0.0646715 1.32737 0.216286L5.99994 4.889L10.6726 0.216286C10.8243 0.0646715 11.0233 -0.0114918 11.2223 -0.0114918C11.4213 -0.0114918 11.6203 0.0646715 11.772 0.216286C12.076 0.520226 12.076 1.01166 11.772 1.3156L7.09939 5.98831Z"
                                                  fill="white" />
                                        </svg>

                                    </div>
                                    <h3 class="h3">Melinda</h3>

                                </div>
                                <div class="chat-popup-body">
                                    <p class="mesaged_send_date">
                                        Sunday, 12 January
                                    </p>

                                    <div class="chating-sender">
                                        <div class="sms-thumb">
                                            <img src="../../assets/images/others/profile-img.jpg" alt="">
                                        </div>
                                        <div class="send-sms-view">
                                            <P>Hi! Welcome . How can I help you?</P>
                                        </div>
                                    </div>

                                    <div class="chating-sender chating-receiver">

                                        <div class="send-sms-view">
                                            <P>Hello</P>
                                        </div>
                                        <div class="sms-thumb">
                                            <img src="../../assets/images/others/profile-img.jpg" alt="">
                                        </div>
                                    </div>

                                </div>
                                <div class="chat-popup-bottom">
                                    <div class="chat_input_box  align-items-center">
                                        <div class="chat-input-container">
                                            <input type="text" class="form-control form-input-type input__theme" name="" id="" aria-describedby="helpId" placeholder="Type a message">
                                            <button class="btn btn__theme btn-theme-change btn__light">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--/### CHAT_MESSAGE_BOX  ### -->
                        </li>
                        <li class="menu-notificaton-wrap">
                            <a class="icon-button bell_notification_clicker">
                                <img src="../../assets/images/icons/notifiction.svg" alt="" srcset="">
                                <span class="count notification">
                                        2
                                    </span>
                            </a>
                            <!-- menu_notification_wrap  -->
                            <div class="menu_notification_wrap">
                                <div class="notification_Header">
                                    <h3 class="h3">Notifications</h3>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="../../assets/images/others/profile-img.jpg" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5 class="h5">Cool Marketing </h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="../../assets/images/others/profile-img.jpg" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5 class="h5">Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="../../assets/images/others/profile-img.jpg" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5 class="h5">what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="../../assets/images/others/profile-img.jpg" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5 class="h5">Cool Marketing </h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="../../assets/images/others/profile-img.jpg" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5 class="h5">Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="../../assets/images/others/profile-img.jpg" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5 class="h5">what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </div>
                            <!--/ menu_notification_wrap  -->
                        </li>
                        <li class="profile_info">
                            <a class="user-button ">
                                <img src="../../assets/images/others/user-placeholder.png" alt="" srcset="">
                            </a>
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <h5 class="h5">Dr. Robar Smith</h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="#" data-toggle="modal" data-target="#logoutModelCenter">Logout </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end -->

        <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 px-0">
                <div class="main-left-container">
                    <section>
                        <div class="container-fluid">

                            <!-- success / error -->
                            @if (Session::has('success'))
                            <div class="row">
                            <div class="col-12">
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session()->get('success')}}
                            </div>
                            </div>
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="row">
                            <div class="col-12">
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session()->get('error')}}
                            </div>
                            </div>
                            </div>
                            @endif  

                            <div class="row">
                                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-4 card">
                                    <div class="card-container home-card-section">
                                        <div class="card-inner__top">
                                            <h6 class="h6">Posts Views Today</h6>
                                        </div>
                                        <div class="card-inner__bottom chart-card-div">
                                            <div class="card-inner__bottom__left">
                                                <h2 class="h2">2,4K</h2>
                                            </div>
                                            <div class="card-inner__bottom__right">
                                                <div id="dashboard-posts-chart"></div>
                                            </div>
                                        </div>
                                        <div class="card-inner__end">
                                            <h4 class="h4">+2,5%</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-4 card">
                                    <div class="card-container home-card-section">
                                        <div class="card-inner__top">
                                            <h6 class="h6">Courses Purchases Today</h6>
                                        </div>
                                        <div class="card-inner__bottom chart-card-div">
                                            <div class="card-inner__bottom__left">
                                                <h2 class="h2">345</h2>
                                            </div>
                                            <div class="card-inner__bottom__right">
                                                <div id="dashboard-courses-chart"></div>
                                            </div>
                                        </div>
                                        <div class="card-inner__end">
                                            <h4 class="h4">-4,4%</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-4 card">
                                    <div class="card-container home-card-section">
                                        <div class="card-inner__top">
                                            <h6 class="h6">New Users</h6>
                                        </div>
                                        <div class="card-inner__bottom chart-card-div">
                                            <div class="card-inner__bottom__left">
                                                <h2 class="h2">4,750</h2>
                                            </div>
                                            <div class="card-inner__bottom__right">
                                                <div id="dashboard-users-chart"></div>
                                            </div>
                                        </div>
                                        <div class="card-inner__end">
                                            <h4 class="h4">+2.5%</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-space__top">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-16 col-lg-12 col-xl-6 card">
                                    <div class="card-container home-card-section p-0">
                                        <div class="section-header section-header-sm">
                                            <div class="section-header__title">
                                                <h3 class="h3">
                                                    Earnings Today
                                                </h3>
                                            </div>
                                            <div class="section-header__controls">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="btn__transparent">
                                                            View more
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="section-content">
                                            <div id="dashboard-earning-bar-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 card">
                                    <div class="card-container home-card-section p-0">
                                        <div class="section-header section-header-sm">
                                            <div class="section-header__title">
                                                <h3 class="h3">
                                                    Scheduled Meetings Today
                                                </h3>
                                            </div>
                                            <!-- <div class="section-header__controls">
                                                <ul>
                                                    <li>
                                                        <a href="./dashboard-paid.html" class="btn__transparent">
                                                            View more
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> -->
                                        </div>
                                        <div class="server-bar-graph zc-body mt-n5">

                                            <div id="dashboard-donut-chart" class="chart--container ">
                                                <a class="zc-ref" href="https://www.zingchart.com/"></a>
                                            </div>
                                            <ul class="pl-0 pie-chart-label">
                                                <li>
                                                        <span class="bookings">

                                                        </span> Scheduled
                                                                    <h4 class="h4">
                                                                        {!! $ScheduleTime!!}

                                                                        <script>
                                                                            config.chartData.ScheduleTime =" <?php echo $ScheduleTime ?>";
                                                                        </script>
                                                                    </h4>
                                                </li>
                                                <li>
                                                        <span class="finished">
                                                        </span> Pending
                                                                    <h4 class="h4">
                                                                        {!! $pendingTime !!}
                                                                        <script>
                                                                            config.chartData.pendingTime =" <?php echo $pendingTime ?>";
                                                                        </script>
                                                                    </h4>
                                                </li>
                                                <li>
                                                        <span class="available">

                                                        </span> Completed
                                                                    <h4 class="h4">
                                                                        {!! $completeTime !!}
                                                                        <script>
                                                                            config.chartData.completeTime =" <?php echo $completeTime ?>";
                                                                        </script>
                                                                    </h4>
                                                                </li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                <div class="main-right-container">
                    <div class="timeline-container">
                        <div class="timeline-container__title">
                            <h3 class="h3">Latest Activity</h3>
                        </div>
                        <div class="timeline-container__content time-line-object">
                            <ul>
                                <li>

                                    <h4 class="h4">
                                        September 13, 04:35 AM
                                    </h4>
                                    <p>
                                        Illum omnis quo illum nisi. Nesciunt est accusamus. Blanditiis nisi quae eum nisi similique. Modi consequuntur totam
                                    </p>
                                </li>
                                <li>
                                    <h4 class="h4">
                                        September 13, 04:35 AM
                                    </h4>
                                    <p>
                                        Illum omnis quo illum nisi. Nesciunt est accusamus. Blanditiis nisi quae eum nisi similique. Modi consequuntur totam
                                    </p>
                                </li>
                                <li>
                                    <h4 class="h4">
                                        September 13, 04:35 AM
                                    </h4>
                                    <p>
                                        Illum omnis quo illum nisi. Nesciunt est accusamus. Blanditiis nisi quae eum nisi similique. Modi consequuntur totam
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-9 col-md-12 col-sm-12 col-xs-12">
                <div class="review-cards">
                    <h3 class="h3">
                        Action Required
                    </h3>
                    <div class="row">
                        <div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="review-cards-action">
                                <ul class="pl-0">
                                    <li>
                                        <div class="review-cards-text block-ellipsis">
                                            <img src="../../assets/images/icons/system-icon.svg"> <span> Review New
                                                    Posts</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="actions-created block-ellipsis">
                                            24 New Posts Created
                                        </div>
                                    </li>
                                    <li>
                                        <div class="actions-created review-buttons">
                                            <button type="button" class="btn btn-secondary">
                                                Review
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="review-cards-action">
                                <ul class="pl-0">
                                    <li>
                                        <div class="review-cards-text block-ellipsis">
                                            <img src="../../assets/images/icons/user-icon.svg"> <span> Review New
                                                    Users</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="actions-created block-ellipsis">
                                            3 Users With Admin Role Created
                                        </div>
                                    </li>
                                    <li>
                                        <div class="actions-created review-buttons">
                                            <button type="button" class="btn btn-secondary">
                                                Review
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="review-cards-action">
                                <ul class="pl-0">
                                    <li>
                                        <div class="review-cards-text block-ellipsis">
                                            <img src="../../assets/images/icons/butterfly.svg"> <span> Review
                                                    Protocols</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="actions-created block-ellipsis">
                                            19 Questions Receiver
                                        </div>
                                    </li>
                                    <li>
                                        <div class="actions-created review-buttons">
                                            <button type="button" class="btn btn-secondary">
                                                Review
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- end -->
    </div>
    @else
        <div class="container-fluid main-container">
            <!-- header -->
            <div class="row ">
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">

                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="header-left">
                                <h2 class="h2">
                                    {{$heading}}
                                </h2>
                                <h4 class="h4 fixed">
                                    {{$sub_heading}}
                                </h4>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="header-right">
                                <ul>


                                    <li class="profile_info">
                                        <a class="user-button ">
                                            @if(Auth::user()->image==null)
                                                <img src="https://via.placeholder.com/150">
                                            @else
                                                <img src="{{asset("uploads/users/".Auth::user()->image)}}">
                                            @endif
                                            {{--<img src="../../assets/images/others/user-placeholder.png" alt="" srcset="">--}}
                                        </a>
                                        <div class="profile_info_iner">
                                            <div class="profile_author_name">
                                                <h5 class="h5">{{Auth::user()->name}}</h5>
                                            </div>
                                            <div class="profile_info_details">
                                                <a href="#" data-toggle="modal" data-target="#logoutModelCenter">Logout </a>
                                                <a href="{{route('admin-settings')}}" >Update Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->

            <div class="row">
                <h3 class="h3">Welcome to  to Dashboard</h3>
            </div>
        </div>
    @endif
@endsection
