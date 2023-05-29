<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  releaselists: Object
})
</script>

<template>
  <div class="flex flex-wrap -mt-8 mb-8 mx-auto border-b-4 border-gray-500 items-center justify-between">
    <h2 class="ml-3 mb-1 text-xl font-bold">最近メモされた動画</h2>
    <a :href="route('dmemo.memoAll')" class="px-6 text-blue-500 hover:underline hover:text-red-500">
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
      <div v-for="releaselist in releaselists" :key="releaselist.id">
        <div class="mr-4">
          <Link :href="route('dvideo.show', { id: releaselist.productid })">
          <img v-if="releaselist.duga.jacketimage"
            :src="'https://pic.duga.jp/unsecure/' + releaselist.re_productid + '/noauth/jacket_240.jpg'"
            :alt="'【DUGA】' + releaselist.duga.title + 'のジャケット画像'" class="h-44">
          <img v-else :src="'https://pic.duga.jp/unsecure/' + releaselist.re_productid + '/noauth/180x180.jpg'"
            :alt="'【DUGA】' + releaselist.duga.title + 'のメイン画像'" class="h-44 w-32">
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>