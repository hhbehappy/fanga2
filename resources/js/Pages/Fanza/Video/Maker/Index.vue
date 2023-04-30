<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  makerlists: Object
})
</script>

<template>
  <Head :title="'【FANZA】AVメーカー一覧 : 人気AVメーカー'" />

  <Layout>

    <section class="">
      <div class="flex flex-wrap mb-5 text-white font-mono">
        <a :href="route('flist.maker_all')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
          全AVメーカー
        </a>
        <Link :href="route('flist.maker_memo')"
          class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        メモの多い順
        </Link>
        <Link :href="route('flist.maker_nice')"
          class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        気になる動画の登録数順
        </Link>
        <div class="h-8 ml-2">
          <form :action="route('flist.maker_search')" method="GET">
            <input type="text" name="keyword" placeholder="AVメーカー"
              class="w-48 h-8 pb-2.5 -mr-2.5 text-black leading-5 rounded-l-lg" required>
            <input type="submit" value="検索" class="h-8 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
          </form>
        </div>
      </div>
      <div class="border-b-4 border-gray-500 mb-4">
        <h1 class="font-bold md:text-xl"><span class="text-red-500">【FANZA】</span>AVメーカー一覧 : 人気AVメーカー</h1>
      </div>
      <div class="flex flex-wrap ml-4 md:mx-2 justify-center sm:justify-start">
        <div v-for="makerlist in makerlists" :key="makerlist.id">
          <div v-if="makerlist.maker" class="w-36 mr-5 md:mr-2 mb-4">
            <a :href="route('flist.show', { sort: 'maker', keyword: makerlist.maker })"
              class="p-2 border-2 text-blue-500 text-center inline-block">
              <img
                :src="'https://pics.dmm.co.jp/digital/video/' + makerlist.content_id  + '/' + makerlist.content_id + 'ps.jpg'"
                :alt="'【FANZA】' + makerlist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ makerlist.maker }}</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</Layout></template>