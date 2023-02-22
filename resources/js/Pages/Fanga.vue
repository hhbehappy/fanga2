<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';


const props = defineProps({
    fvideoids: Object,
    dvideoids: Object,
    fanzacount: Number,
    dugacount: Number,
    fanzaactresss: Object,
    fanzamakers: Object,
    fanzaseriess: Object,
    dugaperformers: Object,
    dugamakers: Object,
    dugaseriess: Object
})

</script>

<template>
    <Head :title="'FANGA FANZA&DUGA FREEMEMO'" />

<Layout>

    <section>
        <div class="flex h-8 px-5 min-w-full bg-gray-900 items-center">
            <h1 class="text-red-500 text-xl font-bold">FANZA</h1>
            <span class="font-normal ml-5 text-sm text-gray-200">メモできる動画の本数： {{ fanzacount }}</span>
        </div>
        <div class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-bold text-xs">
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('flist.genre')" class="">ジャンル一覧</Link></div>
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('flist.actress')" class="">女優一覧</Link></div>
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('flist.maker')" class="">メーカー一覧</Link></div>
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('flist.series')" class="">シリーズ一覧</Link></div>
            </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">新着動画</h2>
            <a :href="route('flist.index')" class="text-blue-500 hover:underline">動画一覧へ</a>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="fvideoid in fvideoids" :key="fvideoid.id" class="">
                    <div class="w-28 h-40 mx-2 border-none overflow-hidden bg-white">
                        <Link :href="route('fvideo.show', { id: fvideoid.content_id })">
                        <img :src="'https://pics.dmm.co.jp/digital/video/' + fvideoid.content_id  + '/' + fvideoid.content_id + 'ps.jpg'" :alt="'【FANZA】' + fvideoid.title + 'のメイン画像'" class="h-40">
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-5 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">女優</h2>
            <Link :href="route('flist.actress')" class="text-blue-500 hover:underline">女優一覧へ</Link>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzaactress in fanzaactresss" :key="fanzaactress.id" class="">
                    <div v-if="fanzaactress.actress" class="h-48 border-none bg-white">
                        <a :href="route('flist.show', { keyword: fanzaactress.actress })" class="p-2 text-blue-500 text-center inline-block">
                            <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzaactress.content_id  + '/' + fanzaactress.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzaactress.title + 'のメイン画像'" class="h-40">
                            <span class="w-28 mt-0.5 text-sm inline-block truncate">{{ fanzaactress.actress }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-5 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">メーカー</h2>
            <Link :href="route('flist.maker')" class="text-blue-500 hover:underline">メーカー一覧へ</Link>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzamaker in fanzamakers" :key="fanzamaker.id" class="">
                    <div v-if="fanzamaker.maker" class="h-48 border-none bg-white">
                        <a :href="route('flist.show', { keyword: fanzamaker.maker })" class="p-2 text-blue-500 text-center inline-block">
                            <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzamaker.content_id  + '/' + fanzamaker.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzamaker.title + 'のメイン画像'" class="h-40">
                            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ fanzamaker.maker }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-5 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">シリーズ</h2>
            <Link :href="route('flist.series')" class="text-blue-500 hover:underline">シリーズ一覧へ</Link>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzaseries in fanzaseriess" :key="fanzaseries.id" class="">
                    <div v-if="fanzaseries.series" class="h-48 border-none bg-white">
                        <a :href="route('flist.show', { keyword: fanzaseries.series })" class="p-2 text-blue-500 text-center inline-block">
                            <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzaseries.content_id  + '/' + fanzaseries.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzaseries.title + 'のメイン画像'" class="h-40">
                            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ fanzaseries.series }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section class="mt-12">
        <div class="flex h-8 px-5 min-w-full bg-gray-900 items-center">
            <h1 class="text-red-500 text-xl font-bold">DUGA</h1>
            <span class="font-normal ml-5 text-sm text-gray-200">メモできる動画の本数： {{ dugacount }}</span>
        </div>
        <div class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-bold text-xs">
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('dlist.category')" class="">カテゴリ一覧</Link></div>
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('dlist.performer')" class="">女優一覧</Link></div>
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('dlist.maker')" class="">メーカー一覧</Link></div>
            <div class="h-7 w-1/4 pt-1.5 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white">
                <Link :href="route('dlist.series')" class="">シリーズ一覧</Link></div>
            </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl inline-block">新着動画</h2>
            <a :href="route('dlist.index')" class="text-blue-500 hover:underline">動画一覧へ</a>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="dvideoid in dvideoids" :key="dvideoid.id" class="">
                    <div class="h-40 border-none bg-white">
                        <Link :href="route('dvideo.show', { id: dvideoid.productid })">
                        <img v-if="dvideoid.jacketimage" :src="dvideoid.jacketimage" :alt="'【DUGA】' + dvideoid.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                        <img v-else :src="dvideoid.posterimage" :alt="'【DUGA】' + dvideoid.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl inline-block">女優</h2>
            <Link :href="route('dlist.performer')" class="text-blue-500 hover:underline">女優一覧へ</Link>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugaperformer in dugaperformers" :key="dugaperformer.id" class="">
                    <div v-if="dugaperformer.performer" class="h-48 border-none bg-white">
                        <a :href="route('dlist.show', { keyword: dugaperformer.performer })" class="p-2 text-blue-500 text-center inline-block">
                            <img v-if="dugaperformer.jacketimage" :src="dugaperformer.jacketimage" :alt="'【DUGA】' + dugaperformer.title + 'のメイン画像'" class="w-28 h-40">
                            <img v-else :src="dugaperformer.posterimage" :alt="'【DUGA】' + dugaperformer.title + 'のメイン画像'" class="w-28 h-40">
                            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ dugaperformer.performer }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl inline-block">メーカー</h2>
            <Link :href="route('dlist.maker')" class="text-blue-500 hover:underline">メーカー一覧へ</Link>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugamaker in dugamakers" :key="dugamaker.id" class="">
                    <div v-if="dugamaker.maker" class="h-48 border-none bg-white">
                        <a :href="route('dlist.show', { keyword: dugamaker.maker })" class="p-2 text-blue-500 text-center inline-block">
                            <img v-if="dugamaker.jacketimage" :src="dugamaker.jacketimage" :alt="'【DUGA】' + dugamaker.title + 'のメイン画像'" class="w-28 h-40">
                            <img v-else :src="dugamaker.posterimage" :alt="'【DUGA】' + dugamaker.title + 'のメイン画像'" class="w-28 h-40">
                            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ dugamaker.maker }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl inline-block">シリーズ</h2>
            <Link :href="route('dlist.series')" class="text-blue-500 hover:underline">シリーズ一覧へ</Link>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-10">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugaseries in dugaseriess" :key="dugaseries.id" class="">
                    <div v-if="dugaseries.series" class="h-48 border-none bg-white">
                        <a :href="route('dlist.show', { keyword: dugaseries.series })" class="p-2 text-blue-500 text-center inline-block">
                            <img v-if="dugaseries.jacketimage" :src="dugaseries.jacketimage" :alt="'【DUGA】' + dugaseries.title" class="w-28 h-40">
                            <img v-else :src="dugaseries.posterimage" :alt="'【DUGA】' + dugaseries.title + 'のメイン画像'" class="w-28 h-40">
                            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ dugaseries.series }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</Layout>
</template>
