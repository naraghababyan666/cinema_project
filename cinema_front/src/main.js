import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import Vuex from 'vuex'
import axios from "axios";
import './assets/scss/main.scss';
import Vuelidate from 'vuelidate'
import AOS from "aos";
import "aos/dist/aos.css"

Vue.use(Vuelidate)
Vue.use(Vuex)
Vue.use(require('vue-moment'));
Vue.config.productionTip = false;
axios.defaults.headers.common =  {'Authorization': 'Bearer ' + localStorage.getItem('access_token')}


new Vue({
  created() {
    AOS.init();
  },
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");