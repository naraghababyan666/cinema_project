<template>
  <ul class="sidebar" :class="{ closed: closed }">
    <li @click="closed = !closed" class="text-regular arrow">
      <div><img :src="arrow" alt="" /></div>
      <span v-if="!closed">Свернуть</span>
    </li>
    <li v-for="(item, idx) in menuItems" :key="idx">
      <button @click="clickHandler(item)" :class="{ active: item.active }">
        <div class="icon">
          <img :src="item.imgUrl" :alt="item.name" />
        </div>
        <transition name="width">
          <span v-if="!closed" class="text-white text-regular">{{
            item.name
          }}</span>
        </transition>
      </button>
      <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          className="bi bi-star-fill" viewBox="0 0 16 16">
        <path
            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>
    </li>
  </ul>
</template>

<script>
import arrow from "@/assets/images/cinema-order-equipment-page/arrow_green.svg";
import item1 from "@/assets/images/dashboard/sidebar/item1.svg";
import item2 from "@/assets/images/dashboard/sidebar/item2.svg";
import item3 from "@/assets/images/dashboard/sidebar/item3.svg";
import item4 from "@/assets/images/dashboard/sidebar/item4.svg";
import item5 from "@/assets/images/dashboard/sidebar/item5.svg";
import item6 from "@/assets/images/dashboard/sidebar/item6.svg";
import item7 from "@/assets/images/dashboard/sidebar/item7.svg";
import item8 from "@/assets/images/dashboard/sidebar/item8.svg";
import item9 from "@/assets/images/dashboard/sidebar/item9.svg";
import item10 from "@/assets/images/dashboard/sidebar/item10.svg";

export default {
  name: "Sidebar",
  methods: {
    clickHandler(item) {
      this.$emit("sidebarClick", item.url);

      this.currentView = item.url; //local current view to manage active buttons
      if (item.url === this.currentView) {
        this.menuItems.forEach((el) => (el.active = false));
        item.active = true;
      }
    },
  },
  data() {
    return {
      arrow,
      closed: false,
      currentView: "company",
      menuItems: [
        {
          name: "Личный кабинет",
          url: "cabinet", //value will be emitted to ../Dashboard.vue
          imgUrl: item1,
          active: true,
        },
        {
          name: "Название компании",
          url: "company",
          imgUrl: item2,
          active: false,
        },
        {
          name: "Серийный номер проектора",
          url: "projector",
          imgUrl: item3,
          active: false,
        },
        {
          name: "Мои кинозалы",
          url: "myHalls",
          imgUrl: item4,
          active: false,
        },
        {
          name: "Ответственные лица",
          url: "persons",
          imgUrl: item5,
          active: false,
        },
        {
          name: "Начать сеанс",
          url: "startSession",
          imgUrl: item6,
          active: false,
        },
        {
          name: "Документы ЕАИС",
          url: "documents",
          imgUrl: item7,
          active: false,
        },
        {
          name: "Мои финансы",
          url: "payment",
          imgUrl: item8,
          active: false,
        },
        {
          name: "Рейтинг ExtraCinema",
          url: "rating",
          imgUrl: item9,
          active: false,
        },
        {
          name: "Рекламный раздел",
          url: "advertising",
          imgUrl: item10,
          active: false,
        },
      ],
    };
  },
  mounted() {
    if (window.screen.width <= 1024) {
      this.closed = true;
    }
  },
};
</script>

<style lang="scss" scoped>
.sidebar > *{
  display: flex;
}
.closed {
  .arrow div img {
    transform: rotate(0) !important;
  }
}
.sidebar {
  background: #000000;
  border-right: 1px solid #777777;
  * {
    transition: 0.2s;
  }
  .arrow {
    display: none;
    color: #9f9f9f;
    font-size: 16px;
    align-items: center;
    cursor: pointer;
    &:hover {
      text-decoration: underline;
    }
    div {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      img {
        transform: rotate(-180deg);
        height: 20px;
        height: 20px;
      }
    }
    span {
      margin-left: 12px;
    }
  }
  li {
    padding: 19px 32px 19px 32px;
    border-bottom: 0.5px solid #777777;
    &:last-child {
      border-bottom: 0;
      position: relative;
      //hack
      &::before {
        content: "";
        display: block;
        height: 200vh;
        width: 0.5px;
        background: #777777;
        position: absolute;
        right: -0.5px;
        bottom: -200vh;
        z-index: 0;
      }
    }
    &:hover {
      button {
        .icon {
          background: #ffffff;
          img {
            filter: brightness(0);
          }
        }
      }
    }
    button {
      display: flex;
      align-items: center;
      text-decoration: none;
      background: transparent;
      outline: 0;
      border: 0;
      text-align: left;
      width: 100%;
      cursor: pointer;
      .icon {
        min-width: 40px;
        min-height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
      }
      span {
        font-size: 16px;
        margin-left: 12px;
        width: 170px;
      }
    }
    .active {
      .icon {
        background: #ffffff;
        img {
          filter: brightness(0);
        }
      }
      span {
        font-family: "SemiBold";
      }
    }
  }
}

@media screen and (max-width: 1024px) {
  .sidebar li {
    padding: 19px 15px 19px 15px;
  }
  .sidebar .arrow {
    display: flex;
  }
}
@media screen and (max-width: 480px) {
  .sidebar li {
    padding: 14px 8px;
    span {
      color: #9f9f9f;
    }
    .active {
      span {
        font-family: "Regular";
      }
    }
  }
  .sidebar li button .icon,
  .sidebar .arrow div {
    min-width: 34px;
    min-height: 34px;
    width: 34px;
    height: 34px;
  }
}

//work on this animation later
.width-enter-active,
.width-leave-active {
  transition: width opacity 0.5s;
  opacity: 1;
  width: 170px;
}
.width-enter,
.width-leave-to {
  width: 0;
  opacity: 0;
}
</style>