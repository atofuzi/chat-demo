<template>
<div>
  <h1>simple chat</h1>
  <input v-model="message" id="inputText" type="text">
  <input @click="sendButton" type="submit">
  <ul id="messageList">
    <li v-for="(message , index) in messageList" :key="index">{{ message }}</li>
  </ul>
</div>
</template>

<script>
import { io } from "socket.io-client";
import { reactive, ref } from '@vue/reactivity';

export default {
  name: 'HomePage',
  setup() {
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
      message,
      messageList,
      sendButton,
    }
    
  }
}
</script>

<style>

</style>