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
  <Head :title="'【DUGA】シリーズ一覧'" />

  <div class="">
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>シリーズ一覧 : メモの多い動画順</h1>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="serieslist in serieslists" :key="serieslist.id">
        <div v-if="serieslist.series" class="w-36 mr-1 mb-4">
          <a :href="route('dlist.show', { keyword: serieslist.series })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img v-if="serieslist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + serieslist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + serieslist.title" class="h-40">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + serieslist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + serieslist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ serieslist.series }}</span>
          </a>
        </div>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h2 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>シリーズ一覧 : 気になる動画の登録数順</h2>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="seriesnicelist in seriesnicelists" :key="seriesnicelist.id">
        <div v-if="seriesnicelist.newvideo_id === 'duga' && seriesnicelist.series" class="w-40 mr-3 mb-4">
          <a :href="route('dlist.show', { keyword: seriesnicelist.series })" class="p-3 border-2 text-blue-500 text-center inline-block">
            <img v-if="seriesnicelist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + seriesnicelist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + seriesnicelist.title" class="h-44 w-32">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + seriesnicelist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + seriesnicelist.title + 'のメイン画像'" class="h-44 w-32">
            <span class="w-32 -mb-2 text-sm inline-block truncate">{{ seriesnicelist.series }}</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>
