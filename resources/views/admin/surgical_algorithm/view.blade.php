@extends('../admin_layouts.master')
@section('content')
    <div class="container-fluid main-container">
        @include('admin_layouts.header')
        <!-- bottom main -->
        <div class="row wrapper-space-top">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="main-left-container">
                    <section>
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
                                            <div class="small col-12 mb-4">This area is to demonstrates mobile application workflow of specific algorithm.</div>                                             
                                            <div class="section-content inline-content ">
                                                <div id="tab-1" class="theme-tab-content current create-protocol">
                                                    <div class="form-container ">
                                                        <div class="row pl-4 pr-4 pb-4">
                                                            @if ($screen)
                                                            @foreach ($screen as $s)
                                                                <div class="border rounded bg-light col-lg-2 mr-5" style="height: 560px">
                                                                    <table class="text-center w-100">
                                                                    @if ($s->screen_type == 1)
                                                                        <tr><td valign="middle" style="height: 140px">
                                                                            @if ($s->show_logo)
                                                                                <img src="../../public/assets/images/logo.png"
                                                                                    class="img-fluid" alt="" srcset="">
                                                                            @endif
                                                                        </td></tr>
                                                                        <tr><td valign="middle" style="height: 140px; color: #{{ $s->top_text_color }}">
                                                                          
                                                                            @if ($s->top_text)
                                                                                {{ $s->top_text }}
                                                                            @endif
                                                                        </td></tr>
                                                                        <tr><td valign="middle" style="color: #{{ $s->middle_text_color }}; height: 140px">
                                                                            @if ($s->middle_text)
                                                                                {{ $s->middle_text }}
                                                                            @endif
                                                                        </td></tr>
                                                                    @endif
                                                                    <tr><td valign="middle" style="height: 140px">
                                                                        <p>&nbsp;</p>
                                                                        @foreach ($buttons as $b)
                                                                            @if ($b->step == $s->step)
                                                                                <a class="btn w-100"
                                                                                    href="{{ route('manage-surgical-screens', ['id' => $s->algorithm_id, 'action' => 'view', 'step' => $step + 1, 'option' => $b->button_option ]) }}" 
                                                                                    style="background-color:#{{ $b->bgcolor }}; color:#{{ $b->txtcolor }}">{{ $b->text }}</a><br /><br />
                                                                            @endif
                                                                        @endforeach
                                                                    </td></tr>                                                                        
                                                                    </table>
                                                                </div>
                                                            @endforeach
                                                            @else
                                                            <div class="alert alert-danger col-12">No screen available</div>
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
