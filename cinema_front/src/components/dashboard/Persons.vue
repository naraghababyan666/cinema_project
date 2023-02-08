<template>
  <div class="form">
    <div class="item">
      <h3 class="text-white text-semi-bold" >ООО «Мой кинозал №1»</h3>

      <div class="scroll-wrap">
        <ul class="scroll">
          <li
            v-for="(person, idx) in users"
            :key="idx"
            class="text-regular" >
             <div  class="text-regular-child" v-for="(current, id) in JSON.parse(person.person_name)" :key="id"  >
<!--              <div class="person" >-->
                <span style="width: 100px;">
                  {{current}} :
                </span>
                <span style="display: flex"
                  >{{ person.personName }}
                  <p class="text-regular-italic" @click="passport(idx,id)"
                    >паспорт</p>
                </span>
                <delete-btn class="delete_btn"
                  @click.native="deleteHandler(idx, id)"
                  :show-text="showBtnText"
                />
<!--              </div>-->
            </div>
          </li>
        </ul>
      </div>
      <add-btn
          text="Добавить ответственное лицо"
      />
    </div>
    <div class="popup" v-show="showPopup">
      <p style="cursor: pointer; text-align: end">
        <svg xmlns="http://www.w3.org/2000/svg" @click="closePopup" width="22" height="22" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
        </svg>
      </p>
      <div class="popup_photo">
        <img :src="passport_url" />
      </div>

    </div>
  </div>
</template>

<script>
import AddBtn from "@/components/AddBtn";
import DeleteBtn from "@/components/DeleteBtn";
import axios from "axios";
export default {
  components: { AddBtn, DeleteBtn },
  data() {
    return {
      showBtnText: true,
      showPopup: false,
      users: [],
      passport_url: '',
      halls: [
        {
          title: "ООО «Мой кинозал №1»",
          people: [
            { role: "Бухгалтер:", name: "Иванова А.В.", passport: "/asd" },
            { role: "Бухгалтер:", name: "Кукушкина Е.И.", passport: "/asd" },
            { role: "Бухгалтер:", name: "Петрова В.А.", passport: "/asd" },
            { role: "Кассир:", name: "Иванова А.В.", passport: "/asd" },
            { role: "Кассир:", name: "Иванова А.В.", passport: "/asd" },
            { role: "Кассир:", name: "Иванова А.В.", passport: "/asd" },
          ],
        },
        {
          title: "ООО «Мой кинозал №2»",
          people: [
            { role: "Бухгалтер:", name: "Иванова А.В.", passport: "/asd" },
            { role: "Бухгалтер:", name: "Кукушкина Е.И.", passport: "/asd" },
            { role: "Бухгалтер:", name: "Петрова В.А.", passport: "/asd" },
            { role: "Кассир:", name: "Иванова А.В.", passport: "/asd" },
            { role: "Кассир:", name: "Иванова А.В.", passport: "/asd" },
            { role: "Кассир:", name: "Иванова А.В.", passport: "/asd" },
          ],
        },
      ],
      myHalls: [],
    };
  },
  methods: {
    passport(idx, id){
      // console.log(idx, id)
      this.showPopup = !this.showPopup
      axios.post(process.env.VUE_APP_API_URL + 'api/get-passport', {
        'parent': idx,
        'child': id
      }).then((res) => {
        let photo = Object.values(res.data)
        this.passport_url = process.env.VUE_APP_API_URL + 'storage/images/' + photo
      })
    },
    closePopup(){
      this.showPopup = false
    },
    getPerson(){
      axios.post(process.env.VUE_APP_API_URL + 'api/get-persons').then((res) => {
        this.users = res.data.user
        this.myHalls = res.data.halls
      })
    },
    deleteHandler(parent, child) {
      axios.post(process.env.VUE_APP_API_URL + 'api/delete-persons', {
        'parent': parent,
        'child':child
      }).then((res) => {
        if(res.data == 'success') {
          this.getPerson()

        }
      })

      // this.halls.forEach((hall) => {
      //   hall.people = hall.people.filter((el) => el !== person);
      // });
    },
    user(){
      console.log(this.users)
    }
  },
  mounted() {
    if (window.screen.width <= 700) {
      this.showBtnText = false;
    }
    this.getPerson()
  },
};
</script>

<style lang="scss" scoped>
.delete_btn{
  display:flex !important;
  flex-direction: row !important;
}
.text-regular{
  display: flex;
  flex-direction: column;
}
.text-regular-italic{
  cursor: pointer;
  text-decoration: underline;
}
.text-regular-child{
  margin-bottom: 20px;
  display: flex;
  width: 100%;
  justify-content: space-between;
  color: grey;
}
.text-regular-child p{
  color:#27ae60;;
  text-decoration: underline;
}
.form {
  padding: 53px 72px 65px 72px;
  background: #161616;
  border-radius: 10px;
  position: relative;
  margin: 122px auto 65px auto;
  max-width: 871px;
  width: 100%;
  .item {
    padding: 34px 0;
    border-bottom: 1px solid #777777;
    &:first-child {
      padding: 0 0 34px 0;
    }
    &:last-child {
      padding: 34px 0 0 0;
      border-bottom: 0;
    }
    .addBtn {
      margin-top: 23px;
    }
    .scroll-wrap {
      padding: 13px 16px;
      background: #1c1c1c;
      border-radius: 6px;
      margin-top: 24px;
      .scroll {
        max-height: 140px;
        height: 100%;
        overflow-y: scroll;
        padding-right: 28px;
        li {
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 10px 0;
          .person {
            display: flex;
            color: #9a9a9a;
            font-size: 16px;
            max-width: 400px;
            width: 100%;
            display: flex;
            align-items: center;
            span:nth-child(1) {
              min-width: 90px;
            }
            span:nth-child(2) {
              margin-left: 60px;
              a {
                color: #27ae60;
              }
            }
          }
        }
      }
    }
  }
  .popup{
    position: absolute;
    width: 70%;
    height: 70%;
    background-color: #3c3c3c;
    border-radius: 10px;
      top: 50px;
    left: 15%;
  }
  .popup_photo{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 200px;
  }
  .popup_photo img{
    width: 200px;
  }
}

@media screen and (max-width: 834px) {
  .form {
    margin: 88px auto 65px auto;
    padding: 30px 40px 30px 40px;
    .scroll-wrap {
      .scroll {
        li {
          .person {
            span:nth-child(2) {
              margin-left: 30px !important;
            }
          }
        }
      }
    }
  }
}
@media screen and (max-width: 600px) {
  .form {
    .scroll-wrap {
      .scroll {
        li {
          .person {
            display: flex;
            flex-direction: column;
            align-items: flex-start !important;
            span:nth-child(2) {
              margin-left: 0 !important;
              margin-top: 4px;
            }
          }
        }
      }
    }
  }
}
@media screen and (max-width:480px) {
  .form {
    padding: 0;
    background: transparent;
    .scroll-wrap {
      background: transparent !important;
      padding: 0 !important;
      .scroll {
        padding-right: 20px !important;
        li {
          align-items: flex-start !important;
        }
      }
    }
  }
}
</style>