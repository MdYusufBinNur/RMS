<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('Admin/paper_dashboard/assets/img/apple-icon.png') }}">

    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('View/img/logo.png') }}">
    {{--    http://127.0.0.1:8000/View/img/logo.png--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>RMS ADMIN</title>

    <!-- Canonical SEO -->

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/paper-dashboard.css') }}" rel="stylesheet">


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link  href="{{ asset('Admin/paper_dashboard/assets/css/demo.css') }}" rel="stylesheet">

    <link href="{{ asset('Admin/paper_dashboard/assets/css/themify-icons.css') }}" rel="stylesheet">
    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">

<body>

<!-- End Google Tag Manager (noscript) -->
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse">

        </div>
    </div>
</nav>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="" data-image="" style="background-image: url({{ asset('View/img/home-about.png') }})">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header text-center">
                                    <h3 class="card-title">Login</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        {{--<input type="email" placeholder="Enter email" class="form-control input-no-border">--}}
                                        <input id="email" type="email" class="form-control  input-no-border @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        {{--<input type="password" placeholder="Password" class="form-control input-no-border">--}}
                                        <input id="password" type="password" class="form-control input-no-border @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red;">{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Let's go</button>
                                    <div class="forgot">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            {{--<div class="container">
                <div class="copyright">
                    © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="https://octoriz.com/" target="_blank">OCTORIZ</a>
                </div>
            </div>--}}
        </footer>
        <div class="full-page-background" style="background-image: {{ asset('Admin/paper_dashboard/assets/img/background/background-2.jpg') }} "></div></div>
</div>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.min.js') }}"  type="text/javascript"></script>
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('Admin/paper_dashboard/assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.validate.min.js') }}" ></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/es6-promise-auto.min.js') }}" ></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('Admin/paper_dashboard/assets/js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap-datetimepicker.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap-selectpicker.js') }}"  ></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap-switch-tags.js') }}"  ></script>

<!-- Circle Percentage-chart -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.easypiechart.min.js') }}" ></script>

<!--  Charts Plugin -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap-notify.js') }}" ></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/sweetalert2.js') }}"></script>

<!-- Vector Map plugin -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery-jvectormap.js') }}"></script>


<!-- Wizard Plugin    -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.bootstrap.wizard.min.js') }}"  ></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap-table.js') }}" ></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.datatables.js') }}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/fullcalendar.min.js') }}"  ></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/paper-dashboard.js') }}" ></script>

<!--   Sharrre Library    -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.sharrre.js') }}" ></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ asset('Admin/paper_dashboard/assets/js/demo.js') }}" ></script>

</body>
</html>
