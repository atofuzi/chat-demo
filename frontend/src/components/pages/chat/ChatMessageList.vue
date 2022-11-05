<template>
  <div> 
      <div v-for="n in messageList" :key="n" class="flex justify-start items-center h-20 mx-3 border-b border-gray-300">
        <img class="h-8 w-8 rounded-full m-2" :src="icon" alt="">
        <div >ここにメッセージが入ります</div>
      </div>
</div>
</template>

<script>
import { toRefs, ref, watch } from 'vue'; 
export default {
  props: {
    chatRoomId: String
  },
  setup(props) {
    const { chatRoomId } = toRefs(props);
    let messageList = ref(10);
    const icon =  "https://baboo-dev-s3.s3.ap-northeast-1.amazonaws.com/images/%E7%94%98%E9%9B%A8500.png";
    const fetchChatMessage = (chatRoomId) => {
      console.log(chatRoomId + 'のメッセージ取得');
      const max = 10;
      const min = 1;
      messageList.value = Math.floor( Math.random() * (max + 1 - min) ) + min ;
    }

    watch(chatRoomId, () => { 
      fetchChatMessage(chatRoomId.value);
    })
    return {
      icon,
      messageList
    }
  }
}
</script>