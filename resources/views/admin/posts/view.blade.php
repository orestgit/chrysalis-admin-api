@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('update-post')}}"  method="post" enctype="multipart/form-data">
            @csrf
        <div id="msg_holder"></div>
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">


                <div class="main-left-container">
                    <section>
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="section-header section-title-head section-header-xs">
                                                <div class="section-header__title header-left--sm">
                                                    <h3 class="h3">

                                                    </h3>
                                                </div>
                                                <div class="section-header__controls tab-head-container header-tabs--sm">
                                                    <ul class="theme-tabs">
                                                        <li class="theme-tab-item current" data-tab="tab-1">
                                                            Main Text
                                                        </li>

                                                        <li class="theme-tab-item" data-tab="tab-2">
                                                            Gallery
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content post-reviews-text">
                                                <div id="tab-1" class="theme-tab-content current">
                                                    <div class="section-header">
                                                        <div class="section-header__title">
                                                            <h4 class="h4 mb4 d-block">{{$post['short_description']}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="section-content inline-content post-reviews-text d-block">
                                                        <div class="section-header ">
                                                            <div class="section-header__title d-block"> Description  </div>
                                                        </div>
                                                        <div class="d-block col-sm-12 col-lg-12 col-12">
                                                            {!!$post['description']!!}
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>


                                                </div>


                                                <input type="hidden" name="post_id" value="{{$post['post_id']}}">
                                                <div id="tab-2" class="theme-tab-content">
                                                   {{-- <div class="input-images"></div>--}}
                                                    <div class="ml-3 mr-3">
                                                       <div class="row m" >
                                                       @foreach($post_attachments as $attachment)
                                                           <?php $url="background:url(asset('uploads/posts/$attachment->link'";?>
                                                           <div class="col-sm-4 col-md-4 col-xs-12">
                                                               <img src="{{asset('uploads/posts/'.$attachment->link)}}" class="img-responsive img-fluid view-gallery-item"  />

                                                            </div>
                                                       @endforeach
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
                                            <div class="section-header d-block">
                                                <div class="section-header__title">
                                                    <h4 class="h4">
                                                        Post Details
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="section-content inline-content pb-3">
                                                <div class="form-container">


                                                        <div class="form-group form-input-container">
                                                            <label for="">Post Title</label>
                                                            <input type="text" class="form-control input__theme  @error('title') is-invalid @enderror"
                                                                   value="{{$post['title']}}" name="title" id="" aria-describedby="helpId" placeholder="Type Title">
                                                            <small class="form-text">
                                                                70 characters max
                                                            </small>
                                                            @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container">
                                                            <label for="">Post Type</label>
                                                            <select name="type" id="" class="wide select  @error('type') is-invalid @enderror">
                                                                <option value="">Please Select Post Type</option>
                                                                @foreach($post_types as $type)
                                                                    <option value="{{$type->post_type_id}}" @if ($post['type']==$type->post_type_id) selected @endif>{{$type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group form-input-container avatar-upload">

                                                            <label for="">Post Thumbnails</label>
                                                            <label class="image-picker-label" for="imageUpload">
                                                                <div id="imagePreview"
                                                                     class="image-picker-container  avatar-edit">

                                                                    <div class="placeholder-view ">
                                                                        <input type='file' name="image" id="imageUpload"
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
                                                            <label for="">Post Tags</label>
                                                            <input type="text" value="{{old('tags')}}"
                                                                   class="form-control input__theme @error('tags') is-invalid @enderror" name="tags" id="" value="{{$post['tags']}}" aria-describedby="helpId" placeholder="Add tags by comma">
                                                            @error('tags')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        @if($post['status']==WAITING_APPROVAL)
                                                            <div class="button-group">
                                                                @if( Auth::user()->user_role==1)
                                                                    @php  $post_status = APPROVED @endphp
                                                                        <a  class="btn btn__theme btn__light"  href="{{route('update-post-status',['status'=>ARCHIVED,'post_id'=>$post->post_id])}}">Decline</a>
                                                                @else
                                                                    @php $post_status=WAITING_APPROVAL @endphp
                                                                @endif
                                                               <a  class="btn btn__theme" href="{{route('update-post-status',['status'=>$post_status,'post_id'=>$post->post_id])}}">Preview And Post</a>
                                                            </div>
                                                        @endif

                                                        @if($post['status']==DRAFT &&  $post->author_id== Auth::user()->id)
                                                            @php $post_status=AUTH::user()->user_role==1 ? APPROVED : WAITING_APPROVAL @endphp
                                                            <a  class="btn btn__theme" href="{{route('update-post-status',['status'=>$post_status,'post_id'=>$post->post_id])}}">Preview And Post</a>
                                                        @endif
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
        </form>
        <!-- end -->
    </div>
<script>
    $(".remove-image").click(function(event){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax(
    {
        url: "delete-post-attachment/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (response){
            if(response.success==1){
                $('div#'+id).remove();
                $('#msg_holder').html('<div class="alert alert-danger" role="alert">Attachment has been removed</div>').fadeOut(4000);
            }

        }
    });

});
    $('.text-editor').richText();
</script>
@endsection
