@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('assign-meeting')}}"  method="post">
            @csrf
        <div id="msg_holder"></div>
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
                                                        Meeting Details
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="container-fluid">
                                                        <div class="row">       
                                                                <div class="form-container col-lg-6">
                                                                    <label>Subject</label>
                                                                    <input type="text" class="form-control input__theme  @error('subject') is-invalid @enderror"
                                                                        value="{{$meeting['subject']}}" name="subject" id="" aria-describedby="helpId" placeholder="Subject of  Meeting">
                                                                    @error('subject')
                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <input type="hidden" name="id" value="{{$meeting['meeting_id']}}">
                                                                <div class="form-container col-lg-6">
                                                                    <label>Date</label>
                                                                    <input type="text" class="text-editor form-control  @error('date') is-invalid @enderror" value="{{$meeting['date']}}" name="date" placeholder="Write your date of Meeting" >
                                                                    @error('date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                        </div>
                                                
                                            <div class="row">       
                                                    <div class="form-container col-lg-6">
                                                        <label>Status</label>
                                                        @if($meeting['status']==0)
                                                        <input type="text" class="form-control input__theme  @error('status') is-invalid @enderror"
                                                               value="Pending" name="status" id="" aria-describedby="helpId" placeholder="status of  Meeting">
                                                                                            @elseif($meeting['status']==1)
                                                                                            <input type="text" class="form-control input__theme  @error('status') is-invalid @enderror"
                                                               value="Scheduled" name="status" id="" aria-describedby="helpId" placeholder="status of  Meeting">
                                                                                            @else
                                                                                            <input type="text" class="form-control input__theme  @error('status') is-invalid @enderror"
                                                               value="Completed" name="status" id="" aria-describedby="helpId" placeholder="status of  Meeting">
                                                                                            @endif
                                                        
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container col-lg-6">
                                                        <label>Duration in Minutes</label>
                                                          <input type="text" class=" form-control  @error('duration') is-invalid @enderror" value="{{$meeting['meeting_duration']}}" name="duration" placeholder="duration of Meeting" id="duration" >
                                                        @error('duration')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                            </div>

                                            <div class="row">       
                                                    <div class="form-container col-lg-6">
                                                        <label>Start Time</label>
                                                        @if($meeting['end_time']==null)
                                                        <select  class="wide select" name="start_time" id="start_time">
                                                        <option disabled selected value >Select Meeting Start Time</option>
                                                            
                                                        @foreach($meeting['time_slots'] as $time)
                                                        <option value="{{$time['start_time']}}" id="start_time.<?php ?>">{{$time['start_time']}}</option>
                                                        @endforeach
                                                        </select>
                                                        @else
                                                        <input type="text" class="form-control  @error('start_time') is-invalid @enderror" value="{{$meeting['start_time']}}" name="start_time" placeholder="Write end time of Meeting" id="start_time" >

                                                        @endif
                                                        @error('start_time')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container col-lg-6">
                                                        <label>End Time</label>
                                                        <input type="text" class="form-control  @error('end_time') is-invalid @enderror" value="{{$meeting['end_time']}}" name="end_time" placeholder="Write end time of Meeting" id="end_time" >
                                                        @error('end_time')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                            </div>
                                                   
                                            <div class="row">       
                                                    <div class="form-container col-lg-6">
                                                        <label>Meeting Link</label>
                                                        <input type="text" class="form-control input__theme  @error('meeting_link') is-invalid @enderror"
                                                               value="{{$meeting['meeting_link']}}" name="meeting_link" id="" aria-describedby="helpId" placeholder="link of  Meeting">
                                                        @error('meeting_link')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container col-lg-6">
                                                        <label>Meeting Id</label>
                                                          <input type="text" class="form-control  @error('meetingid') is-invalid @enderror" value="{{$meeting['zoom_meeting_id']}}" name="meetingid" placeholder="Id of Meeting" >
                                                        @error('meetingid')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="row">       
                                                    <div class="form-container col-lg-6">
                                                        <label>Meeting Password</label>
                                                        <input type="text" class="form-control input__theme  @error('meeting_password') is-invalid @enderror"
                                                               value="{{$meeting['meeting_password']}}" name="meeting_password" id="" aria-describedby="helpId" placeholder="password of  Meeting">
                                                        @error('subject')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container col-lg-6">
                                                        <label>Host</label>
                                                        <select class="wide select" name="host"> 
                                                        <option disabled selected value >Select Meeting Host</option>
                                                        @foreach($meeting['hosts'] as $host)
                                                        <option  value="{{$host['id']}} " {{$meeting['host'] == $host['id']  ? 'selected' : '' }} >{{$host['first_name']}} {{$host['last_name']}}</option>

                                                        @endforeach
                                                        </select>
                                                        @error('host')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                            </div>
</div>

                                            
                                                    </div>
                                                <br/>


                                            </div>
                                            <div class="form-container">
                        <input type="submit" class="btn btn__theme" value="Submit">
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
                    url: "delete-protocol-attachment/"+id,
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
    <script>
        $('#start_time').on('change',function(){
            var time = new Date(this.value);
            var duration=$('#duration').val();
            //  alert(typeof(duration));
            time.setMinutes(time.getMinutes() + parseInt(duration));
             time=time.getFullYear() +"-"+ time.getMonth() + "-" +time.getDate() +" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds();
            $('#end_time').val(time);
            var selected_option=$(this).childern("option:selected").val();
        });
    </script>
@endsection

