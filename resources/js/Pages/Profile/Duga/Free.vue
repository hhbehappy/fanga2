<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head } from '@inertiajs/vue3';
import LinkTab from '../Partials/LinkTab.vue';
import FreeList from '../Duga/FreeList.vue';

defineProps({
  dugafreememolists: Object,
  dugafreememovideolists: Object,
  display: String,
  sort: String,
  group: String,
  type: String,
  hits: String
})
</script>

<template>
  <Head :title="'マイページ'" />
  <BasicLayout>
    <div class="max-w-7xl mx-auto mt-5 px-3 md:px-5">
      <section>
        <h1 class="font-bold text-lg md:text-2xl pl-1 border-b-4 border-gray-500">マイページ</h1>
        <LinkTab />
        <div v-if="dugafreememolists.total !== 0">
          <FreeList memoType="duga_free" :videolists="dugafreememovideolists" :memolists="dugafreememolists"
            :display="display" :sort="sort" :group="group" :type="type" :hits="hits" />
        </div>
        <div v-else class="my-24 text-center font-bold text-gray-600">
          <p class="w-64 mx-auto pl-2 border-b-2 border-amber-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="w-4 h-4 mb-1 text-amber-400 inline-block">
              <path fill-rule="evenodd"
                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                clip-rule="evenodd" />
              <path
                d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            フリーメモをしてみましょう。
          </p>
        </div>
      </section>
    </div>
  </BasicLayout>
</template>