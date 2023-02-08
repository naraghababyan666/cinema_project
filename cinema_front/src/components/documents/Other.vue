<template>
  <div>
    <div v-if="!accepted" class="finance">
      <div class="item">
        <span class="p-sm text-white text-semi-bold">Запросить иной документ:</span>
        <textarea
          v-model="text"
          @input="validate"
          placeholder="Введите текст"
          type="text"
          class="p-xs text-white text-regular"
        ></textarea>
      </div>
      <Btn @click.native.prevent="requestHandler" text="Запросить" :disabled="btnDisabled" />
    </div>
    <div v-if="accepted" class="accepted">
      <img src="@/assets/images/documents/accepted.svg" alt="Запрос отправлен">
      <span class="h3 text-white text-semi-bold">Ваш запрос успешно отправлен. Ожидайте.</span>
    </div>
  </div>
</template>

<script>
import Btn from "@/components/Btn";
import axios from "axios";

export default {
  data: () => ({
    text: "",
    btnDisabled: true,
    accepted: false,
    currentTab: 'Other'
  }),
  components: { Btn },

  methods: {
    validate() {
      if (this.text.length > 3) {
        this.btnDisabled = false;
      } else {
        this.btnDisabled = true;
      }
    },
    requestHandler() {

      axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/documents/send', {
        'films': this.text,
        'tab': this.currentTab
      }).then((res) => {
        if(res.data.success){
          this.accepted = true;
        }
      })
    },
  },
};
</script>

<style lang="scss" scoped>
.finance {
  display: flex;
  flex-direction: column;
  align-items: flex-start;

  .item {
    display: flex;
    align-items: flex-start;
    margin-top: 23px;
    width: 100%;
    &:nth-child(1) {
      margin-top: 0;
    }
    span {
      display: block;
      margin-right: 15px;
      min-width: 175px;
    }
    textarea {
      background: transparent;
      border: 1px solid #ffffff;
      outline: 0;
      border-radius: 10px;
      height: 104px;
      width: 100%;
      padding: 10px;
      resize: none;
    }
    .text-gray {
      border: 1px solid #7c7c7c;
    }
  }
  .addBtn {
    margin-top: 50px;
  }
  .btn {
    margin-top: 56px;
    align-self: center;
  }
}
.accepted {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;  
  img {
    margin-bottom: 30px;
  }
}

@media (max-width:834px) {
  .item {
    flex-direction: column;
    align-items: flex-start !important;
    textarea {
      margin-top: 15px;
    }
  }
  .addBtn {
    margin-top: 30px !important;
  }
}
@media (max-width:490px) {
  .item {
    flex-direction: column;
    align-items: flex-start !important;
    margin-top: 10px !important;
    &:first-child {
      margin-top: 0 !important;
    }
    textarea {
      margin-top: 10px;
    }
  }
  .addBtn {
    margin-top: 24px !important;
  }
}
</style>