@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('update-protocol-chapter')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="row wrapper-space-top">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                                            Create a Chapter
                                                        </h3>
                                                    </div>

                                                </div>

                                                <div class="section-content inline-content ">
                                                    <div id="tab-1" class="theme-tab-content current create-protocol">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label>Label</label>
                                                                    <input type="text" class="form-control input__theme  @error('label') is-invalid @enderror"
                                                                           value="{{$protocol_chapter['label']}}" name="label" id="" aria-describedby="helpId" placeholder="Type label">
                                                                    @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label for="question">Question</label>
                                                                    <textarea class="text-editor form-control  @error('question') is-invalid @enderror" name="question" placeholder="Write your question" rows="10">{{$protocol_chapter['question']}}</textarea>
                                                                    @error('question')
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label for="question">Description one</label>
                                                                    <textarea class="text-editor form-control  @error('description_one') is-invalid @enderror" name="description_one" placeholder="Description One" rows="10">{{$protocol_chapter['description_one']}}</textarea>
                                                                    @error('description_one')
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label for="description_two">Description Two</label>
                                                                    <textarea class="text-editor form-control  @error('description_two') is-invalid @enderror" name="description_two" placeholder="Description Two" rows="10">{{$protocol_chapter['description_two']}}</textarea>
                                                                    @error('description_two')
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label>Yes Option Text</label>
                                                                    <input type="text" class="form-control input__theme  @error('yes_option_text') is-invalid @enderror"
                                                                           value="{{$protocol_chapter['yes_option_text']}}" name="yes_option_text" id="" aria-describedby="helpId" placeholder="Type Yes Option Text">
                                                                    @error('yes_option_text')
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label>After Completion of Chapter</label>
                                                                    <select name="no_option" id="" class="form-control">
                                                                        <option value="">Please select chapter</option>
                                                                        @foreach($all_chapters as $chapter)
                                                                                <option value="{{$chapter['chapter_id']}}"
                                                                                @if($chapter['chapter_id']==$protocol_chapter['no_option']) selected @endif
                                                                                >{{$chapter['label']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="form-container">
                                                                    <label>After Skipping a Chapter </label>
                                                                    <select name="skip_option" id="" class="form-control">
                                                                        <option value="">Please select chapter</option>
                                                                        @foreach($all_chapters as $chapter)
                                                                                <option value="{{$chapter['chapter_id']}}"
                                                                                @if($chapter['chapter_id']==$protocol_chapter['skip_option']) selected @endif
                                                                                >{{$chapter['label']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(sizeof($protocol_questions)>0)
                                                            @foreach($protocol_questions as $question)
                                                                <div id="{{$question['question_id']}}">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-lg-12 col-xs-12">
                                                                            <div class="form-container">
                                                                                <label> Questions</label>
                                                                                <input class="form-control address_field " value="{{$question['question']}}" name="question_{{$question['question_id']}}" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-container"><a class="btn btn-danger delete_chapter_question_row existing_record pull-right" data-id="{{$question['question_id']}}">Delete</a></div>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>

                                                    <input name="chapter_id" type="hidden"  value="{{$protocol_chapter['chapter_id']}}" />
                                                    <input type="hidden" name="ids" />
                                                    <div id="append_chapter_questions">

                                                    </div>

                                                    <br/>



                                                    <div class="form-container float-righ pull-right">
                                                        <a href="" class="btn btn__theme  btn__add float-right" id="add_chapter_questions" data-count="0">Add Questions </a>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="form-container float-right">
                                                        <input type="submit" class="btn btn__theme  btn__add" value="Submit">
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

@endsection
