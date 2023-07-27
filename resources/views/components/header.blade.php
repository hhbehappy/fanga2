<header class="mt-2">
  <div class="flex flex-wrap w-full justify-between pb-1 items-end mb-5 border-b-2 border-gray-500">
    <div class="md:w-[350px] ml-4 md:shrink-0">
      <a href="{{ route('fanga') }}" class="font-logofont text-2xl text-red-500">FANGA
      <span class="text-sm text-gray-700">【FANZA&DUGA】</span>
      </a>
      <p class="text-sm font-bold">人気アダルト動画のレヴューサイトではありません。</p>
    </div>
    {{-- PC --}}
    <nav class="hidden md:block items-center mt-3 ml-4 lg:mr-2">
      <ul class="flex flex-nowrap text-gray-700 font-bold">
        <li class="h-6 w-40 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
          <a href="{{ route('fvideo.index') }}" class="absolute top-0 left-0 w-full h-full">FANZAの動画を探す</a>
        </li>
        <li class="h-6 w-40 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
          <a href="{{ route('dvideo.index') }}" class="absolute top-0 left-0 w-full h-full">DUGAの動画を探す</a>
        </li>
        <li class="h-6 w-14 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative"><a href="{{ route('bbs') }}" class="absolute top-0 left-0 w-full h-full">BBS</a></li>
        <li class="h-6 w-24 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative"><a href="{{ route('mypage') }}" class="absolute top-0 left-0 w-full h-full">マイページ</a></li>
        @guest
        <li class="h-6 w-20 mb-1 text-center hover:bg-green-600 hover:text-white border-r-2 border-gray-500 relative"><a href="{{ route('register') }}" class="absolute top-0 left-0 w-full h-full">会員登録</a></li>
        @endguest
        @auth
        <li class="h-6 w-24 mb-1 text-center hover:bg-red-500 hover:text-white relative"><a href="{{ route('fanga.logout') }}" class="absolute top-0 left-0 w-full h-full">ログアウト</a></li>
        @endauth
        @guest
        <li class="h-6 w-20 mb-1 text-center hover:bg-red-500 hover:text-white relative"><a href="{{ route('login') }}" class="absolute top-0 left-0 w-full h-full">ログイン</a></li>
        @endguest
      </ul>
    </nav>
    <!-- スマホ -->
    <nav v-if="path.includes('/video/{content_id}') === false" class="block md:hidden w-full mt-3">
      <ul class="flex flex-nowrap text-gray-700 font-bold">
        <li class="h-8 w-1/2 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
          <a href="{{ route('fvideo.index') }}" class="pt-1 absolute top-0 left-0 w-full h-full">FANZAの動画を探す</a>
        </li>
        <li class="h-8 w-1/2 text-center hover:bg-red-500 hover:text-white relative">
          <a href="{{ route('dvideo.index') }}" class="pt-1 absolute top-0 left-0 w-full h-full">DUGAの動画を探す</a>
        </li>
      </ul>
    </nav>
  </div>
  {{-- スマホ --}}
  {{-- <nav class="flex flex-col md:hidden">
    <ul class="flex">
      <li class="p-1 h-10 w-1/2 bg-gray-200 text-center text-gray-700 text-2xl font-bold hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
        <a href="{{ route('flist.index') }}" class="absolute top-0 left-0 w-full h-full mt-1">FANZA</a>
      </li>
      <li class="p-1 h-10 w-1/2 bg-gray-200 text-center text-gray-700 text-2xl font-bold hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('dlist.index') }}" class="absolute top-0 left-0 w-full h-full mt-1">DUGA</a>
      </li>
    </ul>
    @auth
    <ul class="flex text-gray-700 font-bold">
      <li class="h-9 w-1/3 bg-gray-200 text-center p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('mypage') }}" class="absolute top-0 left-0 w-full h-full mt-1">マイページ</a></li>
      <li class="h-9 w-1/3 bg-gray-200 text-center p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('bbs') }}" class="absolute top-0 left-0 w-full h-full mt-1">BBS</a></li>
      <li class="h-9 w-1/3 bg-gray-200 text-center p-1 border-y-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('fanga.logout') }}" class="absolute top-0 left-0 w-full h-full mt-1">ログアウト</a></li>
    </ul>
    @endauth
    @guest
    <ul class="flex text-gray-700 font-bold">
      <li class="h-9 w-1/4 bg-gray-200 text-center p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('mypage') }}" class="absolute top-0 left-0 w-full h-full mt-1">マイページ</a></li>
      <li class="h-9 w-1/4 bg-gray-200 text-center p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('bbs') }}" class="absolute top-0 left-0 w-full h-full mt-1">BBS</a></li>
      <li class="h-9 w-1/4 bg-gray-200 text-center p-1 border-y-2 border-r-2 border-gray-500 hover:bg-green-600 hover:text-white relative">
        <a href="{{ route('register') }}" class="absolute top-0 left-0 w-full h-full mt-1">会員登録</a></li>
      <li class="h-9 w-1/4 bg-gray-200 text-center p-1 border-y-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('login') }}" class="absolute top-0 left-0 w-full h-full mt-1">
          <span class="inlien-block py-0.5 px-2 text-sm font-mono text-white bg-red-500 rounded-md">ログイン</span></a></li>
    </ul>
    @endguest
    @if (Request::is('fanza/*'))
    <div class="">
      <div class="flex h-7 pl-4 min-w-full bg-gray-900 items-center">
        <h1 class="text-red-500 text-lg font-bold">FANZA</h1>
      </div>
      <div class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-mono text-sm">
        <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('flist.genre') }}" class="absolute top-0 left-0 w-full h-full mt-1">ジャンル一覧</a></div>
        <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('flist.actress') }}" class="absolute top-0 left-0 w-full h-full mt-1">女優一覧</a></div>
        <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('flist.maker') }}" class="absolute top-0 left-0 w-full h-full mt-1">メーカー一覧</a></div>
        <div class="h-7 w-1/4 pt-1 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
        <a href="{{ route('flist.series') }}" class="absolute top-0 left-0 w-full h-full mt-1">シリーズ一覧</a></div>
      </div>
    </div>
    @endif
    @if (Request::is('duga/*'))
    <div class="">
      <div class="flex h-7 pl-4 min-w-full bg-gray-900 items-center">
        <h1 class="text-red-500 text-lg font-bold">DUGA</h1>
      </div>
      <div class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-mono text-sm">
      <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('dlist.category') }}" class="absolute top-0 left-0 w-full h-full mt-1">カテゴリ一覧</a></div>
      <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('dlist.performer') }}" class="absolute top-0 left-0 w-full h-full mt-1">女優一覧</a></div>
      <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('dlist.maker') }}" class="absolute top-0 left-0 w-full h-full mt-1">メーカー一覧</a></div>
      <div class="h-7 w-1/4 pt-1 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('dlist.series') }}" class="absolute top-0 left-0 w-full h-full mt-1">シリーズ一覧</a></div>
      </div>
    </div>
    @endif
  </nav> --}}
</header>