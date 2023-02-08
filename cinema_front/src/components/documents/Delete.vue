<template>
  <div>
    <div v-if="!deleted" class="finance">
      <div v-for="(item, idx) in items" :key="idx" class="item">
        <span class="p-sm text-white text-semi-bold">Название фильма:</span>
        <input
          v-model="item.name"
          @input="validate"
          :disabled="formDisabled"
          type="text"
          class="p-xs text-white text-regular"
          :class="{'text-gray': formDisabled}"
        />
      </div>
      <add-btn text="Добавить фильм" @click.native="addItem" :disabled="formDisabled" />
      <Btn @click.native.prevent="requestHandler" text="Запросить" :disabled="btnDisabled" />
    </div>
    <div v-if="deleted" class="deleted">
      <span class="text-white p-xs text-regular">
        <span
          v-for="(item, idx) in items"
          :key="idx"
        >{{item[idx] = items.length ? (item.name + ', ') : item.name}}</span>
      </span>
      <span class="h3 text-red text-semi-bold">Данный контент был успешно ликвидирован.</span>
    </div>
  </div>
</template>

<script>
import AddBtn from "@/components/AddBtn";
import Btn from "@/components/Btn";
import axios from "axios";

export default {
  data: () => ({
    items: [{ name: "" }],
    btnDisabled: true,
    formDisabled: false,
    deleted: false,
    currentTab: 'Delete'
  }),
  components: { AddBtn, Btn },

  methods: {
    validate() {
      this.items.forEach((el) => {
        if (el.name.length > 3) {
          this.btnDisabled = false;
        } else {
          this.btnDisabled = true;
        }
      });
    },
    addItem() {
      this.btnDisabled = true;
      const newItem = {
        name: "",
      };
      this.items.push(newItem);
    },
    requestHandler() {
      axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/documents/send', {
        'films': this.items,
        'tab': this.currentTab
      }).then((res) => {
        if(res.data.success){
          this.deleted = true;
        }
      })

      // this.formDisabled = true;
      // this.btnDisabled = true;
      // const films = this.items.map((el) => el.name);
      // this.$emit("onRequest", films);
    },
  },
};
</script>

<style lang="scss" scoped>
.finance {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  .item {
    display: flex;
    align-items: center;
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
    input {
      background: transparent;
      border: 1px solid #ffffff;
      outline: 0;
      border-radius: 10px;
      height: 35px;
      width: 100%;
      padding: 0 15px;
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
.deleted {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  background: #212121;
  span:nth-child(1) {
    margin-bottom: 30px;
  }
}

@media (max-width:834px) {
  .item {
    flex-direction: column;
    align-items: flex-start !important;
    input {
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
    input {
      margin-top: 10px;
    }
  }
  .addBtn {
    margin-top: 24px !important;
  }
}
</style>