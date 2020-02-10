<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('Admin.includes.head')
<body>
<div class="wrapper">
    @include('Admin.includes.sidebar')

    <div class="main-panel">

        @include('Admin.includes.navbar')

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>


                    </ul>
                </nav>
                {{--<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="https://www.octoriz.com">Octoriz</a>
                </div>--}}
            </div>
        </footer>

    </div>
</div>
@include('Admin.includes.footer')
</body>
</html>
