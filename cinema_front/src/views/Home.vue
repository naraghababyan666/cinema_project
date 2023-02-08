<template>
  <div>
    <div class="home-view bg-black">
      <div class="container">
        <h1 class="text-medium-italic">
          <span class="text-semi-bold">
            <img src="../assets/images/logo.svg" alt="" />
            Extra
          </span>
          <span>—</span>
          <span class="text-regular-italic">Опережая будущее</span>
        </h1>
        <div class="round" :class="{ round_active: loaded }">
          <router-link to="/" class="text-medium text-white"
            >ExtraTrade</router-link
          >
          <router-link to="/" class="text-medium text-white"
            >ExtraFinTach</router-link
          >
          <router-link to="/" class="text-medium text-white"
            >CashFree</router-link
          >
          <router-link :to="{ name: 'ec-home' }" class="text-medium text-white"
            >ExtraCinema</router-link
          >
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Footer from "@/components/Footer";
export default {
  name: "Home",
  components: { Footer },
  data() {
    return {
      loaded: false,
    };
  },
  mounted() {
    document.title = "Extra | Главная";
    setTimeout(() => (this.loaded = true), 500);
  },
};
</script>

<style lang="scss" scoped>
.home-view {
  background-image: url("../assets/images/home-page/bg.svg");
  background-repeat: no-repeat;
  background-position: center top;
  .container {
    padding: 50px 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    h1 {
      display: flex;
      align-items: center;
      text-align: center;
      color: #ffffff;
      span {
        display: flex;
        align-items: center;
        &:nth-child(1) {
          font-size: 32px;
        }
        &:nth-child(3) {
          font-size: 28px;
        }
        &:nth-child(2) {
          margin: 0 10px;
        }
        img {
          width: 55px;
          height: 41px;
          margin-left: 38px;
        }
      }
    }
    .round {
      width: 548px;
      height: 548px;
      background: url("../assets/images/home-page/round.svg") no-repeat center;
      background-size: contain;
      margin-top: 50px;
      border-radius: 50%;
      position: relative;
      opacity: 0;
      transform: scale(0.8) rotate(-360deg);
      transition: 1.2s;
      &_active {
        transform: scale(1.3) rotate(0);
        opacity: 1;
      }
      a {
        text-decoration: none;
        font-size: 18px;
        position: absolute;
        &:hover {
          text-decoration: underline;
        }
        &:nth-child(1) {
          top: calc(50% - 22px - 50px);
          left: calc(50% - 98px - 30px);
        }
        &:nth-child(2) {
          top: calc(50% - 22px - 50px);
          right: calc(50% - 119px - 30px);
        }
        &:nth-child(3) {
          bottom: calc(50% - 22px - 50px);
          left: calc(50% - 85px - 30px);
        }
        &:nth-child(4) {
          bottom: calc(50% - 22px - 50px);
          right: calc(50% - 118px - 30px);
        }
      }
    }
  }
}
@media screen and (max-width: 834px) {
  .home-view {
    min-height: calc(100vh - 40px);
    display: flex;
    align-items: center;
    background-position: center;
    .container {
      padding: 40px 15px 0 15px;
    }
  }
}
@media screen and (max-width: 620px) {
  .home-view {
    background-size: cover;
    background-position: center;
    .container {
      h1 {
        span {
          display: flex;
          align-items: center;
          &:nth-child(1) {
            font-size: 28px;
          }
          &:nth-child(3) {
            font-size: 23px;
          }
          &:nth-child(2) {
            margin: 0 10px;
          }
          img {
            width: 55px;
            height: 41px;
            margin-left: 0;
          }
        }
      }
      .round_active {
        transform: scale(1) rotate(0);
      }
    }
  }
}
@media screen and (max-width: 480px) {
  .home-view {
    background-position: center;
    background-size: 300% 200%;
    height: 100vh;
    .container {
      padding: 40px 15px 0 15px;

      h1 {
        span {
          display: flex;
          align-items: center;
          &:nth-child(1) {
            font-size: 32px;
          }
          &:nth-child(3) {
            font-size: 14px;
          }
          &:nth-child(2) {
            margin: 0 10px;
          }
        }
      }
      .round_active {
        transform: scale(1) rotate(0);
      }
    }
  }
}
@media screen and (max-width: 480px) {
  .home-view {
    background-size: 250% 50%;
    .container {
      h1 {
        position: absolute;
        top: 25px;
        span:nth-child(1) {
          font-size: 32px !important;
        }
      }
      .round_active {
        transform: scale(0.9) rotate(0);
        margin-top: -20px;
        a {
          transform: scale(1.2);
        }
      }
    }
  }
}
@media screen and (max-width: 375px) {
  @media screen and (max-width: 480px) {
    .home-view {
      background-size: 250% 200%;
      .container {
        h1 {
          display: flex;
          flex-wrap: wrap;
          text-align: center;
          justify-content: center;
          align-items: center;
          span:nth-child(1) {
            font-size: 25px !important;
          }
          span:nth-child(2) {
            transform: scaleX(0.5);
            margin: 0;
          }
        }
        .round_active {
          transform: scale(0.7) rotate(0);
          a {
            transform: scale(1.2);
          }
        }
      }
    }
  }
}
</style>
