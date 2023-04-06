<x-app>
  <x-slot name="title">
    【FANZA】{{ $sort }}『{{ $keyword }}』の動画一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="font-bold md:text-xl inline-block"><span class="text-red-500">【FANZA】</span>{{ $sort }}『{{ $keyword }}』の動画一覧</h1>
    <span class="ml-5 inline-block">{{ $videolists->total() }}件中 {{ $videolists->firstItem() }}〜{{ $videolists->lastItem() }}件</span>
  </div>
  <p class="text-sm mb-6 ml-5"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container mx-3 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $videolists as $videolist )
      <a href="{{ route('fvideo.show', [ 'id' => $videolist->content_id ]) }}">
          @if( $videolist->date > $onemonths && $videolist->date < \Carbon\Carbon::today() )
            <span class="text-white bg-red-500 text-sm font-bold absolute ml-2.5 px-1">NEW</span>
          @endif
          @if( $videolist->date > \Carbon\Carbon::today() )
            <span class="text-white bg-blue-600 text-sm font-bold absolute ml-2.5 px-1">配信予定</span>
          @endif
          <img src="<?php echo 'https://pics.dmm.co.jp/digital/video/' .  $videolist->content_id  . '/' .  $videolist->content_id   . 'ps.jpg'; ?>" alt="[FANZA] <?php echo $videolist->title ?>" class="w-[120px] inline-block px-2 mb-4">
        </a>
      @endforeach
    </div>
    <div class="ml-6">
      <span class="block mb-2 ml-2">{{ $videolists->total() }}件中 {{ $videolists->firstItem() }}〜{{ $videolists->lastItem() }}件</span>
      {{ $videolists->appends(request()->input())->links('vendor.pagination.tailwind3') }}
    </div>
  </div>
</x-app>