<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BasicLayout>
        <Head title="会員登録" />

        <div class="min-h-screen w-screen max-w-[1320px] bg-gray-100 pt-10">
            <div class="w-4/5 md:w-[480px] mx-auto bg-white p-5">
                <div class="mx-auto">
                    <div class="w-full px-2 mb-5 items-center border-b-4 border-gray-400">
                        <h1 class="pb-1 font-bold text-xl text-gray-700 leading-tight">会員登録</h1>
                    </div>
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="ニックネーム" />
                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
            
                        <div class="mt-4">
                            <InputLabel for="email" value="メールアドレス" />
                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
            
                        <div class="mt-4">
                            <InputLabel for="password" value="パスワード" />
                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
            
                        <div class="mt-4">
                            <InputLabel for="password_confirmation" value="パスワード（確認用のため再入力）" />
                            <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />

                            <p class="mt-8 text-xs">
                                <Link :href="route('rule')" class="text-blue-500 hover:underline">
                                利用規約
                            </Link>に同意のうえで、登録してください。</p>
                            <Button class="h-10 w-full mt-2 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300" :disabled="form.processing">
                                登録する
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mb-1 inline-block ">
                                    <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                                </svg>
                            </Button>
                        </div>
            
                        <div class="mt-4">
                            <Link :href="route('login')" class="text-sm text-blue-500 hover:underline">
                                登録しているのでログインする
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </BasicLayout>
</template>
