<template>
  <div class="support__container">
    <div class="support_header">
      <h3>Support Service</h3>
      <span class="support__header_close" @click="closeChat">X</span>
    </div>
    <div class="support__body">
      <div class="support_window" v-for="(item, i) in messages" :key="i">
        <div class="support_admin" >
          <div>
            <img src="../../assets/images/cinema-for-halls-page/settings_icon.svg"/>
          </div>
          <div>
            <p>{{ item.message }}</p>
            <p class="support__admin_date">17.01.2022 13:49</p>
          </div>

        </div>

        <div class="support_client" >
          <p class="support__client_name">Narek M.</p>
            <p>{{ item.message }}</p>
            <p class="support__admin_date">17.01.2022 13:49</p>
        </div>

      </div>


    </div>
    <div class="support__footer">
      <input type="text" placeholder="Message" class="support__footer_input" @keydown.enter="send" v-model="form.message">
      <img src="../../assets/images/cinema-for-halls-page/attach.png" style="width: 25px"/>
      <button class="btn btn-primary" @click="send">Send</button>

    </div>
  </div>
</template>

<script>
import axios from "axios";
import Pusher from 'pusher-js'

export default {
  name: "Index.vue",
  data() {
    return {
      channel: null,
      form: {
        message: ''
      },
      messages: [],
    }
  },

  methods: {
    send() {
      axios.post(process.env.VUE_APP_API_URL + 'api/support', this.form).then((res) => {
        this.messages.push(res.data)
        this.form.message = ''
      })
    },
    closeChat() {
      this.$emit('closeChat', false)
    }
  },

  mounted() {
    Pusher.logToConsole = true;
    const pusher = new Pusher('e20ef2477905adae7d7f', {
      cluster: 'ap2'
    });

    const channel = pusher.subscribe('chat');
    channel.bind('my-channel', function (data) {
      alert(JSON.stringify(data));
    });
  }
}
</script>

<style scoped>
.support__container {
  width: 30%;
  height: 450px;
  background: #fff;
  position: fixed;
  right: 0;
  bottom: 0;
}

.support_header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid;
  padding: 5px 5px 10px 5px;
  font-style: italic;
}

.support__header_close {
  padding: 2px 6px;
  border-radius: 50%;
  border: 1px solid;
  cursor: pointer;
}

.support__footer {
  padding: 10px 5px 5px 5px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.support__footer_input {
  width: 78%;
  padding: 10px 5px;
  border: none;
  outline: none;
}

.support_admin {
  background: #25af60;
  border-left: 3px solid #d8014d;
  margin: 10px 5px;
  color: #fff;
  padding: 10px 7px 5px 7px;
}

.support__admin_date {
  margin: 15px 0 0 0;
  text-align: right;
  font-size: 13px;
  font-style: italic;
}

.support_client{
  background: #f3f3f3;
  margin: 10px 5px;
  color: #000;
  padding: 10px 7px 5px 7px;
  border-left: 3px solid #25af60;
}
.support__client_name {
  margin: 0;
}
</style>