<template>
  <div class="bg-slate-100">
    <button @click='sendMessage()' class="mx-2 my-1 px-2 py-1 rounded-lg bg-slate-400 active:bg-slate-500">送信</button>
    <textarea @input="setLocalStrageMessage()" v-model="chatMessage" name="" id="" cols="30" rows="5" class="w-full p-2 box-border border "></textarea>
  </div>
</template>

<script>
import { toRefs, ref, watch } from "vue";
import { useStore } from 'vuex'

export default {
  props: {
    chatRoomId: String,
  },
  setup(props) {
    const store = useStore()
    let chatMessage = ref("");
    const { chatRoomId } = toRefs(props);

    const clearMessage = () => {
      chatMessage.value = "";
    }

    const setLocalStrageMessage = () => {
      localStorage.setItem('draft_chatmessage_' + chatRoomId.value, chatMessage.value);
    }

    const getLocalStrageMessage = (chatRoomId) => {
      chatMessage.value = localStorage.getItem('draft_chatmessage_' + chatRoomId);
    }

    watch(chatRoomId, () => {
      clearMessage();
      getLocalStrageMessage(chatRoomId.value);
    })
  
    const sendMessage = async () => {
      await store.dispatch('sendMessage', {
        chatRoomId: chatRoomId.value,
        chatMessage: chatMessage.value
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
      clearMessage();
    }

    return {
      chatMessage,
      setLocalStrageMessage,
      sendMessage
    }
  }
}
</script>