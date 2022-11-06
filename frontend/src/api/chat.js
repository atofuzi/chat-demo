import axios from './index';

export function getAllMessages () {
  // setTimeout(() => {
  //   cb(data)
  // }, LATENCY)
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