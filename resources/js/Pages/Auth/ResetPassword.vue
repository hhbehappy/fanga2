<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BasicLayout>
        <Head title="パスワードの再設定" />

        <form @submit.prevent="submit">
            <div class="min-h-screen w-screen max-w-[1320px] bg-gray-100 pt-10">
                <div class="w-4/5 md:w-[480px] mx-auto bg-white p-5">
                    <div class="mx-auto">
                        <h1 class="pb-1 mb-5 font-bold text-xl text-gray-700 leading-tight border-b-4 border-gray-400">パスワードの再設定</h1>
                        <InputError class="mt-2" :message="form.errors.email" />
                        <InputError class="mt-2" :message="form.errors.password" />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />

                        <InputLabel for="email" value="メールアドレス" />
        
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="password" value="パスワード" />
        
                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="password_confirmation" value="パスワード(確認用のため再入力)" />
        
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="h-10 w-full mt-6 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300">
                            送信する
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </BasicLayout>
</template>
