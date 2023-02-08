<template>
  <div class="wrap">
    <VueSlickCarousel
      v-if="desktopCarousel"
      ref="c1"
      :focusOnSelect="true"
      :slidesToShow="4"
      :slidesToScroll="1"
      :infinite = "true"
      :arrows="false"
      class="main"
    >
      <router-link
        v-for="(item, idx) in items"
        :key="idx"
        :to="{name: item.url}"
        class="item"
      >
        <div class="image">
          <img :src="item.img" alt="" />
        </div>
        <div class="line"></div>
        <h3 class="text-white text-semi-bold">{{ item.title }}</h3>
      </router-link>
    </VueSlickCarousel>
    <div v-if="desktopCarousel" @click="$refs.c1.prev()" class="prev">
      <img :src="ArrowIcon" alt="" />
    </div>
    <div v-if="desktopCarousel" @click="$refs.c1.next()" class="next">
      <img :src="ArrowIcon" alt="" />
    </div>

    <!-- mobile carousel -->
    <div v-if="!desktopCarousel" class="carousel-wrap">
      <div class="carousel">
        <router-link
          v-for="(item, idx) in items"
          :key="idx"
          :to="{name: item.url}"
          class="item"
        >
          <span>{{ item.title }}</span>
          <div class="image">
            <img :src="item.img" alt="" />
          </div>
          <div class="line"></div>
          <h3 class="text-white text-semi-bold">{{ item.title }}</h3>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";

import ArrowIcon from "@/assets/images/for-holders-page/carousel/arrow.svg";
// import item1 from "@/assets/images/for-holders-page/carousel/item1.svg";
import item2 from "@/assets/images/for-holders-page/carousel/item2.svg";
import item3 from "@/assets/images/for-holders-page/carousel/item3.svg";
import item4 from "@/assets/images/for-holders-page/carousel/item4.svg";
import item5 from "@/assets/images/for-holders-page/carousel/item5.svg";
import axios from "axios";

export default {
  components: { VueSlickCarousel },
  data() {
    return {
      desktopCarousel: true,
      ArrowIcon,
      items: [
        // { img: item1, title: "Рейтинг Extracinema", url: "ec-rating" },
        { img: item2, title: "Сегодня в прокате", url: "ec-today" },
        { img: item4, title: "Отчеты и документы", url: "ec-documents" },
        { img: item5, title: "Мои финансы", url: "ec-finance" },


        // { img: item2, title: "Сегодня в прокате", url: "ec-today" },
        // // { img: item3, title: "Мои фильмы", url: "ec-myfilms" },
        // { img: item4, title: "Отчеты и документы", url: "ec-documents" },
      ],
    };
  },
  mounted() {
    if (window.screen.width < 834) {
      this.desktopCarousel = false;
    }
    axios.post(process.env.VUE_APP_API_URL + "api/forHolders/carousel").then((res) => {
      if(res.data[0] == 'has'){
        this.items.push({ img: item3, title: "Мои фильмы", url: "ec-myfilms" })
      }else{
        this.items.push({ img: item3, title: "Мои фильмы", url: "ec-myfilms-add" })
      }
    })
  },
};
</script>

<style lang="scss" scoped>

.svg-icon {
  path,
  polygon,
  rect {
    fill: white;
  }
}
.wrap {
  position: relative;
  .main {
    margin-top: 100px;
    a {
      max-width: 266px;
      width: 100%;
      margin: 0 10px; //hack
      height: 198px;
      background: #000000;
      border: 1px solid #ffffff;
      border-radius: 10px;
      padding: 25px 10px 25px 10px;
      outline: 0;
      text-align: center;
      transition: 0.2s;
      text-decoration: none;
      &:hover {
        background: #181818;
        border: 1px solid #181818;
      }
      .image {
        height: 66px;
        display: flex;
        align-items: center;
        img {
          margin: auto;
        }
      }
      .line {
        width: 75px;
        height: 7px;
        background: #d8004e;
        margin: 26px auto;
      }
      h3 {
        font-size: 16px;
      }
    }
  }
  .prev,
  .next {
    width: 42px;
    height: 42px;
    position: absolute;
    top: calc(50% - 21px);
    &:hover {
      img {
        filter: brightness(50%);
      }
    }
    img {
      width: 100%;
      height: 100%;
      transition: 0.2s;
    }
  }
  .prev {
    transform: rotate(180deg);
    left: 11px;
  }
  .next {
    right: 9px;
  }

  //mobile carousel
  .carousel-wrap {
    padding: 0 40px;
    background: transparent;
    .carousel {
      display: flex;
      overflow-x: scroll;
      margin-top: 148px;
      padding-bottom: 90px;
      a {
        min-width: 266px;
        width: 100%;
        margin: 0 10px; //hack
        height: 198px;
        background: #000000;
        border: 1px solid #ffffff;
        border-radius: 10px;
        padding: 25px 10px 25px 10px;
        outline: 0;
        text-align: center;
        transition: 0.2s;
        text-decoration: none;
        &:last-child {
          margin-right: 90px !important;
        }
        &:hover {
          background: #181818;
          border: 1px solid #181818;
        }
        .image {
          height: 66px;
          display: flex;
          align-items: center;
          img {
            margin: auto;
          }
        }
        .line {
          width: 75px;
          height: 7px;
          background: #d8004e;
          margin: 26px auto;
        }
        h3 {
          font-size: 16px;
        }
      }
    }
  }
}

@media screen and (max-width: 745px) {
  .wrap {
    .carousel-wrap {
      padding: 0 15px;
      .carousel {
        padding-bottom: 40px;
        a {
          padding: 15px 15px 15px 15px;
          min-width: 149px;
          max-height: 127px;
          margin: 0 9px;
          &:first-child{ margin-left: 0;}
          &:last-child{margin-right: 0;}
          .image {
            height: 30px;
            width: 30px;
            margin: auto;
            display: flex;
            align-items: center;
            img {
              width: 100%;
              height: auto;
            }
          }
          .line {
            margin: 15px auto;
            width: 50px;
          }
          h3 {
            font-size: 14px;
            font-family: "Regular" !important;
          }
        }
      }
    }
  }
}
@media screen and (max-width:480px) {
  .wrap .carousel-wrap .carousel{
    margin-top: 60px;
  }
}
@media screen and (max-width: 350px)  {
.carousel-wrap {
  padding: 0 5px !important;
}
}
</style>