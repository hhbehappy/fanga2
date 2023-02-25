<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { router, Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import FlashMessage from '@/Components/FlashMessage.vue';

const props = defineProps({
    threads: Object,
    comments: Object,
    id: String,
    user_id: Number,
    currenturl: String
})

const form = useForm({
    content: null,
    nickname: 1
});

const submitFunction = () => {
    form.post('/comments/store/' + props.id, {
    onSuccess: () => form.reset('content'),
    preserveScroll: true
    })
};

const submitcomment = () => {
    form.post('/commentlogin')
};

const destroycomment = id => {
    router.delete(`/comments/destroy/${id}/`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,})
};
</script>

<template>
<BasicLayout>
    <Head :title="'BBS 詳細ページ'" />

    <div class="min-h-screen w-screen mt-5 md:mt-0 pb-10 bg-gray-100">
        <div class="flex w-4/5 md:w-9/12 max-w-3xl mx-auto mb-6 px-8 pt-8 items-center justify-between border-b-4 border-gray-400">
            <h1 class="font-bold text-2xl text-gray-800 leading-tight">BBS</h1>
            <div class="">
            <p v-if="$page.props.auth.user" class=""></p>
            <p v-else class="text-xs md:text-base text-blue-500 cursor-pointer">
                <form @submit.prevent="submitcomment">
                <input type="hidden" name="currenturl" :value="props.currenturl">
                <button type="submit" name="currenturl" class="hover:underline">ログインしてコメントする</button>
                </form></p>
            </div>
        </div>
        <div class="w-4/5 md:w-9/12 max-w-3xl mb-4 mx-auto">
            <FlashMessage />
        </div>
        <div v-for="thread in threads" :key="thread.id" class="">
            <div class="w-4/5 md:w-9/12 max-w-3xl mx-auto bg-white rounded p-2 mb-6">
                <div class="flex flex-wrap items-center">
                    <h2 class="font-bold text-xl text-gray-800 leading-tight whitespace-pre-line break-all">{{ thread.title }}</h2>
                    <span class="inline-block w-28 text-xs text-gray-600 ml-5">{{ thread.updated_at }}</span>
                </div>
            </div>
        </div>
        <div v-for="comment in comments" :key="comment.id" class="">
            <div class="w-4/5 md:w-9/12 max-w-3xl mx-auto bg-white rounded p-2 mb-5 whitespace-pre-line break-all">
                <div class="flex mb-2 justify-between items-center">
                    <div class="">
                        <span v-if="comment.nickname === 1 && comment.name " class="text-sm font-bold">{{ comment.id }}. {{ comment.name }}さんのコメント</span>
                        <span v-else-if="comment.nickname === 0 " class="text-sm font-bold">{{ comment.id }}. ログインユーザーのコメント</span>
                        <span v-else class="text-sm font-bold">{{ comment.id }}. 退会済みユーザーのコメント</span>
                        <span class="text-xs text-gray-600 mx-5">{{ comment.updated_at }}</span>
                    </div>
                    <button v-if="props.user_id === 1 " type="button" @click="destroycomment(comment.id)" class="flex h-5 mr-2 px-1 bg-red-500 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="">削除</span>
                    </button>
                </div>
                <div class="">{{ comment.content }}</div>
            </div>
        </div>
        <InputError class="my-4 text-center text-xl" :message="form.errors.content" />
        <div v-if="$page.props.auth.user" class="w-4/5 md:w-9/12 max-w-3xl mx-auto mt-8">
            <form @submit.prevent="submitFunction">
                <div class="flex justify-center relative">
                    <div class="mb-3 w-full">
                        <div class="mb-8">
                            <label for="content" class="ml-3">コメント</label>
                            <textarea name="content" v-model="form.content" class="form-control block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-800 focus:outline-none" id="content" rows="5" placeholder="コメントを入力してください" autofocus>
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

