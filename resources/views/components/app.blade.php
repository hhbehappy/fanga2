<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link rel="canonical" href="{{ url()->current() }}" />
  <meta name="description" content="「FANGA」では、デジタルコンテンツ配信サービスの「FANZA」及び「DUGA」で配信されている動画コンテンツに、当サイト内においてメモを投稿できるウェブサイトです。※VR動画及び一部の動画には対応していません。">
  <meta name="keywords" content="FANZA,DUGA,AV,無料,メモ">
  <meta charset="UTF-8">
  @if (request()->route()->getName('fmemo.show'))
  @else
  <meta name="robots" content="noindex">
  @endif
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/js/app.js')
  <title>{{ $title }}</title>
</head>

<body>
  <x-header />
  <div class="flex flex-col min-h-screen">
    <div class="flex flex-grow">
      <div>
        @if (Request::is('fanza/*', 'search/fanza'))
        <x-fanza_sidebar />
        @endif
        @if (Request::is('duga/*', 'search/duga'))
        <x-duga_sidebar />
        @endif
      </div>
      <div>
        <article>
          {{ $slot }}
        </article>
      </div>
    </div>
    <x-footer />
  </div>
</body>

</html>