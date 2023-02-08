<template>
  <div class="today-wrap">
    <Header />
    <div class="container">
      <arrow-back />
      <div class="heading">
        <title-decor text="Сегодня в прокате" :img="TitleIcon" />
        <div class="search">
          <input v-model="search" placeholder="Поиск" class="t-white text-medium" />
          <img @click="search = ''" src="@/assets/images/close.svg" alt="Отменить" />
        </div>
      </div>
      <div class="row">

        <router-link
          v-for="(item, idx) in films"
          :key="idx"
          class="item"
          :to="{name: 'ec-myfilms-single', params: { id : item.id} }"
        >
          <img :src="`${baseUrl}storage/${item.image}`" alt />
          <h3 class="text-white text-semi-bold">{{item.title}}</h3>
        </router-link>
      </div>
      <btn-group />
    </div>
    <Footer />
  </div>
</template>

<script>
import BtnGroup from "@/components/BtnGroup";
import TitleDecor from "@/components/TitleDecor";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";

import TitleIcon from "@/assets/images/today-cinema/item.svg";
import axios from "axios";
export default {
  components: { BtnGroup, TitleDecor, Header, Footer, ArrowBack },
  computed: {
    filteredList() {
      return this.items.filter((item) => {
        return item.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
  data: () => ({
    search: "",
    TitleIcon,
    items: [
      {
        name: "Гениальное ограбление",
      },
      {
        name: "Лига справедливости Зака Снайдера",
      },
      {
        name: "Гнев человеческий",
      },
      {
        name: "Гениальное ограбление",
      },
      {
        name: "Лига справедливости Зака Снайдера",
      },
      {
        name: "Гнев человеческий",
      },
      {
        name: "Гениальное ограбление",
      },
      {
        name: "Лига справедливости Зака Снайдера",
      },
    ],
    films: [],
    baseUrl: process.env.VUE_APP_API_URL
  }),
  mounted() {
    // axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/today-cinema').then((res) => {
    //   if (res.data.NotVerifiedDocuments) {
    //     this.$router.back()
    //   }
    // })
    axios.post(process.env.VUE_APP_API_URL + "api/forHolders/today-cinema").then((res) => {
      console.log(res.data)
      this.films = res.data
    })
  }
};
</script>

<style lang="scss" scoped>
.today-wrap {
  .container {
    position: relative;
    padding: 87px 15px 121px 15px;
    .heading {
      display: flex;
      align-items: center;
      justify-content: space-between;
      .search {
        position: relative;
        max-width: 368px;
        width: 100%;
        img {
          position: absolute;
          top: 7px;
          right: 9px;
          width: 14px;
          height: 14px;
          cursor: pointer;
        }
        &::after {
          content: "";
          display: block;
          position: absolute;
          top: 7px;
          left: 5px;
          width: 17px;
          height: 17px;
          background: url("../../assets/images/search.svg") no-repeat center;
          background-size: contain;
          border-right: 1px solid #ffffff;
          padding-right: 10px;
        }
        input {
          background: #252424;
          width: 100%;
          border-radius: 7px;
          border: 0;
          outline: 0;
          padding: 7px 7px 7px 42px;
          color: #ffffff;
        }
      }
    }
    .row {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: flex-start;
      margin-top: 90px;
      .item {
        max-width: 350px;
        width: 100%;
        border-radius: 22px;
        overflow: hidden;
        background: #151515;
        margin-bottom: 20px;
        transition: 0.35s;
        text-decoration: none;
        margin: 10px;
        &:hover {
          background: #000000;
          box-shadow: 0 0 50px rgba(216, 0, 78, 0.57);
        }
        img {
          width: 100%;
          height: auto;
        }
        h3 {
          width: 100%;
          padding: 10px 20px 15px 20px;
        }
      }
    }
  }
}

@media (max-width: 834px) {
  .today-wrap {
    .container {
      padding: 85px 15px 81px 15px;
      .heading {
        .search {
          display: none;
        }
      }
      .row {
        justify-content: center;
        margin-top: 60px;
        .item {
          max-width: 317px;
        }
      }
    }
  }
}

@media (max-width: 480px) {
  .today-wrap {
    .container {
      padding: 48px 15px 25px 15px;

      .heading {
        .search {
          display: none;
        }
      }
      .row {
        justify-content: center;
        margin-top: 40px;
        .item {
          max-width: 169px;
          margin: 3.5px;
          border-radius: 10px;
          h3 {
            font-size: 11px;
            padding: 7px;
          }
        }
      }
      .buttons {
        margin-top: 34px;
      }
    }
  }
}

@media (max-width:382px) {
  .today-wrap{
    .container{
      .row {
        .item {
          max-width: 135px;
        }
      }
    }
  }
}
</style>