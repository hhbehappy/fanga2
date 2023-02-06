<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
  serieslists: Object,
  seriesnicelists: Object
})
</script>

<template>
<Layout>
  <Head :title="'【FANZA】シリーズ一覧'" />

  <div class="">
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>シリーズ一覧 : メモの多い動画順</h1>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="serieslist in serieslists" :key="serieslist.id">
        <div v-if="serieslist.series" class="w-40 mr-3 mb-4">
          <a :href="route('flist.show', { keyword: serieslist.series })" class="p-3 border-2 text-blue-500 text-center inline-block">
            <span class="w-32 inline-block truncate">{{ serieslist.series }}</span>
            <img :src="'https://pics.dmm.co.jp/digital/video/' + serieslist.content_id  + '/' + serieslist.content_id + 'ps.jpg'" :alt="'【FANZA】' + serieslist.title + 'のメイン画像'" class="h-44">
          </a>
        </div>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h2 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>シリーズ一覧 : 気になる動画の登録数順</h2>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="seriesnicelist in seriesnicelists" :key="seriesnicelist.id">
        <div v-if="seriesnicelist.newvideo_id === 'fanza' && seriesnicelist.series" class="w-40 mr-3 mb-4">
          <a :href="route('flist.show', { keyword: seriesnicelist.series })" class="p-3 border-2 text-blue-500 text-center inline-block">
            <span class="w-32 inline-block truncate">{{ seriesnicelist.series }}</span>
            <img :src="'https://pics.dmm.co.jp/digital/video/' + seriesnicelist.content_id  + '/' + seriesnicelist.content_id + 'ps.jpg'" :alt="'【FANZA】' + seriesnicelist.title + 'のメイン画像'" class="h-44">
          </a>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>