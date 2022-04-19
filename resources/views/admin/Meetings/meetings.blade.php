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
                                                    <div class="header-left">
                                                        <div class="date-picker-input">
                                                            <input type="text" name="" id="datepicker" placeholder="Select a date" value="2021-09-20">
                                                        </div>
                                                    </div>

                                                    <div class="section-header__controls tab-head-container header-tabs--sm">
                                                        <ul class="theme-tabs theme-tabs-monthly">
                                                            <!-- <li class="theme-tab-item current" data-tab="tab-1">
                                                                Monthly
                                                            </li>

                                                            <li class="theme-tab-item" data-tab="tab-2">
                                                                Weekly
                                                            </li>
                                                            <li class="theme-tab-item" data-tab="tab-3">
                                                                Day
                                                            </li> -->
                                                            <a href="./meeting-list.html" class="btn btn__theme">Set
                                                                Available Time</a>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="section-content inline-content inline-graph-fix">
                                                    <div id="tab-1" class="theme-tab-content current">
                                                        <div id='calendar'></div>
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
                                                            </h4>
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

$(document).ready(function () {
    console.log("{{route('calenderListing')}}");
    // document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');


    var calendar = new FullCalendar.Calendar(calendarEl, {

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: '2021-12-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function (arg) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    description: description,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
            window.location.href('/meetings-list')

        },
        eventClick: function (arg) {
            // if (confirm('Are you sure you want to delete this event?')) {
            //     arg.event.remove()
            // }
            // window.location.href('meeting-list.html')
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: "<?=route('calenderListing')?>",

        eventRender: function (events, element) {
            console.log(events);
            console.log(element);
            element.find('.fc-event-title').append("<br/>" + event.subject);
        }
        // new option to disable the auto escape
        // eventRender: function (event, element) {
        //     element.find('.fc-title').append("<br/>" + event.description);
        // }
    });

    calendar.render();
});
// });
</script>
@endsection
