<template>
  <div class="relative h-10 m-1">
    <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
      <input
          type="text"
          v-model="message"
          @keyup.enter="sendMessage()"
          placeholder="say something..."
          class="col-span-5 outline-none p-1"
      >
      <button @click="sendMessage()"
              class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 ,t-1 rounded text-white">
        Send
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "inputMessage",
  props: ['room'],
  data() {
    return {
      message: '',

    }
  },



  created() {
    // var channel = this.$pusher.subscribe('chat');
    // channel.bind('NewChatMessage', ({ log }) => {
    //   console.log(`User ${log.user.name} has ${log.action} at ${log.time}`);
    // });
    this.$pusher.subscribe('chat', channel => {
      channel.bind('App/Events/NewChatMessage', ({ log }) => {
        console.log(`User ${log.user.name} has ${log.action} at ${log.time}`);
      });

    })
  },




  methods: {
    sendMessage() {

      // if (this.message == '') {
      //   return;
      // }
      axios.post(process.env.VUE_APP_API_URL + 'api/chat/test', {
        id: 10,
        message: this.message
      }).then((res) => {
        if (res.status == 201) {
          this.message = ''
          this.$emit('messagesent')
        }
      }).catch(error => {
        console.log(error)
      })
    }
  }
}
</script>

<style scoped>

</style>