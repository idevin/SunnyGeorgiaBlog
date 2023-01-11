<html lang="{{ app()->getLocale() }}">
<head>

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

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="rating" content="general">

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


    <!-- CSS Files -->
    {{--    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet" />--}}

    <link href="{{ mix('/css/' . $css) }}" rel="stylesheet">
    @stack('css')
</head>
