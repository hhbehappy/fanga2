<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
  <section>
    <div class="my-8 mx-auto border-b-4 border-gray-500">
      <h2 class="ml-3 mb-1 text-xl font-bold">配信サイト『FANZA』</h2>
    </div>
    <div class="flex flex-wrap mb-5 text-white font-mono">
      <a :href="route('fmemo.memoAll')" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        メモされた動画一覧
      </a>
      <a :href="route('flist.index')" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        全動画一覧
      </a>
      <Link :href="route('flist.genre')" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
      ジャンル一覧
      </Link>
      <Link :href="route('flist.actress')" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
      女優一覧
      </Link>
      <Link :href="route('flist.maker')" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
      メーカー一覧
      </Link>
      <Link :href="route('flist.series')" class="flex py-1 px-6 mx-2 mb-3 bg-gray-800 hover:bg-red-600 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
      シリーズ一覧
      </Link>
    </div>
  </section>
</template>