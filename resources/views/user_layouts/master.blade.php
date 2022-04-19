<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=e">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="import" href="component.html" />
    <title>Chrysalis Admin </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- font family -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- normalize -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
    <link href="{{asset('assets/css/calendar.css')}}" rel='stlesheet' />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/css/basic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom_datatable.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('assets/css/richtext.min.css')}}" />

    <!-- css -->

    '<link rel="stylesheet" href="{{asset('assets/css/index.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/image-uploader.min.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"

    <!-- jquery -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- plugins -->
    <script src="{{asset('assets/js/jquery.richtext.js')}}"></script>
    <script src="{{asset('assets/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/js/data-table.js')}}"></script>
    <script src="{{asset('assets/js/single-img-picker.js')}}"></script>
    <script src="{{asset('assets/js/jquery.richtext.js')}}"></script>

    <!-- apex charts -->
    <script src="{{asset('assets/js/apex-charts.js')}}"></script>
    <script src="{{asset('assets/js/qr-code.js')}}"></script>
    <script src="{{asset('assets/js/apex-custom.js')}}"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src='{{asset('assets/js/calendar.js')}}></script>
    <script src='{{asset('assets/js/custom-calendar.js')}}></script>
    <script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/js/image-uploader.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- plugins end -->
    <!-- js -->
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBxAx4g5NCIpyHIP6s_n20flYKX4Y1CWsk&amp;libraries=places'></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</head>


<body>
<!-- body wrapper -->
<div id="main">
    <!-- sidebar -->
    <div class="sidebar-container">
        <nav class="navbar navbar-expand navbar-light">
                <span class="menu-icon">
                    <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                </span>

            <a class="navbar-brand" href="./dashboard.html">
                <img class="logo img-responsive" src="../../assets/images/logo.png" alt="chrysalis" srcset="" />
            </a>
        </nav>
        <div class="clearfix"></div>

        <div class="sidebar">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-12 px-0 h-100">
                        <div class="sidebar-accordian h-100">
                            <div class="side-menus-list">
                                <!-- Contenedor -->
                                <ul id="accordion" class=" accordion">
                                    <li class="sidebar-menu admin-dashboard-active">
                                        <a class="link text-16 text-light-pink" href="./dashboard.html">
                                                <span class="svg-block">
                                                    <svg class="svg-icon" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="admin-icon-color"
                                                              d="M23.6996 11.7189C24.1346 11.2404 24.0926 10.5071 23.6058 10.0813L12.8799 0.696113C12.393 0.270365 11.6125 0.279284 11.1359 0.716219L0.373512 10.5817C-0.103087 11.0186 -0.126479 11.7511 0.321721 12.2169L0.591549 12.498C1.0392 12.9638 1.76278 13.0194 2.20668 12.6216L3.011 11.9014V22.4466C3.011 23.0936 3.53524 23.6174 4.18177 23.6174H8.37696C9.02349 23.6174 9.54773 23.0936 9.54773 22.4466V15.0692H14.8987V22.4466C14.8894 23.0931 15.352 23.6169 15.9986 23.6169H20.4444C21.0909 23.6169 21.6152 23.0931 21.6152 22.4461V12.0498C21.6152 12.0498 21.8374 12.2445 22.1114 12.4854C22.385 12.7258 22.9596 12.533 23.3947 12.0541L23.6996 11.7189Z"
                                                              fill="#B3B3B3" />
                                                    </svg>

                                                </span> Dashboard
                                        </a>


                                    </li>


                                   

                                    <li class="sidebar-menu">
                                        <a  class="link text-16 text-light-pink">
                                                <span class="svg-block">
                                                   <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                        <g class="admin-icon-color" opacity="0.3">
                                                            <path class="admin-icon-color"
                                                                  d="M26.0002 0.489502H15.0315C14.2317 0.489502 13.5099 0.827959 13.0002 1.36853C12.4906 0.827959 11.7688 0.489502 10.969 0.489502H0.000244141V18.8046H5.83872C7.03979 21.5707 9.79757 23.5104 13.0002 23.5104C16.2029 23.5104 18.9607 21.5707 20.1618 18.8046H26.0002V0.489502ZM24.4768 17.2812H20.644C20.7486 16.7726 20.8036 16.2461 20.8036 15.707C20.8036 15.0957 20.7328 14.5008 20.5993 13.9296H22.3694V12.4062H20.07C19.7771 11.7812 19.4037 11.2013 18.9632 10.6796H22.3694V9.15618H17.2358C16.2162 8.49466 15.0333 8.06459 13.762 7.94084V3.28247C13.762 2.58245 14.3315 2.01294 15.0315 2.01294H24.4768V17.2812ZM13.0002 21.9869C9.53747 21.9869 6.72028 19.1697 6.72028 15.707C6.72028 12.2442 9.53747 9.427 13.0002 9.427C16.463 9.427 19.2802 12.2442 19.2802 15.707C19.2802 19.1697 16.463 21.9869 13.0002 21.9869ZM1.52368 2.01294H10.969C11.669 2.01294 12.2385 2.58245 12.2385 3.28247V7.94079C10.9672 8.06454 9.78427 8.49461 8.76463 9.15613H3.6311V10.6796H7.03726C6.59678 11.2012 6.22338 11.7812 5.93043 12.4061H3.6311V13.9296H5.40124C5.26768 14.5007 5.19684 15.0957 5.19684 15.7069C5.19684 16.246 5.25184 16.7725 5.35645 17.2811H1.52368V2.01294Z"
                                                                  fill="black" />
                                                            <path class="admin-icon-color"
                                                                  d="M3.6311 5.90625H10.1311V7.42969H3.6311V5.90625Z"
                                                                  fill="black" />
                                                            <path class="admin-icon-color"
                                                                  d="M15.8694 5.90625H22.3694V7.42969H15.8694V5.90625Z"
                                                                  fill="black" />
                                                            <path class="admin-icon-color"
                                                                  d="M16.6309 16.3666V15.0473L11.3547 12.0011L10.2122 12.6607V18.7531L11.3547 19.4128L16.6309 16.3666ZM11.7356 13.9801L14.7266 15.707L11.7356 17.4338V13.9801Z"
                                                                  fill="black" />
                                                        </g>
                                                    </svg>

                                                </span> Courses <span class="dropdown__arrow up">
                                                    <img src="{{asset('assets/images/icons/arrow-down.svg')}}" alt="">
                                                </span>
                                        </a>
                                        <ul class="submenu">
                                            <li class="sub-menu-list"><a href="{{route('list-courses')}}">All Courses</a></li>
                                            <li class="sub-menu-list"><a href="{{route('list-course-categories')}}">Course Categories</a></li>
                                            <li class="sub-menu-list"><a href="{{route('course-banners')}}">Courses Banner</a></li>
                                            </li>

                                        </ul>
                                    </li>

                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="mt-auto mx-3 ">
                <p class="footer-text pt-3">All rights reserved<br>© 2020 </p>
            </div> -->

        </div>
    </div>
    <!-- sidebar end -->

    <!-- main -->
     @yield('content')
    <!-- end -->

</div>

<!--Logout model-->
<div class="modal fade bd-example-modal-md" id="logoutModelCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-field">
            <div class="container-fluid">
                <div class="modal-header">
                    <div class="section-head">
                        <h3 class="modal-title h3" id="exampleModalCenterTitle" >
                            Logout
                        </h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="pull-left col-12">

                            <div class="section-head text-black">
                                <h3 class="h3">
                                    Do you want to logout?
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-theme-secondary send-notification" data-dismiss="modal">NO</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" id="btn-green" class="btn btn-theme-primary send-notification">YES</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--Logout Model ends-->
<!-- body wrapper end -->
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
   /* if ($('#search-input').val().length > 0) {
        $('.search-input').addClass('focused');
    } else {
        $('.search-input').removeClass('focused');
    }*/
    $('.del-record').click(function() {
        $('#deleteModelCenter').modal('show');
        $('.modal-btn-delete').attr('href',$(this).data('url'));
    });
</script>
</body>

<div class="modal fade bd-example-modal-md" id="deleteModelCenter" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-delete modal-md" role="document">
        <div class="modal-content modal-field">
            <div class="container-fluid">
                <div class="modal-header">
                    <div class="section-head">
                        <h3 class="h3 modal-title-delete" id="">
                            Delete
                        </h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="pull-left col-12">

                            <div class="section-head text-black">
                                <h3 class="h3">
                                    Do you want to delete "this item"?
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-theme-secondary send-notification" data-dismiss="modal">Cancel</button>
                    <a href="#" type="submit" id="btn-green" class="btn btn-theme-primary modal-btn-delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
