<template>
  <div>
    <Component
      :is="link.url ? 'Link' : 'span'"
      v-for="link in links"
      :key="link.id"
      :href="link.url"
      v-html="link.label"
      class="ml-5 text-gray-750 shadow-sm"
      :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }"
    />
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
};
</script>

<style>
</style>
