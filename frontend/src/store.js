import { createStore } from 'vuex';
import { createMessage } from './api/chat';
import { login, setAuthToLocalStorage } from './api/auth'

const store = createStore({
  state () {
    return {
      count: 2,
      accessToken: '',
      expiresIn: '',
      refreshToken: '',
    }
  },
  getters: {
    doubleCount: state => state.count * 2,
    tripleCount: state => state.count * 3,
    accessToken: state => state.accessToken,
    expiresIn: state => state.expiresIn,
    refreshToken: state => state.refreshToken,
  },
  mutations: {
    increment(state, number) {
      state.count += number
    },
    decrement(state, number) {
      state.count -= number
    },
    setAccessToken(state, accessToken) {
      state.accessToken = accessToken;
    },
    setExpiresIn(state, expiresIn) {
      state.expiresIn = expiresIn;
    },
    setRefreshToken(state, refreshToken) {
      state.refreshToken = refreshToken;
    },
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
    },
    async authLogin (context, payload) {
      try {
        const response = await login(payload.userName, payload.password);
        setAuthToLocalStorage(response.data);

        context.commit('setAccessToken', response.data.access_token);
        context.commit('setExpiresIn', response.data.access_token);
        context.commit('setRefreshToken', response.data.access_token);
        
      } catch (error) {
        throw new Error(error);
      }
    }
  }
});

export default store;