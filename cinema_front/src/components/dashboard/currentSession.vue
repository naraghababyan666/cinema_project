<template>
  <div class="currentSession">
    <div v-for="(seance, idx) in seances" :key="idx" class="item">
      <div class="row">
        <span class="text-white text-medium">Фильм</span>
        <div class="text-regular info">{{ seance.film.title }}</div>
      </div>
      <div class="row">
        <span class="text-white text-medium">Дата</span>
        <div class="text-regular info" id="date">{{ seance.day }}</div>

        <div class="row-inside">
          <span class="text-white text-medium">Время</span>
          <div class="text-regular info" id="time">{{ seance.start }}</div>
        </div>
      </div>
      <div class="row">
        <span class="text-white text-medium">Количество зрителей</span>
        <div class="text-regular info" style="max-width: 200px; width: 100%">
          <img :src="Icon" alt="" /> {{ seance.halls.hall_seats }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Icon from "@/assets/images/common/local_activity.svg";
import axios from 'axios';

export default {
  name: "currentSession",
  data() {
    return {
      Icon,
      seances: [],
    };
  },
  mounted() {
    this.getSeances();
  },
  methods: {
    getSeances() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/present-seances")
        .then((res) => {
          this.seances = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.currentSession {
  height: 526px;
  overflow-y: scroll;
  padding-right: 25px;
  .item {
    border-bottom: 1px solid #777777;
    padding: 40px 0;
    &:first-child {
      padding: 0 0 40px 0;
    }
    &:last-child {
      padding: 40px 0 20px 0;
      border-bottom: 0;
    }
    .row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 25px;
      .row-inside {
        margin-left: 10px;
        display: flex;
        width: 100%;
        align-items: center;
      }
      &:first-child {
        margin-top: 0;
      }
      span {
        font-size: 16px;
        margin-right: 12px;
        display: block;
      }
      .info {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        text-align: center;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
        background: transparent;
        font-size: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 4px 7px;
        img {
          margin-right: 10px;
        }
      }
    }
  }
}
@media screen and (max-width: 480px) {
  .currentSession {
    padding-right: 15px !important;
    .row {
      #date {
        max-width: 100px;
      }
      #time {
        max-width: 50px;
      }
      // &:nth-child(2) {
      //   flex-wrap: wrap;
      //   justify-content: flex-start;
      //   .date {
      //     width: 50%;
      //   }
      //   .row-inside {
      //     margin-left: 0;
      //     margin-top: 25px;
      //   }
      // }
      .info {
        font-size: 14px !important;
      }
    }
  }
}
@media screen and (max-width: 360px) {
  .currentSession {
    .row {
      &:nth-child(2) {
        flex-wrap: wrap;
        justify-content: flex-start;
        .date {
          width: 50%;
        }
        .row-inside {
          margin-left: 0;
          margin-top: 25px;
        }
      }
    }
  }
}
</style>