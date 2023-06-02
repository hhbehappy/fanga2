<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import FlashMessage from '@/Components/FlashMessage.vue';

const props = defineProps({
  videoa: Object,
  privatememolimit: Number
})

const form = useForm({
  free: null,
  release: null,
  private: null,
  nickname: 1,
  f_position: 'top',
  f_no: null,
  d_position: 'top',
  d_no: null
});

const submitFunction = () => {
  form.post('/fanzafreememo/store/' + props.videoa.id + '/' + props.videoa.content_id, {
    onSuccess: () => form.reset('free', 'release', 'private', 'f_no', 'd_no'),
    preserveScroll: true
  })
}
const submitFunction2 = () => {
  form.post('/fanzareleasememo/store/' + props.videoa.id + '/' + props.videoa.content_id, {
    onSuccess: () => form.reset('free', 'release', 'private', 'f_no', 'd_no'),
    preserveScroll: true
  })
}
const submitFunction3 = () => {
  form.post('/fanzaprivatememo/store/' + props.videoa.id + '/' + props.videoa.content_id, {
    onSuccess: () => form.reset('free', 'release', 'private', 'f_no', 'd_no'),
    preserveScroll: true
  })
}
</script>

<script>
export default {
  name: "memo-tabs",
  data() {
    return {
      openTab: 1,
      openTab2: 5
    }
  },
  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber
    },
    toggleTab2s: function (tabNumber2) {
      this.openTab2 = tabNumber2
    }
  }
}
</script>

<template>
  <div class="flex flex-wrap justify-center h-full my-24">
    <div class="w-11/12">
      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-2 flex-row text-xs md:text-base cursor-pointer">
        <li class="-mb-px flex-auto text-center w-1/3">
          <a class="font-bold uppercase pr-2 py-2 shadow-md rounded block leading-normal" @click="toggleTabs(1)"
            :class="{ 'text-black bg-gray-200 hover:bg-amber-200': openTab !== 1, 'text-black bg-amber-200': openTab === 1 }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 mr-1 mb-1 inline-block">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            フリーメモ
          </a>
        </li>
        <li v-if="$page.props.auth.user" class="-mb-px flex-auto text-center w-1/3 px-2">
          <a class="font-bold uppercase pr-2 py-2 shadow-md rounded block leading-normal" @click="toggleTabs(2)"
            :class="{ 'text-black bg-gray-200 hover:bg-blue-200': openTab !== 2, 'text-black bg-blue-200': openTab === 2 }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 mr-1 mb-1 inline-block">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            メモ
          </a>
        </li>
        <li v-if="$page.props.auth.user" class="-mb-px flex-auto text-center w-1/3">
          <a class="font-bold uppercase pr-2 py-2 shadow-md rounded block leading-normal" @click="toggleTabs(3)"
            :class="{ 'text-black bg-gray-200 hover:bg-red-200': openTab !== 3, 'text-black bg-red-200': openTab === 3 }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 mr-1 mb-1 inline-block">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            非公開メモ
          </a>
        </li>
      </ul>
      <div class="relative flex flex-col min-w-0 break-words bg-white">
        <div class="py-5 flex-auto">
          <div class="tab-content tab-space">
            <div :class="{ 'hidden': openTab !== 1, 'block': openTab === 1 }">
              <form @submit.prevent="submitFunction">
                <div class="flex justify-center relative">
                  <div class="mb-8 w-full">
                    <InputError class="mb-4 text-center" :message="form.errors.free" />
                    <FlashMessage />
                    <textarea name="free" v-model="form.free"
                      class="form-control block w-full mb-6 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none"
                      id="free" rows="5" placeholder="フリーメモ">
                        </textarea>
                    <div class="flex justify-end mr-6 ml-auto">
                      <button type="submit"
                        class="flex px-6 py-2 bg-blue-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-blue-700">
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
            <div :class="{ 'hidden': openTab !== 2, 'block': openTab === 2 }">
              <form @submit.prevent="submitFunction2">
                <div class="flex justify-center">
                  <div class="w-full">
                    <InputError class="mb-4 text-center" :message="form.errors.release" />
                    <FlashMessage />
                    <textarea name="release" v-model="form.release"
                      class="form-control block w-full mb-6 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none"
                      id="release" rows="5" placeholder="メモ">
                        </textarea>
                    <div class="flex flex-wrap justify-between">
                      <!-- オプションを開く -->
                      <div class="flex flex-wrap mr-8 justify-start">
                        <div class="">
                          <ul class="flex list-none flex-wrap text-sm cursor-pointer">
                            <li class="text-center">
                              <a class="w-36 font-mono py-1.5 shadow-md rounded block leading-normal"
                                @click="toggleTab2s(4)"
                                :class="{ 'text-black bg-gray-200 hover:bg-blue-200': openTab2 !== 4, 'hidden': openTab2 === 4 }">
                                オプションを開く
                              </a>
                            </li>
                            <li class="text-center mb-6">
                              <a class="w-36 font-mono py-1.5 shadow-md rounded block leading-normal"
                                @click="toggleTab2s(5)"
                                :class="{ 'text-black bg-gray-200 hover:bg-blue-200': openTab2 !== 5, 'hidden': openTab2 === 5 }">
                                閉じる
                              </a>
                            </li>
                          </ul>
                          <div class="tab-content tab-space">
                            <div :class="{ 'hidden': openTab2 !== 4, 'block': openTab2 === 4 }">
                              <div class="mb-8 p-3 max-w-[472px] border-2 border-gray-400 rounded">
                                <!-- ニックネーム -->
                                <div class="pb-2 mb-3 border-b-2 border-gray-500">
                                  <p class="w-44 pl-1 mb-3 font-bold">ニックネーム</p>
                                  <div class="flex flex-wrap">
                                    <p class="w-32 mb-1">
                                      <label class="cursor-pointer text-sm font-bold">
                                        <input type="radio" class="mr-1 mb-1 cursor-pointer" name="nickname"
                                          v-model="form.nickname" value="1" checked>
                                        <span>
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 mb-1 text-blue-400 inline-block">
                                            <path fill-rule="evenodd"
                                              d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                                              clip-rule="evenodd" />
                                            <path
                                              d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                                          </svg>
                                          {{ $page.props.auth.user.name }}
                                        </span>
                                      </label>
                                    </p>
                                    <p class="w-40 mb-1">
                                      <label class="cursor-pointer text-sm">
                                        <input type="radio" class="mr-1 mb-1 cursor-pointer" name="nickname"
                                          v-model="form.nickname" value="0">
                                        <span class="text-sm font-bold">
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
                                      </label>
                                    </p>
                                  </div>
                                </div>
                                <!-- Fanzaのメモへリンク -->
                                <div class="pb-2 mb-3 border-dashed border-b-2 border-gray-500">
                                  <p class="w-44 pl-1 mb-3 font-bold">FANZAのメモへリンク</p>
                                  <div class="flex flex-wrap pl-1">
                                    <label class="mr-3 mb-2 cursor-pointer">
                                      No. F-
                                      <input type="text" class="h-6 mr-1 mb-1 cursor-pointer" name="f_no"
                                        v-model="form.f_no" size="7">
                                    </label>
                                    <div class="flex">
                                      <p>位置は本文よりも</p>
                                      <div class="mx-4">
                                        <label class="cursor-pointer text-sm">
                                          <input type="radio" class="mr-1 mb-1 cursor-pointer" name="f_position"
                                            v-model="form.f_position" value="top" checked>
                                          上
                                        </label>
                                      </div>
                                      <div>
                                        <label class="cursor-pointer text-sm">
                                          <input type="radio" class="mr-1 mb-1 cursor-pointer" name="f_position"
                                            v-model="form.f_position" value="bottom">
                                          下
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Dugaのメモへリンク -->
                                <div class="">
                                  <p class="w-44 pl-1 mb-3 font-bold">DUGAのメモへリンク</p>
                                  <div class="flex flex-wrap pl-1">
                                    <label class="mr-3 mb-2 cursor-pointer">
                                      No. D-
                                      <input type="text" class="h-6 mb-1 cursor-pointer" name="d_no" v-model="form.d_no"
                                        size="7">
                                    </label>
                                    <div class="flex">
                                      <p>位置は本文よりも</p>
                                      <div class="mx-4">
                                        <label class="cursor-pointer text-sm">
                                          <input type="radio" class="mr-1 mb-1 cursor-pointer" name="d_position"
                                            v-model="form.d_position" value="top" checked>
                                          上
                                        </label>
                                      </div>
                                      <div>
                                        <label class="cursor-pointer text-sm">
                                          <input type="radio" class="mr-1 mb-1 cursor-pointer" name="d_position"
                                            v-model="form.d_position" value="bottom">
                                          下
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div :class="{ 'hidden': openTab2 !== 5, 'block': openTab2 === 5 }">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex items-end mb-8 mr-6 ml-auto">
                        <button type="submit"
                          class="flex px-6 py-2 bg-blue-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-blue-700">
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
                </div>
              </form>
            </div>
            <div :class="{ 'hidden': openTab !== 3, 'block': openTab === 3 }">
              <FlashMessage />
              <div v-if="props.privatememolimit < 2">
                <form @submit.prevent="submitFunction3">
                  <div class="flex justify-center relative">
                    <div class="mb-8 w-full">
                      <InputError class="mb-4 text-center" :message="form.errors.private" />
                      <textarea name="private" v-model="form.private"
                        class="form-control block w-full mb-6 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none"
                        id="private" rows="5" placeholder="非公開メモ">
                          </textarea>
                      <div class="flex justify-end mr-6 ml-auto">
                        <button type="submit"
                          class="flex px-6 py-2 bg-blue-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-blue-700">
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
              <div v-else class="flex mt-10 justify-center">
                <p class="pl-2 text-center border-b-2 border-red-400">非公開メモは2つまでとなっています。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>