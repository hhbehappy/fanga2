<x-app>
  <x-slot name="title">
    【DUGA】動画一覧
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="ml-2 md:ml-0 font-bold md:text-xl inline-block"><span class="text-red-500">【DUGA】</span>動画一覧</h1>
    <span class="ml-5 inline-block">{{ $videoids->total() }}件中 {{ $videoids->firstItem() }}〜{{ $videoids->lastItem() }}件</span>
  </div>
  <p class="ml-5 md:ml-3 text-sm mb-6"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container ml-1 md:ml-0 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $videoids as $videoid )
      <div>
        <a href="{{ route('dvideo.show', [ 'id' => $videoid->productid ]) }}">
            @if( $videoid->date > $onemonths )
              <span class="text-white bg-red-500 text-sm font-bold absolute ml-1 px-1">NEW</span>
            @endif
            @if( $videoid->jacketimage )
            <img src="<?php echo $videoid->jacketimage ?>" alt="【DUGA】<?php echo $videoid->title ?>のメイン画像" class="h-40 w-[118px] inline-block px-1 mb-4">
            @else
            <img src="<?php echo $videoid->posterimage ?>" alt="【DUGA】<?php echo $videoid->title ?>のメイン画像" class="h-40 w-[118px] inline-block px-1 mb-4">
            @endif
          </a>
          @if ($auth_id === 1 && $videoid->id !== 1)
            <form method="post" action="{{ route('dlist.destroy', $videoid) }}" onclick='return confirm("削除しますか？");'>
              @csrf
              @method('delete')
              <input type="submit" value="削除" class="text-white bg-red-500 rounded">
            </form>
          @endif
      </div>
      @endforeach
    </div>
    <div class="ml-2">
      <span class="block mb-2">{{ $videoids->total() }}件中 {{ $videoids->firstItem() }}〜{{ $videoids->lastItem() }}件</span>
      {{ $videoids->links('vendor.pagination.tailwind3') }}
    </div>
  </div>
</x-app>