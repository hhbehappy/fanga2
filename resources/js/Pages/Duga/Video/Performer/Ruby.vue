<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
<Layout>
  <Head :title="'【DUGA】AV女優一覧 : 50音順'" />

  <section class="">
    <div class="flex flex-wrap mb-5 text-white font-mono">
      <Link :href="route('dlist.performer')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        AV女優一覧
      </Link>
      <Link :href="route('dlist.performer_memo')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        公開メモの多い順
      </Link>
      <Link :href="route('dlist.performer_nice')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        気になる動画の登録数順
      </Link>
    </div>
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold md:text-xl"><span class="text-red-500">【DUGA】</span>AV女優一覧 : 50音順</h1>
    </div>
    <!-- 50音順 -->
    <div class="flex flex-wrap mb-7 font-mono text-gray-800 justify-center md:justify-start">
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'a', keyword: 'a' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">あ</Link>
        <Link :href="route('dlist.performer_name', { line: 'a', keyword: 'i' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">い</Link>
        <Link :href="route('dlist.performer_name', { line: 'a', keyword: 'u' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">う</Link>
        <Link :href="route('dlist.performer_name', { line: 'a', keyword: 'e' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">え</Link>
        <Link :href="route('dlist.performer_name', { line: 'a', keyword: 'o' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">お</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'ka', keyword: 'ka' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">か</Link>
        <Link :href="route('dlist.performer_name', { line: 'ka', keyword: 'ki' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">き</Link>
        <Link :href="route('dlist.performer_name', { line: 'ka', keyword: 'ku' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">く</Link>
        <Link :href="route('dlist.performer_name', { line: 'ka', keyword: 'ke' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">け</Link>
        <Link :href="route('dlist.performer_name', { line: 'ka', keyword: 'ko' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">こ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'sa', keyword: 'sa' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">さ</Link>
        <Link :href="route('dlist.performer_name', { line: 'sa', keyword: 'si' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">し</Link>
        <Link :href="route('dlist.performer_name', { line: 'sa', keyword: 'su' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">す</Link>
        <Link :href="route('dlist.performer_name', { line: 'sa', keyword: 'se' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">せ</Link>
        <Link :href="route('dlist.performer_name', { line: 'sa', keyword: 'so' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">そ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'ta', keyword: 'ta' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">た</Link>
        <Link :href="route('dlist.performer_name', { line: 'ta', keyword: 'ti' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ち</Link>
        <Link :href="route('dlist.performer_name', { line: 'ta', keyword: 'tu' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">つ</Link>
        <Link :href="route('dlist.performer_name', { line: 'ta', keyword: 'te' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">て</Link>
        <Link :href="route('dlist.performer_name', { line: 'ta', keyword: 'to' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">と</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'na', keyword: 'na' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">な</Link>
        <Link :href="route('dlist.performer_name', { line: 'na', keyword: 'ni' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">に</Link>
        <Link :href="route('dlist.performer_name', { line: 'na', keyword: 'nu' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ぬ</Link>
        <Link :href="route('dlist.performer_name', { line: 'na', keyword: 'ne' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ね</Link>
        <Link :href="route('dlist.performer_name', { line: 'na', keyword: 'no' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">の</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'ha', keyword: 'ha' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">は</Link>
        <Link :href="route('dlist.performer_name', { line: 'ha', keyword: 'hi' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ひ</Link>
        <Link :href="route('dlist.performer_name', { line: 'ha', keyword: 'hu' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ふ</Link>
        <Link :href="route('dlist.performer_name', { line: 'ha', keyword: 'he' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">へ</Link>
        <Link :href="route('dlist.performer_name', { line: 'ha', keyword: 'ho' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ほ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'ma', keyword: 'ma' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ま</Link>
        <Link :href="route('dlist.performer_name', { line: 'ma', keyword: 'mi' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">み</Link>
        <Link :href="route('dlist.performer_name', { line: 'ma', keyword: 'mu' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">む</Link>
        <Link :href="route('dlist.performer_name', { line: 'ma', keyword: 'me' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">め</Link>
        <Link :href="route('dlist.performer_name', { line: 'ma', keyword: 'mo' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">も</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'ya', keyword: 'ya' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">や</Link>
        <Link :href="route('dlist.performer_name', { line: 'ya', keyword: 'yu' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ゆ</Link>
        <Link :href="route('dlist.performer_name', { line: 'ya', keyword: 'yo' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">よ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'ra', keyword: 'ra' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ら</Link>
        <Link :href="route('dlist.performer_name', { line: 'ra', keyword: 'ri' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">り</Link>
        <Link :href="route('dlist.performer_name', { line: 'ra', keyword: 'ru' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">る</Link>
        <Link :href="route('dlist.performer_name', { line: 'ra', keyword: 're' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">れ</Link>
        <Link :href="route('dlist.performer_name', { line: 'ra', keyword: 'ro' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ろ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('dlist.performer_name', { line: 'wa', keyword: 'wa' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">わ</Link>
      </div>
    </div>
  </section>
</Layout>
</template>
