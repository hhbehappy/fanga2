<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

// const props = defineProps({
//   inquiryids: Object,
//   inquirys: Object,
//   status: String
// });

const form = useForm({
  title: null,
  email: null,
  message: null,
});

const submitfunction = () => {
    form.post('/inquiry/store/', {
      onSuccess: () => form.reset('title', 'email', 'message'),
      preserveScroll: true
    });
};

</script>

<template>
<BasicLayout>
  <Head :title="'お問い合わせ'" />
  <!-- &#64; <a href="mailto:info@example.com">メールはこちらへ</a> -->
  <div class="min-h-screen w-screen pt-8 pb-10 mt-4 md:mt-0 bg-gray-100">
    <div class="w-4/5 md:w-9/12 max-w-3xl mx-auto px-8 py-4 bg-white">
        <div class="mx-auto pt-2">
            <div class="flex w-full px-3 items-center justify-between border-b-4 border-gray-400">
              <h1 class="pb-1 font-bold md:text-xl text-gray-700 leading-tight">お問い合わせ</h1>
              <div class="text-blue-500 text-sm hover:underline">
                <Link :href="route('fanga')">キャンセル</Link>
              </div>
            </div>
            <InputError class="my-2" :message="form.errors.title" />
            <InputError class="my-2" :message="form.errors.email" />
            <InputError class="my-2" :message="form.errors.message" />
            <p class="mt-3"><FlashMessage /></p>
            <form @submit.prevent="submitfunction">
              <div class="w-52 mt-5">
                <InputLabel for="title" value="タイトル" />
                <TextInput id="title" name="title" type="text" class="h-9 mt-1 block w-full" v-model="form.title" autofocus required/>
              </div>
              <div class="w-52 mt-5">
                <InputLabel for="email" value="メールアドレス" />
                <TextInput id="email" name="email" type="email" class="h-9 mt-1 block w-full" v-model="form.email" required/>
              </div>
              <div class="mt-5">
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
  </div>
</BasicLayout>
</template>