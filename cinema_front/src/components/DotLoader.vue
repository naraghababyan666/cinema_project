<template>
  <div class="loader">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>
</template>


<style lang="scss" scoped>
.loader {
  display: flex;
  justify-content: center;
  .dot {
    width: 21px;
    height: 21px;
    border-radius: 50%;
    background: #d8004e;
    filter: blur(5px);
    margin: 0 12px;
    animation: loader 1000ms infinite;
    &:nth-child(2) {
      animation-delay: 200ms;
    }
    &:nth-child(3) {
      animation-delay: 400ms;
    }
  }
}

@keyframes loader {
  0% {
    transform: scale(1);
    filter: blur(5px);
  }
  50% {
    transform: scale(1.3);
    filter: blur(7px);
  }
  100% {
    transform: scale(1);
    filter: blur(5px);
  }
}
</style>