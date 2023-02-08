<template>
  <div class="modal-wrap">
    <div class="wrapper">
      <button @click="$emit('onModalClose')" class="close-btn">
        <img :src="CloseIcon" alt="" />
      </button>
      <div class="items">
        <div v-for="(film, idx) in films" :key="idx" class="item">
          <div class="row">
            <span class="text-white text-medium">Фильм</span>

            <div class="text-regular info">{{ film.title }}</div>
          </div>
          <div class="row">
            <span class="text-white text-medium">Год</span>
            <div class="text-regular info">{{ film.created_at | moment("YYYY") }}</div>
          </div>
          <div class="row">
            <span class="text-white text-medium">Длительность</span>
            <div class="text-regular info">{{ film.duration }} минут</div>
          </div>
          <div class="row" @click="clickHandler(film)">
            <Btn text="Выбрать" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CloseIcon from "@/assets/images/common/close.svg";
import Btn from "@/components/Btn";
import axios from "axios";


export default {
  name: "FilmsModal",
  components: { Btn },
  data() {
    return {
      CloseIcon,
      films: [],
    };
  },
  mounted() {
    this.getFilms();
  },
  methods: {
    clickHandler(film) {
      this.$emit("onModalClick", film);
      this.$emit("onModalClose");
    },
    getFilms() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/films/", {
          token: localStorage.getItem('access_token'),
        })
        .then((res) => {
          this.films = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.modal-wrap {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 200;
  background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
  padding: 15px;
  .wrapper {
    max-width: 539px;
    width: 100%;
    border-radius: 20px;
    background: #191919;
    padding: 61px 50px 50px 50px;
    position: relative;
    .close-btn {
      position: absolute;
      background: transparent;
      outline: 0;
      border: 0;
      top: 15px;
      right: 15px;
      img {
        width: 20px;
        height: 20px;
      }
    }
    .items {
      height: 439px;
      overflow-y: scroll;
      padding-right: 25px;
      .item {
        padding: 40px 0;
        border-bottom: 1px solid #777777;
        &:first-child {
          padding: 0 0 40px 0 !important;
        }
        &:last-child {
          padding: 40px 0 0 0;
          border-bottom: 0;
        }
        .row {
          display: flex;
          align-items: center;
          margin-top: 20px;
          &:first-child {
            margin-top: 0;
          }
          span {
            margin-right: 15px;
          }
          .info {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            background: transparent;
            font-size: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 7px 15px;
          }
        }
      }
    }
  }
}

@media screen and (max-width: 480px) {
  .modal-wrap {
    .wrapper {
      padding: 41px 30px 30px 30px;
      .item {
          padding-right: 15px;
          .row {
              .info {
                  font-size: 12px !important;
              }
          }
      }
    }
  }
}
</style>