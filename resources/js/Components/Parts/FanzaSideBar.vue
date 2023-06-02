<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
  <div class="hidden md:flex flex-col md:w-[140px] lg:w-[160px] shrink-0 bg-white border-4 border-black mx-4 lg:mx-8 mb-10">
    <div class="flex flex-col space-y-1">
      <h1 class="pb-1 pl-3 text-lg text-left text-gray-300 font-bold bg-black">FANZA</h1>
      <h2 class="py-2 pl-3 text-left text-red-500 font-bold">ジャンル</h2>
      <ul class="text-blue-500 text-sm space-y-1">
        <li v-for="fanzasidegenre in $page.props.sidebar.fanzagenre" :key="fanzasidegenre.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <a :href="route('flist.show', { sort: 'genre', keyword: fanzasidegenre })" class="py-1 px-3 block w-full h-full">
            {{ fanzasidegenre }}
          </a>
        </li>
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('flist.genre')" class="hover:bg-red-50 hover:border-y-2 border-red-200">ジャンル一覧</Link>
      </p>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
        <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">女優</h2>
        <ul class="text-blue-500 text-sm space-y-1">
          <li v-for="fanzasideactress in $page.props.sidebar.fanzaactress" :key="fanzasideactress.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
            <a :href="route('flist.show', { sort: 'actress', keyword: fanzasideactress.actress })" class="py-1 px-3 block w-full h-full">
              {{ fanzasideactress.actress }}
            </a>
          </li>
        </ul>
        <p class="text-xs text-blue-500 text-right mr-2 py-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('flist.actress')" class="hover:bg-red-50 hover:border-y-2 border-red-200">女優一覧</Link>
        </p>
      </div>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
        <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">メーカー</h2>
        <ul class="text-blue-500 text-sm space-y-1">
          <li v-for="fanzasidemaker in $page.props.sidebar.fanzamaker" :key="fanzasidemaker.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
            <a :href="route('flist.show', { sort: 'maker', keyword: fanzasidemaker.maker })" class="py-1 px-3 block w-full h-full">
              {{ fanzasidemaker.maker }}
            </a>
          </li>
        </ul>
        <p class="text-xs text-blue-500 text-right mr-2 py-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('flist.maker')" class="hover:bg-red-50 hover:border-y-2 border-red-200">メーカー一覧</Link>
        </p>
      </div>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
        <h2 class="py-2 pl-3 text-left text-red-500 font-bold">シリーズ</h2>
        <ul class="text-blue-500 text-sm space-y-1">
          <li v-for="fanzasideseries in $page.props.sidebar.fanzaseries" :key="fanzasideseries.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
            <a :href="route('flist.show', { sort: 'series', keyword: fanzasideseries.series })" class="py-1 px-3 block w-full h-full">
              {{ fanzasideseries.series }}
            </a>
          </li>
        </ul>
        <p class="text-xs text-blue-500 text-right mr-2 py-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('flist.series')" class="hover:bg-red-50 hover:border-y-2 border-red-200">シリーズ一覧</Link>
        </p>
      </div>
      <div class="flex flex-col py-3 text-blue-500 border-t-2 border-gray-400 space-y-1">
        <a :href="route('dlist.index')" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          DUGA
        </a>
        <Link :href="route('mypage')" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          マイページ
        </Link>
        <Link :href="route('bbs')" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800 space-y-1">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          BBS
        </Link>
      </div>
    </div>
  </div>
</template>
