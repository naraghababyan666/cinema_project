<template>
  <div>
    <Header />
    <section class="wrap bg-black">
      <div class="container">
        <arrow-back  class="arrow-back"/>

        <div class="container">
          <div class="row">
            <div class="card">
              <h2 class="text-white text-medium">Физическое лицо</h2>
              <img
                  src="../../assets/images/cinema-for-halls-page/card_icon.svg"
                  alt="."
              />
              <div class="buttons" >
                <div
                    @click="openIndividual"
                    class="btn text-white text-semi-bold"
                >Загрузить документы
                </div>
              </div>
            </div>
            <div class="card">
              <h2 class="text-white text-medium">Юридическое лицо</h2>
              <img
                  src="../../assets/images/cinema-for-halls-page/card_icon2.svg"
                  alt="."
              />
              <div class="buttons" >
                <div @click="openLegal" class="btn text-white text-semi-bold"
                >Загрузить документы
                </div>
              </div>
            </div>
          </div>
          <div class="form">
            <div class="container">
              <div class="individual" v-if="openIndividualForm">
                <input type="text" v-model="name" placeholder="ФИО" class="fio">
                <input type="file" id="passportFile" style="display: none" @change="passportUpload">
                <label for="passportFile" style="color: white" :class="[ passportUploadedSuccessfully ? 'success' : 'notUploaded']">Паспорт </label>
                <div @click="sendForm">
                  <Btn text="Загрузить документы" />
                </div>
              </div>

              <div class="legal" v-else-if="openLegalForm">
                <input type="text" v-model="name" placeholder="Название юр. Лица" class="fio">
                <input type="file" id="passportFileLegal" style="display: none" @change="fileUpload" >
                <label for="passportFileLegal" style="color: white" :class="[ fileUploadedSuccessfully ? 'success' : 'notUploaded']">Свидетельство ОГРН/ОГРНИП</label>
                <div @click="sendForm">
                  <Btn text="Загрузить документы" />
                </div>
              </div>

            </div>

          </div>
          <div  class="row">
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
            <router-link to="" class="link">
              <div class="btn-decor">
                <img
                    src="../../assets/images/cinema-for-halls-page/settings_icon.svg"
                    alt="Служба поддержки"
                />
              </div>
              <div class="btn-text text-white text-semi-bold">
                Служба поддержки
              </div>
            </router-link>
          </div>
        </div>

      </div>
    </section>
    <Footer />
  </div>
</template>

<script>

import Header from "../../components/Header";
import Footer from "../../components/Footer";
import ArrowBack from "../../components/ArrowBack";
import Btn from "../../components/Btn";
import axios from "axios";

export default {
  name: "HoldersForm",
  data(){
    return {
      formType: '',
      name: '',
      photoDocument: '',
      openIndividualForm: false,
      openLegalForm: false,
      passportUploadedSuccessfully: false,
      fileUploadedSuccessfully: false,
      waitToCheck: false,
    }
  },
  components: {
    Btn,
    Header, Footer, ArrowBack
  },
  methods: {
    openIndividual(){
      this.openLegalForm = false
      this.openIndividualForm = true
      this.formType = 'Физическое лицо'
    },
    openLegal(){
      this.openIndividualForm = false
      this.openLegalForm = true
      this.formType = 'Юридическое лицо'
    },
    fileUpload(e){
      if(e){
        this.photoDocument = e.target.files[0];
        this.fileUploadedSuccessfully = !this.fileUploadedSuccessfully
      }
    },
    passportUpload(b){
      if(b){
        this.photoDocument = b.target.files[0];
        this.passportUploadedSuccessfully = !this.passportUploadedSuccessfully
      }
    },
    sendForm(){
      let file = new FormData();
      file.append('form_type', this.formType)
      file.append('name', this.name)
      file.append('photo', this.photoDocument)
      console.log(file)
      axios.post(process.env.VUE_APP_API_URL + "api/cinema/forHolders/check",  file )
          .then((res) => {
            if(res.data.success){
              this.$router.push('/cinema/forHolders')
            }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.arrow-back{
  z-index: 100 !important;
}
.waitDoc{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 100px 20px ;
  color: white;
  font-size: 20px;
}
.success{
  background-color: rgb(216, 0, 78);;
}
.notUploaded{
  background-color: transparent;
}
.preload {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 100;
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

  .container {
    //padding: 30px 15px 151px 15px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    position: relative;
    .form{
      width: 100%;
      margin-top: 20px;
      .container{
        .individual{
          width: 100%;
          padding: 50px 200px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          .fio::placeholder{
            color: white;
          }
          input[type='text']{
            height: 30px;
            background-color: #161616;
            border: 1px solid white;
            border-radius: 5px;
            min-width: 400px;
            color: white;
            padding: 10px;
          }
          ::placeholder{
            margin-left: 20px;
          }
          label{
            margin: 15px 0px;
            padding: 20px 25px;
            border: 1px solid white;
            border-radius: 10px;
          }
        }
        .legal{
          width: 100%;
          padding: 50px 200px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          .fio::placeholder{
            color: white;
          }
          input[type='text']{
            height: 30px;
            background-color: #161616;
            border: 1px solid white;
            min-width: 400px;
            border-radius: 5px;
            color: white;
            padding: 10px;
          }
          ::placeholder{
            margin-left: 20px;
          }
          label{
            margin: 15px 0px;
            padding: 20px 25px;
            border: 1px solid white;
            border-radius: 10px;
          }
        }
      }
    }
    .row {
      margin-top: 78px;
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
      flex-wrap: wrap;

      .card {
        padding: 37px 55px;
        background-color: #181818;
        background-image: url("../../assets/images/cinema-for-halls-page/card_bg.svg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: calc(50% - 10.5px);
        width: 100%;

        &
        :hover {
          //padding: 36px 54px;
          //border: 1px solid #fff;
          animation: hover 0.2s ease-in-out forwards;
        }

        img {
          width: 75px;
          height: 75px;
        }

        h2 {
          font-size: 24px;
          margin-bottom: 13px;
        }

        .buttons {
          display: flex;
          margin-top: 13px;
          cursor: pointer;
          .btn {
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            border: 1px solid #ffffff;
            width: 360px;
            height: 48px;
            justify-content: center;

            &,
            &
            * {
              transition: 0.2s;
            }

            &
            :hover {
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

        &
        :hover {
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

@keyframes hover {
  from {
    background-color: #181818;
  }
  to {
    background-color: #000000;
  }
}

@media screen and (max-width: 835px) {
  .wrap {
    background: url("../../assets/images/cinema-for-halls-page/bg.png") no-repeat center;
    background-size: cover;

    .container {
      padding: 12px 15px 92px 15px;

      .row {
        flex-direction: column;
        margin-top: 30px;

        &:nth-child(3) {
          margin-top: 100px;
          display: flex;
          flex-direction: row;
          justify-content: center;
        }

        .card {
          background-color: transparent;
          background-image: none;
          max-width: 560px;
          margin-top: 81px;

          &:hover {
            border: 0;
          }

          &:nth-child(1) {
            margin-top: 0;
          }
        }

        .link {
          max-width: 269px;
          width: 100%;
          border-radius: 0;
          height: 50px;
          margin: 0 7px;

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
            font-size: 12.5px;
          }

        }
      }
    }
  }
}

@media screen and (max-width: 620px) {
  .wrap {
    background-image: none;
    background-color: #000000;
  }
}

@media screen and (max-width: 480px) {
  .wrap {

    .container {
      padding: 12px 15px 37px 15px;

      .row {
        margin-top: 40px;

        &:nth-child(2) {
            margin-top:0;
        }

        &:nth-child(3) {
          margin-top: 62px;
          flex-direction: column;
        }

        .card {
          margin-top: 50px;
          padding: 0;

          img {
            order: -1;
          }

          h2 {
            order: 0;
            margin-top: 25px;
            text-align: center;
            font-size: 16px;
          }

          .btn {
            order: 1;
            width: 100% !important;
            height: 100% !important;
            padding: 7px 10px;
            font-size: 14px !important;
          }
        }

        .link {
          max-width: 269px;

          &
          :nth-child(2) {
            margin-top: 9px;
          }

        }
      }
    }
  }
}
</style>