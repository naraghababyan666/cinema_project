<template>
  <div class="cab-wrap text-white">
    <div class="buttons">
      <button
          class="cabinetBtn"
        @click="currentView = 'createSession'"
        :class="{ disabled: currentView != 'createSession' }"
      >
        <span>Создать сеанс</span>
        <img :src="roundPlusIcon" alt="" />
      </button>
      <button
          class="cabinetBtn"
        @click="currentView = 'lastSessions'"
        :class="{ disabled: currentView != 'lastSessions' }"
      >
        <span>Прошлые сеансы</span>
        <img :src="LastSessionIcon" alt="" />
      </button>
      <button
          class="cabinetBtn"
        @click="currentView = 'currentSession'"
        :class="{ disabled: currentView != 'currentSession' }"
      >
        <span>Действующий сеанс</span>
        <img :src="CurrentSessionIcon" alt="" />
      </button>
    </div>
    <div class="form">
      <create-session v-if="currentView == 'createSession'" @changeCurrentView="changeCurrentView" />
      <current-session v-if="currentView == 'currentSession'" />
      <last-sessions v-if="currentView == 'lastSessions'" />
    </div>
  </div>
</template>

<script>
import RoundPlusIcon from "@/assets/images/common/add_circle_white.svg"; //icon for ADD_SESSION
import LastSessionIcon from "@/assets/images/cabinet/last_session.svg";
import CurrentSessionIcon from "@/assets/images/cabinet/current_session.svg";

import CreateSession from "@/components/dashboard/createSession";
import CurrentSession from "@/components/dashboard/currentSession";
import LastSessions from "@/components/dashboard/lastSessions";


export default {
  name: "Cabinet",
  components: { CreateSession, CurrentSession, LastSessions },
  data() {
    return {
      currentView: "createSession",
      roundPlusIcon: RoundPlusIcon,
      LastSessionIcon,
      CurrentSessionIcon,
    };
  },
  methods:{
    changeCurrentView(currentView) {
       this.$emit("changeCurrentView", currentView);
    },
  }
};
</script>

<style lang="scss" scoped>
.cabinetBtn{
  cursor: pointer;
}
.chat{
  position: fixed;
  z-index: 100;
  width: 400px;
  height: 400px;
  bottom: 50px;
  right: 50px;
}
.cab-wrap {
  max-width: 539px;
  width: auto;
  margin: 140px auto 45px auto;
  .buttons {
    display: flex;
    border-radius: 5px  ;
    overflow: hidden;
    button {
      color: #ffffff;
      font-family: "Medium";
      width: 33.3%;
      padding: 11px;
      background: #5c5e5d;
      border: 0;
      outline: 0;
      font-size: 14px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      transition: 0.2s;
      span {
        letter-spacing: 0.02em;
      }
      &:hover {
        text-decoration: underline;
      }
      &:nth-child(2) {
        border-right: 1px solid #5c5e5d;
        border-left: 1px solid #5c5e5d;
      }
      &:nth-child(2),
      &:nth-child(3) {
        img {
          display: none;
        }
      }
      img {
        margin-left: 7px;
      }
    }
    .disabled {
      font-family: "Regular";
      background: #333333;
      color: rgba(255, 255, 255, 0.4);
      img {
        filter: brightness(40%);
      }
    }
  }
  .form {
    background: #191919;
    padding: 41px 25px 50px 50px;
    border-radius: 20px;
    margin-top: 15px;
  }
}

@media screen and (max-width: 1024px) {
  .cab-wrap {
    margin: 75px auto 45px auto;
  }
}

@media screen and (max-width: 630px) {
  .cab-wrap .form {
    background: transparent;
    padding: 41px 0 0 0;
  }
}

@media screen and (max-width: 630px) {
  .cab-wrap {
    .buttons {
      
      button {
        padding: 5px !important;
        height: 35px;
        display: flex;
        justify-content: center;
        flex-direction: row-reverse;
        width: 100%;
        &:hover {
          text-decoration: none;
        }
        span {
          display: block !important;
          font-size: 12px;
          margin-left: 8px;
        }
        img {
          display: block !important;
          width: 20px;
          height: 20px;
          margin-left: 0;
        }
      }
      .disabled {
        width: 45px !important;
        span {
          display: none !important;
        }
        img {
          filter: brightness(100%);
        }
      }
    }
    .form {
      border-radius: 0;
      border-top: 1px solid #474747;
      padding-top: 26px;
      margin-top: 25px;
    }
  }
}
</style>