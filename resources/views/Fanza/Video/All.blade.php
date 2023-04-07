<x-app>
  <x-slot name="title">
    【FANZA】動画一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="ml-2 md:ml-0 font-bold md:text-xl inline-block"><span class="text-red-500">【FANZA】</span>動画一覧</h1>
    <span class="ml-5 inline-block">{{ $videoids->total() }}件中 {{ $videoids->firstItem() }}〜{{ $videoids->lastItem() }}件</span>
  </div>
  <p class="ml-5 md:ml-3 text-sm mb-6"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container ml-1 md:ml-0 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $videoids as $videoid )
      <div>
            <a href="{{ route('fvideo.show', [ 'id' => $videoid->content_id ]) }}">
            @if( $videoid->date > $onemonths && $videoid->date <= \Carbon\Carbon::today() )
              <span class="text-white bg-red-500 text-sm font-bold absolute ml-1.5 px-1">NEW</span>
            @endif
            @if( $videoid->date > \Carbon\Carbon::today() )
              <span class="text-white bg-blue-600 text-sm font-bold absolute ml-1.5 px-1">配信予定</span>
            @endif
            <img src="<?php echo 'https://pics.dmm.co.jp/digital/video/' .  $videoid->content_id  . '/' .  $videoid->content_id   . 'ps.jpg'; ?>" alt="【FANZA】 <?php echo $videoid->title ?>のメイン画像" class="w-[120px] inline-block px-1 mb-4">
          </a>
          @if ($auth_id === 1 && $videoid->id !== 1)
          <form method="post" action="{{ route('flist.destroy', $videoid) }}" onclick='return confirm("削除しますか？");'>
            @csrf
            @method('delete')
            <input type="submit" value="削除" class="text-white bg-red-500 rounded">
          </form>
          @endif
      </div>
      @endforeach
    </div>
    <div class="mt-5">
      <div class="block sm:hidden">
        {{ $videoids->onEachSide(0)->links('vendor.pagination.tailwind2') }}
      </div>
      <div class="sm:block hidden">
        {{ $videoids->onEachSide(2)->links('vendor.pagination.tailwind3') }}
      </div>
    </div>
  </div>
</x-app>