<script setup>
import Header from '@/Components/Parts/Header.vue';
import SideBar from '@/Components/Parts/SideBar.vue';
import FanzaSideBar from '@/Components/Parts/FanzaSideBar.vue';
import DugaSideBar from '@/Components/Parts/DugaSideBar.vue';
import Footer from '@/Components/Parts/Footer.vue';

const path = location.pathname;
</script>

<template>
  <div class="flex flex-col mx-auto min-h-screen max-w-[1320px]">
    <Header />
    <div class="flex flex-grow">
      <aside>
        <div v-if="path.includes('fanza') === true">
          <FanzaSideBar />
        </div>
        <div v-else-if="path.includes('duga') === true">
          <DugaSideBar />
        </div>
        <div v-else>
          <SideBar />
        </div>
      </aside>
      <main>
        <slot />
      </main>
    </div>
    <Footer />
  </div>
</template>