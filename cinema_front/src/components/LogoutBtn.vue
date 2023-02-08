<template>
  <button @click="logout" class="enter-btn text-semi-bold text-white">
    Выйти
    <img src="../assets/images/header/enter.svg" alt="Login" />
  </button>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";

export default {
  name: "LogoutBtn",
  computed: {
    ...mapGetters(["getAuthToken"]),
  },
  methods: {
    logout() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/logout/", {
          token: localStorage.getItem('access_token'),
        })
        .then(() => {
          this.$store.commit("deleteAuthToken");
          this.$router.push("/login").catch(() => {});
        })
        .catch((err) => {
          this.$store.commit("deleteAuthToken");
          this.$router.push("/login").catch(() => {});
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.enter-btn {
  background-color: black;
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

@media screen and (max-width: 835px) {
  .enter-btn {
    margin-right: 25px;
    height: 40px;
  }
}
@media screen and (max-width: 480px) {
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
}
</style>
