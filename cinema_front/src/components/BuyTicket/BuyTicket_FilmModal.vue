<template>
<div>
  <Header />
  <div class="header">
    <div class="arrow-back">
      <ArrowBack class="arrowBack"/>
    </div>

  </div>
  <hr />
  <div class="section">
    <div class="film_container">
      <div class="photo">
        <img :src="`${baseUrl}storage/${film.image}`" />
      </div>
      <div class="description">
        <div class="title">
          {{ film.title }}
        </div>
        <div class="genres">
          16+ |
          <!--        {{ film.genres}}-->
          Детектив
        </div>
        <div class="rating">
          <span>Рейтинг</span>: {{ film.rating }}
        </div>
        <div class="duration">
          <span>Длительность</span>: {{ film.duration }} мин.
        </div>
        <div class="date">
          <!--        <span>Год</span>: {{ film.created_at.slice(0,4) }}-->
          <span>Год</span>: 2020
        </div>
        <div class="buyTicket">
          <a href="#seances" class="buyBtn"> Купить билет</a>
        </div>

      </div>
    </div>
    <div class="film_description">
      <p>{{film.description}}</p>
    </div>
    <div class="seances_section" id="seances">
      <div class="seance_title">
        Расписание на
<!--        <input type="date" v-model="wantedDate" :min="this.today" required="required"/>-->
<!--        <datepicker-->
<!--            v-model="wantedDate"-->
<!--            format="yyyy-MM-dd"-->
<!--            :disabled-dates="disabledDates"-->
<!--        ></datepicker>-->
        <VueDatePicker v-model="wantedDate"
                       format="YYYY-MM-DD"
                       button-validate="Ok"
                       button-cancel="Cancel"
                       validate
                       color="#d8004e"
                       :min-date="today"
                       no-calendar-icon
                       style="margin-left: 10px"
        >
          <template #activator="{ date }">
            <p class="choosedDay" v-if="date == today">Сегодня</p>
            <p class="choosedDay" v-else>{{ date }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" style="margin-left: 10px;" class="bi bi-calendar-plus" viewBox="0 0 16 16">
              <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
          </template>
        </VueDatePicker>

      </div>
      <div class="no-seances" v-if="seances.length == 0">
        Сеансов пока нет
      </div>
      <div class="seances" v-else v-for="(seance, id) in seances" :key="id">
          <div class="seance">
            <div class="hall">
              <p>{{ seance.halls.name_hall }}</p>
              <p>{{ seance.halls.region }}, город {{ seance.halls.city }}, дом {{ seance.halls.house }} </p>
            </div>
            <div class="seance_time">
              <div class="film_type">
                <p v-if="seance.film.format_id == 1">2D</p>
                <p v-else>3D</p>
              </div>
              <div class="start_time">
                <p @click="toBronePage(seance.id)">{{seance.start}}</p>
              </div>
              <div class="price">
                <p>от {{ seance.tickets_price }}р.</p>
              </div>
            </div>
          </div>
        </div>
    </div>
<!--      <div class="seances" v-if="film.id == 2">
  <div class="seance">
    <div class="hall">
      <p>5 звезд на Новокузнецкой</p>
      <p>Б.Овчинниковский пер., 16, ТЦ «Аркадия»</p>
    </div>
    <div class="seance_time">
      <div class="film_type">
        <p >3D</p>
      </div>
      <div class="start_time">
        <p @click="openHall1">09:55</p>
      </div>
      <div class="price">
        <p>от 400р.</p>
      </div>
    </div>
  </div>
</div>
<div class="seances" v-if="film.id == 1">
  <div class="seance">
    <div class="hall">
      <p>Формула Кино ЦДМ</p>
      <p>Театральный пр., 5/1, Центральный детский магазин</p>
    </div>
    <div class="seance_time">
      <div class="film_type">
        <p >3D</p>
      </div>
      <div class="start_time">
        <p @click="openHall2">09:55</p>
      </div>
      <div class="price">
        <p>от 400р.</p>
      </div>
    </div>
  </div>
</div>-->

  </div>

  <Footer />
</div>
</template>

<script>

import axios from "axios";
import Header from "../Header";
import Footer from "../Footer";
import ArrowBack from "../ArrowBack";
// import Datepicker from 'vuejs-datepicker';
import { VueDatePicker } from '@mathieustan/vue-datepicker';
import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';

export default {
  name: "FilmModal",
  data() {
    return {
      id: 0,
      StarHallSeanceId: 2,
      FormulaHallSeanceId: 1,
      film: {},
      seances: [],
      baseUrl: process.env.VUE_APP_API_URL,
      today: new Date().toJSON().slice(0,10),
      wantedDate: new Date().toJSON().slice(0,10),
      showCalendar: false,
      disabledDates: {
        to: new Date(Date.now() - 172800)
      }
    }
  },
  components:{
    Header,
    Footer,
    ArrowBack,
    // Datepicker,
    VueDatePicker
  },
  // props: [
  //     'id'
  // ],
  watch: {
    wantedDate(){
      if(this.wantedDate === this.today){
        this.showCalendar = true
      }else{
        this.showCalendar = false
      }
      this.getSeanceByDay()
    }
  },
  methods: {
    getFilm(){
      axios.post(process.env.VUE_APP_API_URL + "api/films/" + this.$route.params.id).then((res) => {
        this.film = res.data.film
        console.log(res.data)
      })
    },
    getSeanceByDay(){
      axios.post(process.env.VUE_APP_API_URL + "api/seanceByDay/" +this.$route.params.id, {
        day: this.wantedDate
      }).then((res) => {
        this.seances = res.data
      })
    },
    getSeance(){
      axios.post(process.env.VUE_APP_API_URL + "api/seance/" +this.$route.params.id).then((res) => {
        this.seances = res.data
      })
    },
    toBronePage(id){
      this.$router.push({
        name: 'ec-ticket-seat-brone',
        params: {id: id}
      })
    },
  },

   mounted() {
     this.getSeanceByDay()
     this.getFilm()
     this.id = this.$route.params.id
  }
}
</script>
<style>
.choosedDay{
  color: #3399ff;
}
.vdp-datepicker__calendar .disabled{
  color: #3c3c3c !important;
  cursor: default !important;
}
.vdp-datepicker__calendar{
  border: none !important;
  background: #333333 !important;
  font-size: 18px;
}
.vdp-datepicker__calendar .day-header{}
</style>
<style lang="scss" scoped>

input[type="date"]::-webkit-calendar-picker-indicator{
  color: white !important;
  //display: none;
}

input[type="date"]::-webkit-inner-spin-button { display: none; }
*{
  font-family: "Montserrat", sans-serif;
}
.no-seances{
  max-width: 1140px;
  margin: 20px auto;
}
.arrow-back{
  width: 1140px;
  margin: 0 auto;

}
input[type="date"]{
  height: 50px;
  border: none;
  outline: none;
  color: rgb(51, 153, 255);
  font-family: "Montserrat", sans-serif;
  font-size: 1.75rem;
  font-weight: 700;
  line-height: 1.29;
  background: transparent;
}
input[type="date"]::-webkit-calendar-picker-indicator {
  filter: invert(100%);
}
.section{
  width: 100%;
}
.arrowBack{
  position: relative !important;
  top: 0 !important;
  left: 0 !important;
}
#seances{

  transition-duration: 2s;
  transition-timing-function: ease-in-out;
}
hr{
  border: none;
  height: 1px;
  background-color: grey;
}
  .header{
    margin: 10px 20px 10px 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    .logo{
      display: flex;
      justify-content: flex-start;
      align-items: center;
      cursor: pointer;
      img{
        height: 45px;
        width: 45px;
      }
    }
    .closeBtn{
      color: white;
      cursor: pointer;
    }
  }
  .film_container{
    max-width: 1140px;
    margin: 20px auto;
    display: flex;
    align-items: center;
    color: white;
    //margin: 20px 50px;
    .photo{
      img{
        border-radius: 10px;
        width: 200px;
        max-height: 200px;

      }
    }
    .description {
      padding-left: 20px;

      span{
        color: grey;
      }
      .title {
        font-size: 1.75rem;
        line-height: 1.29;
        padding-bottom: 20px;
        font-style: normal;
        font-weight: 600;
      }
      .genres{
        padding-bottom: 15px;
      }
      .rating{
        padding-bottom: 10px;
      }
      .duration{
        padding-bottom: 10px;
      }
      .date{
        padding-bottom: 20px;
      }
      .buyTicket {
        margin: 10px 0px;

        .buyBtn {
          padding: 10px;
          color: white;
          font-size: 1rem;
          font-weight: 600;
          line-height: 1.25;
          background-color: rgb(51, 153, 255);
          text-decoration: none;
          border-radius: 10px;
          width: 150px;
        }
      }
    }
  }
  .film_description{
    max-width: 1140px;
    margin: 20px auto;
    color: white;
    p{
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
    }
  }
  .seances_section{
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1.29;
    color: white;
    .seance_title{
      max-width: 1140px;
      margin: 20px auto;
      display: flex;
      align-items: center;
      .vd-wrapper{
        .vd-activator{
          display: flex;
          align-items: center !important;
          svg{
            align-self: center;
          }
        }
      }

    }
      .seances{
        -webkit-transition: -webkit-transform 0.6s ease-in-out;
        transition: transform 0.6s ease-in-out;
        background-color: #262626;
        .seance{
          max-width: 1140px;
          margin: 20px auto;
          //margin-bottom: 20px;
          display: flex;
          align-items: center;

          .hall{
            width: 50%;
            margin: 20px 0px;
            :first-child{
              font-size: 1.25rem;
              font-weight: 700;
              line-height: 2;
              margin-bottom: 10px;
            }
            :last-child{
              font-size: .875rem;
              line-height: 1.43;
              font-weight: 400;
            }
          }
          .seance_time{
            display: flex;
            flex-direction: column;
            width: 50%;
            .film_type{
              font-size: 13px;
              line-height: 3;
            }
            .start_time p{
              width: 50px;
              border-radius: 8px;
              vertical-align: middle;
              //height: 2.75rem;
              padding: 8px;
              color: #3399ff;
              background: #007fff29;
              font-size: .875rem;
              font-weight: 600;
              line-height: 2;
              cursor: pointer;
            }
            .start_time p:hover{
              color: white;
              background: #3399ff;
            }
            .price{
              font-size: .75rem;
              line-height: 2.5;
              font-weight: 400;
              letter-spacing: .01em;
              text-overflow: ellipsis;
              color: grey;
            }
          }
        }
      }
  }

</style>