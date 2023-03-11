<script setup>
import { ref, onMounted, computed } from 'vue'; 
import { useStore } from 'vuex';
import ChatMessageContent  from "@/components/pages/chat/ChatMessageContent.vue";
import ReplyChatMessageItem from "@/components/pages/chat/ReplyChatMessageItem.vue";

  const props = defineProps({
    messageInfo: Object,
  })

  const store = useStore();
  const content = ref(null);
  const isReplyChatMessage = ref(false);

  const icon =  process.env.VUE_APP_ASW_S3_HOST + process.env.VUE_APP_AWS_S3_BUCKET + "kanu.png";
  let showReplayModal = computed(() => {
    return store.getters.getShowReplayModal;
  });
  

  const deleteButton = () => {
    console.log("削除ボタンクリック")
  }

  const click = (chatMessageId) => {
    console.log(chatMessageId);
    isReplyChatMessage.value = true;
  }

  const closeReplyMessageItem = () => {
    console.log("発動");
    isReplyChatMessage.value = false;
  }
  onMounted (() => {
    let element = content.value.getElementsByClassName("js-replay-button");
    for (let i = 0; i < element.length; i++) {
      element[i].addEventListener("click", (event) => {
        click(event.target.value);
      })
    };
  });

</script>

<template>
  <div class="relative w-full">
    <div v-if="isReplyChatMessage" class="absolute -top-24 left-4 w-4/5 z-30" v-click-outside="closeReplyMessageItem">
      <ReplyChatMessageItem :messageInfo="props.messageInfo"/>
    </div>
    <div ref="content" class="relative w-full tooltip1"> 
      <img class="h-8 w-8 rounded-full m-2 pointer-events-none" :src="icon" alt="">
      <ChatMessageContent :message="props.messageInfo.message" />
      <div class="hover-menu absolute 8 m-2 p-2 bg-white border border-zinc-600 z-10">
        <button @click.prevent="deleteButton()" class="">削除</button>
    </div>
  </div>
  </div>

</template>



<style>
.hover-menu {
  display: none;
}

.tooltip1:hover .hover-menu{
    display: inline-block;
    bottom: -32px;
    right: 16px;
}
</style>