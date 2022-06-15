<!doctype html>
<html lang="en">

<head>
    @include('dashboard.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">

    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ URL::to('/images') }}/amgym.png" alt="AdminLTELogo" height=25% width=25%>
        </div>

        @include('dashboard.navbar')

        @include('dashboard.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('dashboard.footer')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    @include('dashboard.script')
    <!-- include('sweetalert::alert') -->
</body>
@stack('js')

</html>