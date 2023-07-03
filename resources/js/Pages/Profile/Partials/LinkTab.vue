<script setup>
import { Link } from '@inertiajs/vue3';

const path = location.pathname;
</script>

<template>
  <!-- Menu -->
  <ul class="flex list-none flex-nowrap mx-1 my-6 font-bold">
    <li class="-mb-px flex-auto text-center w-1/3">
      <div v-if="path.includes('fanza') === true"
        class="w-full py-2 shadow-md rounded block leading-normal text-white bg-red-500">
        FANZA
      </div>
      <Link v-else :href="route('mypage')"
        class="w-full py-2 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-white hover:bg-red-500"
        preserve-scroll>
      FANZA
      </Link>
    </li>
    <li class="-mb-px flex-auto text-center w-1/3 px-2">
      <div v-if="path.includes('duga') === true"
        class="w-full py-2 shadow-md rounded block leading-normal text-white bg-red-500">
        DUGA
      </div>
      <Link v-else :href="route('mypage.duga_release')"
        class="w-full py-2 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-white hover:bg-red-500"
        preserve-scroll>
      DUGA
      </Link>
    </li>
    <li class="-mb-px flex-auto text-center w-1/3">
      <div v-if="path.includes('account') === true"
        class="w-full py-2 shadow-md rounded block leading-normal text-white bg-red-500">
        アカウント
      </div>
      <Link v-else :href="route('mypage.account')"
        class="w-full py-2 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-white hover:bg-red-500"
        preserve-scroll>
      アカウント
      </Link>
    </li>
  </ul>
  <!-- Type Fanza -->
  <ul v-if="path.includes('fanza') === true" class="flex flex-wrap md:flex-nowrap font-bold">
    <li class="w-full md:w-1/2 mx-1 mb-2">
      <ul class="flex list-none flex-nowrap">
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('fanza/private') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-red-200">
            非公開メモ
          </div>
          <Link v-else :href="route('mypage.fanza_private')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-red-200"
            preserve-scroll>
          非公開メモ
          </Link>
        </li>
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('fanza/release') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-blue-200">
            メモ
          </div>
          <Link v-else :href="route('mypage')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-blue-200"
            preserve-scroll>
          メモ
          </Link>
        </li>
      </ul>
    </li>
    <li class="w-full md:w-1/2 mx-1 mb-2">
      <ul class="flex list-none flex-nowrap">
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('fanza/free') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-amber-200">
            フリーメモ
          </div>
          <Link v-else :href="route('mypage.fanza_free')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-amber-200"
            preserve-scroll>
          フリーメモ
          </Link>
        </li>
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('fanza/nice') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-pink-200">
            気になる動画
          </div>
          <Link v-else :href="route('mypage.fanza_nice')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-pink-200"
            preserve-scroll>
          気になる動画
          </Link>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Type Duga -->
  <ul v-if="path.includes('duga') === true" class="flex flex-wrap md:flex-nowrap font-bold">
    <li class="w-full md:w-1/2 mx-1 mb-2">
      <ul class="flex list-none flex-nowrap">
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('duga/private') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-red-200">
            非公開メモ
          </div>
          <Link v-else :href="route('mypage.duga_private')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-red-200"
            preserve-scroll>
          非公開メモ
          </Link>
        </li>
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('duga/release') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-blue-200">
            メモ
          </div>
          <Link v-else :href="route('mypage.duga_release')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-blue-200"
            preserve-scroll>
          メモ
          </Link>
        </li>
      </ul>
    </li>
    <li class="w-full md:w-1/2 mx-1 mb-2">
      <ul class="flex list-none flex-nowrap">
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('duga/free') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-amber-200">
            フリーメモ
          </div>
          <Link v-else :href="route('mypage.duga_free')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-amber-200"
            preserve-scroll>
          フリーメモ
          </Link>
        </li>
        <li class="mx-1 text-center w-1/2">
          <div v-if="path.includes('duga/nice') === true"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-pink-200">
            気になる動画
          </div>
          <Link v-else :href="route('mypage.duga_nice')"
            class="w-full py-1 shadow-md rounded block leading-normal text-gray-600 bg-gray-200 hover:text-gray-600 hover:bg-pink-200"
            preserve-scroll>
          気になる動画
          </Link>
        </li>
      </ul>
    </li>
  </ul>
</template>