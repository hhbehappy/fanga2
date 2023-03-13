<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  serieslists: Object
})
</script>

<template>
<Layout>
  <Head :title="'【DUGA】シリーズ一覧'" />

  <section class="">
    <div class="flex flex-wrap mb-5 text-white font-mono">
      <Link :href="route('dlist.series_memo')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        公開メモの多い順
      </Link>
      <Link :href="route('dlist.series_nice')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        気になる動画の登録数順
      </Link>
    </div>
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold md:text-xl"><span class="text-red-500">【DUGA】</span>シリーズ一覧</h1>
    </div>
    <div class="flex flex-wrap ml-4 md:mx-2 justify-center sm:justify-start">
      <div v-for="serieslist in serieslists" :key="serieslist.id">
        <div v-if="serieslist.series" class="w-36 mr-5 md:mr-1 mb-4">
          <a :href="route('dlist.show', { keyword: serieslist.series })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img v-if="serieslist.jacketimage" :src="serieslist.jacketimage" :alt="'【DUGA】' + serieslist.title" class="h-40 w-28">
            <img v-else :src="serieslist.posterimage" :alt="'【DUGA】' + serieslist.title + 'のメイン画像'" class="h-40 w-28">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ serieslist.series }}</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</Layout>
</template>
