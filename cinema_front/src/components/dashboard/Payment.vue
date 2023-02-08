<template>
  <div class="containerr">
    <div class="row-heading">
      <div class="item">
        <div class="info p-sm text-white text-regular">
          <img src="@/assets/images/my-films/days.svg" alt />
          Проданных билетов
        </div>
        <div
            class="output h3 text-red text-semi-bold"
        >
          {{ filmViews }}
        </div>
      </div>
      <div class="item">
        <div class="info p-sm text-white text-regular">
          <img src="@/assets/images/my-films/money.svg" alt />
          Проданных билетов(сумма)
        </div>
        <div
            class="output h3 text-red text-semi-bold"
        >
          {{incomeAllSeance}}
        </div>
      </div>
      <div class="item">
        <div class="info p-sm text-white text-regular">
          <img src="@/assets/images/my-films/money2.svg" alt />
          К выводу
        </div>
        <div class="output h3 text-red text-semi-bold">
<!--          {{ (incomeAllSeance * percent) / 100 }}-->
          {{ this.user.balance}}
        </div>
      </div>
    </div>
    <div class="first_section">
      <label for="summa">Ввод суммы </label>
      <input type="number" id="summa" class="dark_input" min="1" :max="this.incomeAllSeance * percent / 100" v-model="$v.incomeSum.$model"/>
<!--      :class="status($v.incomeSum)"-->
    </div>
    <div class="second_section">
      <div class="ExtraFintech" @click="extrafintechChange">
        <input type="radio" value="extrafintech" name="type" id="extrafintech" />
        <label for="extrafintech" >Платежная система</label>
      </div>
      <div class="visa" @click="visaChange">
        <input type="radio" value="visa" name="type" id="visa" />
        <label for="visa" >Оплата по карте</label>
      </div>
      <div class="organization" @click="organizationChange">
        <input type="radio" value="organization" name="type" id="organization" />
        <label for="organization" >Оплата по реквизитам</label>
      </div>
    </div>
    <div class="third_section">
      <div class="extrafintech_form" v-show="extrafintech" >
        <label for="extrafintech_order" >Номер счета в ExtraFintech</label>
        <input type="text" class="card_form"  placeholder="Счет ExtraFintech" v-model="payToSystem.card_number_extrafintech" id="extrafintech_order" />
        <label >Банк получатель</label>
        <input type="text"  placeholder="Банк" v-model="payToSystem.bank_name"/>
        <label>Номер счета получателя </label>
        <input type="number" placeholder="000000000000000000000" v-model="payToSystem.card_number_receiver">
        <label>ИНН</label>
        <input type="number" placeholder="000000000000" v-model="payToSystem.inn">
        <div style="display: flex; justify-content: space-between">
          <div class="kpp" style="width: 45%">
            <label>КПП</label>
            <input type="number" placeholder="000000" v-model="payToSystem.kpp">
          </div>
          <div class="bik" style="width: 45%">
            <label>БИК</label>
            <input type="number" placeholder="000000" v-model="payToSystem.bik">
          </div>

        </div>
        <div class="successMessage" v-if="successMessage">
          <p>Ваш запрос принят.</p>
        </div>
        <div class="errorMessage" v-if="errorMessage">
          <p>Повторите еще раз </p>
        </div>
        <div class="btn">
          <button class="btn_success" @click="payToExtraFintechFunction">
            Оплатить
          </button>
        </div>
      </div>
      <div class="visa_form" v-show="visa">
        <label for="" >Получатель</label>
        <input type="text" class="card_form" id="user_name"  style="margin-bottom: 5px;" placeholder="Фамилия" v-model="payToCard.name"/>
        <input type="text" class="card_form" id="first_name" style="margin-bottom: 5px;" placeholder="Имя" v-model="payToCard.username"/>
        <input type="text" class="card_form" id="middle_name" style="margin-bottom: 5px;" placeholder="Отчество" v-model="payToCard.fname"/>
        <label >Банк получатель</label>
        <input type="text" placeholder="Банк" v-model="payToCard.bank_name"/>
        <label>Номер счета получателя </label>
        <input type="number"  placeholder="00000000000000000" v-model="payToCard.card_number_receiver"/>
        <label>ИНН</label>
        <input type="number" placeholder="000000000000" v-model="payToCard.inn">
        <div style="display: flex; justify-content: space-between">
          <div class="kpp" style="width: 45%">
            <label>КПП</label>
            <input type="number" placeholder="000000" v-model="payToCard.kpp">
          </div>
          <div class="bik" style="width: 45%">
            <label>БИК</label>
            <input type="number" placeholder="000000" v-model="payToCard.bik">
          </div>
        </div>
        <div class="successMessage" v-if="successMessageInCard">
          <p>Ваш запрос принят.</p>
        </div>
        <div class="errorMessage" v-if="errorMessageInCard">
          <p>Повторите еще раз </p>
        </div>
        <div class="btn">
          <button class="btn_success" @click="payToCardFunction">Оплатить</button>
        </div>
      </div>
      <div class="organization_form" v-show="organization">
        <label for="" >Название организации</label>
        <input type="text" class="card_form" id="last_name" v-model="payToRequisite.organization_name" style="margin-bottom: 5px;" placeholder="Название организации"/>
        <label >Название банка</label>
        <input type="text" placeholder="Банк" v-model="payToRequisite.bank_name"/>
        <label>Расчетный счет  </label>
        <input type="number"  placeholder="00000000000000000" v-model="payToRequisite.payment_account"/>
        <label>Корреспондентский счет</label>
        <input type="number"  placeholder="0000000000000" v-model="payToRequisite.correspondent_account" />
        <label>ОГРН</label>
        <input type="number"  placeholder="ОГРН" v-model="payToRequisite.ogrn"/>
        <label>ИНН</label>
        <input type="number" placeholder="000000000000" v-model="payToRequisite.inn">
        <div style="display: flex; justify-content: space-between">
          <div class="kpp" style="width: 45%">
            <label>КПП</label>
            <input type="number" placeholder="000000" v-model="payToRequisite.kpp">
          </div>
          <div class="bik" style="width: 45%">
            <label>БИК</label>
            <input type="number" placeholder="000000" v-model="payToRequisite.bik">
          </div>

        </div>
        <div class="successMessage" v-if="successMessageInRequisite">
          <p>Ваш запрос принят.</p>
        </div>
        <div class="errorMessage" v-if="errorMessageInRequisite">
          <p>Повторите еще раз </p>
        </div>
        <div class="btn">
          <button class="btn_success" @click="payToRequisiteFunction">Оплатить</button>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
// import BtnGroup from "../BtnGroup";
import Vue from "vue";
import axios from "axios";
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);
import { required, minLength } from 'vuelidate/lib/validators'
export default {
  name: "Payment",
  data(){
    return {
      // active: false,
      extrafintech: false,
      visa: false,
      organization: false,
      percent: 50,
      dNone: 'display: none',
      allSeances: [],
      user: {
        balance: 0
      },
      filmViews: 0,
      incomePerSeance: 0,
      incomeAllSeance: 0,
      incomeSum: 0,
      successMessage: false,
      errorMessage: false,
      errorMessageInCard: false,
      successMessageInCard: false,
      errorMessageInRequisite: false,
      successMessageInRequisite: false,
      payToSystem: {
        card_number_extrafintech: '',
        bank_name: '',
        card_number_receiver: '',
        inn: '',
        kpp: '',
        bik: ''
      },
      payToCard: {
        name: '',
        username: '',
        fname: '',
        bank_name: '',
        card_number_receiver : '',
        inn: '',
        kpp: '',
        bik: ''
      },
      payToRequisite: {
        organization_name: '',
        bank_name: '',
        payment_account: '',
        correspondent_account: '',
        ogrn: '',
        inn: '',
        kpp: '',
        bik: ''
      },
    }
  },
  validations: {
    payToSystem: {
      card_number_extrafintech: { required },
      bank_name: { required },
      card_number_receiver: { required, minLength: minLength(8) },
      inn: { required },
      kpp: { required },
      bik: { required }
    },
    payToCard: {
      name: { required },
      username: { required },
      fname: { required },
      bank_name: { required },
      card_number_receiver : { required, minLength: minLength(10) },
      inn: { required },
      kpp: { required },
      bik: { required }
    },
    payToRequisite: {
      organization_name: { required },
      bank_name: { required },
      payment_account: { required },
      correspondent_account: { required },
      ogrn: { required },
      inn: { required },
      kpp: { required },
      bik: { required }
    },
    incomeSum: {
      required,
      minLength: minLength(1),
    },
  },
  mounted() {
    this.getSeance()
    this.getPercent()
  },

  methods: {
    getPercent(){
      axios.post(process.env.VUE_APP_API_URL + 'api/payment/get-percent').then((res)=> {
        this.percent = res.data.percent
      })
    },
    check(){
      console.log(this.incomeSum)
      console.log(this.incomeAllSeance)
    },
    payToExtraFintechFunction(){
      this.$v.payToSystem.$touch()
      if(this.$v.payToSystem.$invalid){
        this.errorMessage = true
      }else {
        if (parseInt(this.incomeSum) > this.incomeAllSeance * 50 / 100 || parseInt(this.incomeSum) < 1) {
          console.log('invalid')
        } else {
          axios.post(process.env.VUE_APP_API_URL + 'api/payment/payment-to-system', {
            'data': this.payToSystem,
            'income': this.incomeAllSeance * 50 / 100,
            'wantedTotal': parseInt(this.incomeSum)
          }).then((res) => {
            if (res.data.success) {
              this.payToSystem.card_number_extrafintech = ''
              this.payToSystem.bank_name = ''
              this.payToSystem.card_number_receiver = ''
              this.payToSystem.inn = ''
              this.payToSystem.kpp = ''
              this.payToSystem.bik = ''
              this.successMessage = !this.successMessage
            } else {
              this.errorMessage = !this.errorMessage
            }
          })
        }
      }
    },
    payToCardFunction(){
      this.$v.payToCard.$touch()
      if(this.$v.payToCard.$invalid){
        this.errorMessageInCard = true
      }else{
        if(parseInt(this.incomeSum) > this.incomeAllSeance * 50 / 100){
          this.errorMessageInCard = true
        }else{
          axios.post(process.env.VUE_APP_API_URL + 'api/payment/payment-to-card', {
            'full_name' : this.payToCard.name + " " + this.payToCard.username + " " + this.payToCard.fname,
            'bank_name' : this.payToCard.bank_name,
            'card_number_receiver' : this.payToCard.card_number_receiver,
            'inn' : this.payToCard.inn,
            'kpp' : this.payToCard.kpp,
            'bik' : this.payToCard.bik,
            'income' : this.incomeAllSeance * 50 / 100,
            'wantedTotal' : parseInt(this.incomeSum)
          }).then((res) => {
            if(res.data.success){
              this.payToCard.name = ''
              this.payToCard.username = ''
              this.payToCard.fname = ''
              this.payToCard.bank_name = ''
              this.payToCard.card_number_receiver = ''
              this.payToCard.inn = ''
              this.payToCard.kpp = ''
              this.payToCard.bik = ''
              this.successMessageInCard = true
              this.errorMessageInCard = false
            }else{
              this.errorMessageInCard = true
              this.successMessageInCard = false
            }
          })
        }
      }



    },
    payToRequisiteFunction(){
      this.$v.payToRequisite.$touch()
      if(this.$v.payToRequisite.$invalid){
        this.errorMessageInRequisite = true
      }else{
        if(parseInt(this.incomeSum) > this.incomeAllSeance * 50 / 100){
          this.errorMessageInRequisite = true
        }else{
          axios.post(process.env.VUE_APP_API_URL + 'api/payment/payment-to-requisite', {
            'organization_name' : this.payToRequisite.organization_name,
            'bank_name' : this.payToRequisite.bank_name,
            'payment_account' : this.payToRequisite.payment_account,
            'correspondent_account' : this.payToRequisite.correspondent_account,
            'ogrn' : this.payToRequisite.ogrn,
            'inn' : this.payToRequisite.inn,
            'kpp' : this.payToRequisite.kpp,
            'bik' : this.payToRequisite.bik,
            'income' : this.incomeAllSeance * 50 / 100,
            'wantedTotal' : parseInt(this.incomeSum)
          }).then((res) => {
            if(res.data.success){
              this.errorMessageInRequisite = false
              this.successMessageInRequisite = true
              this.payToRequisite.organization_name = ''
              this.payToRequisite.bank_name = ''
              this.payToRequisite.payment_account = ''
              this.payToRequisite.correspondent_account = ''
              this.payToRequisite.ogrn = ''
              this.payToRequisite.inn = ''
              this.payToRequisite.kpp = ''
              this.payToRequisite.bik = ''
            }else{
              this.successMessageInRequisite = false
              this.errorMessageInRequisite = true
            }
          }).catch((err) => {
            console.log(err)
          })
        }
      }


    },
    status(validation){
      return {
        error: validation.$error,
        dirty: validation.$dirty
      }
    },
    getSeance(){
      axios.post(process.env.VUE_APP_API_URL + "api/get-my-seances").then((res)=> {
        this.allSeances = res.data.seances
        this.user = res.data.seances[0].user
        // this.incomeAllSeance = this.user["balance"]
        this.getCalculations(this.allSeances)
      })
    },
    getCalculations(a){
      a.forEach((seance) => {
        if(seance.tickets_amt !== null ){
          this.filmViews += JSON.parse(seance.tickets_amt).length
          this.incomeAllSeance = this.filmViews * seance.tickets_price
        }
      })
    },
    extrafintechChange(){
      this.extrafintech = true,
      this.organization = false,
      this.visa = false
    },
    visaChange(){
      this.extrafintech = false,
          this.organization = false,
          this.visa = true
    },
    organizationChange(){
      this.extrafintech = false,
          this.organization = true,
          this.visa = false
    },
  }
}
</script>

<style scoped>
.successMessage{
  color: green;
  text-align: center;
  padding: 10px;
}
.errorMessage{
  color: red;
  text-align: center;
  padding: 10px;
}
.dirty {
  border-color: #5A5 !important;
}

.dirty:focus {
  outline-color: #8E8 !important;
}

.error {
  border-color: red !important;
}

.error:focus {
  outline-color: #F99 !important;
}
.containerr{
  margin-top: 30px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: "Montserrat", sans-serif;
}
.container > *{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
  width: 100%;
}
.row-heading{
  padding: 15px 10px;
  border-radius: 22px 22px 0px 0px;
  display: flex;
  justify-content: space-between;
  background: linear-gradient(
      180deg,
      #151515 0%,
      rgba(21, 21, 21, 0) 100%
  );
  width: 100%;
  margin-bottom: 20px;
}
.output {
  padding: 12px 20px;
  border: 1px solid #ffffff;
  background: linear-gradient(
      157.8deg,
      rgba(0, 0, 0, 0) -6.72%,
      #4d4d4d 111%
  );
  border-radius: 5px;
  margin-right: 10px;
}
.info {
  margin-right: 13px;
  display: flex;
  align-items: center;
}
.info img{
  margin-right: 13px;
}
.row-heading, .row-heading > *{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.btn{
  width: 500px;
}
input:not(input[type=radio]) {
  background: transparent;
  outline: none;
  border: 0.5px solid #777777;
  box-sizing: border-box;
  border-radius: 10px;
  padding: 8px;
  width: 100%;
  color: #FFFFFF;
  margin-bottom: 10px;
}
label{
  color:white;
  margin-left: 5px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}

.second_section > *{
  margin-bottom: 5px;
}
.third_section{
  max-width: 500px;
}
.btn_success{
  width: 100%;
  background: #27AE60;
  border-radius: 10px;
  padding: 10px;
  border:none;
  font-family: 'Montserrat', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 16px;
  line-height: 140%;
  cursor: pointer;
  text-align: center;
  color: #FFFFFF;
}
.card_form{
  width: 100%;
}
</style>