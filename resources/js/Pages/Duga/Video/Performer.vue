<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
  performerlists: Object,
  performernicelists: Object
})
</script>

<template>
<Layout>
  <Head :title="'【DUGA】女優一覧'" />

  <div class="">
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>女優一覧 : メモの多い動画順</h1>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="performerlist in performerlists" :key="performerlist.id">
        <div v-if="performerlist.performer" class="w-36 mr-1 mb-4">
          <a :href="route('dlist.show', { keyword: performerlist.performer })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <span class="w-28 inline-block truncate">{{ performerlist.performer }}</span>
            <img v-if="performerlist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + performerlist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + performerlist.title" class="h-40">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + performerlist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + performerlist.title + 'のメイン画像'" class="h-40">
          </a>
        </div>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h2 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>女優一覧 : 気になる動画の登録数順</h2>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="performernicelist in performernicelists" :key="performernicelist.id">
        <div v-if="performernicelist.newvideo_id === 'duga' && performernicelist.performer" class="w-40 mr-3 mb-4">
          <a :href="route('dlist.show', { keyword: performernicelist.performer })" class="p-3 border-2 text-blue-500 text-center inline-block">
            <span class="w-32 inline-block truncate">{{ performernicelist.performer }}</span>
            <img v-if="performernicelist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + performernicelist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + performernicelist.title" class="h-44 w-32">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + performernicelist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + performernicelist.title + 'のメイン画像'" class="h-44 w-32">
          </a>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>
