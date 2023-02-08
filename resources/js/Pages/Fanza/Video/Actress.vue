<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
  actresslists: Object,
  actressnicelists: Object
})
</script>

<template>
<Layout>
  <Head :title="'【FANZA】女優一覧'" />

  <div class="">
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>女優一覧 : メモの多い動画順</h1>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="actresslist in actresslists" :key="actresslist.id">
        <div v-if="actresslist.actress" class="w-36 mr-2 mb-4">
          <a :href="route('flist.show', { keyword: actresslist.actress })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + actresslist.content_id  + '/' + actresslist.content_id + 'ps.jpg'" :alt="'【FANZA】' + actresslist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ actresslist.actress }}</span>
          </a>
        </div>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h2 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>女優一覧 : 気になる動画の登録数順</h2>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="actressnicelist in actressnicelists" :key="actressnicelist.id">
        <div v-if="actressnicelist.type === 'fanza' && actressnicelist.actress" class="w-36 mr-2 mb-4">
          <a :href="route('flist.show', { keyword: actressnicelist.actress })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + actressnicelist.content_id  + '/' + actressnicelist.content_id + 'ps.jpg'" :alt="'【FANZA】' + actressnicelist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ actressnicelist.actress }}</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>