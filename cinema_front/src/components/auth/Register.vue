<template>
  <div id="template">
    <div class="containerFluid">
      <form @submit.prevent class="phone">
        <div class="wrap">
          <div class="phone">
            <input
                v-model="name"
                type="text"
                placeholder="Имя"
                class="phone text-white text-semi-bold h3"
            />
            <small class="error" v-if="larerrors.name">
              <i>{{ larerrors.name }}</i>
            </small>
          </div>
        </div>
        <div class="wrap">
          <div class="phone">
            <input
                v-model="email"
                type="email"
                placeholder="Эл. адрес"
                class="phone text-white text-semi-bold h3"
            />
            <small class="error" v-if="larerrors.email">
              <i>{{ larerrors.email }}</i>
            </small>
          </div>
        </div>

        <div class="wrap">
          <div class="select text-white text-semi-bold">
            <span @click="showAll = !showAll" class="h3">
            <template v-if="selected">{{ selected.code }}</template>
            <img
                src="@/assets/images/auth/arrow.svg"
                :class="{ rotate: showAll }"
            />
        </span>
            <transition name="urlChanged">
              <div class="options-wrap" v-if="showAll">
                <div class="options">
                  <div
                    v-for="(item, idx) in countries"
                    :key="idx"
                    class="option text-white text-regular p"
                    @click="selectItem(item)"
                  >
                    {{ item.value }}
                  </div>
                </div>
              </div>
            </transition>
          </div>
          <div class="phone">
            <input
                v-model="$v.phone.$model"
                type="tel"
                placeholder="Телефон"
                class="phone text-white text-semi-bold h3 smaller"
            />
            <small class="error" v-if="larerrors.login">
              <i>{{ larerrors.login }}</i>
            </small>
          </div>
        </div>
        <div class="wrap">
          <div class="select text-white text-semi-bold roles">
            <span @click="showRoles = !showRoles">
              <p v-if="selectedRole && role_name == 'Роль'">Роль</p>
              <p v-else-if="selectedRole && role_name == 'creator'">Правообладатель
              </p>
              <p v-else-if="selectedRole && role_name == 'cinema'">Кинотеатр</p>
              <img src="@/assets/images/auth/arrow.svg" :class="{ rotate: showRoles }" />
            </span>
            <transition v-if="showRoles">
              <div class="roleList" >
                <p v-for="(item, index) in roles" :key="index" @click="changeRole(item)" class="roleItem">
                  <span v-if="item=='cinema'">Кинотеатр</span>
                  <span v-else>Правообладатель</span>
                </p>
              </div>
            </transition>
          </div>
        </div>
        <button
            @click="submit"
            :disabled="$v.phone.$error"
            class="next text-white text-semi-bold"
        >
          Далее
        </button>
      </form>
    </div>
  </div>

</template>

<script>
import countries from "./Countries";

import {
  required,
  minLength,
  maxLength,
  numeric,
} from "vuelidate/lib/validators";
import axios from "axios";

export default {
  data: () => ({
    countries,
    role_name : 'Роль',
    showAll: false,
    showRoles: false,
    selected: null,
    selectedRole: 'Роль',
    phone: null,
    name: "",
    email: "",
    showModal: false,
    larerrors: "",
    roles: ['cinema', 'creator'],
    percent: 0,
  }),
  validations: {
    phone: {
      required,
      minLength: minLength(7),
      maxLength: maxLength(15),
      numeric,
    },
    sms: {
      required,
      numeric,
      minLength: minLength(3),
      maxLength: maxLength(7),
    },
  },
  mounted() {
    this.selected = countries.find((item) => item.code === "RU");
    this.selectedRole = this.roles[0]
    // this.phone = countries.find((item) => item.code === "RU").phoneCode;
  },
  methods: {
    selectItem(item) {
      this.selectedRole = item;
      this.showAll = false;
    },
    changeRole(item){
      this.role_name = item
        this.selectedRole = item
        this.showRoles = false;
    },
    submit() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/register", {
          name: this.name,
          email: this.email,
          country_code: this.selected.phoneCode,
          phone: this.phone,
          role_id: this.selectedRole,
          percent: this.percent
        })
        .then((res) => {
          this.larerrors = "";
          // console.log(res.data)
          localStorage.setItem("access_token", res.data.access_token);
          this.$router.push("/cinema").catch(() => {});
        })
        .catch((err) => {
          // localStorage.removeItem("user-token");
          // localStorage.removeItem("access_token");
          if (err.response.status == 401 || err.response.status == 422) {
            this.larerrors = err.response.data.errors;
          }
        });
    },
    login(res) {
      console.log(res);
      // this.$store.commit("setAuthToken", res.data.token);
      sessionStorage.setItem("access_token", res.data.access_token);
      this.$router.push("/cinema").catch(() => {});
    },
  },
};
</script>

<style lang="scss" scoped>
.roleItem{
  cursor: pointer;
}
.roleItem:first-letter{
  text-transform: capitalize;
}
.roleList > *{
  margin-bottom: 5px;
}
.roleList .roleItem:last-child span{
  border-bottom: 0 !important;
}
.roleList{
  position: absolute;
  padding: 10px;
  border-radius: 10px;
  background: #161616;
  z-index: 49;
  width: 100%;

}
.error {
  color: #d7004d;
  margin: 10px;
}
.phone {
  display: flex;
  flex-direction: column;
  align-items: center;
  .wrap {
    display: flex;
    width: 100%;
    position: relative;
    align-items: center;
    .select {
      span {
        display: flex;
        align-items: center;
        padding: 3px 10px 10px 10px;
        border-bottom: 1px solid #ffffff;
        cursor: pointer;
        margin-right: 15px;
        .rotate {
          transform: rotate(-180deg);
        }
        img {
          transition: 0.2s;
          margin-left: 7px;
        }
      }
      .options-wrap {
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
        padding-right: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
        background: #161616;
        z-index: 50;
        .options {
          overflow-y: scroll;
          min-height: 50px;
          max-height: 200px;

          .option {
            padding: 5px 5px 5px 10px;
            cursor: pointer;
          }
        }
      }
    }
    .phone {
      position: relative;
      max-width: 255px;
      input {
        padding-left: 15px;
      }
      &:after {
        content: "";
        position: absolute;
        left: 0;
        top: 3px;
        color: #ffffff;
        font-family: "SemiBold";
        font-size: 18px;
      }
    }
  }
  input {
    padding: 3px 10px 10px 10px;
    border: 0;
    border-radius: 0;
    border-bottom: 1px solid #ffffff;
    background: transparent;
    max-width: 278px;
    outline: 0;
    position: relative;
  }
  .smaller {
    width: 178px;
  }
  .next {
    padding: 18px 25px;
    border: 1px solid #fff;
    outline: 0;
    font-size: 14px;
    background: transparent;
    transition: 0.2s;
    cursor: pointer;
    margin-top: 63px;
    &:disabled {
      border: 1px solid #999999;
      color: #999999;
      &:hover {
        border: 1px solid #999999;
        color: #999999;
        background: transparent;
      }
    }
    &:hover {
      background: #fff;
      color: #000;
    }
  }
  .why {
    margin-top: 48px;
    display: flex;
    justify-content: center;
    position: relative;
    width: 100%;
    button {
      position: absolute;
      top: 15px;
      right: 15px;
      background: transparent;
      outline: 0;
      border: 0;
    }
    span {
      text-decoration: underline;
      cursor: pointer;
      font-size: 12px;
    }
    &-modal {
      position: absolute;
      bottom: -30px;
      left: 50%;
      max-width: 281px;
      width: 100%;
      padding: 25px 33px;
      background: #0b0b0b;
      border: 0.5px solid #777777;
      h3 {
        font-size: 14px;
      }
      ul {
        list-style: none;

        h3 {
          font-size: 14px;
        }
        li {
          color: #ffffff;
          margin-top: 15px;
          font-size: 10px;
          font-family: "Regular";
          line-height: 18, 13px;
          a {
            color: #ffffff;
          }
        }
      }
    }
  }
}
.roles{
  width: 100%;
}
.roles span{
  display: flex;
  align-items: center;
  padding: 3px 10px 10px 10px;
  border-bottom: 1px solid #ffffff;
  justify-content: space-between;
  cursor: pointer;
  margin-right: 0px !important;
}

@media (max-width: 600px) {
  .phone {
    .why {
      &-modal {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
      }
    }
  }
}

@media (max-width: 480px) {
  .phone {
    .wrap {
      max-width: 100% !important;
      width: 100% !important;

      .phone {
        max-width: 255px !important;
        width: 100% !important;
      }
      .smaller {
        width: 178px !important;
      }
    }
    .next {
      padding: 4px 25px;
    }
  }
}
</style>
