@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')


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
                                                <?php $types=array(
                                                    'All'                  =>  0,
                                                    'Published'            =>  APPROVED,
                                                    'Waiting Approval'     =>  WAITING_APPROVAL,
                                                    'Archived'             =>  ARCHIVED,
                                                    'Drafts'               =>  DRAFT,
                                                );

                                                ?>
                                                <div class="tabs-select-bar section-header pins tabs-bar__md">
                                                    <div class="tab-head-container">
                                                        <ul class="theme-tabs px-0">
                                                            @foreach($types as $key=>$value)
                                                                <li data-to="{{ route('get-posts-by-status')}}" data-edit="{{ route('edit-post')}}" data-delete="{{ route('delete-post')}}"
                                                                    class="theme-tab-item inline-tab-links tab-item @if($value==0) current @endif"  data-tab="tab-{{$value}}">
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
                                                                <a href="#" class="btn btn__theme ml-2" id="bulk_apply" data-to="{{route('update-post')}}">Apply</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="tab-content_container theme-tab-content  current" id="tab-0" >
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">
                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-tdetail  table-add-action " id="table-1">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check_All{{$value}}" type="checkbox" name="check_All{{$value}}[]"  class="bulk_check"  data-id="{{$value}}" value="check{{$value}}">
                                                                                                <label for="check_All{{$value}}">

                                                                                                </label> Post Title
                                                                                            </div>
                                                                                        </th>

                                                                                        <th>View</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Published Date</th>
                                                                                        <th>Author</th>
                                                                                        <th>Status</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="" id="tbody">
                                                                                    @foreach($all as $post)
                                                                                        <tr>
                                                                                            <td class="w-60">
                                                                                                <div class="checkbox">
                                                                                                    <input id="check_All{{$post['post_id']}}" type="checkbox" name="check_All{{$post['post_id']}}[]" value="{{$post['post_id']}}">
                                                                                                    <label for="check_All{{$post['post_id']}}">
                                                                                                    </label> {{$post['title']}}
                                                                                                </div>
                                                                                            </td>
                                                                                            <td> {{$post['views']}}   </td>
                                                                                            <td> {{$post['likes']}} </td>
                                                                                            <td class="">
                                                                                                {{$post['created_at']->format('d M Y ')}}
                                                                                            </td>
                                                                                            <td width="300">

                                                                                                <div class="profile-image-container">
                                                                                                    @php
                                                                                                        $user_image=$post['profile_image'];
                                                                                                        $profile_image = $user_image==null ? asset("assets/images/profile_placeholder.jpg") :  asset("uploads/users/$user_image");
                                                                                                    @endphp
                                                                                                    <img src="{{$profile_image}}">
                                                                                                </div>
                                                                                                {{$post['first_name']}} {{$post['last_name']}}
                                                                                            </td>
                                                                                            <td>

                                                                                                @if($post['status']==4)
                                                                                                  Published
                                                                                                @elseif($post['status']==2)
                                                                                                   Waiting Approval
                                                                                                @elseif($post['status']==3)
                                                                                                    Archived
                                                                                                @elseif($post['status']==1)
                                                                                                    Draft
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="dropdown show">
                                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    </a>
                                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                        <a class="dropdown-item" href="{{route('view-post',['id'=>$post->post_id])}}">View</a>
                                                                                                        <a class="dropdown-item" href="{{route('edit-post',['post_id'=>$post->post_id])}}">Edit</a>
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
                                            <div class="tab-content_container theme-tab-content  " id="tab-1" >
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">
                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-detail  table-add-action " id="table-23">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check23" type="checkbox" name="check" class="bulk_check" data-id="23" value="check1">
                                                                                                <label for="check23">

                                                                                                </label> Post Title
                                                                                            </div>
                                                                                        </th>

                                                                                        <th>View</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Published Date</th>
                                                                                        <th>Author</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="" id="tbody">
                                                                                    @foreach($drafts as $post)
                                                                                        <tr>
                                                                                            <td class="w-60">
                                                                                                <div class="checkbox">
                                                                                                    <input id="check_Drafts{{$post['post_id']}}" type="checkbox" name="check_Drafts{{$post['post_id']}}[]" value="{{$post['post_id']}}">
                                                                                                    <label for="check_Drafts{{$post['post_id']}}">
                                                                                                    </label> {{$post['title']}}
                                                                                                </div>
                                                                                            </td>
                                                                                            <td> {{$post['views']}}   </td>
                                                                                            <td> {{$post['likes']}} </td>
                                                                                            <td class="">
                                                                                                {{$post['created_at']->format('d M Y ')}}
                                                                                            </td>
                                                                                            <td width="300">
                                                                                                <div class="profile-image-container">
                                                                                                    @php
                                                                                                        $user_image=$post['profile_image'];
                                                                                                        $profile_image = $user_image==null ? asset("assets/images/profile_placeholder.jpg") :  asset("uploads/users/$user_image");
                                                                                                    @endphp
                                                                                                    <img src="{{$profile_image}}">
                                                                                                </div>
                                                                                                {{$post['first_name']}} {{$post['last_name']}}
                                                                                            </td>

                                                                                            <td>
                                                                                                <div class="dropdown show">
                                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    </a>
                                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                        <a class="dropdown-item" href="{{route('view-post',['id'=>$post->post_id])}}">View</a>
                                                                                                        <a class="dropdown-item" href="{{route('edit-post',['post_id'=>$post->post_id])}}">Edit</a>
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
                                            <div class="tab-content_container theme-tab-content  " id="tab-4" >
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">
                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-detail  table-add-action " id="table-24">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check24" type="checkbox" name="check" class="bulk_check" data-id="24" value="check1">
                                                                                                <label for="check24">

                                                                                                </label> Post Title
                                                                                            </div>
                                                                                        </th>

                                                                                        <th>View</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Published Date</th>
                                                                                        <th>Author</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="" id="tbody">
                                                                                    @foreach($published as $post)
                                                                                        <tr>
                                                                                            <td class="w-60">
                                                                                                <div class="checkbox">
                                                                                                    <input id="check_Drafts{{$post['post_id']}}" type="checkbox" name="check_Drafts{{$post['post_id']}}[]" value="{{$post['post_id']}}">
                                                                                                    <label for="check_Drafts{{$post['post_id']}}">
                                                                                                    </label> {{$post['title']}}
                                                                                                </div>
                                                                                            </td>
                                                                                            <td> {{$post['views']}}   </td>
                                                                                            <td> {{$post['likes']}} </td>
                                                                                            <td class="">
                                                                                                {{$post['created_at']->format('d M Y ')}}
                                                                                            </td>
                                                                                            <td width="300">
                                                                                                <div class="profile-image-container">
                                                                                                    @php
                                                                                                        $user_image=$post['profile_image'];
                                                                                                        $profile_image = $user_image==null ? asset("assets/images/profile_placeholder.jpg") :  asset("uploads/users/$user_image");
                                                                                                    @endphp
                                                                                                    <img src="{{$profile_image}}">
                                                                                                </div>
                                                                                                {{$post['first_name']}} {{$post['last_name']}}
                                                                                            </td>

                                                                                            <td>
                                                                                                <div class="dropdown show">
                                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    </a>
                                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                        <a class="dropdown-item" href="{{route('view-post',['id'=>$post->post_id])}}">View</a>
                                                                                                        <a class="dropdown-item" href="{{route('edit-post',['post_id'=>$post->post_id])}}">Edit</a>
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
                                            <div class="tab-content_container theme-tab-content  " id="tab-2" >
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">
                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-detail  table-add-action " id="table-25">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check25" type="checkbox" name="check" class="bulk_check" data-id="25" value="check1">
                                                                                                <label for="check25">

                                                                                                </label> Post Title
                                                                                            </div>
                                                                                        </th>

                                                                                        <th>View</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Published Date</th>
                                                                                        <th>Author</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="" id="tbody">
                                                                                    @foreach($waiting_approval as $post)
                                                                                        <tr>
                                                                                            <td class="w-60">
                                                                                                <div class="checkbox">
                                                                                                    <input id="check_Drafts{{$post['post_id']}}" type="checkbox" name="check_Drafts{{$post['post_id']}}[]" value="{{$post['post_id']}}">
                                                                                                    <label for="check_Drafts{{$post['post_id']}}">
                                                                                                    </label> {{$post['title']}}
                                                                                                </div>
                                                                                            </td>
                                                                                            <td> {{$post['views']}}   </td>
                                                                                            <td> {{$post['likes']}} </td>
                                                                                            <td class="">
                                                                                                {{$post['created_at']->format('d M Y ')}}
                                                                                            </td>
                                                                                            <td width="300">
                                                                                                <div class="profile-image-container">
                                                                                                    @php
                                                                                                        $user_image=$post['profile_image'];
                                                                                                        $profile_image = $user_image==null ? asset("assets/images/profile_placeholder.jpg") :  asset("uploads/users/$user_image");
                                                                                                    @endphp
                                                                                                    <img src="{{$profile_image}}">
                                                                                                </div>
                                                                                                {{$post['first_name']}} {{$post['last_name']}}
                                                                                            </td>

                                                                                            <td>
                                                                                                <div class="dropdown show">
                                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    </a>
                                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                        <a class="dropdown-item" href="{{route('view-post',['id'=>$post->post_id])}}">View</a>
                                                                                                        <a class="dropdown-item" href="{{route('edit-post',['post_id'=>$post->post_id])}}">Edit</a>
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
                                            <div class="tab-content_container theme-tab-content  " id="tab-3" >
                                                <div class="tab-content_data">
                                                    <section class="section-space__top">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                                    <div class="card-container px-0 py-4">
                                                                        <div class="table-container">
                                                                            <div class="table-responsive">
                                                                                <table class="table tbody-detail  table-add-action " id="table-26">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="w-30">
                                                                                            <div class="checkbox">
                                                                                                <input id="check26" type="checkbox" name="check" class="bulk_check" data-id="26" value="check1">
                                                                                                <label for="check26">

                                                                                                </label> Post Title
                                                                                            </div>
                                                                                        </th>

                                                                                        <th>View</th>
                                                                                        <th>Likes</th>
                                                                                        <th>Published Date</th>
                                                                                        <th>Author</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody class="" id="tbody">
                                                                                    @foreach($archived as $post)
                                                                                        <tr>
                                                                                            <td class="w-60">
                                                                                                <div class="checkbox">
                                                                                                    <input id="check_Drafts{{$post['post_id']}}" type="checkbox" name="check_Drafts{{$post['post_id']}}[]" value="{{$post['post_id']}}">
                                                                                                    <label for="check_Drafts{{$post['post_id']}}">
                                                                                                    </label> {{$post['title']}}
                                                                                                </div>
                                                                                            </td>
                                                                                            <td> {{$post['views']}}   </td>
                                                                                            <td> {{$post['likes']}} </td>
                                                                                            <td class="">
                                                                                                {{$post['created_at']->format('d M Y ')}}
                                                                                            </td>
                                                                                            <td width="300">
                                                                                                <div class="profile-image-container">
                                                                                                    @php
                                                                                                        $user_image=$post['profile_image'];
                                                                                                        $profile_image = $user_image==null ? asset("assets/images/profile_placeholder.jpg") :  asset("uploads/users/$user_image");
                                                                                                    @endphp
                                                                                                    <img src="{{$profile_image}}">
                                                                                                </div>
                                                                                                {{$post['first_name']}} {{$post['last_name']}}
                                                                                            </td>

                                                                                            <td>
                                                                                                <div class="dropdown show">
                                                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    </a>
                                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                                                        <a class="dropdown-item" href="{{route('view-post',['id'=>$post->post_id])}}">View</a>
                                                                                                        <a class="dropdown-item" href="{{route('edit-post',['post_id'=>$post->post_id])}}">Edit</a>
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
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
    <!-- end -->
    </div>
    <script type="text/javascript">
        /*  $('.tab-item').on('click',function (e) {
              var url = $(this).data('to');
              $.ajaxSetup({
                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
              });
              $.ajax({
                  url: url,
                  type: "POST",
                  cache: false,
                  data: {  status: $(this).data('id')},
                  success: function(response) {
                      $.each( response, function( key, value ) {
{{--var post_id="<?=route('edit-post',['post_id'=>"post_id,'action'=>'view']')?>";--}}
        var edit_rout= "<?=route('edit-post', ['post_id' => '+value.post_id+'])?>";
                        var html="<tr>";
                        html+='<td class="w-60">';
                        html+='<div class="checkbox">';
                        html+='<input id="check4" type="checkbox" name="check" value="check4">';
                        html+='<label for="check4"> </label> '+value.title;
                        html+='</td>';
                        html+='<td>'+value.views+'</td>';
                        html+='<td>'+value.likes+'</td>';
                        html+='<td class="">  '+value.created_at+'</td>';
                        html+='<td>';
                        html+='<div class="profile-image-container"> <img src="{{asset('asset/uploads/users/')}}/'+value.image+'"></div>';
                        html+='Melinda';
                        html+='</td>';
                        html+='<td>';
                        html+='<div class="dropdown show">'
                        html+='<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>';
                        html+='<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                        html+='<a class="dropdown-item" href="./post-review.html">View</a>';
                        html+='<a class="dropdown-item" href="{{}}">Edit</a>';
                        html+='<a class="dropdown-item" href="#">Delete</a>';
                        html+='</div>'
                        html+='</div>'
                        html+='</td>';
                        html+='</tr>';
                        $('#tbody').html(html);
                    });

                }
            })
        })
*/
        $('ul.theme-tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');

            $('ul.theme-tabs li').removeClass('current');
            $('.theme-tab-content').removeClass('current').fadeOut();

            $(this).addClass('current');
            $("#" + tab_id).addClass('current').fadeIn();
        })
        $('#table-23,#table-24,#table-25,#table-26').dataTable();
    </script>
@endsection
