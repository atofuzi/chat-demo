<template>
  <div> 
    <template v-if="messageList.length">
      <div v-for="message in messageList" :key="message.id" class="flex flex-row justify-start items-center mx-3 border-b border-gray-300  hover:bg-gray-100">
        <ChatMessageItem :messageInfo="message" />
      </div>
    </template>
</div>
</template>

<script>
import { toRefs, watch } from 'vue'; 
import chatMessageComposable from '@/composables/chatMessageComposable.js'
import ChatMessageItem from '@/components/pages/chat/ChatMessageItem.vue';

export default {
  props: {
    chatRoomId: String
  },
  components: {
    ChatMessageItem
  },
  setup(props) {

    const { chatRoomId } = toRefs(props);
    const { messageList, messageListError, fetchChatMessageList } = chatMessageComposable();

    watch(chatRoomId, () => { 
      fetchChatMessageList(chatRoomId.value);
    });

    fetchChatMessageList(chatRoomId.value);

    return {
      messageList,
      messageListError,
    }
  }
}
</script>