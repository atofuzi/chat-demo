<template>
  <nav class="h-screen fixed top-16 w-80" style="overflow-y:scroll;">
    <div @click="fetchChatRoom" v-for="chat in chatList" :key="chat.id" :data-chat-room-id="chat.id">
            <div class="flex justify-start items-center h-20 mx-3 border-b border-gray-200">
              {{ chat.name }}
            </div>
    </div>
  </nav>  
</template>

<script>
import { useRouter, useRoute } from 'vue-router'
export default {
  setup() {
    const router = useRouter()
    const route = useRoute()

    const fetchChatList = () => {
      let list = []
      for (let i = 1; i <= 100; i++) {
        list.push({'name': 'チャットルーム' + i, 'id': i });
      }
      return list;
    }
    const chatList = fetchChatList();

    const fetchChatRoom = (e) => {
      const chatRoomId = e.currentTarget.getAttribute('data-chat-room-id');
      // console.log(chatRoomId);
      router.push('/chat/' + chatRoomId )

    }
    return {
      chatList,
      fetchChatRoom
    } // ここで返されるものはコンポーネントの他のオプションで使用可能です
  }

}
</script>