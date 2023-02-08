<template>
  <div class="dropdown">
    <span class="title text-regular">Выбрать платежную систему</span>
    <div
      class="select"
      @click="btnClicked = !btnClicked"
      :class="{border: btnClicked}"
    >
      <div class="wrap">
        <img :src="activeOption.icon" alt="" />
        <span class="text-white text-semi-bold">{{ activeOption.name }}</span>
      </div>
      <div class="toggle-btn">
        <img
          :class="{ btn_active: btnClicked }"
          src="../../assets/images/arrow_drop.svg"
          alt=""
        />
      </div>
    </div>
    <transition name="urlChanged">
      <ul v-if="btnClicked">
        <li v-for="(option, idx) in options" :key="idx" @click="select(option)">
          <img :src="option.icon" alt="" />
          <span class="text-white text-semi-bold">{{ option.name }}</span>
        </li>
      </ul>
    </transition>
    <Btn className="pay-btn" text="Оплатить" :fluid="fluid" :center="!fluid" />
  </div>
</template>

<script>
import Extra from "@/assets/images/common/extra.svg";
import Paypal from "@/assets/images/common/paypal.svg";
import AdvCash from "@/assets/images/common/advcash.svg";
import Payeer from "@/assets/images/common/payeer.svg";
import Btn from "@/components/Btn";

export default {
  name: "PaymentSystem",
  components: { Btn },
  data() {
    return {
      btnClicked: false,
      fluid: true,
      activeOption: {
        name: "ExtraFinTach",
        icon: Extra,
      },
      options: [
        {
          name: "ExtraFinTach",
          icon: Extra,
        },
        {
          name: "PayPal",
          icon: Paypal,
        },
        {
          name: "Payeer",
          icon: Payeer,
        },
        {
          name: "AdvCash",
          icon: AdvCash,
        },
      ],
    };
  },
  mounted() {
    if (window.screen.width <= 480) {
      this.fluid = false;
    }
  },
  methods: {
    select(option) {
      this.border = "0px";
      this.activeOption = option;
      this.btnClicked = !this.btnClicked;
    },
  },
};
</script>

<style lang="scss" scoped>
.dropdown {
  max-width: 365px;
  width: 100%;
  position: relative;
  .title {
    color: #777777;
    font-size: 14px;
  }
  .border {
    border-radius: 10px 10px 10px 0 !important;
  }
  .select {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 42px;
    overflow: hidden;
    cursor: pointer;
    margin-top: 10px;
    border-radius: 10px;
    transition: .2s;
    .wrap {
      display: flex;
      align-items: center;
      background: #262626;
      padding: 13px 18px;
      width: calc(100% - 46px);
      img {
        margin-right: 17px;
      }
      span {
        font-size: 14px;
      }
    }
    .toggle-btn {
      background: #302f2f;
      width: 46px;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      &:hover img {
        filter: brightness(50%);
      }
      img {
        transform: rotate(180deg);
        transition: 0.2s;
      }
      .btn_active {
        transform: rotate(0);
      }
    }
  }
  ul {
    position: absolute;
    left: 0;
    top: 70px;
    width: calc(100% - 46px);
    list-style-type: none;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    overflow: hidden;
    z-index: 10;

    li {
      padding: 12px 18px;
      background: #292929;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      cursor: pointer;
      margin-top: -1px; //hack
      img {
        margin-right: 17px;
      }
      span {
        font-size: 14px;
      }
    }
  }
  .pay-btn {
    margin-top: 60px;
  }
}

@media screen and (max-width: 480px) {
  .dropdown {
    width: 300px;
    // width: 100%;
    .select {
      width: 100%;
    }
  }
}
</style>