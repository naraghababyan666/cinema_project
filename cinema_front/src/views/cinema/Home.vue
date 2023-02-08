<template>
  <div>
    <div class="preload bg-black" :class="{ 'preload-hide': loaded }">
      <Preload />
    </div>
    <Header />
    <section class="wrap bg-black">
      <div class="container">
        <div class="row">
          <h1 class="text-white text-semi-bold">
            ExtraCinema!
            <p class="text-medium-italic">— Опережая будущее</p>
          </h1>
          <div class="card">
            <img
              src="../../assets/images/cinema-home-page/cinema.svg"
              alt="Для зрителей"
            />
            <h2 class="text-white text-medium">Для зрителей</h2>
            <div class="buttons">
              <router-link :to="{ name: 'dashboard' }" class="btn text-white text-medium"
                >Фильмы онлайн
                <img
                  src="../../assets/images/cinema-home-page/youtube.svg"
                  alt="."
              /></router-link>
              <router-link :to="{ name: 'ec-ticket-films'}" class="btn text-white text-medium"
                >Билет в кинотеатр
                <img
                  src="../../assets/images/cinema-home-page/film.svg"
                  alt="."
              /></router-link>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <img
              src="../../assets/images/cinema-home-page/forCinema.svg"
              alt="Для зрителей"
            />
            <h2 class="text-white text-medium">Для кинозала</h2>
            <div class="buttons" @click="checkDocuments">
              <div
                class="btn text-white text-medium"
                >Перейти
                <img
                  src="../../assets/images/cinema-home-page/arrow.svg"
                  alt="."
              /></div>
            </div>
            <p v-show="cinemaErrorShow" style="color:red; margin-top: 10px; font-size: 14px;">{{cinemaError}}</p>
          </div>
          <div class="card">
            <img
              src="../../assets/images/cinema-home-page/forMakers.svg"
              alt="Для зрителей"
            />
            <h2 class="text-white text-medium ss">Для производителей контента</h2>
            <div class="buttons">
              <div
                  @click="checkRole"
                class="btn text-white text-medium"
                >Перейти
                <img
                  src="../../assets/images/cinema-home-page/arrow.svg"
                  alt="."
              /></div>
            </div>
            <p v-show="HolderErrorShow" style="color:red; margin-top: 10px; font-size: 14px;">{{HolderError}}</p>
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Preload from "@/views/cinema/Preload";
import axios from "axios";

export default {
  name: "ec-home",
  components: { Header, Footer, Preload },
  data() {
    return {
      loaded: false,
      cinemaError: '',
      cinemaErrorShow: false,
      HolderError: '',
      HolderErrorShow: false,
    };
  },
  mounted() {
    if (localStorage.getItem('reloaded')) {
      localStorage.removeItem('reloaded');
    } else {
      localStorage.setItem('reloaded', '1');
      location.reload();
    }
    document.title = "Extra Cinema | Главная";
    setTimeout(() => {
      this.loaded = true;
    }, 2500);
  },
  methods: {
    checkDocuments(){
      axios.post(process.env.VUE_APP_API_URL + 'api/cinema/for-dashboard/documentCheck').then((res) => {
        if(res.data == 'success'){
          axios.post(process.env.VUE_APP_API_URL + 'api/cinema/for-halls/documentCheck').then((res) => {
            if(res.data[0] == 'checkedDocument'){
              this.$router.push('/cinema/dashboard')
            }else{
              this.$router.push('/cinema/for-halls')
            }
          })
        }else{
          this.cinemaErrorShow = true
          this.cinemaError = ' У вас нет аккаунта кинотеатра'
        }
      })

    },
    checkRole(){
      axios.post(process.env.VUE_APP_API_URL + "api/cinema/forHolders/checkRole")
          .then((res) => {
        if(res.data == 'success'){
          axios.post(process.env.VUE_APP_API_URL + "api/cinema/forHolders/checkDocuments").then((res) => {
            if(res.data[0] == 'checkedDocument'){
              this.$router.push('/cinema/forHolders')
            }else{
              this.$router.push('/cinema/forHolders/check')
            }
          })
        }else{
          this.HolderError = 'Вы не правообладатель'
          this.HolderErrorShow = true
        }
      })
    }
  }
};
</script>

<style lang="scss" scoped>
.preload {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 101;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  transition: 0.5s;
  img {
    width: 119px;
    height: 88px;
  }
  span {
    margin-top: 35px;
    font-size: 45px;
  }
}
.preload-hide {
  opacity: 0;
  z-index: -100;
}
.wrap {
  padding: 90px 0 80px 0;
  .container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    .row {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
      flex-wrap: wrap;

      &:nth-child(2) {
        margin-top: 21px;
        .card .buttons .btn {
          padding: 14px 16px 14px 89px;
          cursor: pointer;
          img {
            margin-left: 56px;
          }
        }
      }
      h1 {
        font-size: 72px;
        max-width: 500px;
        width: 100%;
        letter-spacing: normal;
        p {
          font-size: 20px;
        }
      }
      .card {
        background: #181818;
        border-radius: 10px;
        padding: 41px 29px;
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: calc(50% - 10.5px);
        width: 100%;
        &:hover {
          padding: 40px 28px;
          border: 1px solid #fff;
          animation: hover 0.2s ease-in-out forwards;
        }

        img {
          width: 50px;
          height: 50px;
        }
        h2 {
          font-size: 24px;
          margin-top: 13px;
        }
        .buttons {
          display: flex;
          margin-top: 45px;
          .btn {
            padding: 14px 16px 14px 52px;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            border: 1px solid #ffffff;
            &,
            & * {
              transition: 0.2s;
            }
            &:hover {
              background: #ffffff;
              color: #000000;
              img {
                filter: brightness(20%);
              }
            }
            img {
              width: 18px;
              height: 18px;
              margin-left: 19px;
            }
          }
        }
      }
    }
  }
}
@keyframes hover {
  from {
    background: #181818;
  }
  to {
    background: #000;
  }
}
@media screen and (max-width: 1111px) {
  .container {
    .row {
      h1 {
        font-size: 62px !important;
        max-width: 500px;
        width: 100%;
        p {
          font-size: 20px;
        }
      }
      .card {
        padding: 41px 15px !important;
        max-width: calc(49% - 10.5px) !important;

        .buttons {
          .btn {
            padding: 14px 16px 14px 14px !important;
          }
        }
      }
      &:nth-child(2) {
        .card {
          .buttons {
            .btn {
              padding: 14px 16px 14px 89px !important;
            }
          }
        }
      }
    }
  }
}
@media screen and (max-width: 990px) {
  .container {
    flex-direction: column-reverse;
    .row {
      h1 {
        display: none;
      }
      &:nth-child(1) {
        margin-top: 40px;
      }
    }
  }
}
@media screen and (max-width: 910px) {
  .wrap {
    padding: 25px 0 25px 0;
    .container {
      flex-direction: column;
      .row {
        flex-direction: column;
        &:nth-child(2) {
          .card:nth-child(2) {
            margin-bottom: 0;
          }
        }
        .card {
          margin-bottom: 20px;
          background-color: transparent;
          max-width: 502px !important;
          width: 100%;
          &:hover {
            border: 0;
          }
          h2 {
            position: relative;
            &::before,
            &::after {
              content: "";
              position: absolute;
              width: 100%;
              height: 1px;
              background: #777777;
            }
            &::before {
              left: calc(-100% - 30px);
              top: calc(50% - 1px);
            }
            &::after {
              right: calc(-100% - 30px);
              top: calc(50% - 1px);
            }
          }
        }
      }
    }
  }
}
@media screen and (max-width: 480px) {
  .wrap {
    padding: 30px 0 45px 0;
    .container {
      .row {
        margin-top: 0 !important;

        &:nth-child(2) {
          .card:nth-child(2) {
            border: 0;
          }
        }
        .card {
          margin-bottom: 0;
          border-bottom: 1px solid #777777;
          border-radius: 0;
          &:hover {
            border: 0;
          }
          h2 {
            text-align: center;
            font-size: 16px;
            font-family: "Regular" !important;
            &::before,
            &::after {
              display: none;
            }
          }
          .buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: calc(100vw - 30px);
            .btn {
              padding: 6px 10px !important;
              font-size: 14px;
              // width: 170px !important;
              display: flex;
              justify-content: center;
              img {
                display: none;
              }
            }
          }
        }
      }
    }
  }
}
@media screen and (max-width: 345px) {
  .btn {
    font-size: 12px !important;
  }
}
</style>
