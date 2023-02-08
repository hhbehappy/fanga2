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
  <Head :title="'【DUGA】メーカー一覧'" />

  <div class="">
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>メーカー一覧 : メモの多い動画順</h1>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="makerlist in makerlists" :key="makerlist.id">
        <div v-if="makerlist.maker" class="w-36 mr-1 mb-4">
          <a :href="route('dlist.show', { keyword: makerlist.maker })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img v-if="makerlist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + makerlist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + makerlist.title" class="h-40">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + makerlist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + makerlist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ makerlist.maker }}</span>
          </a>
        </div>
      </div>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h2 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>メーカー一覧 : 気になる動画の登録数順</h2>
    </div>
    <div class="flex flex-wrap mx-7 md:mx-1">
      <div v-for="makernicelist in makernicelists" :key="makernicelist.id">
        <div v-if="makernicelist.newvideo_id === 'duga' && makernicelist.maker" class="w-40 mr-3 mb-4">
          <a :href="route('dlist.show', { keyword: makernicelist.maker })" class="p-3 border-2 text-blue-500 text-center inline-block">
            <img v-if="makernicelist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + makernicelist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + makernicelist.title" class="h-44 w-32">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + makernicelist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + makernicelist.title + 'のメイン画像'" class="h-44 w-32">
            <span class="w-32 -mb-2 text-sm inline-block truncate">{{ makernicelist.maker }}</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>
