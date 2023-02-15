<x-app>
  <x-slot name="title">
    【DUGA】{{ $keyword }}の動画一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="font-bold text-xl inline-block"><span class="text-red-500">【DUGA】</span>{{ $keyword }}の動画一覧</h1>
    <span class="ml-5 inline-block">{{ $videolists->total() }}件中 {{ $videolists->firstItem() }}〜{{ $videolists->lastItem() }}件</span>
  </div>
  <p class="text-sm mb-6 ml-5"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container mx-3 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $videolists as $videolist )
      <a href="{{ route('dvideo.show', [ 'id' => $videolist->productid ]) }}">
          @if( $videolist->date > $onemonths )
            <span class="text-white bg-red-500 text-sm font-bold absolute ml-3 px-1">NEW</span>
          @endif
          @if( $videolist->jacketimage )
          <img src="<?php echo $videolist->jacketimage ?>" alt="【DUGA】<?php echo $videolist->title ?>" class="h-40 w-32 inline-block px-2 mb-4">
          @else
          <img src="<?php echo $videolist->posterimage ?>" alt="【DUGA】<?php echo $videolist->title ?>" class="h-40 w-32 inline-block px-2 mb-4">
          @endif
        </a>
      @endforeach
    </div>
    <div class="ml-6">
      <span class="block mb-2 ml-2">{{ $videolists->total() }}件中 {{ $videolists->firstItem() }}〜{{ $videolists->lastItem() }}件</span>
      {{ $videolists->appends(request()->input())->links('vendor.pagination.tailwind3') }}
    </div>
  </div>
</x-app>