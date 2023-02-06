<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    id: String
})

</script>

<template>
<BasicLayout>
    <Head :title="メモの種類について" />

    <div class="min-h-screen w-screen pb-12 bg-gray-100">
        <div class="flex w-4/5 md:w-9/12 mx-auto mb-6 px-4 pt-8 items-center justify-between border-b-4 border-gray-400">
            <h1 class="font-bold text-xl text-gray-800 leading-tight">メモは全部で3種類あります。</h1>
            <div class="text-blue-500">
            <Link :href="route('fvideo.show', props.id) + '#memo'" class="block w-8 ml-3">戻る</Link>
            </div>
        </div>
        <div class="w-4/5 md:w-9/12 mx-auto p-5 bg-white">
            <p class="w-24 my-2 py-1 px-2 font-semibold bg-amber-200 rounded-2xl">フリーメモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>会員登録せずに利用ができます。</li>
                <li>5文字以上100文字以内でメモができます。</li>
                <li>誰でも自由にメモやメモの削除ができます。</li>
                <li>自分のメモが誰かに削除される可能性があります。</li>
            </ul>
            
            <p class="w-24 py-1 px-2 mt-5 mb-2 font-semibold bg-blue-200 rounded-2xl">公開用メモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>無料会員登録後に利用ができます。</li>
                <li>5文字以上300文字以内でメモができます。</li>
                <li>公開時にニックネームを使用するか選択ができます。
                    <p class="text-sm leading-7">（例）<span class="py-1 px-2 bg-blue-200 rounded-2xl">FANGAさんの公開用メモ</span> または<span class="py-1 px-2 bg-blue-200 rounded-2xl">ログインユーザーの公開用メモ</span></p>
                </li>
                <li>公開用メモの編集や削除ができます。</li>
            </ul>
            <p class="w-28 mt-5 mb-2 py-1 px-2 font-semibold bg-red-200 rounded-2xl">非公開用メモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>無料会員登録後に利用ができます。</li>
                <li>5文字以上300文字以内でメモができます。</li>
                <li>誰にも見られない自分だけのメモです。</li>
                <li>非公開用メモの編集や削除ができます。</li>
            </ul>
        </div>
        
    </div>

</BasicLayout>
</template>