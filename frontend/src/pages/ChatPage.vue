<template>
<div>
  <HeaderNavigator></HeaderNavigator>
  <div class="flex">
    <ChatRoomList @clickListItem="selectedChatRoom" :chatRoomList="chatRoomList" ></ChatRoomList>
    <main class="flex flex-col h-[calc(100vh-64px)] w-full">
      <div class="h-12 leading-[48px] text-center border-b bottom-1 shadow">{{ chatRoomName }}</div>
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
import { ref, toRefs, computed } from 'vue';
// import { useRoute } from 'vue-router'; 
import HeaderNavigator from '@/components/base/HeaderNavigator.vue';
import ChatRoomList from '@/components/pages/chat/ChatRoomList.vue';
import ChatMessageList from '@/components/pages/chat/ChatMessageList.vue';
import ChatMessageInput from '@/components/pages/chat/ChatMessageInput.vue';
import chatRoom from '@/composables/chatRoom';

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

    let { chatRoomId } = toRefs(props);
    let selectedChatRoomName = ref('')

    // チャットルーム名取得
    const getChatRoomName = (chatRoomId) => {
      // TODO:存在しないchatroom_idの場合のエラー処理
      const selectedChatRoom = chatRoomList.value.find(({id}) => id === chatRoomId);
      return selectedChatRoom.name; 
    } 

    // チャット一覧取得
    const { chatRoomList, chatRoomListError, fetchChatRoomList} = chatRoom();
    fetchChatRoomList().then( () => {
      selectedChatRoomName.value = getChatRoomName(Number(chatRoomId.value)); 
    });

    // チャットルーム選択時の処理
    const selectedChatRoom = (chatRoomId) => {
      selectedChatRoomName.value = getChatRoomName(chatRoomId); 
    }

    const chatRoomName = computed( () => {
      return selectedChatRoomName.value
    }) 

    return {
      chatRoomName,
      chatRoomListError,
      chatRoomList,
      selectedChatRoom
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