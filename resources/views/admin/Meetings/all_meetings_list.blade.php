@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
            <!-- bottom main -->

            <div class="row wrapper-space-top">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                    <div class="main-left-container">
                        <section>

                            <div class="card">

                                <div class="card-container p-0">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 px-0">

                                                <div class="section-header section-lessons-md">
                                                    <!-- <div class="header-left">
                                                        <div class="date-picker-input">
                                                            <input type="text" name="" id="datepicker" placeholder="Select a date" value="2021-09-20">
                                                        </div>
                                                    </div> -->

                                                    <div class="section-header__controls tab-head-container header-tabs--sm">
                                                        <ul class="theme-tabs theme-tabs-monthly">
                                                            <!-- <li class="theme-tab-item current" data-tab="tab-1">
                                                                All
                                                            </li> -->

                                                            <li class="theme-tab-item current" data-tab="tab-2">
                                                                Scheduled
                                                            </li>
                                                                <li class="theme-tab-item" data-tab="tab-3">
                                                                    Pending
                                                                </li>
                                                                <li class="theme-tab-item" data-tab="tab-4">
                                                                    Completed
                                                                </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="section-content inline-content inline-graph-fix">
                                                     <div id="tab-1" class="theme-tab-content current">
                                                        <!-- <div class="table-container">

                                                            <div class="table-responsive">
                                                                <table class="table table-variable table__xl">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name and Surname</th>
                                                                            <th>Subject</th>
                                                                            <th>Date</th>
                                                                            <th>Preferred Time</th>
                                                                             <th>Status</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    <img src="../../assets/images/others/profile-img.jpg">
                                                                                </div>
                                                                                name
                                                                            </td>
                                                                            <td>
                                                                                subject
                                                                            </td>
                                                                            <td>
                                                                            date
                                                                            </td>
                                                                            <td class="">
                                                                                8 - 10 am, 12 - 2 pm
                                                                            </td>
                                                                             <td>
                                                                                <span class="badge badge__success">
                                                                                    Scheduled
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="dropdown show">
                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    </a>

                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                        <a class="dropdown-item" href="#">View</a>
                                                                                        <a class="dropdown-item" href="#">Edit</a>
                                                                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                          <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    <img src="../../assets/images/others/profile-img.jpg">
                                                                                </div>
                                                                                Melinda Kewis
                                                                            </td>
                                                                            <td>
                                                                                Diagnosing a Mixed Dentition
                                                                            </td>
                                                                            <td>
                                                                                Sep, 17
                                                                            </td>
                                                                            <td class="">
                                                                                8 - 10 am
                                                                            </td>
                                                                            <td>
                                                                                <span class="badge badge__pending">
                                                                                    Pending
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-chat-notifications">
                                                                                    <ul class="px-0">
                                                                                        <li>
                                                                                            <a href="./meeting-chat.html" class="icon-button">
                                                                                                <img src="../../assets/images/icons/chat-msg.svg" alt="" srcset="">
                                                                                                <span class="count chat">

                                                                                                </span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>

                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    <img src="../../assets/images/others/profile-img.jpg">
                                                                                </div>
                                                                                Steven Brown1
                                                                            </td>
                                                                            <td>
                                                                                Restoring an Implant
                                                                            </td>
                                                                            <td>
                                                                                Sep, 16
                                                                            </td>
                                                                            <td class="">
                                                                                8 - 10 am, 12 - 2 pm
                                                                            </td>
                                                                            <td>
                                                                                <span class="badge badge__success">
                                                                                    Scheduled
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="dropdown show">
                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    </a>

                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                        <a class="dropdown-item" href="#">View</a>
                                                                                        <a class="dropdown-item" href="#">Edit</a>
                                                                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div id="tab-2" class="theme-tab-content current">
                                                        <div class="table-container">

                                                            <div class="table-responsive">
                                                                <table class="table table-variable table__xl" id="table-1">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name and Surname</th>
                                                                            <th>Date</th>
                                                                            <th>Start Time</th>
                                                                            <th>End Time</th>
                                                                            <th>Status</th>
                                                                            <!-- <th>Action</th> -->

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       @foreach($schedules as $s)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                        <img src="{{asset('assets/images/others/').'/'.$s->image}}">
                                                                                </div>

                                                                                {{$s->first_name}}
                                                                            </td>
                                                                            <td>
                                                                                {{$s->date}}
                                                                            </td>
                                                                            <td>
                                                                                {{$s->start_time}}
                                                                            </td>
                                                                            <td class="">
                                                                                {{$s->end_time}}
                                                                            </td>
                                                                            <td>
                                                                                <span class="badge badge__success">
                                                                                    Scheduled
                                                                                </span>
                                                                            </td>


                                                                        </tr>
                                                                            @endforeach
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab-3" class="theme-tab-content ">
                                                        <div class="table-container">

                                                            <div class="table-responsive">
                                                                <table class="table table-variable table__xl" id="table-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name and Surname</th>
                                                                            <th>Date</th>
                                                                            <th>Start Time</th>
                                                                            <th>End Time</th>
                                                                            <th>Status</th>
                                                                            <!-- <th>Action</th> -->

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach($pendings as $p)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    <img src="{{asset('assets/images/others/').'/'.$p->image}}">
                                                                                </div>
                                                                                {{$p->first_name}}
                                                                            </td>
                                                                            <td>
                                                                                {{$p->date}}
                                                                            </td>
                                                                            <td>
                                                                                {{$p->start_time}}
                                                                            </td>
                                                                            <td class="">
                                                                                {{$p->end_time}}
                                                                            </td>
                                                                            <td>
                                                                                <span class="badge badge__pending">
                                                                                    Pending
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach


                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tab-4" class="theme-tab-content ">
                                                        <div class="table-container">

                                                            <div class="table-responsive">
                                                                <table class="table table-variable table__xl" id="table-3">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name and Surname</th>
                                                                            <th>Date</th>
                                                                            <th>Start Time</th>
                                                                            <th>End Time</th>
                                                                            <th>Status</th>
                                                                            <!-- <th>Action</th> -->

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($complete as $c)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="profile-image-container">
                                                                                    <img src="{{asset('assets/images/others/').'/'.$c->image}}">
                                                                                </div>
                                                                                 {{$c->first_name}}
                                                                            </td>
                                                                            <td>
                                                                                {{$c->date}}
                                                                            </td>
                                                                            <td>
                                                                                {{$c->start_time}}
                                                                            </td>
                                                                            <td class="">
                                                                                {{$c->end_time}}
                                                                            </td>
                                                                            <td>
                                                                                <span class="badge badge__success">
                                                                                    Complete
                                                                                </span>
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
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                    <div class="main-right-container main-p-0 p-0">
                        <section>
                            <div class="card">
                                <div class="card-container p-0">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 px-0">
                                                <div class="section-header ">
                                                    <div class="section-header__title">
                                                        <h3 class="h3">
                                                            Statistics
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="section-content inline-content inline-graph-fix">
                                                    <div class="server-bar-graph zc-body graph-bar-section">
                                                        <div class="donut-charts">
                                                            <div id="donutChart" class="chart--container">
                                                                <a class="zc-ref" href="https://www.zingchart.com/"></a>
                                                            </div>
                                                        </div>
                                                        <div class="graph-chart-labels">
                                                            <ul class="pie-chart-label pl-0">

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
                                                            </ul>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="section-content inline-content inline-graph-fix ">
                                                    <div class="section-header section-header-sm">
                                                        <div class="section-header__title">
                                                            <h4 class="h4">
                                                                Average Daily Bookings
                                                            </h4>
                                                        </div>

                                                    </div>
                                                    <div class="section-content">
                                                        <div id="dashboard-earning-bar-chart"></div>
                                                    </div>
                                                </div>
                                                <div class="section-content inline-content inline-graph-fix ">
                                                    <div class="section-header section-header-sm">
                                                        <div class="section-header__title">
                                                            <h4 class="h4">
                                                                Expected Earnings
                                                            </h4>
                                                        </div>
                                                        <div class="section-header__controls">
                                                            <div class="section-header__title">
                                                                <h4 class="h4">
                                                                    450 Tokens
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="section-content">
                                                        <section class="curves-chart" id="chartCurve"></section>
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

        <!--Delete Model ends-->
        <script>
            // $(document).ready(function() { // CHAT_MENU_OPEN
            $('.chatbox-open').on('click', function() {
                $('.chat-message-popupbox').toggleClass('active');
            });
            $('.message-chatbox-close').on('click', function() {
                $('.chat-message-popupbox').removeClass('active');
            });
            $(document).click(function(event) {
                if (!$(event.target).closest(".chat-message-popupbox, .chatbox-open").length) {
                    $("body").find(".chat-message-popupbox").removeClass("active");
                }
            });

            // CHAT_MENU_OPEN
            $('.serach_button').on('click', function() {
                $('.serach_field-area ').addClass('active');
            });
            // });
        </script>
        <script>
            $(document).ready(function() {
                // for MENU notification
                $('.bell_notification_clicker').on('click', function() {
                    $('.menu_notification_wrap').toggleClass('active');
                });

                $(document).click(function(event) {
                    if (!$(event.target).closest(".bell_notification_clicker ,.menu_notification_wrap").length) {
                        $("body").find(".menu_notification_wrap").removeClass("active");
                    }
                });
            });
        </script>
        <script>
            if ($('#search-input').val().length > 0) {
                $('.search-input').addClass('focused');
            } else {
                $('.search-input').removeClass('focused');
            }
        </script>

@endsection
