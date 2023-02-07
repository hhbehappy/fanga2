<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <aside class="hidden md:flex flex-col w-[160px] shrink-0 bg-white border-4 border-black mx-8 mb-10">
    <div class="flex flex-col space-y-1">
      <p class="pb-1 pl-3 text-left text-gray-300 font-bold bg-black">MENU</p>
      <h1 class="pt-2 pl-3 text-left text-red-500 font-bold text-xl">FANZA</h1>
      <h2 class="pl-3 text-left text-gray-700 font-bold">ジャンル</h2>
      <a :href="route('flist.show', { keyword: 'アイドル・芸能人' })" class="text-blue-500 text-sm pl-3">アイドル・芸能人</a>
      <a :href="route('flist.show', { keyword: '中出し' })" class="text-blue-500 text-sm pl-3">中出し</a>
      <a :href="route('flist.show', { keyword: 'ギャル' })" class="text-blue-500 text-sm pl-3">ギャル</a>
      <a :href="route('flist.show', { keyword: 'エステ' })" class="text-blue-500 text-sm pl-3">エステ</a>
      <a :href="route('flist.show', { keyword: 'オタク' })" class="text-blue-500 text-sm pl-3">オタク</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('flist.genre')" class="">ジャンル一覧</Link>
      </p>
      <h2 class="pl-3 text-left text-gray-700 font-bold">女優</h2>
      <a :href="route('flist.show', { keyword: '伊藤舞雪' })" class="text-blue-500 text-sm pl-3">伊藤舞雪</a>
      <a :href="route('flist.show', { keyword: '小宵こなん' })" class="text-blue-500 text-sm pl-3">小宵こなん</a>
      <a :href="route('flist.show', { keyword: '桃乃木かな' })" class="text-blue-500 text-sm pl-3">桃乃木かな</a>
      <a :href="route('flist.show', { keyword: '三上悠亜' })" class="text-blue-500 text-sm pl-3">三上悠亜</a>
      <a :href="route('flist.show', { keyword: '森玲奈' })" class="text-blue-500 text-sm pl-3">森玲奈</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('flist.actress')" class="">女優一覧</Link>
      </p>
      <h2 class="pl-3 text-left text-gray-700 font-bold">メーカー</h2>
      <a :href="route('flist.show', { keyword: 'アイデアポケット' })" class="text-blue-500 text-sm pl-3">アイデアポケット</a>
      <a :href="route('flist.show', { keyword: 'kawaii' })" class="text-blue-500 text-sm pl-3">kawaii</a>
      <a :href="route('flist.show', { keyword: 'Hunter' })" class="text-blue-500 text-sm pl-3">Hunter</a>
      <a :href="route('flist.show', { keyword: 'BAZOOKA' })" class="text-blue-500 text-sm pl-3">BAZOOKA</a>
      <a :href="route('flist.show', { keyword: 'SODクリエイト' })" class="text-blue-500 text-sm pl-3">SODクリエイト</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('flist.maker')" class="">メーカー一覧</Link>
      </p>
      <h2 class="pl-3 text-left text-gray-700 font-bold">シリーズ</h2>
      <a :href="route('flist.show', { keyword: 'ホイホイぱんち' })" class="text-blue-500 text-sm pl-3">ホイホイぱんち</a>
      <a :href="route('flist.show', { keyword: 'ハンターブラック' })" class="text-blue-500 text-sm pl-3">ハンターブラック</a>
      <a :href="route('flist.show', { keyword: 'kawaii*ベスト' })" class="text-blue-500 text-sm pl-3">kawaii*ベスト</a>
      <a :href="route('flist.show', { keyword: 'ギャルすたグラム' })" class="text-blue-500 text-sm pl-3">ギャルすたグラム</a>
      <a :href="route('flist.show', { keyword: '本中デビュー' })" class="text-blue-500 text-sm pl-3">本中デビュー</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('flist.series')" class="">シリーズ一覧</Link>
      </p>
    </div>
    <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h1 class="pl-3 text-left text-red-500 font-bold text-xl">DUGA</h1>
      <h2 class="pl-3 text-left text-gray-700 font-bold">カテゴリ</h2>
      <a :href="route('dugappv.show', { keyword: 'アイドル' })" class="text-blue-500 text-sm pl-3">アイドル</a>
      <a :href="route('dugappv.show', { keyword: '素人' })" class="text-blue-500 text-sm pl-3">素人</a>
      <a :href="route('dugappv.show', { keyword: 'フェチ' })" class="text-blue-500 text-sm pl-3">フェチ</a>
      <a :href="route('dugappv.show', { keyword: 'オナニー' })" class="text-blue-500 text-sm pl-3">オナニー</a>
      <a :href="route('dugappv.show', { keyword: '盗撮' })" class="text-blue-500 text-sm pl-3">盗撮</a>
      <p class="text-xs text-blue-500 text-right mr-2 my-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
        <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
      </svg>
      <Link :href="route('dugappv.category')">カテゴリ一覧</Link>
      </p>
      <h2 class="pl-3 text-left text-gray-700 font-bold">女優</h2>
      <a :href="route('dugappv.show', { keyword: '鈴木柚香' })" class="text-blue-500 text-sm pl-3">鈴木柚香</a>
      <a :href="route('dugappv.show', { keyword: '西沢千佳' })" class="text-blue-500 text-sm pl-3">西沢千佳</a>
      <a :href="route('dugappv.show', { keyword: '里見千春' })" class="text-blue-500 text-sm pl-3">里見千春</a>
      <a :href="route('dugappv.show', { keyword: '美らかのん' })" class="text-blue-500 text-sm pl-3">美らかのん</a>
      <a :href="route('dugappv.show', { keyword: '姫川ゆうな' })" class="text-blue-500 text-sm pl-3">姫川ゆうな</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('dugappv.performer')" class="">女優一覧</Link>
      </p>
      <h2 class="pl-3 text-left text-gray-700 font-bold">メーカー</h2>
      <a :href="route('dugappv.show', { keyword: 'SCRUM' })" class="text-blue-500 text-sm pl-3">SCRUM</a>
      <a :href="route('dugappv.show', { keyword: 'PETERS' })" class="text-blue-500 text-sm pl-3">PETERS</a>
      <a :href="route('dugappv.show', { keyword: 'MBM' })" class="text-blue-500 text-sm pl-3">MBM</a>
      <a :href="route('dugappv.show', { keyword: 'Spice Visual' })" class="text-blue-500 text-sm pl-3">Spice Visual</a>
      <a :href="route('dugappv.show', { keyword: 'ファーストスター' })" class="text-blue-500 text-sm pl-3">ファーストスター</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('dugappv.maker')" class="">メーカー一覧</Link>
      </p>
      <h2 class="pl-3 text-left text-gray-700 font-bold">シリーズ</h2>
      <a :href="route('dugappv.show', { keyword: 'コスって！恋して！' })" class="text-blue-500 text-sm pl-3">コスって！恋して！</a>
      <a :href="route('dugappv.show', { keyword: 'ごっくん伝説！' })" class="text-blue-500 text-sm pl-3">ごっくん伝説！</a>
      <a :href="route('dugappv.show', { keyword: '痴漢記録日記' })" class="text-blue-500 text-sm pl-3">痴漢記録日記</a>
      <a :href="route('dugappv.show', { keyword: '新＊美少女のアナル' })" class="text-blue-500 text-sm pl-3">新＊美少女のアナル</a>
      <a :href="route('dugappv.show', { keyword: 'キミの美尻に恋してる' })" class="text-blue-500 text-sm pl-3">キミの美尻に恋してる</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('dugappv.series')" class="">シリーズ一覧</Link>
      </p>
    </div>
    <div class="flex flex-col mt-3 py-3 border-t-2 border-gray-400">
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('login')" class="">ログイン</Link>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('mypage')" class="">マイページ</Link>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800 space-y-1">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('bbs.index')" class="">BBS</Link>
        </p>
      </div>
  </aside>
</template>
