<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  scrolls: Object
})
</script>

<template>
  <div class="flex overflow-x-auto hidden-scrollbar h-52 mx-4">
    <ul class="flex flex-none flex-wrap space-x-4">
      <li v-for="scroll in scrolls" :key="scroll.id" class="">
        <Link :href="route('dvideo.show', { id: scroll.productid })">
        <img v-if="scroll.jacketimage" :src="scroll.jacketimage" :alt="'【DUGA】' + scroll.title + 'のジャケット画像'" class="h-44">
        <img v-else :src="scroll.posterimage" :alt="'【DUGA】' + scroll.title + 'のメイン画像'" class="h-44 w-32">
        </Link>
      </li>
    </ul>
  </div>
</template>