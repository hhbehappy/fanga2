<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  links: Array,
  display: String,
  type: String,
  group: String,
  sort: String,
  hits: String
})

</script>

<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap">
      <template v-for="link in links" :key="link.id">
        <div v-if="display === 'video'">
          <div v-if="link.url === null" class="mr-1 mb-2 px-4 py-3 text-sm leading-4 text-gray-300 border rounded"
            v-html="link.label" />
          <Link v-else
            class="block mr-1 mb-2 px-4 py-3 text-sm leading-4 border border-gray-300 rounded hover:bg-blue-700 hover:text-white"
            :class="{ 'bg-blue-700 text-white': link.active }"
            :href="link.url + '&display=' + display + '&sort=' + sort + '&type=' + type + '&hits=' + hits" v-html="link.label"
          />
        </div>
        <div v-if="display === 'memo' && !group ">
          <div v-if="link.url === null" class="mr-1 mb-2 px-4 py-3 text-sm leading-4 text-gray-300 border rounded"
            v-html="link.label" />
          <Link v-else
            class="block mr-1 mb-2 px-4 py-3 text-sm leading-4 border border-gray-300 rounded hover:bg-blue-700 hover:text-white"
            :class="{ 'bg-blue-700 text-white': link.active }"
            :href="link.url + '&display=' + display + '&sort=' + sort + '&hits=' + hits" v-html="link.label"
          />
        </div>
        <div v-if="display === 'memo' && group">
          <div v-if="link.url === null" class="mr-1 mb-2 px-4 py-3 text-sm leading-4 text-gray-300 border rounded"
            v-html="link.label" />
          <Link v-else
            class="block mr-1 mb-2 px-4 py-3 text-sm leading-4 border border-gray-300 rounded hover:bg-blue-700 hover:text-white"
            :class="{ 'bg-blue-700 text-white': link.active }"
            :href="link.url + '&display=' + display + '&sort=' + sort + '&group=' + group + '&hits=' + hits"
            v-html="link.label"/>
        </div>
      </template>
    </div>
  </div>
</template>