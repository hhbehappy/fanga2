<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <BasicLayout>
        <Head title="パスワードの再設定" />

        <div class="min-h-screen w-screen bg-gray-100 pt-10 mt-5">
            <div class="w-4/5 md:w-[480px] mx-auto bg-white p-5">
                <div class="mx-auto">
                    <div class="w-full px-2 mb-5 items-center border-b-4 border-gray-400">
                        <h1 class="pb-1 font-bold text-xl text-gray-700 leading-tight">パスワードの再設定</h1>
                    </div>

                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <div class="mb-4 text-xs text-gray-600">
                        <p class="my-1">パスワードを再設定するためのメールを送信します。</p>
                        <p>ご登録済みのメールアドレスを入力して、「送信する」ボタンをクリックしてください。</p>
                    </div>
            
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="メールアドレス" />
                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        
            
                        <div class="mt-4">
                            <Button class="h-10 w-full my-4 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300" :disabled="form.processing">
                                送信する
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </BasicLayout>
</template>
