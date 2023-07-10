<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Detail from '@/Components/Fanza/Detail.vue';
import PostTab from '@/Components/Fanza/PostTab.vue';
import FreeMemo from '@/Components/Fanza/FreeMemo.vue';
import ReleaseMemo from '@/Components/Fanza/ReleaseMemo.vue';
import PrivateMemo from '@/Components/Fanza/PrivateMemo.vue';
import NewMemo from '@/Components/Fanza/Kanren/NewMemo.vue';
import MyList from '@/Components/Fanza/Kanren/MyList.vue';
import NewVideo from '@/Components/Fanza/Kanren/NewVideo.vue';
import Actress from '@/Components/Fanza/Kanren/Actress.vue';
import Maker from '@/Components/Fanza/Kanren/Maker.vue';
import Series from '@/Components/Fanza/Kanren/Series.vue';
import Director from '@/Components/Fanza/Kanren/Director.vue';
import Genre2 from '@/Components/Fanza/Kanren/Genre2.vue';
import Site from '@/Components/Fanza/Kanren/Site.vue';

const props = defineProps({
  videoa: Object,
  videoids: Object,
  fvideoids: Object,
  date: String,
  fanzaactresss: Object,
  fanzaactresscount: Number,
  fanzamakers: Object,
  fanzamakercount: Number,
  fanzaseriess: Object,
  fanzaseriescount: Number,
  fanzadirectors: Object,
  fanzadirectorcount: Number,
  fanzagenre2s: Object,
  fanzagenre2count: Number,
  fanza_free_memos: Object,
  fanza_release_memos: Object,
  fanza_release_memo_count: Number,
  fanza_private_memos: Object,
  mylists: Object,
  mylistcount: Number,
  mynices: Object,
  mynicecount: Number,
  releaselists: Object,
  nice: Object,
  nicecount: Number,
  privatememolimit: Number
})

</script>

<template>
  <Head :title="'【FANZA】' + videoa.title" />

  <Layout>
    <article>
      <Detail :videoa="videoa" :videoids="videoids" :date="date" :nice="nice" :nicecount="nicecount" />
      <!-- メモ -->
      <section>
        <div class="min-h-32 mt-14">
          <div id="memo" class="flex border-b-4 border-gray-500 justify-between items-end">
            <h2 class="ml-4 mb-1 text-2xl font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
              </svg>
              メモ
            </h2>
            <p class="mr-5 text-blue-500">
              <Link :href="route('about') + '#memotype'" class="cursor-pointer hover:underline hover:text-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 mb-1 -mr-1 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
              </svg>
              メモの種類について
              </Link>
            </p>
          </div>
          <!-- 非公開メモ -->
          <PrivateMemo :fanza_private_memos="fanza_private_memos" />
          <!-- メモ -->
          <ReleaseMemo :videoa="videoa" :fanza_release_memos="fanza_release_memos"
            :fanza_release_memo_count="fanza_release_memo_count" />
          <!-- フリーメモ -->
          <FreeMemo :fanza_free_memos="fanza_free_memos" />
        </div>
        <!-- 投稿用のタブ -->
        <PostTab :videoa="videoa" :privatememolimit="privatememolimit" />
      </section>
    </article>
    <!-- 関連動画 -->
    <article>
      <NewMemo :releaselists="releaselists" />
      <MyList :mylists="mylists" :mylistcount="mylistcount" :mynices="mynices" :mynicecount="mynicecount" />
      <NewVideo :fvideoids="fvideoids" />
      <Actress :actress="videoa.actress" :fanzaactresss="fanzaactresss" :fanzaactresscount="fanzaactresscount" />
      <Maker :maker="videoa.maker" :fanzamakers="fanzamakers" :fanzamakercount="fanzamakercount" />
      <Series :series="videoa.series" :fanzaseriess="fanzaseriess" :fanzaseriescount="fanzaseriescount" />
      <Director :director="videoa.director" :fanzadirectors="fanzadirectors" :fanzadirectorcount="fanzadirectorcount" />
      <Genre2 :genre2="videoa.genre2" :fanzagenre2s="fanzagenre2s" :fanzagenre2count="fanzagenre2count" />
      <Site />
    </article>
  </Layout>
</template>