<template>
  <div class="modal-wrap">
    <div class="wrapper">
      <button @click="$emit('onModalClose')" class="close-btn">
        <img :src="CloseIcon" alt="" />
      </button>
      <div class="items" v-if="!noAdvertising">
        <div v-for="(advertising, idx) in advertisements" :key="idx" class="item">
          <div class="row">
            <div class="col">
              <input type="checkbox" :value=" advertising.id " v-model="selectedAdvertisings" @change="handleChange(advertising.id)"/>
            </div>
            <div class="col">
              <span class="text-white text-medium">Название</span>
              <div class="text-regular info">{{ advertising.title }}</div>
            </div>
            <div class="col">
              <span class="text-white text-medium">Длительность</span>
              <div class="text-regular info">{{ advertising.duration }}</div>
            </div>
          </div>
        </div>
        <div class="row" @click="clickHandler(selectedAdvertisings)">
          <Btn text="Выбрать" />
        </div>
      </div>
      <div class="row"  v-else>
        <div class="col">
          <p class="noAdvertising"> Нет рекламный ролик</p>
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
  name: "HallsModal",
  components: { Btn },
  data() {
    return {
      CloseIcon,
      advertisements: [],
      selectedAdvertisings: [],
      noAdvertising: false,
    };
  },
  mounted() {
    this.getAdvertisings();
  },

  methods: {
    handleChange(id){
      this.selectedAdvertisings.includes(id)
    },

    clickHandler() {
      axios
          .post(process.env.VUE_APP_API_URL + "api/get-advertisements/", {
            advertising_id: this.selectedAdvertisings
          }).then((res) => {
        this.$emit("onModalClick", res.data);
        this.$emit("onModalClose");
      })
    },
    getAdvertisings() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/advertisements/", {
          token: localStorage.getItem('access_token'),
        })
        .then((res) => {
          this.advertisements = res.data.advertisements;
          if(this.advertisements.length == 0){
            this.noAdvertising = true
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>

$black: #363839;
$lightgray: #9c9e9f;
$gray: #bdc1c6;
$white: #fff;
$green: #06842c;
input[type="checkbox"] {
  position: relative;
  width: 1.5em;
  height: 1.5em;
  color: $black;
  border: 1px solid $gray;
  border-radius: 4px;
  appearance: none;
  outline: 0;
  cursor: pointer;
  transition: background 175ms cubic-bezier(0.1, 0.1, 0.25, 1);
  &::before {
    position: absolute;
    content: '';
    display: block;
    top: -1px;
    left: 4px;
    width: 8px;
    height: 14px;
    border-style: solid;
    border-color: $white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
    opacity: 0;
  }
  &:checked {
    color: $white;
    border-color: $green;
    background: $green;
    &::before {
      opacity: 1;
    }
    ~ label::before {
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
    }
  }
}
.noAdvertising{
  padding: 10px 0px;
}
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
      padding-right: 3px;
      .item {
        padding: 20px 0;
        &:first-child {
          padding: 0 0 20px 0 !important;
        }
        &:last-child {
          padding: 40px 0 0 0;
          border-bottom: 0;
        }
        .row {
          display: flex;
          align-items: center;
          margin-top: 20px;
          justify-content: space-between;

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
          .col {
            display: flex;
            align-items: center;
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