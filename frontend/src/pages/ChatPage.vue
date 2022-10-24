<template>
<div>
  <main class="pt-16 pl-80">
    <div v-for="n in 100" :key="n">
      <div class="flex justify-start items-center h-20 mx-3 border-b border-gray-200">
        <img class="h-8 w-8 rounded-full m-2" :src="icon" alt="">
        <div >ここにメッセージが入ります</div>
      </div>
    </div>
    <div class="p-4">
      <div>
        <button>送信{{localStorageMessage}}</button>
      </div>
      <textarea v-model="chatMessage" name="" id="" cols="30" rows="7" class="w-full p-4 box-border border "></textarea>
    </div>
  </main>


</div>
</template>

<script>
import { ref, computed, watch } from 'vue';
import { useRoute } from 'vue-router' 
export default {
  name: 'ChatPage',
  props: [
    'id'
  ],
  setup() {
    const route = useRoute();
    const chatLoomId = computed( () => { return route.params });  

    let chatMessage = ref('');

    const getLocalStrageMessage = (chatLoomId) => {
      // console.log(localStorage.getItem('draft_chatmessage_' + chatLoomId));
      chatMessage.value = localStorage.getItem('draft_chatmessage_' + chatLoomId);
      console.log(chatMessage.value); 
    }

    // onBeforeUpdate(() => {
    //       console.log("on before update", chatLoomId)
    // });
    watch(chatLoomId , () => {
      // console.log(localStorage.getItem('draft_chatmessage_1'));
      console.log('ローカルメッセージ取得');
      console.log(chatLoomId.value.id);
      getLocalStrageMessage(chatLoomId.value.id);
    })
    console.log(chatLoomId);
    return {
      chatLoomId,
      chatMessage,
    }
  },
  data: function() {
    return {
      icon: "https://baboo-dev-s3.s3.ap-northeast-1.amazonaws.com/images/%E7%94%98%E9%9B%A8500.png",
    }
  }
}
</script>

<style>

</style>