<template>
  <div class="bg-black">
    <Header />
    <section class="wrap">
      <div class="container">
        <arrow-back />
        <h1 class="text-white text-semi-bold">
          Заказать оборудование для кинозала
        </h1>
        <div class="toggle">
          <router-link
            class="text-regular"
            active-class="toggle-active text-medium"
            to="/cinema/for-halls/order-equipment/pay"
            >Купить</router-link
          >
          <router-link
            class="text-regular"
            active-class="toggle-active text-medium"
            to="/cinema/for-halls/order-equipment/pay/credit"
            >Купить в кредит</router-link
          >
        </div>
        <form @submit.prevent>
          <h2 class="text-white text-medium">Выберите способ оплаты</h2>
          <div class="line"></div>
          <div class="radio">
            <div class="radio-btn" @click="payMethod = 'system'">
              <div
                class="round"
                :class="{ 'active-round': payMethod == 'system' }"
              >
                <div class="dot"></div>
              </div>
              <label
                for="1"
                class="text-white text-regular"
                :class="{ 'text-semi-bold': payMethod == 'system' }"
                >Платежная система</label
              >
            </div>
            <div class="radio-btn" @click="payMethod = 'card'">
              <div
                class="round"
                :class="{ 'active-round': payMethod == 'card' }"
              >
                <div class="dot"></div>
              </div>
              <label
                for="2"
                class="text-white text-regular"
                :class="{
                  'text-semi-bold':
                    payMethod == 'saved-card' || payMethod == 'card',
                }"
                >Оплата по карте</label
              >
            </div>
            <div class="radio-btn" @click="payMethod = 'props'">
               <div
                class="round"
                :class="{ 'active-round': payMethod == 'props' }"
              >
                <div class="dot"></div>
              </div>
              <label
                for="3"
                class="text-white text-regular"
                :class="{ 'text-semi-bold': payMethod == 'props' }"
                >Оплата по реквизитам</label
              >
            </div>
          </div>
          <transition name="dropdown">
            <payment-system v-if="payMethod == 'system'" />
          </transition>
          <transition name="dropdown">
            <saved-card v-if="payMethod == 'saved-card'" />
          </transition>
          <card v-if="payMethod == 'card'" />
          <props v-if="payMethod == 'props'" />
        </form>
      </div>
    </section>
    <Footer />
  </div>
</template>
<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";
import PaymentSystem from "@/components/payMethods/PaymentSystem";
import Props from "@/components/payMethods/Props";
import SavedCard from "@/components/payMethods/SavedCard";
import Card from "@/components/payMethods/Card";
import Btn from "@/components/Btn";
export default {
  name: "OrderEquipmentPay",
  components: {
    Header,
    Footer,
    ArrowBack,
    PaymentSystem,
    SavedCard,
    Props,
    Card,
    Btn,
  },
  data() {
    return {
      payMethod: "system", //system, saved-card, card, props(реквизит)
    };
  },
};
</script>

<style lang="scss" scoped>
.wrap {
  .container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 88px 15px 93px 15px;
    h1 {
      font-size: 32px;
      margin-bottom: 60px;
    }
    .toggle {
      padding-bottom: 15px;
      border-bottom: 1px solid #666666;
      display: flex;
      justify-content: center;
      margin-bottom: 54px;
      a {
        text-decoration: none;
        margin: 0 27px;
        color: #999999;
        font-size: 14px;
      }
      .toggle-active {
        color: #ffffff;
        position: relative;
        &:after {
          content: "";
          position: absolute;
          display: block;
          width: 100%;
          bottom: -17px;
          left: 0;
          height: 2px;
          background: #ffffff;
        }
      }
    }
    form {
      padding: 30px 57px 53px 57px;
      background: #191919;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      h2 {
        text-align: center;
      }
      .line {
        width: 100%;
        height: 1px;
        background: #474747;
        margin: 30px 0 37px 0;
      }
      .radio {
        align-self: flex-start;
        margin-bottom: 37px;
        font-size: 14px;
        .radio-btn {
          margin-top: 20px;
          display: flex;
          align-items: center;
          &:first-child {
            margin-top: 0;
          }
          .round {
            min-width: 15px;
            min-height: 15px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ffffff !important;           
            margin-right: 12.5px;
          }
          .active-round {
            border: 2px solid #d8004e !important;           
            .dot {
              display: block;
              height: 7.5px;
              width: 7.5px;
              background: #d8004e;
              border-radius: 50%;
            }
          }
        }
      }
      .pay-btn {
        margin-top: 52px !important;
      }
    }
  }
}

@media screen and (max-width: 835px) {
  .wrap {
    min-height: calc(100vh - 181px - 70px);
    .container {
      // padding: 88px 15px 93px 15px;
      h1 {
        font-size: 24px;
        margin-bottom: 45px;
      }
      form {
        max-width: 100%;

        h2 {
          font-size: 24px;
        }
      }
    }
  }
}
@media screen and (max-width: 480px) {
  .wrap {
    .container {
      padding: 66px 15px 56px 15px;
      h1 {
        font-size: 18px;
        margin-bottom: 30px;
        text-align: center;
      }
      form {
        background: transparent;
        padding: 0 0;

        h2 {
          font-size: 16px;
        }
        .radio {
          margin-bottom: 25px;
          .radio-btn {
            font-size: 14px;
            margin-top: 15px;
          }
        }
        .pay-btn {
          width: 130px;
          padding: 10px 0;
        }
      }
    }
  }
}
</style>