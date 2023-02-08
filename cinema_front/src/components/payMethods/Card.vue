<template>
  <div>
    <form @input="inputHandler">
      <div class="input-groups">
        <div class="input-group">
          <label for="name" class="text-regular">Введите имя и фамилию</label>
          <input v-model="name" type="text" id="name" />
        </div>
        <div class="input-group">
          <label for="number" class="text-regular">Номер карты</label>
          <input
            type="password"
            id="number"
            class="input-secret"
            v-model="card"
            @click="selectedField = 'card'"
            @input="cardHandler"
            placeholder="●●●● ●●●● ●●●● ●●●●"
            maxlength="16"
          />
        </div>

        <div class="row">
          <div class="input-group">
            <label for="date" class="text-regular">Срок действия карты</label>
            <masked-input
              v-model="date"
              id="date"
              placeholder="ММ/ГГ"
              mask="11/11"
            />
          </div>
          <div class="input-group cvc">
            <label for="cvv" class="text-regular">CVV2/CVC2</label>
            <input
              type="password"
              id="cvv"
              v-model="cvv"
              @click="selectedField = 'cvv'"
              @input="cvvHandler"
              maxlength="3"
              class="input-secret"
              placeholder="●●●"
            />
          </div>
        </div>
      </div>
      <div class="input-screen">
        <button
          v-for="(btn, idx) in buttons"
          :key="idx"
          :value="btn"
          @click.prevent="clickHandler(btn)"
          class="text-white text-semi-bold"
        >
          {{ btn }}
        </button>
      </div>
    </form>
    <Btn
      className="pay-btn"
      text="Оплатить"
      :fluid="fluid"
      :center="!fluid"
      :disabled="btnDisabled"
    />
  </div>
</template>

<script>
import Btn from "@/components/Btn";
import MaskedInput from "vue-masked-input";

export default {
  name: "Card",
  components: { Btn, MaskedInput },
  data() {
    return {
      btnDisabled: true,
      fluid: true,
      selectedField: "card", //card or cvv
      card: "",
      cvv: "",
      date: "",
      name: "",
      buttons: [
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "clear",
        "0",
        "enter",
      ],
    };
  },
  mounted() {
    if (window.screen.width <= 480) {
      this.fluid = false;
    }
  },
  methods: {
    clickHandler(btn) {
      //1,2,3,4,5,6,7,8,9,clear,enter
      if (this.selectedField === "card" && this.card.length < 16) {
        if (btn !== "clear" && btn != "enter") {
          this.card += btn;
        }
        if (this.card.length == 16) {
          this.selectedField = "cvv";
        }
      }
      if (this.selectedField === "cvv" && this.cvv.length < 3) {
        if (btn !== "clear" && btn !== "enter") {
          this.cvv += btn;
        }
      }
      if (btn === "clear") {
        if (this.selectedField === "card") {
          this.card = this.card.substring(this.card.length - 1, 0);
        }
        if (this.selectedField === "cvv") {
          this.cvv = this.cvv.substring(this.cvv.length - 1, 0);
        }
      }
      if (btn === "enter") {
        if (this.selectedField === "card") {
          this.selectedField = "cvv";
        }
      }
    },
    cvvHandler(e) {
      if (isNaN(e.target.value)) {
        this.cvv = this.cvv.substring(this.cvv.length - 1, 0);
      }
    },
    cardHandler(e) {
      if (isNaN(e.target.value)) {
        this.card = this.card.substring(this.card.length - 1, 0);
      }
    },
    inputHandler(e) {
      if (
        this.card.length >= 16 &&
        this.cvv.length >= 3 &&
        this.name.length > 5 &&
        this.date.length >= 4
      ) {
        this.btnDisabled = false;
      } else {
        this.btnDisabled = true;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
div {
  // max-width: 634px;
  width: 100%;
  form {
    display: flex;
    align-items: flex-end;
    .input-screen {
      display: flex;
      flex-wrap: wrap;
      padding: 21px 26px;
      min-width: 256px;
      min-height: 218px;
      max-width: 256px;
      max-height: 218px;
      background: #262626;
      border-radius: 20px;
      box-shadow: 0px 14px 25px rgba(0, 0, 0, 0.2);
      margin-left: 38px;
      button {
        background: transparent;
        width: 45px;
        height: 38px;
        border: 0;
        outline: 0;
        font-size: 20px;
        margin: 0 11.5px;
        transition: 0.2s;
        border-radius: 5px;
        position: relative;

        &:hover {
          background: #27ae60;
        }
        &:nth-child(10),
        &:nth-child(12) {
          font-size: 0;
        }
        &:nth-child(10)::before {
          content: "";
          display: block;
          width: 24px;
          height: 24px;
          background: url("../../assets/images/common/backspace.svg") no-repeat
            center;
          background-size: contain;
          position: absolute;
          top: 7px;
          left: 9px;
        }
        &:nth-child(12)::before {
          content: "";
          display: block;
          width: 24px;
          height: 24px;
          background: url("../../assets/images/common/check.svg") no-repeat
            center;
          background-size: contain;
          position: absolute;
          top: 7px;
          left: 9px;
        }
      }
    }
    .input-groups {
      max-width: 365px;
      width: 100%;

      .row {
        display: flex;
        justify-content: space-between;
        .input-group {
          max-width: 192px;
          &:nth-child(1) {
            margin-right: 20px;
          }
          &:nth-child(2) {
            max-width: 154px;
          }
        }
      }
      .input-group {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        position: relative;
        margin-top: 17px;
        input[type="password"] {
          color: #27ae60;
          font-size: 30px;
          letter-spacing: 3px;
        }
        &::focus {
          label {
            color: #ffffff;
          }
        }
        label {
          color: #777777;
          font-size: 14px;
        }
        input {
          height: 42px;
          background: transparent;
          border: 0.5px solid #777777;
          max-width: 560px;
          width: 100%;
          outline: 0;
          margin-top: 10px;
          cursor: pointer;
          transition: 0.1s;
          padding: 17px 23px;
          color: #ffffff;
          border-radius: 10px;
          &:hover {
            border: 0.5px solid #ffffff;
          }
          &:focus {
            border: 0.5px solid #ffffff;
          }

          &::placeholder {
            color: #777777;
            font-family: "Regular";
          }
        }
        .input-secret {
          &::placeholder {
            font-size: 17px !important;
            text-transform: uppercase;
            letter-spacing: 3px;
            transform: translateY(-7px);
          }
        }
      }
    }
  }
  .pay-btn {
    margin-top: 60px;
  }
}
@media screen and (max-width: 834px) {
  div {
    width: 100%;
    form {
      #date {
        transform: translateY(-9px);
      }
      .input-screen {
        display: flex;
      }
      .input-groups {
        max-width: 265px;
      }
    }
  }
}

@media screen and (max-width: 676px) {
  div {
    form {
      .input-screen {
        display: flex;
        padding: 10px 10px;
        min-width: 226px;
        min-height: 198px;
        max-width: 226px;
        max-height: 198px;
      }
      .input-groups {
        max-width: 265px;
        .input-group {
          input {
            &:hover {
            }
            &:focus {
            }

            &::placeholder {
            }
          }
          .input-secret {
            &::placeholder {
            }
          }
        }
      }
    }
  }
}
@media screen and (max-width: 630px) {
  div {
    form {
      .input-screen {
        display: none;
      }
      .input-groups {
        max-width: 100%;
      }
      .cvc {
        width: 100px !important;
      }
    }
  }
}
@media screen and (max-width: 480px) {
  div {
    form {
      .input-groups {
        #date {
          transform: translateY(0);
        }
        input {
          border-radius: 7px !important;
          &::placeholder {
            font-size: 15px !important;
            letter-spacing: 2px !important;
            font-family: "Regular";
            transform: translateY(0) !important;
          }
          &[type="text"] {
            // font-size: 20px;
            letter-spacing: 2px;
          }
        }
        .cvc{
          width: 100% !important;
          max-width: 110px !important;
          #cvv {
            display: block;
            width: 100%;
          }
        }
      }
    }
  }
}
</style>