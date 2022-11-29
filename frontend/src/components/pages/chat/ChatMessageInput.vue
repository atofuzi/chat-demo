<template>
  <div class="bg-slate-100">
    <button @click='sendMessage()' class="mx-2 my-1 px-2 py-1 rounded-lg bg-slate-400 active:bg-slate-500">送信</button>
    <div class="relative"
      @dragenter="dragEnter"
      >
      <textarea
        @input="setLocalStrageMessage()"
        v-model="chatMessage"
        name=""
        id=""
        cols="30"
        rows="5"
        class="w-full p-2 box-border border"></textarea>
        <div @dragleave="dragLeave" v-if="showFileUploadArea" class="absolute top-0 left-0  h-full w-full flex justify-center items-center outline-dashed outline-offset-[-10px]">
          ファイルをアップロード
      </div>
    </div>

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
    let showFileUploadArea = ref(false);
    
    const dragEnter = () => {
      console.log('enter');
      showFileUploadArea.value = true;
    };

    const dragLeave = () => {
      console.log('reave');
      showFileUploadArea.value = false;
    }

    return {
      chatMessage,
      setLocalStrageMessage,
      sendMessage,
      dragEnter,
      dragLeave,
      showFileUploadArea
    }
  }
}
</script>