<script setup>
import ChatMessageContent from "@/components/pages/chat/ChatMessageContent.vue";

const props = defineProps({
    messageInfo: Object,
  });

// const replyContent = ref(null);

// const emits = defineEmits(['close-reply-message-item']) 

// const closeReplyMessageItem = (event, replyContent) => {
//   if (replyContent.value.parentElement.contains(event.target)) return;
//   emits("close-reply-message-item", event);
// }

// onMounted (() => {
//   console.log("onMounted");
//   document.addEventListener('click', (event) => {
//       // console.log(event);
//       // console.log(event.target.parentElement);
//       closeReplyMessageItem(event, replyContent);
//     });
// });
const icon = process.env.VUE_APP_ASW_S3_HOST + process.env.VUE_APP_AWS_S3_BUCKET + "kanu.png";


</script>


<template>
  <div id="id" ref="replyContent" class="w-full tooltip1 shadow bg-white border border-slate-200"> 
    <img class="h-8 w-8 rounded-full m-2 pointer-events-none" :src="icon" alt="">
    <ChatMessageContent class=" js-reply-item overflow-y-scroll" :message="props.messageInfo.message" />
  </div>
</template>
