<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
  makerlists: Object,
  makernicelists: Object
})
</script>

<template>
<Layout>
  <Head :title="'【FANZA】メーカー一覧'" />

  <div class="">
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>メーカー一覧 : メモの多い動画順</h1>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="makerlist in makerlists" :key="makerlist.id">
        <div v-if="makerlist.maker" class="w-36 mr-2 mb-4">
          <a :href="route('flist.show', { keyword: makerlist.maker })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <span class="w-28 inline-block truncate">{{ makerlist.maker }}</span>
            <img :src="'https://pics.dmm.co.jp/digital/video/' + makerlist.content_id  + '/' + makerlist.content_id + 'ps.jpg'" :alt="'【FANZA】' + makerlist.title + 'のメイン画像'" class="h-40">
          </a>
        </div>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h2 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>メーカー一覧 : 気になる動画の登録数順</h2>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="makernicelist in makernicelists" :key="makernicelist.id">
        <div v-if="makernicelist.type === 'fanza' && makernicelist.maker" class="w-36 mr-2 mb-4">
          <a :href="route('flist.show', { keyword: makernicelist.maker })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <span class="w-28 inline-block truncate">{{ makernicelist.maker }}</span>
            <img :src="'https://pics.dmm.co.jp/digital/video/' + makernicelist.content_id  + '/' + makernicelist.content_id + 'ps.jpg'" :alt="'【FANZA】' + makernicelist.title + 'のメイン画像'" class="h-40">
          </a>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>