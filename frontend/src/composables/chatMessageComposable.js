import { ref } from 'vue';
import { getAllMessageList } from '@/api/chat';

const chatMessageComposable = () => {
  // チャットルーム全権取得
  const messageList = ref([])
  const messageListError = ref(null)

  const fetchChatMessageList = async (chatRoomId) => {
    try {
      const response = await getAllMessageList(chatRoomId);
      messageList.value = response.data;
    } catch (err) {
      messageListError.value = err.message
      console.log(messageListError.value);
    }
  }

  return {
    messageList,
    messageListError,
    fetchChatMessageList,
  }
}

export default chatMessageComposable