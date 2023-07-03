<script setup>
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import MyPageMenu from '../Fanza/MyPageMenu.vue';

defineProps({
  memolists: Object,
  videolists: Object,
  display: String,
  sort: String,
  group: String,
  type: String,
  hits: String,
  memoType: String
})

const destroyFreeMemo = id => {
  router.delete(`/fanzafreememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};
</script>

<template>
  <section v-if="display === 'video'">
    <div class="flex flex-wrap mt-10 mb-2 mx-auto border-b-4 border-gray-500 items-center w-full">
      <h2 class="pl-1 mb-1 text-lg font-bold">
        フリーメモした動画
        <span class="ml-2 text-sm font-medium">{{ videolists.total }}件</span>
      </h2>
      <p class="inline-block ml-auto mr-1 md:mr-6 font-bold">
        表示
        <span class="mx-2 font-medium">
          動画
        </span>
        /
        <span class="ml-2 font-medium">
          <Link :href="route('mypage.' + memoType, { display: 'memo' })"
            class="text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>
          メモ
          </Link>
        </span>
      </p>
    </div>
    <MyPageMenu :memoType="memoType" :lists="videolists" :display="display" :sort="sort" :group="group" :type="type" :hits="hits" :color="'hover:bg-amber-200'" />
    <!-- トップ -->
    <ul v-if="type === 'top'" class="flex flex-col lg:flex-row lg:flex-wrap list-none break-words">
      <li v-for="videolist in videolists.data" :key="videolist.id">
        <div class="flex flex-nowrap lg:w-[550px] lg:mr-8 mb-6 border-2 border-gray-300">
          <Link v-if="videolist.fanza.fanza_nice"
            :href="route('fnice.destroy', { content_id: videolist.content_id })"
            class="flex w-10 border-r-2 border-gray-300 items-center justify-center group hover:bg-pink-300"
            preserve-scroll>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-7 h-7 text-pink-300 inline-block group-hover:text-white">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
              clip-rule="evenodd" />
          </svg>
          </Link>
          <Link v-else :href="route('fnice.store', { content_id: videolist.content_id, fanza_id: videolist.fanza_id })"
            class="flex w-10 border-r-2 border-gray-300 items-center justify-center group hover:bg-pink-300"
            preserve-scroll>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-7 h-7 text-pink-300 inline-block group-hover:text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
          </svg>
          </Link>
          <Link :href="route('fvideo.show', { id: videolist.content_id })"
            class="flex w-full mx-auto p-2 hover:bg-amber-100 group">
          <img
            :src="'https://pics.dmm.co.jp/digital/video/' + videolist.content_id + '/' + videolist.content_id + 'ps.jpg'"
            :alt="'【FANZA】' + videolist.fanza.title + 'のジャケット画像'" class="h-28 w-20">
          <div class="flex flex-col w-full justify-between">
            <p class="p-1 ml-2 mb-2 font-mono bg-gray-100 group-hover:bg-white">
              {{ videolist.fanza.title }}
            </p>
            <p class="pl-2 ml-auto">メモの更新日:
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
          <Link v-if="videolist.fanza.fanza_nice" :href="route('fnice.destroy', { content_id: videolist.content_id })"
            class="absolute top-0 left-0 w-full h-full" preserve-scroll>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-7 h-7 text-pink-300 inline-block border border-gray-300 group-hover:text-white group-hover:bg-pink-300 bg-white">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
              clip-rule="evenodd" />
          </svg>
          </Link>
          <Link v-else :href="route('fnice.store', { content_id: videolist.content_id, fanza_id: videolist.fanza_id })"
            class="absolute top-0 left-0 w-full h-full bg-white" preserve-scroll>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-7 h-7 text-pink-300 inline-block border border-gray-300 bg-white group-hover:text-white group-hover:bg-pink-300">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
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
            <th class="block w-24 md:w-40">メモの更新日</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="videolist in videolists.data" :key="videolist.id" class="border-2 border-gray-300">
            <td class="w-8 px-1 py-2 relative group">
              <Link v-if="videolist. fanza.fanza_nice" :href="route('fnice.destroy', { content_id: videolist.content_id })"
                class="flex items-center justify-center absolute top-0 left-0 w-full h-full group-hover:bg-pink-300"
                preserve-scroll>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 text-pink-300 inline-block group-hover:text-white">
                <path fill-rule="evenodd"
                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                  clip-rule="evenodd" />
              </svg>
              </Link>
              <Link v-else :href="route('fnice.store', { content_id: videolist.content_id, fanza_id: videolist.fanza_id })"
                class="flex items-center justify-center hover:bg-pink-50 absolute top-0 left-0 w-full h-full group-hover:bg-pink-300"
                preserve-scroll>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-pink-300 inline-block group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
              </svg>
              </Link>
            </td>
            <td class="p-2 border-x-2 border-gray-300">
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
  <section v-if="display === 'memo'">
    <div class="flex flex-wrap mt-10 mb-2 mx-auto border-b-4 border-gray-500 items-center w-full">
      <h2 class="pl-1 mb-1 text-lg font-bold">
        <span>フリーメモ</span>
        <span class="ml-2 text-sm font-medium">{{ memolists.total }}件</span>
      </h2>
      <p class="inline-block ml-auto mr-1 md:mr-6 font-bold">
        表示
        <span class="mx-2 font-medium">
          <Link :href="route('mypage.' + memoType, { display: 'video' })"
            class="text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>
          動画
          </Link>
        </span>
        /
        <span class="ml-2 font-medium">
          メモ
        </span>
      </p>
    </div>
    <MyPageMenu :memoType="memoType" :lists="memolists" :display="display" :sort="sort" :group="group" :type="type" :hits="hits" :color="'hover:bg-amber-200'" />
    <ul class="flex flex-col list-none">
      <li v-for="memolist in memolists.data" :key="memolist.id">
        <div class="flex py-3 items-center border-dotted border-b border-gray-500">
          <Link v-if="group"
            :href="route('mypage.' + memoType, { page: memolists.current_page, display: 'memo', sort: sort, hits: hits })"
            preserve-scroll>
          <img :src="'https://pics.dmm.co.jp/digital/video/' + memolist.content_id + '/' + memolist.content_id + 'ps.jpg'"
            :alt="'【FANZA】' + memolist.title + 'のジャケット画像'" class="w-12">
          </Link>
          <Link v-else
            :href="route('mypage.' + memoType, { page: 1, display: 'memo', group: memolist.content_id, type: 'group', sort: sort, hits: hits })"
            preserve-scroll>
          <img :src="'https://pics.dmm.co.jp/digital/video/' + memolist.content_id + '/' + memolist.content_id + 'ps.jpg'"
            :alt="'【FANZA】' + memolist.title + 'のジャケット画像'" class="w-12">
          </Link>
          <div class="w-full ml-5">
            <div class="flex mb-3 items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 text-amber-400 inline-block">
                <path fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                  clip-rule="evenodd" />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
              </svg>
              <span class="w-44 ml-4 text-sm text-zinc-500 inline-block">
                {{ memolist.updated_at }}
              </span>
              <button type="button" @click="destroyFreeMemo(memolist.id)"
              class="ml-auto px-1.5 py-0.5 bg-red-600 text-white font-mono text-xs rounded shadow-md hover:bg-red-700 flex align-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-3 h-3 my-auto mr-1">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              削除
            </button>
            </div>
            <div class="w-full whitespace-pre-line break-all">
              {{ memolist.free }}
            </div>
          </div>
        </div>
      </li>
    </ul>
    <div class="w-full mt-12">
      <Pagination :links="memolists.links" :display="display" :sort="sort" :group="group" :hits="hits" />
    </div>
  </section>
</template>