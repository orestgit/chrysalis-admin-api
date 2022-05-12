@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
        @include('admin_layouts.header')
        <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="main-left-container">
                    <section>
                        @include('messages') 
                        <div class="card">
                            <div class="card-container p-0">
                                <div class="container-fluid">                                  
                                    <div class="row">
                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="section-header section-title-head section-header-xs pb-0">
                                                <div class="section-header__title header-left--sm mb-0 pb-0">
                                                    <h1>
                                                        {{ $algorithm['title'] }}
                                                    </h1>                                                    
                                                </div>                                      
                                            </div>
                                            <div class="small col-12 mb-4">This area is dedicated to edit algorithm screens.</div>                                             
                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="form-container ">
                                                        <div class="row pl-4 pr-4 pb-4">
                                                            @if ($screen)
                                                                <div class="border rounded bg-white p-4 mr-5" style="height: 642px; width: 315px">                                                                    
                                                                    @include('admin.screens.edit.'.$screen->screen_type, ['s' => $screen, 'buttons' => $buttons])
                                                                </div>
                                                            @else
                                                            <div class="col-12">
                                                                <h3 class="h3">Add new screen:</h3>
                                               
                                                                <form action="{{ route('update-screen') }}"  method="post">
                                                                    @csrf

                                                                    <div class="form-container">
                                                                        <label>Screen Type:</label>                                                                   
                                                                        <select class="form-control input__theme @error('token') is-invalid @enderror" name="screen_type" id="" aria-describedby="helpId" placeholder="Type Screen Type to be used">
                                                                               <option value=""> Select Screen Type </option>
                                                                               <option value="1"> 1 </option>
                                                                        </select>
                                                                        @error('screen_type')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror  
                                                                    </div>

                                                                    <div class="form-container float-right">
                                                                        <input type="submit" class="btn btn__theme  btn__add" value="Submit">
                                                                    </div>
                                                                </form>

                                                                </div>
                                                            @endif
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
        </div>
        <!-- end -->
    </div>
@endsection
