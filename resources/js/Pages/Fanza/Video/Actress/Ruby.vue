<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  actressrubylists: Object,
  keyword: String
})
</script>

<template>
<Layout>
  <Head :title="'【FANZA】AV女優一覧 : 名前が『' + $props.keyword +'』から始まるAV女優'" />

  <section class="">
    <div class="flex flex-wrap mb-5 text-white font-mono">
      <Link :href="route('flist.actress')" class="flex py-1 px-6 mx-2 mb-2 bg-gray-800 hover:bg-red-600 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        AV女優一覧
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
    <div class="border-b-4 border-gray-500 mb-4">
      <h1 class="font-bold md:text-xl"><span class="text-red-500">【FANZA】</span>AV女優一覧 : 50音順</h1>
    </div>
    <!-- 50音順 -->
    <div class="flex flex-wrap mb-7 font-mono text-gray-800 justify-center md:justify-start">
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'あ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white focus:bg-violet-700">あ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'い' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">い</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'う' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">う</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'え' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">え</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'お' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">お</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'か' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">か</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'き' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">き</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'く' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">く</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'け' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">け</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'こ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">こ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'さ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">さ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'し' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">し</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'す' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">す</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'せ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">せ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'そ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">そ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'た' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">た</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ち' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ち</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'つ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">つ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'て' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">て</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'と' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">と</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'な' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">な</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'に' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">に</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ぬ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ぬ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ね' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ね</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'の' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">の</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'は' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">は</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ひ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ひ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ふ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ふ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'へ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">へ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ほ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ほ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'ま' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ま</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'み' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">み</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'む' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">む</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'め' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">め</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'も' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">も</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'や' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">や</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ゆ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ゆ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'よ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">よ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'ら' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ら</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'り' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">り</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'る' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">る</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'れ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">れ</Link>
        <Link :href="route('flist.actress_ruby', { keyword: 'ろ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">ろ</Link>
      </div>
      <div class="flex w-80 h-11 p-1 mb-2 mr-3 justify-between items-center">
        <Link :href="route('flist.actress_ruby', { keyword: 'わ' })" class="w-14 py-1 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-600 hover:text-white">わ</Link>
      </div>
    </div>
    <div class="border-b-2 border-red-500 mb-5 ml-3 pl-1 w-60 md:w-[300px]">
      <h2 class="font-bold md:text-xl">名前が『{{ props.keyword }}』から始まるAV女優</h2>
    </div>
    <div class="flex flex-wrap ml-4 md:mx-2">
      <div v-for="actressrubylist in actressrubylists" :key="actressrubylist.id">
        <div v-if="actressrubylist.actress" class="w-36 mr-2 mb-4">
          <a :href="route('flist.show', { keyword: actressrubylist.actress })" class="p-2 border-2 text-blue-500 text-center inline-block">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + actressrubylist.content_id  + '/' + actressrubylist.content_id + 'ps.jpg'" :alt="'【FANZA】' + actressrubylist.title + 'のメイン画像'" class="h-40">
            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ actressrubylist.actress }}</span>
            <span class="w-28 text-xs text-gray-600 block truncate">{{ actressrubylist.ruby }}</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</Layout>
</template>
