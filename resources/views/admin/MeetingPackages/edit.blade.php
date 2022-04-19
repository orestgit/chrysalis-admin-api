@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
    @include('admin_layouts.header')
    <!-- bottom main -->
        <form action="{{route('update-meeting-package')}}"  method="post">
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
                                                        Edit  Package
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="form-container">
                                                        <label>Token</label>
                                                        <input type="text" class="form-control input__theme  @error('token') is-invalid @enderror"
                                                               value="{{$package['token']}}" name="token" id="" aria-describedby="helpId" placeholder="Type number of  Tokens">
                                                        @error('token')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$package['meeting_packages_id']}}">
                                                    <div class="form-container">
                                                        <label>Price</label>
                                                          <input type="text" class="text-editor form-control  @error('price') is-invalid @enderror" value="{{$package['price']}}" name="price" placeholder="Write your price text here" rows="10">
                                                        @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-container">
                                                        <label>Duration</label>
                                                          <input type="text" class="text-editor form-control  @error('duration') is-invalid @enderror" value="{{$package['duration']}}" name="duration" placeholder="Write your price text here" rows="10">
                                                        @error('duration')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            

                                                <br/>


                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </section>
                    <div class="form-container float-right   ">
                        <input type="submit" class="btn btn__theme  btn__add" value="Submit">
                    </div>

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
@endsection

