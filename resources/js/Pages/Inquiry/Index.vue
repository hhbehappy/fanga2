<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

const form = useForm({
  name: null,
  email: null,
  message: null
});

const submit = () => {
    form.post('/inquiry/store', {
      preserveScroll: true,
      onSuccess: () => form.reset('name', 'email', 'message'),
    });
};

</script>

<template>
<Head :title="'お問い合わせ'" />

<BasicLayout>
  <div class="min-h-screen w-screen max-w-[1320px] pt-8 pb-10 mt-4 md:mt-0 bg-gray-100">
    <div class="w-11/12 md:w-9/12 max-w-2xl mx-auto p-3 bg-white">
        <div class="mx-auto">
            <div class="flex w-full px-3 items-center justify-between border-b-4 border-gray-400">
              <h1 class="pb-1 font-bold md:text-xl text-gray-700 leading-tight">お問い合わせ</h1>
              <div class="text-blue-500 text-sm hover:underline">
                <Link :href="route('fanga')">キャンセル</Link>
              </div>
            </div>
            <InputError class="my-2" :message="form.errors.name" />
            <InputError class="my-2" :message="form.errors.email" />
            <InputError class="my-2" :message="form.errors.message" />
            <p class="mt-3"><FlashMessage /></p>
            <form @submit.prevent="submit">
              <div class="w-56 mt-5">
                <InputLabel for="name" value="お名前" />
                <TextInput id="name" name="name" type="text" class="h-9 mt-1 block w-full" v-model="form.name" autofocus required/>
              </div>
              <div class="w-56 mt-5">
                <InputLabel for="email" value="メールアドレス" />
                <TextInput id="email" name="email" type="email" class="h-9 mt-1 block w-full" v-model="form.email" required/>
              </div>
              <div class="mt-5">
                <InputLabel type="hidden" for="message" value="お問い合わせ内容" />
                <textarea id="message" name="message" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" rows="6" v-model="form.message" :disabled="form.processing" required></textarea>
              </div>
              <div class="block my-5">
              <button type="submit" id="submit" class="h-10 w-full mt-4 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300" :disabled="form.processing">
                    送信する
              </button>
            </div>
          </form>
        </div>
      </div>
        <p class="w-11/12 md:w-9/12 max-w-2xl pt-3 mx-auto text-sm">お問い合わせを送信すると自動返信メールが送信されます。<br>動画の追加は<Link :href="route('bbs')" class="text-blue-500">BBS</Link>でも受け付けています。</p>
  </div>
</BasicLayout>
</template>