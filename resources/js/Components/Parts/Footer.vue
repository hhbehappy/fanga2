<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
<footer class="flex flex-col flexed w-screen mt-10 -mb-3 pb-3 bg-gray-800 text-gray-300">
    <div class="block md:hidden">
        <ul class="flex flex-col">
            <li class="flex h-8 w-full bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 justify-end items-center relative">
                <Link :href="route('fanga')" class="absolute top-0 left-0 w-full h-full mt-1">お問い合わせ
                </Link>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li class="flex h-8 w-full bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 justify-end items-center relative">
                <Link :href="route('fanga')" class="absolute top-0 left-0 w-full h-full mt-1">利用規約
                </Link>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li class="flex h-8 w-full bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 justify-end items-center relative">
                <Link :href="route('fanga')" class="absolute top-0 left-0 w-full h-full mt-1">プライバシーポリシー
                </Link>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <div class="flex">
                <li class="h-9 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-green-600 hover:text-white border-r-2 border-t-2 border-gray-500 relative">
                    <Link :href="route('register')" class="absolute top-0 left-0 w-full h-full mt-1.5">
                        <span class="inlien-block py-1 px-8 font-mono text-white bg-green-600 rounded-md">
                            無料会員登録
                        </span>
                    </Link>
                </li>
                <li class="h-9 w-1/2 bg-gray-200 text-center text-gray-700 hover:bg-red-500 hover:text-white border-t-2 border-gray-500 relative">
                    <Link :href="route('login')" class="absolute top-0 left-0 w-full h-full mt-1.5">
                        <span class="inlien-block py-1 px-10 font-mono text-white bg-red-500 rounded-md">
                            ログイン
                        </span>
                    </Link>
                </li>
            </div>
        </ul>
    </div>
    <div class="hidden md:block pt-3">
        <ul class="flex justify-center">
            <li class="h-6 w-44 pr-2 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
                <Link :href="route('fanga')" class="absolute top-0 left-0 w-full h-full">プライバシーポリシー</Link>
            </li>
            <li class="h-6 w-28 text-center hover:bg-red-500 hover:text-white border-r-2 border-gray-500 relative">
                <Link :href="route('fanga')" class="absolute top-0 left-0 w-full h-full">利用規約</Link>
            </li>
            <li class="h-6 w-32 text-center hover:bg-red-500 hover:text-white relative">
                <Link :href="route('fanga')" class="absolute top-0 left-0 w-full h-full">お問い合わせ</Link>
            </li>
        </ul>
    </div>
    <div class="text-center mt-3">© 2022 <Link :href="route('fanga')" class="hover:underline">FANGA</Link>. All Rights Reserved.
    </div>
</footer>
</template>