<template>
  <div class="today-wrap">
    <Header />
    <div class="container">
      <arrow-back />
      <div class="heading">
        <title-decor text="Мои фильмы" :img="TitleIcon" />
        <div class="search">
          <input
            v-model="search"
            placeholder="Поиск по названию фильма"
            class="t-white text-medium"
          />
          <img
            @click="search = ''"
            src="@/assets/images/close.svg"
            alt="Отменить"
          />
        </div>
      </div>
      <div class="buttons">
        <button
          @click="showActive = true"
          class="h3 text-white text-semi-bold"
          :class="{ active: showActive }"
        >
          В прокате
        </button>
        <button
          @click="showActive = false"
          class="h3 text-white text-semi-bold"
          :class="{ active: !showActive }"
        >
          Вышли из проката
        </button>
      </div>
      <div class="row" v-if="loaded">
        <router-link
          :to="
            item.active
              ? `/cinema/forHolders/my-films/info/retired/${item.id}`
              : `/cinema/forHolders/my-films/info/${item.id}`
          "
          v-for="(item, idx) in items"
          :key="idx"
          class="item"
        >
          <img :src="`${baseUrl}storage/${item.image}`" alt=". not found" />
          <h3 class="text-white text-semi-bold">{{ item.title }}</h3>

        </router-link>

      </div>
      <dot-loader v-else />
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
import DotLoader from "@/components/DotLoader";
import axios from "axios";
import TitleIcon from "@/assets/images/for-holders-page/carousel/item3.svg";

export default {
  components: {
    BtnGroup,
    TitleDecor,
    Header,
    Footer,
    ArrowBack,
    DotLoader,
  },
  computed: {
    filteredList() {
      return this.items.filter((item) => {
        if (this.showActive) {
          return (
            item.name.toLowerCase().includes(this.search.toLowerCase()) &&
            item.active
          );
        } else {
          return (
            item.name.toLowerCase().includes(this.search.toLowerCase()) &&
            !item.active
          );
        }
      });
    },
  },
  data: () => ({
    search: "",
    showActive: true,
    TitleIcon,
    loaded: false,
    baseUrl: process.env.VUE_APP_API_URL,
    items: [],
  }),
  mounted() {
    this.getFilms();
    // axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/my-films').then((res) => {
    //   if (res.data.NotVerifiedDocuments) {
    //     this.$router.back()
    //   }
    // })
  },
  methods: {
    getFilms() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/my-films", {
          token: localStorage.getItem('access_token'),
        })
        .then((res) => {
          this.items = res.data;
          this.loaded = true;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
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
    .buttons {
      margin-top: 64px;
      button {
        padding: 8px 15px;
        border: 1px solid #7c7c7c;
        background: transparent;
        outline: 0;
        border-radius: 0;
        color: #7c7c7c;
        cursor: pointer;
        transition: 0.2s;
      }
      .active {
        border: 1px solid #ffffff;
        color: #ffffff;
      }
    }
    .row {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: flex-start;
      margin-top: 80px;
      margin-bottom: 50px;
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
      padding: 87px 15px 81px 15px;
      .heading {
        flex-wrap: wrap;
        h1 {
          margin-bottom: 15px;
        }
        .search {
          max-width: 317px;
        }
      }
      .buttons {
        margin-top: 40px;
      }
      .row {
        justify-content: center;
        margin-top: 40px;
        .item {
          max-width: 300px;
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
        h1 {
          margin-bottom: 50px;
        }
      }
      .buttons:nth-child(1) {
        margin-top: 25px;
        button {
          font-size: 12px !important;
        }
      }

      .row {
        margin-bottom: 25px;
        .item {
          max-width: 170px;
          font-size: 11px;
          border-radius: 10px;
          // margin: 3.5px;
          h3 {
            padding: 10px 7px;
          }
        }
      }
    }
  }
}
</style>