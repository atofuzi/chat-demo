<template>
  <ul class="min-w-[320px] h-[calc(100vh-64px)] overflow-auto">
    <template v-if="chatRoomList.length">
      <li @click="fethChatRoom(chatRoom)" v-for="chatRoom in chatRoomList" :key="chatRoom.id" :data-chat-room-id="chatRoom.id" class="hover:bg-slate-200 active:bg-slate-300 focus:bg-slate-200">
          <div class="flex justify-start items-center h-20 mx-3 border-b border-gray-200">
            {{ chatRoom.name }}
          </div>
      </li>
    </template>
  </ul>  
</template>

<script>
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';
import { io } from "socket.io-client";
import { reactive, ref } from '@vue/reactivity';

// import { useRouter, useRoute } from 'vue-router'
export default {
  props: {
    chatRoomList: Array
  },
  setup(_, {emit}) {
    const router = useRouter();

    const fethChatRoom = (chatRoom) => {
      // const chatRoomId = e.currentTarget.getAttribute('data-chat-room-id');
      emit('clickListItem', chatRoom.id);
      router.push('/chat/' + chatRoom.id );
    }

    const store = useStore();
    store.dispatch("socketOnChatRoomReceived");

    const message = ref('');
    const messageList = reactive([]);
    const socket = io('ws://localhost:8087', {
      withCredentials: true,
    });

    const sendButton = () => {
      
      if(message.value === '') {
        return;
      }
      console.log('送信');
      socket.emit('sendMessage', message.value);
      message.value = '';
    }

    socket.on('receiveMessage', (message) => {
      messageList.push(message);
    })
  
    return {
      fethChatRoom,
      message,
      messageList,
      sendButton,
    }
  }

}
</script>