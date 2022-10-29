<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('plugins/materialize/materialize.min.css')}}">
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')</title>
@stack('css')
</head>
<body>
    @yield('content')


    <script src="{{asset('plugins/materialize/materialize.min.js')}}"></script>
    <script src="{{asset('js/js.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
    @if(session()->has('message'))
    <script>
        M.toast({
            html: '{{session()->get('message')}}',
            classes: '{{session()->get('classes')}}'
        });
    </script>
    @endif
@stack('js')
</body>
</html>
