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
    const icon =  process.env.VUE_APP_ASW_S3_HOST + process.env.VUE_APP_AWS_S3_BUCKET + "kanu.png";
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