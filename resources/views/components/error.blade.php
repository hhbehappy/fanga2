<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link rel="canonical" href="{{ url()->current() }}" />
  <meta charset="UTF-8">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')
  <title>{{ $title }}</title>
</head>

<body>
  <x-header />
  <div class="flex flex-col min-h-screen">
    <div class="flex flex-grow">
      <div class="">
        <article>
          {{ $slot }}
        </article>
      </div>
    </div>
    <x-footer />
</body>

</html>