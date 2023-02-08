<template>
  <div class="createSession">
    <transition name="urlChanged">
      <films-modal
        v-if="modalFilm"
        @onModalClick="selectFilm"
        @onModalClose="modalFilm = !modalFilm"
      />
    </transition>
    <transition name="urlChanged">
      <halls-modal
        v-if="modalHall"
        @onModalClick="selectHall"
        @onModalClose="modalHall = !modalHall"
      />
    </transition>

    <transition name="urlChanged">
      <advertisement-modal
        v-if="modalAdvertisement"
        @onModalClick="selectAdvertisement"
        @onModalClose="modalAdvertisement = !modalAdvertisement"
      />
    </transition>
    <div v-for="(film, idx) in films" :key="idx" class="film-item">
      <button
        @click="showFilmModal(film)"
        class="text-semi-bold text-white select"
      >
        {{ film.name }}
      </button>
      <hr style="margin: 10px; visibility: hidden" />
      <button
        @click="showHallModal(hall)"
        class="text-semi-bold text-white select"
      >
        {{ hall.title }}
      </button>
      <hr style="margin: 10px; visibility: hidden" />
      <button
        @click="showAdvertisementsModal(advertisement)"
        class="text-semi-bold text-white select"
      >
        {{ advertisement.title }}
      </button>
      <div class="row">
        <!--        <span class="text-white text-semi-bold">Назначить</span>-->
        <div class="time text-white text-regular">
          Время:
          <input v-model="newSeance.time" type="time" />
        </div>
        <div class="time text-white text-regular">
          Дата:
          <input v-model="newSeance.date" id="date" type="date" />
        </div>
      </div>
      <div class="row">
        <span class="text-white text-semi-bold adv">Рекламный блок </span>
        <div class="time text-white text-regular">
          <!-- <label for="advert" class="text-regular"
            >Прикрепить файл
            <img :src="AttachmentIcon" alt="" />
          </label> -->
          <input
            v-model="newSeance.advertTime"
            type="number"
            :disabled="openAdvertTime"
            style="margin-right: 20px"
          />
          минут
        </div>
      </div>
      <div class="row">
        <span class="text-white text-semi-bold adv">Обслуживание зала </span>
        <div class="time text-white text-regular">
          <input
            v-model="newSeance.serviceTime"
            type="number"
            style="margin-right: 20px"
          />
          минут
        </div>
      </div>
      <div class="row">
        <span class="text-white text-semi-bold adv">Стоимость сеанса </span>
        <div class="time text-white text-regular">
          <input
            v-model="newSeance.price"
            type="number"
            style="margin-right: 10px"
          />
          рублей
        </div>
      </div>
    </div>
    <!-- <add-btn text="Добавить сеанс" @click.native="createSessionHandler" /> -->
    <Btn
      @click.native="createSessionHandler"
      text="Создать сеанс"
      fluid
      class="createBtn"
    />
  </div>
</template>

<script>
import Btn from "@/components/Btn";
import FilmsModal from "@/components/modals/FilmsModal";
import HallsModal from "@/components/modals/HallsModal";
import AdvertisementModal from "../modals/AdvertisementModal";
import axios from "axios";
import AttachmentIcon from "@/assets/images/common/attachment.svg";

export default {
  name: "createSession",
  components: { Btn, FilmsModal, HallsModal, AdvertisementModal },
  data() {
    return {
      modalFilm: false,
      selectedFilm: null,
      modalHall: false,
      modalAdvertisement: false,
      selectedHall: null,
      selectedAdvertisement: null,
      selectedAdvertisementId: [],
      openAdvertTime: true,
      films: [
        {
          name: "Выбрать фильм",
          time: "",
          date: "",
          advertTime: "",
        },
      ],
      hall: {
        title: "Выбрать зал",
      },
      advertisement: {
        title: "Выбрать рекламу",
      },
      newSeance: {
        film_id: "",
        hall_id: "",
        time: "",
        date: "",
        advertTime: "",
        serviceTime: "",
        price: null,
      },
      AttachmentIcon,
    };
  },
  methods: {
    showFilmModal(film) {
      this.modalFilm = !this.modalFilm;
      this.selectedFilm = film;
    },
    selectFilm(film) {
      this.selectedFilm.name = film.title;
      this.newSeance.film_id = film.id;
      this.films = this.films.map((el) =>
        el === this.selectedFilm ? (el = this.selectedFilm) : el
      );

      this.selectedFilm = null;
    },
    showHallModal(hall) {
      this.modalHall = !this.modalHall;
      this.selectedHall = hall;
    },
    showAdvertisementsModal(advertisement) {
      this.selectedAdvertisementId = []
      this.modalAdvertisement = !this.modalAdvertisement;
      this.selectedAdvertisement = advertisement;
    },
    selectHall(hall) {
      this.hall.title = hall.name_hall;
      this.selectedHall.title = hall.name_hall;
      this.selectedHall.id = hall.id;
    },
    selectAdvertisement(advertisement) {
      if (advertisement.length === 0) {
        this.advertisement.title = "Нет реклам";
      } else if(advertisement.length === 1){
        this.selectedAdvertisement.title = advertisement[0].title
        this.selectedAdvertisementId.push(advertisement[0].id)
        this.openAdvertTime = false
      }else{
        this.advertisement.title = ''
        this.selectedAdvertisement.title = ''
        advertisement.forEach((advert) => {
          // this.advertisement.title = this.advertisement.title + advert.title + ' . '
          this.selectedAdvertisement.title = this.selectedAdvertisement.title + advert.title + '. '
          this.selectedAdvertisementId.push(advert.id)
          this.openAdvertTime = false
        })
      }
    },
    createSessionHandler() {
      var fData = new FormData();
      console.log(this.selectedAdvertisement)
      fData.append("film_id", this.newSeance.film_id);
      fData.append("hall_id", this.selectedHall.id);
      fData.append("token", localStorage.getItem("access_token"));
      fData.append("day", this.newSeance.date);
      fData.append("start", this.newSeance.time);
      fData.append("duration_service", this.newSeance.serviceTime);
      fData.append("tickets_price", this.newSeance.price);
      if (this.selectedAdvertisementId !== []) {
        fData.append("advertisement_id", JSON.stringify(this.selectedAdvertisementId));
        fData.append("duration_advertising", this.newSeance.advertTime);
      }
      axios
        .post(process.env.VUE_APP_API_URL + "api/seances/store", fData)
        .then((res) => {
          this.$emit("changeCurrentView", "startSession");
        })
        .catch((err) => {
          if (err.response.status == 422) {
            alert("Ошибка!!!! данные не прошли валидацию!");
            console.log("validaion error");
          } else if (err.response.status == 401) {
            this.$store.commit("deleteAuthToken");
            alert("Ошибка аутентификации. Пожалуйста, войдите снова.");
            this.$router.push("/login").catch(() => {});
          }
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.error {
  color: #d7004d;
  margin: 10px;
}
.createSession {
  .film-item {
    margin-bottom: 25px;
    button.select {
      width: 100%;
      background: transparent;
      font-size: 14px;
      padding: 7px;
      border: 1px solid #ffffff;
      border-radius: 10px;
      outline: 0;
    }
    .row {
      margin-top: 25px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      span,
      .add {
        font-size: 16px;
      }
      span {
        margin-right: 20px;
        &.adv {
          min-width: 156px;
        }
      }
      .time {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 14px;
        &:nth-child(2) {
          margin-left: auto;
          input {
            width: 89px;
          }
          input[type="date"] {
            min-width: 140px;
          }
        }
        &:nth-child(3) {
          margin-left: 12px;
          input {
            width: 130px !important;
            //width: 110px !important;
          }
        }
        input {
          background: transparent;
          border: 1px solid #ffffff;
          border-radius: 10px;
          padding: 7px;
          outline: 0;
          margin-left: 12px;
          &::placeholder,
          & {
            text-align: center;
            font-family: "Regular";
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
          }
          color: #ffffff !important;
        }
      }
      .file {
        width: 100%;
        max-width: 261px;
        margin-left: auto;
        label {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 7px 15px;
          font-size: 12px;
          color: rgba(255, 255, 255, 0.4);
          border: 1px solid #ffffff;
          border-radius: 12px;
        }
        input {
          display: none;
        }
      }
    }

    .addBtn {
      margin-top: 25px;
    }

    .createBtn {
      margin-top: 44px;
    }
  }
}

@media screen and (max-width: 630px) {
  .createSession {
    .film-item {
      .row {
        flex-wrap: wrap;
        .file {
          margin: 0 auto 0 0;
        }
        .time {
          input {
            width: 64px !important;
            margin-right: 10px;
          }

          &:nth-child(3) {
            input {
              margin-right: 0;
              max-width: 90px !important;
            }
          }
          #date {
            width: 113px !important;
          }
        }
        span {
          width: 100%;
          margin-bottom: 20px;
        }
        .time:nth-child(2) {
          margin-left: 0 !important;
        }
      }
    }
  }
}

@media screen and (max-width: 422px) {
  .createSession {
    .film-item {
      .row {
        .time {
          margin-top: 10px;
          margin-left: 0 !important;
        }
      }
    }
  }
}
</style>
