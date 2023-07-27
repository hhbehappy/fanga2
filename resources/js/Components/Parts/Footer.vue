<script setup>
import { Link } from '@inertiajs/vue3';

const path = location.pathname;
</script>

<template>
    <footer class="flex flex-col w-full mt-10 -mb-3">
        <!-- スマホ -->
        <div class="block md:hidden">
            <ul v-if="path.includes('mypage') === false" class="flex flex-col m-8 font-mono text-gray-600 rounded bg-gray-100 border-2 border-gray-600">
                <li class="pl-3 py-0.5 text-sm text-gray-300 bg-gray-800">インフォメーション</li>
                <li class="flex h-9 border-b border-gray-600 hover:bg-red-500 hover:text-white items-center relative">
                    <Link :href="route('about')" class="ml-3 mt-1.5 absolute top-0 left-0 w-full h-full">当サイトについて
                    </Link>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 ml-auto mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex h-9 border-b border-gray-600 hover:bg-red-500 hover:text-white items-center relative">
                    <Link :href="route('inquiry')" class="ml-3 mt-1.5 absolute top-0 left-0 w-full h-full">お問い合わせ
                    </Link>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 ml-auto mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex h-9 border-b border-gray-600 hover:bg-red-500 hover:text-white items-center relative">
                    <Link :href="route('privacy')" class="ml-3 mt-1.5 absolute top-0 left-0 w-full h-full">プライバシーポリシー
                    </Link>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 ml-auto mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex h-9 border-b border-gray-600 hover:bg-red-500 hover:text-white items-center relative">
                    <Link :href="route('rule')" class="ml-3 mt-1.5 absolute top-0 left-0 w-full h-full">利用規約
                    </Link>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 ml-auto mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex h-9 border-b border-gray-600 hover:bg-red-500 hover:text-white items-center relative">
                    <Link :href="route('bbs')" class="ml-3 mt-1.5 absolute top-0 left-0 w-full h-full">BBS
                    </Link>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 ml-auto mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex h-9 border-b border-gray-600 hover:bg-red-500 hover:text-white items-center relative">
                    <Link :href="route('mypage')" class="ml-3 mt-1.5 absolute top-0 left-0 w-full h-full">マイページ
                    </Link>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 ml-auto mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
            </ul>
            <ul class="flex flex-col">
                <li v-if="$page.props.auth.user"
                    class="h-10 w-full bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 font-bold relative">
                    <Link :href="route('logout')" method="post" as="button" class="absolute top-0 left-0 w-full h-full">
                    ログアウト</Link>
                </li>
                <li v-else>
                    <ul class="flex font-mono">
                        <li
                            class="h-10 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-green-600 hover:text-white border-r-2 border-t-2 border-gray-500 relative">
                            <Link :href="route('register')" class="absolute top-0 left-0 w-full h-full mt-2">
                            <span class="inlien-block py-0.5 px-4 text-white bg-green-600 rounded-md">
                                無料会員登録
                            </span>
                            </Link>
                        </li>
                        <li
                            class="h-10 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 relative">
                            <Link :href="route('login')" class="absolute top-0 left-0 w-full h-full mt-2">
                            <span class="inlien-block py-0.5 px-8 text-white bg-red-500 rounded-md">
                                ログイン
                            </span>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- pc -->
        <div class="hidden md:block">
            <ul class="flex pt-3 h-8 justify-center text-sm bg-gray-800 text-gray-300">
                <li class="w-44 pr-2 text-center hover:bg-red-600 hover:text-white border-r-2 border-gray-500 relative">
                    <Link :href="route('about')" class="absolute top-0 left-0 w-full h-full">当サイトについて</Link>
                </li>
                <li class="w-44 pr-2 text-center hover:bg-red-600 hover:text-white border-r-2 border-gray-500 relative">
                    <Link :href="route('privacy')" class="absolute top-0 left-0 w-full h-full">プライバシーポリシー</Link>
                </li>
                <li class="w-28 text-center hover:bg-red-600 hover:text-white border-r-2 border-gray-500 relative">
                    <Link :href="route('rule')" class="absolute top-0 left-0 w-full h-full">利用規約</Link>
                </li>
                <li class="w-20 text-center hover:bg-red-600 hover:text-white border-r-2 border-gray-500 relative">
                    <Link :href="route('bbs')" class="absolute top-0 left-0 w-full h-full">BBS</Link>
                </li>
                <li class="w-32 text-center hover:bg-red-600 hover:text-white relative">
                    <Link :href="route('inquiry')" class="absolute top-0 left-0 w-full h-full">お問い合わせ</Link>
                </li>
            </ul>
        </div>
        <div class="text-center py-3 bg-gray-800 text-gray-300">
            <p class="text-xs">
                © 2022
                <Link :href="route('fanga')" class="hover:underline">FANGA</Link>. All Rights Reserved.
            </p>
        </div>
    </footer>
</template>