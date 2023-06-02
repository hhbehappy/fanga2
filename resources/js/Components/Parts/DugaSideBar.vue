<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="hidden md:flex flex-col md:w-[140px] lg:w-[160px] shrink-0 bg-white border-4 border-black mx-4 lg:mx-8 mb-10">
    <div class="flex flex-col space-y-1">
      <h1 class="pb-1 pl-3 text-lg text-left text-gray-300 font-bold bg-black">DUGA</h1>
      <h2 class="py-2 pl-3 text-left text-red-500 font-bold">カテゴリ</h2>
      <ul class="text-blue-500 text-sm space-y-1">
        <li v-for="dugasidecategory in $page.props.sidebar.dugacategory" :key="dugasidecategory.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <a :href="route('dlist.show', { sort: 'category', keyword: dugasidecategory })" class="py-1 px-3 block w-full h-full">
            {{ dugasidecategory }}
          </a>
        </li>
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 my-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
        <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
      </svg>
      <Link :href="route('dlist.category')" class="hover:bg-red-50 hover:border-y-2 border-red-200">カテゴリ一覧</Link>
      </p>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">女優</h2>
      <ul class="text-blue-500 text-sm space-y-1">
        <li v-for="dugasideperformer in $page.props.sidebar.dugaperformer" :key="dugasideperformer.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <a :href="route('dlist.show', { sort: 'performer', keyword: dugasideperformer.performer })" class="py-1 px-3 block w-full h-full">
            {{ dugasideperformer.performer }}
          </a>
        </li>
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('dlist.performer')" class="hover:bg-red-50 hover:border-y-2 border-red-200">女優一覧</Link>
      </p>
      </div>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">メーカー</h2>
      <ul class="text-blue-500 text-sm space-y-1">
        <li v-for="dugasidemaker in $page.props.sidebar.dugamaker" :key="dugasidemaker.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <a :href="route('dlist.show', { sort: 'maker', keyword: dugasidemaker.maker })" class="py-1 px-3 block w-full h-full">
            {{ dugasidemaker.maker }}
          </a>
        </li>
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('dlist.maker')" class="hover:bg-red-50 hover:border-y-2 border-red-200">メーカー一覧</Link>
      </p>
      </div>
      <div class="flex flex-col pt-2 border-t-2 border-gray-400 space-y-1">
      <h2 class="pb-2 pl-3 text-left text-red-500 font-bold">シリーズ</h2>
      <ul class="text-blue-500 text-sm space-y-1">
        <li v-for="dugasideseries in $page.props.sidebar.dugaseries" :key="dugasideseries.id" class="hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <a :href="route('dlist.show', { sort: 'series', keyword: dugasideseries.series })" class="py-1 px-3 block w-full h-full">
            {{ dugasideseries.series }}
          </a>
        </li>
      </ul>
      <p class="text-xs text-blue-500 text-right mr-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        <Link :href="route('dlist.series')" class="hover:bg-red-50 hover:border-y-2 border-red-200">シリーズ一覧</Link>
      </p>
      </div>
      <div class="flex flex-col py-3 border-t-2 border-gray-400 text-blue-500">
        <a :href="route('flist.index')" class="pl-3 hover:underline hover:bg-red-50 hover:border-y-2 border-red-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          FANZA
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
