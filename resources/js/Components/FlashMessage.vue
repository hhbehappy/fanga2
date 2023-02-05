<script setup>
</script>

<template>
  <div v-if="$page.props.flash.status === 'store'" class="mb-4 text-white text-center font-bold bg-blue-500 rounded p-2 m-1">
    {{ $page.props.flash.message }}
  </div>
  <div v-if="$page.props.flash.status === 'update'" class="mb-4 text-white text-center font-bold bg-green-600 rounded p-2 m-1">
    {{ $page.props.flash.message }}
  </div>
  <div v-if="$page.props.flash.status === 'delete'" class="mb-4 text-white text-center font-bold bg-red-500 rounded p-2 m-1">
  {{ $page.props.flash.message }}
  </div>
</template>