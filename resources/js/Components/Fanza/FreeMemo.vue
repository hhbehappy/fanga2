<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
  fanza_free_memos: Object
})

const destroyFreeMemo = id => {
  router.delete(`/fanzafreememo/destroy/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
    preserveScroll: true,
  })
};
</script>

<template>
  <div class="flex flex-col justify-center mx-auto my-2">
        <div v-for="fanza_free_memo in fanza_free_memos" :key="fanza_free_memo.id"
          class="border-dotted border-b border-gray-500 mx-5">
          <div class="flex flex-wrap mb-3 justify-between items-center">
            <div>
              <span class="text-sm font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                  class="w-4 h-4 mb-1 text-amber-400 inline-block">
                  <path fill-rule="evenodd"
                    d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                    clip-rule="evenodd" />
                  <path
                    d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                </svg>
                フリーメモ
              </span>
              <span class="w-44 mt-2 ml-4 text-sm text-zinc-500 inline-block">
                {{ fanza_free_memo.updated_at }}
              </span>
            </div>
            <button type="button" @click="destroyFreeMemo(fanza_free_memo.id)"
              class="mt-2 px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 my-auto mr-1">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              削除
            </button>
          </div>
          <div class="w-full pb-2 whitespace-pre-line break-all">
            {{ fanza_free_memo.free }}
          </div>
        </div>
      </div>
</template>