<template>
  <div class="upload-wrap">
    <Header />
    <section class="wrap bg-black">
      <div class="container">
        <arrow-back href="for-holders" />
        <h1 class="text-white text-semi-bold">
          <img
            src="@/assets/images/uploadNew/download.svg"
            alt="Загрузить фильм"
          />
          <span>Загрузить фильм</span>
        </h1>
        <div class="row">
          <form @input="validate">
            <div class="left">
              <div class="text-regular text-white p-SM">Название фильма</div>
              <div class="text-regular text-white p-SM">Жанр</div>
<!--              <div class="text-regular text-white p-SM">Загрузить фильм</div>-->
              <div class="text-regular text-white p-SM">Загрузить Афиша</div>
              <div class="text-regular text-white p-SM">Прокатное удост.</div>
              <div class="text-regular text-white p-SM">Права на фильм</div>
              <div class="text-regular text-white p-SM">Формат</div>
              <div class="text-regular text-white p-SM">Показ фильм</div>
              <div class="text-regular text-white p-SM">Длительность</div>
              <div class="text-regular text-white p-SM">Описание</div>
            </div>
            <div class="right">
              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Название фильма
              </div>
              <div class="input-wrap">
                <input
                  v-model="name"
                  type="text"
                  class="text-regular text-gray"
                  placeholder="Введите название"
                />
                <small class="error" v-if="larerrors.title">
                  <i>{{ larerrors.title }}</i>
                </small>
              </div>
              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Жанр
              </div>

              <div class="input-wrap" style="max-height: 50px">
                <select id="genre" ref="genre" :style="color" @change="changeColor">
                  <option
                    value=""
                    disabled
                    selected
                    class="
                      input-wrap input-wrap-mobile
                      text-regular text-gray
                      p-SM
                    "
                  >
                    Выберите жанр
                  </option>
                  <option
                    v-for="genre in genres"
                    :key="genre.id"
                    :value="genre.id"
                  >
                    {{ genre.title }}
                  </option>
                </select>
              </div>
              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Загрузить фильм
              </div>

<!--              <div class="input-wrap text-regular text-gray p-SM">-->
<!--                <span id="text">{{ file }}</span>-->
<!--                <img-->
<!--                  id="file-icon"-->
<!--                  src="@/assets/images/uploadNew/file.svg"-->
<!--                  alt="Загрузить файл"-->
<!--                />-->
<!--                <input-->
<!--                  @change="setFile"-->
<!--                  type="file"-->
<!--                  id="file"-->
<!--                  ref="video"-->
<!--                  accept="video/*"-->
<!--                />-->
<!--                <small class="error" v-if="larerrors.file">-->
<!--                  <i>{{ larerrors.file }}</i>-->
<!--                </small>-->
<!--              </div>-->

              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Загрузить изображение
              </div>
              <div class="input-wrap text-regular text-gray p-SM">
                <span id="text">{{ image }}</span>
                <img
                  id="file-icon"
                  src="@/assets/images/uploadNew/file.svg"
                  alt="Загрузить файл"
                />
                <input
                  @change="setImage"
                  type="file"
                  id="file"
                  ref="image"
                  accept="image/*"
                />
                <small class="error" v-if="larerrors.image">
                  <i>{{ larerrors.image }}</i>
                </small>
              </div>
              <div class="input-wrap text-regular text-gray p-SM">
                <span id="certificate">{{ certificate }}</span>
                <img
                    id="certificateIcon"
                    src="@/assets/images/uploadNew/file.svg"
                    alt="Загрузить файл"
                />
                <input
                    @change="setCertificate"
                    type="file"
                    id="certificateFile"
                    ref="certificateImage"
                    accept="image/*"
                />
                <small class="error" v-if="larerrors.certificate">
                  <i>{{ larerrors.certificate }}</i>
                </small>
              </div>
              <div class="input-wrap text-regular text-gray p-SM">
                <span id="law">{{ law }}</span>
                <img
                    id="lawIcon"
                    src="@/assets/images/uploadNew/file.svg"
                    alt="Загрузить файл"
                />
                <input
                    @change="setLaw"
                    type="file"
                    id="lawFile"
                    ref="lawImage"
                    accept="image/*"
                />
                <small class="error" v-if="larerrors.image">
                  <i>{{ larerrors.image }}</i>
                </small>
              </div>
              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Формат
              </div>
              <div class="dark">
                <div
                  class="input-wrap select dark"
                  :class="{ 'show-dropdown': showDropdown }"
                >
                  <div class="dropdown">
                    <svg
                      @click="showDropdown = !showDropdown"
                      :class="{ rotate: showDropdown }"
                      width="10"
                      height="5"
                      viewBox="0 0 9 4"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M0.459961 3.92L4.35996 0.0200043L8.25996 3.92H0.459961Z"
                        fill="white"
                      />
                    </svg>
                    <div class="title text-regular text-white p-SM">
                      <span
                        v-if="type !== '2 D'"
                        @click="
                          type = '2 D';
                          showDropdown = false;
                        "
                        >{{ type }}</span
                      >
                      <span
                        v-if="type !== '3 D'"
                        @click="
                          type = '3 D';
                          showDropdown = false;
                        "
                        >{{ type }}</span
                      >
                    </div>
                  </div>
                  <div
                    v-if="showDropdown"
                    class="dropdown text-regular text-white p-SM"
                  >
                    <span
                      v-if="type !== '2 D'"
                      @click="
                        type = '2 D';
                        showDropdown = false;
                      "
                      >2 D</span
                    >
                    <span
                      v-if="type !== '3 D'"
                      @click="
                        type = '3 D';
                        showDropdown = false;
                      "
                      >3 D</span
                    >
                  </div>
                </div>
              </div>
              <div
                  class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Показ фильм
              </div>
              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Длительность
              </div>
              <div class="dark">
                <select class="dark select_platform" @change="platformChange">
                  <option disabled selected>Выберите платформа</option>
                  <option value="online">Онлайн платформа</option>
                  <option value="hall">Кинотеатры</option>
                  <option value="hall&online">Онлайн платформа и кинотеатры</option>
                </select>
              </div>
              <div class="dark">
                <div class="input-wrap">
                  <input
                    v-model="time"
                    type="text"
                    class="text-regular text-gray"
                    placeholder="Длительность сеанса"
                  />
                  <span class="text-white text-regular p-SM">мин.</span>
                </div>
              </div>
              <div
                class="
                  input-wrap input-wrap-mobile
                  text-regular text-white
                  p-SM
                "
              >
                Описание
              </div>
              <div class="dark">
                <div class="input-wrap textarea">
                  <textarea
                    v-model="overview"
                    type="text"
                    class="text-regular text-gray"
                    placeholder="Краткое описание фильма"
                  />
                  <small class="error" v-if="larerrors.description">
                    <i>{{ larerrors.description }}</i>
                  </small>
                </div>
              </div>
            </div>
          </form>
          <div class="msg_success" v-show="successMsg">Фильм успешно добавлен</div>
          <div class="msg_error" v-show="errorMsg">Ошибка!!!! данные не прошли валидацию!</div>
<!--          <dot-loader v-if="loading" />-->
          <div class="upload_film"  :class="{ 'block_event' : btnDisabled }">
            <input type="file" id="upload" ref="video" style="display: none" @change="saveToDB"/>
            <label for="upload">
              <p class="upload_file">Загрузить фильм</p>
            </label>

          </div>

        </div>
<!--        <router-link to class="link">-->
<!--          <div class="btn-decor">-->
<!--            <img :src="SettingsIcon" alt="Служба поддержки" />-->
<!--          </div>-->
<!--          <div class="btn-text text-white text-semi-bold">Служба поддержки</div>-->
<!--        </router-link>-->
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";
import Btn from "@/components/Btn";
import SettingsIcon from "@/assets/images/cinema-for-halls-page/settings_icon.svg";
import axios from "axios";
import Multiselect from "vue-multiselect";
import DotLoader from "@/components/DotLoader";
export default {
  components: { Header, Footer, ArrowBack, Btn, Multiselect, DotLoader },
  data: () => ({
    platformType: '',
    SettingsIcon,
    showDropdown: false,
    name: "",
    file: "Выберите фильм",
    image: "Выберите картину",
    certificate: "Выберите картину",
    law: "Выберите картину",
    time: "",
    overview: "",
    type: "2 D", //or '3 D',
    btnDisabled: true,
    loading: false,
    genres_id: [],
    genres: [],
    larerrors: "",
    color: "color:grey",
    successMsg: false,
    errorMsg: false
  }),
  mounted() {
    this.getGenres();
    // axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/upload-new').then((res) => {
    //   if (res.data.NotVerifiedDocuments) {
    //     this.$router.back()
    //   }
    // })
  },
  methods: {
    changeColor(){
      this.color = "color:white";
    },
    changeRoute(){
      this.$router.push("/cinema/forHolders/my-films");
    },
    // setFile(e) {
    //
    // },
    validate() {
      if (this.name.length > 2 && this.time && this.overview.length > 3) {
        this.btnDisabled = false;
      } else {
        this.btnDisabled = true;
      }
    },
    setImage(e) {
      var image = e.target.files || e.dataTransfer.files;
      if (!image.length) return;
      this.image = image[0].name;
    },
    setCertificate(e){
      var certificateImage = e.target.files || e.dataTransfer.files;
      if (!certificateImage.length) return;
      this.certificate = certificateImage[0].name;
    },
    setLaw(e){
      var lawImage = e.target.files || e.dataTransfer.files;
      if (!lawImage.length) return;
      this.law = lawImage[0].name;
    },
    getGenres() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/genres", {
          token: localStorage.getItem('access_token'),
        })
        .then((res) => {
          this.genres = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    platformChange(value){
      this.platformType = value.target.value
    },
    saveToDB(e) {
      var file = e.target.files || e.dataTransfer.files;
      if (!file.length) return;
      this.file = file[0].name;
      var format_id = this.type == "2 D" ? "1" : "2";
      var fData = new FormData();
      this.genres_id.push(this.$refs.genre.value);
      fData.append("image", this.$refs.image.files[0]);
      fData.append("certificate_image", this.$refs.certificateImage.files[0]);
      fData.append("law_image", this.$refs.lawImage.files[0]);
      fData.append("file", this.$refs.video.files[0]);
      fData.append("token", localStorage.getItem("access_token"));
      fData.append("title", this.name);
      fData.append("description", this.overview);
      fData.append("platform", this.platformType);
      fData.append("duration", this.time);
      fData.append("format_id", format_id);
      fData.append("genres_id", this.genres_id);
      this.btnDisabled = true;
      this.loading = true;
      axios
        .post(process.env.VUE_APP_API_URL + "api/films/store", fData)
        .then((res) => {
          this.larerrors = "";
          // this.$router.push("/cinema/dashboard").catch(() => {});
          if(res.data.success){
            this.successMsg = true
            this.errorMsg = false
            setTimeout(this.changeRoute, 3000)
          }else{
            this.successMsg = false
            this.errorMsg = true
          }
        })
        .catch((err) => {
          this.btnDisabled = false;
          this.loading = false;

          if (err.response.status === 422) {
            this.larerrors = err.response.data.errors;
          } else if (err.response.status === 401) {
            this.$store.commit("deleteAuthToken");
            alert("Ошибка аутентификации. Пожалуйста, войдите снова.");
            this.$router.push("/login").catch(() => {});
          } else if (err.response.status === 413) {
            this.larerrors = "";
            alert("Объект запроса превышает пределы, определенные сервером.");
          } else {
            alert("Ошибка на сервере. Фильм не сохранен.");
          }
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.block_event{
  pointer-events: none;
  opacity: 0.7;
}
.upload_file{
  font-size: 16px;
  font-family: "SemiBold" !important;
  text-decoration: none;
  padding: 13px 92px;
  background: #27ae60;
  border-radius: 10px;
  transition: 0.1s;
  border: 0;
  outline: 0;
  color: white;
  text-align: center;
}
.msg_success, .msg_error{
  text-align: center;
}
.msg_success{
  color: #27AE60;
  font-size: 18px;
}
.msg_error{
  color: red;
  font-size: 18px;
}
.select_platform{
  font-size: 14px;
  color: #797979;
}
.platform{
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
}
.platform_header{
  position: relative;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
  color: #797979;
}
.platform_header svg{
  transform: rotateZ(180deg);
}
.platform_type{
  text-align: start;

}
select {
  background: transparent;
  border: none;
  width: 100%;
}
.error {
  color: #d7004d;
  margin: 10px;
}

.wrap {
  .container {
    position: relative;
    padding: 87px 15px 121px 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    h1 {
      display: flex;
      align-items: center;
      img {
        margin-right: 20px;
      }
    }
    .row {
      margin-top: 70px;
      background: #161616;
      width: 100%;
      padding: 44px;
      border-radius: 10px;
      form {
        display: flex;
        align-items: stretch;
        width: 100%;
        border: 1px solid #444444;
        border-radius: 10px;
        margin-bottom: 32px;
        .left {
          padding: 0 20px;
          max-width: 199px;
          width: 100%;
          border-right: 1px solid #444444;
          div {
            padding: 15px 0;
            border-bottom: 1px solid #444444;
            &:last-child {
              border-bottom: 0;
            }
          }
        }

        .right {
          padding: 0 20px;
          width: 100%;

          .dark {
            padding: 7.5px 0;
            border-bottom: 1px solid #444444;
            &:last-child {
              border-bottom: 0;
            }
            .input-wrap {
              background: #252424;
              border-radius: 5px;
              padding: 7.9px 12px;
              position: relative;
            }
          }
          .textarea {
            height: 114px;
            textarea {
              resize: none;
              height: 100%;
            }
          }
          .select {
            flex-direction: column;
          }
          .show-dropdown {
            height: 65px;
            justify-content: space-between;
          }
          .input-wrap {
            padding: 16px 0;
            border-bottom: 1px solid #444444;
            display: flex;
            align-items: center !important;
            justify-content: space-between;
            position: relative;
            #file {
              position: absolute;
              width: 100%;
              height: 100%;
              opacity: 0;
              cursor: pointer;
              top: 0;
              left: 0;
            }
            #file-icon {
              position: absolute;
              right: 0;
              top: 20px;
            }
            #certificateFile {
              position: absolute;
              width: 100%;
              height: 100%;
              opacity: 0;
              cursor: pointer;
              top: 0;
              left: 0;
            }
            #certificateIcon  {
              position: absolute;
              right: 0;
              top: 20px;
            }
            #lawFile {
              position: absolute;
              width: 100%;
              height: 100%;
              opacity: 0;
              cursor: pointer;
              top: 0;
              left: 0;
            }
            #lawIcon  {
              position: absolute;
              right: 0;
              top: 20px;
            }
            &:last-child {
              border-bottom: 0;
            }
            span#text {
              font-size: 14px;
              color: #797979;
            }
            span#certificate {
              font-size: 14px;
              color: #797979;
            }
            span#law {
              font-size: 14px;
              color: #797979;
            }
            input,
            textarea {
              background: transparent;
              border: 0;
              outline: 0;
              font-size: 14px;
              width: 100%;
              color: #ffffff;
            }
          }
          .input-wrap-mobile {
            display: none;
          }
          .select {
            position: relative;
            .dropdown {
              width: 100%;
              align-items: center;
              display: flex;
              justify-content: space-between;
              cursor: pointer;
              svg {
                position: absolute;
                transform: rotate(180deg);
                transition: 0.2s;
                top: 14px;
                right: 14px;
              }
              .rotate {
                transform: rotate(0);
              }
            }
          }
        }
      }
      button {
        position: relative;
        &:after {
          content: "";
          width: 18px;
          height: 18px;
          background: url("../../assets/images/uploadNew/download.svg")
            no-repeat;
          background-size: contain;
          position: absolute;
          top: 13px;
          right: 15px;
        }
      }
    }
    .link {
      width: 100%;
      height: 86px;
      display: flex;
      align-items: center;
      background: #27ae60;
      border-radius: 10px;
      text-decoration: none;
      transition: 0.2s;
      margin-top: 49px;
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

@media (max-width: 580px) {
  .wrap {
    .container {
      padding: 68px 30px 46px 30px !important;
      h1 {
        img {
          width: 15px;
          height: 15px;
          margin-right: 10px;
        }
      }
      .row {
        background: transparent;
        padding: 0 !important;
        margin-top: 30px;
        form {
          border: 0;
          .left {
            display: none;
          }
          .right {
            padding: 0 !important;

            .input-wrap-mobile {
              display: block !important;
            }
            .input-wrap {
              padding: 10px 0 !important;
              input,
              textarea {
                font-size: 12px !important;
              }
              #file-icon {
                top: 13px !important;
              }
            }
            .dark {
              .input-wrap {
                padding: 10px 10px !important;
              }
            }
          }
        }
      }
    }
  }
}

//other for components
@media (max-width: 834px) {
  .wrap {
    .container {
      .row {
        padding: 34px;
      }
      .link {
        max-width: 269px;
        width: 100%;
        border-radius: 0;
        height: 50px;
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

@media (max-width: 500px) {
  .wrap {
    .container {
      .row {
        button {
          &::after {
            top: 8px;
            right: 8px;
            width: 15px;
            height: 15px;
          }
        }
      }
    }
  }
}
</style>
