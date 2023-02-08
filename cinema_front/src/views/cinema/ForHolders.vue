<template>
  <div>
    <Header />
    <div class="wrap bg-black">
      <arrow-back class="arrow-back"/>
      <div v-if="waitToCheck" class="waitDocParent">
        <div class="waitDoc">
          <p>Ваша форма на проверке. ExtraCinema свяжется с вами в течение 12 часов</p>
        </div>
      </div>
      <div v-else class="container">
        <h1 class="text-white text-semi-bold">Для правообладателей контента</h1>
        <div class="links">
          <router-link :to="{name: 'ec-test-cinema'}">
            <img :src="CinemasIcon" alt="" />
            <h3 class="text-white text-semi-bold">Кинотеатры</h3>
          </router-link>
          <router-link :to="{name: 'ec-test-online-platform'}">
            <img :src="OnlinePlatformIcon" alt="" />
            <h3 class="text-white text-semi-bold">Онлайн платформа</h3>
          </router-link>
        </div>
        <for-holders-carousel />
        <div class="buttons">
          <router-link :to="{name: 'ec-upload'}" class="link text-white text-semi-bold">
            <div class="btn-decor">
              <img :src="UploadContentIcon" alt="Заказать" />
            </div>
            <span class="btn-text">Загрузить новый контент</span>
          </router-link>
          <router-link to="" class="link">
            <div class="btn-decor">
              <img :src="SettingsIcon" alt="Служба поддержки" />
            </div>
            <div class="btn-text text-white text-semi-bold">
              Служба поддержки
            </div>
          </router-link>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";
import CinemasIcon from "@/assets/images/for-holders-page/cinemas.svg";
import OnlinePlatformIcon from "@/assets/images/for-holders-page/online-platform.svg";
import UploadContentIcon from "@/assets/images/for-holders-page/upload-content.svg";
import SettingsIcon from "@/assets/images/cinema-for-halls-page/settings_icon.svg";
import ForHoldersCarousel from "@/components/carousels/ForHoldersCarousel";
import axios from "axios";
export default {
  components: { Header, Footer, ArrowBack, ForHoldersCarousel },
  data() {
    return {
      CinemasIcon,
      OnlinePlatformIcon,
      UploadContentIcon,
      SettingsIcon,
      waitToCheck: false
    }
  },
  mounted() {
    axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/checkDocuments').then((res) => {
      console.log(res.data)
      if(res.data[0] == 'noDocument'){
        this.$router.push('/cinema/forHolders/check')
      }else if(res.data[0] == 'waitToCheck'){
        this.waitToCheck = true
      }else if(res.data[0] == 'checkedDocument' ){
        this.waitToCheck = false
      }
    })
  }
};
</script>

<style lang="scss" scoped>
.arrow-back{
    position: relative;
    padding: 10px 40px;
}
.waitDocParent{
  width: 100%;
  min-height: 50vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.waitDoc{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 100px 20px ;
  color: white;
  font-size: 20px;
}
.wrap {
  .container {
    position: relative;
    padding: 30px 0 76px 0;
    h1 {
      text-align: center;
    }
    .links {
      display: flex;
      justify-content: center;
      margin-top: 50px;
      a {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 270px;
        height: 160px;
        padding: 1px 28px 39px 28px;
        background: #181818;
        border: 1px solid #181818;
        border-radius: 10px;
        text-decoration: none;
        box-shadow: 10px 13px 25px rgba(0, 0, 0, 0.26);
        transition: 0.2s;
        margin: 0 10px;
        &:hover {
          background: #000000;
          border: 1px solid #fff;
        }
        img {
          width: 120px;
          height: 120px;
        }
      }
    }
    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 113px;
      .link {
        max-width: calc(50% - 10.5px);
        width: 100%;
        height: 86px;
        display: flex;
        align-items: center;
        background: #27ae60;
        border-radius: 10px;
        text-decoration: none;
        transition: 0.2s;
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
}
@media screen and (max-width: 834px) {
  .wrap {
    .container {
      .buttons {
        justify-content: center;
        flex-wrap: wrap;
        .link {
          max-width: 269px;
          width: 100%;
          border-radius: 0;
          height: 50px;
          margin: 0 5px;
          .btn-decor {
            height: 50px;
            width: 50px;
            border-radius: 0;
            img {
              width: 30px;
              height: 30px;
            }
          }
          .btn-text {
            text-align: left;
            padding-left: 15px;
            font-size: 12px;
          }
        }
      }
    }
  }
}
@media screen and (max-width: 572px) {
  .wrap {
    .container {
      position: relative;
      padding: 50px 0 39px 0;
      h1 {
        text-align: center;
      }
      .buttons {
        margin-top: 50px;
        .link:nth-child(2) {
          margin-top: 10px;
        }
      }
        .links {
          margin-top: 27px;
          a {
            background: #000000;
            text-align: center;
            width: 148px;
            height: 128px;
            &:nth-child(2) {
              h3 {
                transform: translateY(-10px);
              }
            }
            h3 {
              height: 20px;
              margin-top: -20px;
              font-size: 14px;
              font-family: 'Regular' !important;
            }
          }
        }
    }
  }
}
</style>