import axios from './index';

export function getAllMessageList (chatRoomId) {
  return axios.get('/chat/room/' + chatRoomId + '/messages/');
}

export const createMessage =  ( chatRoomId, chatMessage, ) => {
  return axios.post('chat/' + chatRoomId + '/message/', {
        chatMessage: chatMessage
      });
      // .then(function (response) {
      //   console.log(response);
      // })
      // .catch(function (error) {
      //   console.log(error);
      // });
}

export const getChatRoomList = async () => {
  return axios.get('/chat/rooms');
}