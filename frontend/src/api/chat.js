import axios from './index';

export function getAllMessageList (chatRoomId) {
  return axios.get('/chat/room/' + chatRoomId + '/messages/');
}

export const createMessage =  ( chatRoomId, chatMessage, ) => {
  return axios.post('chat/room/' + chatRoomId + '/message/', { chatMessage: chatMessage });
}

export const getChatRoomList = async () => {
  return axios.get('/chat/rooms');
}