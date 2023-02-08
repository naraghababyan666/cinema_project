<template>
  <header class="bg-black">
    <nav :class="[{ 'container-fluid': fluid }, { container: !fluid }]">
      <router-link to="/" class="logo">
        <div>
          <img src="../assets/images/logo.svg" alt="Logo" />
          <span class="text-semi-bold text-white">ExtraCinema</span>
        </div>
        <span class="text-medium-italic text-white">— Опережая будущее</span>
      </router-link>
      <ul class="menu">
        <li v-for="(item, idx) in routes" :key="idx">
          <router-link
            :to="item.path"
            class="text-regular text-gray"
            active-class="current-page"
            >{{ item.name }}</router-link
          >
        </li>
      </ul>
      <div class="buttons">
        <router-link v-if="!access_token" :to="{name: 'ec-login'}" class="enter-btn text-semi-bold text-white">
          Войти
          <img src="../assets/images/header/enter.svg" alt="Login" />
        </router-link>
        <LogoutBtn v-else class="enter-btn text-semi-bold text-white"/>
        <button class="menu-btn" @click="toggleMenu">
          <img src="../assets/images/header/burger.svg" alt="Menu" />
        </button>
      </div>
    </nav>
    <transition name="slide">
      <Menu
        v-if="menuActive"
        :menu-active="menuActive"
        v-on:closeMenu="toggleMenu"
      />
    </transition>
  </header>
</template>

<script>
import Menu from "@/components/Menu";
import LogoutBtn from "@/components/LogoutBtn";
export default {
  name: "Header",
  props: {
    fluid: {
      required: false,
      type: Boolean,
    },
  },
  data() {
    return {
      access_token: '',
      routes: [
        { path: "/cinema", name: "Главная" },
        { path: "/about", name: "О системе" },
        { path: "/advertising", name: "Реклама" },
        { path: "/questions", name: "Вопросы" },
        { path: "/contact", name: "Контакты" },
      ],
      menuActive: false,
    };
  },
  methods: {
    toggleMenu() {
      this.menuActive = !this.menuActive;
    },
  },
  mounted() {
    this.access_token = localStorage.getItem('access_token')
  },
  components: { Menu, LogoutBtn },
};
</script>

<style lang="scss" scoped>
header {
  border-bottom: 0.5px solid #777777;
  nav {
    display: flex;
    justify-content: space-between;
    padding: 20px 30px;
    align-items: center;
    .logo {
      text-decoration: none;
      display: flex;
      flex-direction: column;
      align-items: center;
      div {
        display: flex;
        align-items: center;
        img {
          width: 42px;
          height: 31px;
          margin-right: 5px;
        }
        span {
          font-size: 16px;
        }
      }
      span {
        font-size: 12px;
      }
    }
    .menu {
      list-style-type: none;
      display: flex;
      max-width: 444px;
      width: 100%;
      justify-content: space-between;
      li a {
        font-size: 14px;
        text-decoration: none;
        &:hover {
          color: #ffffff;
          text-decoration: underline;
        }
      }
      .current-page {
        color: #ffffff;
        text-decoration: underline;
      }
    }
    .buttons {
      display: flex;
      align-items: center;
      .enter-btn {
        padding: 10px 12px 10px 30px;
        height: 38px;
        border: 1px solid #ffffff;
        border-radius: 50px;
        display: flex;
        align-items: center;
        text-decoration: none;
        margin-right: 35px;
        font-size: 14px;
        transition: 0.2s;
        &:hover {
          color: #000000;
          background: #ffffff;
          img {
            filter: brightness(0%);
          }
        }
        img {
          margin-left: 10px;
          transition: 0.2s;
        }
      }
      .menu-btn {
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
            width: 14px;
            height: 14px;
          }
        }
        img {
          width: 6px;
          height: 6px;
          transition: 0.2s;
        }
      }
    }
  }
}
@media screen and (max-width: 835px) {
  header {
    nav {
      padding: 20px 38px;
      .menu {
        display: none;
      }
      .buttons {
        .enter-btn {
          margin-right: 25px;
          height: 40px;
        }
      }
    }
  }
}
@media screen and (max-width: 480px) {
  header {
    nav {
      .logo {
        div {
          img {
            width: 48px;
            height: 36px;
            margin-right: 0;
          }
          span {
            display: none;
          }
        }
        span {
          display: none;
        }
      }
      .buttons {
        .enter-btn {
          position: absolute;
          top: 20px;
          left: calc(50% - 37px);
          border: 0;
          font-size: 12px;
          margin-right: 0;
          padding: 0;
          background: #000 !important;
          img {
            filter: none;
            width: 25px;
            height: 25px;
            margin-left: 7px;
          }
        }
        .menu-btn {
          position: absolute;
          right: 38px;
          top: 20px;
        }
      }
    }
  }
}
</style>
