<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const list1 = ref(null)
function scrollTolist1() {
  list1.value.scrollIntoView({ behavior: 'smooth' })
}
const list2 = ref(null)
function scrollTolist2() {
  list2.value.scrollIntoView({ behavior: 'smooth' })
}
const list3 = ref(null)
function scrollTolist3() {
  list3.value.scrollIntoView({ behavior: 'smooth' })
}
const list4 = ref(null)
function scrollTolist4() {
  list4.value.scrollIntoView({ behavior: 'smooth' })
}
const list5 = ref(null)
function scrollTolist5() {
  list5.value.scrollIntoView({ behavior: 'smooth' })
}
const list6 = ref(null)
function scrollTolist6() {
  list6.value.scrollIntoView({ behavior: 'smooth' })
}
</script>

<template>
  <Layout>
    <Head :title="'【FANZA】ジャンル一覧'" />

    <div class="border-b-4 border-gray-500 mb-2">
      <h1 class="font-bold text-2xl ml-4"><span class="text-red-500">【FANZA】</span>ジャンル一覧</h1>
    </div>
    <div class="ml-5">
      <button @click="scrollTolist1" class="h-10 text-blue-500 font-bold pl-5 pr-4 bg-gray-200">シチュエーション</button>
      <button @click="scrollTolist2" class="h-10 text-blue-500 font-bold px-4 bg-gray-200">タイプ</button>
      <button @click="scrollTolist3" class="h-10 text-blue-500 font-bold px-4 bg-gray-200">コスチューム</button>
      <button @click="scrollTolist4" class="h-10 text-blue-500 font-bold px-4 bg-gray-200">ジャンル</button>
      <button @click="scrollTolist5" class="h-10 text-blue-500 font-bold px-4 bg-gray-200">プレイ</button>
      <button @click="scrollTolist6" class="h-10 text-blue-500 font-bold pl-4 pr-5 bg-gray-200">その他</button>
    </div>
    <!-- シチュエーション -->
    <div class="m-5">
      <h2 ref="list1" class="font-bold text-xl my-6 w-40 border-b-2 border-red-500">シチュエーション</h2>
        <a :href="route('flist.show', { keyword: 'アイドル・芸能人' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アイドル・芸能人</a>
        <a :href="route('flist.show', { keyword: 'アクメ・オーガズム' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アクメ・オーガズム</a>
        <a :href="route('flist.show', { keyword: 'アスリート' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アスリート</a>
        <a :href="route('flist.show', { keyword: '姉・妹' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">姉・妹</a>
        <a :href="route('flist.show', { keyword: 'イタズラ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">イタズラ</a>
        <a :href="route('flist.show', { keyword: 'インストラクター' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">インストラクター</a>
        <a :href="route('flist.show', { keyword: '受付嬢' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">受付嬢</a>
        <a :href="route('flist.show', { keyword: 'エステ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">エステ</a>
        <a :href="route('flist.show', { keyword: 'M男' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">M男</a>
        <a :href="route('flist.show', { keyword: 'M女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">M女</a>
        <a :href="route('flist.show', { keyword: 'OL' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">OL</a>
        <a :href="route('flist.show', { keyword: 'お母さん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お母さん</a>
        <a :href="route('flist.show', { keyword: '女将・女主人' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女将・女主人</a>
        <a :href="route('flist.show', { keyword: '幼なじみ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">幼なじみ</a>
        <a :href="route('flist.show', { keyword: 'お爺ちゃん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お爺ちゃん</a>
        <a :href="route('flist.show', { keyword: 'お嬢様・令嬢' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お嬢様・令嬢</a>
        <a :href="route('flist.show', { keyword: 'オタク' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">オタク</a>
        <a :href="route('flist.show', { keyword: 'オナサポ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">オナサポ</a>
        <a :href="route('flist.show', { keyword: 'お姉さん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お姉さん</a>
        <a :href="route('flist.show', { keyword: 'お婆ちゃん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お婆ちゃん</a>
        <a :href="route('flist.show', { keyword: '叔母さん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">叔母さん</a>
        <a :href="route('flist.show', { keyword: 'お姫様' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お姫様</a>
        <a :href="route('flist.show', { keyword: 'お風呂' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">お風呂</a>
        <a :href="route('flist.show', { keyword: '温泉' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">温泉</a>
        <a :href="route('flist.show', { keyword: '女教師' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女教師</a>
        <a :href="route('flist.show', { keyword: '女上司' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女上司</a>
        <a :href="route('flist.show', { keyword: '女戦士' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女戦士</a>
        <a :href="route('flist.show', { keyword: '女捜査官' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女捜査官</a>
        <a :href="route('flist.show', { keyword: 'カーセックス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">カーセックス</a>
        <a :href="route('flist.show', { keyword: '格闘家' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">格闘家</a>
        <a :href="route('flist.show', { keyword: 'カップル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">カップル</a>
        <a :href="route('flist.show', { keyword: '家庭教師' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">家庭教師</a>
        <a :href="route('flist.show', { keyword: '看護婦・ナース' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">看護婦・ナース</a>
        <a :href="route('flist.show', { keyword: 'キャバ嬢・風俗嬢' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">キャバ嬢・風俗嬢</a>
        <a :href="route('flist.show', { keyword: 'キャンギャル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">キャンギャル</a>
        <a :href="route('flist.show', { keyword: '近親相姦' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">近親相姦</a>
        <a :href="route('flist.show', { keyword: '義母' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">義母</a>
        <a :href="route('flist.show', { keyword: '逆ナン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">逆ナン</a>
        <a :href="route('flist.show', { keyword: 'ギャル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ギャル</a>
        <a :href="route('flist.show', { keyword: 'くノ一' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">くノ一</a>
        <a :href="route('flist.show', { keyword: 'コンパニオン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">コンパニオン</a>
        <a :href="route('flist.show', { keyword: '極道・任侠' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">極道・任侠</a>
        <a :href="route('flist.show', { keyword: '主観' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">主観</a>
        <a :href="route('flist.show', { keyword: '職業色々' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">職業色々</a>
        <a :href="route('flist.show', { keyword: 'ショタ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ショタ</a>
        <a :href="route('flist.show', { keyword: '白目・失神' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">白目・失神</a>
        <a :href="route('flist.show', { keyword: '時間停止' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">時間停止</a>
        <a :href="route('flist.show', { keyword: '熟女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">熟女</a>
        <a :href="route('flist.show', { keyword: '女医' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女医</a>
        <a :href="route('flist.show', { keyword: '女子アナ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女子アナ</a>
        <a :href="route('flist.show', { keyword: '女子校生' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女子校生</a>
        <a :href="route('flist.show', { keyword: '女子大生' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女子大生</a>
        <a :href="route('flist.show', { keyword: 'スチュワーデス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スチュワーデス</a>
        <a :href="route('flist.show', { keyword: '性転換・女体化' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">性転換・女体化</a>
        <a :href="route('flist.show', { keyword: 'セレブ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">セレブ</a>
        <a :href="route('flist.show', { keyword: 'チアガール' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">チアガール</a>
        <a :href="route('flist.show', { keyword: '痴女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">痴女</a>
        <a :href="route('flist.show', { keyword: 'ツンデレ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ツンデレ</a>
        <a :href="route('flist.show', { keyword: 'デート' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">デート</a>
        <a :href="route('flist.show', { keyword: '盗撮・のぞき' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">盗撮・のぞき</a>
        <a :href="route('flist.show', { keyword: 'ノーパン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ノーパン</a>
        <a :href="route('flist.show', { keyword: 'ノーブラ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ノーブラ</a>
        <a :href="route('flist.show', { keyword: '飲み会・合コン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">飲み会・合コン</a>
        <a :href="route('flist.show', { keyword: 'ハーレム' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ハーレム</a>
        <a :href="route('flist.show', { keyword: '花嫁' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">花嫁</a>
        <a :href="route('flist.show', { keyword: 'バスガイド' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">バスガイド</a>
        <a :href="route('flist.show', { keyword: '秘書' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">秘書</a>
        <a :href="route('flist.show', { keyword: 'ビッチ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ビッチ</a>
        <a :href="route('flist.show', { keyword: '病院・クリニック' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">病院・クリニック</a>
        <a :href="route('flist.show', { keyword: 'ファン感謝・訪問' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ファン感謝・訪問</a>
        <a :href="route('flist.show', { keyword: '不倫' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">不倫</a>
        <a :href="route('flist.show', { keyword: '部活・マネージャー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">部活・マネージャー</a>
        <a :href="route('flist.show', { keyword: '部下・同僚' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">部下・同僚</a>
        <a :href="route('flist.show', { keyword: 'ヘルス・ソープ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ヘルス・ソープ</a>
        <a :href="route('flist.show', { keyword: '変身ヒロイン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">変身ヒロイン</a>
        <a :href="route('flist.show', { keyword: 'ホテル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ホテル</a>
        <a :href="route('flist.show', { keyword: 'マッサージ・リフレ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">マッサージ・リフレ</a>
        <a :href="route('flist.show', { keyword: '魔法少女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">魔法少女</a>
        <a :href="route('flist.show', { keyword: 'ママ友' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ママ友</a>
        <a :href="route('flist.show', { keyword: '未亡人' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">未亡人</a>
        <a :href="route('flist.show', { keyword: '胸チラ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">胸チラ</a>
        <a :href="route('flist.show', { keyword: 'メイド' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">メイド</a>
        <a :href="route('flist.show', { keyword: '面接' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">面接</a>
        <a :href="route('flist.show', { keyword: 'モデル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">モデル</a>
        <a :href="route('flist.show', { keyword: '野外・露出' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">野外・露出</a>
        <a :href="route('flist.show', { keyword: 'ヨガ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ヨガ</a>
        <a :href="route('flist.show', { keyword: '乱交' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">乱交</a>
        <a :href="route('flist.show', { keyword: '旅行' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">旅行</a>
        <a :href="route('flist.show', { keyword: 'レースクィーン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">レースクィーン</a>
        <a :href="route('flist.show', { keyword: '若妻・幼妻' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">若妻・幼妻</a>
        <a :href="route('flist.show', { keyword: 'スワッピング・夫婦交換' })" class="w-1/2 md:w-48 py-1.5 border-2 text-sm text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スワッピング・夫婦交換</a>
        <a :href="route('flist.show', { keyword: '寝取り・寝取られ・NTR' })" class="w-1/2 md:w-48 py-1.5 border-2 text-sm text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">寝取り・寝取られ・NTR</a>
    </div>
    <!-- タイプ -->
    <div class="m-5">
      <h2 ref="list2" class="font-bold text-xl my-6 w-16 border-b-2 border-red-500">タイプ</h2>
        <a :href="route('flist.show', { keyword: 'アジア女優' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アジア女優</a>
        <a :href="route('flist.show', { keyword: '巨尻' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">巨尻</a>
        <a :href="route('flist.show', { keyword: '巨乳' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">巨乳</a>
        <a :href="route('flist.show', { keyword: '筋肉' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">筋肉</a>
        <a :href="route('flist.show', { keyword: '小柄' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">小柄</a>
        <a :href="route('flist.show', { keyword: '黒人男優' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">黒人男優</a>
        <a :href="route('flist.show', { keyword: '処女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">処女</a>
        <a :href="route('flist.show', { keyword: '女装・男の娘' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女装・男の娘</a>
        <a :href="route('flist.show', { keyword: 'スレンダー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スレンダー</a>
        <a :href="route('flist.show', { keyword: '早漏' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">早漏</a>
        <a :href="route('flist.show', { keyword: 'そっくりさん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">そっくりさん</a>
        <a :href="route('flist.show', { keyword: '長身' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">長身</a>
        <a :href="route('flist.show', { keyword: '超乳' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">超乳</a>
        <a :href="route('flist.show', { keyword: 'デカチン・巨根' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">デカチン・巨根</a>
        <a :href="route('flist.show', { keyword: '童貞' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">童貞</a>
        <a :href="route('flist.show', { keyword: '軟体' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">軟体</a>
        <a :href="route('flist.show', { keyword: 'ニューハーフ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ニューハーフ</a>
        <a :href="route('flist.show', { keyword: '妊婦' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">妊婦</a>
        <a :href="route('flist.show', { keyword: '白人女優' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">白人女優</a>
        <a :href="route('flist.show', { keyword: 'パイパン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">パイパン</a>
        <a :href="route('flist.show', { keyword: '日焼け' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">日焼け</a>
        <a :href="route('flist.show', { keyword: '貧乳・微乳' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">貧乳・微乳</a>
        <a :href="route('flist.show', { keyword: '美少女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">美少女</a>
        <a :href="route('flist.show', { keyword: '美乳' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">美乳</a>
        <a :href="route('flist.show', { keyword: 'ふたなり' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ふたなり</a>
        <a :href="route('flist.show', { keyword: 'ぽっちゃり' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ぽっちゃり</a>
        <a :href="route('flist.show', { keyword: 'ミニ系' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ミニ系</a>
    </div>
    <!-- コスチューム -->
    <div class="m-5">
      <h2 ref="list3" class="font-bold text-xl my-6 w-32 border-b-2 border-red-500">コスチューム</h2>
        <a :href="route('flist.show', { keyword: '学生服' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">学生服</a>
        <a :href="route('flist.show', { keyword: '競泳・スクール水着' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">競泳・スクール水着</a>
        <a :href="route('flist.show', { keyword: 'コスプレ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">コスプレ</a>
        <a :href="route('flist.show', { keyword: 'セーラー服' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">セーラー服</a>
        <a :href="route('flist.show', { keyword: '制服' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">制服</a>
        <a :href="route('flist.show', { keyword: '体操着・ブルマ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">体操着・ブルマ</a>
        <a :href="route('flist.show', { keyword: 'チャイナドレス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">チャイナドレス</a>
        <a :href="route('flist.show', { keyword: 'ニーソックス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ニーソックス</a>
        <a :href="route('flist.show', { keyword: 'ネコミミ・獣系' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ネコミミ・獣系</a>
        <a :href="route('flist.show', { keyword: '裸エプロン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">裸エプロン</a>
        <a :href="route('flist.show', { keyword: 'バニーガール' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">バニーガール</a>
        <a :href="route('flist.show', { keyword: 'パンスト・タイツ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">パンスト・タイツ</a>
        <a :href="route('flist.show', { keyword: 'ビジネススーツ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ビジネススーツ</a>
        <a :href="route('flist.show', { keyword: '覆面・マスク' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">覆面・マスク</a>
        <a :href="route('flist.show', { keyword: 'ボディコン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ボディコン</a>
        <a :href="route('flist.show', { keyword: 'ボンテージ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ボンテージ</a>
        <a :href="route('flist.show', { keyword: '巫女' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">巫女</a>
        <a :href="route('flist.show', { keyword: '水着' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">水着</a>
        <a :href="route('flist.show', { keyword: 'ミニスカ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ミニスカ</a>
        <a :href="route('flist.show', { keyword: 'ミニスカポリス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ミニスカポリス</a>
        <a :href="route('flist.show', { keyword: 'めがね' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">めがね</a>
        <a :href="route('flist.show', { keyword: 'ランジェリー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ランジェリー</a>
        <a :href="route('flist.show', { keyword: 'ルーズソックス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ルーズソックス</a>
        <a :href="route('flist.show', { keyword: 'レオタード' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">レオタード</a>
        <a :href="route('flist.show', { keyword: '和服・浴衣' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">和服・浴衣</a>
    </div>
    <!-- ジャンル -->
    <div class="m-5">
      <h2 ref="list4" class="font-bold text-xl my-6 w-20 border-b-2 border-red-500">ジャンル</h2>
        <a :href="route('flist.show', { keyword: 'アクション・格闘' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アクション・格闘</a>
        <a :href="route('flist.show', { keyword: '脚フェチ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">脚フェチ</a>
        <a :href="route('flist.show', { keyword: 'アニメ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アニメ</a>
        <a :href="route('flist.show', { keyword: '淫乱・ハード系' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">淫乱・ハード系</a>
        <a :href="route('flist.show', { keyword: 'SF' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">SF</a>
        <a :href="route('flist.show', { keyword: 'SM' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">SM</a>
        <a :href="route('flist.show', { keyword: '学園もの' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">学園もの</a>
        <a :href="route('flist.show', { keyword: '企画' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">企画</a>
        <a :href="route('flist.show', { keyword: '局部アップ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">局部アップ</a>
        <a :href="route('flist.show', { keyword: '巨乳フェチ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">巨乳フェチ</a>
        <a :href="route('flist.show', { keyword: 'ギャグ・コメディ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ギャグ・コメディ</a>
        <a :href="route('flist.show', { keyword: 'クラシック' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">クラシック</a>
        <a :href="route('flist.show', { keyword: 'ゲイ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ゲイ</a>
        <a :href="route('flist.show', { keyword: '原作コラボ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">原作コラボ</a>
        <a :href="route('flist.show', { keyword: 'コラボ作品' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">コラボ作品</a>
        <a :href="route('flist.show', { keyword: 'サイコ・スリラー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">サイコ・スリラー</a>
        <a :href="route('flist.show', { keyword: '残虐表現' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">残虐表現</a>
        <a :href="route('flist.show', { keyword: '尻フェチ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">尻フェチ</a>
        <a :href="route('flist.show', { keyword: '素人' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">素人</a>
        <a :href="route('flist.show', { keyword: '女性向け' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女性向け</a>
        <a :href="route('flist.show', { keyword: '女優ベスト・総集編' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">女優ベスト・総集編</a>
        <a :href="route('flist.show', { keyword: 'スポーツ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スポーツ</a>
        <a :href="route('flist.show', { keyword: 'セクシー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">セクシー</a>
        <a :href="route('flist.show', { keyword: 'その他フェチ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">その他フェチ</a>
        <a :href="route('flist.show', { keyword: '体験告白' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">体験告白</a>
        <a :href="route('flist.show', { keyword: '単体作品' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">単体作品</a>
        <a :href="route('flist.show', { keyword: 'ダーク系' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ダーク系</a>
        <a :href="route('flist.show', { keyword: 'ダンス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ダンス</a>
        <a :href="route('flist.show', { keyword: 'デビュー作品' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">デビュー作品</a>
        <a :href="route('flist.show', { keyword: '特撮' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">特撮</a>
        <a :href="route('flist.show', { keyword: 'ドキュメンタリー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ドキュメンタリー</a>
        <a :href="route('flist.show', { keyword: 'ドラマ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ドラマ</a>
        <a :href="route('flist.show', { keyword: 'ナンパ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ナンパ</a>
        <a :href="route('flist.show', { keyword: 'How To' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">How To</a>
        <a :href="route('flist.show', { keyword: 'パンチラ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">パンチラ</a>
        <a :href="route('flist.show', { keyword: 'ファンタジー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ファンタジー</a>
        <a :href="route('flist.show', { keyword: '復刻' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">復刻</a>
        <a :href="route('flist.show', { keyword: 'Vシネマ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">Vシネマ</a>
        <a :href="route('flist.show', { keyword: 'ベスト・総集編' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ベスト・総集編</a>
        <a :href="route('flist.show', { keyword: 'ホラー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ホラー</a>
        <a :href="route('flist.show', { keyword: 'BL（ボーイズラブ）' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">BL（ボーイズラブ）</a>
        <a :href="route('flist.show', { keyword: '妄想' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">妄想</a>
        <a :href="route('flist.show', { keyword: '洋ピン・海外輸入' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">洋ピン・海外輸入</a>
        <a :href="route('flist.show', { keyword: 'レズ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">レズ</a>
        <a :href="route('flist.show', { keyword: '恋愛' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">恋愛</a>
        <a :href="route('flist.show', { keyword: 'イメージビデオ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">イメージビデオ</a>
        <a :href="route('flist.show', { keyword: 'イメージビデオ（男性）' })" class="w-44 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">イメージビデオ(男性)</a>
    </div>
    <!-- プレイ -->
    <div class="m-5">
      <h2 ref="list5" class="font-bold text-xl my-6 w-16 border-b-2 border-red-500">プレイ</h2>
        <a :href="route('flist.show', { keyword: '足コキ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">足コキ</a>
        <a :href="route('flist.show', { keyword: '汗だく' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">汗だく</a>
        <a :href="route('flist.show', { keyword: 'アナル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アナル</a>
        <a :href="route('flist.show', { keyword: 'アナルセックス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">アナルセックス</a>
        <a :href="route('flist.show', { keyword: '異物挿入' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">異物挿入</a>
        <a :href="route('flist.show', { keyword: 'イラマチオ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">イラマチオ</a>
        <a :href="route('flist.show', { keyword: '淫語' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">淫語</a>
        <a :href="route('flist.show', { keyword: '飲尿' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">飲尿</a>
        <a :href="route('flist.show', { keyword: '男の潮吹き' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">男の潮吹き</a>
        <a :href="route('flist.show', { keyword: 'オナニー' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">オナニー</a>
        <a :href="route('flist.show', { keyword: 'おもちゃ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">おもちゃ</a>
        <a :href="route('flist.show', { keyword: '監禁' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">監禁</a>
        <a :href="route('flist.show', { keyword: '浣腸' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">浣腸</a>
        <a :href="route('flist.show', { keyword: '顔射' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">顔射</a>
        <a :href="route('flist.show', { keyword: '顔面騎乗' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">顔面騎乗</a>
        <a :href="route('flist.show', { keyword: '騎乗位' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">騎乗位</a>
        <a :href="route('flist.show', { keyword: 'キス・接吻' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">キス・接吻</a>
        <a :href="route('flist.show', { keyword: '鬼畜' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">鬼畜</a>
        <a :href="route('flist.show', { keyword: 'くすぐり' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">くすぐり</a>
        <a :href="route('flist.show', { keyword: 'クスコ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">クスコ</a>
        <a :href="route('flist.show', { keyword: 'クンニ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">クンニ</a>
        <a :href="route('flist.show', { keyword: 'ゲロ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ゲロ</a>
        <a :href="route('flist.show', { keyword: '拘束' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">拘束</a>
        <a :href="route('flist.show', { keyword: '拷問' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">拷問</a>
        <a :href="route('flist.show', { keyword: 'ごっくん' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ごっくん</a>
        <a :href="route('flist.show', { keyword: '潮吹き' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">潮吹き</a>
        <a :href="route('flist.show', { keyword: 'シックスナイン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">シックスナイン</a>
        <a :href="route('flist.show', { keyword: '縛り・緊縛' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">縛り・緊縛</a>
        <a :href="route('flist.show', { keyword: '羞恥' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">羞恥</a>
        <a :href="route('flist.show', { keyword: '触手' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">触手</a>
        <a :href="route('flist.show', { keyword: '食糞' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">食糞</a>
        <a :href="route('flist.show', { keyword: 'スカトロ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スカトロ</a>
        <a :href="route('flist.show', { keyword: 'スパンキング' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スパンキング</a>
        <a :href="route('flist.show', { keyword: '即ハメ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">即ハメ</a>
        <a :href="route('flist.show', { keyword: '脱糞' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">脱糞</a>
        <a :href="route('flist.show', { keyword: '手コキ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">手コキ</a>
        <a :href="route('flist.show', { keyword: 'ディルド' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ディルド</a>
        <a :href="route('flist.show', { keyword: '電マ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">電マ</a>
        <a :href="route('flist.show', { keyword: 'ドラッグ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ドラッグ</a>
        <a :href="route('flist.show', { keyword: '中出し' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">中出し</a>
        <a :href="route('flist.show', { keyword: '辱め' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">辱め</a>
        <a :href="route('flist.show', { keyword: '鼻フック' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">鼻フック</a>
        <a :href="route('flist.show', { keyword: 'ハメ撮り' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ハメ撮り</a>
        <a :href="route('flist.show', { keyword: '孕ませ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">孕ませ</a>
        <a :href="route('flist.show', { keyword: 'バイブ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">バイブ</a>
        <a :href="route('flist.show', { keyword: 'バック' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">バック</a>
        <a :href="route('flist.show', { keyword: '罵倒' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">罵倒</a>
        <a :href="route('flist.show', { keyword: 'パイズリ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">パイズリ</a>
        <a :href="route('flist.show', { keyword: 'フィスト' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">フィスト</a>
        <a :href="route('flist.show', { keyword: 'フェラ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">フェラ</a>
        <a :href="route('flist.show', { keyword: 'ぶっかけ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ぶっかけ</a>
        <a :href="route('flist.show', { keyword: '放置' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">放置</a>
        <a :href="route('flist.show', { keyword: '放尿・お漏らし' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">放尿・お漏らし</a>
        <a :href="route('flist.show', { keyword: '母乳' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">母乳</a>
        <a :href="route('flist.show', { keyword: 'ポルチオ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ポルチオ</a>
        <a :href="route('flist.show', { keyword: '指マン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">指マン</a>
        <a :href="route('flist.show', { keyword: 'ラブコメ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ラブコメ</a>
        <a :href="route('flist.show', { keyword: 'レズキス' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">レズキス</a>
        <a :href="route('flist.show', { keyword: 'ローション・オイル' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ローション・オイル</a>
        <a :href="route('flist.show', { keyword: 'ローター' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ローター</a>
        <a :href="route('flist.show', { keyword: '蝋燭' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">蝋燭</a>
        <a :href="route('flist.show', { keyword: '3P・4P' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">3P・4P</a>
    </div>
    <!-- その他 -->
    <div class="m-5">
      <h2 ref="list6" class="font-bold text-xl my-6 w-16 border-b-2 border-red-500">その他</h2>
        <a :href="route('flist.show', { keyword: 'インディーズ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">インディーズ</a>
        <a :href="route('flist.show', { keyword: 'ギリモザ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ギリモザ</a>
        <a :href="route('flist.show', { keyword: 'ゲーム実写版' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ゲーム実写版</a>
        <a :href="route('flist.show', { keyword: 'スマホ推奨縦動画' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">スマホ推奨縦動画</a>
        <a :href="route('flist.show', { keyword: 'セット商品' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">セット商品</a>
        <a :href="route('flist.show', { keyword: 'その他' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">その他</a>
        <a :href="route('flist.show', { keyword: 'デジモ' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">デジモ</a>
        <a :href="route('flist.show', { keyword: '投稿' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">投稿</a>
        <a :href="route('flist.show', { keyword: '独占配信' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">独占配信</a>
        <a :href="route('flist.show', { keyword: 'ハイビジョン' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">ハイビジョン</a>
        <a :href="route('flist.show', { keyword: 'パラダイスTV' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">パラダイスTV</a>
        <a :href="route('flist.show', { keyword: 'FANZA配信限定' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">FANZA配信限定</a>
        <a :href="route('flist.show', { keyword: '複数話' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">複数話</a>
        <a :href="route('flist.show', { keyword: '福袋' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">福袋</a>
        <a :href="route('flist.show', { keyword: '16時間以上作品' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">16時間以上作品</a>
        <a :href="route('flist.show', { keyword: '3D' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">3D</a>
        <a :href="route('flist.show', { keyword: '4時間以上作品' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">4時間以上作品</a>
        <a :href="route('flist.show', { keyword: '4K' })" class="w-1/2 md:w-40 py-1 border-2 text-blue-500 text-center inline-block hover:text-red-500 hover:bg-rose-50 hover:underline hover:underline-offset-4">4K</a>
    </div>
  </Layout>
</template>