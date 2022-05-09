@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session()->get('success')}}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session()->get('error')}}
            </div>
        @endif
        <div id="msg_holder"></div>
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 header-column--xs">
                    <div class="header-left header-left-back header-left--sm ">

                        <a href="{{route('list-protocol-chapters')}}" class="btn btn__theme  btn__with-icon btn-theme--">
                            Go Back
                        </a>
                    </div>
                </div>
                <div class="main-left-container">
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-12 card">
                                    <div class="section-header section-lessons-md">
                                        <div class="alert alert-danger fade in alert-dismissible show w-100 d-none" id="error_blok">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="font-size:20px">×</span>
                                            </button>    <strong>Error!</strong> Please fill all the highlighted fields
                                        </div>
                                    </div>
                                    <input type="hidden" name="ids" value="">
                                    <div id="msg-holder"></div>
                                    <div class="card-container section-card-container p-0">
                                        <div class="section-header ">
                                            <div class="header-left">
                                                <div class="tab-head-container">
                                                    <ul class="theme-tabs px-0" >
                                                        <?php $counter=0;?>
                                                        @foreach($questions as $question)
                                                            <?php $counter=$counter+1;?>
                                                            <li class="theme-tab-item @if($counter==1)current @endif class_{{$question['question_id']}}" data-tab="tab-{{$question['question_id']}}">{{$counter}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tabs-select-bar section-header tabs-bar__md">

                                                <div class="section-header__controls">
                                                    <ul>

                                                        <li>
                                                            <a id="add_surgical_question" class="btn btn__theme  btn__add float-left" data-count="{{$counter}}" data-counter="{{$counter}}">
                                                                  Create New Question
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="section-content inline-content">
                                            <section>
                                                <div class="form-container">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <form method="post" action="{{route('set-surgical-questions')}}" enctype="multipart/form-data" id="surgical-edit-form">
                                                                @csrf
                                                                <input type="hidden" name="chapter_id" value="{{ Request::get('id') }}">
                                                                    <?php $inner_count=0;?>
                                                                    @foreach($questions as $key=>$question)
                                                                    <?php $inner_count=$inner_count+1;?>
                                                                        <div id="tab-{{$question['question_id']}}"  class="theme-tab-content class_{{$question['question_id']}}
                                                                               @if($inner_count==1)current @endif " >
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div  class="col-12 col-lg-6">
                                                                                                    <div  class="section-header section-title-head section-lessons-md px-0">
                                                                                                        <div class="section-header__title">
                                                                                                            <h4 class="h4">  Question    </h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div  class="input-fields-container">
                                                                                                        <div class="form-group form-input-container">
                                                                                                            <textarea class="form-control validate_input input__theme textarea__theme"  name="question_{{$question['question_id']}}" id="" rows="3" placeholder="Question">{{$question['question']}}</textarea>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                                <div  class="col-12 col-lg-6">
                                                                                                    <div class="section-header section-title-head section-lessons-md px-0">
                                                                                                        <h4 class="h4">  Question   Hint </h4>
                                                                                                    </div>
                                                                                                    <div  class="input-fields-container">
                                                                                                        <div  class="form-group form-input-container">
                                                                                                            <textarea class="form-control validate_input input__theme textarea__theme"  name="hint_{{$question['question_id']}}" id="" rows="3" placeholder="Hint">{{$question['hint']}}</textarea>
                                                                                                        </div>
                                                                                                        <input type="hidden" name="question_type_{{$question['question_id']}}" value="{{$question['type']}}" >
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                                <?php $loop_count=0;?>
                                                                                                <?php $correct_option='';
                                                                                                $multiple_correct = array();
                                                                                                ?>
                                                                                                <?php $correct_option=0; ?>
                                                                                                @foreach($question['options'] as $option)
                                                                                                <div class="row" data-del-id="{{$option->option_id}}">
                                                                                                        <div  class="col-12 col-lg-3">
                                                                                                            <div  class="section-header section-title-head section-lessons-md px-0">
                                                                                                                <div class="section-header__title">
                                                                                                                    <h4 class="h4">  Hint    </h4>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div  class="input-fields-container">
                                                                                                                <div class="form-group form-input-container">
                                                                                                                    <textarea class="form-control validate_input input__theme textarea__theme"  name="option_hint_{{$option->option_id}}" id="" rows="3" placeholder="Question">{{$option['hint']}}</textarea>
                                                                                                                </div>

                                                                                                            </div>

                                                                                                        </div>

                                                                                                        <div  class="col-12 col-lg-3">
                                                                                                            <div  class="section-header section-title-head section-lessons-md px-0">
                                                                                                                <div class="section-header__title">
                                                                                                                    <h4 class="h4">  Text    </h4>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div  class="input-fields-container">
                                                                                                                <div class="form-group form-input-container">
                                                                                                                    <textarea class="form-control validate_input input__theme textarea__theme"  name="option_text_{{$option->option_id}}" id="" rows="3" placeholder="Text">{{$option['text']}}</textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div  class="col-12 col-lg-3">
                                                                                                            <div  class="section-header section-title-head section-lessons-md px-0">
                                                                                                                <div class="section-header__title">
                                                                                                                    <h4 class="h4">  Heading    </h4>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div  class="input-fields-container">
                                                                                                                <div class="form-group form-input-container">
                                                                                                                    <textarea class="form-control validate_input input__theme textarea__theme"  name="option_heading_{{$option->option_id}}" id="" rows="3" placeholder="Heading">{{$option['heading']}}</textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                         <div  class="col-12 col-lg-1">
                                                                                                            <div  class="section-header section-title-head section-lessons-md px-0">
                                                                                                                <div class="section-header__title">
                                                                                                                    <h4 class="h4">  Hint Color </h4>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div  class="input-fields-container">
                                                                                                                <div class="form-group form-input-container">
                                                                                                                    <input type="color" name="option_hint_color_{{$option->option_id}}" class="form-control" value="{{$option->hint_color}}">
                                                                                                                </div>

                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div  class="col-12 col-lg-2">
                                                                                                            <div  class="section-header section-title-head section-lessons-md px-0">
                                                                                                                <div class="section-header__title">
                                                                                                                    <h4 class="h4">  Images </h4>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <input type="file" name="option_images_{{$option->option_id}}[]" class="form-control"  multiple>

                                                                                                        </div>

                                                                                                </div>
                                                                                                <div class="row" data-del-id="{{$option->option_id}}">
                                                                                                    <div class="col-12">
                                                                                                        <a href="" class="btn btn-danger pull-right delete_surgical_question_option"  data-id="{{$option->option_id}}">Delete</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                        @if(sizeof($option->images)>0)
                                                                                                            <div class="row" data-del-id="{{$option->option_id}}">
                                                                                                                @foreach($option->images as $image)
                                                                                                                    <div  class="col-12 col-lg-2 image-area">
                                                                                                                        <div  class="input-fields-container">
                                                                                                                            @php $link=$image->link; @endphp
                                                                                                                            <div class="form-group form-input-container" id="{{$image->attachment_id}}">
                                                                                                                                <img src="{{asset('assets/images/icons/remove.png')}}" class="remove-image"   data-id="{{$image->attachment_id}}" />
                                                                                                                                <img src="{{asset("uploads/surgical/$link")}}" alt="" width="100" height="100">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                                    <hr/>
                                                                                                            </div>

                                                                                                        @endif
                                                                                                <div id="append_options_{{$question->question_id}}"></div>

                                                                                                {{--<div id="options_count_{{$question->question_id}}"></div>--}}
                                                                                                <div class="col-12 col-lg-4">
                                                                                                    <div class="input-fields-container">
                                                                                                        <input type="hidden" name="existing_options_count" id="options_count{{$question->question_id}}">
                                                                                                        <div class="form-group form-input-container">
                                                                                                            <select class="form-control" id="option_select_{{$question->question_id}}">
                                                                                                                <option value="1">Option With images</option><option value="2">Option Without images</option></select></div></div></div>

                                                                                                <div class="col-12 col-lg-3"><a data-id="{{$question->question_id}}" class="btn btn__theme    btn-edit-remove add_existing_option" data-count="0" id="options_count_{{$question->question_id}}">Add Question Option</a></div>
                                                                                                <input type="hidden" name="existing_options_count_{{$question->question_id}}" value="" id="existing_options_count_{{$question->question_id}}">

                                                                                                @endforeach


                                                                                                        <br/>
                                                                                                        <br/>
                                                                                                <div class="row">
                                                                                                    <div  class="col-12 col-lg-12">
                                                                                                        <div class="form-group form-input-container">
                                                                                                            <a  data-id="{{$question['question_id']}}" class="btn btn__theme   btn-edit-remove delete_question pull-right" data-delete="yes" data-to="{{route('delete-surgical-question')}}">Delete Question</a>
                                                                                                            <br/>
                                                                                                            <br/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>



                                                                        </div>

                                                                        </div>
                                                                    @endforeach


                                                                <div id="question_content">
                                                                    <input type="hidden" name="option_count" value="0">
                                                                </div>
                                                                <input type="hidden" name="ids">
                                                                <input type="submit" value="Submit" class="theme btn__theme float-right"  >
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                        </div>
                                    </div





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

        $('body').on('click', '.text-editor', function() {

            setTimeout(function() {
                $(this).richText();
                $('.text-editor').richText();
    }, 2000);

        })
        $('.delete_surgical_question_option').on('click',function (e) {
            e.preventDefault();
            var id=$(this).data('id');
            var div =$("div").find(`[data-del-id='${id}']`)
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
                {
                    url: "surgical-protocol-question-option/",
                    type: 'POST',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response){
                        console.log(response);
                        if(response.success==1){
                            div.remove();
                            $('#msg_holder').html('<div class="alert alert-danger" role="alert">Question option has been removed</div>').fadeOut(4000);
                        }

                    }
                });
            //
        })
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

</script>
    <style>
        #surgical-edit-form .col-lg-3{
            max-width: 22% !important;
        }
    </style>
    @endsection

