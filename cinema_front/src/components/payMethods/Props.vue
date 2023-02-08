<template>
  <div>
    <h3 class="text-white text-semi-bold">Заполнение реквезитов</h3>
    <form @submit.prevent @input="changeHandler">
      <div class="row">
        <div class="input-group">
          <label for="name" class="text-regular"
            >Название организации получателя</label
          >
          <input v-model="name" type="text" id="name" class="text-medium" />
        </div>
      </div>
      <div class="row">
        <div class="input-group">
          <label for="account" class="text-regular">Счет получателя</label>
          <input
            v-model="wallet"
            type="text"
            id="account"
            class="text-medium"
          />
        </div>
      </div>
      <div class="row">
        <div class="input-group inn">
          <label for="inn" class="text-regular">ИНН</label>
          <input v-model="inn" type="text" id="inn" class="text-medium" />
        </div>
        <div class="input-group kpp">
          <label for="kpp" class="text-regular">КПП</label>
          <input v-model="kpp" type="text" id="kpp" class="text-medium" />
        </div>
        <div class="input-group bic">
          <label for="bic" class="text-regular">БИК</label>
          <input v-model="bic" type="text" id="bic" class="text-medium" />
        </div>
      </div>

      <div class="row">
        <div class="input-group total">
          <label for="total" class="text-regular" v-bind="0"
            >Сумма платежа</label
          >
          <div id="total" class="text-regular">0,00</div>
        </div>
        <span class="text-regular"
          >Комиссия будет расчитана согласно тарифу</span
        >
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

export default {
  name: "Props",
  components: { Btn },
  data() {
    return {
      btnDisabled: true,
      fluid: true,
      name: "",
      wallet: "",
      inn: "",
      kpp: "",
      bic: "",
    };
  },
  mounted() {
    if (window.screen.width <= 480) {
      this.fluid = false;
    }
  },
  methods: {
    changeHandler() {
      //set it up
      if (
        this.name.length >= 5 &&
        this.wallet.length >= 8 &&
        this.inn.length >= 5 &&
        this.kpp.length >= 3 &&
        this.bic.length >= 3
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
  background: #191919;
  .container {
    display: flex;
    flex-direction: column;
    h3 {
      font-size: 16px;
      margin-bottom: 28px;
    }
    .row {
      display: flex;
      margin-top: 15px;
      max-width: 560px;
      justify-content: space-between;
      width: 100%;
      &:nth-child(4) .input-group {
        max-width: 156px;
        width: 100%;
        &::after {
          content: "руб.";
          color: #ffffff;
          font-size: 14px;
          font-family: "Regular";
          position: absolute;
          top: 38px;
          right: -40px;
        }
      }
      .input-group {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        position: relative;
        &::focus {
          label {
            color: #ffffff;
          }
        }
        label {
          color: #777777;
          font-size: 14px;
        }
        
        input, div#total {
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
          font-size: 14px;

          &:hover {
            border: 0.5px solid #ffffff;
          }
          &:focus {
            border: 0.5px solid #ffffff;
          }
          &::placeholder {
            color: #ffffff;
            font-family: "Regular";
          }
        }
        div#total {
          align-items: center;
          padding: 12px 15px;
          color: #777777;
          &::first-letter {
            color: #ffffff;
          }
        }
      }
      .kpp {
        margin: 0 20px;
      }
      .inn {
        width: 157%;
      }
      .total {
        max-width: 228px !important;
        width: 100%;
      }
      span {
        color: #777777;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        transform: translateY(10px);
        margin-left: 50px;
        text-align: left;
      }
    }
    .pay-btn {
      margin-top: 60px;
    }
  }
}
@media screen and (max-width: 480px) {
  div {
    background: transparent;
    .container {
      .row {
        flex-wrap: wrap;
        &:nth-child(3) {
          .input-group {
            margin-right: 0;
          }
        }
        input, div#total {
          border-radius: 7px !important;
        }
        .inn {
          display: block;
        }
        .kpp {
          max-width: 148px;
          margin-left: 0;
          margin-top: 15px;
          width: calc(50% - 5px);
        }
        .bic {
          max-width: 148px;
          margin-top: 15px;
          width: calc(50% - 5px) !important;
        }
        span {
          margin-left: 0;
          width: 100%;
          text-align: center;
        }
      }
    }
  }
}
</style>