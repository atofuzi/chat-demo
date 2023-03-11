<script setup>

const props = defineProps({
  message: String
})
</script>

<template>
    <pre v-html="props.message"></pre>
</template>