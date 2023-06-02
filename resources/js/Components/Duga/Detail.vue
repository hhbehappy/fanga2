<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import NiceFlashMessage from '@/Components/NiceFlashMessage.vue';

const props = defineProps({
  videod: Object,
  dugavideos: Object,
  date: String,
  re_productid: String,
  nice: Object,
  nicecount: Number
})

const isShow = ref(false)
const toggleStatus = () => { isShow.value = !isShow.value }

</script>

<template>
  <div v-for="dugavideo in dugavideos" :key="dugavideo.id" class="">
    <section>
      <h1 class="font-bold md:text-xl mb-8 px-4 md:mr-8 bg-gray-200 p-2 border-b-2 border-gray-500"><span
          class="text-red-500">【DUGA】</span>{{ dugavideo.title }}</h1>
      <p class="mb-7">
        <NiceFlashMessage />
      </p>
      <div class="container mx-auto flex flex-wrap md:flex-nowrap mb-4">
        <div class="mb-6 mx-14 md:mx-2 w-[190px] shrink-0">
          <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-1">
            <img v-if="dugavideo.jacketimage"
              :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket_240.jpg'"
              :alt="'【DUGA】' + dugavideo.title + 'のジャケット画像'" class="h-64">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/240x180.jpg'"
              :alt="'【DUGA】' + dugavideo.title + 'のジャケット画像'" class="">
            <span class="text-sm text-blue-600 hover:underline hover:text-red-500">イメージを拡大する</span>
          </button>
        </div>
        <div class="mx-6 lg:ml-6 w-full md:w-3/5 lg:w-[330px] md:shrink-0">
          <div v-if="$page.props.auth.user" class="my-2">
            <div v-if="nice" class="w-44 mb-4 pl-0.5 border border-gray-600 hover:border-red-500 hover:bg-red-50">
              <Link :href="route('dnice.destroy', { productid: dugavideo.productid })">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
                <path fill-rule="evenodd"
                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                  clip-rule="evenodd" />
              </svg>
              <span class="text-sm">気になる動画をやめる</span>
              </Link>
            </div>
            <div v-else class="w-48 mb-4 pl-0.5 border border-gray-600 hover:border-red-500 hover:bg-red-50">
              <Link :href="route('dnice.store', { productid: dugavideo.productid, duga_id: dugavideo.id })">
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
                  <span v-if="dugavideo.date" class="text-sm">{{ date }}</span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-8 py-2 text-sm">収録時間</td>
                <td>
                  <span v-if="dugavideo.volume" class="text-sm">{{ dugavideo.volume }}分</span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-8 py-2 text-sm">作品ID</td>
                <td>
                  <span v-if="dugavideo.productid" class="text-sm">{{ dugavideo.productid }}</span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">出演者</td>
                <td>
                  <span v-if="dugavideo.performer"
                    class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                    <a :href="route('dlist.show', { sort: 'performer', keyword: dugavideo.performer })">{{
                      dugavideo.performer }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr class="">
                <td class="w-24 h-10 py-2 text-sm">シリーズ</td>
                <td>
                  <span v-if="dugavideo.series"
                    class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                    <a :href="route('dlist.show', { sort: 'series', keyword: dugavideo.series })">{{ dugavideo.series
                    }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">メーカー</td>
                <td>
                  <span v-if="dugavideo.maker"
                    class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                    <a :href="route('dlist.show', { sort: 'maker', keyword: dugavideo.maker })">{{ dugavideo.maker
                    }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">レーベル</td>
                <td>
                  <span v-if="dugavideo.label"
                    class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                    <a :href="route('dlist.show', { sort: 'label', keyword: dugavideo.label })">{{ dugavideo.label
                    }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">監督</td>
                <td>
                  <span v-if="dugavideo.director"
                    class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm hover:border-red-200 hover:bg-red-50">
                    <a :href="route('dlist.show', { sort: 'director', keyword: dugavideo.director })">{{
                      dugavideo.director
                    }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 text-sm">カテゴリ</td>
                <td class="py-2">
                  <div v-if="dugavideo.category"
                    class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500 hover:border-red-200 hover:bg-red-50">
                    <a :href="route('dlist.show', { sort: 'category', keyword: dugavideo.category })">{{
                      dugavideo.category
                    }}</a>
                  </div>
                  <div v-else></div>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 text-sm">
                  配信サイト
                </td>
                <td>
                  <a :href="'https://click.duga.jp/ppv/' + dugavideo.productid + '/13153-31'" target="_blank"
                    rel="noopener" class="p-1 text-blue-500 rounded hover:bg-red-50 hover:border border-red-200">DUGA</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="hidden lg:block w-full mr-8">
          <video controls playsinline
            :poster="'https://affsample.duga.jp/unsecure/' + dugavideo.productid + '/noauth/flvcap.jpg'"
            preload="metadata">
            <source :src="'https://affsample.duga.jp/unsecure/' + dugavideo.productid + '/noauth/movie.mp4'" />
          </video>
        </div>
      </div>
      <!-- 作品紹介 -->
      <div v-if="dugavideo.caption" class="m-6 py-2 border-y-2 boeder-gray-200">
        <p class="mb-3 pl-2 font-bold text-sm border-b-2 border-red-200 w-64">公式サイトに掲載されている作品紹介</p>
        {{ dugavideo.caption }}
      </div>
      <!-- 画像リスト -->
      <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-2" class="w-screen md:w-full">
        <div class="flex overflow-x-scroll m-6 pb-3 hidden-scrollbar">
          <div class="flex flex-none flex-nowrap">
            <div v-if="dugavideo.jacketimage" class="w-36 mr-5">
              <img :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket.jpg'"
                :alt="'【DUGA】' + dugavideo.title + 'のジャケット画像'" class="h-[6rem] -mb-1">
              <span class="text-xs text-blue-600">イメージを拡大する</span>
            </div>
            <div v-if="dugavideo.thumbnail01" class="mr-5">
              <img :src="dugavideo.thumbnail01" :alt="'【DUGA】' + dugavideo.title + 'の1枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail02" class="mr-5">
              <img :src="dugavideo.thumbnail02" :alt="'【DUGA】' + dugavideo.title + 'の2枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail03" class="mr-5">
              <img :src="dugavideo.thumbnail03" :alt="'【DUGA】' + dugavideo.title + 'の3枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail04" class="mr-5">
              <img :src="dugavideo.thumbnail04" :alt="'【DUGA】' + dugavideo.title + 'の4枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail05" class="mr-5">
              <img :src="dugavideo.thumbnail05" :alt="'【DUGA】' + dugavideo.title + 'の5枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail06" class="mr-5">
              <img :src="dugavideo.thumbnail06" :alt="'【DUGA】' + dugavideo.title + 'の6枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail07" class="mr-5">
              <img :src="dugavideo.thumbnail07" :alt="'【DUGA】' + dugavideo.title + 'の7枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail08" class="mr-5">
              <img :src="dugavideo.thumbnail08" :alt="'【DUGA】' + dugavideo.title + 'の8枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail09" class="mr-5">
              <img :src="dugavideo.thumbnail09" :alt="'【DUGA】' + dugavideo.title + 'の9枚目の画像'" class="h-[5rem]">
            </div>
            <div v-if="dugavideo.thumbnail10" class="mr-5">
              <img :src="dugavideo.thumbnail10" :alt="'【DUGA】' + dugavideo.title + 'の10枚目の画像'" class="h-[5rem]">
            </div>
            <div class="flex w-32 mt-4 justify-center text-blue-500 hover:underline hover:text-red-500">
              <a :href="'https://click.duga.jp/ppv/' + dugavideo.productid + '/13153-32'" target="_blank" rel="noopener">
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
    </section>
    <!-- モーダルウィンドウの中 -->
    <div v-show="isShow" class="modal relative z-40" id="modal-2" aria-hidden="true" @click="toggleStatus">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container h-[40rem]" role="dialog" aria-modal="true" aria-labelledby="modal-2-title">
          <main class="modal__content" id="modal-2-content">
            <div class="flex overflow-x-scroll m-6 pb-6 hidden-scrollbar snap-x">
              <div class="flex flex-none flex-nowrap items-start snap-x">
                <div v-if="dugavideo.jacketimage" class="mr-3">
                  <img :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket.jpg'"
                    :alt="'【DUGA】' + dugavideo.title + 'のジャケット画像'" class="h-[20rem]">
                </div>
                <div v-if="dugavideo.thumbnail01" class="mx-8">
                  <img :src="dugavideo.thumbnail01" :alt="'【DUGA】' + dugavideo.title + 'の1枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail02" class="mx-8">
                  <img :src="dugavideo.thumbnail02" :alt="'【DUGA】' + dugavideo.title + 'の2枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail03" class="mx-8">
                  <img :src="dugavideo.thumbnail03" :alt="'【DUGA】' + dugavideo.title + 'の3枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail04" class="mx-8">
                  <img :src="dugavideo.thumbnail04" :alt="'【DUGA】' + dugavideo.title + 'の4枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail05" class="mx-8">
                  <img :src="dugavideo.thumbnail05" :alt="'【DUGA】' + dugavideo.title + 'の5枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail06" class="mx-8">
                  <img :src="dugavideo.thumbnail06" :alt="'【DUGA】' + dugavideo.title + 'の6枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail07" class="mx-8">
                  <img :src="dugavideo.thumbnail07" :alt="'【DUGA】' + dugavideo.title + 'の7枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail08" class="mx-8">
                  <img :src="dugavideo.thumbnail08" :alt="'【DUGA】' + dugavideo.title + 'の8枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail09" class="mx-8">
                  <img :src="dugavideo.thumbnail09" :alt="'【DUGA】' + dugavideo.title + 'の9枚目の画像'" class="h-[10rem]">
                </div>
                <div v-if="dugavideo.thumbnail10" class="mx-8">
                  <img :src="dugavideo.thumbnail10" :alt="'【DUGA】' + dugavideo.title + 'の10枚目の画像'" class="h-[10rem]">
                </div>
                <div class="w-36 ml-10 mt-12 text-white hover:underline hover:text-red-500">
                  <a :href="'https://click.duga.jp/ppv/' + dugavideo.productid + '/13153-33'" target="_blank"
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
  </div>
</template>