<script setup>
import { Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import MyPageMenu from '../Fanza/MyPageMenu.vue';

defineProps({
  videolists: Object,
  display: String,
  sort: String,
  type: String,
  hits: String,
  memoType: String
})
</script>

<template>
  <section>
    <div class="flex flex-wrap mt-10 mb-2 mx-auto border-b-4 border-gray-500 items-center w-full">
      <h2 class="pl-1 mb-1 text-lg font-bold">
        気になる動画
        <span class="ml-2 text-sm font-medium">{{ videolists.total }}件</span>
      </h2>
    </div>
    <MyPageMenu :memoType="memoType" :lists="videolists" :display="display" :sort="sort" :type="type" :hits="hits"
      :color="'hover:bg-pink-200'" />
    <!-- トップ -->
    <ul v-if="type === 'top'" class="flex flex-col lg:flex-row lg:flex-wrap list-none break-words">
      <li v-for="videolist in videolists.data" :key="videolist.id">
        <div class="flex flex-nowrap lg:w-[550px] lg:mr-8 mb-6 border-2 border-gray-300">
          <Link :href="route('fnice.destroy', { content_id: videolist.content_id })"
            class="flex w-10 border-r-2 border-gray-300 items-center justify-center group hover:bg-pink-300"
            preserve-scroll>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-7 h-7 text-pink-300 inline-block group-hover:text-white">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
              clip-rule="evenodd" />
          </svg>
          </Link>
          <Link :href="route('fvideo.show', { id: videolist.content_id })"
            class="flex w-full mx-auto p-2 hover:bg-pink-100 group">
          <img
            :src="'https://pics.dmm.co.jp/digital/video/' + videolist.content_id + '/' + videolist.content_id + 'ps.jpg'"
            :alt="'【FANZA】' + videolist.fanza.title + 'のジャケット画像'" class="h-28 w-20">
          <div class="flex flex-col w-full justify-between">
            <p class="p-1 ml-2 mb-2 font-mono bg-gray-100 group-hover:bg-white">
              {{ videolist.fanza.title }}
            </p>
            <p class="pl-2 ml-auto">気になる動画登録日:
              <span class="inline-block">
                {{ videolist.updated_at }}
              </span>
            </p>
          </div>
          </Link>
        </div>
      </li>
    </ul>
    <!-- イメージ -->
    <ul v-if="type === 'image'" class="flex flex-wrap list-none">
      <li v-for="videolist in videolists.data" :key="videolist.id" class="mr-3 mb-4">
        <div class="w-8 ml-0.5 relative group">
          <Link :href="route('fnice.destroy', { content_id: videolist.content_id })"
            class="absolute top-0 left-0 w-full h-full" preserve-scroll>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-7 h-7 text-pink-300 inline-block border border-gray-300 group-hover:text-white group-hover:bg-pink-300 bg-white">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
              clip-rule="evenodd" />
          </svg>
          </Link>
        </div>
        <Link :href="route('fvideo.show', { id: videolist.content_id })">
        <img :src="'https://pics.dmm.co.jp/digital/video/' + videolist.content_id + '/' + videolist.content_id + 'ps.jpg'"
          :alt="'【FANZA】' + videolist.fanza.title + 'のジャケット画像'" class="h-44 w-32">
        </Link>
      </li>
    </ul>
    <!-- タイトル -->
    <div v-if="type === 'title'">
      <table class="table-fixed [&>tbody>*:nth-child(even)]:bg-stone-100">
        <thead>
          <tr class="border border-gray-800 bg-gray-800 text-white">
            <th class="block w-8"></th>
            <th class="w-full border-r-2 border-gray-300">タイトル</th>
            <th class="block w-24 md:w-40">登録日</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="videolist in videolists.data" :key="videolist.id" class="border-2 border-gray-300">
            <td class="w-8 px-1 py-2 relative group">
              <Link :href="route('fnice.destroy', { content_id: videolist.content_id })"
                class="flex items-center justify-center absolute top-0 left-0 w-full h-full group-hover:bg-pink-300"
                preserve-scroll>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 text-pink-300 inline-block group-hover:text-white">
                <path fill-rule="evenodd"
                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                  clip-rule="evenodd" />
              </svg>
              </Link>
            </td>
            <td class="max-w-5xl p-2 border-x-2 border-gray-300">
              <Link :href="route('fvideo.show', { id: videolist.content_id })"
                class="text-blue-700 font-mono hover:text-red-500 hover:underline relative group">
              {{ videolist.fanza.title }}
              <p
                class="w-40 p-3 border-2 border-gray-300 bg-white rounded-xl group-hover:flex hidden justify-center absolute -top-52 left-1/2 -translate-x-1/2 before:content-[''] before:absolute before:-translate-x-1/2 before:left-1/2 before:top-full before:border-8 before:border-transparent before:border-t-gray-300 transition">
                <img
                  :src="'https://pics.dmm.co.jp/digital/video/' + videolist.content_id + '/' + videolist.content_id + 'ps.jpg'"
                  :alt="'【FANZA】' + videolist.fanza.title + 'のジャケット画像'" class="h-44 w-32">
              </p>
              </Link>
            </td>
            <td class="w-24 md:w-40 text-xs text-center">
              {{ videolist.updated_at }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="w-full mt-12">
      <Pagination :links="videolists.links" :display="display" :sort="sort" :type="type" :hits="hits" />
    </div>
  </section>
</template>