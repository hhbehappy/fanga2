<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  videoids: Object,
  fanzagenre2s: Object,
  fanzagenre2count: Number
})
</script>

<template>
  <div v-for="videoid in videoids" :key="videoid.id">
    <div v-if="videoid.genre2 && fanzagenre2count !== 0">
      <div class="flex flex-wrap my-8 mx-auto border-b-4 border-gray-500 items-center justify-between">
        <h2 class="ml-3 mb-1 text-xl font-bold">ジャンル『{{ videoid.genre2 }}』</h2>
        <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre2 })"
          class="px-6 text-blue-500 hover:underline hover:text-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd"
              d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
              clip-rule="evenodd" />
            <path fill-rule="evenodd"
              d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
              clip-rule="evenodd" />
          </svg>
          一覧で見る
        </a>
      </div>
      <div class="flex overflow-x-auto hidden-scrollbar h-52 ml-4">
        <div class="flex flex-none flex-nowrap">
          <div v-for="fanzagenre2 in fanzagenre2s" :key="fanzagenre2.id" class="">
            <div class="mr-4">
              <Link :href="route('fvideo.show', { id: fanzagenre2.content_id })">
              <img
                :src="'https://pics.dmm.co.jp/digital/video/' + fanzagenre2.content_id + '/' + fanzagenre2.content_id + 'ps.jpg'"
                :alt="'【FANZA】' + fanzagenre2.title + 'のジャケット画像'" class="w-32">
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>