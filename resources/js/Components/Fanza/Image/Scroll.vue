<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  scrolls: Object
})
</script>

<template>
  <div class="flex overflow-x-auto hidden-scrollbar h-52 mx-4">
    <ul class="flex flex-none flex-nowrap space-x-4">
      <li v-for="scroll in scrolls" :key="scroll.id">
        <Link :href="route('fvideo.show', { id: scroll.content_id })">
        <img :src="'https://pics.dmm.co.jp/digital/video/' + scroll.content_id + '/' + scroll.content_id + 'ps.jpg'"
          :alt="'【FANZA】' + scroll.title + 'のジャケット画像'" class="w-32">
        </Link>
      </li>
    </ul>
  </div>
</template>