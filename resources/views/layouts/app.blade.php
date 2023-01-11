<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []
            w[l].push({
                'gtm.start':
                    new Date().getTime(),
                event: 'gtm.js'
            })
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''
            j.async = true
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl
            f.parentNode.insertBefore(j, f)
        })(window, document, 'script', 'dataLayer', 'GTM-MFB5WBS')</script>
    <!-- End Google Tag Manager -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">


    <link rel="canonical" href="{{request()->url()}}"/>
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon"/>

    @yield('meta.common')
    @yield('meta.post')
    @yield('meta.profile')

    <script>
        window.locale = '{{ app()->getLocale() }}'
        window.blog = {!! blogPrefix() !!}
            window.show_comments = {{(int)$settings->show_comments}};
    </script>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @stack('inline-scripts')
</head>
<body class="bg-light">

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFB5WBS"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="app">
    @include('shared/nav-new')

    @include('shared/alerts')
    @yield('content')
    @include('shared/footer-new')
</div>
</body>
</html>
