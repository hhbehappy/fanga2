<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  scrolls: Object
})
</script>

<template>
  <div class="flex overflow-x-auto hidden-scrollbar h-52 mx-4">
    <ul class="flex flex-none flex-wrap space-x-4">
      <li v-for="scroll in scrolls" :key="scroll.id">
        <Link :href="route('dvideo.show', { id: scroll.productid })">
        <img v-if="scroll.duga.jacketimage"
          :src="'https://pic.duga.jp/unsecure/' + scroll.re_productid + '/noauth/jacket_240.jpg'"
          :alt="'【DUGA】' + scroll.duga.title + 'のジャケット画像'" class="h-44">
        <img v-else :src="'https://pic.duga.jp/unsecure/' + scroll.re_productid + '/noauth/180x180.jpg'"
          :alt="'【DUGA】' + scroll.duga.title + 'のメイン画像'" class="h-44 w-32">
        </Link>
      </li>
    </ul>
  </div>
</template>