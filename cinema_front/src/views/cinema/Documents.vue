<template>
  <div class="documents-wrap bg-black">
    <Header />
    <div class="container">
      <arrow-back />
      <title-decor text="Отчеты и документы" :img="TitleIcon" />
      <div class="toggler">
        <h3 class="h3 text-white text-semi-bold">ЗАПРОСИТЬ:</h3>
        <div class="buttons">
          <button
            @click="currentTab = 'Finance'; showFormItem = false"
            class="p-xs text-gray text-semi-bold"
            :class="{active: currentTab === 'Finance'}"
          >
            Финансовый отчет
            <svg1 />
          </button>
          <button
            @click="currentTab = 'Agreement'; showFormItem = false"
            class="p-xs text-gray text-semi-bold"
            :class="{active: currentTab === 'Agreement'}"
          >
            Договор на размещение контента
            <svg2 />
          </button>
          <button
            @click="currentTab = 'Delete'; showFormItem = false"
            class="p-xs text-gray text-semi-bold"
            :class="{active: currentTab === 'Delete'}"
          >
            Заявление на ликвидацию контента
            <svg3 />
          </button>
          <button
            @click="currentTab = 'Other'; showFormItem = false"
            class="p-xs text-gray text-semi-bold"
            :class="{active: currentTab === 'Other'}"
          >
            Иной документ
            <svg4 />
          </button>
        </div>
      </div>
      <div class="row">
        <form @submit.prevent>
          <component :is="currentTab" @onRequest="requestHandler" />
          <div v-if="showFormItem" class="form-item">
            <div class="heading">
              <img src="@/assets/images/documents/pdf.svg" alt="Отчет по фильму " />
              <span class="text-white text-regular p-sm">
                {{title}}
                <span v-for="(film, idx) in films" :key="idx">{{film}},</span>
              </span>
            </div>
            <div class="buttons">
              <div class="email">
                <button class="p-sm text-semi-bold" @click="sendRequestNoMail">
                  <img src="@/assets/images/documents/mail.svg" />
                  Отправить на почту
                </button>
                <span class="text-regular">Файл отправится на почту, указанную при регистрации</span>
              </div>
              <button class="p-sm text-semi-bold">
                <img src="@/assets/images/documents/print.svg" />
                Распечатать
              </button>
            </div>
            <div class="input">
              <span class="p-sm text-white text-regular">Отправить на другую почту</span>
              <input
                v-model="$v.email.$model"
                type="text"
                class="p-xs text-white text-regular"
                placeholder="Введите электронный адрес"
              />
            </div>
            <div class="btn" @click="sendRequest">
              <Btn text="Отправить" fluid :disabled="$v.email.$error || !$v.email.$model" />
            </div>
          </div>

        </form>

      </div>
      <btn-group />
    </div>
    <div class="success_popup" v-show="success_message" >
      <div data-aos="zoom-in" class="success_message">
        <div class="close" >
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16" @click="closeSuccessMessage">
            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
          </svg>
        </div>
        <div class="message">
          Запрос успешно отправлен
        </div>
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#00ff14" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
          </svg>
        </div>
      </div>
    </div>
    <Footer />
    <div class="popup" v-show="open_popup">
      <div class="popup__inner">
        <div class="close__tab">
          <a data-v-48c0f090="" data-v-3b7b8014="" class="text-white text-regular arrow-back arrow_back_popup" @click="back"><img data-v-48c0f090="" src="/img/arrow_back.c4e48feb.svg" alt="Назад"> Вернуться назад </a>
        </div>
        <div class="text">
          <p>Зарегиструйтесь и оформите документы</p>
        </div>

      </div>
    </div>

  </div>
</template>

<script>
import BtnGroup from "@/components/BtnGroup";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";
import TitleDecor from "@/components/TitleDecor";
import Finance from "@/components/documents/Finance";
import Agreement from "@/components/documents/Agreement";
import Delete from "@/components/documents/Delete";
import Other from "@/components/documents/Other";
import Btn from "@/components/Btn";

import { required, email } from "vuelidate/lib/validators";

import svg1 from "@/assets/images/documents/report.vue";
import svg2 from "@/assets/images/documents/agreement.vue";
import svg3 from "@/assets/images/documents/delete.vue";
import svg4 from "@/assets/images/documents/other.vue";

import TitleIcon from "@/assets/images/for-holders-page/carousel/item4.svg";
import axios from "axios";

export default {
  data: () => ({
    open_popup: false,
    success_message: false,
    currentTab: "Finance",
    films: [],
    email: null,
    showFormItem: false,
    title: "",
    TitleIcon,
  }),
  components: {
    BtnGroup,
    Header,
    Footer,
    Btn,
    ArrowBack,
    TitleDecor,
    Finance,
    Agreement,
    Delete,
    Other,
    svg1,
    svg2,
    svg3,
    svg4,
  },
  validations: {
    email: {
      required,
      email,
    },
  },
  methods: {
    requestHandler(films, title) {
      this.films = films;
      this.title = title;
      this.showFormItem = true;
    },
    closeSuccessMessage(){
      this.success_message = false
    },
    back(){
      this.$router.back()
    },
    sendRequest(){
      axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/documents/send', {
        'films': this.films,
        'tab': this.currentTab,
        'email': this.email
      }).then((res) => {
        if(res.data.success){
          this.success_message = true
        }
      })
    },
    sendRequestNoMail(){
      axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/documents/send', {
        'films': this.films,
        'tab': this.currentTab,
      }).then((res) => {
        if(res.data.success){
          this.success_message = true
        }
      })
    }
  },
  // mounted() {
  //   axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/documents').then((res) => {
  //     if (res.data.NotVerifiedDocuments) {
  //       this.open_popup = true
  //     }
  //   })
  // }
};
</script>

<style lang="scss" scoped>
.success_popup{
  position: absolute;
  width: 100vw;
  height: 100vh;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  //background-color: #363636;
  opacity: .8;
  padding: 20px 40px;
  transition-delay: 2s;
  transition-timing-function: ease-in-out;
  transition-duration: 2s;
}
.success_message{
  padding: 20px 40px;
  background-color: grey;
  opacity: .8;
  font-size: 24px;
  border-radius: 10px;
}
.success_message .close{
  text-align: right;
}
.success_message .icon{
  margin-top: 15px;
  text-align: center;
}
.success_message .close svg{
  cursor: pointer;
}
.popup{
  position: absolute;
  width: 100%;
  height: 150%;
  top: 0;
  background-color: rgba(174, 171, 172, 0.8);
  display: flex;
  justify-content: center;
  //align-items: center;
  overflow-scrolling: unset;
}

.popup__inner{
  position: fixed;
  width: 50%;
  top: 200px;
  //height: aut;
  background-color: rgba(124, 123, 124, 0.8);

}
.arrow_back_popup{
  position: static;
  padding: 15px;
  color:black;
}
.popup__inner .text{
  text-align: center;
  padding: 30px;
  padding-bottom:60px;
  font-size: 24px;
  font-family: "Medium-italic";
}
.documents-wrap {
  .container {
    position: relative;
    padding: 90px 15px 120px 15px;

    .toggler {
      margin-top: 66px;
      overflow-y: hidden;
      .buttons {
        margin-top: 20px;
        display: flex;
        overflow-x: scroll;
        padding-bottom: 28px;

        button {
          background: transparent;
          border: 1px solid #7c7c7c;
          display: flex;
          align-items: center;
          padding: 17px 23px;
          cursor: pointer;
          white-space: nowrap;
          transition: 0.2s;
          svg {
            margin-left: 10px;
            fill: #7c7c7c;
            transition: 0.2s;
          }
        }
        .active {
          color: #ffffff;
          border: 1px solid #ffffff;
          svg {
            fill: #d8004e !important;
          }
        }
      }
    }
    .row {
      display: flex;
      justify-content: center;
      margin-top: 40px;
      form {
        background: #212121;
        padding: 50px 67px;
        border-radius: 22px;
        max-width: 870px;
        width: 100%;
        .form-item {
          margin-top: 46px;
          padding-top: 46px;
          border-top: 1px solid #7c7c7c;
          .heading {
            display: flex;
            align-items: center;
            img {
              margin-right: 10px;
            }
            span {
              text-decoration: underline;
            }
          }
          .buttons {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            .email {
              display: flex;
              align-items: center;
              span {
                margin-left: 15px;
                max-width: 256px;
                width: 100%;
                color: #828282;
                font-size: 12px;
              }
            }
            button {
              padding: 16px;
              border: 3px solid #27ae60;
              border-radius: 10px;
              color: #27ae60;
              background: transparent;
              display: flex;
              align-items: center;
              transition: 0.2s;
              &:hover {
                color: #ffffff;
                border: 3px solid #ffffff;
                img {
                  filter: brightness(1000%) !important;
                }
              }
              img {
                margin-right: 10px;
                transition: 0.2s;
              }
            }
          }
          .input {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            input {
              margin-top: 15px;
              background: transparent;
              border: 1px solid #ffffff;
              outline: 0;
              border-radius: 10px;
              height: 35px;
              width: 100%;
              padding: 0 15px;
            }
          }
          .btn {
            margin-top: 50px;
          }
        }
      }
    }
  }
}

@media (max-width: 834px) {
  .documents-wrap {
    .container {
      padding: 87px 15px 81px 15px;
    }
    form {
      .form-item {
        margin-top: 46px;
        padding-top: 46px;
        border-top: 1px solid #7c7c7c;
        .heading {
          display: flex;
          align-items: center;
          img {
            margin-right: 10px;
          }
          span {
            text-decoration: underline;
          }
        }
        .buttons {
          align-items: flex-start !important;

          .email {
            flex-wrap: wrap;
            span {
              margin-left: 0 !important;
              padding-left: 0 !important;
              margin-top: 15px;
            }
          }
          button {
            padding: 10px 0;
            width: calc(100% - 10px);
            text-align: center;
            justify-content: center;
            img {
              margin-right: 5px !important;
              // width: 18px;
            }
          }
        }
        .input {
          margin-top: 35px;
        }
        .btn {
          margin-top: 35px;
        }
      }
    }
  }
}

@media (max-width: 480px) {
  .documents-wrap {
    .container {
      padding: 48px 15px 25px 15px;
      .toggler {
        margin-top: 48px;
        .buttons {
          button {
            font-size: 12px !important;
            padding: 10px;
          }
        }
      }
      .row {
        form {
          padding: 23px 23px 35px 23px;
          .form-item {
            margin-top: 30px;
            padding-top: 30px;
            .buttons {
              flex-direction: column;
              margin-top: 30px;
              .email {
                margin-bottom: 15px;
              }
              button {
                padding: 7px;
                border: 1px solid #27ae60;
                font-size: 14px !important;
              }
            }
            .input {
              margin-top: 30px;
            }
          }
        }
      }
    }
  }
}
</style>