@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    <!-- bottom main -->
    <div class="container-fluid main-container">
            <!-- header -->
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                    <div class="header-left">
                        <h2 class="h2">
                            Protocol
                        </h2>
                        <h4 class="h4 fixed">
                            View records or edit protocol
                        </h4>
                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                    <div class="header-right">
                        <ul>
                            <li class="w-100">
                                <div class="search-input">
                                    <input id="search-input" class="form-control focused" type="search" name="" value=""
                                        placeholder="Search here...">
                                </div>
                            </li>
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
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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
                                                <input type="text" class="form-control form-input-type input__theme"
                                                    name="" id="" aria-describedby="helpId"
                                                    placeholder="Type a message">
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
                                                <a href="#"><img src="../../assets/images/others/profile-img.jpg"
                                                        alt=""></a>
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
                                                <a href="#"><img src="../../assets/images/others/profile-img.jpg"
                                                        alt=""></a>
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
                                                <a href="#"><img src="../../assets/images/others/profile-img.jpg"
                                                        alt=""></a>
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
                                                <a href="#"><img src="../../assets/images/others/profile-img.jpg"
                                                        alt=""></a>
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
                                                <a href="#"><img src="../../assets/images/others/profile-img.jpg"
                                                        alt=""></a>
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
                                                <a href="#"><img src="../../assets/images/others/profile-img.jpg"
                                                        alt=""></a>
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
                                        <a href="#" data-toggle="modal" data-target="#logoutModelCenter">Log Out </a>
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
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                    <div class="main-left-container">
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-12">


                                        <div class="card-container section-card-container p-0">

                                            <div class="section-header ">
                                                <div class="header-left">
                                                    <div class="tab-head-container">
                                                        <ul class="btn-edit-protocol px-0">
                                                            <li class="px-0">
                                                                <div class="button-group btn-edit">
                                                                    <a href="./protocol.html"
                                                                        class="btn btn__theme ">Recorded Protocols</a>
                                                                </div>

                                                            </li>

                                                            <li class="px-0">
                                                                <div class="button-group btn-edit">
                                                                    <a href="./edit-protocol.html"
                                                                        class="btn btn__theme light-shadow ">Edit
                                                                        Protocol</a>
                                                                </div>

                                                            </li>


                                                        </ul>

                                                    </div>
                                                </div>
                                                <div class="tabs-select-bar section-header tabs-bar__md">

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
                                        <section class="section-space__top">
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                        <div class="main-left-container">
                                                            <section>
                                                                <div class="card">
                                                                    <div class="card-container p-0">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-12 px-0">

                                                                                    <div
                                                                                        class="section-header section-lessons-md">
                                                                                        <div
                                                                                            class="section-header__title header-left--sm">
                                                                                            <h3 class="h3">
                                                                                                Question 1
                                                                                            </h3>
                                                                                        </div>
                                                                                        <div
                                                                                            class="section-header__controls tab-head-container header-tabs--sm">
                                                                                            <ul class="theme-tabs">
                                                                                                <li
                                                                                                    class="theme-tab-item current">
                                                                                                    1
                                                                                                </li>

                                                                                                <li
                                                                                                    class="theme-tab-item">
                                                                                                    2
                                                                                                </li>
                                                                                                <li
                                                                                                    class="theme-tab-item">
                                                                                                    3
                                                                                                </li>
                                                                                                <li
                                                                                                    class="theme-tab-item">
                                                                                                    4
                                                                                                </li>
                                                                                                <li
                                                                                                    class="theme-tab-item">
                                                                                                    Add Question
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="section-content inline-content">
                                                                                        <div class="">
                                                                                            <section>
                                                                                                <div
                                                                                                    class="form-container">
                                                                                                    <form>
                                                                                                        <div
                                                                                                            class="container-fluid">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-12 col-lg-6">
                                                                                                                    <div
                                                                                                                        class="section-header section-title-head section-lessons-md px-0">
                                                                                                                        <div
                                                                                                                            class="section-header__title">
                                                                                                                            <h4
                                                                                                                                class="h4">
                                                                                                                                Question
                                                                                                                                Details
                                                                                                                            </h4>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="input-fields-container">

                                                                                                                        <div
                                                                                                                            class="form-group form-input-container">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                class="form-control input__theme"
                                                                                                                                name=""
                                                                                                                                id=""
                                                                                                                                aria-describedby="helpId"
                                                                                                                                placeholder="Type Question">
                                                                                                                        </div>
                                                                                                                        <div   class="form-group form-input-container">
                                                                                                                            <select    name="" id="tab-1" class="wide select">
                                                                                                                                <option data-display="Select a answer type">
                                                                                                                                    Nothing
                                                                                                                                </option>
                                                                                                                                <option   value="1">
                                                                                                                                    Boolean
                                                                                                                                </option>
                                                                                                                                <option value="2">
                                                                                                                                    Multiple answers
                                                                                                                                </option>
                                                                                                                                <option value="3">
                                                                                                                                    Single answer
                                                                                                                                </option>
                                                                                                                                <option  value="4">
                                                                                                                                    Single answer with images
                                                                                                                                </option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="form-group form-input-container">
                                                                                                                            <textarea
                                                                                                                                class="form-control input__theme textarea__theme"
                                                                                                                                name=""
                                                                                                                                id=""
                                                                                                                                rows="3"
                                                                                                                                placeholder="Short Description"></textarea>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="form-group form-input-container">
                                                                                                                            <textarea
                                                                                                                                class="form-control input__theme textarea__theme textarea__lg"
                                                                                                                                name=""
                                                                                                                                id=""
                                                                                                                                rows="6"
                                                                                                                                placeholder="Long Description"></textarea>
                                                                                                                        </div>


                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-12 col-lg-6">
                                                                                                                    <div
                                                                                                                        id="multiple-type-answer">
                                                                                                                        <div
                                                                                                                            class="container-fluid px-0">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div
                                                                                                                                    class="col-12 col-lg-12">
                                                                                                                                    <div
                                                                                                                                        class="section-header section-title-head section-lessons-md px-0">
                                                                                                                                        <div
                                                                                                                                            class="section-header__title">
                                                                                                                                            <h4
                                                                                                                                                class="h4">
                                                                                                                                                Answer
                                                                                                                                            </h4>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="accordion-radio-options">

                                                                                                                                        <div class="accordion"
                                                                                                                                            id="accordionExample">
                                                                                                                                            <div
                                                                                                                                                class="card">
                                                                                                                                                <div class="card-header card-header-md"
                                                                                                                                                    id="headingOne">
                                                                                                                                                    <h2
                                                                                                                                                        class="mb-0">
                                                                                                                                                        <button
                                                                                                                                                            class="btn btn-link btn-block text-left multiple-choose-accordion"
                                                                                                                                                            type="button"
                                                                                                                                                            data-toggle="collapse"
                                                                                                                                                            data-target="#collapseOne"
                                                                                                                                                            aria-expanded="true"
                                                                                                                                                            aria-controls="collapseOne">
                                                                                                                                                            Multiple
                                                                                                                                                            Choice
                                                                                                                                                        </button>
                                                                                                                                                    </h2>
                                                                                                                                                </div>

                                                                                                                                                <div id="collapseOne"
                                                                                                                                                    class="collapse show"
                                                                                                                                                    aria-labelledby="headingOne"
                                                                                                                                                    data-parent="#accordionExample">
                                                                                                                                                    <div
                                                                                                                                                        class="card-body">
                                                                                                                                                        <div
                                                                                                                                                            class="radio-cards">
                                                                                                                                                            <div
                                                                                                                                                                class="row">
                                                                                                                                                                <div
                                                                                                                                                                    class="col-12 col-lg-12 px-0">
                                                                                                                                                                    <div
                                                                                                                                                                        class="answers-container">


                                                                                                                                                                        <!-- type 1 -->
                                                                                                                                                                        <div
                                                                                                                                                                            class="checkbox-select-option answer-multiple d-none">
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="checkbox"
                                                                                                                                                                                    id="test1"
                                                                                                                                                                                    name="radio-group"
                                                                                                                                                                                    checked>
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test1">Answer
                                                                                                                                                                                    one</label>
                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="checkbox"
                                                                                                                                                                                    id="test2"
                                                                                                                                                                                    name="radio-group">
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test2">Answer
                                                                                                                                                                                    two</label>
                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="checkbox"
                                                                                                                                                                                    id="test3"
                                                                                                                                                                                    name="radio-group">
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test3">Answer
                                                                                                                                                                                    three</label>
                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>

                                                                                                                                                                        <!-- type 2 -->
                                                                                                                                                                        <div
                                                                                                                                                                            class="checkbox-select-option answer-single d-none">
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="radio"
                                                                                                                                                                                    id="test4"
                                                                                                                                                                                    name="radio-group"
                                                                                                                                                                                    checked>
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test4">Answer
                                                                                                                                                                                    one</label>
                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="radio"
                                                                                                                                                                                    id="test5"
                                                                                                                                                                                    name="radio-group">
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test5">Answer
                                                                                                                                                                                    two</label>
                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="radio"
                                                                                                                                                                                    id="test6"
                                                                                                                                                                                    name="radio-group">
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test6">Answer
                                                                                                                                                                                    three</label>
                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>

                                                                                                                                                                        <!-- type 3 -->
                                                                                                                                                                        <div
                                                                                                                                                                            class="checkbox-select-option answer-single-images d-none">
                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer choose-answer-images">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="radio"
                                                                                                                                                                                    id="test7"
                                                                                                                                                                                    name="radio-group"
                                                                                                                                                                                    checked>
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test7"
                                                                                                                                                                                    class="mb-0">

                                                                                                                                                                                </label>

                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>

                                                                                                                                                                            <div
                                                                                                                                                                                class="choose-answer choose-answer-images">
                                                                                                                                                                                <input
                                                                                                                                                                                    type="radio"
                                                                                                                                                                                    id="test8"
                                                                                                                                                                                    name="radio-group"
                                                                                                                                                                                    checked>
                                                                                                                                                                                <label
                                                                                                                                                                                    for="test8"
                                                                                                                                                                                    class="mb-0">
                                                                                                                                                                                    <div
                                                                                                                                                                                        class="avatar-upload">

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="image-picker-label mb-0"
                                                                                                                                                                                            for="imageUpload">
                                                                                                                                                                                            <div id="imagePreview"
                                                                                                                                                                                                class="avatar-edit avatar-checkbox-image imagePreview">

                                                                                                                                                                                                <div
                                                                                                                                                                                                    class="qr-code-view ">
                                                                                                                                                                                                    <input
                                                                                                                                                                                                        type='file'
                                                                                                                                                                                                        id="imageUpload"
                                                                                                                                                                                                        accept=".png, .jpg, .jpeg" />

                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </label>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </label>

                                                                                                                                                                                <img class="delete-button"
                                                                                                                                                                                    src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                            </div>

                                                                                                                                                                        </div>


                                                                                                                                                                    </div>


                                                                                                                                                                    <div
                                                                                                                                                                        class="actions-created review-buttons review-button">
                                                                                                                                                                        <button
                                                                                                                                                                            type="button"
                                                                                                                                                                            class="btn btn__theme btn__light">
                                                                                                                                                                            Add
                                                                                                                                                                            Answer
                                                                                                                                                                        </button>
                                                                                                                                                                    </div>

                                                                                                                                                                </div>

                                                                                                                                                            </div>

                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>



                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div
                                                                                                                        class="button-group btn-edit">
                                                                                                                        <a href="#"
                                                                                                                            class="btn btn__theme ">Save
                                                                                                                            Changes</a>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </section>
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
                                            </div>
                                        </section>


                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

            </div>
            <!-- end -->
        </div>
        <!-- end -->


    </div>
    <!-- body wrapper end -->
    <!--Logout model-->
    <div class="modal fade bd-example-modal-md" id="logoutModelCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal-field">
                <div class="container-fluid">
                    <div class="modal-header">
                        <div class="section-head">
                            <h3 class="modal-title h3" id="exampleModalCenterTitle">
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
                        <button type="button" class="btn btn-theme-secondary send-notification"
                            data-dismiss="modal">NO</button>
                        <a href="#" type="submit" id="btn-green" class="btn btn-theme-primary send-notification">YES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--Logout Model ends-->
    <script>
        // $(document).ready(function() { // CHAT_MENU_OPEN
        $('.chatbox-open').on('click', function () {
            $('.chat-message-popupbox').toggleClass('active');
        });
        $('.message-chatbox-close').on('click', function () {
            $('.chat-message-popupbox').removeClass('active');
        });
        $(document).click(function (event) {
            if (!$(event.target).closest(".chat-message-popupbox, .chatbox-open").length) {
                $("body").find(".chat-message-popupbox").removeClass("active");
            }
        });

        // CHAT_MENU_OPEN
        $('.serach_button').on('click', function () {
            $('.serach_field-area ').addClass('active');
        });
                // });
    </script>
    <script>
        $(document).ready(function () {
            // for MENU notification
            $('.bell_notification_clicker').on('click', function () {
                $('.menu_notification_wrap').toggleClass('active');
            });

            $(document).click(function (event) {
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
    <script>
        $(document).ready(function () {
            $('select').niceSelect();
        });
    </script>
    <script>
        $(document).ready(function () {

            var sel = document.getElementById('tab-1');
            sel.onchange = function () {
                if (this.value == 2) {
                    $('.checkbox-select-option').addClass('d-none')
                    $('#multiple-type-answer').removeClass('d-none')
                    $('.answer-multiple').removeClass('d-none')
                } else if (this.value == 3) {
                    $('#multiple-type-answer').removeClass('d-none')
                    $('.checkbox-select-option').addClass('d-none')
                    $('.answer-single').removeClass('d-none')
                }
                else if (this.value == 4) {
                    $('#multiple-type-answer').removeClass('d-none')
                    $('.checkbox-select-option').addClass('d-none')
                    $('.answer-single-images').removeClass('d-none')
                }
                else if (this.value == 1){
                    $('#multiple-type-answer').addClass('d-none')
                }

            }
        });
    </script>

    @endsection
