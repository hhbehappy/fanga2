<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import FanzaActressRuby from '@/Components/Parts/FanzaActressRuby.vue';

const props = defineProps({
  actressnamelists: Object,
  line: String,
  keyword: String
})
</script>

<template>
<Layout>
  <Head :title="'【FANZA】AV女優一覧 : 名前が『' + $props.keyword +'』から始まるAV女優'" />

  <section class="">
    <div class="flex flex-wrap mb-3 text-white font-mono">
      <Link :href="route('flist.actress')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        AV女優一覧
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
      <Link :href="route('flist.actress_nice')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        気になる動画の登録数順
      </Link>
    </div>
    <FanzaActressRuby :line="props.line" :keyword="props.keyword" />
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold md:text-xl"><span class="text-red-500">【FANZA】</span>AV女優一覧 : 名前が『{{ props.keyword }}』から始まるAV女優</h1>
    </div>
    <div class="flex flex-wrap ml-4 md:mx-2 justify-center sm:justify-start">
      <div v-for="actressnamelist in actressnamelists" :key="actressnamelist.id">
        <div v-if="actressnamelist.actress" class="w-36 mr-5 md:mr-2 mb-4">
          <a :href="route('flist.show', { keyword: actressnamelist.actress })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + actressnamelist.content_id  + '/' + actressnamelist.content_id + 'ps.jpg'" :alt="'【FANZA】' + actressnamelist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ actressnamelist.actress }}</span>
            <span class="w-28 text-xs text-gray-600 block truncate">{{ actressnamelist.ruby }}</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</Layout>
</template>
