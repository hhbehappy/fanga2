<x-app>
  <x-slot name="title">
    【FANZA】メモされた動画一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-5">
    <h1 class="ml-2 md:ml-0 font-bold md:text-xl inline-block"><span class="text-red-500">【FANZA】</span>メモされた動画一覧<span class="ml-1 text-sm text-gray-500">(更新順)</span></h1>
    <span class="ml-5 inline-block">{{ $releasealllists->total() }}件中 {{ $releasealllists->firstItem() }}〜{{ $releasealllists->lastItem() }}件</span>
  </div>
  <div class="container ml-1 md:ml-0 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $releasealllists as $releasealllist )
      <div>
            <a href="{{ route('fvideo.show', [ 'id' => $releasealllist->content_id ]) }}">
            <img src="<?php echo 'https://pics.dmm.co.jp/digital/video/' .  $releasealllist->content_id  . '/' .  $releasealllist->content_id   . 'ps.jpg'; ?>" alt="【FANZA】 <?php echo $releasealllist->title ?>のメイン画像" class="w-[120px] inline-block px-1 mb-4">
          </a>
      </div>
      @endforeach
    </div>
    <div class="mt-5">
      <div class="block md:hidden">
        {{ $releasealllists->onEachSide(0)->links('vendor.pagination.tailwind2') }}
      </div>
      <div class="md:block lg:hidden">
        {{ $releasealllists->onEachSide(1)->links('vendor.pagination.tailwind3') }}
      </div>
      <div class="lg:block hidden">
        {{ $releasealllists->onEachSide(2)->links('vendor.pagination.tailwind3') }}
      </div>
    </div>
  </div>
</x-app>