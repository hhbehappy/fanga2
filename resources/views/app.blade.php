<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta name="description" content="FANZAやDUGAで配信されている人気アダルト動画のレヴューサイトではありません。アダルト動画のレヴューサイトではなくて、アダルトな掲示板でもない、ただのオナニー日記かもしれません。">
        <meta name="keywords" content="FANZA,DUGA,AV,アダルト,メモ">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
