<div class="hidden md:flex flex-col md:w-[140px] lg:w-[160px] shrink-0 bg-white border-4 border-black mx-4 lg:mr-8 mb-10">
  <div class="flex flex-col space-y-1">
    <h1 class="pb-1 pl-3 text-lg text-left text-gray-300 font-bold bg-black">DUGA</h1>
    <h2 class="py-2 pl-3 text-left text-red-500 font-bold">カテゴリ</h2>
    <ul class="space-y-1">
      @foreach ( $dugacategorys as $dugacategory )
        <li class="text-blue-500 text-sm hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <a href="{{ route('dlist.show', [ 'sort' => 'category', 'keyword' => $dugacategory ]) }}" class="py-1 px-3 block w-full h-full">{{ $dugacategory }}</a>
        </li>
      @endforeach
    </ul>
    <p class="text-xs text-blue-500 text-right mr-2 my-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
        <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
      </svg>
      <a href="{{ route('dlist.category') }}" class="hover:bg-red-50 hover:border-y-2 border-red-200">カテゴリ一覧</a>
    </p>
    <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">女優</h2>
      <ul class="space-y-1">
        @foreach ( $dugaperformers as $dugaperformer )
          <li class="text-blue-500 text-sm hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
            <a href="{{ route('dlist.show', [ 'sort' => 'performer', 'keyword' => $dugaperformer->performer ]) }}" class="py-1 px-3 block w-full h-full">{{ $dugaperformer->performer }}</a>
          </li>
        @endforeach
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <a href="{{ route('dlist.performer') }}" class="hover:bg-red-50 hover:border-y-2 border-red-200">女優一覧</a>
      </p>
    </div>
    <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">メーカー</h2>
      <ul class="space-y-1">
        @foreach ( $dugamakers as $dugamaker )
          <li class="text-blue-500 text-sm hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
            <a href="{{ route('dlist.show', [ 'sort' => 'maker', 'keyword' => $dugamaker->maker ]) }}" class="py-1 px-3 block w-full h-full">{{ $dugamaker->maker }}</a>
          </li>
        @endforeach
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <a href="{{ route('dlist.maker') }}" class="hover:bg-red-50 hover:border-y-2 border-red-200">メーカー一覧</a>
      </p>
    </div>
    <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">シリーズ</h2>
      <ul class="space-y-1">
        @foreach ( $dugaseriess as $dugaseries )
          <li class="text-blue-500 text-sm hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
            <a href="{{ route('dlist.show', [ 'sort' => 'series', 'keyword' => $dugaseries->series ]) }}" class="py-1 px-3 block w-full h-full">{{ $dugaseries->series }}</a>
          </li>
        @endforeach
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <a href="{{ route('dlist.series') }}" class="hover:bg-red-50 hover:border-y-2 border-red-200">シリーズ一覧</a>
      </p>
    </div>
    <div class="flex flex-col py-3 text-blue-500 border-t-2 border-gray-400 space-y-1">
      <a href="{{ route('flist.index') }}" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        FANZA
      </a>
      <a href="{{ route('mypage') }}" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        マイページ
      </a>
      <a href="{{ route('bbs') }}" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        BBS
      </a>
    </div>
  </div>
</div>
