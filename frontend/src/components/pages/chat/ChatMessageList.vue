<template>
  <div> 
    <template v-if="messageList.length">
      <div v-for="message in messageList" :key="message.id" class="flex justify-start items-center h-20 mx-3 border-b border-gray-300">
        <img class="h-8 w-8 rounded-full m-2" :src="icon" alt="">
        <div>{{ message.message }}</div>
      </div>
    </template>
</div>
</template>

<script>
import { toRefs, watch } from 'vue'; 
import chatMessageComposable from '@/composables/chatMessageComposable.js'

export default {
  props: {
    chatRoomId: String
  },
  setup(props) {

    const { chatRoomId } = toRefs(props);
    const { messageList, messageListError, fetchChatMessageList } = chatMessageComposable();
    const icon =  "https://baboo-dev-s3.s3.ap-northeast-1.amazonaws.com/images/%E7%94%98%E9%9B%A8500.png";
    
    watch(chatRoomId, () => { 
      fetchChatMessageList(chatRoomId.value);
    });

    fetchChatMessageList(chatRoomId.value);

    return {
      icon,
      messageList,
      messageListError
    }
  }
}
</script>