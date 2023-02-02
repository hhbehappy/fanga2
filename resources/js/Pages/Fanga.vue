<script setup>
// import Layout from '@/Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';
// import { router } from '@inertiajs/vue3';


const props = defineProps({
    videoids: Object,
    // dugavideos: Object,
    // fanzacount: Number,
    // dugacount: Number,
    // fanzaactresss: Object,
    // fanzamakers: Object,
    // fanzaseriess: Object,
    // dugaperformers: Object,
    // dugamakers: Object,
    // dugaseriess: Object
})

</script>

<template>
<!-- <Layout> -->
  <h1>トップページ</h1>

  <div v-for="videoid in videoids" :key="videoid.id" class="">
    <div class="w-28 h-40 mx-2 border-none overflow-hidden bg-white">
      <Link :href="route('fvideo.show', { id: videoid.content_id })">
      <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id  + '/' + videoid.content_id + 'ps.jpg'" :alt="'【FANZA】' + videoid.title + 'のメイン画像'" class="h-40">
      </Link>
    </div>
  </div>

<!-- </Layout> -->
</template>