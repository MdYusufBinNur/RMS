<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Construction Monitoring System</title>

@yield('style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/paper-dashboard.css') }}" rel="stylesheet">


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link  href="{{ asset('Admin/paper_dashboard/assets/css/demo.css') }}" rel="stylesheet">

    <link href="{{ asset('Admin/paper_dashboard/assets/css/themify-icons.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">--}}

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">

    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    {{--<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/37/8a/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/37/8a/util.js"></script>--}}

    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--Taoster--}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

</head>
