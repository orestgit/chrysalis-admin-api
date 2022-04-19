<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=e">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="import" href="component.html" />
    <title>Chrysalis Admin Login</title>
    <!-- font family -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- normalize -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
    <link href="{{asset('assets/css/calendar.css')}}" rel='stlesheet' />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="{{asset('assets/ss/basic.css')}}">
     <!-- css -->
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <!-- jquery -->
    <script src="{{asset('assets/css/assets/js/jquery.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- plugins -->
    <script src="{{asset('assets/js/jquery.richtext.js')}}"></script>
    <script src="{{asset('assets/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/js/single-img-picker.js')}}"></script>
    <!-- apex charts -->
    <script src="{{asset('assets/js/apex-charts.js')}}"></script>
    <script src="{{asset('assets/js/apex-custom.js')}}"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src='{{asset('assets/js/calendar.js')}}></script>
    <script src='{{asset('assets/js/custom-calendar.js')}}></script>
    <script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- plugins end -->
    <!-- js -->
</head>

<body>
        <div class="section-content inline-content pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-3 col-xs-12">
                        <div class="form-container">

                            <h2 class="h2 text-center">  Admin Login   </h2>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-4">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session()->get('success')}}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group form-input-container">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control input__theme @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-input-container">
                                    <label for="password">Password </label>
                                    <input id="password" type="password" class="form-control input__theme @error('password') is-invalid @enderror" id="" aria-describedby="helpId" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="button-group">
                                    <input type="submit"  class="btn btn__theme light-shadow" value="Login">
                                </div>
                                <a href="{{route('forgot-password')}}" class="pull-right  small">Forgot Password ?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</body>
</html>
