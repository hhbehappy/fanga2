<script setup>
import Layout from '@/Layouts/Layout.vue';
import { router, Head, Link, useForm  } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import NiceFlashMessage from '@/Components/NiceFlashMessage.vue';

const props = defineProps({
  id: Number,
  dugavideos: Object,
  title: String,
  date: String,
  duga_id: Number,
  productid: String,
  re_productid: String,
  duga_free_memos: Object,
  duga_release_memos: Object,
  duga_private_memos: Object,
  releaselists: Object,
  auth_id: Number,
  nice: Object,
  nicecount: Number,
  privatememolimit: Number
})

const form = useForm({
  free: null,
  release: null,
  private: null,
  nickname: 1
});

const isShow = ref(false)
const toggleStatus = () => { isShow.value = !isShow.value}

const submitFunction = () => {
  form.post('/dugafreememo/store/' + props.duga_id + '/' + props.productid, {
    onSuccess: () => form.reset('free', 'release', 'private'),
    preserveScroll: true
  })
}
const submitFunction2 = () => {
  form.post('/dugareleasememo/store/' + props.duga_id + '/' + props.productid, {
    onSuccess: () => form.reset('free', 'release', 'private'),
    preserveScroll: true
  })
}
const submitFunction3 = () => {
  form.post('/dugaprivatememo/store/' + props.duga_id + '/' + props.productid, {
    onSuccess: () => form.reset('free', 'release', 'private'),
    preserveScroll: true
  })
}

const destroyFreeMemo = id => {
    router.delete(`/dugafreememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};

const destroyReleaseMemo = id => {
    router.delete(`/dugareleasememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};

const destroyPrivateMemo = id => {
    router.delete(`/dugaprivatememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};
</script>

<script>
export default {
  name: "memo-tabs",
  data() {
    return {
      openTab: 1
    }
  },
  methods: {
    toggleTabs: function(tabNumber){
      this.openTab = tabNumber
    }
  }
}
</script>

<template>
  <Head :title="'【DUGA】' + title" />

<Layout>
  <div v-for="dugavideo in dugavideos" :key="dugavideo.id" class="">
    <h1 class="font-bold md:text-xl mb-8 px-4 md:mr-8 bg-gray-200 p-2 border-b-2 border-gray-500"><span class="text-red-500">【DUGA】</span>{{ dugavideo.title }}</h1>
    <p class="mb-7"><NiceFlashMessage /></p>
    <div class="container mx-auto flex flex-wrap md:flex-nowrap mb-4">
      <div class="mb-6 mx-14 md:mx-2 w-[190px] shrink-0">
        <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-1">
          <img v-if="dugavideo.jacketimage" :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + dugavideo.title" class="h-64">
          <img v-else :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/240x180.jpg'" :alt="'【DUGA】' + dugavideo.title" class="">
          <span class="text-sm text-blue-600">イメージを拡大する</span>
        </button>
      </div>
      <div class="mx-6 lg:ml-6 w-full md:w-3/5 lg:w-[330px] md:shrink-0">
          <div v-if="$page.props.auth.user" class="my-2">
            <div v-if="nice" class="w-44 px-1 border-b border-pink-400">
              <Link :href="route('unnice', { content_id: dugavideo.productid})">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm">気になる動画をやめる</span>
              </Link>
          </div>
          <div v-else class="w-52 px-2 border-b border-pink-400">
              <Link :href="route('nice', { content_id: dugavideo.productid, fanza_id: '1', duga_id: props.duga_id, type : 'duga' })">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
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
                  <span v-if="dugavideo.performer" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('dlist.show', { keyword: dugavideo.performer })">{{ dugavideo.performer }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr class="">
                <td class="w-24 h-10 py-2 text-sm">シリーズ</td>
                <td>
                  <span v-if="dugavideo.series" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('dlist.show', { keyword: dugavideo.series })">{{ dugavideo.series }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">メーカー</td>
                <td>
                  <span v-if="dugavideo.maker" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('dlist.show', { keyword: dugavideo.maker })">{{ dugavideo.maker }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">レーベル</td>
                <td>
                  <span v-if="dugavideo.label" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('dlist.show', { keyword: dugavideo.label })">{{ dugavideo.label }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">監督</td>
                <td>
                  <span v-if="dugavideo.director" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('dlist.show', { keyword: dugavideo.director })">{{ dugavideo.director }}</a></span>
                  <span v-else class="text-2xl">----</span>
                  </td>
              </tr>
              <tr>
                <td class="w-24 h-10 text-sm">カテゴリ</td>
                <td class="py-2">
                  <div v-if="dugavideo.category" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('dlist.show', { keyword: dugavideo.category })">{{ dugavideo.category }}</a></div>
                  <div v-else></div>
                </td>
              </tr>
              <tr>
                <td>
                  配信元
                </td>
                <td>
                  <a :href="'https://click.duga.jp/ppv/' + dugavideo.productid + '/13153-31'" target="_blank" rel="noopener" class="text-blue-500">DUGA</a>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="hidden lg:block w-full mr-12">
        <video controls playsinline :poster="'https://affsample.duga.jp/unsecure/' + dugavideo.productid + '/noauth/flvcap.jpg'" preload="metadata">
        <source :src="'https://affsample.duga.jp/unsecure/' + dugavideo.productid + '/noauth/movie.mp4'"/>
        </video>
      </div>
    </div>
    <div v-if="dugavideo.caption" class="m-6 py-2 border-y-2 boeder-gray-200">
      <p class="mb-3 pl-2 font-bold text-sm border-b-2 border-red-200 w-64">公式サイトに掲載されている作品紹介</p>
      {{ dugavideo.caption }}
    </div>
    <!-- 画像リスト -->
    <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-2" class="w-screen md:w-full">
      <div class="flex overflow-x-scroll m-6 pb-3 hidden-scrollbar">
        <div class="flex flex-none flex-nowrap">
          <div v-if="dugavideo.jacketimage" class="w-36 mr-5">
            <img :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket.jpg'" :alt="'【DUGA】' + dugavideo.title + 'のジャケット画像'" class="h-[6rem] -mb-1">
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
          <div class="w-20 ml-4 mt-4">
            <a :href="dugavideo.affiliateurl" target="_blank" rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ml-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
            </svg>
            <span class="text-xs text-blue-500">詳細ページへ</span>
            </a>
          </div>
        </div>
      </div>
    </button>
    <!-- サンプル動画 -->
    <div class="block lg:hidden w-3/5 mx-auto">
      <video controls playsinline :poster="'https://affsample.duga.jp/unsecure/' + dugavideo.productid + '/noauth/flvcap.jpg'" preload="metadata">
        <source :src="'https://affsample.duga.jp/unsecure/' + dugavideo.productid + '/noauth/movie.mp4'"/>
      </video>
    </div>
    <!-- メモ -->
    <div id="memo" class="flex border-b-4 border-gray-500 mx-3 mt-7 justify-between items-end">
      <h2 class="ml-4 mb-1 text-2xl font-bold">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
        </svg>
        メモ
      </h2>
      <p class="mr-5 text-blue-500">
        <Link :href="route('dvideo.memotype', { id: dugavideo.productid })" class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 -mr-1 inline-block">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
          </svg>
          メモの種類について
        </Link>
      </p>
    </div>
    <!-- 非公開メモ -->
    <div class="flex flex-col justify-center mx-auto my-2">
      <div v-for="duga_private_memo in duga_private_memos" :key="duga_private_memo.id">
        <div class="border-dotted border-b border-gray-500 p-2 mx-5">
          <div class="flex flex-wrap mb-3 justify-between items-center">
            <div>
              <span class="bg-red-200 p-1 px-3 rounded-2xl text-xs font-bold">{{ duga_private_memo.name }}さんの非公開メモ</span>
              <span class="w-28 mt-2 ml-4 text-sm text-zinc-500 inline-block">
              {{ duga_private_memo.updated_at }}
              </span>
            </div>
            <div class="flex">
              <Link as="button" :href="route('dvideo.edit', { type: 'private', productid: duga_private_memo.productid, memoid: duga_private_memo.id}) + '#editmemo'">
                  <button type="button" class="mt-2 mx-2 px-3 py-1 bg-green-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-4 mr-1 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  編集
                </button>
              </Link>
              <button type="button" @click="destroyPrivateMemo(duga_private_memo.id)" class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                削除
              </button>
            </div>
          </div>
          <div class="w-full whitespace-pre-line">
            {{ duga_private_memo.private }}
          </div>
        </div>
      </div>
    </div>
    <!-- 公開メモ -->
    <div class="flex flex-col justify-center mx-auto my-2">
      <div v-for="duga_release_memo in duga_release_memos" :key="duga_release_memo.id">
        <div v-if="duga_release_memo.release" class="border-dotted border-b border-gray-500 p-2 mx-5">
          <div class="flex flex-wrap mb-3 justify-between items-center">
            <div>
              <span v-if="duga_release_memo.nickname === 1 && duga_release_memo.user_id != NULL" class="bg-blue-200 p-1 px-3 rounded-2xl text-xs font-bold">{{ duga_release_memo.name }}さんのメモ</span>
              <span v-else-if="duga_release_memo.nickname === 0 && duga_release_memo.user_id != NULL" class="bg-blue-200 p-1 px-3 rounded-2xl text-xs font-bold">ログインユーザーのメモ</span>
              <span v-else class="bg-blue-200 p-1 px-3 rounded-2xl text-xs font-bold">退会済みユーザーのメモ</span>
              <span class="w-28 mt-2 ml-4 text-sm text-zinc-500 inline-block">
              {{ duga_release_memo.updated_at }}
              </span>
            </div>
            <div v-if="props.auth_id === 1" class="flex">
              <Link as="button" :href="route('dvideo.edit', { type: 'release', productid: dugavideo.productid, memoid: duga_release_memo.id}) + '#editmemo'">
                <button type="button" class="mt-2 mx-2 px-3 py-1 bg-green-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-4 mr-1 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  編集
                </button>
              </Link>
              <button type="button" @click="destroyReleaseMemo(duga_release_memo.id)" class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                削除
              </button>
            </div>
          </div>
          <div class="w-full whitespace-pre-line">
            {{ duga_release_memo.release }}
          </div>
        </div>
      </div>
    </div>
    <!-- フリーメモ -->
    <div class="flex flex-col justify-center mx-auto my-2">
      <div v-for="duga_free_memo in duga_free_memos" :key="duga_free_memo.id" class="border-dotted border-b border-gray-500 p-2 mx-5">
        <div class="flex flex-wrap mb-3 justify-between items-center">
          <div>
            <span class="bg-amber-200 p-1 px-3 rounded-2xl text-xs font-bold">フリーメモ</span><span class="w-28 mt-2 ml-4 text-sm text-zinc-500 inline-block">
            {{ duga_free_memo.updated_at }}
            </span>
          </div>
          <button type="button" @click="destroyFreeMemo(duga_free_memo.id)" class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            削除
          </button>
        </div>
        <div class="w-full whitespace-pre-line">
            {{ duga_free_memo.free }}
        </div>
      </div>
    </div>
    <!-- 投稿用メモのタブ -->
    <div class="flex flex-wrap justify-center h-96 mb-6">
      <div class="w-11/12">
        <InputError class="my-4 text-center text-xl" :message="form.errors.free" />
        <InputError class="my-4 text-center text-xl" :message="form.errors.release" />
        <InputError class="my-4 text-center text-xl" :message="form.errors.private" />
        <FlashMessage />
        <ul class="flex mb-0 list-none flex-wrap pt-3 pb-2 flex-row text-xs md:text-base cursor-pointer">
          <li class="-mb-px flex-auto text-center w-1/3">
            <a class="font-bold uppercase pr-2 py-2 shadow-md rounded block leading-normal" @click="toggleTabs(1)" :class="{'text-black bg-gray-200': openTab !== 1, 'text-black bg-amber-200': openTab === 1}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1 mb-1 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>
              フリーメモ
            </a>
          </li>
          <li v-if="$page.props.auth.user" class="-mb-px flex-auto text-center w-1/3 px-2">
            <a class="font-bold uppercase pr-2 py-2 shadow-md rounded block leading-normal" @click="toggleTabs(2)" :class="{'text-black bg-gray-200': openTab !== 2, 'text-black bg-blue-200': openTab === 2}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1 mb-1 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>
              公開メモ
            </a>
          </li>
          <li v-if="$page.props.auth.user" class="-mb-px flex-auto text-center w-1/3">
            <a class="font-bold uppercase pr-2 py-2 shadow-md rounded block leading-normal" @click="toggleTabs(3)" :class="{'text-black bg-gray-200': openTab !== 3, 'text-black bg-red-200': openTab === 3}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1 mb-1 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>
              非公開メモ
            </a>
          </li>
        </ul>
        <div class="relative flex flex-col min-w-0 break-words bg-white">
          <div class="py-5 flex-auto">
            <div class="tab-content tab-space">
              <div :class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                <form @submit.prevent="submitFunction">
                  <div class="flex justify-center relative">
                    <div class="mb-3 w-full">
                      <textarea name="free" v-model="form.free" class="form-control block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none" id="free" rows="5" placeholder="フリーメモ">
                      </textarea><br>
                      <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out flex align-center absolute right-6">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download"
                          class="w-3 mt-1 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path fill="currentColor"
                            d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                          </path>
                        </svg>
                        送信
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div :class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                <form @submit.prevent="submitFunction2">
                  <div class="flex justify-center relative">
                    <div class="mb-3 w-full">
                      <textarea name="release" v-model="form.release" class="form-control block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none" id="release" rows="5" placeholder="公開メモ">
                      </textarea><br>
                      <div class="flex justify-end mr-40 items-center">
                        <div class="">
                          <div class="mb-1">
                            <label class="cursor-pointer text-sm">
                              <input type="radio" class="mr-2 mb-1" name="nickname" v-model="form.nickname" value="1" checked>ニックネームを使用する
                            </label>
                          </div>
                          <div class="">
                            <label class="cursor-pointer text-sm">
                              <input type="radio" class="mr-2 mb-1" name="nickname" v-model="form.nickname" value="0">ニックネームを使用しない
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out flex align-center absolute right-6">
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download"
                            class="w-3 mt-1 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                              d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                            </path>
                          </svg>
                          送信
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div :class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                <div v-if="props.privatememolimit < 2">
                  <form @submit.prevent="submitFunction3">
                    <div class="flex justify-center relative">
                      <div class="mb-3 w-full">
                        <textarea name="private" v-model="form.private" class="form-control block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none" id="private" rows="5" placeholder="非公開メモ">
                        </textarea><br>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out flex align-center absolute right-6">
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download"
                            class="w-3 mt-1 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                              d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                            </path>
                          </svg>
                          送信
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div v-else class="flex mt-10 justify-center">
                <p class="pl-2 text-center border-b-2 border-red-400">非公開メモは1作品につき2つまでとなっています。</p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 最近のメモ動画 -->
    <div class="border-b-4 border-gray-500 mb-8 mx-auto">
      <h2 class="ml-2 mb-1 text-xl font-bold"><span class="text-red-500">DUGA</span>の最近公開メモされた動画</h2>
    </div>
    <div class="flex overflow-x-auto hidden-scrollbar h-52 ml-4">
      <div class="flex flex-none flex-nowrap">
        <div v-for="releaselist in releaselists" :key="releaselist.productid" class="">
          <div class="mr-4">
            <Link :href="route('dvideo.show', { id: releaselist.productid })">
              <img v-if="releaselist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + releaselist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + releaselist.title" class="h-44">
              <img v-else :src="'https://pic.duga.jp/unsecure/' + releaselist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + releaselist.title" class="h-44 w-32">
            </Link>
          </div>
        </div>
      </div>    
    </div>
    <!-- モーダルウィンドウの中 -->
    <div v-show="isShow" class="modal" id="modal-2" aria-hidden="true" @click="toggleStatus">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container h-[40rem]" role="dialog" aria-modal="true" aria-labelledby="modal-2-title">
          <main class="modal__content" id="modal-2-content">
            <div class="flex overflow-x-scroll m-6 pb-6 hidden-scrollbar snap-x">
          <div class="flex flex-none flex-nowrap items-start snap-x">
            <div v-if="dugavideo.jacketimage" class="mr-3 snap-center">
            <img :src="'https://pic.duga.jp/unsecure/' + re_productid + '/noauth/jacket.jpg'" :alt="'【DUGA】' + dugavideo.title + 'のジャケット画像'" class="h-[20rem]">
          </div>
          <div v-if="dugavideo.thumbnail01" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail01" :alt="'【DUGA】' + dugavideo.title + 'の1枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail02" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail02" :alt="'【DUGA】' + dugavideo.title + 'の2枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail03" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail03" :alt="'【DUGA】' + dugavideo.title + 'の3枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail04" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail04" :alt="'【DUGA】' + dugavideo.title + 'の4枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail05" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail05" :alt="'【DUGA】' + dugavideo.title + 'の5枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail06" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail06" :alt="'【DUGA】' + dugavideo.title + 'の6枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail07" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail07" :alt="'【DUGA】' + dugavideo.title + 'の7枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail08" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail08" :alt="'【DUGA】' + dugavideo.title + 'の8枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail09" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail09" :alt="'【DUGA】' + dugavideo.title + 'の9枚目の画像'" class="h-[10rem]">
          </div>
          <div v-if="dugavideo.thumbnail10" class="mx-8 snap-center">
            <img :src="dugavideo.thumbnail10" :alt="'【DUGA】' + dugavideo.title + 'の10枚目の画像'" class="h-[10rem]">
          </div>
          <div class="w-20 ml-4 mt-12">
            <a :href="dugavideo.affiliateurl" target="_blank" rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ml-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
            </svg>
            <span class="text-xs text-white">詳細ページへ</span>
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
</Layout>
</template>