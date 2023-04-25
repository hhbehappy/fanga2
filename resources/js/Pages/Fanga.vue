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
    fanzamemos: Object,
    myflists: Object,
    myflistcount: Number,
    dugaperformers: Object,
    dugamakers: Object,
    dugaseriess: Object,
    dugamemos: Object,
    mydlists: Object,
    mydlistcount: Number,
})

</script>

<template>
    <Head :title="'FANZA&DUGA FREEMEMO'" />

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
            <h2 class="font-bold text-xl">メモされた動画</h2>
            <a :href="route('fmemo.index')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                メモされた動画一覧
            </a>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzamemo in fanzamemos" :key="fanzamemo.id" class="">
                    <div class="w-[117px] h-40 mx-2 border-none overflow-hidden">
                        <Link :href="route('fvideo.show', { id: fanzamemo.content_id })">
                        <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzamemo.content_id  + '/' + fanzamemo.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzamemo.title + 'のメイン画像'" class="h-40">
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="$page.props.auth.user">
            <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
            <Link :href="route('mypage')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                マイページ
            </Link>
            </div>
            <div v-if="myflistcount !== 0">
                <div class="flex overflow-x-scroll pb-4 mb-8">
                    <div class="flex flex-none flex-wrap">
                        <div v-for="myflist in myflists" :key="myflist.id">
                            <div class="w-[117px] h-40 mx-2 border-none overflow-hidden">
                            <Link :href="route('fvideo.show', { id: myflist.content_id })">
                                <img :src="'https://pics.dmm.co.jp/digital/video/' + myflist.content_id  + '/' + myflist.content_id + 'ps.jpg'" :alt="'【FANZA】' + myflist.title + 'のジャケット画像'" class="h-40">
                            </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="flex h-20 pl-5 items-center">
                    <p>メモした動画はまだありません。</p>
                </div>
            </div>
        </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">新着動画</h2>
            <a :href="route('flist.index')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                全動画一覧
            </a>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="fvideoid in fvideoids" :key="fvideoid.id" class="">
                    <div class="w-[117px] h-40 mx-2 border-none overflow-hidden">
                        <Link :href="route('fvideo.show', { id: fvideoid.content_id })">
                        <img :src="'https://pics.dmm.co.jp/digital/video/' + fvideoid.content_id  + '/' + fvideoid.content_id + 'ps.jpg'" :alt="'【FANZA】' + fvideoid.title + 'のメイン画像'" class="h-40">
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-5 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">女優</h2>
            <Link :href="route('flist.actress')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                女優一覧
            </Link>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzaactress in fanzaactresss" :key="fanzaactress.id" class="">
                    <div v-if="fanzaactress.actress" class="w-[133px] h-48 border-none">
                        <a :href="route('flist.show', { keyword: fanzaactress.actress })" class="p-2 text-blue-500 text-center inline-block hover:text-red-500">
                            <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzaactress.content_id  + '/' + fanzaactress.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzaactress.title + 'のメイン画像'" class="h-40">
                            <span class="w-28 mt-0.5 text-sm inline-block truncate">{{ fanzaactress.actress }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-5 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">メーカー</h2>
            <Link :href="route('flist.maker')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                メーカー一覧
            </Link>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzamaker in fanzamakers" :key="fanzamaker.id" class="">
                    <div v-if="fanzamaker.maker" class="w-[133px] h-48 border-none">
                        <a :href="route('flist.show', { keyword: fanzamaker.maker })" class="p-2 text-blue-500 text-center inline-block hover:text-red-500">
                            <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzamaker.content_id  + '/' + fanzamaker.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzamaker.title + 'のメイン画像'" class="h-40">
                            <span class="w-28 -mb-2 text-sm inline-block truncate">{{ fanzamaker.maker }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex my-5 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">シリーズ</h2>
            <Link :href="route('flist.series')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                シリーズ一覧
            </Link>
        </div>
        <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="fanzaseries in fanzaseriess" :key="fanzaseries.id" class="">
                    <div v-if="fanzaseries.series" class="w-[133px] h-48 border-none">
                        <a :href="route('flist.show', { keyword: fanzaseries.series })" class="p-2 text-blue-500 text-center inline-block hover:text-red-500">
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
            <h2 class="font-bold text-xl">メモされた動画</h2>
            <a :href="route('dmemo.index')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                メモされた動画一覧
            </a>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugamemo in dugamemos" :key="dugamemo.id" class="">
                    <div class="w-[117px] h-40 mx-2 border-none overflow-hidden">
                        <Link :href="route('dvideo.show', { id: dugamemo.productid })">
                        <img v-if="dugamemo.jacketimage" :src="dugamemo.jacketimage" :alt="'【DUGA】' + dugamemo.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                        <img v-else :src="dugamemo.posterimage" :alt="'【DUGA】' + dugamemo.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="$page.props.auth.user">
            <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
            <Link :href="route('mypage')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                マイページ
            </Link>
            </div>
            <div v-if="mydlistcount !== 0">
                <div class="flex overflow-x-scroll pb-4 mb-8">
                    <div class="flex flex-none flex-wrap">
                        <div v-for="mydlist in mydlists" :key="mydlist.id">
                            <div class="w-[117px] h-40 mx-2 border-none overflow-hidden">
                                <Link :href="route('dvideo.show', { id: mydlist.productid })">
                                <img v-if="mydlist.jacketimage" :src="mydlist.jacketimage" :alt="'【DUGA】' + mydlist.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                                <img v-else :src="mydlist.posterimage" :alt="'【DUGA】' + mydlist.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                            </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="flex h-20 pl-5 items-center">
                    <p>メモした動画はまだありません。</p>
                </div>
            </div>
        </div>
        <div class="flex my-4 px-5 md:pr-10 border-b-4 border-gray-500 items-center justify-between">
            <h2 class="font-bold text-xl inline-block">新着動画</h2>
            <a :href="route('dlist.index')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                全動画一覧
            </a>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="dvideoid in dvideoids" :key="dvideoid.id" class="">
                    <div class="w-[133px] h-40 border-none">
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
            <Link :href="route('dlist.performer')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                女優一覧
            </Link>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugaperformer in dugaperformers" :key="dugaperformer.id" class="">
                    <div v-if="dugaperformer.performer" class="w-[133px] h-48 border-none">
                        <a :href="route('dlist.show', { keyword: dugaperformer.performer })" class="p-2 text-blue-500 text-center inline-block hover:text-red-500">
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
            <Link :href="route('dlist.maker')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                メーカー一覧
            </Link>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-8">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugamaker in dugamakers" :key="dugamaker.id" class="">
                    <div v-if="dugamaker.maker" class="w-[133px] h-48 border-none">
                        <a :href="route('dlist.show', { keyword: dugamaker.maker })" class="p-2 text-blue-500 text-center inline-block hover:text-red-500">
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
            <Link :href="route('dlist.series')" class="text-blue-500 hover:underline hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
                <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                シリーズ一覧
            </Link>
        </div>
        <div class="flex overflow-x-scroll pb-4 mb-10">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugaseries in dugaseriess" :key="dugaseries.id" class="">
                    <div v-if="dugaseries.series" class="w-[133px] h-48 border-none">
                        <a :href="route('dlist.show', { keyword: dugaseries.series })" class="p-2 text-blue-500 text-center inline-block hover:text-red-500">
                            <img v-if="dugaseries.jacketimage" :src="dugaseries.jacketimage" :alt="'【DUGA】' + dugaseries.title + 'のメイン画像'" class="w-28 h-40">
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