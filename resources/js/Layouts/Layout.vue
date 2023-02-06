<script setup>
import Header from '@/Components/Parts/Header.vue';
import SideBar from '@/Components/Parts/SideBar.vue';
import FanzaSideBar from '@/Components/Parts/FanzaSideBar.vue';
import DugaSideBar from '@/Components/Parts/DugaSideBar.vue';
import MypageSideBar from '@/Components/Parts/MypageSideBar.vue';
import Footer from '@/Components/Parts/Footer.vue';

const path = location.pathname;
</script>

<template>
  <Header />
  <div class="flex flex-col min-h-screen">
    <div class="flex flex-grow">
      <div class="">
        <div v-if="path.includes('fanza') === true">
          <FanzaSideBar />
        </div>
        <div v-else-if="path.includes('dugavideo') === true">
          <DugaSideBar />
        </div>
        <div v-else-if="path.includes('mypage') === true">
          <MypageSideBar />
        </div>
        <div v-else>
          <SideBar />
        </div>
      </div>
      <div class="">
        <article>
          <slot />
        </article>
      </div>
    </div>
    <Footer />
  </div>
  

</template>