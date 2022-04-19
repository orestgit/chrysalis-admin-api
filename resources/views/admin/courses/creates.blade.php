@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
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
                                                        New Course
                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container">
                                                    <ul class="theme-tabs">
                                                        <li class="theme-tab-item current" data-tab="tab-1">
                                                            Add Lesson
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content">
                                                <div id="tab-1" class="theme-tab-content current">
                                                    <div class="table-container table-container-fixed">

                                                        <div class="table-responsive">
                                                            <table class="table table-variable">
                                                                <thead>
                                                                <tr>
                                                                    <th>Lesson Title</th>
                                                                    <th>Duration</th>
                                                                    <th>Students</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>1.Lesson Title</td>
                                                                    <td>
                                                                        30 min
                                                                    </td>
                                                                    <td>
                                                                        25
                                                                    </td>
                                                                    <td>
                                                                                <span class="badge badge__success">
                                                                                    Completed
                                                                                </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown show">
                                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            </a>

                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                <a class="dropdown-item" href="./single-lesson.html">View</a>
                                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                <a class="dropdown-item" href="./create-lesson.html">Lessons</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1.Lesson Title</td>
                                                                    <td>
                                                                        50 min
                                                                    </td>
                                                                    <td>
                                                                        26
                                                                    </td>
                                                                    <td>
                                                                                <span class="badge badge__success">
                                                                                    Completed
                                                                                </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown show">
                                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            </a>

                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                <a class="dropdown-item" href="./single-lesson.html">View</a>
                                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteModelCenter" href="#">Delete</a>
                                                                                <a class="dropdown-item" href="./create-lesson.html">Lessons</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <section>
                                                        <div class="section-header section-title-head section-lessons-md">
                                                            <div class="section-header__title">
                                                                <h4 class="h4">
                                                                    Add New Lesson
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-8 px-0">
                                                                    <div class="form-container">
                                                                        <form>
                                                                            <div class="form-group form-input-container">
                                                                                <label for="">Lesson Title</label>
                                                                                <input type="text" class="form-control input__theme" name="" id="" aria-describedby="helpId" placeholder="Type Title">
                                                                            </div>
                                                                            <div class="form-group form-input-container">
                                                                                <label for="">Lesson
                                                                                    Overview</label>
                                                                                <textarea class="form-control input__theme textarea__theme" name="" id="" rows="3" placeholder="Type"></textarea>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-4 px-0">
                                                                    <div class="form-container">
                                                                        <form>
                                                                            <div class="form-group form-input-container  avatar-upload">

                                                                                <label for="">Generate QR
                                                                                    Code</label>
                                                                                <label class="image-picker-label" for="imageUpload">
                                                                                    <div id="imagePreview"
                                                                                         class=" qr-code-input  avatar-edit">

                                                                                        <div class="qr-code-view ">
                                                                                            <input type='file'
                                                                                                   id="imageUpload"
                                                                                                   accept=".png, .jpg, .jpeg" />

                                                                                            <span
                                                                                                class="browse-btn">
                                                                                                    Generate
                                                                                                </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="form-group form-input-container select-time-picker">
                                                                                <label for="">Lesson Date</label>
                                                                                <input type="text" class="form-control input__theme " name="" id="datepicker" aria-describedby="helpId" placeholder="Select Date">
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="form-group form-input-container select-time-picker">
                                                                                <label for="">Start Time</label>
                                                                                <input type="text" class="form-control input__theme timepicker" name="" id="" aria-describedby="helpId" placeholder="Select Time">
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="form-group form-input-container select-time-picker">
                                                                                <label for="">End Time</label>
                                                                                <input type="text" class="form-control input__theme timepicker" name="" id="" aria-describedby="helpId" placeholder="Select Time">
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-4 px-0">
                                                                        <div class="form-container">

                                                                            <div class="button-group">

                                                                                <a href="#" class="btn btn__theme">Save
                                                                                    Lesson</a>
                                                                            </div>


                                                                        </div>
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
                                                    <h4 class="h4">
                                                        Course Details
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="section-content inline-content pb-3">
                                                <div class="form-container">
                                                    <form action="">
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Type</label>
                                                            <select name="" id="" class="wide select">
                                                                <option data-display="Classroom Lessons">Nothing
                                                                </option>
                                                                <option value="1">Online</option>
                                                                <option value="2">Offline</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Title</label>
                                                            <input type="text" class="form-control input__theme" name="" id="" aria-describedby="helpId" placeholder="Type title">
                                                            <small class="form-text">
                                                                70 characters max
                                                            </small>
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Price</label>
                                                            <input type="text" class="form-control input__theme" name="" id="" aria-describedby="helpId" placeholder="Type Price in tokens">
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Address</label>
                                                            <input type="text" class="form-control input__theme" name="" id="" aria-describedby="helpId" placeholder="Type Address">
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Summary</label>
                                                            <textarea class="form-control input__theme textarea__theme" name="" id="" rows="3" placeholder="Type here..."></textarea>
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Overview</label>
                                                            <textarea class="form-control input__theme textarea__theme" name="" id="" rows="3" placeholder="Type here..."></textarea>
                                                        </div>
                                                        <div class="form-group form-input-container avatar-upload">

                                                            <label for="">Course Thumbnails</label>
                                                            <label class="image-picker-label" for="imageUpload">
                                                                <div id="imagePreview"
                                                                     class="image-picker-container  avatar-edit">

                                                                    <div class="placeholder-view ">
                                                                        <input type='file' id="imageUpload"
                                                                               accept=".png, .jpg, .jpeg" />

                                                                        <span class="browse-btn">
                                                                                Browse Files
                                                                            </span>
                                                                        <span class="browse-desc">
                                                                                Min. 1170px wide, Max 2mb
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-group form-input-container">
                                                            <label for="">Course Tags</label>
                                                            <input type="text" class="form-control input__theme" name="" id="" aria-describedby="helpId" placeholder="Add tags by comma">
                                                            <!-- <input type="text" class="form-control input__theme" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" placeholder="Add tags" /> -->

                                                        </div>

                                                        <div class="button-group">
                                                            <button class="btn btn__theme btn__light">Save
                                                                draft</button>
                                                            <a href="#" class="btn btn__theme">Preview & publish</a>
                                                        </div>
                                                    </form>
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

@endsection
