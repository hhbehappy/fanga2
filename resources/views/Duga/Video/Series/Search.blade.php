<x-app>
  <x-slot name="title">
    【DUGA】シリーズ :『 {{ $keyword }} 』の検索結果
  </x-slot>

  <section>
    <div class="flex flex-wrap mb-5 text-white font-mono">
      <a href="{{ route('dlist.series') }}" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        人気シリーズ
      </a>
      <a href="{{ route('dlist.series_all') }}" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        全シリーズ
      </a>
      <a href="{{ route('dlist.series_memo') }}" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        メモの多い順
      </a>
      <a href="{{ route('dlist.series_nice') }}" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        気になる動画の登録数順
      </a>
      <div class="h-8 ml-2">
        <form action="{{ route('dlist.series_search') }}" method="GET">
          <input type="text" name="keyword" placeholder="シリーズ" class="w-48 h-8 pb-2.5 -mr-2.5 text-black leading-5 rounded-l-lg" required>
          <input type="submit" value="検索" class="h-8 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
        </form>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold md:text-xl inline-block"><span class="text-red-500">【DUGA】</span>シリーズ :『 {{ $keyword }} 』の検索結果</h1>
      <span class="ml-5 inline-block">{{ $seriessearchlists->total() }}件中 {{ $seriessearchlists->firstItem() }}〜{{ $seriessearchlists->lastItem() }}件</span>
    </div>
    <div class="container ml-1 md:ml-0 flex flex-col">
      <div class="flex flex-wrap ml-4 md:mx-2 justify-center sm:justify-start">
        @foreach ( $seriessearchlists as $seriessearchlist )
        <div class="w-36 mr-5 md:mr-2 mb-4">
          <a href="{{ route('dlist.show', [ 'sort' => 'series', 'keyword' => $seriessearchlist->series ]) }}" class="p-2 border-2 text-blue-500 text-center inline-block">
            @if( $seriessearchlist->jacketimage )
            <img src="<?php echo $seriessearchlist->jacketimage ?>" alt="【DUGA】シリーズ「<?php echo $seriessearchlist->series ?>」" class="h-40 w-[118px] inline-block px-1">
            @else
            <img src="<?php echo $seriessearchlist->posterimage ?>" alt="【DUGA】シリーズ「<?php echo $seriessearchlist->series ?>」" class="h-40 w-[118px] inline-block px-1">
            @endif
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ $seriessearchlist->series }}</span>
          </a>
        </div>
        @endforeach
      </div>
      <div class="mt-5">
        <div class="block md:hidden">
          {{ $seriessearchlists->onEachSide(0)->appends(request()->input())->links('vendor.pagination.tailwind2') }}
        </div>
        <div class="md:block lg:hidden">
          {{ $seriessearchlists->onEachSide(1)->appends(request()->input())->links('vendor.pagination.tailwind3') }}
        </div>
        <div class="lg:block hidden">
          {{ $seriessearchlists->onEachSide(2)->appends(request()->input())->links('vendor.pagination.tailwind3') }}
        </div>
      </div>
    </div>
  </section>
</x-app>