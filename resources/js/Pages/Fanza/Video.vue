<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { router, Head, Link, useForm  } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
// import NiceFlashMessage from '@/Components/NiceFlashMessage.vue';

const props = defineProps({
  videoids: Object,
  title: String,
  date: String,
  fanza_id: Number,
  content_id: String,
  fanza_free_memos: Object,
  fanza_release_memos: Object,
  fanza_private_memos: Object,
  releaselists: Object,
  user_id: Number,
  // nice: Object,
  // nicecount: Number
})

const form = useForm({
  // content_id: props.content_id,
  free: null,
  release: null,
  private: null,
  nickname: 1
});

const isShow = ref(false)
const toggleStatus = () => { isShow.value = !isShow.value}

const submitFunction = () => {
  form.post('/fanzafreememo/store/' + props.fanza_id + '/' + props.content_id, {
    onSuccess: () => form.reset('free', 'release', 'private'),
    preserveScroll: true
  })
}
const submitFunction2 = () => {
  form.post('/fanzareleasememo/store/' + props.fanza_id + '/' + props.content_id, {
    onSuccess: () => form.reset('free', 'release', 'private'),
    preserveScroll: true
  })
}
const submitFunction3 = () => {
  form.post('/fanzaprivatememo/store/' + props.fanza_id + '/' + props.content_id, {
    onSuccess: () => form.reset('free', 'release', 'private'),
    preserveScroll: true
  })
}

const destroyFreeMemo = id => {
    router.delete(`/fanzafreememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};

const destroyReleaseMemo = id => {
    router.delete(`/fanzareleasememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};

const destroyPrivateMemo = id => {
    router.delete(`/fanzaprivatememo/destroy/${id}`, {
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
<BasicLayout>
  <Head :title="'【FANZA】' + title" />

  <div v-for="videoid in videoids" :key="videoid.id" class="">
    <h1 class="font-bold text-2xl mb-8 px-4 md:mr-8 bg-gray-200 p-2 border-b-2 border-gray-500"><span class="text-red-500">【FANZA】</span>{{ videoid.title }}</h1>
    <!-- <p class="mb-7"><NiceFlashMessage /></p> -->
    <div class="container mx-auto flex flex-wrap md:flex-nowrap mb-4">
      <div class="mx-14 md:mx-2 w-[190px] shrink-0">
        <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-1">
          <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id  + '/' + videoid.content_id + 'ps.jpg'" :alt="'【FANZA】' + videoid.title + 'のメイン画像'" class="h-56">
          <span class="text-sm text-blue-600">イメージを拡大する</span>
        </button>
        <div class="flex border border-black p-1 ml-1 my-6 rounded items-center w-40">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block text-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
            </svg>
            <span class="mx-1 text-sm"><a target="_self" rel="noopener" :href="'https://www.dmm.co.jp/litevideo/-/part/=/cid='+ videoid.content_id + '/size=560_360/affi_id=maxjpblog-995/'">無料サンプル動画</a></span>
        </div>
      </div>
        <!-- <div class="mx-6 lg:ml-6 w-full md:w-3/5 lg:w-[380px] md:shrink-0">
          <div v-if="$page.props.auth.user" class="my-2">
            <div v-if="nice && nice.user_id === privatememoid" class="w-44 px-1 border-b border-pink-400">
              <Link :href="route('unnice', { content_id: videoid.content_id})">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm">気になる動画をやめる</span>
              </Link>
          </div>
          <div v-else class="w-52 px-2 border-b border-pink-400">
              <Link :href="route('nice', { content_id: videoid.content_id, newvideo_id : 'fanza'})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 mb-0.5 w-4 h-4 text-pink-400 inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <span class="text-sm">気になる動画に登録する</span>
              </Link>
            </div>
          </div>
          <div class="text-sm mb-2">気になる動画の登録数 : {{ nicecount }}</div> -->
          <!-- <table>
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
                  <span v-if="videoid.actress" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('fvideo.show', { keyword: videoid.actress })">{{ videoid.actress }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr class="">
                <td class="w-24 h-10 py-2 text-sm">シリーズ</td>
                <td>
                  <span v-if="videoid.series" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('fvideo.show', { keyword: videoid.series })">{{ videoid.series }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">メーカー</td>
                <td>
                  <span v-if="videoid.maker" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('fvideo.show', { keyword: videoid.maker })">{{ videoid.maker }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">レーベル</td>
                <td>
                  <span v-if="videoid.label" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('fvideo.show', { keyword: videoid.label })">{{ videoid.label }}</a></span>
                  <span v-else class="text-2xl">----</span>
                </td>
              </tr>
              <tr>
                <td class="w-24 h-10 py-2 text-sm">監督</td>
                <td>
                  <span v-if="videoid.director" class="border border-gray-300 lg:border-none rounded p-1 text-blue-500 text-sm">
                    <a :href="route('fvideo.show', { keyword: videoid.director })">{{ videoid.director }}</a></span>
                  <span v-else class="text-2xl">----</span>
                  </td>
              </tr>
              <tr>
                <td class="w-24 h-10 text-sm">ジャンル</td>
                <td class="py-2">
                  <div v-if="videoid.genre" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre })">{{ videoid.genre }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre1" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre1 })">{{ videoid.genre1 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre2" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre2 })">{{ videoid.genre2 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre3" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre3 })">{{ videoid.genre3 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre4" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre4 })">{{ videoid.genre4 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre5" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre5 })">{{ videoid.genre5 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre6" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre6 })">{{ videoid.genre6 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre7" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre7 })">{{ videoid.genre7 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre8" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre8 })">{{ videoid.genre8 }}</a></div>
                  <div v-else></div>
                  <div v-if="videoid.genre9" class="inline-block border border-gray-300 lg:border-none rounded p-1 mr-2 mb-2 text-sm text-blue-500">
                    <a :href="route('fvideo.show', { keyword: videoid.genre9 })">{{ videoid.genre9 }}</a></div>
                  <div v-else></div>
                </td>
              </tr>
              <tr>
                <td>
                  配信元
                </td>
                <td>
                  <a :href="videoid.affiliateURL + '&af_id=maxjpblog-991&ch=api'" target="_blank" rel="noopener" class="text-blue-500">FANZA</a>
                </td>
              </tr>
            </tbody>
          </table> -->
    </div>
    <div class="hidden lg:block w-full ml-10 xl:ml-20">
      <div style="width:100%; padding-top: 75%; position:relative;">
        <iframe width="85%" height="85%" max-width="1280px" style="position: absolute; top: 0; left: 0;" :src="'https://www.dmm.co.jp/litevideo/-/part/=/affi_id=maxjpblog-001/cid=' + videoid.content_id + '/size=1280_720/'" scrolling="no" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
        <!-- 画像リスト -->
        <button @click="toggleStatus" type="button" data-micromodal-trigger="modal-1" class="w-screen md:w-full">
          <div class="flex overflow-x-scroll m-6 pb-3 hidden-scrollbar">
            <div class="flex flex-none flex-nowrap">
              <div class="w-36 mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'pl.jpg'" :alt="'【FANZA】' + videoid.title + 'のジャケット画像'" class="h-[6rem] -mb-1">
                <span class="text-xs text-blue-600">イメージを拡大する</span>
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-1.jpg'" :alt="'【FANZA】' + videoid.title + '1枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-2.jpg'" :alt="'【FANZA】' + videoid.title + '2枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-3.jpg'" :alt="'【FANZA】' + videoid.title + '3枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-4.jpg'" :alt="'【FANZA】' + videoid.title + '4枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-5.jpg'" :alt="'【FANZA】' + videoid.title + '5枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-6.jpg'" :alt="'【FANZA】' + videoid.title + '6枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-7.jpg'" :alt="'【FANZA】' + videoid.title + '7枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-8.jpg'" :alt="'【FANZA】' + videoid.title + '8枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-9.jpg'" :alt="'【FANZA】' + videoid.title + '9枚目の画像'" class="h-[6rem]">
              </div>
              <div class="mr-5">
                <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + '-10.jpg'" :alt="'【FANZA】' + videoid.title + '10枚目の画像'" class="h-[6rem]">
              </div>
              <div class="w-30 mr-12 mt-4">
                <a :href="videoid.affiliateURL + '&af_id=maxjpblog-999&ch=api'" target="_blank" rel="noopener">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 ml-3">
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
      <div style="width:100%; padding-top: 75%; position:relative;">
        <iframe width="85%" height="85%" max-width="1280px" style="position: absolute; top: 0; left: 0;" :src="'https://www.dmm.co.jp/litevideo/-/part/=/affi_id=maxjpblog-001/cid=' + videoid.content_id + '/size=1280_720/'" scrolling="no" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <!-- メモ -->
    <div id="memo" class="flex border-b-4 border-gray-500 mx-3 mt-5 justify-between items-end">
      <h2 class="ml-4 mb-1 text-2xl font-bold">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
        </svg>
        メモ
      </h2>
      <p class="mr-5 text-blue-500">
        <!-- <Link :href="route('fvideo.memotype', { id: videoid.content_id })" class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-1 -mr-1 inline-block">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
          </svg>
          メモの種類について
        </Link> -->
      </p>
    </div>
  <!-- 非公開メモ -->
  <div class="flex flex-col justify-center mx-auto my-2">
    <div v-for="fanza_private_memo in fanza_private_memos" :key="fanza_private_memo.id" class="border-dotted border-b border-gray-500 p-2 mx-5">
        <div class="flex flex-wrap mb-3 justify-between items-center">
          <div>
            <span class="bg-red-200 p-1 px-3 rounded-2xl text-xs font-bold">
              {{ fanza_private_memo.name }}さんの非公開メモ</span>
            <span class="w-28 mt-2 ml-4 text-sm text-zinc-500 inline-block">
              {{ fanza_private_memo.updated_at }}</span>
          </div>
            <div class="flex">
              <Link as="button" :href="route('fvideo.edit', { type: 'private', content_id: fanza_private_memo.content_id, memoid: fanza_private_memo.id}) + '#editmemo'">
                  <button type="button" class="mt-2 mx-2 px-3 py-1 bg-green-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-4 mr-1 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  編集
                </button>
              </Link>
              <button type="button" @click="destroyPrivateMemo(fanza_private_memo.id)" class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                削除
              </button>
            </div>
        </div>
        <div class="w-full whitespace-pre-line">
          {{ fanza_private_memo.private }}
        </div>
    </div>
  </div>
  <!-- 公開メモ -->
  <div class="flex flex-col justify-center mx-auto my-2">
    <div v-for="fanza_release_memo in fanza_release_memos" :key="fanza_release_memo.id">
      <div v-if="fanza_release_memo.release" class="border-dotted border-b border-gray-500 p-2 mx-5">
        <div class="flex flex-wrap mb-3 justify-between items-center">
          <div>
            <span v-if="fanza_release_memo.nickname === 1" class="bg-blue-200 p-1 px-3 rounded-2xl text-xs font-bold">{{ fanza_release_memo.name }}さんのメモ</span>
            <span v-else-if="fanza_release_memo.nickname === 0" class="bg-blue-200 p-1 px-3 rounded-2xl text-xs font-bold">ログインユーザーのメモ</span>
            <span class="w-28 mt-2 ml-4 text-sm text-zinc-500 inline-block">
            {{ fanza_release_memo.updated_at }}
            </span>
          </div>
          <div v-if="fanza_release_memo.user_id === props.user_id" class="flex">
            <Link as="button" :href="route('fvideo.edit', { type: 'release', content_id: videoid.content_id, memoid: fanza_release_memo.id}) + '#editmemo'">
              <button type="button" class="mt-2 mx-2 px-3 py-1 bg-green-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-4 mr-1 inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                編集
              </button>
            </Link>
            <button type="button" @click="destroyReleaseMemo(fanza_release_memo.id)" class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              削除
            </button>
          </div>
        </div>
        <div class="w-full whitespace-pre-line">
          {{ fanza_release_memo.release }}
        </div>
      </div>
    </div>
  </div>
  <!-- フリーメモ -->
  <div class="flex flex-col justify-center mx-auto my-2">
    <div v-for="fanza_free_memo in fanza_free_memos" :key="fanza_free_memo.id" class="border-dotted border-b border-gray-500 p-2 mx-5">
      <div class="flex flex-wrap mb-3 justify-between items-center">
        <div>
          <span class="bg-amber-200 p-1 px-3 rounded-2xl text-xs font-bold">フリーメモ</span>
          <span class="w-28 mt-2 ml-4 text-sm text-zinc-500 inline-block">
          {{ fanza_free_memo.updated_at }}
          </span>
        </div>
        <button type="button" @click="destroyFreeMemo(fanza_free_memo.id)" class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          削除
        </button>
      </div>
      <div class="w-full whitespace-pre-line">
        {{ fanza_free_memo.free }}
      </div>
    </div>
  </div>
  <!-- 投稿用メモのタブ -->
  <div class="flex flex-wrap justify-center h-96 mb-6">
    <div class="w-11/12">
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
                    <InputError class="mb-4 text-center" :message="form.errors.free" />
                    <FlashMessage class="mb-4" />
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
                    <InputError class="mb-4 text-center" :message="form.errors.release" />
                    <FlashMessage />
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
              <form @submit.prevent="submitFunction3">
                <div class="flex justify-center relative">
                  <div class="mb-3 w-full">
                    <InputError class="mb-4 text-center" :message="form.errors.private" />
                    <FlashMessage />
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 最近のメモ動画 -->
  <div class="border-b-4 border-gray-500 mb-8 w-11/12 mx-auto">
    <h2 class="ml-4 mb-1 text-xl font-bold"><span class="text-red-500">FANZA</span>の最近メモされた動画</h2>
  </div>
  <div class="flex overflow-x-auto hidden-scrollbar h-52 ml-4">
    <div class="flex flex-none flex-nowrap">
      <div v-for="releaselist in releaselists" :key="releaselist.id" class="">
          <div v-if="releaselist.content_id" class="mr-4">
            <Link :href="route('fvideo.show', { id: releaselist.content_id })">
              <img :src="'https://pics.dmm.co.jp/digital/video/' + releaselist.content_id  + '/' + releaselist.content_id + 'ps.jpg'" :alt="'【FANZA】' + videoid.title" class="w-32">
            </Link>
          </div>
      </div>
    </div>
  </div>
  <!-- モーダルウィンドウの中 -->
  <div v-show="isShow" class="modal" id="modal-1" aria-hidden="true" @click="toggleStatus">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container h-[40rem]" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <main class="modal__content" id="modal-1-content">
          <div class="flex overflow-x-scroll m-6 pb-6 hidden-scrollbar snap-x">
        <div class="flex flex-none flex-nowrap items-start snap-x">
          <div class="mr-3 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'pl.jpg'" :alt="'【FANZA】' + videoid.title + 'のジャケット画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-1.jpg'" :alt="'【FANZA】' + videoid.title + '1枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-2.jpg'" :alt="'【FANZA】' + videoid.title + '2枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-3.jpg'" :alt="'【FANZA】' + videoid.title + '3枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-4.jpg'" :alt="'【FANZA】' + videoid.title + '4枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-5.jpg'" :alt="'【FANZA】' + videoid.title + '5枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-6.jpg'" :alt="'【FANZA】' + videoid.title + '6枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-7.jpg'" :alt="'【FANZA】' + videoid.title + '7枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-8.jpg'" :alt="'【FANZA】' + videoid.title + '8枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10 snap-center">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-9.jpg'" :alt="'【FANZA】' + videoid.title + '9枚目の画像'" class="h-[30rem]">
          </div>
          <div class="mx-10">
            <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id + '/' + videoid.content_id + 'jp-10.jpg'" :alt="'【FANZA】' + videoid.title + '10枚目の画像'" class="h-[30rem]">
          </div>
          <div class="w-80 mx-3 self-center">
            <a :href="videoid.affiliateURL + '&af_id=maxjpblog-999&ch=api'" target="_blank" rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 ml-14 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
            </svg>
            <span class="ml-10 font-bold text-lg text-blue-500">詳細ページへ</span></a>

          </div>
        </div>
      </div>
        </main>
      </div>
    </div>
  </div>
  <!-- モーダルウィンドウの中 -->
</div>
</BasicLayout>
</template>