<template>
  <form @submit.prevent class="phone">
    <div class="wrap">
      <div class="select text-white text-semi-bold">
        <span @click="showAll = !showAll" class="h3" v-if="!showSms">
          <template v-if="selected">{{ selected.code }}</template>
          <img
              src="@/assets/images/auth/arrow.svg"
              :class="{ rotate: showAll }"
          />
        </span>
        <transition name="urlChanged">
          <div class="options-wrap" v-if="showAll">
            <div class="options">
              <div
                  v-for="(item, idx) in countries"
                  :key="idx"
                  class="option text-white text-regular p"
                  @click="selectItem(item)"
              >
                {{ item.value }}
              </div>
            </div>
          </div>
        </transition>
      </div>
      <div class="phone">
        <div class="phone__country_code">
          <span class="text-white text-semi-bold h3">+{{ countryCode }}</span>
          <input v-model="$v.phone.$model" :disabled="showSms" type="tel" class="phone text-white text-semi-bold h3">
        </div>
      </div>
    </div>

    <div class="sms-wrap" v-if="showSms">
      <input
          v-model="$v.sms.$model"
          placeholder="sms-код"
          type="tel"
          class="sms text-white text-semi-bold h3"
      />
      <!-- <small class="error" v-if="larerrors.sms">
        <i>{{ larerrors.sms }}</i>
      </small> -->
      <div @click="sendSmsAgain" class="timer text-gray text-regular">
        {{
          Number(seconds)
              ? `${Math.floor((seconds / 60) % 60)}:${(
                  "0" +
                  (seconds % 60)
              ).slice(-2)}`
              : seconds
        }}
      </div>
    </div>
    <button
        @click="submit"
        :disabled="$v.phone.$error"
        class="next text-white text-semi-bold"
    >
      Далее
    </button>

    <div v-if="showSms" class="why text-gray text-regular">
      <span @click="showModal = !showModal">Не приходит код?</span>
      <transition name="urlChanged">
        <div v-if="showModal" class="why-modal">
          <button @click="showModal = false">
            <img src="@/assets/images/auth/close.svg" alt />
          </button>
          <h3 class="text-white text-semi-bold">Возможные причины:</h3>
          <ul>
            <li>1. Номер телефона введён неверно</li>
            <li>
              2. Вы не изменили в личном кабинете номер мобильного телефона на
              новый, и мы отправили код на старый. Обратитесь в службу поддержки
              через электронную почту
              <a href="mailto:support@extrafintech.com"
              >support@extrafintech.com</a
              >
              или позвоните по номеру
              <a href="tel:+79951317777">+7 995 131 77 77</a>
            </li>
            <li>
              3. Проблемы могут быть со стороны вашего сотового оператора.
              Обратитесь в их службу поддержки
            </li>
          </ul>
        </div>
      </transition>
    </div>
  </form>
</template>

<script>
import countries from "./Countries";
import {
  required,
  minLength,
  maxLength,
  numeric,
} from "vuelidate/lib/validators";
import axios from "axios";

export default {
  data: () => ({
    countryCode: '7',
    countries,
    showAll: false,
    selected: null,
    phone: null,
    sms: null,
    showSms: false,
    seconds: 180,
    showModal: false,
    larerrors: "",
  }),
  validations: {
    phone: {
      required,
      minLength: minLength(7),
      maxLength: maxLength(15),
      numeric,
    },
    sms: {
      required,
      numeric,
      minLength: minLength(3),
      maxLength: maxLength(7),
    },
  },
  mounted() {
    this.selected = countries.find((item) => item.code === "RU");
    // this.phone = countries.find((item) => item.code === "RU").phoneCode;
  },
  methods: {
    selectItem(item) {
      this.countryCode = item.phoneCode
      this.selected = item;
      this.showAll = false;
    },
    countDownTimer() {
      if (this.seconds > 0 && this.showSms) {
        setTimeout(() => {
          this.seconds = this.seconds - 1;
          this.countDownTimer();
        }, 1000);
      } else {
        this.seconds = "Отправить снова";
      }
    },
    sendSmsAgain() {
      axios
          .post(process.env.VUE_APP_API_URL + "api/auth/step-1", {
            code: this.selected.phoneCode,
            phone: this.phone,
          })
          .then((res) => {
            // // DELETE THIS BLOCK
            // this.login(res);
            // return;
            this.$emit("changeTitle", "Подтвердите телефон");
            this.showSms = true;
            this.countDownTimer();
          })
          .catch((err) => {
            if (err.response.status == 401) {
              this.larerrors = err.response.data.errors;
            }
          });
      this.seconds = 180;
    },
    submit() {
      if (!this.showSms) {
        this.$v.$touch();
        if (this.$v.phone.$invalid) {
          console.log("error");
        } else {
          this.sendSmsAgain();
        }
      } else {
        axios
            .post(process.env.VUE_APP_API_URL + "api/auth/step-2", {
              sms: this.sms,
              phone: this.phone,
              code: this.selected.phoneCode,
            })
            .then((res) => {
              this.login(res);
            })
            .catch((err) => {
              this.$store.commit("deleteAuthToken");
              if (err.response.status == 401 || err.response.status == 422) {
                this.larerrors = err.response.data.errors;
              }
            });
      }
    },
    login(res) {
      this.$store.commit("setAuthToken", res.data.token);
      sessionStorage.setItem("user-token", res.data.token);
      this.$router.push("/cinema").catch(() => {});
    },
  },
};
</script>

<style lang="scss" scoped>
.phone__country_code {
  display: flex;
}

.phone__country_code span {
  margin-top: 3px;
}


.phone {
  display: flex;
  flex-direction: column;
  align-items: center;

  .wrap {
    display: flex;
    position: relative;
    align-items: center;

    .select {
      span {
        display: flex;
        align-items: center;
        padding: 3px 10px 10px 10px;
        border-bottom: 1px solid #ffffff;
        cursor: pointer;
        margin-right: 15px;

        .rotate {
          transform: rotate(-180deg);
        }

        img {
          transition: 0.2s;
          margin-left: 7px;
        }
      }

      .options-wrap {
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
        padding-right: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
        background: #161616;

        .options {
          overflow-y: scroll;
          min-height: 200px;

          .option {
            padding: 5px 5px 5px 10px;
            cursor: pointer;
          }
        }
      }
    }

    .phone {
      position: relative;
      max-width: 255px;

      input {
        padding-left: 15px;
      }

      &:after {
        position: absolute;
        left: 0;
        top: 3px;
        color: #ffffff;
        font-family: "SemiBold";
        font-size: 18px;
      }
    }
  }

  input {
    padding: 3px 10px 10px 10px;
    border: 0;
    border-radius: 0;
    border-bottom: 1px solid #ffffff;
    background: transparent;
    max-width: 278px;
    outline: 0;
    position: relative;
  }

  .sms-wrap {
    margin-top: 22px;
    position: relative;

    .timer {
      position: absolute;
      top: 5px;
      right: 5px;
      font-size: 12px;
      cursor: pointer;
    }
  }

  .next {
    padding: 18px 25px;
    border: 1px solid #fff;
    outline: 0;
    font-size: 14px;
    background: transparent;
    transition: 0.2s;
    cursor: pointer;
    margin-top: 63px;

    &:disabled {
      border: 1px solid #999999;
      color: #999999;

      &:hover {
        border: 1px solid #999999;
        color: #999999;
        background: transparent;
      }
    }

    &:hover {
      background: #fff;
      color: #000;
    }
  }

  .why {
    margin-top: 48px;
    display: flex;
    justify-content: center;
    position: relative;
    width: 100%;

    button {
      position: absolute;
      top: 15px;
      right: 15px;
      background: transparent;
      outline: 0;
      border: 0;
    }

    span {
      text-decoration: underline;
      cursor: pointer;
      font-size: 12px;
    }

    &-modal {
      position: absolute;
      bottom: -30px;
      left: 50%;
      max-width: 281px;
      width: 100%;
      padding: 25px 33px;
      background: #0b0b0b;
      border: 0.5px solid #777777;

      h3 {
        font-size: 14px;
      }

      ul {
        list-style: none;

        h3 {
          font-size: 14px;
        }

        li {
          color: #ffffff;
          margin-top: 15px;
          font-size: 10px;
          font-family: "Regular";
          line-height: 18, 13px;

          a {
            color: #ffffff;
          }
        }
      }
    }
  }
}

@media (max-width: 600px) {
  .phone {
    .why {
      &-modal {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
      }
    }
  }
}

@media (max-width: 480px) {
  .phone {
    .wrap {
      max-width: 100% !important;
      width: 100% !important;

      .phone {
        max-width: 255px !important;
        width: 100% !important;
      }
    }

    .next {
      padding: 4px 25px;
    }
  }
}
</style>
