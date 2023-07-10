<script setup>
import { Link } from '@inertiajs/vue3';
import WithScroll from '@/Components/Duga/Image/WithScroll.vue';

const props = defineProps({
  mylists: Object,
  mylistcount: Number,
  mynices: Object,
  mynicecount: Number,
})
</script>

<template>
  <div v-if="$page.props.auth.user">
    <section>
      <div class="flex flex-wrap my-8 mx-auto border-b-4 border-gray-500 items-center">
        <h2 class="ml-3 mb-1 text-xl font-bold">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
        <Link :href="route('mypage.duga_release')" class="ml-auto px-6 text-blue-500 hover:underline hover:text-red-500">
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
        <WithScroll :scrolls="mylists" />
      </div>
      <div v-else class="h-36 pt-12 font-bold text-gray-600">
        <p class="w-52 mx-auto pl-2 border-b-2 border-blue-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-4 h-4 mb-1 text-blue-200 inline-block">
            <path fill-rule="evenodd"
              d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
              clip-rule="evenodd" />
            <path
              d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
          </svg>
          メモをしてみましょう。
        </p>
      </div>
    </section>
    <section>
      <div class="flex flex-wrap my-8 mx-auto border-b-4 border-gray-500 items-center">
        <h2 class="ml-3 mb-1 text-xl font-bold">{{ $page.props.auth.user.name }}さんの気になる動画</h2>
        <Link :href="route('mypage.duga_nice')" class="ml-auto px-6 text-blue-500 hover:underline hover:text-red-500">
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
        <WithScroll :scrolls="mynices" />
      </div>
      <div v-else class="h-36 pt-12 font-bold text-gray-600">
        <p class="w-[306px] mx-auto pl-2 border-b-2 border-pink-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-5 h-5 mb-1 text-pink-200 inline-block">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
              clip-rule="evenodd" />
          </svg>
          気になる動画を登録してみましょう。
        </p>
      </div>
    </section>
  </div>
</template>