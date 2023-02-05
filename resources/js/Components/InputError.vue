<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p class="text-jg text-red-500">
            {{ message }}
        </p>
    </div>
</template>
