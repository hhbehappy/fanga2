<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
<footer class="flex flex-col w-full mt-10 -mb-3 pb-3 bg-gray-800 text-gray-300">
    <!-- スマホ -->
    <div class="block md:hidden">
        <ul class="flex flex-col">
            <li class="flex h-8 w-full bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 justify-end items-center relative">
                <Link :href="route('about')" class="absolute top-0 left-0 w-full h-full mt-1">当サイトについて
                </Link>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li class="flex h-8 w-full bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 justify-end items-center relative">
                <Link :href="route('inquiry')" class="absolute top-0 left-0 w-full h-full mt-1">お問い合わせ
                </Link>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <!-- ログイン -->
            <div v-if="$page.props.auth.user" class="flex">
                <li class="h-10 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-r-2 border-t-2 border-gray-500 relative">
                    <Link :href="route('mypage')" class="absolute top-0 left-0 w-full h-full mt-2 font-bold">マイページ
                    </Link>
                </li>
                <li class="h-10 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 relative">
                    <Link :href="route('bbs')" class="absolute top-0 left-0 w-full h-full mt-2 font-bold">BBS
                    </Link>
                </li>
            </div>
            <div v-else class="flex">
                <li class="h-10 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-green-600 hover:text-white border-r-2 border-t-2 border-gray-500 relative">
                    <Link :href="route('register')" class="absolute top-0 left-0 w-full h-full mt-2">
                        <span class="inlien-block py-0.5 px-4 font-mono text-white bg-green-600 rounded-md">
                            無料会員登録
                        </span>
                    </Link>
                </li>
                <li class="h-10 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 relative">
                    <Link :href="route('login')" class="absolute top-0 left-0 w-full h-full mt-2">
                        <span class="inlien-block py-0.5 px-8 font-mono text-white bg-red-500 rounded-md">
                            ログイン
                        </span>
                    </Link>
                </li>
            </div>
        </ul>
    </div>
    <!-- pc -->
    <div class="hidden md:block pt-3">
        <ul class="flex h-5 justify-center text-sm">
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
    <div class="text-center mt-3">
        <ul class="flex md:hidden h-7 pb-2 justify-center text-sm">
            <li class="w-48 pr-2 text-center hover:bg-red-600 hover:text-white border-gray-500 relative">
                <Link :href="route('privacy')" class="absolute top-0 left-0 w-full h-full">プライバシーポリシー</Link>
            </li>
            <li class="w-48 text-center hover:bg-red-600 hover:text-white border-gray-500 relative">
                <Link :href="route('rule')" class="absolute top-0 left-0 w-full h-full">利用規約</Link>
            </li>
        </ul>
        <p class="text-xs">
            © 2022 <Link :href="route('fanga')" class="hover:underline">FANGA</Link>. All Rights Reserved.
        </p>
    </div>
</footer>
</template>