<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  mylists: Object,
  mylistcount: Number,
  mynices: Object,
  mynicecount: Number,
})
</script>

<template>
  <div v-if="$page.props.auth.user">
    <div class="flex flex-wrap my-8 mx-auto border-b-4 border-gray-500 items-center justify-between">
      <h2 class="ml-3 mb-1 text-xl font-bold">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
      <Link :href="route('mypage')" class="px-6 text-blue-500 hover:underline hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        class="mb-1 w-3 h-3 inline-block text-gray-800">
        <path fill-rule="evenodd"
          d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
          clip-rule="evenodd" />
        <path fill-rule="evenodd"
          d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
          clip-rule="evenodd" />
      </svg>
      マイページ
      </Link>
    </div>
    <div v-if="mylistcount !== 0">
      <div class="flex overflow-x-auto hidden-scrollbar h-52 ml-4">
        <div class="flex flex-none flex-nowrap">
          <div v-for="mylist in mylists" :key="mylist.id">
            <div class="mr-4">
              <Link :href="route('dvideo.show', { id: mylist.productid })">
              <img v-if="mylist.duga.jacketimage"
                :src="'https://pic.duga.jp/unsecure/' + mylist.re_productid + '/noauth/jacket_240.jpg'"
                :alt="'【DUGA】' + mylist.duga.title + 'のジャケット画像'" class="h-44">
              <img v-else :src="'https://pic.duga.jp/unsecure/' + mylist.re_productid + '/noauth/180x180.jpg'"
                :alt="'【DUGA】' + mylist.duga.title + 'のメイン画像'" class="h-44 w-32">
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="flex h-20 pl-5 items-center">
        <p>メモした動画はまだありません。</p>
      </div>
    </div>
    <div class="flex flex-wrap my-8 mx-auto border-b-4 border-gray-500 items-center justify-between">
      <h2 class="ml-3 mb-1 text-xl font-bold">{{ $page.props.auth.user.name }}さんの気になる動画</h2>
      <Link :href="route('mypage')" class="px-6 text-blue-500 hover:underline hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        class="mb-1 w-3 h-3 inline-block text-gray-800">
        <path fill-rule="evenodd"
          d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
          clip-rule="evenodd" />
        <path fill-rule="evenodd"
          d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
          clip-rule="evenodd" />
      </svg>
      マイページ
      </Link>
    </div>
    <div v-if="mynicecount !== 0">
      <div class="flex overflow-x-auto hidden-scrollbar h-52 ml-4">
        <div class="flex flex-none flex-nowrap">
          <div v-for="mynice in mynices" :key="mynice.id">
            <div class="mr-4">
              <Link :href="route('dvideo.show', { id: mynice.productid })">
              <img v-if="mynice.duga.jacketimage"
                :src="'https://pic.duga.jp/unsecure/' + mynice.re_productid + '/noauth/jacket_240.jpg'"
                :alt="'【DUGA】' + mynice.duga.title + 'のジャケット画像'" class="h-44">
              <img v-else :src="'https://pic.duga.jp/unsecure/' + mynice.re_productid + '/noauth/180x180.jpg'"
                :alt="'【DUGA】' + mynice.duga.title + 'のメイン画像'" class="h-44 w-32">
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="flex h-20 pl-5 items-center">
        <p>気になる動画はまだありません。</p>
      </div>
    </div>
  </div>
</template>