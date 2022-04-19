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

                                        <div class="card-container section-card-container p-0">

                                            <div class="section-header ">
                                                <div class="header-left">
                                                    <div class="card-inner__end card-inner__start">
                                                        <a href="{{route('create-course')}}" class="btn btn__theme  btn__add">
                                                            Create New Course</a>
                                                    </div>
                                                </div>
                                                <?php $types=array(
                                                    'All'                  =>  0,
                                                    'Published'            =>  APPROVED,
                                                    'Waiting Approval'     =>  WAITING_APPROVAL,
                                                    'Archived'             =>  ARCHIVED,
                                                    'Drafts'             =>  DRAFT,
                                                );?>
                                                <div class="tabs-select-bar section-header tabs-bar__md">
                                                    <div class="tab-head-container">
                                                        <ul class="theme-tabs px-0"  id="checkboxes_container">
                                                            @foreach($types as $key=>$value)
                                                                <li class="theme-tab-item @if($value==0) current @endif" data-tab="tab-{{$value}}">
                                                                    {{ucfirst($key)}}
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                    </div>
                                                    <div class="section-header__controls d-none">
                                                        <ul>
                                                            <li>
                                                                <select class="select" id="bulk_acton">
                                                                    @foreach($types as $key=>$value)
                                                                        @if($key!='All')
                                                                            @if(Auth::user()->user_role==1)
                                                                                <option value="{{$value}}">{{$key}}</option>
                                                                            @elseif(Auth::user()->user_role==2 || Auth::user_role==3)
                                                                                @if($value != WAITING_APPROVAL &&  $value!=APPROVED)
                                                                                    <option value="{{$value}}">{{$key}}</option>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <a href="#" class="btn btn__theme ml-2" id="bulk_apply" data-to="{{route('update-course')}}">Apply</a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                         @foreach($types as $key=>$value)
                                            <div id="tab-{{$value}}" class="theme-tab-content  @if($value==0) current @endif">
                                            <div class="tab-content_container">
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">

                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">

                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-tdetail table__xxl table-add-action " id="table-{{$value}}">

                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check{{$value}}" type="checkbox" name="check"  class="bulk_check"  data-id="{{$value}}" value="check{{$value}}">
                                                                                                <label for="check{{$value}}">

                                                                                                </label> Course Title
                                                                                            </div>
                                                                                        </th>

                                                                                        <th>Lessons</th>
                                                                                        <th>Students</th>
                                                                                        <th>Price</th>
                                                                                        <th>Publication Date</th>

                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="">
                                                                                    @foreach($courses as $course)
                                                                                        @if($value==0)
                                                                                       <tr>

                                                                                        <td class="w-60">
                                                                                            <div class="checkbox">
                                                                                                <input id="check_{{$key}}{{$course['course_id']}}" type="checkbox" name="check_{{$key}}{{$course['course_id']}}[]" value="{{$course['course_id']}}">

                                                                                                <label for="check_{{$key}}{{$course['course_id']}}">

                                                                                                </label> {{$course['title']}}
                                                                                            </div>
                                                                                        </td>

                                                                                        <td>
                                                                                            {{$course['lesson_count']}}
                                                                                        </td>

                                                                                        <td>

                                                                                            {{$course['students_count']}}

                                                                                        </td>

                                                                                        <td>

                                                                                            {{$course['price']}} Token

                                                                                        </td>
                                                                                        <td class="">
                                                                                            {{$course['created_at']->format('d M Y ')}}
                                                                                        </td>

                                                                                        <td>
                                                                                            <div class="dropdown show">
                                                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                </a>

                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                    <a class="dropdown-item" href="{{route('edit-course',['course_id'=>$course->course_id,'type'=>'View'])}}">View</a>
                                                                                                    <a class="dropdown-item" href="{{route('edit-course',['course_id'=>$course->course_id,'type'=>'Edit'])}}">Edit</a>
                                                                                                    <a class="dropdown-item del-record"
                                                                                                       data-url="{{route('delete-course',['course_id'=>$course->course_id])}}">Delete</a>
                                                                                                    @if($course['status']==4)
                                                                                                        <a class="dropdown-item  "
                                                                                                           href="{{route('view-course-enrollments',['course_id'=>$course->course_id])}}">View Enrollments</a>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @else
                                                                                            @if($value==$course->status)

                                                                                                <tr>

                                                                                                    <td class="w-60">
                                                                                                        <div class="checkbox">
                                                                                                            <input id="check_{{$key}}{{$course['course_id']}}" type="checkbox" name="check_{{$key}}{{$course['course_id']}}[]" value="{{$course['course_id']}}">

                                                                                                            <label for="check_{{$key}}{{$course['course_id']}}">

                                                                                                            </label> {{$course['title']}}
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{$course['lesson_count']}}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{$course['students_count']}}
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        {{$course['price']}} Tokens
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{$course['created_at']->format('d M Y ')}}
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        <div class="dropdown show">
                                                                                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                            </a>

                                                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                                <a class="dropdown-item" href="{{route('edit-course',['course_id'=>$course->course_id,'type'=>'View'])}}">View</a>
                                                                                                                <a class="dropdown-item" href="{{route('edit-course',['course_id'=>$course->course_id,'type'=>'Edit'])}}">Edit</a>
                                                                                                                <a class="dropdown-item del-record"
                                                                                                                   data-url="{{route('delete-course',['course_id'=>$course->course_id])}}">Delete</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endif
                                                                                        @endif
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
                                          @endforeach


                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>


            </div>
            <!-- end -->

        <!-- end -->
    </div>
<script>
    $('ul.theme-tabs li').click(function() {
        var tab_id = $(this).attr('data-tab');

        $('ul.theme-tabs li').removeClass('current');
        $('.theme-tab-content').removeClass('current').fadeOut();
        $(this).addClass('current');
        $("#" + tab_id).addClass('current').fadeIn();
    });
</script>
@endsection
