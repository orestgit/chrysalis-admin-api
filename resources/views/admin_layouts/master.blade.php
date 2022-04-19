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

    <!--CSS Added  -->
    <link rel="stylesheet" href="../../assets/css/normalize.css" />
    <link href='../../assets/css/calendar.css' rel='stylesheet' />

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
    <script src="{{asset('assets/js/calendar.js')}}"></script>
    <script src="{{asset('assets/js/custom-calendar.js')}}"></script>
    <script src="{{asset('assets/js/zingchart.min.js')}}"></script>

    <!-- <script src="https://cdn.zingchart.com/zingchart.min.js"></script> -->
    <script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/js/image-uploader.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- plugins end -->
    <!-- js -->
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBxAx4g5NCIpyHIP6s_n20flYKX4Y1CWsk&amp;libraries=places'></script>


    <!-- Global Script Add  -->
    <script>
        var config = {
            chartData: {
                ScheduleTime:"",
                pendingTime:"",
                completeTime:"",
                extra:"",

            },
            routes:{
                deleteProtocolQuestion:"{{route('delete-protocol-question')}}",
                getStates:"{{route('get-states')}}",
                getCities:"{{route('get-cities')}}",
                deleteEducation:"{{route('delete-education')}}",
                scheduledMeetings:"{{route('calenderListing')}}",
                removeChapterQuestion:"{{route('delete-chapter-question')}}",
            }
        };
    </script>
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
            <a class="navbar-brand" href="{{route('admin-dashboard')}}">
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
                                @If(Auth::user()->user_role==1)
                                        <li class="sidebar-menu admin-dashboard-active">
                                        <a class="link text-16 text-light-pink" href="{{route('admin-dashboard')}}">
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
                                 @endif
                                @If(Auth::user()->user_role==1 || Auth::user()->user_role==2 )

                                    <li class="sidebar-menu">
                                        <a  class="link text-16 text-light-pink">
                                                <span class="svg-block">
                                                    <svg class="svg-icon" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <mask id="path-1-inside-1" fill="white">
                                                            <rect x="0.000244141" width="24" height="16" rx="1" />
                                                        </mask>
                                                        <rect class="admin-icon-color" x="0.000244141" width="24"
                                                              height="16" rx="1" stroke="#B3B3B3" stroke-width="4"
                                                              mask="url(#path-1-inside-1)" />
                                                        <mask id="path-2-inside-2" fill="white">
                                                            <rect x="0.000244141" y="18" width="24" height="6" rx="1" />
                                                        </mask>
                                                        <rect class="admin-icon-color" x="0.000244141" y="18" width="24"
                                                              height="6" rx="1" stroke="#B3B3B3" stroke-width="4"
                                                              mask="url(#path-2-inside-2)" />
                                                    </svg>

                                                </span> Posts <span class="dropdown__arrow up">
                                                    <img src="{{asset('assets/images/icons/arrow-down.svg')}}" alt="">
                                                </span>
                                        </a>
                                        <ul class="submenu">
                                            <li class="sub-menu-list"><a href="{{route('list-posts')}}">All Posts</a></li>
                                            @If(Auth::user()->user_role==1)
                                                <li class="sub-menu-list"><a href="{{route('list-post-types')}}">Post Types</a></li>
                                            @endif
                                        </li>

                                        </ul>
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
                                            @If(Auth::user()->user_role==1  )
                                                <li class="sub-menu-list"><a href="{{route('list-course-categories')}}">Course Categories</a></li>
                                                <li class="sub-menu-list"><a href="{{route('course-banners')}}">Courses Banner</a></li>
                                            @endif
                                            </li>

                                        </ul>
                                    </li>
                                @endif
                                @If(Auth::user()->user_role==1 || Auth::user()->user_role==3 )
                                    <li class="sidebar-menu">
                                        <a  class="link text-16 text-light-pink">
                                                <span class="svg-block">
                                                <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                        <g class="admin-icon-color" opacity="0.3">
                                                            <path class="admin-icon-color"
                                                                  d="M24 16.2422C24 12.744 21.6429 9.68756 18.319 8.76654C18.11 3.89722 14.0839 0 9.16406 0C4.1109 0 0 4.1109 0 9.16406C0 10.8109 0.438354 12.4144 1.27075 13.8221L0.0336914 18.2943L4.50604 17.0574C5.80005 17.8226 7.25977 18.2536 8.76636 18.3186C9.68719 21.6427 12.7438 24 16.2422 24C17.6385 24 18.9965 23.6281 20.1896 22.9215L23.9661 23.9661L22.9215 20.1896C23.6281 18.9965 24 17.6385 24 16.2422ZM4.72797 15.5369L2.0506 16.2775L2.79126 13.6002L2.62244 13.3361C1.82684 12.0914 1.40625 10.6487 1.40625 9.16406C1.40625 4.88635 4.88635 1.40625 9.16406 1.40625C13.4418 1.40625 16.9219 4.88635 16.9219 9.16406C16.9219 13.4418 13.4418 16.9219 9.16406 16.9219C7.67944 16.9219 6.23694 16.5013 4.992 15.7057L4.72797 15.5369ZM21.9494 21.9494L19.9627 21.3997L19.6974 21.5724C18.6689 22.2405 17.4739 22.5938 16.2422 22.5938C13.4927 22.5938 11.0766 20.816 10.2206 18.2668C14.4309 17.7814 17.7814 14.4309 18.267 10.2204C20.816 11.0766 22.5938 13.4927 22.5938 16.2422C22.5938 17.4739 22.2405 18.6689 21.5724 19.6974L21.3997 19.9627L21.9494 21.9494Z"
                                                                  fill="black" />
                                                            <path class="admin-icon-color"
                                                                  d="M8.46094 12.7031H9.86719V14.1094H8.46094V12.7031Z"
                                                                  fill="black" />
                                                            <path class="admin-icon-color"
                                                                  d="M10.5703 7.03125C10.5703 7.4306 10.4077 7.79919 10.1125 8.06927L8.46094 9.58099V11.2969H9.86719V10.2003L11.062 9.10675C11.6431 8.57483 11.9766 7.81842 11.9766 7.03125C11.9766 5.48035 10.715 4.21875 9.16406 4.21875C7.61316 4.21875 6.35156 5.48035 6.35156 7.03125H7.75781C7.75781 6.2558 8.38861 5.625 9.16406 5.625C9.93951 5.625 10.5703 6.2558 10.5703 7.03125Z"
                                                                  fill="black" />
                                                        </g>
                                                    </svg>

                                                </span> Meetings <span class="dropdown__arrow up">
                                                    <img src="{{asset('assets/images/icons/arrow-down.svg')}}" alt="">
                                                </span>
                                        </a>
                                        <ul class="submenu">
                                        <li class="sub-menu-list"><a href="{{route('allMeetingsList')}}">All Meetings</a></li>
                                            <!-- <li class="sub-menu-list"><a href="{{route('pending-meetings')}}">Pending Meetings</a></li>
                                            <li class="sub-menu-list"><a href="{{route('assigned-meetings')}}">Assigned Meetings</a></li>
                                            <li class="sub-menu-list"><a href="{{route('completed-meetings')}}">Completed  Banner</a></li> -->
                                            <li class="sub-menu-list"><a href="{{route('Meetings')}}">Meetings</a></li>

                                            </li>

                                        </ul>
                                    </li>
                                @endif
                                    @If(Auth::user()->user_role==1)
                                        <li class="sidebar-menu">
                                        <a href="{{route('list-meeting-packages')}}" class="link text-16 text-light-pink">
                                                <span class="svg-block">
                                                    <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                        <g class="admin-icon-color" opacity="0.3">
                                                            <path class="admin-icon-color"
                                                                  d="M21.3299 18.7142L21.3299 18.7141L21.322 18.7139C20.1111 18.6755 19.2255 18.36 18.5667 17.8946C17.9052 17.4273 17.4236 16.7743 17.0792 15.9852C16.3843 14.3932 16.287 12.3388 16.3732 10.4879C16.4503 10.042 16.49 9.55317 16.5228 9.06542C16.5314 8.93748 16.5395 8.80953 16.5477 8.68127C16.5727 8.28928 16.5978 7.89436 16.6369 7.48784C16.7404 6.41232 16.9341 5.36355 17.4119 4.44324C17.8787 3.5441 18.6354 2.73145 19.9401 2.15184C21.1423 1.61776 22.8344 1.27136 25.2267 1.27632C25.2148 1.48587 25.1967 1.73396 25.1695 2.012C25.0813 2.91303 24.8987 4.11301 24.5242 5.32994C23.7636 7.80129 22.3031 10.0933 19.4846 10.4657L17.1506 10.7741L19.2329 11.8726C20.3632 12.4688 21.0702 13.0709 21.5192 13.6505C21.9633 14.2237 22.1814 14.8087 22.2849 15.4169C22.3911 16.0414 22.3771 16.6873 22.348 17.4022C22.3456 17.461 22.3431 17.5205 22.3406 17.5804C22.3248 17.9555 22.308 18.3522 22.3129 18.7556L21.3299 18.7142Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                            <path class="admin-icon-color"
                                                                  d="M9.33615 6.93066L9.33608 6.93067L9.3371 6.94342C9.36207 7.25663 9.38987 7.57825 9.41819 7.90604C9.60659 10.0863 9.81856 12.5393 9.38176 14.601C9.135 15.7657 8.69276 16.7326 7.97698 17.431C7.27287 18.118 6.23526 18.6125 4.66153 18.7141L3.68654 18.7554C3.69135 18.3525 3.67465 17.9561 3.65886 17.5814C3.65631 17.5208 3.65378 17.4608 3.65137 17.4014C3.62235 16.6864 3.60847 16.0403 3.71484 15.4158C3.81843 14.8076 4.03663 14.2228 4.48068 13.65C4.9297 13.0708 5.63656 12.4693 6.76644 11.874L8.85114 10.7756L6.51508 10.4669C3.69665 10.0945 2.23623 7.80231 1.47573 5.33062C1.10125 4.11353 0.918708 2.91339 0.830588 2.01224C0.801511 1.71489 0.782876 1.4518 0.770953 1.23345C4.90004 1.00837 6.98225 2.43716 8.06102 3.82931C8.64768 4.58639 8.96896 5.37294 9.14295 5.97318C9.22964 6.27222 9.27865 6.52123 9.30569 6.69147C9.31919 6.77645 9.32714 6.84136 9.33156 6.88255C9.33376 6.90313 9.33509 6.91774 9.33577 6.92593L9.33615 6.93066ZM0.750089 0.547526L0.750089 0.547541L0.750089 0.547526ZM9.33636 6.9333C9.33639 6.93371 9.33639 6.9337 9.33636 6.93326L9.33636 6.9333Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                            <path class="admin-icon-color"
                                                                  d="M13.4462 17.6846L13.4313 17.9499L12.5907 18.2633L12.5846 18.1585C12.847 18.027 13.1426 17.8683 13.4462 17.6846Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                            <path class="admin-icon-color"
                                                                  d="M12.4416 15.7169L12.4386 15.6646C12.7756 15.5018 13.1823 15.2879 13.5971 15.0276L13.5822 15.2904L12.4416 15.7169Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                            <path class="admin-icon-color"
                                                                  d="M12.04 12.1712L12.1033 12.3395L12.1033 12.3395L12.04 12.1712ZM12.2694 12.7811L12.2694 12.7811L12.304 12.8732L12.3346 12.8617L12.364 12.8476C12.7498 12.6629 13.255 12.4006 13.7627 12.069L13.746 12.3642L12.2772 12.913L12.2755 12.884L12.2806 12.882L12.2979 12.8755L12.3025 12.8738L12.3036 12.8734L12.3039 12.8733L12.304 12.8732L12.304 12.8732L12.2694 12.7811Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                            <path class="admin-icon-color"
                                                                  d="M12.1229 10.2561L12.1213 10.2284C12.7215 9.98773 13.3432 9.6747 13.9217 9.27599L13.904 9.59065L12.1229 10.2561Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                            <path class="admin-icon-color"
                                                                  d="M14.3871 2.7083L14.4069 2.70341L14.4263 2.69747C14.5896 2.64749 14.6859 2.63589 14.7377 2.63589C14.7449 2.65789 14.7535 2.69004 14.7612 2.73516C14.7821 2.85742 14.7895 3.03006 14.7753 3.2613C14.7468 3.72685 14.6399 4.31464 14.4968 4.99654C14.4519 5.21055 14.4031 5.43469 14.3532 5.66442C14.2788 6.00705 14.2016 6.36211 14.1303 6.71446L11.9931 7.51313C11.9608 7.12673 11.8799 6.72738 11.7919 6.35355C11.7198 6.0474 11.636 5.73198 11.5549 5.42692L11.5541 5.42395C11.4722 5.11604 11.3929 4.818 11.3242 4.52844C11.1826 3.9318 11.1061 3.44923 11.1289 3.09258C11.1465 2.81668 11.2127 2.71789 11.2719 2.67192C11.4396 2.62254 11.5325 2.6458 11.8381 2.72232C11.8915 2.73571 11.9515 2.75072 12.0195 2.76726C12.5574 2.89809 13.2433 2.99161 14.3871 2.7083ZM14.7891 2.64414C14.7881 2.64533 14.78 2.6443 14.7678 2.63752C14.784 2.63957 14.7901 2.64296 14.7891 2.64414Z"
                                                                  stroke="black" stroke-width="1.5" />
                                                        </g>
                                                    </svg>
                                                </span> Meeting Packages
                                        </a>
                                        </li>
                                        <li class="sidebar-menu">
                                            <a href="{{route('list-users')}}" class="link text-16 text-light-pink">
                                                    <span class="svg-block">
                                                        <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                            <g class="admin-icon-color" opacity="0.3">
                                                                <path class="admin-icon-color"
                                                                      d="M11.8295 11.5609C13.4177 11.5609 14.7928 10.9913 15.9167 9.86735C17.0403 8.74364 17.6101 7.3687 17.6101 5.78026C17.6101 4.19237 17.0405 2.81726 15.9166 1.69317C14.7927 0.56964 13.4175 0 11.8295 0C10.241 0 8.86609 0.56964 7.74237 1.69336C6.61865 2.81707 6.04883 4.19219 6.04883 5.78026C6.04883 7.3687 6.61865 8.74382 7.74237 9.86753C8.86645 10.9911 10.2416 11.5609 11.8295 11.5609ZM8.737 2.6878C9.59924 1.82556 10.6107 1.40643 11.8295 1.40643C13.048 1.40643 14.0597 1.82556 14.9221 2.6878C15.7844 3.55023 16.2037 4.56188 16.2037 5.78026C16.2037 6.99901 15.7844 8.01048 14.9221 8.87291C14.0597 9.73533 13.048 10.1545 11.8295 10.1545C10.6111 10.1545 9.59961 9.73515 8.737 8.87291C7.87457 8.01067 7.45526 6.99901 7.45526 5.78026C7.45526 4.56188 7.87457 3.55023 8.737 2.6878Z"
                                                                      fill="black" />
                                                                <path class="admin-icon-color"
                                                                      d="M21.9435 18.4549C21.9111 17.9873 21.8456 17.4771 21.7491 16.9384C21.6517 16.3957 21.5262 15.8826 21.3761 15.4137C21.2208 14.929 21.0101 14.4504 20.7491 13.9917C20.4787 13.5156 20.1608 13.1011 19.8041 12.76C19.4312 12.4031 18.9745 12.1162 18.4464 11.9069C17.9202 11.6987 17.337 11.5932 16.7131 11.5932C16.4681 11.5932 16.2312 11.6937 15.7736 11.9917C15.492 12.1753 15.1626 12.3877 14.7949 12.6226C14.4805 12.823 14.0546 13.0106 13.5286 13.1806C13.0153 13.3466 12.4942 13.4309 11.9797 13.4309C11.4655 13.4309 10.9444 13.3466 10.4308 13.1806C9.90527 13.0108 9.47919 12.8231 9.16534 12.6228C8.80115 12.3901 8.47156 12.1777 8.18573 11.9915C7.72852 11.6936 7.49158 11.593 7.24658 11.593C6.62256 11.593 6.03955 11.6987 5.51349 11.9071C4.98578 12.116 4.52893 12.4029 4.15558 12.7602C3.79889 13.1015 3.48102 13.5158 3.21075 13.9917C2.9502 14.4504 2.73926 14.9288 2.58398 15.4139C2.43402 15.8828 2.30859 16.3957 2.21118 16.9384C2.1145 17.4764 2.04913 17.9867 2.01672 18.4555C1.98486 18.9138 1.96875 19.3908 1.96875 19.8727C1.96875 21.1255 2.367 22.1397 3.15234 22.8877C3.92798 23.6258 4.9541 24.0001 6.20233 24.0001H17.7585C19.0063 24.0001 20.0325 23.6258 20.8083 22.8877C21.5938 22.1403 21.9921 21.1257 21.9921 19.8725C21.9919 19.3889 21.9756 18.9119 21.9435 18.4549V18.4549ZM19.8386 21.8687C19.326 22.3565 18.6456 22.5936 17.7583 22.5936H6.20233C5.31482 22.5936 4.6344 22.3565 4.12207 21.8689C3.61945 21.3904 3.37518 20.7373 3.37518 19.8727C3.37518 19.423 3.39001 18.979 3.41968 18.5527C3.44861 18.1345 3.50775 17.6751 3.59546 17.1869C3.68207 16.7048 3.7923 16.2523 3.9234 15.8427C4.04919 15.45 4.22076 15.0611 4.43353 14.6864C4.6366 14.3294 4.87024 14.023 5.12805 13.7762C5.3692 13.5453 5.67316 13.3563 6.03131 13.2146C6.36255 13.0835 6.7348 13.0117 7.13892 13.0009C7.18817 13.0271 7.27588 13.0771 7.41797 13.1698C7.70709 13.3582 8.04034 13.5731 8.40875 13.8084C8.82404 14.0732 9.35907 14.3123 9.99829 14.5187C10.6518 14.73 11.3183 14.8373 11.9799 14.8373C12.6414 14.8373 13.3081 14.73 13.9612 14.5189C14.601 14.3122 15.1359 14.0732 15.5517 13.8081C15.9287 13.5671 16.2526 13.3584 16.5417 13.1698C16.6838 13.0773 16.7715 13.0271 16.8208 13.0009C17.2251 13.0117 17.5974 13.0835 17.9288 13.2146C18.2867 13.3563 18.5907 13.5455 18.8318 13.7762C19.0897 14.0228 19.3233 14.3292 19.5264 14.6866C19.7393 15.0611 19.9111 15.4501 20.0367 15.8425C20.168 16.2527 20.2784 16.705 20.3648 17.1867C20.4523 17.6758 20.5117 18.1354 20.5406 18.5529V18.5532C20.5704 18.9779 20.5854 19.4217 20.5856 19.8727C20.5854 20.7375 20.3412 21.3904 19.8386 21.8687V21.8687Z"
                                                                      fill="black" />
                                                            </g>

                                                        </svg>
                                                    </span> Users
                                            </a>
                                        </li>
                                        <li class="sidebar-menu">
                                            <a href="{{route('list-protocols')}}" class="link text-16 text-light-pink">
                                                    <span class="svg-block">
                                                        <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                            <g class="admin-icon-color" opacity="0.3">
                                                                <path class="admin-icon-color"
                                                                      d="M21.3299 18.7142L21.3299 18.7141L21.322 18.7139C20.1111 18.6755 19.2255 18.36 18.5667 17.8946C17.9052 17.4273 17.4236 16.7743 17.0792 15.9852C16.3843 14.3932 16.287 12.3388 16.3732 10.4879C16.4503 10.042 16.49 9.55317 16.5228 9.06542C16.5314 8.93748 16.5395 8.80953 16.5477 8.68127C16.5727 8.28928 16.5978 7.89436 16.6369 7.48784C16.7404 6.41232 16.9341 5.36355 17.4119 4.44324C17.8787 3.5441 18.6354 2.73145 19.9401 2.15184C21.1423 1.61776 22.8344 1.27136 25.2267 1.27632C25.2148 1.48587 25.1967 1.73396 25.1695 2.012C25.0813 2.91303 24.8987 4.11301 24.5242 5.32994C23.7636 7.80129 22.3031 10.0933 19.4846 10.4657L17.1506 10.7741L19.2329 11.8726C20.3632 12.4688 21.0702 13.0709 21.5192 13.6505C21.9633 14.2237 22.1814 14.8087 22.2849 15.4169C22.3911 16.0414 22.3771 16.6873 22.348 17.4022C22.3456 17.461 22.3431 17.5205 22.3406 17.5804C22.3248 17.9555 22.308 18.3522 22.3129 18.7556L21.3299 18.7142Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M9.33615 6.93066L9.33608 6.93067L9.3371 6.94342C9.36207 7.25663 9.38987 7.57825 9.41819 7.90604C9.60659 10.0863 9.81856 12.5393 9.38176 14.601C9.135 15.7657 8.69276 16.7326 7.97698 17.431C7.27287 18.118 6.23526 18.6125 4.66153 18.7141L3.68654 18.7554C3.69135 18.3525 3.67465 17.9561 3.65886 17.5814C3.65631 17.5208 3.65378 17.4608 3.65137 17.4014C3.62235 16.6864 3.60847 16.0403 3.71484 15.4158C3.81843 14.8076 4.03663 14.2228 4.48068 13.65C4.9297 13.0708 5.63656 12.4693 6.76644 11.874L8.85114 10.7756L6.51508 10.4669C3.69665 10.0945 2.23623 7.80231 1.47573 5.33062C1.10125 4.11353 0.918708 2.91339 0.830588 2.01224C0.801511 1.71489 0.782876 1.4518 0.770953 1.23345C4.90004 1.00837 6.98225 2.43716 8.06102 3.82931C8.64768 4.58639 8.96896 5.37294 9.14295 5.97318C9.22964 6.27222 9.27865 6.52123 9.30569 6.69147C9.31919 6.77645 9.32714 6.84136 9.33156 6.88255C9.33376 6.90313 9.33509 6.91774 9.33577 6.92593L9.33615 6.93066ZM0.750089 0.547526L0.750089 0.547541L0.750089 0.547526ZM9.33636 6.9333C9.33639 6.93371 9.33639 6.9337 9.33636 6.93326L9.33636 6.9333Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M13.4462 17.6846L13.4313 17.9499L12.5907 18.2633L12.5846 18.1585C12.847 18.027 13.1426 17.8683 13.4462 17.6846Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.4416 15.7169L12.4386 15.6646C12.7756 15.5018 13.1823 15.2879 13.5971 15.0276L13.5822 15.2904L12.4416 15.7169Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.04 12.1712L12.1033 12.3395L12.1033 12.3395L12.04 12.1712ZM12.2694 12.7811L12.2694 12.7811L12.304 12.8732L12.3346 12.8617L12.364 12.8476C12.7498 12.6629 13.255 12.4006 13.7627 12.069L13.746 12.3642L12.2772 12.913L12.2755 12.884L12.2806 12.882L12.2979 12.8755L12.3025 12.8738L12.3036 12.8734L12.3039 12.8733L12.304 12.8732L12.304 12.8732L12.2694 12.7811Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.1229 10.2561L12.1213 10.2284C12.7215 9.98773 13.3432 9.6747 13.9217 9.27599L13.904 9.59065L12.1229 10.2561Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M14.3871 2.7083L14.4069 2.70341L14.4263 2.69747C14.5896 2.64749 14.6859 2.63589 14.7377 2.63589C14.7449 2.65789 14.7535 2.69004 14.7612 2.73516C14.7821 2.85742 14.7895 3.03006 14.7753 3.2613C14.7468 3.72685 14.6399 4.31464 14.4968 4.99654C14.4519 5.21055 14.4031 5.43469 14.3532 5.66442C14.2788 6.00705 14.2016 6.36211 14.1303 6.71446L11.9931 7.51313C11.9608 7.12673 11.8799 6.72738 11.7919 6.35355C11.7198 6.0474 11.636 5.73198 11.5549 5.42692L11.5541 5.42395C11.4722 5.11604 11.3929 4.818 11.3242 4.52844C11.1826 3.9318 11.1061 3.44923 11.1289 3.09258C11.1465 2.81668 11.2127 2.71789 11.2719 2.67192C11.4396 2.62254 11.5325 2.6458 11.8381 2.72232C11.8915 2.73571 11.9515 2.75072 12.0195 2.76726C12.5574 2.89809 13.2433 2.99161 14.3871 2.7083ZM14.7891 2.64414C14.7881 2.64533 14.78 2.6443 14.7678 2.63752C14.784 2.63957 14.7901 2.64296 14.7891 2.64414Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                            </g>
                                                        </svg>
                                                    </span> Protocol
                                            </a>
                                            <a href="{{route('list-protocol-chapters')}}" class="link text-16 text-light-pink">
                                                    <span class="svg-block">
                                                        <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                            <g class="admin-icon-color" opacity="0.3">
                                                                <path class="admin-icon-color"
                                                                      d="M21.3299 18.7142L21.3299 18.7141L21.322 18.7139C20.1111 18.6755 19.2255 18.36 18.5667 17.8946C17.9052 17.4273 17.4236 16.7743 17.0792 15.9852C16.3843 14.3932 16.287 12.3388 16.3732 10.4879C16.4503 10.042 16.49 9.55317 16.5228 9.06542C16.5314 8.93748 16.5395 8.80953 16.5477 8.68127C16.5727 8.28928 16.5978 7.89436 16.6369 7.48784C16.7404 6.41232 16.9341 5.36355 17.4119 4.44324C17.8787 3.5441 18.6354 2.73145 19.9401 2.15184C21.1423 1.61776 22.8344 1.27136 25.2267 1.27632C25.2148 1.48587 25.1967 1.73396 25.1695 2.012C25.0813 2.91303 24.8987 4.11301 24.5242 5.32994C23.7636 7.80129 22.3031 10.0933 19.4846 10.4657L17.1506 10.7741L19.2329 11.8726C20.3632 12.4688 21.0702 13.0709 21.5192 13.6505C21.9633 14.2237 22.1814 14.8087 22.2849 15.4169C22.3911 16.0414 22.3771 16.6873 22.348 17.4022C22.3456 17.461 22.3431 17.5205 22.3406 17.5804C22.3248 17.9555 22.308 18.3522 22.3129 18.7556L21.3299 18.7142Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M9.33615 6.93066L9.33608 6.93067L9.3371 6.94342C9.36207 7.25663 9.38987 7.57825 9.41819 7.90604C9.60659 10.0863 9.81856 12.5393 9.38176 14.601C9.135 15.7657 8.69276 16.7326 7.97698 17.431C7.27287 18.118 6.23526 18.6125 4.66153 18.7141L3.68654 18.7554C3.69135 18.3525 3.67465 17.9561 3.65886 17.5814C3.65631 17.5208 3.65378 17.4608 3.65137 17.4014C3.62235 16.6864 3.60847 16.0403 3.71484 15.4158C3.81843 14.8076 4.03663 14.2228 4.48068 13.65C4.9297 13.0708 5.63656 12.4693 6.76644 11.874L8.85114 10.7756L6.51508 10.4669C3.69665 10.0945 2.23623 7.80231 1.47573 5.33062C1.10125 4.11353 0.918708 2.91339 0.830588 2.01224C0.801511 1.71489 0.782876 1.4518 0.770953 1.23345C4.90004 1.00837 6.98225 2.43716 8.06102 3.82931C8.64768 4.58639 8.96896 5.37294 9.14295 5.97318C9.22964 6.27222 9.27865 6.52123 9.30569 6.69147C9.31919 6.77645 9.32714 6.84136 9.33156 6.88255C9.33376 6.90313 9.33509 6.91774 9.33577 6.92593L9.33615 6.93066ZM0.750089 0.547526L0.750089 0.547541L0.750089 0.547526ZM9.33636 6.9333C9.33639 6.93371 9.33639 6.9337 9.33636 6.93326L9.33636 6.9333Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M13.4462 17.6846L13.4313 17.9499L12.5907 18.2633L12.5846 18.1585C12.847 18.027 13.1426 17.8683 13.4462 17.6846Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.4416 15.7169L12.4386 15.6646C12.7756 15.5018 13.1823 15.2879 13.5971 15.0276L13.5822 15.2904L12.4416 15.7169Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.04 12.1712L12.1033 12.3395L12.1033 12.3395L12.04 12.1712ZM12.2694 12.7811L12.2694 12.7811L12.304 12.8732L12.3346 12.8617L12.364 12.8476C12.7498 12.6629 13.255 12.4006 13.7627 12.069L13.746 12.3642L12.2772 12.913L12.2755 12.884L12.2806 12.882L12.2979 12.8755L12.3025 12.8738L12.3036 12.8734L12.3039 12.8733L12.304 12.8732L12.304 12.8732L12.2694 12.7811Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.1229 10.2561L12.1213 10.2284C12.7215 9.98773 13.3432 9.6747 13.9217 9.27599L13.904 9.59065L12.1229 10.2561Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M14.3871 2.7083L14.4069 2.70341L14.4263 2.69747C14.5896 2.64749 14.6859 2.63589 14.7377 2.63589C14.7449 2.65789 14.7535 2.69004 14.7612 2.73516C14.7821 2.85742 14.7895 3.03006 14.7753 3.2613C14.7468 3.72685 14.6399 4.31464 14.4968 4.99654C14.4519 5.21055 14.4031 5.43469 14.3532 5.66442C14.2788 6.00705 14.2016 6.36211 14.1303 6.71446L11.9931 7.51313C11.9608 7.12673 11.8799 6.72738 11.7919 6.35355C11.7198 6.0474 11.636 5.73198 11.5549 5.42692L11.5541 5.42395C11.4722 5.11604 11.3929 4.818 11.3242 4.52844C11.1826 3.9318 11.1061 3.44923 11.1289 3.09258C11.1465 2.81668 11.2127 2.71789 11.2719 2.67192C11.4396 2.62254 11.5325 2.6458 11.8381 2.72232C11.8915 2.73571 11.9515 2.75072 12.0195 2.76726C12.5574 2.89809 13.2433 2.99161 14.3871 2.7083ZM14.7891 2.64414C14.7881 2.64533 14.78 2.6443 14.7678 2.63752C14.784 2.63957 14.7901 2.64296 14.7891 2.64414Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                            </g>
                                                        </svg>
                                                    </span> Protocol Chapters
                                            </a>
                                        </li>
                                        <li class="sidebar-menu">
                                            <a href="{{route('list-packages')}}" class="link text-16 text-light-pink">
                                                    <span class="svg-block">
                                                        <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                            <g class="admin-icon-color" opacity="0.3">
                                                                <path class="admin-icon-color"
                                                                      d="M21.3299 18.7142L21.3299 18.7141L21.322 18.7139C20.1111 18.6755 19.2255 18.36 18.5667 17.8946C17.9052 17.4273 17.4236 16.7743 17.0792 15.9852C16.3843 14.3932 16.287 12.3388 16.3732 10.4879C16.4503 10.042 16.49 9.55317 16.5228 9.06542C16.5314 8.93748 16.5395 8.80953 16.5477 8.68127C16.5727 8.28928 16.5978 7.89436 16.6369 7.48784C16.7404 6.41232 16.9341 5.36355 17.4119 4.44324C17.8787 3.5441 18.6354 2.73145 19.9401 2.15184C21.1423 1.61776 22.8344 1.27136 25.2267 1.27632C25.2148 1.48587 25.1967 1.73396 25.1695 2.012C25.0813 2.91303 24.8987 4.11301 24.5242 5.32994C23.7636 7.80129 22.3031 10.0933 19.4846 10.4657L17.1506 10.7741L19.2329 11.8726C20.3632 12.4688 21.0702 13.0709 21.5192 13.6505C21.9633 14.2237 22.1814 14.8087 22.2849 15.4169C22.3911 16.0414 22.3771 16.6873 22.348 17.4022C22.3456 17.461 22.3431 17.5205 22.3406 17.5804C22.3248 17.9555 22.308 18.3522 22.3129 18.7556L21.3299 18.7142Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M9.33615 6.93066L9.33608 6.93067L9.3371 6.94342C9.36207 7.25663 9.38987 7.57825 9.41819 7.90604C9.60659 10.0863 9.81856 12.5393 9.38176 14.601C9.135 15.7657 8.69276 16.7326 7.97698 17.431C7.27287 18.118 6.23526 18.6125 4.66153 18.7141L3.68654 18.7554C3.69135 18.3525 3.67465 17.9561 3.65886 17.5814C3.65631 17.5208 3.65378 17.4608 3.65137 17.4014C3.62235 16.6864 3.60847 16.0403 3.71484 15.4158C3.81843 14.8076 4.03663 14.2228 4.48068 13.65C4.9297 13.0708 5.63656 12.4693 6.76644 11.874L8.85114 10.7756L6.51508 10.4669C3.69665 10.0945 2.23623 7.80231 1.47573 5.33062C1.10125 4.11353 0.918708 2.91339 0.830588 2.01224C0.801511 1.71489 0.782876 1.4518 0.770953 1.23345C4.90004 1.00837 6.98225 2.43716 8.06102 3.82931C8.64768 4.58639 8.96896 5.37294 9.14295 5.97318C9.22964 6.27222 9.27865 6.52123 9.30569 6.69147C9.31919 6.77645 9.32714 6.84136 9.33156 6.88255C9.33376 6.90313 9.33509 6.91774 9.33577 6.92593L9.33615 6.93066ZM0.750089 0.547526L0.750089 0.547541L0.750089 0.547526ZM9.33636 6.9333C9.33639 6.93371 9.33639 6.9337 9.33636 6.93326L9.33636 6.9333Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M13.4462 17.6846L13.4313 17.9499L12.5907 18.2633L12.5846 18.1585C12.847 18.027 13.1426 17.8683 13.4462 17.6846Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.4416 15.7169L12.4386 15.6646C12.7756 15.5018 13.1823 15.2879 13.5971 15.0276L13.5822 15.2904L12.4416 15.7169Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.04 12.1712L12.1033 12.3395L12.1033 12.3395L12.04 12.1712ZM12.2694 12.7811L12.2694 12.7811L12.304 12.8732L12.3346 12.8617L12.364 12.8476C12.7498 12.6629 13.255 12.4006 13.7627 12.069L13.746 12.3642L12.2772 12.913L12.2755 12.884L12.2806 12.882L12.2979 12.8755L12.3025 12.8738L12.3036 12.8734L12.3039 12.8733L12.304 12.8732L12.304 12.8732L12.2694 12.7811Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M12.1229 10.2561L12.1213 10.2284C12.7215 9.98773 13.3432 9.6747 13.9217 9.27599L13.904 9.59065L12.1229 10.2561Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                                <path class="admin-icon-color"
                                                                      d="M14.3871 2.7083L14.4069 2.70341L14.4263 2.69747C14.5896 2.64749 14.6859 2.63589 14.7377 2.63589C14.7449 2.65789 14.7535 2.69004 14.7612 2.73516C14.7821 2.85742 14.7895 3.03006 14.7753 3.2613C14.7468 3.72685 14.6399 4.31464 14.4968 4.99654C14.4519 5.21055 14.4031 5.43469 14.3532 5.66442C14.2788 6.00705 14.2016 6.36211 14.1303 6.71446L11.9931 7.51313C11.9608 7.12673 11.8799 6.72738 11.7919 6.35355C11.7198 6.0474 11.636 5.73198 11.5549 5.42692L11.5541 5.42395C11.4722 5.11604 11.3929 4.818 11.3242 4.52844C11.1826 3.9318 11.1061 3.44923 11.1289 3.09258C11.1465 2.81668 11.2127 2.71789 11.2719 2.67192C11.4396 2.62254 11.5325 2.6458 11.8381 2.72232C11.8915 2.73571 11.9515 2.75072 12.0195 2.76726C12.5574 2.89809 13.2433 2.99161 14.3871 2.7083ZM14.7891 2.64414C14.7881 2.64533 14.78 2.6443 14.7678 2.63752C14.784 2.63957 14.7901 2.64296 14.7891 2.64414Z"
                                                                      stroke="black" stroke-width="1.5" />
                                                            </g>
                                                        </svg>
                                                    </span> Packages
                                            </a>
                                        </li>


                                        <li class="sidebar-menu">
                                            <a  class="link text-16 text-light-pink">
                                                <span class="svg-block">
                                                    <svg class="svg-icon" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <mask id="path-1-inside-1" fill="white">
                                                            <rect x="0.000244141" width="24" height="16" rx="1" />
                                                        </mask>
                                                        <rect class="admin-icon-color" x="0.000244141" width="24"
                                                              height="16" rx="1" stroke="#B3B3B3" stroke-width="4"
                                                              mask="url(#path-1-inside-1)" />
                                                        <mask id="path-2-inside-2" fill="white">
                                                            <rect x="0.000244141" y="18" width="24" height="6" rx="1" />
                                                        </mask>
                                                        <rect class="admin-icon-color" x="0.000244141" y="18" width="24"
                                                              height="6" rx="1" stroke="#B3B3B3" stroke-width="4"
                                                              mask="url(#path-2-inside-2)" />
                                                    </svg>

                                                </span> Surgicla Algoritham <span class="dropdown__arrow up">
                                                    <img src="{{asset('assets/images/icons/arrow-down.svg')}}" alt="">
                                                </span>
                                            </a>
                                            <ul class="submenu">
                                                <li class="sub-menu-list"><a href="{{route('surgical-categories')}}">Surgical Categories</a></li>
                                            </ul>
                                        </li>


                                        <li class="sidebar-menu">
                                            <a href="{{route('list-static-pages')}}" class="link text-16 text-light-pink">
                                                    <span class="svg-block">
                                                        <svg class="svg-icon" viewBox="0 0 26 24" fill="none">
                                                            <g class="admin-icon-color" opacity="0.3">
                                                                <path class="admin-icon-color"
                                                                      d="M20.6596 1.64796C19.45 0.440446 17.4911 0.440446 16.2815 1.64796L15.1855 2.74991L3.51926 14.41L3.49447 14.435C3.48846 14.441 3.48846 14.4474 3.48207 14.4474C3.46967 14.466 3.45108 14.4844 3.43888 14.5029C3.43888 14.5091 3.43248 14.5091 3.43248 14.5153C3.42009 14.5339 3.41408 14.5463 3.40149 14.5649C3.39549 14.5711 3.39549 14.5771 3.38929 14.5835C3.38309 14.6021 3.37689 14.6145 3.3705 14.6331C3.3705 14.6391 3.3645 14.6391 3.3645 14.6455L0.776104 22.4291C0.700174 22.6507 0.757896 22.8961 0.924671 23.0605C1.04186 23.1762 1.19992 23.2409 1.36437 23.2403C1.43158 23.2391 1.49821 23.2287 1.56252 23.2093L9.34009 20.6147C9.34609 20.6147 9.34609 20.6147 9.35249 20.6087C9.37205 20.6029 9.39084 20.5946 9.40808 20.5837C9.41292 20.5831 9.41718 20.581 9.42067 20.5777C9.43907 20.5653 9.46386 20.5527 9.48246 20.5403C9.50086 20.5281 9.51965 20.5095 9.53824 20.4971C9.54444 20.4907 9.55045 20.4907 9.55045 20.4847C9.55684 20.4785 9.56923 20.4725 9.57543 20.4599L22.3376 7.69774C23.5452 6.4881 23.5452 4.52922 22.3376 3.31977L20.6596 1.64796ZM9.14194 19.1595L4.83215 14.8499L15.619 4.06299L19.9288 8.37259L9.14194 19.1595ZM4.2251 15.9954L7.99021 19.7603L2.33654 21.6427L4.2251 15.9954ZM21.4646 6.83075L20.8082 7.49339L16.4982 3.18341L17.161 2.52096C17.8861 1.79653 19.0612 1.79653 19.7864 2.52096L21.4706 4.20517C22.1902 4.93347 22.1875 6.10593 21.4646 6.83075Z"
                                                                      fill="black" />
                                                            </g>
                                                        </svg>

                                                    </span> App Static Pages
                                            </a>
                                        </li>
                                    @endif

                                    <li class="sidebar-menu">
                                        <a href="{{route('admin-settings')}}" class="link text-16 text-light-pink">
                                                <span class="svg-block">
                                                    <svg class="svg-icon" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g class="admin-icon-color" opacity="0.3"
                                                           clip-path="url(#clip0)">
                                                            <path class="admin-icon-color"
                                                                  d="M12.015 7C9.25793 7 7.01489 9.24304 7.01489 12.0001C7.01489 14.7571 9.25793 17.0001 12.015 17.0001C14.7718 17.0001 17.0148 14.7571 17.0148 12.0001C17.0148 9.24304 14.7718 7 12.015 7ZM12.015 15.5001C10.0848 15.5001 8.51489 13.93 8.51489 12.0001C8.51489 10.0701 10.0848 8.5 12.015 8.5C13.9449 8.5 15.5148 10.0701 15.5148 12.0001C15.5148 13.93 13.9449 15.5001 12.015 15.5001Z"
                                                                  fill="black" />
                                                            <path class="admin-icon-color"
                                                                  d="M13.6783 0H10.3522C9.5522 0 8.84523 0.567993 8.67128 1.35095L8.25032 3.22302C7.56422 3.51398 6.91017 3.89392 6.29622 4.35791L4.47322 3.78204C3.69117 3.53906 2.8412 3.87103 2.44917 4.57104L0.791334 7.43793C0.394178 8.14801 0.528211 9.02197 1.11232 9.57202L2.52516 10.871C2.48231 11.252 2.46126 11.6299 2.46126 12C2.46126 12.3701 2.48231 12.748 2.52424 13.129L1.11928 14.4219C0.528211 14.978 0.393262 15.852 0.786207 16.5529L2.4543 19.4379C2.8412 20.1301 3.69319 20.4589 4.47029 20.22L6.29622 19.643C6.91017 20.107 7.56422 20.4869 8.25032 20.7781L8.67219 22.652C8.84523 23.432 9.5522 24 10.3522 24H13.6783C14.4783 24 15.1853 23.432 15.3592 22.649L15.7802 20.777C16.4663 20.486 17.1203 20.1061 17.7343 19.6421L19.5573 20.218C20.3413 20.4589 21.1893 20.129 21.5813 19.429L23.2393 16.5621C23.6363 15.852 23.5023 14.978 22.9182 14.428L21.5053 13.129C21.5473 12.748 21.5683 12.369 21.5683 12C21.5683 11.631 21.5473 11.252 21.5053 10.871L22.9112 9.57898C22.9132 9.57697 22.9152 9.57495 22.9182 9.57294C23.5023 9.02307 23.6372 8.14893 23.2443 7.448L21.5762 4.56299C21.1893 3.87103 20.3393 3.53998 19.5593 3.78204L17.7332 4.35901C17.1192 3.89502 16.4652 3.51508 15.7792 3.22394L15.3572 1.35004C15.1853 0.567993 14.4783 0 13.6783 0ZM6.44929 5.94104C6.62123 5.94104 6.79023 5.88208 6.92628 5.77002C7.61329 5.20496 8.36219 4.76898 9.15522 4.47693C9.39418 4.38904 9.57124 4.18597 9.62727 3.93805L10.1363 1.67798C10.1592 1.57397 10.2502 1.5 10.3533 1.5H13.6792C13.7823 1.5 13.8733 1.57397 13.8953 1.67596L14.4052 3.93805C14.4613 4.18597 14.6383 4.38904 14.8773 4.47693C15.6692 4.76898 16.4192 5.20496 17.1062 5.77002C17.3023 5.93207 17.5662 5.98407 17.8093 5.90698L20.0103 5.21191C20.1152 5.17896 20.2272 5.21796 20.2752 5.30402L21.9433 8.18903C21.9933 8.27802 21.9752 8.39996 21.8953 8.47797L20.2073 10.03C20.0242 10.1981 19.9363 10.4471 19.9733 10.693C20.0392 11.1359 20.0723 11.5759 20.0723 12.0009C20.0723 12.4261 20.0392 12.8661 19.9733 13.309C19.9363 13.5549 20.0242 13.803 20.2073 13.972L21.8992 15.5281C21.9752 15.5989 21.9933 15.7231 21.9382 15.822L20.2802 18.689C20.2263 18.7841 20.1123 18.822 20.0082 18.789L17.8103 18.095C17.5682 18.0179 17.3043 18.0699 17.1073 18.232C16.4203 18.7971 15.6712 19.233 14.8782 19.5251C14.6392 19.613 14.4622 19.816 14.4063 20.064L13.8973 22.324C13.8722 22.426 13.7812 22.5 13.6783 22.5H10.3522C10.2493 22.5 10.1583 22.426 10.1363 22.324L9.62617 20.062C9.57032 19.814 9.39326 19.6121 9.15431 19.5231C8.36219 19.231 7.61219 18.795 6.92628 18.23C6.72926 18.0679 6.46321 18.017 6.22334 18.093L4.02223 18.7881C3.91932 18.8199 3.80525 18.782 3.75728 18.696L2.08918 15.8121C2.0392 15.722 2.05732 15.598 2.14027 15.52L3.82631 13.9709C4.00923 13.803 4.0973 13.554 4.06032 13.3079C3.99421 12.865 3.96126 12.425 3.96126 12C3.96126 11.575 3.99421 11.135 4.06032 10.6921C4.0973 10.446 4.00923 10.1981 3.82631 10.0291L2.13423 8.47302C2.05824 8.40198 2.0403 8.27802 2.09523 8.17896L3.75325 5.31207C3.80616 5.21704 3.92024 5.18005 4.02516 5.21191L6.22334 5.90607C6.29731 5.93005 6.3733 5.94104 6.44929 5.94104Z"
                                                                  fill="black" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0">
                                                                <rect width="24" height="24" fill="white"
                                                                      transform="matrix(1 0 0 -1 0.000244141 24)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>


                                                </span> Settings
                                        </a>
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
                    <a href="{{route('admin-logout')}}" id="btn-green" class="btn btn-theme-primary send-notification">YES</a>
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
