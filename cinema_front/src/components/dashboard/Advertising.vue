<template>
  <div class="parent">
    <div class="child">
      <div class="my-advertisement">
        <div class="title">
          <h2>Рекламные ролики кинотеатра</h2>
        </div>
        <div class="advertisements">
          <div class="noAdvertisements" v-if="advertisements.length === 0">
            <p >Рекламные ролики не добавлены</p>
          </div>
          <div class="myAdvertisements" v-else>
            <table>
              <tr>
                <th>Название</th>
                <th>Длительность</th>
                <th>Видео ролик</th>
                <th>Статус</th>
                <th>Удалить</th>
              </tr>
              <tr v-for="(item,key) in advertisements" :key="key">
                <td>{{  item.title }}</td>
                <td>{{ item.duration }} сек.</td>
                <td> <a :href="baseUrl+'storage/videos/'+item.file">видео ролик</a></td>
                <td class="notConfirmed" v-if="item.verified === 0"><p>В модерации</p></td>
                <td class="confirmed" v-else-if="item.verified === 1"><p>Подтвержден</p></td>
                <td class="rejected" v-else><p>Отклонен</p></td>
                <td><button @click="idHandler(item.id)">Удалить <img src="/img/cancel.be693a29.svg" /></button></td>
              </tr>
            </table>
<!--            <div class="item_loop" v-for="(item,key) in advertisements" :key="key">-->
<!--              <div class="item">-->
<!--                <p>{{item.title}}</p>-->
<!--                <p>{{item.duration}} сек.</p>-->
<!--                <a target="_blank" href=""> видео ролик </a>-->
<!--                <button class="text-regular">-->
<!--                  Удалить-->
<!--                  <img src="/img/cancel.be693a29.svg" />-->
<!--                </button>-->
<!--              </div>-->

<!--            </div>-->
          </div>
        </div>

      </div>
      <div class="add-advertisement">
        <AddBtn text="Добавить рекламные ролики" @click.native="newAdvertisementForm = !newAdvertisementForm"/>
        <div v-show="newAdvertisementForm" class="add-form">
          <div class="row">
            <div class="input-group">
              <span class="type text-regular">Название:</span>
              <input
                  v-model="advertisementName"
                  type="text"
              />
            </div>
            <div class="input-group">
              <span class="text-regular">Длительность(сек):</span>
              <input
                  v-model="advertisementDuration"
                  type="text"
              />
            </div>
          </div>
          <div class="input-group">
            <span class="text-regular">Добавить реклам:</span>
            <input
                type="file"
                @change="checkVideo"
                accept="video/mp4,video/x-m4v,video/*"
            />
          </div>
          <hollow-dots-spinner
              :animation-duration="1000"
              :dot-size="20"
              :dots-num="3"
              color="#D8004E"
              style="text-align: center; margin: 10px auto"
              v-if="openSpinner"
          />
          <div class="success_group" v-show="successfullyAdded">
            <p> Ваш реклам успешно отправлен на модерацию. ExtraCinema свяжется с вами в течение 12 часов.</p>
          </div>
          <button class="btn" @click="addAdvertisement">Добавить</button>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddBtn from "@/components/AddBtn";
import axios from "axios";
import {AtomSpinner} from 'epic-spinners'
import { HollowDotsSpinner } from 'epic-spinners'

export default {
  name: "Advertising",
  data(){
    return {
      newAdvertisementForm: false,
      advertisementName: '',
      advertisementDuration: 0,
      advertisementVideo: '',
      successfullyAdded: false,
      advertisements: [],
      noAdvertisements: true,
      baseUrl : process.env.VUE_APP_API_URL,
      openSpinner: false
    }
  },
  components: {
    AddBtn,AtomSpinner,HollowDotsSpinner
  },
  methods: {
    checkVideo(e){
      this.advertisementVideo = e.target.files[0]
    },
    idHandler(id){
      axios.post(process.env.VUE_APP_API_URL + "api/delete-advertisement", {'id' : id}).then((res) => {
        if(res.data.success){
          this.getMyAdvertisements()
        }
      })
    },
    addAdvertisement(){
      if(this.advertisementName){
        if(this.advertisementDuration !== 0){
          if(this.advertisementVideo !== ''){
            let files = new FormData;
            files.append('title', this.advertisementName)
            files.append('duration', this.advertisementDuration)
            files.append('file', this.advertisementVideo)
            this.openSpinner = true
            axios.post(
              process.env.VUE_APP_API_URL + "api/add-advertisement",
              files
            ).then((res) => {
              if(res.data.success){
                this.successfullyAdded = !this.successfullyAdded
                setTimeout(() => (
                    this.successfullyAdded = false,
                    this.advertisementName = "",
                    this.advertisementDuration = 0,
                    this.advertisementVideo = ''
                ), 3000);
                this.openSpinner = false
                this.getMyAdvertisements()
              }
            });
          }
        }
      }

    },
    getMyAdvertisements(){
      axios.post(process.env.VUE_APP_API_URL + "api/my-advertisement").then((res) => {
        // console.log(res.data.advertisements)
        if (res.data.advertisements === []){
          this.noAdvertisements = !this.noAdvertisements;
        }else{
          this.advertisements = res.data.advertisements;
        }
      })
    }
  },
  mounted() {
    this.getMyAdvertisements()
  }
}
</script>

<style lang="scss" scoped>
::-webkit-file-upload-button {
  background: #161616;
  color: white;
  padding: 6px 16px;
  border: none;
  outline: none;
}
.btn{
  font-size: 16px;
  text-decoration: none;
  padding: 13px 92px;
  background: #27ae60;
  border-radius: 10px;
  transition: 0.1s;
  border: 0;
  outline: 0;
  cursor: pointer;
}
.parent{
  width: 100%;
  margin: 50px 0;
  .child{
    margin: 0 auto;
    background: #161616;
    max-width: 800px;
    border-radius: 10px;
    //padding: 40px;
    .my-advertisement{
      color: white;
      margin-bottom: 30px;
      .title{
        padding: 20px 60px;
      }
      .advertisements{
        .myAdvertisements{
          background: #1d1d1d;;
          padding: 20px 60px;
          height: 200px;
          overflow-y: scroll;
          table{
            width: 100%;
            text-align: left;
            border-collapse: collapse;
            tr{
              height: 40px;
              a{
                color: #27ae60;;
              }
              .confirmed{
                p {
                  width: fit-content;
                  background-color: #27ae60;
                  padding: 5px;
                  border-radius: 5px;
                }
              }
              .notConfirmed{
                p{
                  width: fit-content;
                  background-color: #dfa546;
                  padding: 5px;
                  border-radius: 5px;
                }
              }
              .rejected{
                p{
                  background-color: red;
                  width: fit-content;
                  min-width: 100px;
                  padding: 5px;
                  border-radius: 5px;
                }
              }
              button{
                display: flex;
                align-items: center;
                background-color: transparent;
                border: none;
                color: #27ae60;
                cursor: pointer;
                img{
                  margin-left: 5px;
                }
              }
              td:first-child, th:first-child{
                padding-left: 5px;
              }
            }
            tr:first-child{
              border-bottom: 1px solid grey;
            }
            tr:not(:first-child):hover{
              background-color: #2c2c2c;
            }
          }
          .item_loop{
            margin: 20px 0;
            padding: 10px 0;
            .item{
              display: flex;
              justify-content: space-between;
              align-items: center;
              color: white;
              a{
                color: #27ae60;
                text-decoration: none;
              }
              button{
                background: transparent;
                color: #27ae60;
                border: 0;
                outline: 0;
                cursor: pointer;
                display: flex;
                align-items: center;
                font-size: 16px;
                img{
                  margin-left: 10px;
                }
              }
              button:hover{
                text-decoration: underline;
              }
            }
          }
        }
        .noAdvertisements{
          padding: 10px 60px;
        }
      }
    }
    .add-advertisement{
      padding: 20px 60px;
      .add-form {
        background: #252424;
        padding: 22px 26px 27px 26px;
        border-radius: 5px;
        margin-top: 32px;
        .row {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 10px;
          .input-group {
            display: flex;
            align-items: center;
            &:first-child {
              margin-right: 23px;
              input {
                max-width: 151px;
              }
            }
            &:last-child {
              input {
                max-width: 108px;
              }
            }
            span {
              color: #767676;
              font-size: 12px;
              margin-right: 6px;
            }
            input {
              width: 100%;
              height: 25px;
              background: #161616;
              border-radius: 2px;
              border: 0;
              outline: 0;
              color: #ffffff;
              padding: 0 10px;
              font-family: "Regular";
            }
          }
        }
        .input-group{
          span{
            color: #767676;
            font-size: 12px;
            margin-right: 10px;
          }
          input[type="file"]{
            margin-left: 5px;
            color: white;
          }
        }
        .btn {
          margin-top: 29px;
        }
        .success_group{
          margin-top: 30px;
          color: #27ae60;
          font-size: 18px;
        }
      }
    }
  }
}
</style>