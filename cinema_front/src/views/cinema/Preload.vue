<template>
  <lottie
    :options="defaultOptions"
    :height="400"
    :width="400"
    :autoplay="true"
    v-on:animCreated="handleAnimation"
    class="loader"
  />
</template>

<script>
import lottie from "vue-lottie";
import * as animationData from "@/assets/cinemaPreloader.json";

export default {
  name: "Preload",
  components: { lottie },
  data() {
    return {
      defaultOptions: { animationData: animationData.default },
      animationSpeed: 1,
    };
  },
  methods: {
    handleAnimation: function (anim) {
      this.anim = anim;
    },

    stop: function () {
      this.anim.stop();
    },

    play: function () {
      this.anim.play();
    },

    pause: function () {
      this.anim.pause();
    },

    onSpeedChange: function () {
      this.anim.setSpeed(this.animationSpeed);
    },
  },
};
</script>

<style lang="scss" scoped>
.loader {
  transform: scale(2);
  display: flex;
  justify-content: center;
  align-items: center;
}

@media screen and (max-width: 370px) {
  .loader {
    transform: scale(1) translateX(-20px);
  }
}
</style>
