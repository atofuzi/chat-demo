import axios from './index';

export function getAllMessages () {
  // setTimeout(() => {
  //   cb(data)
  // }, LATENCY)
}

export const createMessage = async ( chatRoomId, chatMessage, ) => {
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