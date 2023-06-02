<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  videod: Object,
  videoids: Object,
  re_productid: String,
  memolistlatests: Object,
  releaselists: Object,
  memocount: Number
})

const isShow = ref(false)
const toggleStatus = () => { isShow.value = !isShow.value }

</script>

<template>
  <Layout>

    <Head :title="'【DUGA】' + videod.title + 'のメモ一覧《最新の50件》'" />

    <section class="">
      <h1 class="font-bold md:text-xl mb-10 px-4 md:mr-8 bg-gray-200 p-2 border-b-2 border-gray-500"><span
          class="text-red-500">【DUGA】</span>{{ props.videod.title }}</h1>
      <!-- 画像リスト -->
      <div v-for="videoid in videoids" :key="videoid.id">
        <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-2" class="w-screen md:w-full">
          <div class="flex overflow-x-scroll m-6 pb-3 hidden-scrollbar">
            <div class="flex flex-none flex-nowrap">
              <div v-if="videoid.jacketimage" class="w-36 mr-5">
                <img :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket.jpg'"
                  :alt="'【DUGA】' + videoid.title + 'のジャケット画像'" class="h-[6rem] -mb-1">
                <span class="text-xs text-blue-600">イメージを拡大する</span>
              </div>
              <div v-if="videoid.thumbnail01" class="mr-5">
                <img :src="videoid.thumbnail01" :alt="'【DUGA】' + videoid.title + 'の1枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail02" class="mr-5">
                <img :src="videoid.thumbnail02" :alt="'【DUGA】' + videoid.title + 'の2枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail03" class="mr-5">
                <img :src="videoid.thumbnail03" :alt="'【DUGA】' + videoid.title + 'の3枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail04" class="mr-5">
                <img :src="videoid.thumbnail04" :alt="'【DUGA】' + videoid.title + 'の4枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail05" class="mr-5">
                <img :src="videoid.thumbnail05" :alt="'【DUGA】' + videoid.title + 'の5枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail06" class="mr-5">
                <img :src="videoid.thumbnail06" :alt="'【DUGA】' + videoid.title + 'の6枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail07" class="mr-5">
                <img :src="videoid.thumbnail07" :alt="'【DUGA】' + videoid.title + 'の7枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail08" class="mr-5">
                <img :src="videoid.thumbnail08" :alt="'【DUGA】' + videoid.title + 'の8枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail09" class="mr-5">
                <img :src="videoid.thumbnail09" :alt="'【DUGA】' + videoid.title + 'の9枚目の画像'" class="h-[5rem]">
              </div>
              <div v-if="videoid.thumbnail10" class="mr-5">
                <img :src="videoid.thumbnail10" :alt="'【DUGA】' + videoid.title + 'の10枚目の画像'" class="h-[5rem]">
              </div>
              <div class="flex w-32 mt-4 justify-center text-blue-500 hover:underline hover:text-red-500">
                <a :href="'https://click.duga.jp/ppv/' + videoid.productid + '/13153-36'" target="_blank" rel="noopener">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 ml-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                  </svg>
                  <span class="font-semibold text-sm">DUGAで見る</span>
                </a>
              </div>
            </div>
          </div>
        </button>
        <!-- モーダルウィンドウの中 -->
        <div v-show="isShow" class="modal relative z-40" id="modal-2" aria-hidden="true" @click="toggleStatus">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container h-[40rem]" role="dialog" aria-modal="true" aria-labelledby="modal-2-title">
              <main class="modal__content" id="modal-2-content">
                <div class="flex overflow-x-scroll m-6 pb-6 hidden-scrollbar snap-x">
                  <div class="flex flex-none flex-nowrap items-start snap-x">
                    <div v-if="videoid.jacketimage" class="mr-3">
                      <img :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket.jpg'"
                        :alt="'【DUGA】' + videoid.title + 'のジャケット画像'" class="h-[20rem]">
                    </div>
                    <div v-if="videoid.thumbnail01" class="mx-8">
                      <img :src="videoid.thumbnail01" :alt="'【DUGA】' + videoid.title + 'の1枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail02" class="mx-8">
                      <img :src="videoid.thumbnail02" :alt="'【DUGA】' + videoid.title + 'の2枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail03" class="mx-8">
                      <img :src="videoid.thumbnail03" :alt="'【DUGA】' + videoid.title + 'の3枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail04" class="mx-8">
                      <img :src="videoid.thumbnail04" :alt="'【DUGA】' + videoid.title + 'の4枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail05" class="mx-8">
                      <img :src="videoid.thumbnail05" :alt="'【DUGA】' + videoid.title + 'の5枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail06" class="mx-8">
                      <img :src="videoid.thumbnail06" :alt="'【DUGA】' + videoid.title + 'の6枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail07" class="mx-8">
                      <img :src="videoid.thumbnail07" :alt="'【DUGA】' + videoid.title + 'の7枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail08" class="mx-8">
                      <img :src="videoid.thumbnail08" :alt="'【DUGA】' + videoid.title + 'の8枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail09" class="mx-8">
                      <img :src="videoid.thumbnail09" :alt="'【DUGA】' + videoid.title + 'の9枚目の画像'" class="h-[10rem]">
                    </div>
                    <div v-if="videoid.thumbnail10" class="mx-8">
                      <img :src="videoid.thumbnail10" :alt="'【DUGA】' + videoid.title + 'の10枚目の画像'" class="h-[10rem]">
                    </div>
                    <div class="w-36 ml-10 mt-12 text-white hover:underline hover:text-red-500">
                      <a :href="'https://click.duga.jp/ppv/' + videoid.productid + '/13153-37'" target="_blank"
                        rel="noopener">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="w-8 h-8 ml-5">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                        </svg>
                        <span class="font-bold text-sm">DUGAで見る</span>
                      </a>
                    </div>
                  </div>
                </div>
              </main>
            </div>
          </div>
        </div>
        <!-- モーダルウィンドウの中 -->
        <div class="my-14 md:mr-8 z-0">
          <ul class="flex flex-wrap px-5 text-center font-mono text-gray-800 justify-center md:justify-start">
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <Link :href="route('dvideo.show', { id: videoid.productid })"
                class="pt-1 absolute top-0 left-0 w-full h-full">詳細ページへ</Link>
            </li>
            <li class="h-9 w-1/2 md:w-40 py-1 text-white border-2 border-gray-400 bg-red-500">
              最新の50件
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <Link :href="route('dmemo.memoListSort', { productid: videoid.productid, sort: 'oldest' })"
                class="pt-1 absolute top-0 left-0 w-full h-full">はじめから全部</Link>
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <Link :href="route('dmemo.memoListSort', { productid: videoid.productid, sort: 'latest' })"
                class="pt-1 absolute top-0 left-0 w-full h-full">おわりから全部</Link>
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <a :href="route('dmemo.memoListChunk', { productid: videoid.productid })"
                class="pt-1 absolute top-0 left-0 w-full h-full">100件ずつ見る</a>
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <a :href="'https://click.duga.jp/ppv/' + videoid.productid + '/13153-38'" rel="nofollow" target="_blank"
                class="pt-1 absolute top-0 left-0 w-full h-full">DUGAで見る</a>
            </li>
          </ul>
        </div>
      </div>
      <h2 class="md:mr-8 text-center text-lg font-bold border-b-2 border-gray-500">メモ一覧
        <span>《最新の50件》</span>
      </h2>
      <div class="flex flex-col-reverse p-1 justify-center mx-auto md:mr-8">
        <div v-for="memolistlatest in memolistlatests" :key="memolistlatest.id">
          <div class="border-dotted border-b border-gray-500 p-2">
            <div class="flex flex-wrap mb-3 justify-between items-center">
              <div>
                <span v-if="memolistlatest.user_id && memolistlatest.nickname === 1" class="text-sm font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mb-1 text-blue-400 inline-block">
                    <path fill-rule="evenodd"
                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                      clip-rule="evenodd" />
                    <path
                      d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                  </svg>
                  {{ memolistlatest.name }}
                </span>
                <span v-else-if="memolistlatest.user_id && memolistlatest.nickname === 0" class="text-sm font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mb-1 text-green-500 inline-block">
                    <path fill-rule="evenodd"
                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                      clip-rule="evenodd" />
                    <path
                      d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                  </svg>
                  ログインユーザー
                </span>
                <span v-else class="text-sm font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mb-1 text-gray-400 inline-block">
                    <path fill-rule="evenodd"
                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                      clip-rule="evenodd" />
                    <path
                      d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                  </svg>
                  退会済みユーザー
                </span>
                <span class="w-44 mt-2 ml-4 text-sm text-zinc-500 inline-block">
                  {{ memolistlatest.updated_at }}
                </span>
              </div>
            </div>
            <div class="w-full whitespace-pre-line break-all">
              <p v-if="memolistlatest.f_position === 'top' && memolistlatest.f_link" class="mb-3">>> No.
                <Link
                  :href="route('fmemo.memoListSort', { sort: 'oldest', content_id: memolistlatest.f_link }) + '#f-' + memolistlatest.f_no"
                  class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
                F-{{ memolistlatest.f_no }}
                </Link>
              </p>
              <p v-if="memolistlatest.d_position === 'top' && memolistlatest.d_link" class="mb-3">>> No.
                <Link
                  :href="route('dmemo.memoListSort', { sort: 'oldest', productid: memolistlatest.d_link }) + '#d-' + memolistlatest.d_no"
                  class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
                D-{{ memolistlatest.d_no }}
                </Link>
              </p>
              {{ memolistlatest.release }}
              <p v-if="memolistlatest.f_position === 'bottom' && memolistlatest.f_link" class="mt-3">>> No.
                <Link
                  :href="route('fmemo.memoListSort', { sort: 'oldest', content_id: memolistlatest.f_link }) + '#f-' + memolistlatest.f_no"
                  class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
                F-{{ memolistlatest.f_no }}
                </Link>
              </p>
              <p v-if="memolistlatest.d_position === 'bottom' && memolistlatest.d_link" class="mt-3">>> No.
                <Link
                  :href="route('dmemo.memoListSort', { sort: 'oldest', productid: memolistlatest.d_link }) + '#d-' + memolistlatest.d_no"
                  class="ml-1 text-blue-500 hover:text-red-500 hover:underline">
                D-{{ memolistlatest.d_no }}
                </Link>
              </p>
              <p class="flex text-xs text-gray-500 font-mono justify-end">
                No.D-{{ memolistlatest.id }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- MENU -->
      <div v-for="videoid in videoids" :key="videoid.id">
        <div v-if="memocount >= 30" class="my-14 md:mr-8 z-0">
          <ul class="flex flex-wrap px-5 text-center font-mono text-gray-800 justify-center md:justify-start">
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <Link :href="route('dvideo.show', { id: videoid.productid })"
                class="pt-1 absolute top-0 left-0 w-full h-full">詳細ページへ</Link>
            </li>
            <li class="h-9 w-1/2 md:w-40 py-1 text-white border-2 border-gray-400 bg-red-500">
              最新の50件
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <Link :href="route('dmemo.memoListSort', { productid: videoid.productid, sort: 'oldest' })"
                class="pt-1 absolute top-0 left-0 w-full h-full">はじめから全部</Link>
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <Link :href="route('dmemo.memoListSort', { productid: videoid.productid, sort: 'latest' })"
                class="pt-1 absolute top-0 left-0 w-full h-full">おわりから全部</Link>
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <a :href="route('dmemo.memoListChunk', { productid: videoid.productid })"
                class="pt-1 absolute top-0 left-0 w-full h-full">100件ずつ見る</a>
            </li>
            <li
              class="h-9 w-1/2 md:w-40 py-1 hover:text-white border-2 border-gray-400 bg-gray-200 hover:bg-red-500 relative">
              <a :href="'https://click.duga.jp/ppv/' + videoid.productid + '/13153-39'" rel="nofollow" target="_blank"
                class="pt-1 absolute top-0 left-0 w-full h-full">DUGAで見る</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- 最近のメモ動画 -->
      <div class="flex flex-wrap mt-16 mb-4 md:mr-8 mx-auto border-b-4 border-gray-500 items-center">
        <h2 class="ml-3 mb-1 text-xl font-bold">最近メモされた動画</h2>
        <a :href="route('dmemo.memoAll')" class="ml-auto px-6 text-blue-500 hover:underline hover:text-red-500">
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
      <div class="flex flex-wrap justify-center md:justify-start">
        <div v-for="releaselist in releaselists" :key="releaselist.id">
          <div class="m-2">
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
    </section>
  </Layout>
</template>