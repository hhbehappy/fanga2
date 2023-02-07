<script setup>
import Layout from '@/Layouts/Layout.vue';
import { router, Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  user: Object,
  fanzaprivatememolists: Object,
  fanzareleasememolists: Object,
  fanzafreememolists: Object,
  dugaprivatememolists: Object,
  dugareleasememolists: Object,
  dugafreememolists: Object,
  nicelists: Object,
  duganicelists: Object,
  assetsPath: Object
})

// const destroy = id => {
//     Inertia.delete(`/user/${id}/`, {
//     onBefore: () => confirm('本当に削除しますか？'),
//     preserveScroll: true,
//   })
// };
</script>

<script>
export default {
  name: "nice-tabs",
  data() {
    return {
      openTab: 1
    }
  },
  methods: {
    toggleTabs: function(tabNumber){
      this.openTab = tabNumber
    }
  },
}
</script>

<template>
<Layout>
  <Head :title="$page.props.auth.user.name + 'さんのマイページ'" />
  <button type="button" @click="destroy(props.user.id)" class="px-2 py-1 bg-red-600 text-white font-semibold text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out flex align-center absolute right-7 md:right-12">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto mr-1">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    削除
  </button>
  <div class="mx-auto mt-5 md:mt-0">
    <div class="border-b-4 border-gray-500 mb-6 mx-">
      <h1 class="font-bold text-2xl pl-6">{{ $page.props.auth.user.name }}さんのマイページ</h1>
    </div>
    <!-- タブ -->
    <div class="flex flex-wrap justify-center mb-6">
      <div class="w-full">
        <ul class="flex mb-0 list-none flex-nowrap mx-5 md:mx-1 pt-3 pb-2 flex-row cursor-pointer">
          <li class="-mb-px flex-auto text-center w-1/2">
            <a class="font-bold uppercase pr-2 py-3 shadow-md rounded block leading-normal" @click="toggleTabs(1)" :class="{'text-gray-600 bg-gray-200': openTab !== 1, 'text-white bg-red-500': openTab === 1}">
              FANZA
            </a>
          </li>
          <li class="-mb-px flex-auto text-center w-1/2 px-2">
            <a class="font-bold uppercase pr-2 py-3 shadow-md rounded block leading-normal" @click="toggleTabs(2)" :class="{'text-gray-600 bg-gray-200': openTab !== 2, 'text-white bg-red-500': openTab === 2}">
              DUGA
            </a>
          </li>
        </ul>
        <div class="relative flex flex-col min-w-0 break-words bg-white">
          <div class="py-5 flex-auto">
            <div class="tab-content tab-space">
              <!-- FANZA -->
              <div :class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                <div class="mx-4 mb-10">
                  <h2 class="font-bold bg-red-200 rounded-xl w-48 py-1 px-4 ml-1 mb-4">非公開メモをした動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8 w-full">
                    <div v-for="fanzaprivatememolist in fanzaprivatememolists" :key="fanzaprivatememolist.id" class="">
                      <div class="mr-4 mb-4">
                        <Link :href="route('fvideo.show', { id: fanzaprivatememolist.content_id })">
                          <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzaprivatememolist.content_id  + '/' + fanzaprivatememolist.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzaprivatememolist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                  <h2 class="font-bold bg-blue-200 rounded-xl w-44 py-1 px-4 ml-1 mb-4">公開メモをした動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8">
                    <div v-for="fanzareleasememolist in fanzareleasememolists" :key="fanzareleasememolist.id" class="">
                      <div class="mr-4 mb-4">
                        <Link :href="route('fvideo.show', { id: fanzareleasememolist.content_id })">
                          <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzareleasememolist.content_id  + '/' + fanzareleasememolist.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzareleasememolist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                  <h2 class="font-bold bg-amber-200 rounded-xl w-48 py-1 px-4 ml-1 mb-4">フリーメモをした動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8">
                    <div v-for="fanzafreememolist in fanzafreememolists" :key="fanzafreememolist.id" class="">
                      <div v-if="fanzafreememolist.content_id" class="mr-4 mb-4">
                        <Link :href="route('fvideo.show', { id: fanzafreememolist.content_id })">
                          <img :src="'https://pics.dmm.co.jp/digital/video/' + fanzafreememolist.content_id  + '/' + fanzafreememolist.content_id + 'ps.jpg'" :alt="'【FANZA】' + fanzafreememolist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                  <h2 class="font-bold w-32 px-4 py-1 ml-1 mb-4 bg-pink-300 rounded-xl">気になる動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8">
                    <div v-for="nicelist in nicelists" :key="nicelist.id" class="">
                      <div v-if="nicelist.type === 'fanza'" class="mr-4 mb-4">
                        <Link :href="route('fvideo.show', { id: nicelist.content_id })">
                          <img :src="'https://pics.dmm.co.jp/digital/video/' + nicelist.content_id  + '/' + nicelist.content_id + 'ps.jpg'" :alt="'【FANZA】' + nicelist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- DUGA -->
              <div :class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                <div class="mx-4 mb-10">
                  <h2 class="font-bold bg-red-200 rounded-xl w-48 py-1 px-4 ml-1 mb-4">非公開メモをした動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8 w-full">
                    <div v-for="dugaprivatememolist in dugaprivatememolists" :key="dugaprivatememolist.productid" class="">
                      <div class="mr-4 mb-4">
                        <Link :href="route('dvideo.show', { id: dugaprivatememolist.productid })">
                          <img v-if="dugaprivatememolist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + dugaprivatememolist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + dugaprivatememolist.title" class="h-44 w-32">
                          <img v-else :src="'https://pic.duga.jp/unsecure/' + dugaprivatememolist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + dugaprivatememolist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                  <h2 class="font-bold bg-blue-200 rounded-xl w-44 py-1 px-4 ml-1 mb-4">公開メモをした動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8">
                    <div v-for="dugareleasememolist in dugareleasememolists" :key="dugareleasememolist.id" class="">
                      <div class="mr-4 mb-4">
                        <Link :href="route('dvideo.show', { id: dugareleasememolist.productid })">
                          <img v-if="dugareleasememolist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + dugareleasememolist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + dugareleasememolist.title" class="h-44 w-32">
                          <img v-else :src="'https://pic.duga.jp/unsecure/' + dugareleasememolist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + dugareleasememolist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                  <h2 class="font-bold bg-amber-200 rounded-xl w-48 py-1 px-4 ml-1 mb-4">フリーメモをした動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8">
                    <div v-for="dugafreememolist in dugafreememolists" :key="dugafreememolist.id" class="">
                      <div class="mr-4 mb-4">
                        <Link :href="route('dvideo.show', { id: dugafreememolist.productid })">
                          <img v-if="dugafreememolist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + dugafreememolist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + dugafreememolist.title" class="h-44 w-32">
                          <img v-else :src="'https://pic.duga.jp/unsecure/' + dugafreememolist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + dugafreememolist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                  <h2 class="font-bold w-32 px-4 py-1 ml-1 mb-4 bg-pink-300 rounded-xl">気になる動画</h2>
                  <div class="flex flex-wrap mx-2 mb-8">
                    <div v-for="duganicelist in duganicelists" :key="duganicelist.productid" class="">
                      <div v-if="duganicelist.type === 'duga'" class="mr-4 mb-4">
                        <Link :href="route('dvideo.show', { id: duganicelist.productid })">
                          <img v-if="duganicelist.jacketimage" :src="'https://pic.duga.jp/unsecure/' + duganicelist.re_productid + '/noauth/jacket_240.jpg'" :alt="'【DUGA】' + duganicelist.title" class="h-44 w-32">
                          <img v-else :src="'https://pic.duga.jp/unsecure/' + duganicelist.re_productid + '/noauth/180x180.jpg'" :alt="'【DUGA】' + duganicelist.title" class="h-44 w-32">
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</Layout>
</template>