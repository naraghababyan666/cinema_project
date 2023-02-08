<template>
  <div >
    <Header class="header"/>
    <div class="arrow-back">
      <ArrowBack class="arrowBack"/>
    </div>
    <hr />
    <div class="part1">
      <div class="section" >
        <div class="screen">
          <div class="text">Экран</div>
          <div class="figure">
          </div>
        </div>
        <div class="seatAndRow" style="display: flex">
          <div class="row" >
<!--            <p v-for="seat in Math.ceil(hallSeats / 10 )" :key="seat">{{seat}}</p>-->
            <p v-for="seat in seances.halls.hall_rows" :key="seat">{{seat}}</p>
          </div>
          <div class="section_seats" :style="{'grid-template-columns' : 'repeat(' + Math.ceil(this.seatsInRow) + ', 1fr)' }">
            <div  v-for="seat in seances.halls.hall_seats" :key="seat" @click="broneSeat(seat)" class="seat">
<!--              <div v-if="">-->
                <p class="sit grid-item bronedSeat" v-if="bronedPast.includes(seat)">{{ seat }}</p>
                <p class="sit grid-item waitToBrone" v-else-if="seatToBrone.includes(seat)">{{ seat }}</p>
                <p class="sit grid-item " v-else>{{ seat }}</p>
<!--              </div>-->
            </div>

            <!--        <div class="seats" v-for="seat in hallSeats" :key="seat">-->
            <!--          <div class="circle" :value="seat">{{seat}}</div>-->
            <!--        </div>-->
          </div>
          <div class="row" >
<!--            <p v-for="seat in Math.ceil(hallSeats / 10 )" :key="seat">{{seat}}</p>-->
            <p v<p v-for="seat in seances.halls.hall_rows" :key="seat">{{seat}}</p>
          </div>
        </div>


      </div>
      <div class="windowBrone">
        <div style="max-height: 500px; overflow-y: scroll">
          <div class="amountBrone">
            <p v-if="seatToBrone.length == 0">Нет билет</p>
            <p v-else>{{seatToBrone.length}} билета</p>
            <svg xmlns="http://www.w3.org/2000/svg" @click="hideTickets" :class="{ 'rotate' : rotateIsActive }" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
              <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
          </div>
          <div class="broneSeat" v-for="(id, key) in seatToBrone" :key="key" data-aos="fade-up" data-aos-duration="1000" v-show="showTickets">
            <div class="standartPart">
              <p class="standart">Стандарт</p>
              <svg xmlns="http://www.w3.org/2000/svg" @click="deleteSeatBrone(id)" style="cursor: pointer" width="12" height="12" fill="red" class="bi bi-archive-fill" viewBox="0 0 16 16">
                <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
              </svg>
            </div>
            <div class="seatNumPrice">
              <p v-if="id - (10 * Math.floor(id / 10)) == 0" class="seatNum">Ряд {{Math.ceil(id / 10)}}, Место 10</p>
              <p v-else class="seatNum">Ряд {{Math.ceil(id / 10)}}, Место {{ id - (10 * Math.floor(id / 10))}}</p>
              <p class="price">{{ seances.tickets_price }} ₽</p>
            </div>

          </div>
        </div>
        <div class="btnPart">
          <hr />
          <div class="total">
            <div class="amount">
              <p v-if="seatToBrone.length == 0">Нет билет</p>
              <p v-else>{{seatToBrone.length}} билета</p>
            </div>
            <div class="price">
              <p>{{seances.tickets_price * seatToBrone.length}} ₽</p>
            </div>
          </div>
          <button class="submit" @click="submit"> Забронировать место</button>
          <p v-if="bronedSuccess" class="bronedSuccess">Ваши места успешно забронированы.</p>
        </div>

      </div>

    </div>
    <div class="footer">
      <Footer />
    </div>
  </div>
</template>

<script>
import ArrowBack from "../ArrowBack";
import Header from "../Header";
import Footer from "../Footer";
import axios from "axios";

export default {
  name: "HallModal",
  components: {
    Header,
    Footer,
    ArrowBack
  },
  data(){
    return {
      hallSeats: 0,
      hallSeanceId: null,
      seatNum: 0,
      seances: '',
      seatToBrone: [],
      showTickets: true,
      rotateSlick: 'transform: rotate(180deg)',
      rotateIsActive: false,
      bronedSeats: [],
      waitToBroneActive: true,
      deleteSeat: [],
      broned: [],
      bronedPast: [],
      bronedSuccess: false,
      seatsCount: 0,
      rowCount: 0,
      seatsInRow: 10,
    }
  },
  methods: {
    broneSeat(id){
      const checkId = this.seatToBrone.find(el => el === id)
      if(checkId == undefined){
        this.seatToBrone.push(id)
        // const checkBroned = this.bronedPast.find(elem => elem === id)
        // if(checkBroned == undefined){
        //   this.seatToBrone.push(id)
        //   localStorage.setItem('brone_seats'+this.hallSeanceId, this.seatToBrone)
        //
        // }
      }
    },
    deleteSeatBrone(id){
      const checkId = this.seatToBrone.find(el => el === id)
      if(checkId !== undefined){
        this.seatToBrone.splice(this.seatToBrone.indexOf(checkId), 1)
        localStorage.setItem('brone_seats'+this.hallSeanceId, this.seatToBrone)
      }
    },
    hideTickets(){
      this.showTickets = !this.showTickets
      this.rotateIsActive = !this.rotateIsActive
    },
    submit(){
      // if(localStorage.getItem('bronedInHall'+this.hallSeanceId)){
      //   this.bronedPast = (localStorage.getItem('bronedInHall'+this.hallSeanceId)).split(',')
      //   this.bronedPast = this.bronedPast.map(item => parseInt(item))
      //   this.bronedPast = this.bronedPast.concat(this.seatToBrone)
      //   this.bronedPast = [...new Set(this.bronedPast)];
      //   console.log(this.bronedPast)
      //   localStorage.setItem('bronedInHall'+this.hallSeanceId, this.bronedPast)
      //   localStorage.setItem('brone_seats'+this.hallSeanceId, '')
      //   this.seatToBrone = []
      //   this.bronedSuccess = true
      // }else{
      //   localStorage.setItem('bronedInHall'+this.hallSeanceId, this.seatToBrone)
      //   localStorage.setItem('brone_seats'+this.hallSeanceId, '')
      //   this.bronedPast = this.seatToBrone
      //   this.seatToBrone = []
      //   this.bronedSuccess = true
      // }
      axios.post( process.env.VUE_APP_API_URL + "api/seance-all-tickets/brone-seat/" + this.$route.params.id, {
        seats: this.seatToBrone,
        id: this.$route.params.id
      }).then((res) => {
        if(res.data.tickets){
          this.bronedPast = res.data.tickets
          this.seatToBrone = []
          this.bronedSuccess = true
        }
        // if(res.data == 'success'){
        //   this.bronedPast = res.data.tickets
        //   this.seatToBrone = []
        // }
      })
    }
  },
  watch: {
    // seatToBrone(allseat){
    //   localStorage.setItem('brone_seats'+this.hallSeanceId, this.seatToBrone)
    // }

    // seatToBrone(seat){
    //   console.log(seat)
    // }
    // bronedPast(seat){
    //   console.log(seat)
    // }
  },
   mounted() {
    // this.hallSeanceId = localStorage.getItem('seance_id')
    // this.hallSeats = localStorage.getItem('hall_seats'+this.hallSeanceId)
    // this.bronedSeats = localStorage.getItem('brone_seats'+this.hallSeanceId)
    // this.hallSeats = parseInt(this.hallSeats)
    // if(this.bronedSeats !== ''){
    //   this.seatToBrone = this.bronedSeats.split(',')
    //   this.seatToBrone = this.seatToBrone.map(item => parseInt(item))
    // }
    // if(localStorage.getItem('bronedInHall'+this.hallSeanceId)){
    //   this.bronedPast = localStorage.getItem('bronedInHall'+this.hallSeanceId)
    //   this.bronedPast = this.bronedPast.split(',')
    //   this.bronedPast = this.bronedPast.map(item => parseInt(item))
    // }
    axios.post(process.env.VUE_APP_API_URL + "api/seance-all-tickets/" +this.$route.params.id).then((res) => {
      this.seances = res.data

      this.rowCount = this.seances.halls.hall_rows
      this.seatsCount = this.seances.halls.hall_seats
      this.seatsInRow = this.seatsCount / this.rowCount
      if(this.seances){
        if(JSON.parse(this.seances.tickets_amt) !== null){
          this.bronedPast = JSON.parse(this.seances.tickets_amt)
        }
      }
    })

  }
}
</script>

<style lang="scss" scoped>
*{
  font-family: "Montserrat", sans-serif;
}
hr{
  height: 0.5px ;
  background-color: #777777;
  border: none;
}
.arrow-back{
  width: 1140px;
  margin: 0 auto;
  padding: 5px;
}
.arrowBack{
  position: relative !important;
  top: 0 !important;
  left: 0 !important;
}
.bronedSuccess{
  color: lawngreen;
  margin-top: 5px;
}
.waitToBrone{
  background-color: darkgrey !important;
  transform: scale(1.2);
  pointer-events: none;
}
.bronedSeat{
  transform: scale(0.8);
  background-color: darkgrey !important;
  pointer-events: none;
}
::-webkit-scrollbar {
  display: none;
}
.rotate{
  transform: rotate(180deg);
  transition-duration: .5s;
}
.brone{
  color: red;
}

//.header{
//  //color: grey;
//  //width: 100%;
//  //display: flex;
//  //justify-content: space-between;
//  //align-items: center;
//  .logo{
//    display: flex;
//    justify-content: flex-start;
//    align-items: center;
//    cursor: pointer;
//    span{
//      color: grey;
//    }
//    img{
//      height: 45px;
//      width: 45px;
//    }
//    .arrow_back{
//      margin-right: 10px;
//    }
//    .arrow_back:hover{
//      color: white;
//    }
//}
//.closeBtn{
//  color: grey;
//  cursor: pointer;
//}
//}
.part1{
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1140px;
  margin: 0 auto;
  .section{
    color: white;
    width: 70%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    .seatAndRow{
      margin-bottom: 20px;
      .row{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-top: 40px;
        font-family: 'SemiBold';
      }
      .row > *{
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 5px;
      }
      .row:first-child{
        //margin-right: 20px;
      }
      .row:last-child{
        margin-left: 10px;
      }
    }
    .screen{
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 10px;
      .text{
        margin: 10px;
      }
      .figure{
        width: 300px;
        height: 40px;
        border-radius: 30px;
        background-color: white;
        clip-path: polygon(100% 54%, 50% 26%, 0 54%, 0 19%, 50% 0, 100% 19%);


      }
    }
    .section_seats{
      width: 100%;
      margin-top: 40px;
      display: grid;
      //grid-template-columns: repeat(10, 1fr);
      gap: 10px;
      grid-column-gap: 10px;
      //justify-content: space-between;
      //align-items: center;
      .seat{
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .grid-item{
        background-color: #D8004E;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        text-align: center;
        padding: 5px;
        cursor: pointer;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .grid-item:hover{
        transform: scale(1.2);
        transition-duration: .2s;
      }
    }
  }
  .windowBrone{
    width: 30%;
    min-height: 500px ;
    background-color: #262626;
    padding: 10px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    .amountBrone{
      font-size: .875rem;
      font-weight: 600;
      line-height: 1.43;
      display: flex;
      svg{
        margin-left: 10px;
      }
    }
    .broneSeat{
      border-bottom: 1px solid grey;
      padding: 10px 0px;
      .standartPart{
        display: flex;
        justify-content: space-between;
        align-items: center;
        .standart{
          color: #ebebeb;
          font-size: .95rem;
          line-height: 1.33;
          font-weight: 400;
          letter-spacing: .01em;
        }
      }
      .seatNumPrice{
        display: flex;
        justify-content: space-between;
        align-items: center;
        .seatNum{
          color: #fafafa;
          font-size: 1rem;
          line-height: 1.43;
        }
        .price{
          font-size: .875rem;
          line-height: 1.43;
          color: #fafafa;
        }
      }

    }
    .broneSeat:last-child{
      border-bottom: none;
    }
    .btnPart{
      hr{
        border: none;
        height: 1px;
        background-color: grey;
        margin: 20px 0px 5px 0;
      }
      width: 100%;
      .submit{
        width: 100%;
        background-color: #007fff;
        color: white;
        cursor: pointer;
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 7px;
      }
      .total{
        display:flex;
        justify-content:space-between;
        align-items: center;
        font-size: .875rem;
        line-height: 1.43;
        margin: 10px 0;
      }
    }

  }
}

//.sit:nth-child(10n + 0)::after{
//  content: "\a" !important;
//  white-space: pre !important;
//}
</style>