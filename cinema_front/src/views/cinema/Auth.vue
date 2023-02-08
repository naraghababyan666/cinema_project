<template>
  <div class="auth">
    <Header />
    <div class="wrap bg-black">
      <div class="container">
        <h1 class="text-white text-semi-bold">{{title}}</h1>
        <div class="buttons">
          <button
            class="text-semi-bold text-gray"
            :class="{ active: method === 'phone' }"
            @click="method = 'phone'; title = 'Войти'"
          >
            Телефон
          </button>
          <button
            class="text-semi-bold text-gray"
            :class="{ active: method === 'email' }"
            @click="method = 'email'; title = 'Войти'"
          >
            Email
          </button>
        </div>
        <component :is="method" @changeTitle="changeTitle" @registration="registration"/>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Phone from "@/components/auth/Phone";
import Email from "@/components/auth/Email";
import Register from "@/components/auth/Register";

export default {
  components: { Header, Footer, Phone, Email, Register },
  data: () => ({
    method: "phone",
    title: "Войти",
    reg: false,
  }),
  methods: {
    changeTitle(title) {
      this.title = title;
    },
    registration() {
      this.title = "Регистрация";
      this.method = "Register";
    },
  },
};
</script>


<style lang="scss" scoped>
.auth {
  .wrap {
    min-height: calc(100vh - 260px);
    display: flex;
    align-items: center;
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      .buttons {
        h2 {
          text-align: center;
        }
        button {
          font-size: 14px;
          padding: 12px 14px;
          border: 1px solid #999999;
          border-radius: 50px;
          background: transparent;
          outline: 0;
          transition: 0.2s;
          cursor: pointer;
          margin: 50px 8.5px 40px 8.5px;
          &:hover {
            color: #ffffff;
            border: 1px solid #ffffff;
          }
        }
        .active {
          background: #d8004e;
          color: #ffffff;
          border: 1px solid #d8004e;
          &:hover {
            border: 1px solid #d8004e;
          }
        }
      }
    }
  }
}
@media (max-width: 480px) {
  .auth {
    .wrap {
      .container {
        .buttons {
          button {
            padding: 8px 14px;
          }
        }
      }
    }
  }
}
</style>