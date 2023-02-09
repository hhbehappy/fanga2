<header class="py-4">
  <div class="flex items-end justify-between w-full md:mb-5 pb-3 border-b-2 border-gray-500">
    <div class="w-36 sm:w-44 ml-4 lg:ml-8 shrink-0">
      <a href="{{ route('fanga') }}">
        <x-applicationlogo />
      </a>
    </div>
    <div class="flex flex-wrap md:hidden justify-end">
      <div class="h-8 ml-4 mb-1">
        <form action="{{ route('fanga.searchfanza') }}" method="GET">
          <input type="text" name="keyword" placeholder="FANZA" class="w-4/5 h-8 pb-2.5 -mr-1.5 leading-5 rounded-l-lg">
          <input type="submit" value="検索" class="h-8 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
        </form>
      </div>
      <div class="h-8 ml-4 mb-1">
        <form action="{{ route('fanga.searchduga') }}" method="GET">
          <input type="text" name="keyword" placeholder="DUGA" class="w-4/5 h-8 pb-2.5 -mr-1.5 leading-5 rounded-l-lg">
          <input type="submit" value="検索" class="h-8 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
        </form>
      </div>
    </div>
    <div class="hidden md:flex flex-wrap justify-center">
      <div class="h-7 ml-4 mb-1">
        <form action="{{ route('fanga.searchfanza') }}" method="GET">
          <input type="text" name="keyword" placeholder="FANZA" class="w-48 h-7 pb-2.5 -mr-1.5 leading-5 rounded-l-lg">
          <input type="submit" value="検索" class="w-10 h-7 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
        </form>
      </div>
      <div class="h-7 ml-4 mb-1">
        <form action="{{ route('fanga.searchduga') }}" method="GET">
          <input type="text" name="keyword" placeholder="DUGA" class="w-48 h-7 pb-2.5 -mr-1.5 leading-5 rounded-l-lg">
          <input type="submit" value="検索" class="w-10 h-7 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
        </form>
      </div>
    </div>
    {{-- PC --}}
    <nav class="hidden md:flex items-center lg:mr-8 text-gray-700 font-bold">
      <ul class="flex flex-wrap lg:flex-nowrap">
        <li class="h-6 w-20 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
          <a href="{{ route('flist.index') }}" class="absolute top-0 left-0 w-full h-full">FANZA</a>
        </li>
        <li class="h-6 w-16 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
          <a href="{{ route('dlist.index') }}" class="absolute top-0 left-0 w-full h-full">DUGA</a>
        </li>
        <li class="h-6 w-12 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative"><a href="{{ route('bbs') }}" class="absolute top-0 left-0 w-full h-full">BBS</a></li>
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
  </div>
  {{-- スマホ --}}
  <nav class="flex flex-col md:hidden">
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
          <span class="inlien-block py-0.5 px-2 font-mono text-white bg-red-500 rounded-md">ログイン</span></a></li>
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
      <a href="{{ route('fanga') }}" class="absolute top-0 left-0 w-full h-full mt-1">カテゴリ一覧</a></div>
      <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('fanga') }}" class="absolute top-0 left-0 w-full h-full mt-1">女優一覧</a></div>
      <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('fanga') }}" class="absolute top-0 left-0 w-full h-full mt-1">メーカー一覧</a></div>
      <div class="h-7 w-1/4 pt-1 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
      <a href="{{ route('fanga') }}" class="absolute top-0 left-0 w-full h-full mt-1">シリーズ一覧</a></div>
      </div>
    </div>
    @endif
  </nav>
    <div class="fixed top-0 left-0 m-2 p-3 text-xs font-mono text-white h-6 w-6 rounded-full flex items-center justify-center bg-gray-700 sm:bg-pink-500 md:bg-orange-500 lg:bg-green-500 xl:bg-blue-500">
      <div class="block  sm:hidden md:hidden lg:hidden xl:hidden">al</div>
      <div class="hidden sm:block  md:hidden lg:hidden xl:hidden">sm</div>
      <div class="hidden sm:hidden md:block  lg:hidden xl:hidden">md</div>
      <div class="hidden sm:hidden md:hidden lg:block  xl:hidden">lg</div>
      <div class="hidden sm:hidden md:hidden lg:hidden xl:block">xl</div>
    </div>
</header>