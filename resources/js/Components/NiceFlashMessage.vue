<script setup>
</script>

<template>
  <div v-if="$page.props.flash.status === 'nice'" class="text-white text-center font-bold bg-pink-400 rounded p-2 m-1">
    {{ $page.props.flash.nicemessage }}
  </div>
  <div v-if="$page.props.flash.status === 'unnice'" class="text-white text-center font-bold bg-red-500 rounded p-2 m-1">
    {{ $page.props.flash.nicemessage }}
  </div>
</template>