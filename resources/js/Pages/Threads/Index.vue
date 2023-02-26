<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { router, Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    threads: Object,
    user_id: Number
})

const destroythread = id => {
    router.delete(`/threads/destroy/${id}/`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,})
};
</script>

<template>
<BasicLayout>
    <Head :title="'BBS スレッド一覧'" />

    <div class="h-screen w-screen bg-gray-100">
        <div class="flex w-11/12 md:w-9/12 max-w-3xl mx-auto mb-6 px-8 pt-8 items-center justify-between border-b-4 border-gray-400">
            <h1 class="font-bold text-2xl text-gray-800 leading-tight">BBS</h1>
            <div class="text-xs md:text-base text-blue-500">
            <Link :href="route('threads.create')">新しいスレッドを作成する</Link>
            </div>
        </div>
        <div class="w-11/12 md:w-9/12 max-w-3xl mx-auto">
            <div v-for="thread in threads" :key="thread.id" class="">
                <div v-if="thread.title" class="flex w-full mx-auto bg-white rounded p-2 mb-5 text-blue-500 whitespace-pre-line justify-between break-all">
                    <Link :href="route('threads.show', thread.id)">
                    {{ thread.title }}</Link>
                    <button v-if="props.user_id === 1 " type="button" @click="destroythread(thread.id)" class="flex h-5 mt-1 mr-2 px-1 bg-red-500 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="">削除</span>
                        </button>
                </div>
            </div>
        </div>
    </div>
</BasicLayout>
</template>
