<script setup>
</script>

<template>
  <div v-if="$page.props.flash.status === 'free'" class="mb-4 text-black text-center font-bold bg-amber-200 rounded p-1">
    {{ $page.props.flash.message }}
  </div>
  <div v-if="$page.props.flash.status === 'release'" class="mb-4 text-black text-center font-bold bg-blue-200 rounded p-1">
    {{ $page.props.flash.message }}
  </div>
  <div v-if="$page.props.flash.status === 'private'" class="mb-4 text-black text-center font-bold bg-red-200 rounded p-1">
    {{ $page.props.flash.message }}
  </div>
  <div v-if="$page.props.flash.status === 'update'" class="mb-4 text-white text-center font-bold bg-green-600 rounded p-1">
    {{ $page.props.flash.message }}
  </div>
  <div v-if="$page.props.flash.status === 'delete'" class="mb-4 text-white text-center font-bold bg-red-500 rounded p-1">
  {{ $page.props.flash.message }}
  </div>
</template>