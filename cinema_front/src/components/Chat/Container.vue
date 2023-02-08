<template>
  <div class="container">
    <div class="closeBtn">
      <svg xmlns="http://www.w3.org/2000/svg" @click="closeChat" style="cursor: pointer" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
      </svg>
    </div>
    <div class="chat-screen">
      <chat-room-selection
        v-if="currentRoom.id"
        :rooms = "chatRooms"
        :currentRoom = "currentRoom"
        v-on:roomchanged="setRoom($event)"
      /><p class="messages">
        <message-container :messages="messages"/></p>
      <input-message :room="currentRoom" v-on:messagesent="getMessages()"/>
    </div>
  </div>
</template>

<script>
import MessageContainer from "./messageContainer";
import InputMessage from "./inputMessage";
import axios from "axios";
import ChatRoomSelection from "./chatRoomSelection";
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
import {mapActions} from "vuex";
export default {
  name: "Container",
  components: {ChatRoomSelection, InputMessage, MessageContainer},
  data() {
    return {
      chatRooms: [],
      currentRoom: [],
      messages: [],
      closeChatValue: true,
    }
  },
  watch: {
    // currentRoom(){
    //   this.connect()
    // }
  },
  methods: {
    ...mapActions(['sendCloseChat']),
    // connect(){
    //   if(this.currentRoom.id){
    //     let vm = this;
    //     console.log(this.currentRoom.id)
    //     this.getMessages();
    //     window.Echo.private("chat."+this.currentRoom.id)
    //     .listen('.message.new', () => {
    //       vm.getMessages()
    //     })
    //   }
    // },
    // disconnect( room){
    //   window.Echo.private("chat."+ room.id)
    // },
    getRooms(){
      axios.get(process.env.VUE_APP_API_URL + 'api/chat/rooms').then( (res) => {
        this.chatRooms = res.data
        this.setRoom(res.data[0])
      }).catch( error => {
        console.log(error)
      })
    },
     setRoom (room) {
      this.currentRoom = room
       this.getMessages()
     },
    getMessages(){
      axios.get(process.env.VUE_APP_API_URL + 'api/chat/room/' + this.currentRoom.id + '/messages').then( (res) => {
        this.messages = res.data
      }).catch( error => {
        console.log(error)
      })
    },
    closeChat(){
      this.$emit("CloseChat", this.closeChatValue);
      // this.sendCloseChat(this.closeChatValue)
    }
  },
  created() {
    this.getRooms();
  }
}
</script>

<style scoped>
.closeBtn{
  width: 100%;
  padding: 5px 0px;
  text-align: right;
}
.container{
  background-color: white;
  width: 100%;
  border-radius: 10px;
  height: 100%;
  background-color: #2e2e2e;
}
.messages{
  color: #0b0b0b;
  height: 300px;
  overflow-y: scroll;
}
</style>