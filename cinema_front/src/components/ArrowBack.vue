<template>
  <a @click.prevent="$router.back()" class="text-white text-regular arrow-back">
    <img src="../assets/images/cinema-for-halls-page/arrow_back.svg" alt="Назад" />
    Вернуться назад
  </a>
</template>

<script>
export default {
  name: "ArrowBack",
};
</script>

<style lang="scss" scoped>
.arrow-back {
  position: absolute;
  top: 11px;
  left: 5px;
  display: flex;
  align-items: center;
  text-decoration: none;
  color: #999999;
  transition: 0.2s;
  outline: none;
  cursor: pointer;
  &:hover {
    color: #ffffff;
    img {
      filter: brightness(200%);
    }
  }
  img {
    margin-right: 10px;
    transform: translateY(2px);
    transition: 0.2s;
  }
}
@media screen and (max-width: 480px) {
  .arrow-back {
    font-size: 12px;
    img {
      width: 20px;
      height: 20px;
      margin-right: 7px;
    }
  }
}
</style>