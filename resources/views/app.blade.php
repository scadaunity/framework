<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!--
        <link rel="shortcut icon" sizes="114x114" href="{{ asset('img/Logo-Icon.svg') }}">
        -->

        <link rel="shortcut icon" sizes="114x114" href="/img/Logo-Icon.svg">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        @routes
        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
