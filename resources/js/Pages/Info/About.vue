<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head :title="'当サイトについて'" />

<BasicLayout>
  <div class="min-h-screen w-screen bg-gray-100 py-10">
    <div class="w-11/12 md:w-9/12 max-w-3xl mx-auto p-2 bg-white text-gray-700">
      <div class="mx-auto">
        <section class="w-full px-2 space-y-3">
          <h1 class="pb-1 font-bold md:text-xl leading-tight border-b-4 border-gray-400">当サイトについて</h1>
          <p>
            当サイトは、デジタルコンテンツ配信サービスの「FANZA」及び「DUGA」で配信されている動画コンテンツに、当サイト内においてメモを投稿できるウェブサイトです。※VR動画及び一部の動画には対応していません</p>
          <p>
            当サイトは、完全リンクフリーです。
          </p>
          <h2 id="memotype" class="pt-5 pb-1 font-bold md:text-xl leading-tight border-b-4 border-gray-400">メモの種類について</h2>
          <p class="mb-5">メモは３種類あります。利用されると同時に<Link :href="route('rule')" class="text-blue-500 hover:underline">利用規約</Link>に同意したものとされます。</p>
            <p class="w-28 my-2 py-1 px-3 font-semibold border-l-4 border-b border-amber-200">フリーメモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>会員登録せずに利用ができます。</li>
                <li>5文字以上300文字以内でメモができます。</li>
                <li>誰でも自由にメモやメモの削除ができます。</li>
                <li>自分のメモが誰かに削除される可能性があります。</li>
            </ul>
            
            <p class="w-24 py-1 px-3 mt-5 mb-2 font-semibold border-l-4 border-b border-blue-200">メモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>無料会員登録後に利用ができます。</li>
                <li>5文字以上500文字以内でメモができます。</li>
                <li>公開時にニックネームを使用するか選択ができます。
                    <p class="text-sm leading-7">（例）<span class="py-1 px-2 border-l-4 border-b border-blue-200">FANGAさんのメモ</span> または<span class="ml-2 py-1 px-2 border-l-4 border-b border-blue-200">ログインユーザーのメモ</span></p>
                </li>
                <li>メモの編集や削除はできません。</li>
                <li>メモの内容によっては、運営側の判断により削除又は内容の一部を修正させる可能性があります。</li>
            </ul>
            <p class="w-28 mt-5 mb-2 py-1 px-3 font-semibold border-l-4 border-b border-red-200">非公開メモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>無料会員登録後に利用ができます。</li>
                <li>5文字以上500文字以内で、1作品につき2つまでメモができます。</li>
                <li>誰にも見られない自分だけのメモです。</li>
                <li>非公開メモの編集や削除ができます。</li>
            </ul>
        </section>
      </div>
    </div>
  </div>
</BasicLayout>
</template>