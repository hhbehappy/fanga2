<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <aside class="hidden md:flex flex-col w-[160px] shrink-0 bg-white border-4 border-black mx-8 mb-10">
    <div class="flex flex-col space-y-1">
      <h1 class="pb-1 pl-3 text-lg text-left text-gray-300 font-bold bg-black">FANZA</h1>
      <h2 class="py-2 pl-3 text-left text-red-500 font-bold">ジャンル</h2>
      <a :href="route('fanzavideo.show', { keyword: 'アイドル・芸能人' })" class="text-blue-500 text-sm pl-3">アイドル・芸能人</a>
      <a :href="route('fanzavideo.show', { keyword: '中出し' })" class="text-blue-500 text-sm pl-3">中出し</a>
      <a :href="route('fanzavideo.show', { keyword: 'ギャル' })" class="text-blue-500 text-sm pl-3">ギャル</a>
      <a :href="route('fanzavideo.show', { keyword: 'エステ' })" class="text-blue-500 text-sm pl-3">エステ</a>
      <a :href="route('fanzavideo.show', { keyword: 'オタク' })" class="text-blue-500 text-sm pl-3">オタク</a>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('fanzavideo.genre')" class="">ジャンル一覧</Link>
      </p>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
        <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">女優</h2>
        <a :href="route('fanzavideo.show', { keyword: '伊藤舞雪' })" class="text-blue-500 text-sm pl-3">伊藤舞雪</a>
        <a :href="route('fanzavideo.show', { keyword: '小宵こなん' })" class="text-blue-500 text-sm pl-3">小宵こなん</a>
        <a :href="route('fanzavideo.show', { keyword: '桃乃木かな' })" class="text-blue-500 text-sm pl-3">桃乃木かな</a>
        <a :href="route('fanzavideo.show', { keyword: '三上悠亜' })" class="text-blue-500 text-sm pl-3">三上悠亜</a>
        <a :href="route('fanzavideo.show', { keyword: '森玲奈' })" class="text-blue-500 text-sm pl-3">森玲奈</a>
        <p class="text-xs text-blue-500 text-right mr-2 py-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('fanzavideo.actress')" class="">女優一覧</Link>
        </p>
      </div>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
        <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">メーカー</h2>
        <a :href="route('fanzavideo.show', { keyword: 'アイデアポケット' })" class="text-blue-500 text-sm pl-3">アイデアポケット</a>
        <a :href="route('fanzavideo.show', { keyword: 'kawaii' })" class="text-blue-500 text-sm pl-3">kawaii</a>
        <a :href="route('fanzavideo.show', { keyword: 'Hunter' })" class="text-blue-500 text-sm pl-3">Hunter</a>
        <a :href="route('fanzavideo.show', { keyword: 'BAZOOKA' })" class="text-blue-500 text-sm pl-3">BAZOOKA</a>
        <a :href="route('fanzavideo.show', { keyword: 'SODクリエイト' })" class="text-blue-500 text-sm pl-3">SODクリエイト</a>
        <p class="text-xs text-blue-500 text-right mr-2 py-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('fanzavideo.maker')" class="">メーカー一覧</Link>
        </p>
      </div>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
        <h2 class="py-2 pl-3 text-left text-red-500 font-bold">シリーズ</h2>
        <a :href="route('fanzavideo.show', { keyword: 'ホイホイぱんち' })" class="text-blue-500 text-sm pl-3">ホイホイぱんち</a>
        <a :href="route('fanzavideo.show', { keyword: 'ハンターブラック' })" class="text-blue-500 text-sm pl-3">ハンターブラック</a>
        <a :href="route('fanzavideo.show', { keyword: 'kawaii*ベスト' })" class="text-blue-500 text-sm pl-3">kawaii*ベスト</a>
        <a :href="route('fanzavideo.show', { keyword: 'ギャルすたグラム' })" class="text-blue-500 text-sm pl-3">ギャルすたグラム</a>
        <a :href="route('fanzavideo.show', { keyword: '本中デビュー' })" class="text-blue-500 text-sm pl-3">本中デビュー</a>
        <p class="text-xs text-blue-500 text-right mr-2 py-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('fanzavideo.series')" class="">シリーズ一覧</Link>
        </p>
      </div>
      <div class="flex flex-col py-3 border-t-2 border-gray-400 space-y-1">
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <a :href="route('dugappv.index')" class="">DUGA</a>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('mypage')" class="">マイページ</Link>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('inquiry')" class="">お問い合わせ</Link>
        </p>
      </div>
    </div>
  </aside>
</template>
