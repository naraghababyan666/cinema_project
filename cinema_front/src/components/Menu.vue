<template>
  <div class="menu bg-black">
    <button
      v-if="menuActive"
      class="close-menu-btn"
      @click="$emit('closeMenu')"
    >
      <img src="../assets/images/header/close.svg" alt="Menu" />
    </button>
    <ul class="menu-links">
      <li v-for="(item, idx) in routes" :key="idx">
        <router-link
          :to="item.path"
          class="text-white text-semi-bold"
          >{{ item.name }}</router-link
        >
      </li>
    </ul>
    <hr />
    <div>
      <ul
        v-for="(item, idx) in menuItems"
        :key="idx"
        class="menu-sublinks text-white text-semi-bold"
      >
        <div @click="toggleList(item)">
          {{ item.title }}
          <img
            v-if="item.links"
            :class="{ 'img-active': item.active }"
            src="../assets/images/header/arrow.svg"
            alt="Развернуть"
          />
        </div>
        <!-- <transition name="height"> -->
        <template v-if="item.active">
          <li v-for="(link, idx) in item.links" :key="idx">
            <router-link
              :to="{ name: link.link.name }"
              class="text-gray text-regular"
              >{{ link.name }}</router-link
            >
          </li>
        </template>
        <!-- </transition> -->
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "Menu",
  props: {
    menuActive: {
      required: true,
      type: Boolean,
    },
  },
  data() {
    return {
      routes: [
        { path: "/cinema", name: "Главная" },
        { path: "/about", name: "О системе" },
        { path: "/advertising", name: "Реклама" },
        { path: "/questions", name: "Вопросы" },
        { path: "/contact", name: "Контакты" },
      ],
      menuItems: [
        {
          title: "Для зрителей",
          links: [
            { name: "Фильмы онлайн", link: { name: "dashboard" } },
            { name: "Купить билет", link: { name: "/" } },
          ],
          active: false,
        },
        {
          title: "Для кинозала",
          links: [
            { name: "Муниципальные кинозалы", link: { name: "upload-docs" } },
            { name: "Частные кинозалы", link: { name: "" } },
          ],
          active: false,
        },
        {
          title: "Для производителей контента",
          links: [
            { name: "Онлайн площадка", link: { name: "/" } },
            { name: "Кинотеатры", link: { name: "/" } },
          ],
          active: false,
        },
        {
          title: "Билетная система",
          link: "",
        },
      ],
    };
  },
  methods: {
    toggleList(item) {
      item.active = !item.active;
    },
  },
};
</script>

<style lang="scss" scoped>
.menu {
  padding: 145px 158px 108px 108px;
  // max-width: 800px;
  width: 50vw;
  height: 100vh;
  position: fixed;
  top: 0;
  right: 0;
  border-left: 1px solid #ffffff;
  overflow-x: hidden;
  overflow-y: scroll;
  z-index: 100;
  &::-webkit-scrollbar {
    display: none;
  }

  /* Hide scrollbar for IE, Edge and Firefox */
  & {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
  }
  .close-menu-btn {
    position: absolute;
    right: 151px;
    top: 22px;
    width: 38px;
    height: 38px;
    border: 1px solid #ffffff;
    border-radius: 50%;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
    outline: 0;
    transition: 0.2s;
    &:hover {
      img {
        width: 15px;
        height: 15px;
      }
    }
    img {
      width: 20px;
      height: 20px;
      transition: 0.2s;
    }
  }
  ul.menu-links {
    list-style-type: none;
    li {
      margin-top: 25px;
      &:nth-child(1) {
        margin-top: 0;
      }
      a {
        text-decoration: none;
        font-size: 20px;
        letter-spacing: 1.5px;
        &:hover {
          text-decoration: underline;
        }
      }
    }
  }
  hr {
    height: 1px;
    background: #ffffff;
    margin: 45px 0;
  }
  ul.menu-sublinks {
    list-style-type: none;
    margin-top: 20px;
    cursor: pointer;
    &:first-child {
      margin-top: 0;
    }
    div {
      font-size: 20px;
      margin-bottom: 25px;
      display: flex;
      align-items: center;
      &:hover {
        text-decoration: underline;
      }
      img {
        margin-left: 13px;
        transform: rotate(180deg);
        transition: 0.2s;
      }
      .img-active {
        transform: rotate(0);
      }
    }
    li {
      margin-top: 5px;
      &:nth-child(1) {
        margin-top: 0;
      }
      a {
        font-size: 16px;
        letter-spacing: 1px;
        &:hover {
          text-decoration: none;
        }
      }
    }
  }
}
@media screen and (max-width: 920px) {
  .menu {
    padding: 50px 39px 50px 39px;
    max-width: 100%;
    width: 100%;
    border-left: 0;
    .close-menu-btn {
      position: absolute;
      right: 15px;
      top: 11px;
    }
  }
}
</style>
