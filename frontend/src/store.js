import { createStore } from 'vuex';
import { createMessage } from './api/chat';

const store = createStore({
  state () {
    return {
      count: 2
    }
  },
  getters: {
    doubleCount: state => state.count * 2,
    tripleCount: state => state.count * 3
  },
  mutations: {
    increment(state, number) {
      state.count += number
    },
    decrement(state, number) {
      state.count -= number
    }
  },
  actions: {
    increment(context, number) {
      context.commit('increment', number);
    },
    decrement(context, number) {
      context.commit('decrement', number);
    },
    sendMessage (context, payload) {
      return createMessage(payload.chatRoomId, payload.chatMessage);
    }
  }
});

export default store;