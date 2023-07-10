<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import DugaScroll from '@/Components/Duga/Image/Scroll.vue';
import DugaWithScroll from '@/Components/Duga/Image/WithScroll.vue';

defineProps({
  dvideoids: Object,
  dugacount: Number,
  dugaperformers: Object,
  dugamakers: Object,
  dugaseriess: Object,
  dugamemos: Object,
  mydlists: Object,
  mydlistcount: Number,
  mydnices: Object,
  mydnicecount: Number,
})
</script>

<template>
  <Head :title="'DUGAの動画を探す'" />

  <Layout>
    <article>
      <section class="mb-12">
        <h1 class="pl-3 mb-5 font-bold text-xl border-b-4 border-gray-500">
          <span class="text-red-500 text-2xl">DUGA</span>の動画を探す
          <span class="ml-3 font-medium text-base">{{ dugacount }}件</span>
        </h1>
        <div class="h-10 md:w-96 m-3">
          <form :action="route('fanga.searchduga')" method="GET">
            <input type="text" name="keyword" placeholder="検索ワードを入力" class="w-10/12 h-10 pb-2.5 leading-5 rounded-l-lg"
              required>
            <input type="submit" value="検索"
              class="h-10 p-1 text-gray-100 text-sm bg-gray-600 rounded-r-lg cursor-pointer">
          </form>
        </div>
        <ul class="flex flex-wrap">
          <li class="flex flex-wrap w-full md:w-auto">
            <div class="w-full md:w-80 xl:w-60 m-3 p-3 border-2 border-gray-500 rounded-lg">
              <h2 class="mb-3 font-bold">一覧
                <span class="font-medium text-sm">から探す</span>
              </h2>
              <ul class="list-disc list-inside space-y-3">
                <li><a :href="route('dmemo.memoAll')"
                    class="text-blue-500 hover:underline hover:text-red-500">メモされた動画一覧</a>
                </li>
                <li><a :href="route('dlist.index')" class="text-blue-500 hover:underline hover:text-red-500">全動画一覧</a>
                </li>
                <li>
                  <Link :href="route('dlist.category')" class="text-blue-500 hover:underline hover:text-red-500">カテゴリ一覧
                  </Link>
                </li>
              </ul>
            </div>
            <div class="w-full md:w-80 xl:w-60 m-3 p-3 border-2 border-gray-500 rounded-lg">
              <h2 class="mb-3 font-bold">女優
                <span class="font-medium text-sm">から探す</span>
              </h2>
              <ul class="list-disc list-inside space-y-3">
                <li>
                  <Link :href="route('dlist.performer')" class="text-blue-500 hover:underline hover:text-red-500">
                  FANGAイチオシAV女優</Link>
                </li>
                <li>
                  <Link :href="route('dlist.performer_ruby')" class="text-blue-500 hover:underline hover:text-red-500">
                  50音順
                  </Link>
                </li>
                <li>
                  <Link :href="route('dlist.performer_memo')" class="text-blue-500 hover:underline hover:text-red-500">
                  メモの多い順
                  </Link>
                </li>
                <li>
                  <Link :href="route('dlist.performer_nice')" class="text-blue-500 hover:underline hover:text-red-500">
                  気になる動画の登録数順</Link>
                </li>
              </ul>
            </div>
          </li>
          <li class="flex flex-wrap w-full md:w-auto">
            <div class="w-full md:w-80 xl:w-60 m-3 p-3 border-2 border-gray-500 rounded-lg">
              <h2 class="mb-3 font-bold">メーカー
                <span class="font-medium text-sm">から探す</span>
              </h2>
              <ul class="list-disc list-inside space-y-3">
                <li>
                  <Link :href="route('dlist.maker')" class="text-blue-500 hover:underline hover:text-red-500">人気AVメーカー
                  </Link>
                </li>
                <li>
                  <a :href="route('dlist.maker_all')" class="text-blue-500 hover:underline hover:text-red-500">全AVメーカー
                  </a>
                </li>
                <li>
                  <Link :href="route('dlist.maker_memo')" class="text-blue-500 hover:underline hover:text-red-500">メモの多い順
                  </Link>
                </li>
                <li>
                  <Link :href="route('dlist.maker_nice')" class="text-blue-500 hover:underline hover:text-red-500">
                  気になる動画の登録数順</Link>
                </li>
              </ul>
            </div>
            <div class="w-full md:w-80 xl:w-60 m-3 p-3 border-2 border-gray-500 rounded-lg">
              <h2 class="mb-3 font-bold">シリーズ
                <span class="font-medium text-sm">から探す</span>
              </h2>
              <ul class="list-disc list-inside space-y-3">
                <li>
                  <Link :href="route('dlist.series')" class="text-blue-500 hover:underline hover:text-red-500">人気シリーズ
                  </Link>
                </li>
                <li>
                  <a :href="route('dlist.series_all')" class="text-blue-500 hover:underline hover:text-red-500">全シリーズ
                  </a>
                </li>
                <li>
                  <Link :href="route('dlist.series_memo')" class="text-blue-500 hover:underline hover:text-red-500">メモの多い順
                  </Link>
                </li>
                <li>
                  <Link :href="route('dlist.series_nice')" class="text-blue-500 hover:underline hover:text-red-500">
                  気になる動画の登録数順</Link>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </section>
      <section class="mb-12">
        <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">メモされた動画</h2>
          <span class="inline-block ml-auto">
            <a :href="route('dmemo.memoAll')" class="text-blue-500 hover:underline hover:text-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd"
                  d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                  clip-rule="evenodd" />
                <path fill-rule="evenodd"
                  d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                  clip-rule="evenodd" />
              </svg>
              メモされた動画一覧
            </a>
          </span>
        </div>
        <DugaWithScroll :scrolls="dugamemos" />
      </section>
      <section v-if="$page.props.auth.user" class="mb-12">
        <div class="flex flex-wrap my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
          <span class="inline-block ml-auto">
            <Link :href="route('mypage.duga_release')" class="text-blue-500 hover:underline hover:text-red-500">
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
          </span>
        </div>
        <div v-if="mydlistcount !== 0">
          <DugaWithScroll :scrolls="mydlists" />
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
      <section v-if="$page.props.auth.user" class="mb-12">
        <div class="flex flex-wrap my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">{{ $page.props.auth.user.name }}さんの気になる動画</h2>
          <span class="inline-block ml-auto">
            <Link :href="route('mypage.duga_nice')" class="text-blue-500 hover:underline hover:text-red-500">
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
          </span>
        </div>
        <div v-if="mydnicecount !== 0">
          <DugaWithScroll :scrolls="mydnices" />
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
      <section class="mb-12">
        <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">新着動画</h2>
          <span class="inline-block ml-auto">
            <a :href="route('dlist.index')" class="text-blue-500 hover:underline hover:text-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd"
                  d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                  clip-rule="evenodd" />
                <path fill-rule="evenodd"
                  d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                  clip-rule="evenodd" />
              </svg>
              全動画一覧
            </a>
          </span>
        </div>
        <DugaScroll :scrolls="dvideoids" />
      </section>
      <section class="mb-12">
        <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">女優
            <span class="font-medium text-sm">から探す</span>
          </h2>
          <span class="inline-block ml-auto">
            <Link :href="route('dlist.performer')" class="text-blue-500 hover:underline hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              class="mb-1 w-3 h-3 inline-block text-gray-800">
              <path fill-rule="evenodd"
                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
              <path fill-rule="evenodd"
                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
            </svg>
            女優一覧
            </Link>
          </span>
        </div>
        <div class="flex overflow-x-scroll h-56 mx-4">
          <ul class="flex flex-none flex-wrap space-x-4">
            <li v-for="dugaperformer in dugaperformers" :key="dugaperformer.id" class="">
              <a :href="route('dlist.show', { sort: 'performer', keyword: dugaperformer.performer })"
                class="text-blue-500 text-center inline-block hover:text-red-500">
                <img v-if="dugaperformer.jacketimage" :src="dugaperformer.jacketimage"
                  :alt="'【DUGA】AV女優「' + dugaperformer.performer + '」'" class="h-44">
                <img v-else :src="dugaperformer.posterimage" :alt="'【DUGA】AV女優「' + dugaperformer.performer + '」'"
                  class="h-44 w-32">
                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                  {{ dugaperformer.performer }}
                </span>
              </a>
            </li>
          </ul>
        </div>
      </section>
      <section class="mb-12">
        <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">メーカー
            <span class="font-medium text-sm">から探す</span>
          </h2>
          <span class="inline-block ml-auto">
            <Link :href="route('dlist.maker')" class="text-blue-500 hover:underline hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              class="mb-1 w-3 h-3 inline-block text-gray-800">
              <path fill-rule="evenodd"
                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
              <path fill-rule="evenodd"
                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
            </svg>
            メーカー一覧
            </Link>
          </span>
        </div>
        <div class="flex overflow-x-scroll h-56 mx-4">
          <ul class="flex flex-none flex-wrap space-x-4">
            <li v-for="dugamaker in dugamakers" :key="dugamaker.id" class="">
              <a :href="route('dlist.show', { sort: 'maker', keyword: dugamaker.maker })"
                class="text-blue-500 text-center inline-block hover:text-red-500">
                <img v-if="dugamaker.jacketimage" :src="dugamaker.jacketimage"
                  :alt="'【DUGA】AVメーカー「' + dugamaker.maker + '」'" class="h-44">
                <img v-else :src="dugamaker.posterimage" :alt="'【DUGA】AVメーカー「' + dugamaker.maker + '」'" class="h-44 w-32">
                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                  {{ dugamaker.maker }}
                </span>
              </a>
            </li>
          </ul>
        </div>
      </section>
      <section class="mb-12">
        <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
          <h2 class="font-bold text-lg">シリーズ
            <span class="font-medium text-sm">から探す</span>
          </h2>
          <span class="inline-block ml-auto">
            <Link :href="route('dlist.series')" class="text-blue-500 hover:underline hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              class="mb-1 w-3 h-3 inline-block text-gray-800">
              <path fill-rule="evenodd"
                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
              <path fill-rule="evenodd"
                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
            </svg>
            シリーズ一覧
            </Link>
          </span>
        </div>
        <div class="flex overflow-x-scroll h-56 mx-4">
          <ul class="flex flex-none flex-wrap space-x-4">
            <li v-for="dugaseries in dugaseriess" :key="dugaseries.id" class="">
              <a :href="route('dlist.show', { sort: 'series', keyword: dugaseries.series })"
                class="text-blue-500 text-center inline-block hover:text-red-500">
                <img v-if="dugaseries.jacketimage" :src="dugaseries.jacketimage"
                  :alt="'【DUGA】シリーズ「' + dugaseries.series + '」'" class="h-44">
                <img v-else :src="dugaseries.posterimage" :alt="'【DUGA】シリーズ「' + dugaseries.series + '」'"
                  class="h-44 w-32">
                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                  {{ dugaseries.series }}
                </span>
              </a>
            </li>
          </ul>
        </div>
      </section>
    </article>
  </Layout>
</template>