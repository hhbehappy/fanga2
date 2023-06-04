<script setup>
import Layout from '@/Layouts/Layout.vue';
import { router, Head, useForm } from '@inertiajs/vue3';
import Detail from '@/Components/Duga/Detail.vue';

const props = defineProps({
  videod: Object,
  dugavideos: Object,
  date: String,
  type: String,
  re_productid: String,
  duga_release_memos: Object,
  duga_private_memos: Object,
  update_release_id: Object,
  update_private_id: Object,
  user_id: Number,
  nice: String,
  nicecount: Number
})

const form = useForm({
  release: null,
  private: null,
  nickname: 1
});

const updateReleaseMemo = id => {
  router.put(`/dugareleasememo/update/${id}/` + props.videod.productid, form, {
    preserveScroll: true
  })
};

const updatePrivateMemo = id => {
  router.put(`/dugaprivatememo/update/${id}/` + props.videod.productid, form, {
    preserveScroll: true
  })
};

</script>

<template>
  <Head :title="'【DUGA】' + videod.title" />

  <Layout>
    <article>
      <Detail :videod="videod" :dugavideos="dugavideos" :date="date" :re_productid="re_productid" :nice="nice"
        :nicecount="nicecount" />
      <!-- サンプル動画 -->
      <section>
        <div class="block lg:hidden w-full h-96 mx-auto mt-8 mb-20">
          <h2 class="pl-4 mb-1 text-xl font-bold border-b-4 border-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 mb-1 inline-block">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
            </svg>
            サンプル動画
          </h2>
          <div class="w-3/4 md:w-3/5 mx-auto mt-10">
            <video controls playsinline
              :poster="'https://affsample.duga.jp/unsecure/' + props.videod.productid + '/noauth/flvcap.jpg'" preload="metadata">
              <source :src="'https://affsample.duga.jp/unsecure/' + props.videod.productid + '/noauth/movie.mp4'" />
            </video>
          </div>
        </div>
      </section>
      <!-- メモ -->
      <div id="editmemo" class="border-b-4 border-gray-500 mx-6 mt-4">
        <h2 class="ml-4 mb-2 text-2xl font-bold">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 mr-1 mb-1 inline-block">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
          </svg>
          メモの編集
        </h2>
      </div>
      <!-- メモの編集 -->
      <div class="flex flex-col justify-center w-11/12 mx-auto p-2 mb-12">
        <div v-for="duga_release_memo in duga_release_memos" :key="duga_release_memo.id">
          <div v-if="duga_release_memo.release && props.type === 'release'">
            <div class="border-dotted border-b border-gray-500 p-2 mb-6">
              <p class="my-3">
                <span v-if="duga_release_memo.nickname === 1" class="text-xs font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mb-1 text-blue-400 inline-block">
                    <path fill-rule="evenodd"
                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                      clip-rule="evenodd" />
                    <path
                      d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                  </svg>
                  {{ duga_release_memo.name }}
                </span>
                <span v-else-if="duga_release_memo.nickname === 0" class="text-xs font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mb-1 text-green-500 inline-block">
                    <path fill-rule="evenodd"
                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                      clip-rule="evenodd" />
                    <path
                      d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                  </svg>
                  ログインユーザーのメモ
                </span>
                <span class="w-44 mt-2 ml-4 text-sm text-zinc-500 inline-block">
                  {{ duga_release_memo.updated_at }}
                </span>
              </p>
              <div class="">
                {{ duga_release_memo.release }}
              </div>
            </div>
            <p class="text-sm text-center text-red-500 my-4">ー メモは2文字以上500文字以内で入力してください ー</p>
            <div class="flex flex-wrap justify-center">
              <div class="w-full">
                <form @submit.prevent="updateReleaseMemo(update_release_id.id, duga_release_memo.productid)">
                  <div class="flex justify-center relative">
                    <div class="mb-3 w-full">
                      <textarea name="release" v-model="form.release"
                        class="form-control block w-full py-1.5 mb-4 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none"
                        id="release" rows="5" placeholder="メモの編集">
                    </textarea>
                      <div class="flex justify-end mr-40 items-center">
                        <div class="">
                          <div class="mb-1">
                            <label class="cursor-pointer text-sm">
                              <input type="radio" class="mr-2 mb-1" name="nickname" v-model="form.nickname" value="1"
                                checked>ニックネームで
                            </label>
                          </div>
                          <div class="">
                            <label class="cursor-pointer text-sm">
                              <input type="radio" class="mr-2 mb-1" name="nickname" v-model="form.nickname"
                                value="0">ログインユーザーで
                            </label>
                          </div>
                        </div>
                        <button type="submit"
                          class="px-6 py-2 bg-green-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out flex align-center absolute right-6">
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download"
                            class="w-3 mt-1 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                              d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                            </path>
                          </svg>
                          更新
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- 非公開メモ -->
        <div v-for="duga_private_memo in duga_private_memos" :key="duga_private_memo.id">
          <div v-if="duga_private_memo.private && type === 'private'">
            <div class="border-dotted border-b border-gray-500">
              <p class="mb-3">
                <span class="text-xs font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 mb-1 text-red-300 inline-block">
                    <path fill-rule="evenodd"
                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                      clip-rule="evenodd" />
                    <path
                      d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                  </svg>
                  {{ duga_private_memo.name }}
                </span>
                <span class="w-44 mt-2 ml-4 text-sm text-zinc-500 inline-block">
                  {{ duga_private_memo.updated_at }}
                </span>
              </p>
              <div class="w-full pb-2 whitespace-pre-line break-all">
                {{ duga_private_memo.private }}
              </div>
            </div>
            <p class="text-sm text-center text-red-400 my-4">ー メモは2文字以上500文字以内で入力してください ー</p>
            <div class="flex flex-wrap justify-center">
              <div class="w-full">
                <form @submit.prevent="updatePrivateMemo(update_private_id.id, duga_private_memo.productid)">
                  <div class="flex justify-center relative">
                    <div class="mb-3 w-full">
                      <textarea name="private" v-model="form.private"
                        class="form-control block w-full py-1.5 mb-4 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none"
                        id="private" rows="5" placeholder="非公開メモの編集">
                    </textarea>
                      <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white font-bold text-sm leading-normal uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out flex align-center absolute right-6">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download"
                          class="w-3 mt-1 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path fill="currentColor"
                            d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                          </path>
                        </svg>
                        更新
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </Layout>
</template>