<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
  <Layout>
    <Head :title="'【DUGA】カテゴリ一覧'" />

    <div class="border-b-4 border-gray-500 mb-2">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【DUGA】</span>カテゴリ一覧</h1>
    </div>
    <!-- カテゴリ -->
    <div class="m-5">
        <a :href="route('dlist.show', { sort: 'category', keyword: '素人' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">素人</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'ギャル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ギャル</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '女優' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女優</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '盗撮' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">盗撮</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'パンチラ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">パンチラ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'スカトロ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スカトロ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'おしっこ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">おしっこ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'トイレ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">トイレ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '浣腸' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">浣腸</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '辱め' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">辱め</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '熟女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">熟女</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'SM' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">SM</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '緊縛' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">緊縛</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '女子校生' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女子校生</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'コスプレ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">コスプレ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'レズ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">レズ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'アイドル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アイドル</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'フェチ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">フェチ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'おっぱい' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">おっぱい</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'お尻' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お尻</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'ぽっちゃり' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ぽっちゃり</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'キャットファイト' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">キャットファイト</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'アナル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アナル</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '妊婦' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">妊婦</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'アニメ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アニメ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'ゲイ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ゲイ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'ニューハーフ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ニューハーフ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'シチュエーション' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">シチュエーション</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '痴漢' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">痴漢</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'ドラマ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ドラマ</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'オナニー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">オナニー</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '外国人' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">外国人</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '企画' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">企画</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'M男' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">M男</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '女王様' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女王様</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '痴女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">痴女</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '露出' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">露出</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: 'ロリ系' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ロリ系</a>
        <a :href="route('dlist.show', { sort: 'category', keyword: '成人映画' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">成人映画</a>
    </div>
  </Layout>
</template>