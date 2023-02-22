<x-app>
  <x-slot name="title">
    【FANZA】『 {{ $keyword }} 』の検索一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="font-bold md:text-xl inline-block"><span class="text-red-500">【FANZA】</span>『 {{ $keyword }} 』の検索一覧</h1>
    <span class="ml-5 inline-block">{{ $fanzas->total() }}件中 {{ $fanzas->firstItem() }}〜{{ $fanzas->lastItem() }}件</span>
  </div>
  <p class="text-sm mb-6 ml-6"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container mx-3 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $fanzas as $fanza )
      <a href="{{ route('fvideo.show', [ 'id' => $fanza->content_id ]) }}">
          @if( $fanza->date > $onemonths )
            <span class="text-white bg-red-500 text-sm font-bold absolute ml-3 px-1">NEW</span>
          @endif
          <img src="<?php echo 'https://pics.dmm.co.jp/digital/video/' .  $fanza->content_id  . '/' .  $fanza->content_id   . 'ps.jpg'; ?>" alt="[FANZA] <?php echo $fanza->title ?>" class="w-32 inline-block px-2 mb-4">
        </a>
        @if ($auth_id === 1 && $fanza->id !== 1)
          <form method="post" action="{{ route('flist.destroy', $fanza) }}" onclick='return confirm("削除しますか？");'>
            @csrf
            @method('delete')
            <input type="submit" value="削除" class="p-2 text-white bg-red-500 rounded cursor-pointer">
          </form>
        @endif
      @endforeach
    </div>
    <div class="ml-6">
      <span class="block mb-2 ml-2">{{ $fanzas->total() }}件中 {{ $fanzas->firstItem() }}〜{{ $fanzas->lastItem() }}件</span>
      {{ $fanzas->appends(request()->input())->links('vendor.pagination.tailwind3') }}
    </div>
  </div>
</x-app>