@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->

        <div class="row wrapper-space-top">

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="col-12 col-xs-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session()->get('success')}}
                        </div>
                    @endif
                </div>
                <section>
                    <div class="inline-left-section">
                        <div class="inline-sidebar p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-12 px-0">

                                        <div class="section-header section-left-tab">
                                            <div class="section-header__title">
                                                <h3 class="h3">
                                                    App Pages
                                                </h3>
                                            </div>
                                            <div class="section-header__controls tab-head-container">
                                               {{-- <div class="button-group">
                                                    <a href="#" class="btn btn__theme">New Page</a>
                                                </div>--}}
                                            </div>
                                        </div>
                                        <section>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 px-0">
                                                        <div class="accordion-sidebar-expand">
                                                            <ul id="accordion1" class="accordion1 px-0">
                                                                @foreach($pages as $page)
                                                                    <li class="sidebar-menu sidebar-menu-md">
                                                                        <div  class="link text-16 text-light-pink">
                                                                            {{$page['title']}}
                                                                            <a href="{{route('edit-static-page',['page_id'=>$page['page_id']])}}" class="float-right page-edit">Edit</a>
                                                                            <a href="{{route('delete-static-page',['page_id'=>$page['page_id']])}}" class="float-right page-edit">Delete</a>

                                                                        </div>
                                                                        @if(!empty($page->sub_pages))
                                                                            <ul class="submenu px-0">
                                                                                @foreach($page->sub_pages as $subpage)
                                                                                    <li class="sub-menu-list">
                                                                                        <a href="manage-general.html"
                                                                                        >{{$subpage->title}}</a>
                                                                                        <a href="{{route('edit-static-page',['page_id'=>$subpage['page_id']])}}" class="float-right page-edit">Edit</a>
                                                                                        <a href="{{route('delete-static-page',['page_id'=>$subpage['page_id']])}}" class="float-right page-edit">Delete</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
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

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">

                                            <div class="section-header section-title-head section-lessons-md">
                                                <div class="section-header__title">
                                                    <h3 class="h3">
                                                        {{$current_page['title']}}
                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container">

                                                </div>
                                            </div>

                                            <section>
                                                <div class="section-content inline-content">
                                                    <div id="tab-1" class="theme-tab-content current">
                                                        <form method="post" action="{{route('update-static-page')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="page_id" value="{{$current_page['page_id']}}"></input>
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-12 col-xl-8 col-lg-12">
                                                                        <div class="text-editor-continer px-0">
                                                                            <textarea class="text-editor form-control @error('content') is-invalid @enderror" name="content" placeholder="Write your post text here">{{$current_page['content']}}</textarea>

                                                                            @error('content')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-xl-4 col-lg-12">
                                                                        <section>
                                                                            <div class="form-container p-0">

                                                                                    <div class="form-group form-input-container">
                                                                                        <label for="">Page
                                                                                            Title</label>
                                                                                        <input type="text" value="{{$current_page['title']}}" class="form-control input__theme  @error('title') is-invalid @enderror" name="title" value="" id="" aria-describedby="helpId" placeholder="Type Title">
                                                                                        @error('title')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                        @enderror
                                                                                        <small class="form-text">
                                                                                            25
                                                                                            characters
                                                                                            max
                                                                                        </small>
                                                                                    </div>
                                                                                    <div class="form-group form-input-container">

                                                                                        <label for="">Choose Parent Page</label>
                                                                                        <select name="parent" id="" class="wide select">
                                                                                             <option value="0">None</option>

                                                                                                @foreach($pages as $page)
                                                                                                    @if(request()->get('page_id')!=$page['page_id'])
                                                                                                    <option value="{{$page['page_id']}}"
                                                                                                            @if($current_page['parent']==$page['page_id']) current  selected @endif
                                                                                                    >{{$page['title']}}</option>
                                                                                                @endif
                                                                                                @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group form-input-container avatar-upload">

                                                                                        <label for="">Page Icon</label>
                                                                                        <label class="image-picker-label" for="imageUpload">
                                                                                            <div id="imagePreview"
                                                                                                 class="image-picker-container  avatar-edit">

                                                                                                <div
                                                                                                    class="placeholder-view ">
                                                                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"  name="icon"/>
                                                                                                    <!-- <span>
                                                                                                                        <img src="../../assets/images/icons/file-upload.svg" >
                                                                                                                    </span> -->
                                                                                                    <span
                                                                                                        class="browse-btn">
                                                                                                            Browse
                                                                                                        </span>
                                                                                                </div>

                                                                                            </div>
                                                                                        </label>
                                                                                        <small class="form-text">
                                                                                            *.svg, black filled icon
                                                                                        </small>
                                                                                        <?php $image =$current_page['icon'];?>
                                                                                        <img src="{{asset("uploads/pages/$image/")}}" class="img-thumb-w100" />
                                                                                    </div>
                                                                                    <div class="button-group">
                                                                                        <input type="submit" value="Save Changes"  class="btn btn__theme btn-block">
                                                                                    </div>

                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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
    <!-- bottom main -->

        <!-- end -->
    </div>
    <script>
        $(document).ready(function() {
            $('.text-editor').richText();
        });
    </script>
@endsection
