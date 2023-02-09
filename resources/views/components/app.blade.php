<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')
  <title>{{ $title }}</title>
</head>
<body>
  {{-- <x-loading /> --}}
  <x-header />
  <div class="flex flex-col min-h-screen">
    <div class="flex flex-grow">
      <div class="">
        @if (Request::is('fanza/*', 'search/fanza'))
          <x-fanza_sidebar />
        @endif
        @if (Request::is('duga/*', 'search/duga'))
          <x-duga_sidebar />
        @endif
      </div>
      <div class="">
        <article>
          {{ $slot }}
        </article>
      </div>
    </div>
  <x-footer />
</body>
</html>