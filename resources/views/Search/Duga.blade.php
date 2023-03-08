<x-app>
  <x-slot name="title">
    【DUGA】『 {{ $keyword }} 』の検索結果
  </x-slot>

  <div class="border-b-4 border-gray-500 mb-2">
    <h1 class="font-bold md:text-xl inline-block"><span class="text-red-500">【DUGA】</span>『 {{ $keyword }} 』の検索結果</h1>
    <span class="ml-5 inline-block">{{ $dugas->total() }}件中 {{ $dugas->firstItem() }}〜{{ $dugas->lastItem() }}件</span>
  </div>
  <p class="text-sm mb-6 ml-6"><span class="font-bold text-white bg-red-500 px-1">NEW</span> : 配信開始日より1ヶ月以内の動画</p>
  <div class="container mx-3 flex flex-col">
    <div class="flex flex-none flex-wrap mb-4 relative">
      @foreach ( $dugas as $dugavideo )
      <a href="{{ route('dvideo.show', [ 'id' => $dugavideo->productid ]) }}">
          @if( $dugavideo->date > $onemonths )
            <span class="text-white bg-red-500 text-sm font-bold absolute ml-3 px-1">NEW</span>
          @endif
          @if( $dugavideo->jacketimage )
          <img src="<?php echo $dugavideo->jacketimage ?>" alt="【DUGA】<?php echo $dugavideo->title ?>" class="h-40 w-32 inline-block px-2 mb-4">
          @else
          <img src="<?php echo $dugavideo->posterimage ?>" alt="【DUGA】<?php echo $dugavideo->title ?>" class="h-40 w-32 inline-block px-2 mb-4">
          @endif
        </a>
        @if ($auth_id === 1 && $dugavideo->id !== 1)
          <form method="post" action="{{ route('dlist.destroy', $dugavideo) }}" onclick='return confirm("削除しますか？");'>
            @csrf
            @method('delete')
            <input type="submit" value="削除" class="p-2 text-white bg-red-500 rounded cursor-pointer">
          </form>
        @endif
      @endforeach
    </div>
    <div class="ml-6">
      <span class="block mb-2 ml-2">{{ $dugas->total() }}件中 {{ $dugas->firstItem() }}〜{{ $dugas->lastItem() }}件</span>
      {{ $dugas->appends(request()->input())->links('vendor.pagination.tailwind3') }}
    </div>
  </div>
</x-app>