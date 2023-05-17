<script setup>
import Header from '@/Components/Parts/Header.vue';
import Footer from '@/Components/Parts/Footer.vue';

</script>

<template>
  <div class="flex flex-col mx-auto min-h-screen max-w-[1320px]">
  <Header />
    <div class="flex flex-grow mx-auto">
      <div class="">
        <article>
          <slot />
        </article>
      </div>
    </div>
    <Footer />
  </div>
  

</template>