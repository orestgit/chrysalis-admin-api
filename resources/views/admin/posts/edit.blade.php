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
                                                        Create a post
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

                                            <div class="section-content inline-content">
                                                <div id="tab-1" class="theme-tab-content current">
                                                    <div class="form-group form-input-container col-md-12">
                                                        <label for="">Post Sub Description</label>
                                                        <input type="text" class="form-control input__theme  @error('short_description') is-invalid @enderror"
                                                               value="{{$post['short_description']}}" name="short_description" id="" aria-describedby="helpId" placeholder="Post Sub Description">
                                                        <br>
                                                    </div>

                                                    <div class="text-editor-continer">
                                                        <label for="">Post Description</label>
                                                        <textarea class="text-editor form-control" name="description" placeholder="Write your post text here">{{$post['description']}}</textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="post_id" value="{{$post['post_id']}}">
                                                <div id="tab-2" class="theme-tab-content">
                                                    <div class="input-images"></div>
                                                   <div class="ml-3">
                                                       <div class="row" >
                                                       @foreach($post_attachments as $attachment)
                                                           <?php $url="background:url(asset('uploads/posts/$attachment->link'";?>
                                                           <div class="image-area col-2"  id="{{$attachment->attachment_id}}" >
                                                              <img src="{{asset('assets/images/icons/remove.png')}}" class="remove-image"   data-id="{{$attachment->attachment_id}}" />
                                                              <img src="{{asset('uploads/posts/'.$attachment->link)}}" class="img-responsive" />

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
                                            <div class="section-header ">
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

                                                        <div class="button-group">

                                                            <input type="submit" class="btn btn__theme"  value="Update Post" >

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