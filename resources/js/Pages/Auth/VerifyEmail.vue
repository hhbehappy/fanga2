<script setup>
import { computed } from 'vue';
import BasicLayout from '@/Layouts/BasicLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <BasicLayout>
    <Head title="メールアドレスを確認してください。" />

    <div class="min-h-screen w-screen max-w-[1320px] bg-gray-100 pt-10">
        <div class="w-4/5 md:w-[480px] mx-auto bg-white p-5">
            <div class="mx-auto">
                <div class="mb-4 text-gray-600">
                    ご登録ありがとうございます。<br>ご登録いただいたメールアドレスに認証用のリンクを送信しました。はじめにメールアドレスの認証を行なってください。
                </div>
        
                <div class="mb-4 font-medium text-green-600" v-if="verificationLinkSent">
                    ご登録いただいたメールアドレスに認証用のメールを再送信しました。
                </div>
        
                <form @submit.prevent="submit">
                    <div class="mt-4 flex items-center justify-between">
                        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="h-10 w-full mt-4 font-bold text-center bg-gray-200 border border-gray-600 rounded hover:bg-amber-300">
                            認証用のメールをもう一度送る
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </BasicLayout>
</template>
