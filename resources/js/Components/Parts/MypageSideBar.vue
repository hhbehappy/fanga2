<script setup>
import {  Link } from '@inertiajs/vue3';

const props = defineProps({
  users: Object,
})

</script>

<template>
  <aside class="hidden md:flex flex-col md:w-[140px] lg:w-[160px] shrink-0 bg-white border-4 text-left border-black mx-4 lg:mx-8 mb-10">
    <div class="flex flex-col pb-3 space-y-1">
      <p class="pb-1 pl-3 text-lg text-gray-300 bg-black">MENU</p>
        <div class="pb-4 pl-3 space-y-1">
          <h1 class="pb-1 text-lg text-red-500 font-bold">FANZA</h1>
          <p class="">非公開メモ（{{ $page.props.count.fanzaprivatememo }}）</p>
          <p class="">公開メモ（{{ $page.props.count.fanzareleasememo }}）</p>
          <p class="">フリーメモ（{{ $page.props.count.fanzafreememo }}）</p>
          <p class="">気になる動画（{{ $page.props.count.fanzanice }}）</p>
        </div>
        <div class="py-2 pl-3 border-t-2 border-gray-400 space-y-1">
          <h1 class="pb-1 text-lg text-red-500 font-bold">DUGA</h1>
          <div class="space-y-1">
            <p class="">非公開メモ（{{ $page.props.count.dugaprivatememo }}）</p>
            <p class="">公開メモ（{{ $page.props.count.dugareleasememo }}）</p>
            <p class="">フリーメモ（{{ $page.props.count.dugafreememo }}）</p>
            <p class="">気になる動画（{{ $page.props.count.duganice }}）</p>
          </div>
        </div>
        <div class="flex flex-col pt-3 border-t-2 border-gray-400 space-y-1">
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <a :href="route('flist.index')" class="hover:underline">FANZA</a>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <a :href="route('dlist.index')" class="hover:underline">DUGA</a>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800 space-y-1">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('bbs')" class="hover:underline">BBS</Link>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800 space-y-1">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('inquiry')" class="hover:underline">お問い合わせ</Link>
        </p>
        <p class="text-blue-500 pl-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mb-1 w-3 h-3 inline-block text-gray-800 space-y-1">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
          <Link :href="route('logout')" method="post" as="button" class="hover:underline">ログアウト</Link>
        </p>
      </div>
    </div>
      
      
      
      
      
      
      
      
  </aside>
</template>
