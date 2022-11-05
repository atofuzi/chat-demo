<template>
  <ul class="min-w-[320px] h-[calc(100vh-64px)] overflow-auto">
    <li @click="fetchChatRoom" v-for="chat in chatList" :key="chat.id" :data-chat-room-id="chat.id" class="hover:bg-slate-200 active:bg-slate-300 focus:bg-slate-200">
        <div class="flex justify-start items-center h-20 mx-3 border-b border-gray-200">
          {{ chat.name }}
        </div>
    </li>
  </ul>  
</template>

<script>
import { useRouter } from 'vue-router'
// import { useRouter, useRoute } from 'vue-router'
export default {
  setup() {
    const router = useRouter()
    // const route = useRoute()


    const fetchChatList = () => {
      let list = []
      for (let i = 1; i <= 20; i++) {
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