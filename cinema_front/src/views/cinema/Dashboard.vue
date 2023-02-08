<template>
  <div>
    <Header fluid />
    <div v-if="waitToCheck">
      <div class="close__tab">
        <arrow-back class="arrow-back" />
      </div>
      <div class="waitDoc">
        <p>Ваша форма на проверке. ExtraCinema свяжется с вами в течение 12 часов</p>
      </div>
    </div>
    <div v-else class="dashboard bg-black">
      <Sidebar v-if="toggleSideBar" @sidebarClick="toggleView"  />
      <section class="wrap">
        <div class="container">
          <arrow-back class="arrow" />
          <Cabinet v-if="currentView == 'cabinet'" @changeCurrentView="toggleView"/>
          <Company v-if="currentView == 'company'" />
          <Projector v-if="currentView == 'projector'" />
          <my-halls
            v-if="currentView == 'myHalls'"
            @onEdit="currentView = 'company'"
          />
          <start-session v-if="currentView == 'startSession'" />
          <Documents v-if="currentView == 'documents'" />
          <Persons
            v-if="currentView == 'persons'"
            @onEdit="currentView = 'company'"
          />
          <Payment v-if="currentView == 'payment'" />
          <Rating v-if="currentView == 'rating'" />
          <Advertising v-if="currentView == 'advertising'" />
        </div>
        <div class="row">
          <router-link
              :to="{ name: 'order-equipment' }"
              class="link text-white text-semi-bold"
          >
            <div class="btn-decor">
              <img
                  src="../../assets/images/cinema-for-halls-page/order_icon.svg"
                  alt="Заказать"
              />
            </div>
            <span class="btn-text">Заказать оборудование для кинозала</span>
          </router-link>
          <div class="link" @click="openSupport">
            <div class="btn-decor">
              <img
                  src="../../assets/images/cinema-for-halls-page/settings_icon.svg"
                  alt="Служба поддержки"
              />
            </div>
            <div class="btn-text text-white text-semi-bold">
              Служба поддержки
            </div>
          </div>
        </div>
      </section>
    </div>
<!--    <ECChat class="chat" v-show="chatOpen" @CloseChat="CloseChat"/>-->
    <Support v-show="supportOpen" @closeChat="closeChat"/>

    <Footer fluid />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Sidebar from "@/components/Sidebar";
import ArrowBack from "@/components/ArrowBack";
import Cabinet from "@/components/dashboard/Cabinet";
import Company from "@/components/dashboard/Company";
import Projector from "@/components/dashboard/Projector";
import Advertising from "../../components/dashboard/Advertising";
import MyHalls from "@/components/dashboard/MyHalls";
import StartSession from "@/components/dashboard/StartSession";
import Documents from "@/components/dashboard/Documents";
import Persons from "@/components/dashboard/Persons";
import Payment from "@/components/dashboard/Payment";
import Rating from "@/views/cinema/Rating";
import Support from "@/components/support/Index";
import axios from "axios";
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default {
  name: "Dashboard",
  components: {
    Payment,
    Header,
    Footer,
    Sidebar,
    ArrowBack,
    Cabinet,
    Company,
    Projector,
    Advertising,
    MyHalls,
    StartSession,
    Documents,
    Persons,
    Support,
    Rating
  },
  data() {
    return {
      currentView: "company",
      waitToCheck: false,
      toggleSideBar: true,
      supportOpen: false,
    };
  },
  methods: {
    toggleView(view) {
      this.currentView = view;
    },
    openSupport(){
      this.supportOpen = true
    },

    back(){
      this.$router.back()
    },
    closeChat($item){
      this.supportOpen = $item
    }
  },
  mounted() {
    document.title = "Extra Cinema | Кабинет";
    axios.post(process.env.VUE_APP_API_URL + "api/checkDocuments").then((res) => {
      if(res.data[0] == 'noDocument'){
        this.toggleSideBar = false
        this.currentView = 'company'
      }else if(res.data[0] == 'waitToCheck'){
        this.waitToCheck = true
        this.toggleSideBar = false
      }else if(res.data[0] == 'checkedDocument' ){
        this.toggleSideBar = true
        this.waitToCheck = false
        this.currentView = 'cabinet'
      }
    })
  },

};
</script>

<style lang="scss" scoped>
.arrow-back{
  position: relative;
  padding: 0px 20px;
}
.waitDoc{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 100px 20px ;
  color: white;
  font-size: 20px;
}
.chat{
  position: fixed;
  z-index: 100;
  width: 400px !important;
  height: 400px !important;
  bottom: 50px;
  right: 50px;
}
.dashboard {
  display: flex;
  align-items: flex-start;
  width: 100%;
  min-height: calc(100vh - 240px);
  height: 100%;
  overflow: hidden;
  .wrap {
    position: relative;
    max-width: 100%;
    width: 100%;
    height: 100%;
    transition: 0.3s;
    // border-left: 1px solid #777777;
    height: 100%;
    .container {
      max-width: 1150px;
      .arrow {
        left: 15px;
        top: 15px;
      }
    }
  }
}
.wrap {
  .row {
    display: flex;
    justify-content: space-between;
    padding: 0 10% 5% 10%;
    .link {
      max-width: calc(50% - 10.5px);
      width: 50%;
      height: 86px;
      display: flex;
      align-items: center;
      background: #27ae60;
      border-radius: 10px;
      text-decoration: none;
      transition: 0.2s;
      cursor: pointer;

      &:hover {
        background: #279e48;

        .btn-decor {
          background: #ffffff;

          img {
            filter: brightness(0%);
          }
        }
      }

      .btn-decor {
        border-radius: 10px;
        background: #444444;
        box-shadow: 10px 13px 25px rgba(0, 0, 0, 0.26);
        height: 86px;
        width: 86px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.2s;

        img {
          transition: 0.2s;
        }
      }

      .btn-text {
        width: calc(100% - 86px);
        text-align: center;
        font-size: 18px;
      }
    }
  }
}
</style>