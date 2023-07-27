<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const path = location.pathname;
</script>

<template>
  <header class="mt-2">
    <div class="flex flex-wrap w-full justify-between pb-1 items-end mb-5 border-b-2 border-gray-500">
      <div class="md:w-[350px] ml-4 md:shrink-0">
        <Link :href="route('fanga')" class="font-logofont text-2xl text-red-500">FANGA
        <span class="text-sm text-gray-700">【FANZA&DUGA】</span>
        </Link>
        <p class="text-sm font-bold">人気アダルト動画のレヴューサイトではありません。</p>
      </div>
      <!-- PC -->
      <nav class="hidden md:block items-center mt-3 ml-4 lg:mr-2">
        <ul class="flex flex-nowrap text-gray-700 font-bold">
          <li class="h-6 w-40 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
            <Link :href="route('fvideo.index')" class="absolute top-0 left-0 w-full h-full">FANZAの動画を探す</Link>
          </li>
          <li class="h-6 w-40 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
            <Link :href="route('dvideo.index')" class="absolute top-0 left-0 w-full h-full">DUGAの動画を探す</Link>
          </li>
          <li class="h-6 w-14 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
            <Link :href="route('bbs')" class="absolute top-0 left-0 w-full h-full">BBS</Link>
          </li>
          <li class="h-6 w-24 mb-1 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
            <Link :href="route('mypage')" class="absolute top-0 left-0 w-full h-full">マイページ</Link>
          </li>
          <li v-if="$page.props.auth.user"></li>
          <li v-else
            class="h-6 w-20 mb-1 text-center hover:bg-green-600 hover:text-white border-r-2 border-gray-500 relative">
            <Link :href="route('register')" class="absolute top-0 left-0 w-full h-full">会員登録</Link>
          </li>
          <li v-if="$page.props.auth.user" class="h-6 w-24 mb-1 text-center hover:bg-red-500 hover:text-white relative">
            <Link :href="route('logout')" method="post" as="button" class="absolute top-0 left-0 w-full h-full">ログアウト
            </Link>
          </li>
          <li v-else class="h-6 w-20 mb-1 text-center hover:bg-red-500 hover:text-white relative">
            <Link :href="route('login')" class="absolute top-0 left-0 w-full h-full">ログイン</Link>
          </li>
        </ul>
      </nav>
      <!-- スマホ -->
      <nav class="block md:hidden w-full mt-3">
        <ul class="flex flex-nowrap text-gray-700 font-bold">
          <li class="h-8 w-1/2 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
            <Link :href="route('fvideo.index')" class="pt-1 absolute top-0 left-0 w-full h-full">FANZAの動画を探す</Link>
          </li>
          <li class="h-8 w-1/2 text-center hover:bg-red-500 hover:text-white relative">
            <Link :href="route('dvideo.index')" class="pt-1 absolute top-0 left-0 w-full h-full">DUGAの動画を探す</Link>
          </li>
        </ul>
      </nav>
    </div>
    <!-- <nav class="flex flex-col md:hidden w-full">
      <ul class="flex">
        <li
          class="p-1 h-10 w-1/2 bg-gray-200 text-center text-gray-700 text-2xl font-bold hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
          <a :href="route('fvideo.index')" class="absolute top-0 left-0 w-full h-full mt-1">FANZA</a>
        </li>
        <li
          class="p-1 h-10 w-1/2 bg-gray-200 text-center text-gray-700 text-2xl font-bold hover:bg-red-500 hover:text-white relative">
          <a :href="route('dvideo.index')" class="absolute top-0 left-0 w-full h-full mt-1">DUGA</a>
        </li>
      </ul>
      <ul v-if="$page.props.auth.user" class="flex">
        <li
          class="h-9 w-1/3 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
          <Link :href="route('mypage')" class="absolute top-0 left-0 w-full h-full mt-1">マイページ</Link>
        </li>
        <li
          class="h-9 w-1/3 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
          <Link :href="route('bbs')" class="absolute top-0 left-0 w-full h-full mt-1">BBS</Link>
        </li>
        <li
          class="h-9 w-1/3 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
          <Link :href="route('logout')" method="post" as="button" class="absolute top-0 left-0 w-full h-full">ログアウト</Link>
        </li>
      </ul>
      <ul v-else class="flex">
        <li
          class="h-9 w-1/4 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
          <Link :href="route('mypage')" class="absolute top-0 left-0 w-full h-full mt-1">マイページ</Link>
        </li>
        <li
          class="h-9 w-1/4 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
          <Link :href="route('bbs')" class="absolute top-0 left-0 w-full h-full mt-1">BBS</Link>
        </li>
        <li
          class="h-9 w-1/4 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-r-2 border-gray-500 hover:bg-green-600 hover:text-white relative">
          <Link :href="route('register')" class="absolute top-0 left-0 w-full h-full mt-1">会員登録</Link>
        </li>
        <li
          class="h-9 w-1/4 bg-gray-200 text-center text-gray-700 font-bold p-1 border-y-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
          <Link :href="route('login')" class="absolute top-0 left-0 w-full h-full mt-1">
          <span class="inlien-block py-0.5 px-2 text-sm font-mono text-white bg-red-500 rounded-md">ログイン
          </span></Link>
        </li>
      </ul>
      <div v-if="path.includes('fanza') === true" class="">
        <div class="flex h-7 pl-4 min-w-full bg-gray-900 items-center">
          <h1 class="text-red-500 text-lg font-bold">FANZA</h1>
        </div>
        <div class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-mono text-sm">
          <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('flist.genre')" class="absolute top-0 left-0 w-full h-full mt-1">ジャンル一覧</Link>
          </div>
          <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('flist.actress')" class="absolute top-0 left-0 w-full h-full mt-1">女優一覧</Link>
          </div>
          <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('flist.maker')" class="absolute top-0 left-0 w-full h-full mt-1">メーカー一覧</Link>
          </div>
          <div class="h-7 w-1/4 pt-1 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('flist.series')" class="absolute top-0 left-0 w-full h-full mt-1">シリーズ一覧</Link>
          </div>
        </div>
      </div>
      <div v-if="path.includes('duga') === true" class="">
        <div class="flex h-7 pl-4 min-w-full bg-gray-900 items-center">
          <h1 class="text-red-500 text-lg font-bold">DUGA</h1>
        </div>
        <div class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-mono text-sm">
          <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('dlist.category')" class="absolute top-0 left-0 w-full h-full mt-1">カテゴリ一覧</Link>
          </div>
          <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('dlist.performer')" class="absolute top-0 left-0 w-full h-full mt-1">女優一覧</Link>
          </div>
          <div class="h-7 w-1/4 pt-1 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('dlist.maker')" class="absolute top-0 left-0 w-full h-full mt-1">メーカー一覧</Link>
          </div>
          <div class="h-7 w-1/4 pt-1 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white relative">
            <Link :href="route('dlist.series')" class="absolute top-0 left-0 w-full h-full mt-1">シリーズ一覧</Link>
          </div>
        </div>
      </div>
    </nav> -->
  </header>
</template>