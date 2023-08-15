<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  threads: Object
})
</script>

<template>
  <section>
    <div class="flex flex-wrap my-8 mx-auto border-b-4 border-gray-500 items-center">
      <h2 class="ml-3 mb-1 text-xl font-bold">BBS</h2>
      <Link :href="route('bbs')"
        class="ml-auto px-6 text-blue-500 hover:underline hover:text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="mb-1 w-3 h-3 inline-block text-gray-800">
          <path fill-rule="evenodd"
            d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
          <path fill-rule="evenodd"
            d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
            clip-rule="evenodd" />
        </svg>
        スレッド一覧
      </Link>
    </div>
    <ul class="mx-3 list-disc list-inside space-y-3 whitespace-pre-line break-all">
      <li v-for="thread in threads" :key="thread.id">
        <Link :href="route('threads.show', thread.id)" class="font-mono text-blue-500 hover:underline hover:text-red-500">
        {{ thread.title }}</Link>
      </li>
    </ul>
  </section>
</template>