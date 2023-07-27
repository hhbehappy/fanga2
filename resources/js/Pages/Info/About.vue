<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head :title="'当サイトについて'" />

  <BasicLayout>
    <div class="min-h-screen w-screen max-w-[1320px] bg-gray-100 py-10">
      <div class="w-11/12 md:w-9/12 max-w-3xl mx-auto p-2 bg-white text-gray-700">
        <div class="mx-auto">
          <section class="w-full px-2 space-y-4">
            <h1 class="py-1 font-bold md:text-xl leading-tight border-b-4 border-gray-400">当サイトについて</h1>
            <p>
              当サイトは、FANZAとDUGAで配信されている人気アダルト動画のレヴューサイトではありません。アダルト動画のレヴューサイトではなくて、アダルトな掲示板でもない、ただのオナニー日記かもしれません。</p>
            <p>
              当サイトは、完全リンクフリーです。
            </p>
            <div class="flex pt-3 mx-auto border-b-4 border-gray-400">
              <h2 id="memotype" class="font-bold md:text-xl leading-tight">メモの種類について
              </h2>
              <Link :href="route('rule')" class="ml-auto px-4 text-blue-500 hover:underline">利用規約</Link>
            </div>
            <p class="mb-5">メモは３種類あります。
            </p>
            <h3 class="my-2 py-1 font-semibold border-dotted border-b-2 border-amber-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 mb-1 text-amber-400 inline-block">
                <path fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                  clip-rule="evenodd" />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
              </svg>
              フリーメモ
            </h3>
            <ul class="leading-8 list-disc list-inside">
              <li>会員登録せずに利用ができます。</li>
              <li>2文字以上300文字以内でメモができます。</li>
              <li>誰でも自由にメモやメモの削除ができます。</li>
              <li>自分のメモが誰かに削除される可能性があります。</li>
            </ul>

            <h3 class="py-1 mt-5 mb-2 font-semibold border-dotted border-b-2 border-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 mb-1 text-blue-400 inline-block">
                <path fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                  clip-rule="evenodd" />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
              </svg>
              メモ
            </h3>
            <ul class="leading-8 list-disc list-inside">
              <li>無料会員登録後に利用ができます。</li>
              <li>2文字以上500文字以内でメモができます。</li>
              <li>公開時にニックネームを使用するか選択ができます。
                <p class="text-sm leading-7">（例）<span class="py-1 px-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                      class="w-4 h-4 mb-1 text-blue-400 inline-block">
                      <path fill-rule="evenodd"
                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                        clip-rule="evenodd" />
                      <path
                        d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                    </svg>
                    FANGA
                  </span>
                  、
                  <span class="py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                      class="w-4 h-4 mb-1 text-green-500 inline-block">
                      <path fill-rule="evenodd"
                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                        clip-rule="evenodd" />
                      <path
                        d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                    </svg>
                    ログインユーザー
                  </span>
                </p>
                <p class="text-sm leading-7">（退会後）<span class="py-1">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                      class="w-4 h-4 mb-1 text-gray-400 inline-block">
                      <path fill-rule="evenodd"
                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                        clip-rule="evenodd" />
                      <path
                        d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                    </svg>
                    退会済みユーザー
                </span>
                </p>
              </li>
              <li>メモの編集や削除はできません。</li>
              <li>メモの内容によっては、運営側の判断により削除又は内容の一部を修正される可能性があります。</li>
            </ul>
            <h3 class="mt-5 mb-2 py-1 font-semibold border-dotted border-b-2 border-red-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="w-4 h-4 mb-1 text-red-300 inline-block">
              <path fill-rule="evenodd"
                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                clip-rule="evenodd" />
              <path
                d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            非公開メモ
          </h3>
          <ul class="leading-8 list-disc list-inside">
            <li>無料会員登録後に利用ができます。</li>
            <li>2文字以上500文字以内で、1作品に2つまでメモができます。</li>
            <li>誰にも見られない自分だけのメモです。</li>
            <li>非公開メモの編集や削除ができます。</li>
          </ul>
        </section>
      </div>
    </div>
  </div>
</BasicLayout></template>