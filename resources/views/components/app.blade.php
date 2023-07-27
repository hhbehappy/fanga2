<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link rel="canonical" href="{{ url()->current() }}" />
  <meta name="description" content="FANZAやDUGAで配信されている人気アダルト動画のレヴューサイトではありません。アダルト動画のレヴューサイトではなくて、アダルトな掲示板でもない、ただのオナニー日記かもしれません。">
  <meta name="keywords" content="FANZA,DUGA,AV,アダルト,メモ">
  <meta charset="UTF-8">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')
  <title>{{ $title }}</title>
</head>

<body>
  <div class="flex flex-col mx-auto min-h-screen max-w-[1320px]">
    <x-header />
    <div class="flex flex-grow">
      <aside>
        @if (Request::is('fanza/*', 'search/fanza'))
        <x-fanza_sidebar />
        @endif
        @if (Request::is('duga/*', 'search/duga'))
        <x-duga_sidebar />
        @endif
      </aside>
      <main>
        <article>
          {{ $slot }}
        </article>
      </main>
    </div>
    <x-footer />
  </div>
</body>

</html>