<x-app>
  <x-slot name="title">
    【FANZA】の動画一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="ml-2 md:ml-0 font-bold text-xl inline-block"><span class="text-red-500">【FANZA】</span>の動画一覧</h1>
    <span class="ml-5">{{ $videoids->total() }}件中 {{ $videoids->firstItem() }}〜{{ $videoids->lastItem() }}件</span>
  </div>
  <p class="ml-5 md:ml-3 text-sm mb-6"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container ml-1 md:ml-0 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $videoids as $videoid )
      <a href="{{ route('fvideo.show', [ 'id' => $videoid->content_id ]) }}">
          @if( $videoid->date > $onemonths )
            <span class="text-white bg-red-500 text-sm font-bold absolute ml-3 px-1">NEW</span>
          @endif
          <img src="<?php echo 'https://pics.dmm.co.jp/digital/video/' .  $videoid->content_id  . '/' .  $videoid->content_id   . 'ps.jpg'; ?>" alt="【FANZA】 <?php echo $videoid->title ?>" class="w-32 inline-block px-2 mb-4">
        </a>
      @endforeach
    </div>
    <div class="ml-2">
      <span class="block mb-2">{{ $videoids->total() }}件中 {{ $videoids->firstItem() }}〜{{ $videoids->lastItem() }}件</span>
      {{ $videoids->links('vendor.pagination.tailwind3') }}
    </div>
  </div>
</x-app>