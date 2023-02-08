<template>
  <div>
  <arrow-back href="cinema/dashboard" />
  <video
      id="video"
    v-show="showTest"
    v-if="videoUrl"
    ref="player"
    :src="`${baseUrl}storage/${videoUrl}`"
    width="100%"
    height="90%"
    frameborder="1"
    autoplay
  ></video>
  <h1 v-else class="text-red loader">{{ message }}</h1>
  </div>
</template>

<script>
import axios from "axios";
import ArrowBack from "@/components/ArrowBack";

export default {
  data() {
    return {
      showTest: true,
      baseUrl: process.env.VUE_APP_API_URL,
      videoUrl: null,
      duration1: null,
      seconds: 60,
      message: "",
    };
  },
  components: {
    ArrowBack
  },
  mounted() {

    setTimeout(() => this.$refs.player.pause(), 30000)
  },
  created() {
    this.getUrl();
  },
  updated() {
    if (this.$route.name != "ec-seance") {
      this.playPart();
    }
  },
  methods: {
    duration(){
      console.log()
    },
    getUrl() {
      axios
        .post(
          `${process.env.VUE_APP_API_URL}api/seances/${this.$route.params.id}`,
          { token: localStorage.getItem('access_token'), type: this.$route.name }
        )
        .then((res) => {
          this.videoUrl = res.data.film.file;
          this.duration = res.data.film.duration;
        })
        .catch((err) => {
          if (err.response.status == 401) {
            this.$store.commit("deleteAuthToken");
            alert("Ошибка аутентификации. Пожалуйста, войдите снова.");
            this.$router.push("/login").catch(() => {});
          } else if (err.response.status == 423) {
            this.message = err.response.data;
            this.countDownTimer();
          }
          console.log(err);
        });
    },
    playPart() {
      const media = document.querySelector("video");
      media.currentTime = Math.floor(Math.random() * (this.duration - 1)) * 60;
      this.countDownTimer();
    },
    countDownTimer() {
      if (this.seconds > 0) {
        setTimeout(() => {
          this.seconds = this.seconds - 1;
          this.countDownTimer();
        }, 1000);
      } else {
        this.$router.push("/cinema/dashboard").catch(() => {});
      }
    },
  },
};

</script>

<style scoped>
video {
  position: fixed;
  top: 50px;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 90%;
  border: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  z-index: 999999;
}
.loader {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 30%;
}
</style>

