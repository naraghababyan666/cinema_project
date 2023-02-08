<template>
  <form @submit.prevent class="email">
    <div class="wrap">
      <div class="phone">
        <input
          v-model="$v.email.$model"
          type="email"
          :disabled="showSms"
          placeholder="email"
          class="phone text-white text-semi-bold h3"
        />
        <small class="error" v-if="larerrors.login">
          <i>{{ larerrors.login }}</i>
        </small>
      </div>
    </div>

    <div class="sms-wrap" v-if="showSms">
      <input
        v-model="$v.password.$model"
        placeholder="email-код"
        type="tel"
        class="sms text-white text-semi-bold h3"
      />
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
    <small class="error" v-if="larerrors.password">
        <i>{{ larerrors.password }}</i>
      </small>
    <button
      @click="submit"
      :disabled="$v.email.$error"
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
            <li>1. Адрес электронной почты введён неверно</li>
            <li>
              2. Вы не изменили в личном кабинете адрес почты на новый, и мы
              отправили код на старый. Обратитесь в службу поддержки через
              электронную почту
              <a href="mailto:support@extrafintech.com"
                >support@extrafintech.com</a
              >
              или позвоните по номеру
              <a href="tel:+79951317777">+7 995 131 77 77</a>
            </li>
            <li>
              3. Проблемы могут быть со стороны вашего почтового сервиса.
              Проверьте папку “спам” или обратитесь в их службу поддержки
            </li>
          </ul>
        </div>
      </transition>
    </div>
  </form>
</template>

<script>
import {
  required,
  minLength,
  maxLength,
  email,
  numeric,
} from "vuelidate/lib/validators";
import axios from "axios";

export default {
  data: () => ({
    email: null,
    password: null,
    showSms: false,
    seconds: 180,
    showModal: false,
    larerrors: "",
  }),
  validations: {
    email: {
      required,
      email,
    },
    password: {
      required,
      numeric,
      minLength: minLength(5),
      maxLength: maxLength(7),
    },
  },
  methods: {
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
          email: this.email,
        })
        .then((res) => {
          if(res.data.message){
            this.$emit("changeTitle", "Подтвердите Эл. адрес");
            this.showSms = true;
            this.countDownTimer();
            this.larerrors = '';
          }
        })
        .catch((err) => {
          if ( err.response.status == 401) {
            this.$emit("registration");
          }else if(err.response.status == 422){
            this.larerrors = err.response.data.errors;
          }
        });
      this.seconds = 180;
    },
    submit() {
      if (!this.showSms) {
        this.$v.$touch();
        if (this.$v.email.$invalid) {
          console.log("error");
        } else {
          this.sendSmsAgain();
        }
      } else {
        axios
          .post(process.env.VUE_APP_API_URL + "api/auth/step-2", {
            password: this.password,
            email: this.email,
          })
          .then((res) => {
            localStorage.setItem('access_token', res.data.access_token)
            // this.login(res);
            this.$router.push("/cinema").catch(() => {});
            this.larerrors = '';
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
      this.$router.push("/cinema").catch(() => {});
    },
  },
};
</script>

<style lang="scss" scoped>
.error{
  color: #d7004d;
  margin: 10px;
}
.email {
  display: flex;
  flex-direction: column;
  align-items: center;
  .wrap {
    display: flex;
    position: relative;
    align-items: center;
    .phone {
      max-width: 255px;
    }
  }
  input {
    -webkit-appearance: none;
    padding: 3px 10px 10px 10px;
    border: 0;
    border-bottom: 1px solid #ffffff;
    border-radius: 0;
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
  .email {
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
  .email {
    .wrap {
      max-width: 100% !important;
      width: 100% !important;

      .phone {
        max-width: 100% !important;
        width: 100% !important;
      }
    }
    .next {
      padding: 4px 25px;
    }
  }
}
</style>
