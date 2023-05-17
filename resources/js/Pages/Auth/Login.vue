<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: true
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <BasicLayout>
        <Head title="ログイン" />

        <div class="min-h-screen w-screen max-w-[1320px] bg-gray-100 pt-10">
            <div class="w-4/5 md:w-[480px] mx-auto bg-white p-5">
                <div class="mx-auto">
                    <div class="flex w-full px-2 mb-5 items-center justify-between border-b-4 border-gray-400">
                        <h1 class="pb-1 font-bold text-xl text-gray-700 leading-tight">ログイン</h1>
                        <div class="-mb-2 text-blue-500 text-sm hover:underline">
                            <Link :href="route('register')">会員登録</Link>
                        </div>
                    </div>
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>
            
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="メールアドレス" />
                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
            
                        <div class="mt-4">
                            <InputLabel for="password" value="パスワード" />
                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
            
                        <div class="block mt-6">
                            <label class="hidden items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                            </label>

                            <button class="h-10 w-full mt-4 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300" :disabled="form.processing">
                                ログイン
                            </button>
                            
                            
                        </div>
                        
                        <div class="mt-4">
                            <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-blue-500 hover:underline">
                                パスワードの再設定はこちら
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </BasicLayout>
</template>
