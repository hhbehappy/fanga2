<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  lists: Object,
  display: String,
  sort: String,
  group: String,
  type: String,
  hits: String,
  memoType: String,
  color: String
})
</script>

<script>
export default {
  name: "option-tabs",
  data() {
    return {
      openTab: 2
    }
  },
  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber
    }
  }
}
</script>

<template>
  <!-- オプションを開く -->
  <div class="flex flex-col h-full mb-6 border-b-2 border-gray-500 justify-start">
    <ul class="flex list-none flex-col text-sm cursor-pointer">
      <li class="mb-2">
        <div class="flex flex-wrap">
          <p class="mr-1 mb-1 font-mono">現在の表示：</p>
          <div>
            <span v-if="sort === 'latest' && memoType !== 'duga_nice'" class="mr-1">メモの新しい順</span>
            <span v-if="sort === 'latest' && memoType === 'duga_nice'" class="mr-1">登録日の新しい順</span>
            <span v-if="sort === 'oldest' && memoType !== 'duga_nice'" class="mr-1">メモの古い順</span>
            <span v-if="sort === 'oldest' && memoType === 'duga_nice'" class="mr-1">登録日の古い順</span>
            /
            <span v-if="display === 'video' && type === 'top'" class="mx-1">トップ</span>
            <span v-if="display === 'video' && type === 'image'" class="mx-1">イメージ</span>
            <span v-if="display === 'video' && type === 'title'" class="mx-1">タイトル</span>
            <span v-if="display === 'memo' && !group" class="mx-1">すべて表示</span>
            <span v-if="display === 'memo' && group" class="mx-1">まとめて表示</span>
            /
            <span v-if="hits === '20'" class="ml-1">20件</span>
            <span v-if="hits === '50'" class="ml-1">50件</span>
            <span v-if="hits === '100'" class="ml-1">100件</span>
          </div>
        </div>
      </li>
      <li class="text-center">
        <button class="w-36 font-mono py-0.5 shadow-md rounded block leading-normal" @click="toggleTabs(1)"
          :class="{ 'text-gray-600 bg-gray-200': openTab !== 1, 'hidden': openTab === 1 }, color">
          オプションを開く
        </button>
      </li>
      <li class="text-center mb-6">
        <button class="w-36 font-mono py-0.5 shadow-md rounded block leading-normal" @click="toggleTabs(2)"
          :class="{ 'text-gray-600 bg-gray-200': openTab !== 2, 'hidden': openTab === 2 }, color">
          閉じる
        </button>
      </li>
    </ul>
    <div class="tab-content tab-space">
      <div :class="{ 'hidden': openTab !== 1, 'block': openTab === 1 }">
        <ul class="flex flex-wrap">
          <li class="w-96 mb-3">
            <span class="font-bold">並び順</span>
            <span v-if="sort === 'latest' && memoType !== 'duga_nice'" class="mx-2">メモの新しい順</span>
            <span v-else-if="sort === 'latest' && memoType === 'duga_nice'" class="mx-2">登録日の新しい順</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: lists.current_page, display: display, sort: 'latest', type: type, group: group, hits: hits })"
              class="mx-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>
            <span v-if="memoType === 'duga_nice'">登録日の新しい順</span>
            <span v-else>メモの新しい順</span></Link>
            /
            <span v-if="sort === 'oldest' && memoType !== 'duga_nice'" class="ml-2">メモの古い順</span>
            <span v-else-if="sort === 'oldest' && memoType === 'duga_nice'" class="ml-2">登録日の古い順</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: lists.current_page, display: display, sort: 'oldest', type: type, group: group, hits: hits })"
              class="ml-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>
            <span v-if="memoType === 'duga_nice'">登録日の古い順</span>
            <span v-else>メモの古い順</span></Link>
          </li>
          <li v-if="display === 'video'" class="w-96 mb-3">
            <span class="font-bold">表示形式</span>
            <span v-if="type === 'top'" class="mx-2">トップ</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: lists.current_page, display: 'video', sort: sort, type: 'top', hits: hits })"
              class="mx-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>トップ</Link>
            /
            <span v-if="type === 'image'" class="mx-2">イメージ</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: lists.current_page, display: 'video', sort: sort, type: 'image', hits: hits })"
              class="mx-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>イメージ</Link>
            /
            <span v-if="type === 'title'" class="ml-2">タイトル</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: lists.current_page, display: 'video', sort: sort, type: 'title', hits: hits })"
              class="ml-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>タイトル</Link>
          </li>
          <li v-if="display === 'memo' && group" class="w-96 mb-3">
            <span class="font-bold">表示形式</span>
            <Link
              :href="route('mypage.' + memoType, { page: lists.current_page, display: 'memo', sort: sort, hits: hits })"
              class="mx-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>すべて表示</Link>
            /
            <span class="ml-2">まとめて表示</span>
          </li>
          <li class="w-56 mb-3">
            <span class="font-bold">表示件数</span>
            <span v-if="hits === '20'" class="mx-2">20</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: 1, display: display, sort: sort, type: type, group: group, hits: '20' })"
              class="mx-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>20</Link>
            /
            <span v-if="hits === '50' || lists.total < 21" class="mx-2">50</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: 1, display: display, sort: sort, type: type, group: group, hits: '50' })"
              class="mx-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>50</Link>
            /
            <span v-if="hits === '100' || lists.total < 51" class="ml-2">100</span>
            <Link v-else
              :href="route('mypage.' + memoType, { page: 1, display: display, sort: sort, type: type, group: group, hits: '100' })"
              class="ml-2 text-blue-500 hover:text-red-500 hover:underline" preserve-scroll>100</Link>
          </li>
        </ul>
      </div>
      <div :class="{ 'hidden': openTab !== 2, 'hidden': openTab === 2 }">
      </div>
    </div>
  </div>
  <p v-if="display === 'memo' && group" class="-mt-4 mb-2 text-sm text-red-600">画像を選択するとまとめて表示を解除できます。</p>
  <p v-if="display === 'memo' && !group" class="-mt-4 mb-2 text-sm text-red-600">画像を選択するとまとめて表示できます。</p>
</template>