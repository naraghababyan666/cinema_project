<template>
  <div class="buttons">
    <router-link :to="{name: 'ec-upload'}" class="link text-white text-semi-bold">
      <div class="btn-decor">
        <img :src="UploadContentIcon" alt="Заказать" />
      </div>
      <span class="btn-text">Загрузить новый контент</span>
    </router-link>
    <router-link to class="link">
      <div class="btn-decor">
        <img :src="SettingsIcon" alt="Служба поддержки" />
      </div>
      <div class="btn-text text-white text-semi-bold">Служба поддержки</div>
    </router-link>
  </div>
</template>

<script>
import UploadContentIcon from "@/assets/images/for-holders-page/upload-content.svg";
import SettingsIcon from "@/assets/images/cinema-for-halls-page/settings_icon.svg";

export default {
  data: () => ({ UploadContentIcon, SettingsIcon }),
};
</script>

<style lang="scss" scoped>
.buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 82px;
  .link {
    max-width: calc(50% - 10.5px);
    width: 100%;
    height: 86px;
    display: flex;
    align-items: center;
    background: #27ae60;
    border-radius: 10px;
    text-decoration: none;
    transition: 0.2s;
    &:hover {
      background: #279e48;
      .btn-decor {
        background: #ffffff;
        img {
          filter: brightness(0%);
        }
      }
    }
    .btn-decor {
      border-radius: 10px;
      background: #444444;
      box-shadow: 10px 13px 25px rgba(0, 0, 0, 0.26);
      height: 86px;
      width: 86px;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: 0.2s;
      img {
        transition: 0.2s;
      }
    }
    .btn-text {
      width: calc(100% - 86px);
      text-align: center;
      font-size: 18px;
    }
  }
}

@media (max-width: 834px) {
  .buttons {
    justify-content: center;
    flex-wrap: wrap;
    .link {
      max-width: 269px;
      width: 100%;
      border-radius: 0;
      height: 50px;
      margin: 0 5px;
      .btn-decor {
        height: 50px;
        width: 50px;
        border-radius: 0;
        img {
          width: 30px;
          height: 30px;
        }
      }
      .btn-text {
        text-align: left;
        padding-left: 15px;
        font-size: 12px;
      }
    }
  }
}

@media (max-width: 572px) {
  .buttons {
    margin-top: 50px;
    .link:nth-child(2) {
      margin-top: 10px;
    }
  }
}
</style>