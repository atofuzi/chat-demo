<script setup>
import Content from "@/components/pages/chat/Content.vue";

const props = defineProps({
  message: String
})
</script>

<template>
    <Content class="js-reply-icon" :message="props.message"></Content>
</template>