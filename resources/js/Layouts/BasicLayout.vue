<script setup>
import Header from '@/Components/Parts/Header.vue';
import Footer from '@/Components/Parts/Footer.vue';

</script>

<template>
  <Header />
  <div class="flex flex-col min-h-screen">
    <div class="flex flex-grow">
      <div class="">
        <article>
          <slot />
        </article>
      </div>
    </div>
    <Footer />
  </div>
  

</template>