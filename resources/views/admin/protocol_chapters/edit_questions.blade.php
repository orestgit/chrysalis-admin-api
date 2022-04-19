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
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 header-column--xs">
                    <div class="header-left header-left-back header-left--sm ">

                        <a href="{{route('list-protocol-chapters')}}" class="btn btn__theme  btn__with-icon btn-theme--">
                            Go Back to Protocols
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
                                                        <!-- <li>
                                                            <select class="select" id="question_type">
                                                                <option value="1">Boolean</option>
                                                                <option value="2">Multiple Answers</option>
                                                                <option value="3">Single Answer</option>
                                                                <option value="4">Single Answer with images</option>
                                                            </select>
                                                        </li> -->
                                                        <li>
                                                            <a id="add_protocol_question" class="btn btn__theme  btn__add float-left" data-count="{{$counter}}" data-counter="{{$counter}}">
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
                                                            <form method="post" action="{{route('set-protocol-questions')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="protocol_id" value="{{ Request::get('protocol_id') }}">
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
                                                                                                            <h4 class="h4">  Question   Details </h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div  class="input-fields-container">
                                                                                                        <div class="form-group form-input-container">
                                                                                                            <textarea class="form-control validate_input input__theme textarea__theme"  name="question_{{$question['question_id']}}" id="" rows="3" placeholder="Question">{{$question['question']}}</textarea>
                                                                                                        </div>
                                                                                                        <div  class="form-group form-input-container">
                                                                                                            <textarea class="form-control validate_input input__theme textarea__theme"  name="hint_{{$question['question_id']}}" id="" rows="3" placeholder="Hint">{{$question['hint']}}</textarea>
                                                                                                        </div>
                                                                                                        <input type="hidden" name="question_type_{{$question['question_id']}}" value="{{$question['type']}}" >
                                                                                                    </div>
                                                                                                    <div class="checkbox-select-option answer-single-images">
                                                                                                                                <div class="choose-answer choose-answer-images edit-thumb">
                                                                                                                                    <label for="radio{{$key}}_thubmnail" class="mb-0">
                                                                                                                                        <div class="avatar-upload">
                                                                                                                                            <div class="qr-code-view ">
                                                                                                                                                <input type="file" id="radio{{$key}}_thubmnail" name="thumbnail_{{$question['question_id']}}" data-old="yes" class="multiimageUpload" accept=".png, .jpg, .jpeg">
                                                                                                                                            </div>
                                                                                                                                            <label for="radio{{$key}}_thubmnail" class="image-picker-label mb-0">
                                                                                                                                                <?php $image=asset('uploads/protocols/'.$question['video_thumbnail']);?>
                                                                                                                                                <div class="avatar-edit avatar-checkbox-image imagePreview "></div>
                                                                                                                                                <div class="existing-thumb" style="background: url(<?=$image?>)"></div>
                                                                                                                                            </label>
                                                                                                                                        </div>
                                                                                                                                    </label>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="checkbox-select-option answer-single-images">
                                                                                                                                <div class="choose-answer choose-answer-images edit-thumb">
                                                                                                                                    <label for="radio{{$key}}_thubmnail" class="mb-0">
                                                                                                                                        <div class="avatar-upload">
                                                                                                                                            <div class="qr-code-view ">
                                                                                                                                                <input type="file" id="radio{{$key}}_thubmnail"  data-old="yes"  name="thumbnail_{{$question['question_id']}}" class="multiimageUpload" accept=".png, .jpg, .jpeg">
                                                                                                                                            </div>
                                                                                                                                            <label for="radio{{$key}}_thubmnail" class="image-picker-label mb-0">
                                                                                                                                                <?php $video=asset('uploads/protocols/'.$question['video']);?>
                                                                                                                                                <div class="avatar-edit avatar-checkbox-image imagePreview "></div>
                                                                                                                                                <video src="{{$video}}" controls width="100" height="100" style='margin-left:50px;'>
                                                                                                                                            </label>
                                                                                                                                        </div>
                                                                                                                                    </label>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                </div>
                                                                                                <div  class="col-12 col-lg-6">
                                                                                                    <div class="section-header section-title-head section-lessons-md px-0">
                                                                                                        <h4 class="h4">  Question   Options </h4>
                                                                                                    </div>
                                                                                                    <?php $loop_count=0;?>
                                                                                                    <?php $correct_option='';
                                                                                                          $multiple_correct = array();
                                                                                                    ?>
                                                                                                    <?php $correct_option=0; ?>
                                                                                                    @foreach($question['options'] as $option)
                                                                                                        <?php $loop_count=$loop_count+1;?>

                                                                                                            @if($question['type']==2)
                                                                                                                    @if($option['is_correct']==1) <?php array_push($multiple_correct,$loop_count) ; ?>{{-- @else <?php array_push($multiple_correct,2) ; ?>--}} @endif
                                                                                                            @else
                                                                                                                @if($option['is_correct']==1) <?php $correct_option=$loop_count; ?>@endif
                                                                                                            @endif

                                                                                                            @if($question['type']==1)
{{--
                                                                                                                @if($option['is_correct']==1) <?php $correct_option=$loop_count; ?>@endif
--}}
                                                                                                                        <div  class="checkbox-select-option answer-single">
                                                                                                                            <div    class="choose-answer">
                                                                                                                                <input   type="radio"  value="{{$loop_count}}"  id="radio{{$loop_count}}_{{$option['option_id']}}" name="radio_{{$option['question_id']}}" class="correct_answer"  data-option="{{$loop_count}}" data-count="{{$question['question_id']}}" name="choose_answer_{{$option['option_id']}}"
                                                                                                                                         @if($option['is_correct']==1) checked @endif>
                                                                                                                                <label for="radio{{$loop_count}}_{{$option['option_id']}}">{{$option['option']}}</label>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                @endif
                                                                                                    @endforeach
                                                                                                <div  class="form-group form-input-container">
                                                                                                <textarea class="form-control validate_input input__theme textarea__theme"  name="explanation_{{$question['question_id']}}" id="" rows="3" placeholder="Explanation">{{$question['explanation']}}</textarea>
                                                                                                                <?php     if ($multiple_correct!=0){$multi_correct = implode(',',$multiple_correct);};  ?>
                                                                                                    <input type="hidden"  name="answer_{{$question['question_id']}}"  @if($question['type']==2) value="{{$multi_correct}}" @else  value="{{$correct_option}}" @endif >
                                                                                                </div>

                                                                                                  <div  class="form-group form-input-container">
                                                                                                        <input type="text" class="form-control validate_input " value="{{$question['button_text']}}"  name="button_text_{{$question['question_id']}}" id="" rows="3" placeholder="Button Text">
                                                                                                        </div>
                                                                                                         <div  class="form-group form-input-container">
                                                                                                           <input type="text" class="form-control validate_input "  value="{{$question['button_link']}}"   name="button_link_{{$question['question_id']}}" id="" rows="3" placeholder="Button Link">
                                                                                                        </div>
                                                                                                <div class="row">
                                                                                                    <div  class="col-12 col-lg-12">
                                                                                                        <div class="form-group form-input-container">
                                                                                                            <a  data-id="{{$question['question_id']}}" class="btn btn__theme  btn-edit-remove delete_question" data-delete="yes" data-to="{{route('delete-protocol-question')}}">Delete</a></div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>


                                                                        </div>

                                                                        </div>
                                                                    @endforeach


                                                                <div id="question_content"></div>
                                                                <input type="hidden" name="ids">
                                                                <input type="submit" value="Submit" class="theme btn__theme float-right" id="submit_questions">
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

</script>

    @endsection

