<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import FanzaScroll from '@/Components/Fanza/Image/Scroll.vue';
import FanzaWithScroll from '@/Components/Fanza/Image/WithScroll.vue';
import DugaScroll from '@/Components/Duga/Image/Scroll.vue';
import DugaWithScroll from '@/Components/Duga/Image/WithScroll.vue';


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
    myfnices: Object,
    myfnicecount: Number,
    dugaperformers: Object,
    dugamakers: Object,
    dugaseriess: Object,
    dugamemos: Object,
    mydlists: Object,
    mydlistcount: Number,
    mydnices: Object,
    mydnicecount: Number,
})

</script>

<template>
    <Head :title="'FANZA&DUGA FREEMEMO'" />

    <Layout>

        <section>
            <section>
                <div class="flex h-8 px-5 min-w-full bg-gray-900 items-center">
                    <h1 class="text-red-500 text-xl font-bold">FANZA</h1>
                    <span class="font-normal ml-5 text-sm text-gray-200">メモできる動画の本数： {{ fanzacount }}</span>
                </div>
                <ul class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-bold text-xs">
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('flist.genre')" class="block">ジャンル一覧</Link>
                    </li>
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('flist.actress')" class="block">女優一覧</Link>
                    </li>
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('flist.maker')" class="block">メーカー一覧</Link>
                    </li>
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('flist.series')" class="block">シリーズ一覧</Link>
                    </li>
                </ul>
            </section>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">メモされた動画</h2>
                    <span class="inline-block ml-auto">
                        <a :href="route('fmemo.memoAll')" class="text-blue-500 hover:underline hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mb-1 w-3 h-3 inline-block text-gray-800">
                                <path fill-rule="evenodd"
                                    d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            メモされた動画一覧
                        </a>
                    </span>
                </div>
                <FanzaWithScroll :scrolls="fanzamemos" />
            </section>
            <section v-if="$page.props.auth.user">
                <div class="flex flex-wrap my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('mypage')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        マイページ
                        </Link>
                    </span>
                </div>
                <div v-if="myflistcount !== 0">
                    <FanzaWithScroll :scrolls="myflists" />
                </div>
                <div v-else>
                    <div class="flex h-20 pl-5 items-center">
                        <p>メモした動画はまだありません。</p>
                    </div>
                </div>
            </section>
            <section v-if="$page.props.auth.user">
                <div class="flex flex-wrap my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">{{ $page.props.auth.user.name }}さんの気になる動画</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('mypage')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        マイページ
                        </Link>
                    </span>
                </div>
                <div v-if="myfnicecount !== 0">
                    <FanzaWithScroll :scrolls="myfnices" />
                </div>
                <div v-else>
                    <div class="flex h-20 pl-5 items-center">
                        <p>気になる動画はまだありません。</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">新着動画</h2>
                    <span class="inline-block ml-auto">
                        <a :href="route('flist.index')" class="text-blue-500 hover:underline hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mb-1 w-3 h-3 inline-block text-gray-800">
                                <path fill-rule="evenodd"
                                    d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            全動画一覧
                        </a>
                    </span>
                </div>
                <FanzaScroll :scrolls="fvideoids" />
            </section>
            <section>
                <div class="flex my-5 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">女優</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('flist.actress')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        女優一覧
                        </Link>
                    </span>
                </div>
                <div class="flex overflow-x-scroll h-52 mx-4">
                    <ul class="flex flex-none flex-wrap space-x-4">
                        <li v-for="fanzaactress in fanzaactresss" :key="fanzaactress.id">
                            <a :href="route('flist.show', { sort: 'actress', keyword: fanzaactress.actress })"
                                class="text-blue-500 text-center inline-block hover:text-red-500">
                                <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzaactress.content_id + '/' + fanzaactress.content_id + 'ps.jpg'"
                                    :alt="'【FANZA】AV女優「' + fanzaactress.actress + '」'" class="w-32">
                                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                                    {{ fanzaactress.actress }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <div class="flex my-5 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">メーカー</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('flist.maker')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        メーカー一覧
                        </Link>
                    </span>
                </div>
                <div class="flex overflow-x-scroll h-52 mx-4">
                    <ul class="flex flex-none flex-wrap space-x-4">
                        <li v-for="fanzamaker in fanzamakers" :key="fanzamaker.id">
                            <a :href="route('flist.show', { sort: 'maker', keyword: fanzamaker.maker })"
                                class="text-blue-500 text-center inline-block hover:text-red-500">
                                <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzamaker.content_id + '/' + fanzamaker.content_id + 'ps.jpg'"
                                    :alt="'【FANZA】AVメーカー「' + fanzamaker.maker + '」'" class="w-32">
                                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                                    {{ fanzamaker.maker }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <div class="flex my-5 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">シリーズ</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('flist.series')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        シリーズ一覧
                        </Link>
                    </span>
                </div>
                <div class="flex overflow-x-scroll h-52 mx-4">
                    <ul class="flex flex-none flex-wrap space-x-4">
                        <li v-for="fanzaseries in fanzaseriess" :key="fanzaseries.id">
                            <a :href="route('flist.show', { sort: 'series', keyword: fanzaseries.series })"
                                class="text-blue-500 text-center inline-block hover:text-red-500">
                                <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzaseries.content_id + '/' + fanzaseries.content_id + 'ps.jpg'"
                                    :alt="'【FANZA】シリーズ「' + fanzaseries.series + '」'" class="w-32">
                                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                                    {{ fanzaseries.series }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </section>
        <section class="mt-12">
            <section>
                <div class="flex h-8 px-5 min-w-full bg-gray-900 items-center">
                    <h1 class="text-red-500 text-xl font-bold">DUGA</h1>
                    <span class="font-normal ml-5 text-sm text-gray-200">メモできる動画の本数： {{ dugacount }}</span>
                </div>
                <ul class="flex flex-nowrap md:hidden h-7 w-full mb-6 bg-gray-200 text-center font-bold text-xs">
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('dlist.category')" class="block">カテゴリ一覧</Link>
                    </li>
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('dlist.performer')" class="block">女優一覧</Link>
                    </li>
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-r-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('dlist.maker')" class="block">メーカー一覧</Link>
                    </li>
                    <li class="h-7 w-1/4 pt-1.5 border-b-2 border-gray-500 hover:bg-red-500 hover:text-white">
                        <Link :href="route('dlist.series')" class="block">シリーズ一覧</Link>
                    </li>
                </ul>
            </section>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">メモされた動画</h2>
                    <span class="inline-block ml-auto">
                        <a :href="route('dmemo.memoAll')" class="text-blue-500 hover:underline hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mb-1 w-3 h-3 inline-block text-gray-800">
                                <path fill-rule="evenodd"
                                    d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            メモされた動画一覧
                        </a>
                    </span>
                </div>
                <DugaWithScroll :scrolls="dugamemos" />
            </section>
            <div v-if="$page.props.auth.user">
                <section>
                    <div class="flex flex-wrap my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                        <h2 class="font-bold text-lg">{{ $page.props.auth.user.name }}さんのメモした動画</h2>
                        <span class="inline-block ml-auto">
                            <Link :href="route('mypage')" class="text-blue-500 hover:underline hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mb-1 w-3 h-3 inline-block text-gray-800">
                                <path fill-rule="evenodd"
                                    d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            マイページ
                            </Link>
                        </span>
                    </div>
                    <div v-if="mydlistcount !== 0">
                        <DugaWithScroll :scrolls="mydlists" />
                    </div>
                    <div v-else>
                        <div class="flex h-20 pl-5 items-center">
                            <p>メモした動画はまだありません。</p>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="flex flex-wrap my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                        <h2 class="font-bold text-lg">{{ $page.props.auth.user.name }}さんの気になる動画</h2>
                        <span class="inline-block ml-auto">
                            <Link :href="route('mypage')" class="text-blue-500 hover:underline hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mb-1 w-3 h-3 inline-block text-gray-800">
                                <path fill-rule="evenodd"
                                    d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            マイページ
                            </Link>
                        </span>
                    </div>
                    <div v-if="mydnicecount !== 0">
                        <DugaWithScroll :scrolls="mydnices" />
                    </div>
                    <div v-else>
                        <div class="flex h-20 pl-5 items-center">
                            <p>気になる動画はまだありません。</p>
                        </div>
                    </div>
                </section>
            </div>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">新着動画</h2>
                    <span class="inline-block ml-auto">
                        <a :href="route('dlist.index')" class="text-blue-500 hover:underline hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mb-1 w-3 h-3 inline-block text-gray-800">
                                <path fill-rule="evenodd"
                                    d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            全動画一覧
                        </a>
                    </span>
                </div>
                <DugaScroll :scrolls="dvideoids" />
            </section>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">女優</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('dlist.performer')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        女優一覧
                        </Link>
                    </span>
                </div>
                <div class="flex overflow-x-scroll h-52 mx-4">
                    <ul class="flex flex-none flex-wrap space-x-4">
                        <li v-for="dugaperformer in dugaperformers" :key="dugaperformer.id" class="">
                            <a :href="route('dlist.show', { sort: 'performer', keyword: dugaperformer.performer })"
                                class="text-blue-500 text-center inline-block hover:text-red-500">
                                <img v-if="dugaperformer.jacketimage" :src="dugaperformer.jacketimage"
                                    :alt="'【DUGA】AV女優「' + dugaperformer.performer + '」'" class="h-44">
                                <img v-else :src="dugaperformer.posterimage"
                                    :alt="'【DUGA】AV女優「' + dugaperformer.performer + '」'" class="h-44 w-32">
                                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                                    {{ dugaperformer.performer }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">メーカー</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('dlist.maker')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        メーカー一覧
                        </Link>
                    </span>
                </div>
                <div class="flex overflow-x-scroll h-52 mx-4">
                    <ul class="flex flex-none flex-wrap space-x-4">
                        <li v-for="dugamaker in dugamakers" :key="dugamaker.id" class="">
                            <a :href="route('dlist.show', { sort: 'maker', keyword: dugamaker.maker })"
                                class="text-blue-500 text-center inline-block hover:text-red-500">
                                <img v-if="dugamaker.jacketimage" :src="dugamaker.jacketimage"
                                    :alt="'【DUGA】AVメーカー「' + dugamaker.maker + '」'" class="h-44">
                                <img v-else :src="dugamaker.posterimage" :alt="'【DUGA】AVメーカー「' + dugamaker.maker + '」'"
                                    class="h-44 w-32">
                                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                                    {{ dugamaker.maker }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <div class="flex my-4 px-4 md:pr-10 border-b-4 border-gray-500 items-center">
                    <h2 class="font-bold text-lg">シリーズ</h2>
                    <span class="inline-block ml-auto">
                        <Link :href="route('dlist.series')" class="text-blue-500 hover:underline hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="mb-1 w-3 h-3 inline-block text-gray-800">
                            <path fill-rule="evenodd"
                                d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        シリーズ一覧
                        </Link>
                    </span>
                </div>
                <div class="flex overflow-x-scroll h-52 mx-4">
                    <ul class="flex flex-none flex-wrap space-x-4">
                        <li v-for="dugaseries in dugaseriess" :key="dugaseries.id" class="">
                            <a :href="route('dlist.show', { sort: 'series', keyword: dugaseries.series })"
                                class="text-blue-500 text-center inline-block hover:text-red-500">
                                <img v-if="dugaseries.jacketimage" :src="dugaseries.jacketimage"
                                    :alt="'【DUGA】シリーズ「' + dugaseries.series + '」'" class="h-44">
                                <img v-else :src="dugaseries.posterimage" :alt="'【DUGA】シリーズ「' + dugaseries.series + '」'"
                                    class="h-44 w-32">
                                <span class="w-28 mt-0.5 text-sm inline-block truncate">
                                    {{ dugaseries.series }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </section>
    </Layout>
</template>