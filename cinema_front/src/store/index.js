import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { support } from './modules/support'
Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    support,

  },

  state: {
    token: localStorage.getItem('access_token') || '',
    closeChat: false,
  },
  mutations: {
    setAuthToken(state) {
      // console.log(state.token)
      localStorage.setItem('access_token', state.token)
      // var object = { value: token, timestamp: new Date().getTime() }
      // localStorage.setItem("user-token", JSON.stringify(object));
      // state.token = token;
    },
    deleteAuthToken(state) {
      state.token = '';
      localStorage.removeItem("user-token");
      localStorage.removeItem("access_token");
    },
    closeChat(state, payload){
      state.closeChat = payload
    }
  },
  getters: {
    getAuthToken(state) {
      if (state.token) {
        // var object = JSON.parse(localStorage.getItem("user-token")),
        //   dateString = object.timestamp,
        //   now = new Date().getTime().toString();
        // // delete token after 2 weeks
        // if ((now - dateString) < 60 * 60 * 60 * 24 * 7) {
        //   return object.value;
        // };
        state.token = '';
        localStorage.removeItem("access_token");
      }
      return null;
    },
    getCloseChatValue(state){
      return state.closeChat
    }
  },
  actions: {
    sendCloseChat(context, payload){
      context.commit('closeChat', payload)
    },
  },
});
