<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  actressnicelists: Object
})
</script>

<template>
<Layout>
  <Head :title="'【FANZA】AV女優一覧 : 気になる動画の登録数順'" />

  <section class="">
    <div class="flex flex-wrap mb-5 text-white font-mono">
      <Link :href="route('flist.actress')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        女優一覧
      </Link>
      <Link :href="route('flist.actress_ruby')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        50音順
      </Link>
      <Link :href="route('flist.actress_memo')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        公開メモの多い順
      </Link>
    </div>
    <div class="border-b-4 border-gray-500 my-4">
      <h1 class="font-bold md:text-xl"><span class="text-red-500">【FANZA】</span>AV女優一覧 : 気になる動画の登録数順</h1>
    </div>
    <div class="flex flex-wrap ml-4 md:mx-2 justify-center md:justify-start">
      <div v-for="actressnicelist in actressnicelists" :key="actressnicelist.id">
        <div v-if="actressnicelist.type === 'fanza' && actressnicelist.actress" class="w-36 mr-5 md:mr-2 mb-4">
          <a :href="route('flist.show', { sort: 'actress', keyword: actressnicelist.actress })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + actressnicelist.content_id  + '/' + actressnicelist.content_id + 'ps.jpg'" :alt="'【FANZA】' + actressnicelist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ actressnicelist.actress }}</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</Layout>
</template>