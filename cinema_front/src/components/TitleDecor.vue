<template>
  <h1 class="text-white text-semi-bold">
    <img :src="img" :alt="text" />
    <span>{{text}}</span>
  </h1>
</template>

<script>
export default {
  props: ["text", "img"],
};
</script>
<style lang="scss" scoped>
h1 {
  display: flex;
  align-items: center;
  img {
    width: 68px;
    height: 68px;
    margin-right: 27px;
  }
  span {
    padding-bottom: 18px;
    border-bottom: 7px solid #d8004e;
  }
}

@media (max-width: 834px) {
  h1 {
    img {
      width: 46px;
      height: 46px;
    }
    span {
      padding-bottom: 10px;
    }
  }
}

@media (max-width: 480px) {
  h1 {
    img {
      width: 30px;
      height: 30px;
      margin-right: 5px;
    }
    span {
      padding-bottom: 7px;
      border-bottom: 5px solid #d8004e;
    }
  }
}
</style>