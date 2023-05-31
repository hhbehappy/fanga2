<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import NiceFlashMessage from '@/Components/NiceFlashMessage.vue';

const props = defineProps({
  videoa: Object,
  videoids: Object,
  date: String,
  nice: Object,
  nicecount: Number
})

const isShow = ref(false)
const toggleStatus = () => { isShow.value = !isShow.value }

</script>

<template>
  <div v-for="videoid in videoids" :key="videoid.id" class="">
    <h1 class="font-bold md:text-xl mb-8 px-4 md:mr-8 bg-gray-200 p-2 border-b-2 border-gray-500"><span
        class="text-red-500">【FANZA】</span>{{ videoid.title }}</h1>
    <p class="mb-7">
      <NiceFlashMessage />
    </p>
    <div class="container mx-auto flex flex-wrap md:flex-nowrap mb-4">
      <div class="mb-6 mx-10 md:mx-2 w-[190px] shrink-0">
        <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-1">
          <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'ps.jpg'"
            :alt="'【FANZA】' + videoid.title + 'のメイン画像'" class="h-56">
          <span class="text-sm text-blue-600 hover:underline hover:text-red-500">イメージを拡大する</span>
        </button>
      </div>
      <div class="mx-6 lg:ml-6 w-full md:w-3/5 lg:w-[380px] md:shrink-0">
        <div v-if="$page.props.auth.user" class="my-2">
          <div v-if="nice" class="w-44 mb-4 pl-0.5 border border-gray-600 hover:border-red-500 hover:bg-red-50">
            <Link :href="route('fnice.destroy', { content_id: videoid.content_id })">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
              <path fill-rule="evenodd"
                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                clip-rule="evenodd" />
            </svg>
            <span class="text-sm">気になる動画をやめる</span>
            </Link>
          </div>
          <div v-else class="w-48 pl-0.5 mb-4 border border-gray-600 hover:border-red-500 hover:bg-red-50">
            <Link :href="route('fnice.store', { content_id: videoid.content_id, fanza_id: props.videoa.id })">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
            </svg>
            <span class="text-sm">気になる動画に登録する</span>
            </Link>
          </div>
        </div>
        <div class="text-sm mb-2">気になる動画の登録数 : {{ nicecount }}</div>
        <table>
          <tbody>
            <tr>
              <td class="w-24 h-8 py-1 text-sm">配信開始日</td>
              <td>
                <span v-if="videoid.date" class="text-sm">{{ date }}</span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-8 py-2 text-sm">収録時間</td>
              <td>
                <span v-if="videoid.volume" class="text-sm">{{ videoid.volume }}分</span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-8 py-2 text-sm">品番</td>
              <td>
                <span v-if="videoid.content_id" class="text-sm">{{ videoid.content_id }}</span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-10 py-2 text-sm">出演者</td>
              <td>
                <span v-if="videoid.actress"
                  class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'actress', keyword: videoid.actress })">{{ videoid.actress
                  }}</a></span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr class="">
              <td class="w-24 h-10 py-2 text-sm">シリーズ</td>
              <td>
                <span v-if="videoid.series"
                  class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'series', keyword: videoid.series })">{{ videoid.series
                  }}</a></span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-10 py-2 text-sm">メーカー</td>
              <td>
                <span v-if="videoid.maker"
                  class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'maker', keyword: videoid.maker })">{{ videoid.maker
                  }}</a></span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-10 py-2 text-sm">レーベル</td>
              <td>
                <span v-if="videoid.label"
                  class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'label', keyword: videoid.label })">{{ videoid.label
                  }}</a></span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-10 py-2 text-sm">監督</td>
              <td>
                <span v-if="videoid.director"
                  class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'director', keyword: videoid.director })">{{ videoid.director
                  }}</a></span>
                <span v-else class="text-2xl">----</span>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-10 text-sm">ジャンル</td>
              <td class="py-2">
                <div v-if="videoid.genre"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre })">{{ videoid.genre }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre1"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre1 })">{{ videoid.genre1 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre2"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre2 })">{{ videoid.genre2 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre3"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre3 })">{{ videoid.genre3 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre4"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre4 })">{{ videoid.genre4 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre5"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre5 })">{{ videoid.genre5 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre6"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre6 })">{{ videoid.genre6 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre7"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre7 })">{{ videoid.genre7 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre8"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre8 })">{{ videoid.genre8 }}</a>
                </div>
                <div v-else></div>
                <div v-if="videoid.genre9"
                  class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                  <a :href="route('flist.show', { sort: 'genre', keyword: videoid.genre9 })">{{ videoid.genre9 }}</a>
                </div>
                <div v-else></div>
              </td>
            </tr>
            <tr>
              <td class="w-24 h-10 text-sm">
                配信サイト
              </td>
              <td>
                <a :href="'https://al.dmm.co.jp/?lurl=https%3A%2F%2Fwww.dmm.co.jp%2Fdigital%2Fvideoa%2F-%2Fdetail%2F%3D%2Fcid%3D' + videoid.content_id + '%2F&af_id=maxjpblog-017&ch=link_tool&ch_id=text'"
                  rel="nofollow" target="_blank"
                  class="p-1 text-blue-500 rounded hover:bg-red-50 hover:border border-red-200">FANZA</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="hidden lg:block w-full mr-8">
        <div style="width:100%; padding-top: 75%; position:relative;">
          <iframe width="85%" height="85%" max-width="1280px" style="position: absolute; top: 0; left: 0;"
            :src="'https://www.dmm.co.jp/litevideo/-/part/=/affi_id=maxjpblog-017/cid=' + videoid.content_id + '/size=1280_720/'"
            scrolling="no" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <!-- 画像リスト -->
    <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-1" class="w-screen md:w-full">
      <div class="flex overflow-x-scroll m-6 pb-3 hidden-scrollbar">
        <div class="flex flex-none flex-nowrap">
          <div class="w-36 mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'pl.jpg'"
              :alt="'【FANZA】' + videoid.title + 'のジャケット画像'" class="h-[6rem] -mb-1">
            <span class="text-xs text-blue-600 hover:underline hover:text-red-500">イメージを拡大する</span>
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-1.jpg'"
              :alt="'【FANZA】' + videoid.title + '1枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-2.jpg'"
              :alt="'【FANZA】' + videoid.title + '2枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-3.jpg'"
              :alt="'【FANZA】' + videoid.title + '3枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-4.jpg'"
              :alt="'【FANZA】' + videoid.title + '4枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-5.jpg'"
              :alt="'【FANZA】' + videoid.title + '5枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-6.jpg'"
              :alt="'【FANZA】' + videoid.title + '6枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-7.jpg'"
              :alt="'【FANZA】' + videoid.title + '7枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-8.jpg'"
              :alt="'【FANZA】' + videoid.title + '8枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-9.jpg'"
              :alt="'【FANZA】' + videoid.title + '9枚目の画像'" class="h-[6rem]">
          </div>
          <div class="mr-5">
            <img
              :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-10.jpg'"
              :alt="'【FANZA】' + videoid.title + '10枚目の画像'" class="h-[6rem]">
          </div>
          <div class="flex w-32 mr-12 mt-4 text-blue-500 hover:underline hover:text-red-500 justify-center">
            <a :href="'https://al.dmm.co.jp/?lurl=https%3A%2F%2Fwww.dmm.co.jp%2Fdigital%2Fvideoa%2F-%2Fdetail%2F%3D%2Fcid%3D' + videoid.content_id + '%2F&af_id=maxjpblog-017&ch=link_tool&ch_id=text'"
              rel="nofollow" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 ml-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
              </svg>
              <span class="font-semibold text-sm">FANZAで見る</span>
            </a>
          </div>
        </div>
      </div>
    </button>
    <!-- モーダルウィンドウの中 -->
    <div v-show="isShow" class="modal relative z-40" id="modal-1" aria-hidden="true" @click="toggleStatus">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container h-[40rem]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <main class="modal__content" id="modal-1-content">
            <div class="flex overflow-x-scroll m-6 pb-6 hidden-scrollbar snap-x">
              <div class="flex flex-none flex-nowrap items-start snap-x">
                <div class="mr-3">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'pl.jpg'"
                    :alt="'【FANZA】' + videoid.title + 'のジャケット画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-1.jpg'"
                    :alt="'【FANZA】' + videoid.title + '1枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-2.jpg'"
                    :alt="'【FANZA】' + videoid.title + '2枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-3.jpg'"
                    :alt="'【FANZA】' + videoid.title + '3枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-4.jpg'"
                    :alt="'【FANZA】' + videoid.title + '4枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-5.jpg'"
                    :alt="'【FANZA】' + videoid.title + '5枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-6.jpg'"
                    :alt="'【FANZA】' + videoid.title + '6枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-7.jpg'"
                    :alt="'【FANZA】' + videoid.title + '7枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-8.jpg'"
                    :alt="'【FANZA】' + videoid.title + '8枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-9.jpg'"
                    :alt="'【FANZA】' + videoid.title + '9枚目の画像'" class="h-[30rem]">
                </div>
                <div class="mx-10">
                  <img
                    :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-10.jpg'"
                    :alt="'【FANZA】' + videoid.title + '10枚目の画像'" class="h-[30rem]">
                </div>
                <div class="flex w-72 mx-3 text-white hover:underline hover:text-red-500 justify-center self-center">
                  <a :href="'https://al.dmm.co.jp/?lurl=https%3A%2F%2Fwww.dmm.co.jp%2Fdigital%2Fvideoa%2F-%2Fdetail%2F%3D%2Fcid%3D' + videoid.content_id + '%2F&af_id=maxjpblog-017&ch=link_tool&ch_id=text'"
                    rel="nofollow" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-12 h-12 ml-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                    </svg>
                    <span class="font-bold text-sm">FANZAで見る</span>
                  </a>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
    </div>
    <!-- モーダルウィンドウの中 -->
  </div>
</template>