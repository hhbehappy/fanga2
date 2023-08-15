<x-app>
  <x-slot name="title">
    {{ $videoa->title }}のメモ一覧
  </x-slot>

  <h1 class="font-bold md:text-xl mb-10 px-4 md:mr-8 bg-gray-200 p-2 md:border-b-2 border-gray-500"><span
      class="text-red-500">【FANZA】</span>
    {{ $videoa->title }}
  </h1>
  <!-- 画像リスト -->
  <div class="w-screen md:w-full">
    <div class="flex overflow-x-scroll mx-6 pb-8">
      <div class="flex flex-none flex-nowrap">
        @foreach ( $videoids as $videoid )
        <div class="w-36 mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . 'pl.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?>のジャケット画像" class="h-[6rem] -mb-1">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-1.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 1枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-2.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 2枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-3.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 3枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-4.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 4枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-5.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 5枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-6.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 6枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-7.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 7枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-8.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 8枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-9.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 9枚目の画像" class="h-[6rem]">
        </div>
        <div class="mr-5">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $videoid->content_id . '/' . $videoid->content_id . '-10.jpg'; ?>"
            alt="【FANZA】 <?php echo $videoid->title ?> 10枚目の画像" class="h-[6rem]">
        </div>
        <div class="flex w-32 mr-12 mt-4 text-blue-500 hover:underline hover:text-red-500 justify-center">
          <a href="<?php echo 'https://al.dmm.co.jp/?lurl=https%3A%2F%2Fwww.dmm.co.jp%2Fdigital%2Fvideoa%2F-%2Fdetail%2F%3D%2Fcid%3D' . $videoid->content_id . '%2F&af_id=maxjpblog-017&ch=link_tool&ch_id=text'; ?>"
            rel="nofollow" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-8 h-8 ml-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
            </svg>
            <span class="font-semibold text-sm">FANZAで見る</span>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- MENU --}}
  <div class="my-12 md:mr-8 z-0">
    <ul class="flex flex-wrap px-5 text-center font-mono text-gray-800 justify-center md:justify-start">
      <li
        class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
        <a href="{{ route('fvideo.show', [ 'id' => $videoid->content_id ]) }}"
          class="pt-1 absolute top-0 left-0 w-full h-full">詳細ページへ</a>
      </li>
      <li
        class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
        <a href="{{ route('fmemo.memoListLatest', [ 'content_id' => $videoid->content_id ]) }}"
          class="pt-1 absolute top-0 left-0 w-full h-full">最新の50件</a>
      </li>
      <li
        class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
        <a href="{{ route('fmemo.memoListSort', [ 'content_id' => $videoid->content_id, 'sort' => 'oldest' ]) }}"
          class="pt-1 absolute top-0 left-0 w-full h-full">はじめから全部</a>
      </li>
      <li
        class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
        <a href="{{ route('fmemo.memoListSort', [ 'content_id' => $videoid->content_id, 'sort' => 'latest' ]) }}"
          class="pt-1 absolute top-0 left-0 w-full h-full">おわりから全部</a>
      </li>
      <li class="h-9 w-1/2 md:w-40 py-1 text-white border-2 border-gray-400 bg-red-500">
        100件ずつ見る
      </li>
      <li
        class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
        <a href="<?php echo 'https://al.dmm.co.jp/?lurl=https%3A%2F%2Fwww.dmm.co.jp%2Fdigital%2Fvideoa%2F-%2Fdetail%2F%3D%2Fcid%3D' . $videoid->content_id . '%2F&af_id=maxjpblog-017&ch=link_tool&ch_id=text'; ?>"
          rel="nofollow" target="_blank" class="pt-1 absolute top-0 left-0 w-full h-full">FANZAで見る</a>
      </li>
    </ul>
  </div>
  <h2 class="md:mr-8 text-center text-lg font-bold border-b-2 border-gray-500">メモ一覧
    《100件ずつ見る》
    <span class="inline-block">{{ $release_memo_lists->total() }}件中 {{ $release_memo_lists->firstItem() }}〜{{
      $release_memo_lists->lastItem() }}件</span>
  </h2>
  <div class="flex flex-col justify-center p-1 mx-auto md:mr-8">
    @foreach ($release_memo_lists as $release_memo_list)
    <div class="border-dotted border-b border-gray-500 p-2">
      <div class="flex flex-wrap justify-between items-center">
        <div class="mb-3">
          @if ($release_memo_list->nickname === 1 && $release_memo_list->user_id)
          <span class="text-sm font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="w-4 h-4 mb-1 text-blue-400 inline-block">
              <path fill-rule="evenodd"
                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                clip-rule="evenodd" />
              <path
                d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            {{ $release_memo_list->name }}
          </span>
          @elseif ($release_memo_list->nickname === 0 && $release_memo_list->user_id)
          <span class="text-sm font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="w-4 h-4 mb-1 text-green-500 inline-block">
              <path fill-rule="evenodd"
                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                clip-rule="evenodd" />
              <path
                d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            ログインユーザー
          </span>
          @else
          <span class="text-sm font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="w-4 h-4 mb-1 text-gray-400 inline-block">
              <path fill-rule="evenodd"
                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                clip-rule="evenodd" />
              <path
                d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            退会済みユーザー
          </span>
          @endif
          <span class="w-44 mt-2 ml-4 text-sm text-zinc-500 inline-block">
            {{ $release_memo_list->updated_at->format('Y年m月d日 H:i:s') }}
          </span>
        </div>
        <div class="w-full">
          @if ($release_memo_list->f_position === 'top' && $release_memo_list->f_link)
          <p class="mb-3">>> No.
            <a href="{{ route('fmemo.memoListSort', [ 'sort' => 'oldest', 'content_id' => $release_memo_list->f_link, '#f-' . $release_memo_list->f_no ])}}"
              class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
              F-{{ $release_memo_list->f_no }}
            </a>
          </p>
          @endif
          {{-- @if ($release_memo_list->d_position === 'top' && $release_memo_list->d_link)
          <p class="mb-3">>> No.
            <a href="{{ route('dmemo.memoListSort', [ 'sort' => 'oldest', 'content_id' => $release_memo_list->d_link, '#d-' . $release_memo_list->d_no]) }}"
              class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
              D-{{ $release_memo_list->d_no }}
            </a>
          </p>
          @endif --}}
        </div>
        <div class="flex w-full whitespace-pre-line break-all">{{ $release_memo_list->release }}</div>
        <div class="w-full">
          @if ($release_memo_list->f_position === 'bottom' && $release_memo_list->f_link)
          <p class="mt-3">>> No.
            <a href="{{ route('fmemo.memoListSort', [ 'sort' => 'oldest', 'content_id' => $release_memo_list->f_link, '#f-' . $release_memo_list->f_no]) }}"
              class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
              F-{{ $release_memo_list->f_no }}
            </a>
          </p>
          @endif
          {{-- @if ($release_memo_list->d_position === 'bottom' && $release_memo_list->d_link)
          <p class="mt-3">>> No.
            <a href="{{ route('dmemo.memoListSort', [ 'sort' => 'oldest', 'content_id' => $release_memo_list->d_link, '#d-' . $release_memo_list->d_no]) }}"
              class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
              D-{{ $release_memo_list->d_no }}
            </a>
          </p>
          @endif --}}
        </div>
        <p class="w-full text-xs text-gray-500 font-mono text-end">
          No.F-{{ $release_memo_list->id }}
        </p>
      </div>
    </div>
    @endforeach
    {{-- ページネーション --}}
    <div class="mt-12">
      <div class="block md:hidden">
        {{ $release_memo_lists->onEachSide(0)->links('vendor.pagination.tailwind2') }}
      </div>
      <div class="md:block lg:hidden">
        {{ $release_memo_lists->onEachSide(1)->links('vendor.pagination.tailwind3') }}
      </div>
      <div class="lg:block hidden">
        {{ $release_memo_lists->onEachSide(2)->links('vendor.pagination.tailwind3') }}
      </div>
    </div>
    {{-- MENU --}}
    @if ($memocount >= 30)
    <div class="my-12 md:mr-8 z-0">
      <ul class="flex flex-wrap px-5 text-center font-mono text-gray-800 justify-center md:justify-start">
        <li
          class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
          <a href="{{ route('fvideo.show', [ 'id' => $videoid->content_id ]) }}"
            class="pt-1 absolute top-0 left-0 w-full h-full">詳細ページへ</a>
        </li>
        <li
          class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
          <a href="{{ route('fmemo.memoListLatest', [ 'content_id' => $videoid->content_id ]) }}"
            class="pt-1 absolute top-0 left-0 w-full h-full">最新の50件</a>
        </li>
        <li
          class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
          <a href="{{ route('fmemo.memoListSort', [ 'content_id' => $videoid->content_id, 'sort' => 'oldest' ]) }}"
            class="pt-1 absolute top-0 left-0 w-full h-full">はじめから全部</a>
        </li>
        <li
          class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
          <a href="{{ route('fmemo.memoListSort', [ 'content_id' => $videoid->content_id, 'sort' => 'latest' ]) }}"
            class="pt-1 absolute top-0 left-0 w-full h-full">おわりから全部</a>
        </li>
        <li class="h-9 w-1/2 md:w-40 py-1 text-white border-2 border-gray-400 bg-red-500">
          100件ずつ見る
        </li>
        <li
          class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
          <a href="<?php echo 'https://al.dmm.co.jp/?lurl=https%3A%2F%2Fwww.dmm.co.jp%2Fdigital%2Fvideoa%2F-%2Fdetail%2F%3D%2Fcid%3D' . $videoid->content_id . '%2F&af_id=maxjpblog-017&ch=link_tool&ch_id=text'; ?>"
            rel="nofollow" target="_blank" class="pt-1 absolute top-0 left-0 w-full h-full">FANZAで見る</a>
        </li>
      </ul>
    </div>
    @endif
    <!-- 最近のメモ動画 -->
    <div class="flex flex-wrap mt-8 mb-6 md:mr-8 border-b-4 border-gray-500 items-center justify-between">
      <h2 class="ml-3 mb-1 text-xl font-bold">最近メモされた動画</h2>
      <a href="{{ route('fmemo.memoAll') }}" class="px-6 text-blue-500 hover:underline hover:text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd"
            d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
          <path fill-rule="evenodd"
            d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
        </svg>
        一覧で見る
      </a>
    </div>
    <div class="flex flex-wrap justify-center md:justify-start">
      @foreach ($releaselists as $releaselist)
      <div class="m-2">
        <a href="{{ route('fvideo.show', [ 'id' => $releaselist->content_id ]) }}">
          <img
            src="<?php echo 'https://pics.dmm.co.jp/digital/video/' . $releaselist->content_id . '/' . $releaselist->content_id . 'ps.jpg'; ?>"
            alt="【FANZA】<?php echo $releaselist->fanza->title ?>のジャケット画像" class="w-32">
        </a>
      </div>
      @endforeach
    </div>
    {{-- BBS --}}
    <div class="flex flex-wrap mt-12 mb-4 md:mr-8 border-b-4 border-gray-500 items-center justify-between">
      <h2 class="ml-3 mb-1 text-xl font-bold">BBS</h2>
      <a href="{{ route('bbs') }}" class="ml-auto px-6 text-blue-500 hover:underline hover:text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd"
            d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
          <path fill-rule="evenodd"
            d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
        </svg>
        スレッド一覧
      </a>
    </div>
    <ul class="mx-3 list-disc list-inside space-y-3">
      @foreach ($threads as $thread)
      <li class="whitespace-pre-line break-all"><a href="{{ route('threads.show', [ 'id' => $thread->id ]) }}"
          class="font-mono text-blue-500 hover:underline hover:text-red-500"><?php echo $thread->title ?></a></li>
      @endforeach
    </ul>
</x-app>