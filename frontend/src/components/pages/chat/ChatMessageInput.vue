<template>
  <div>
    <button>送信</button>
    <textarea @input="setLocalStrageMessage()" v-model="chatMessage" name="" id="" cols="30" rows="5" class="w-full p-4 box-border border "></textarea>
  </div>
</template>

<script>
import { toRefs, ref, watch } from "vue";
export default {
  props: {
    chatRoomId: String,
  },
  setup(props) {
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
      console.log(chatRoomId.value);
      clearMessage();
      getLocalStrageMessage(chatRoomId.value);
    })
  
  return {
    chatMessage,
    setLocalStrageMessage
  }

  }
}
</script>