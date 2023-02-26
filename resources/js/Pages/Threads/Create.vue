<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

const form = useForm({
  title: null,
  content: null,
  nickname: 1
});

const submitFunction = () => {
  form.post('/threads/store', {
    onSuccess: () => form.reset('title', 'content')
  })
}

</script>

<template>
<BasicLayout>
  <Head :title="'BBS 新規スレッド作成'" />

  <div class="min-h-screen w-screen mt-5 md:mt-0 bg-gray-100">
    <div class="pt-8">
      <h1 class="w-11/12 max-w-3xl mx-auto mb-6 px-4 font-bold md:text-xl text-gray-800 leading-tight border-b-4 border-gray-400">BBS : 新しいスレッドを作成する</h1>
    </div>
    <InputError class="my-4 text-center text-lg" :message="form.errors.title" />
    <InputError class="my-4 text-center text-lg" :message="form.errors.content" />
    <div class="w-11/12 max-w-3xl mx-auto">
      <form @submit.prevent="submitFunction">
        <div class="flex justify-center relative">
          <div class="mb-3 w-full">
            <div class="mb-6">
              <label for="title" class="ml-3">タイトル :</label>
              <textarea name="title" v-model="form.title" class="whitespace-pre-line form-control block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none" id="title" rows="1" placeholder="タイトルを入力してください" autofocus>
              </textarea>
            </div>
            <div class="mb-8">
              <label for="content" class="ml-3">コメント :</label>
              <textarea name="content" v-model="form.content" class="whitespace-pre-line form-control block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none" id="content" rows="5" placeholder="コメントを入力してください">
              </textarea>
            </div>
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
  </div>
</BasicLayout>
</template>
