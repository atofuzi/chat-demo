<template>
  <ul class="min-w-[320px] h-[calc(100vh-64px)] overflow-auto">
    <template v-if="chatRoomList.length">
      <li @click="fetchChatRoom" v-for="chatRoom in chatRoomList" :key="chatRoom.id" :data-chat-room-id="chatRoom.id" class="hover:bg-slate-200 active:bg-slate-300 focus:bg-slate-200">
          <div class="flex justify-start items-center h-20 mx-3 border-b border-gray-200">
            {{ chatRoom.name }}
          </div>
      </li>
    </template>
  </ul>  
</template>

<script>
import { useRouter } from 'vue-router'
import chatRoom from '@/composables/chatRoom';

// import { useRouter, useRoute } from 'vue-router'
export default {
  setup() {
    const router = useRouter();

    const { chatRoomList, chatRoomListError, fetchChatRoomList} = chatRoom();

    fetchChatRoomList();

    const fetchChatRoom = (e) => {
      const chatRoomId = e.currentTarget.getAttribute('data-chat-room-id');
      router.push('/chat/' + chatRoomId )
    }
    return {
      chatRoomList,
      chatRoomListError,
      fetchChatRoom
    }
  }

}
</script>