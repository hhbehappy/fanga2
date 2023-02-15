<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { router, Head, Link, useForm } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

const props = defineProps({
  user_id: Number,
  inquiryids: Object,
  inquirys: Object,
  status: String
});

const form = useForm({
  // number: 1,
  number: props.inquiryids.id + 1,
  title: null,
  message: null,
});

const submitfunction = () => {
    form.post('/inquiry/store/', {
      onSuccess: () => form.reset('title', 'message'),
      preserveScroll: true
    });
};

const destroy = id => {
    router.delete(`/inquiry/destroy/${id}/`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};
</script>

<template>
<BasicLayout>
  <Head :title="'お問い合わせ'" />
  <!-- &#64; <a href="mailto:info@example.com">メールはこちらへ</a> -->
  <div class="min-h-screen w-screen pt-8 pb-10 mt-4 md:mt-0 bg-gray-100">
    <div class="w-4/5 md:w-9/12 mx-auto px-8 py-4 bg-white">
        <div class="mx-auto pt-2">
            <div class="flex w-full px-3 items-center justify-between border-b-4 border-gray-400">
              <h1 class="pb-1 font-bold md:text-xl text-gray-700 leading-tight">お問い合わせ</h1>
              <div class="text-blue-500 text-sm hover:underline">
                <Link :href="route('fanga')">キャンセル</Link>
              </div>
            </div>
            <InputError class="my-2" :message="form.errors.title" />
            <InputError class="my-2" :message="form.errors.message" />
            <p class="mt-3"><FlashMessage /></p>
            <form @submit.prevent="submitfunction">
              <div class="w-52 mt-5">
                <InputLabel for="title" value="タイトル" />
                <TextInput id="title" name="title" type="text" class="h-9 mt-1 block w-full" v-model="form.title" autofocus required/>
              </div>
              <div class="mt-5">
                <div v-if="props.user_id === 1">
                  <InputLabel type="hidden" for="number" value="お問い合わせ番号" />
                  <TextInput id="number" name="number" type="text" v-model="form.number" class="w-20 mb-5" />
                </div>
                <InputLabel type="hidden" for="message" value="お問い合わせ内容" />
                <textarea id="message" name="message" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" rows="4" v-model="form.message" :disabled="form.processing" required></textarea>
              </div>
              <div class="block my-5">
              <button type="submit" class="h-10 w-full mt-4 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300" :disabled="form.processing">
                    送信する
              </button>
            </div>
          </form>
        </div>
    </div>
    <div class="w-4/5 md:w-9/12 my-12 mx-auto px-8 bg-white">
      <div class="mx-auto py-6 mt-10">
        <div class="w-full px-2 items-center border-b-4 border-gray-400">
          <h1 class="pb-1 font-bold md:text-xl text-gray-700 leading-tight">お問い合わせ内容</h1>
        </div>
        <div v-for=" inquiry in inquirys " :key="inquiry.id" class="py-3">
          <div class="p-2 border border-gray-400 rounded break-words">
            <p class="flex flex-wrap justify-between items-center relative">
              <span class="w-full sm:w-9/12 inline-block">
                {{ inquiry.title }}
              </span>
              <span class="text-gray-500 text-sm inline-block">{{ inquiry.updated_at }}</span>
              <span v-if="props.user_id === 1">{{ inquiry.number }}
                <button type="button" @click="destroy(inquiry.id)" class="flex px-1 py-0.5 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out absolute right-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  削除
                </button>
              </span>
            </p>
            <div class="mt-2 whitespace-pre-line">
              {{ inquiry.message }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</BasicLayout>
</template>