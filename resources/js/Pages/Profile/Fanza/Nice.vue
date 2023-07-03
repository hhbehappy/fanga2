<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head } from '@inertiajs/vue3';
import LinkTab from '../Partials/LinkTab.vue';
import NiceList from '../Fanza/NiceList.vue';

defineProps({
  fanzanicevideolists: Object,
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
        <div v-if="fanzanicevideolists.total !== 0">
          <NiceList memoType="fanza_nice" :videolists="fanzanicevideolists" :display="display"
            :sort="sort" :group="group" :type="type" :hits="hits" />
        </div>
        <div v-else class="my-24 text-center font-bold text-gray-600">
          <p class="w-[306px] mx-auto pl-2 border-b-2 border-pink-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="w-5 h-5 mb-1 text-pink-200 inline-block">
              <path fill-rule="evenodd"
                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                clip-rule="evenodd" />
            </svg>
            気になる動画を登録してみましょう。
          </p>
        </div>
      </section>
    </div>
  </BasicLayout>
</template>