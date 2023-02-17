<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head :title="'当サイトについて'" />

<BasicLayout>
  <div class="min-h-screen w-screen bg-gray-100 py-10">
    <div class="w-11/12 md:w-9/12 mx-auto p-4 bg-white text-gray-700">
      <div class="mx-auto pt-2">
        <section class="w-full px-2 space-y-3">
          <h1 class="pb-1 font-bold md:text-xl leading-tight border-b-4 border-gray-400">当サイトについて</h1>
          <p>
            当サイトは、デジタルコンテンツ配信サービスの「FANZA」及び「DUGA」で配信されている動画コンテンツにメモを投稿できるサイトです。※VR動画には対応していません</p>
          <p>
            当サイトは、個人がプログラミング学習の一環として制作しているウェブサイトです。機能の不備やレイアウトの崩れなどがおそらくあります。発見次第に改善していきますのでご了承ください。
          </p>
          <h2 class="pt-5 pb-1 font-bold md:text-xl leading-tight border-b-4 border-gray-400">メモの種類について</h2>
          <p class="mb-5">メモは３種類あります。利用されると同時に<Link :href="route('rule')" class="text-blue-500 hover:underline">利用規約</Link>に同意したものとされます。</p>
            <p class="w-24 my-2 py-1 px-2 font-semibold bg-amber-200 rounded-2xl">フリーメモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>会員登録せずに利用ができます。</li>
                <li>5文字以上300文字以内でメモができます。</li>
                <li>誰でも自由にメモやメモの削除ができます。</li>
                <li>自分のメモが誰かに削除される可能性があります。</li>
            </ul>
            
            <p class="w-20 py-1 px-2 mt-5 mb-2 font-semibold bg-blue-200 rounded-2xl">公開メモ</p>
            <ul class="leading-8 list-disc list-inside">
                <li>無料会員登録後に利用ができます。</li>
                <li>5文字以上500文字以内でメモができます。</li>
                <li>公開時にニックネームを使用するか選択ができます。
                    <p class="text-sm leading-7">（例）<span class="py-1 px-2 bg-blue-200 rounded-2xl">FANGAさんの公開メモ</span> または<span class="py-1 px-2 bg-blue-200 rounded-2xl">ログインユーザーの公開メモ</span></p>
                </li>
                <li>公開メモの編集や削除はできません。</li>
                <li>公開メモの内容によっては、運営側の判断により削除又は内容の一部を修正される可能性があります。</li>
            </ul>
            <p class="w-24 mt-5 mb-2 py-1 px-2 font-semibold bg-red-200 rounded-2xl">非公開メモ</p>
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