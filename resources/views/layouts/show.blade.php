<!doctype html>

@include('shared/head', ['css' => 'appshow.css']);

<body class="landing-page sidebar-collapse">
    <!-- Navbar -->
    @include('shared/nav-new')
    <!-- End Navbar -->
    <div id="app" class="wrapper">
        @include('shared/alerts')
        @yield('content')
        @include('shared/footer')
    </div>



    <!-- Scripts -->
{{--    <script src="{{ mix('/js/appshow.js') }}"></script>--}}

    @stack('inline-scripts')

    @include('shared/low-foot')

</body>
</html>
