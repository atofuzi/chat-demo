import { ref } from 'vue';
import { getChatRoomList } from '@/api/chat';

const chatRoom = () => {
  // チャットルーム全権取得
  const chatRoomList = ref([])
  const chatRoomListError = ref(null)
  const fetchChatRoomList = async () => {
    try {
      const response = await getChatRoomList();
      chatRoomList.value = response.data;
    } catch (err) {
      chatRoomListError.value = err.message
      console.log(chatRoomListError.value);
    }
  }

  return {
    chatRoomList,
    chatRoomListError,
    fetchChatRoomList,
  }
}

export default chatRoom