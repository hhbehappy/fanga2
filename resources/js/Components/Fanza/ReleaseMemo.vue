<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  videoa: Object,
  fanza_release_memos: Object,
  fanza_release_memo_count: Number
})
</script>

<template>
  <div class="flex flex-col-reverse justify-center mx-auto">
    <div v-for="fanza_release_memo in fanza_release_memos" :key="fanza_release_memo.id">
      <div v-if="fanza_release_memo.release" class="border-dotted border-b border-gray-500 mx-5">
        <div class="flex mb-3 items-center">
          <div>
            <span v-if="fanza_release_memo.user_id && fanza_release_memo.nickname === 1" class="text-sm font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 mb-1 text-blue-400 inline-block">
                <path fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                  clip-rule="evenodd" />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
              </svg>
              {{ fanza_release_memo.name }}
            </span>
            <span v-else-if="fanza_release_memo.user_id && fanza_release_memo.nickname === 0" class="text-sm font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 mb-1 text-green-500 inline-block">
                <path fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                  clip-rule="evenodd" />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
              </svg>
              ログインユーザー
            </span>
            <span v-else class="text-sm font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-4 h-4 mb-1 text-gray-400 inline-block">
                <path fill-rule="evenodd"
                  d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                  clip-rule="evenodd" />
                <path
                  d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
              </svg>
              退会済みユーザー
            </span>
            <span class="w-44 mt-2 ml-4 text-sm text-zinc-500 inline-block">
              {{ fanza_release_memo.updated_at }}
            </span>
          </div>
        </div>
        <div class="w-full whitespace-pre-line break-all">
          <p v-if="fanza_release_memo.f_position === 'top' && fanza_release_memo.f_link" class="mb-2 font-mono">>> No.
            <Link
              :href="route('fmemo.memoListSort', { sort: 'oldest', content_id: fanza_release_memo.f_link }) + '#f-' + fanza_release_memo.f_no"
              class="text-blue-500 hover:text-red-500 hover:underline">
            F-{{ fanza_release_memo.f_no }}
            </Link>
          </p>
          <p v-if="fanza_release_memo.d_position === 'top' && fanza_release_memo.d_link" class="mb-3 font-mono">>> No.
            <Link
              :href="route('dmemo.memoListSort', { sort: 'oldest', productid: fanza_release_memo.d_link }) + '#d-' + fanza_release_memo.d_no"
              class="text-blue-500 hover:text-red-500 hover:underline">
            D-{{ fanza_release_memo.d_no }}
            </Link>
          </p>
          {{ fanza_release_memo.release }}
          <p v-if="fanza_release_memo.f_position === 'bottom' && fanza_release_memo.f_link" class="mt-3 font-mono">>> No.
            <Link
              :href="route('fmemo.memoListSort', { sort: 'oldest', content_id: fanza_release_memo.f_link }) + '#f-' + fanza_release_memo.f_no"
              class="text-blue-500 hover:text-red-500 hover:underline">
            F-{{ fanza_release_memo.f_no }}
            </Link>
          </p>
          <p v-if="fanza_release_memo.d_position === 'bottom' && fanza_release_memo.d_link" class="mt-2 font-mono">>> No.
            <Link
              :href="route('dmemo.memoListSort', { sort: 'oldest', productid: fanza_release_memo.d_link }) + '#d-' + fanza_release_memo.d_no"
              class="text-blue-500 hover:text-red-500 hover:underline">D-{{ fanza_release_memo.d_no }}
            </Link>
          </p>
          <p class="flex text-xs text-gray-500 font-mono justify-end">
            No.F-{{ fanza_release_memo.id }}
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- メモをはじめから全部見る -->
  <div v-if="props.fanza_release_memo_count !== 0"
    class="flex py-6 justify-center border-dotted border-b border-gray-500">
    <Link :href="route('fmemo.memoListSort', { content_id: props.videoa.content_id, sort: 'oldest' })"
      class="w-64 p-1.5 font-mono text-center bg-gray-300 rounded-3xl hover:bg-blue-200 shadow-md">メモをはじめから全部見る</Link>
  </div>
  <div v-else class="m-5 text-center font-bold text-gray-600">
    <p class="w-52 my-12 mx-auto pl-2 border-b-2 border-blue-200">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
        class="w-4 h-4 mb-1 text-blue-400 inline-block">
        <path fill-rule="evenodd"
          d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
          clip-rule="evenodd" />
        <path
          d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
      </svg>
      メモはまだありません。
    </p>
  </div>
</template>