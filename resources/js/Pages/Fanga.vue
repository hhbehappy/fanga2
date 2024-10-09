<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  topflists: Object,
  topdlists: Object,
  threads: Object
})
</script>
<template>
  <Head :title="'トップページ'" />

  <Layout>
    <section>
      <div class="m-5 md:m-0 p-3 rounded border-2 border-gray-600">
        <h1 class="mb-3 font-bold">ようこそFANGA(ファンガ)へ</h1>
        <p>当サイトは、FANZAやDUGAで配信されている人気アダルト動画のレヴューサイトではありません。</p>
        <p>アダルト動画のレヴューサイトではなくて、アダルトな掲示板でもない、ただのオナニー日記かもしれません。</p>
        <h2 class="mt-8 mb-2 font-bold">メモの多い人気の動画</h2>
        <h3 class="font-bold"><span class="mx-2 text-red-500">FANZA</span>TOP5</h3>
        <ul class="flex flex-wrap justify-center md:justify-start">
          <li v-for="topflist in topflists" :key="topflist.id" class="m-2">
            <Link :href="route('fvideo.show', { id: topflist.content_id })">
            <img
              :src="'https://pics.dmm.co.jp/digital/video/' + topflist.content_id + '/' + topflist.content_id + 'ps.jpg'"
              :alt="'【FANZA】' + topflist.title + 'のジャケット画像'" class="w-32 h-44">
            </Link>
          </li>
        </ul>
        <h3 class="mt-2 font-bold"><span class="mx-2 text-red-500">DUGA</span>TOP5</h3>
        <ul class="flex flex-wrap justify-center md:justify-start">
          <li v-for="topdlist in topdlists" :key="topdlist.id" class="m-2">
            <Link :href="route('dvideo.show', { id: topdlist.productid })">
            <img v-if="topdlist.jacketimage"
              :src="'https://pic.duga.jp/unsecure/' + topdlist.re_productid + '/noauth/jacket_240.jpg'"
              :alt="'【DUGA】' + topdlist.title + 'のジャケット画像'" class="h-44 w-32">
            <img v-else :src="'https://pic.duga.jp/unsecure/' + topdlist.re_productid + '/noauth/180x180.jpg'"
              :alt="'【DUGA】' + topdlist.title + 'のメイン画像'" class="h-44 w-32">
            </Link>
          </li>
        </ul>
        <h2 class="mt-12 mb-3 font-bold">メモできる動画をお探しの方はこちら</h2>
        <ul class="list-disc list-inside space-y-3">
          <li>
            <Link :href="route('fvideo.index')" class="text-blue-500 hover:underline hover:text-red-500">FANZAの動画を探す
            </Link>
          </li>
          <li>
            <Link :href="route('dvideo.index')" class="text-blue-500 hover:underline hover:text-red-500">DUGAの動画を探す</Link>
          </li>
        </ul>
        <h2 class="mt-12 mb-3 font-bold">BBS</h2>
        <ul class="list-disc list-inside space-y-3 whitespace-pre-line break-all">
          <li v-for="thread in threads" :key="thread.id">
            <Link :href="route('threads.show', thread.id)" class="font-mono text-blue-500 hover:underline hover:text-red-500">
            {{ thread.title }}</Link>
          </li>
        </ul>
      </div>
    </section>
  </Layout>
</template>