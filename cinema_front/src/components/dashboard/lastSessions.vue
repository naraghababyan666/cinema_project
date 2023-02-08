<template>
  <div class="currentSession">
    <div  v-for="(seance, idx) in seances" :key="idx" class="item">
      <div class="row">
        <span class="text-white text-medium">Фильм</span>
        <div class="text-regular info">{{ seance.film.title }}</div>
      </div>
      <div class="row">
        <span class="text-white text-medium">Время</span>
        <div class="text-regular info time">{{ seance.start }}</div>
        <div class="inside-row">
          <span class="text-white text-medium">Дата</span>
          <div class="text-regular info">
            {{ seance.day }}
          </div>
        </div>
      </div>
      <div class="row">
        <span class="text-white text-medium">Количество проданных мест</span>
        <div class="text-regular info amount">
          <img :src="Icon" />
          100
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Icon from "@/assets/images/common/local_activity.svg";
import axios from "axios";

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
        .post(process.env.VUE_APP_API_URL + "api/past-seances")
        .then((res) => {
          if(res.data == []){
            this.noSeance = true
          }else {
            this.seances = res.data;
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
.currentSession {
  height: 426px;
  overflow-y: scroll;
  padding-right: 25px;
  .item {
    border-bottom: 1px solid #777777;
    width: 100%;
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
      margin-top: 25px;
      max-width: 370px;
      .inside-row {
        display: flex;
        align-items: center;
        margin-left: 10px;
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
        text-align: center;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
        background: transparent;
        font-size: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 7px 16px;
        width: 150px;
        img {
          margin-right: 10px;
        }
      }
      .amount {
        width: 95px;
        margin-left: auto;
      }
    }
  }
}

@media screen and (max-width: 480px) {
  .currentSession {
    padding-right: 15px !important;
    .item {
      .row {
        // flex-wrap: wrap;
        .time {
          max-width: 60px;
        }
        &:last-child {
          flex-wrap: nowrap;
          .info {
            min-width: 108px;
          }
        }
        .inside-row {
          margin-left: 0;
          // margin-top: 25px;
        }
      }
    }
  }
}
@media screen and (max-width: 420px) {
  .currentSession {
    .item {
      .row {
        // flex-wrap: wrap;
        &:nth-child(2) {
          flex-wrap: wrap;
        }
        &:last-child {
          flex-wrap: nowrap;
          .info {
            min-width: 108px;
          }
        }
        .inside-row {
          margin-left: 0;
          margin-top: 25px;
        }
      }
    }
  }
}
</style>

