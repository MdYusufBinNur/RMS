


<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery.min.js') }}"  type="text/javascript"></script>
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('Admin/paper_dashboard/assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{asset('Admin/paper_dashboard/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

{{--<script src="{{asset('Admin/paper_dashboard/assets/dropzone/dropzone.js') }}" ></script>--}}

<!--  Forms Validations Plugin -->
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery.validate.min.js') }}" ></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{asset('Admin/paper_dashboard/assets/js/es6-promise-auto.min.js') }}" ></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('Admin/paper_dashboard/assets/js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{asset('Admin/paper_dashboard/assets/js/bootstrap-datetimepicker.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{asset('Admin/paper_dashboard/assets/js/bootstrap-selectpicker.js') }}"  ></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{asset('Admin/paper_dashboard/assets/js/bootstrap-switch-tags.js') }}"  ></script>

<!-- Circle Percentage-chart -->
{{--<script src="{{asset('Admin/paper_dashboard/assets/js/jquery.easypiechart.min.js') }}" ></script>--}}

<!--  Charts Plugin -->
{{--<script src="{{asset('Admin/paper_dashboard/assets/js/chartist.min.js') }}"></script>--}}

<!--  Notifications Plugin    -->
<script src="{{asset('Admin/paper_dashboard/assets/js/bootstrap-notify.js') }}" ></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{asset('Admin/paper_dashboard/assets/js/sweetalert2.js') }}"></script>

<!-- Vector Map plugin -->
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery-jvectormap.js') }}"></script>

<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>--}}

<!-- Wizard Plugin    -->
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery.bootstrap.wizard.min.js') }}"  ></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{asset('Admin/paper_dashboard/assets/js/bootstrap-table.js') }}" ></script>

<!--  Plugin for DataTables.net  -->
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery.datatables.js') }}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{asset('Admin/paper_dashboard/assets/js/fullcalendar.min.js') }}"  ></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{asset('Admin/paper_dashboard/assets/js/paper-dashboard.js') }}" ></script>

<!--   Sharrre Library    -->
<script src="{{asset('Admin/paper_dashboard/assets/js/jquery.sharrre.js') }}" ></script>
<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{asset('Admin/paper_dashboard/assets/js/demo.js') }}" ></script>
<!-- Dropzone Plugin js! -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
        @if(Session::has('message'))
    let type="{{Session::get('alert-type','info')}}"

    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

</script>

@yield('footer')
@yield('script')
