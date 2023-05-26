<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['keyword', 'line']);
</script>

<template>
  <!-- line -->
  <div class="flex flex-wrap mb-3 font-mono text-gray-800 justify-center md:justify-start items-center">
    <div class="flex w-80 h-11 p-1 justify-between items-center">
      <div v-if="line === 'a'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">あ行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'a', keyword: 'a' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">あ行</Link>
      </div>
      <div v-if="line === 'ka'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">か行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ka', keyword: 'ka' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">か行</Link>
      </div>
      <div v-if="line === 'sa'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">さ行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'sa', keyword: 'sa' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">さ行</Link>
      </div>
      <div v-if="line === 'ta'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">た行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ta', keyword: 'ta' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">た行</Link>
      </div>
      <div v-if="line === 'na'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">な行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'na', keyword: 'na' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">な行</Link>
      </div>
    </div>
    <div class="flex w-80 h-11 p-1 justify-between items-center">
      <div v-if="line === 'ha'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">は行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ha', keyword: 'ha' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">は行</Link>
      </div>
      <div v-if="line === 'ma'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ま行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ma', keyword: 'ma' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ま行</Link>
      </div>
      <div v-if="line === 'ya'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">や行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ya', keyword: 'ya' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">や行</Link>
      </div>
      <div v-if="line === 'ra'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ら行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ra', keyword: 'ra' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ら行</Link>
      </div>
      <div v-if="line === 'wa'">
        <div class="w-18 py-1 px-2.5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">わ行</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'wa', keyword: 'wa' })" class="w-18 py-1.5 px-2.5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">わ行</Link>
      </div>
    </div>
  </div>
  <!-- keyword -->
  <div class="flex mb-7 font-mono text-gray-800 justify-center md:justify-start">
    <div v-if="line === 'a'" class="flex w-80 h-11 p-1 justify-between items-center">
      <div v-if="keyword === 'あ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">あ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'a', keyword: 'a' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">あ</Link>
      </div>
      <div v-if="keyword === 'い'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">い</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'a', keyword: 'i' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">い</Link>
      </div>
      <div v-if="keyword === 'う'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">う</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'a', keyword: 'u' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">う</Link>
      </div>
      <div v-if="keyword === 'え'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">え</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'a', keyword: 'e' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">え</Link>
      </div>
      <div v-if="keyword === 'お'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">お</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'a', keyword: 'o' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">お</Link>
      </div>
    </div>
    <div v-else-if="line === 'ka'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'か'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">か</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ka', keyword: 'ka' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">か</Link>
      </div>
      <div v-if="keyword === 'き'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">き</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ka', keyword: 'ki' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">き</Link>
      </div>
      <div v-if="keyword === 'く'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">く</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ka', keyword: 'ku' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">く</Link>
      </div>
      <div v-if="keyword === 'け'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">け</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ka', keyword: 'ke' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">け</Link>
      </div>
      <div v-if="keyword === 'こ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">こ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ka', keyword: 'ko' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">こ</Link>
      </div>
    </div>
    <div v-else-if="line === 'sa'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'さ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">さ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'sa', keyword: 'sa' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">さ</Link>
      </div>
      <div v-if="keyword === 'し'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">し</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'sa', keyword: 'si' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">し</Link>
      </div>
      <div v-if="keyword === 'す'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">す</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'sa', keyword: 'su' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">す</Link>
      </div>
      <div v-if="keyword === 'せ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">せ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'sa', keyword: 'se' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">せ</Link>
      </div>
      <div v-if="keyword === 'そ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">そ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'sa', keyword: 'so' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">そ</Link>
      </div>
    </div>
    <div v-else-if="line === 'ta'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'た'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">た</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ta', keyword: 'ta' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">た</Link>
      </div>
      <div v-if="keyword === 'ち'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ち</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ta', keyword: 'ti' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ち</Link>
      </div>
      <div v-if="keyword === 'つ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">つ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ta', keyword: 'tu' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">つ</Link>
      </div>
      <div v-if="keyword === 'て'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">て</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ta', keyword: 'te' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">て</Link>
      </div>
      <div v-if="keyword === 'と'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">と</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ta', keyword: 'to' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">と</Link>
      </div>
    </div>
    <div v-else-if="line === 'na'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'な'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">な</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'na', keyword: 'na' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">な</Link>
      </div>
      <div v-if="keyword === 'に'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">に</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'na', keyword: 'ni' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">に</Link>
      </div>
      <div v-if="keyword === 'ぬ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ぬ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'na', keyword: 'nu' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ぬ</Link>
      </div>
      <div v-if="keyword === 'ね'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ね</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'na', keyword: 'ne' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ね</Link>
      </div>
      <div v-if="keyword === 'の'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">の</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'na', keyword: 'no' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">の</Link>
      </div>
    </div>
    <div v-else-if="line === 'ha'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'は'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">は</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ha', keyword: 'ha' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">は</Link>
      </div>
      <div v-if="keyword === 'ひ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ひ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ha', keyword: 'hi' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ひ</Link>
      </div>
      <div v-if="keyword === 'ふ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ふ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ha', keyword: 'hu' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ふ</Link>
      </div>
      <div v-if="keyword === 'へ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">へ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ha', keyword: 'he' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">へ</Link>
      </div>
      <div v-if="keyword === 'ほ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ほ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ha', keyword: 'ho' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ほ</Link>
      </div>
    </div>
    <div v-else-if="line === 'ma'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'ま'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ま</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ma', keyword: 'ma' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ま</Link>
      </div>
      <div v-if="keyword === 'み'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">み</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ma', keyword: 'mi' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">み</Link>
      </div>
      <div v-if="keyword === 'む'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">む</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ma', keyword: 'mu' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">む</Link>
      </div>
      <div v-if="keyword === 'め'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">め</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ma', keyword: 'me' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">め</Link>
      </div>
      <div v-if="keyword === 'も'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">も</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ma', keyword: 'mo' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">も</Link>
      </div>
    </div>
    <div v-else-if="line === 'ya'" class="flex w-52 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'や'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">や</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ya', keyword: 'ya' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">や</Link>
      </div>
      <div v-if="keyword === 'ゆ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ゆ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ya', keyword: 'yu' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ゆ</Link>
      </div>
      <div v-if="keyword === 'よ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">よ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ya', keyword: 'yo' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">よ</Link>
      </div>
    </div>
    <div v-else-if="line === 'ra'" class="flex w-80 h-11 p-1 mb-2 justify-between items-center">
      <div v-if="keyword === 'ら'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ら</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ra', keyword: 'ra' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ら</Link>
      </div>
      <div v-if="keyword === 'り'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">り</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ra', keyword: 'ri' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">り</Link>
      </div>
      <div v-if="keyword === 'る'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">る</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ra', keyword: 'ru' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">る</Link>
      </div>
      <div v-if="keyword === 'れ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">れ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ra', keyword: 're' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">れ</Link>
      </div>
      <div v-if="keyword === 'ろ'">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">ろ</div>
      </div>
      <div v-else>
        <Link :href="route('flist.actress_name', { line: 'ra', keyword: 'ro' })" class="w-14 py-1.5 px-5 border-2 border-gray-400 bg-gray-200 rounded-sm hover:bg-red-500 hover:text-white">ろ</Link>
      </div>
    </div>
    <div v-else class="flex w-80 h-11 p-1 mb-2 justify-start items-center">
        <div class="w-14 py-1 px-5 border-2 border-gray-400 rounded-sm bg-red-500 text-white">わ</div>
      </div>
  </div>
</template>