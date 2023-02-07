<script setup>
// import Layout from '@/Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';
// import { router } from '@inertiajs/vue3';


const props = defineProps({
    videoids: Object,
    dugavideos: Object,
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

  <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
  <div v-for="videoid in videoids" :key="videoid.id" class="">
    <div class="w-28 h-40 mx-2 border-none overflow-hidden bg-white">
      <Link :href="route('fvideo.show', { id: videoid.content_id })">
      <img :src="'https://pics.dmm.co.jp/digital/video/' + videoid.content_id  + '/' + videoid.content_id + 'ps.jpg'" :alt="'【FANZA】' + videoid.title + 'のメイン画像'" class="h-40">
      </Link>
    </div>
  </div>
  </div></div>

  <div class="flex overflow-x-scroll pb-4">
            <div class="flex flex-none flex-wrap">
                <div v-for="dugavideo in dugavideos" :key="dugavideo.id" class="">
                    <div class="h-40 border-none bg-white">
                        <Link :href="route('dvideo.show', { id: dugavideo.productid })">
                        <img v-if="dugavideo.jacketimage" :src="dugavideo.jacketimage" :alt="'【DUGA】' + dugavideo.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                        <img v-else :src="dugavideo.posterimage" :alt="'【DUGA】' + dugavideo.title + 'のメイン画像'" class="w-28 h-40 mx-2">
                        </Link>
                    </div>
                </div>
            </div>
        </div>

<!-- </Layout> -->
</template>