<template>
<div>
  <HeaderNavigator></HeaderNavigator>
  <div class="flex">
    <ChatRoomList></ChatRoomList>
    <main class="flex flex-col h-[calc(100vh-64px)] w-full">
      <div class="h-12 leading-[48px] text-center border-b bottom-1 shadow">チャットルーム{{ chatRoomId }}</div>
      <div class="overflow-auto px-1 flex-1">
        <ChatMessageList :chatRoomId="chatRoomId"></ChatMessageList>
      </div>
      <div class="">
        <ChatMessageInput :chatRoomId="chatRoomId"></ChatMessageInput>
      </div>
    </main>
  </div>
</div>
</template>

<script>
import { ref, toRefs, watch } from 'vue';
// import { useRoute } from 'vue-router'; 
import HeaderNavigator from '@/components/base/HeaderNavigator.vue';
import ChatRoomList from '@/components/pages/chat/ChatRoomList.vue';
import ChatMessageList from '@/components/pages/chat/ChatMessageList.vue';
import ChatMessageInput from '@/components/pages/chat/ChatMessageInput.vue';

export default {
  name: 'ChatPage',
  props: {
    chatRoomId: String
  },
    components: {
    HeaderNavigator,
    ChatRoomList,
    ChatMessageList,
    ChatMessageInput
  },
  setup(props) {
    // const route = useRoute();
    /* const chatRoomId = computed( () => { return route.params });  */

    let chatMessage = ref('');
    let { chatRoomId } = toRefs(props);
    watch(chatRoomId , () => {
      // console.log(localStorage.getItem('draft_chatmessage_1'));
      console.log(chatRoomId.value);
    })
    return {
      chatMessage,
    }
  },
}
</script>

<style>
.box {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}

.wrap {
  margin: 0;
  padding: 0;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
.content {
  flex: 1;
}
.side {
  min-width: 300px;
  background: #449fc3;
  height: 100%;
}
header {
  width: 100%;
  background: #ccdd33;
}
footer {
  width: 100%;
  background: #44aa33;
}
</style>