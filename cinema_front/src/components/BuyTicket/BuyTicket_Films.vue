<template>
  <div class="rating-wrap">
    <Header />
    <section class="wrap bg-black">
      <div class="container">
        <arrow-back />
        <title-decor text="Фильмы ExtraCinema" :img="RateIcon" />
        <div class="row">
          <router-link
            v-for="(item, idx) in films"
            :key="idx"
            class="item"
            :to="{name: 'ec-ticket-current-film', params: {id: item.id}}"
          >
            <img :src="`${baseUrl}storage/${item.image}`" style="width: 500px; height:300px" />
            <!--            <img src="@/assets/images/rating/example.png" :alt="item.title" class="preview" />-->
            <div class="card">
              <h2 class="text-white text-semi-bold">{{ item.title }}</h2>
              <div class="rate" >
                <div class="rating">
                  <span class="text-white text-bold h1">{{ item.rating }}</span>
                </div>
                <div class="rating-stars">
                  <star-rating ref="stars" :read-only="true" :show-rating="false" :max-rating="10" :star-size="25" :rating="item.rating" :round-start-rating="false" active-color="#d8004e"/>
                </div>
              </div>



              <div class="views p-sm text-white text-regular">
                Количество просмотров:
                <span>{{ item.views }}</span>
                <img src="@/assets/images/rating/flag.svg" :alt="999 + 'просмотров'" />
              </div>
              <div class="info">
                <div class="info-item text-regular">
                  Страна:
                  <span>{{ item.country }}</span>
                </div>
                <div class="info-item text-regular">
                  Год:
                  <span>{{ item.year }}</span>
                </div>
              </div>
              <div class="info">
                <div class="info-item text-regular">
                  Режиссер:
                  <span>{{ item.director }}</span>
                </div>
              </div>
              <p
                  class="description text-regular text-gray p-sm"
                  v-html="item.description
                ? `<span class='text'>${item.description.substring(0, 40)}</span>` + ' ...'
                : ''"
              ></p>
            </div>
          </router-link>
        </div>
        <dot-loader />
        <btn-group />
      </div>
    </section>
    <div class="filmdModalParent" v-if="openModalFilm">
      <FilmModal class="filmModal" data-aos="zoom-in"  :filmId="filmId" @closeModal="closeMod" v-on:openHall="openHall"/>

    </div>
    <div class="hallModalParent" v-if="openModalHall">
      <HallModal class="hallModal" data-aos="zoom-in-up" @closeAllModal="closeAllModalHandler" @closeHallModal="closeHallModalHandler"/>
    </div>

    <Footer />
  </div>
</template>

<script>
import BtnGroup from "@/components/BtnGroup";
import TitleDecor from "@/components/TitleDecor";
import axios from "axios";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";
import DotLoader from "@/components/DotLoader";
import RateIcon from "@/assets/images/for-holders-page/carousel/item1.svg";
import StarRating from 'vue-star-rating'
import FilmModal from '@/components/BuyTicket/BuyTicket_FilmModal'
import HallModal from "./BuyTicket_Hall";
export default {
  components: { Header, Footer, ArrowBack, BtnGroup, TitleDecor, DotLoader, StarRating, FilmModal, HallModal },
  data: () => ({
    RateIcon,
    films : [],
    filmId: 0,
    hallSeanceId: null,
    baseUrl: process.env.VUE_APP_API_URL,
    openModalFilm: false,
    openModalHall: false,

  }),
  methods: {
    async ModalSeancesForTicket(id){
      this.filmId = await id
      this.openModal()
    },
    openModal(){
      this.openModalFilm = true
    },
    closeMod(){
      this.openModalFilm = false
    },
    openHall(e){
      this.hallSeanceId = e
      // this.openModalFilm = false
      this.openModalHall = true
    },
    closeAllModalHandler(){
      this.openModalFilm = false
      this.openModalHall = false
    },
    async closeHallModalHandler(){
       this.openModalFilm = await true
       this.openModalHall = false
    }
  },
  mounted() {
    // axios.post(process.env.VUE_APP_API_URL + 'api/cinema/forHolders/rating').then((res) => {
    //   if(res.data.NotVerifiedDocuments){
    //     this.$router.back()
    //   }else{
    //
    //
    //   }
    axios.post(process.env.VUE_APP_API_URL + 'api/get-films').then((res) => {
      this.films = res.data
    })
    // })
  },
};
</script>

<style lang="scss">
.hallModalParent{
  position: fixed;
  top: 0;
  background-color: transparent;
  width: 100vw;
  height: 100vh;
  padding: 80px;
  //margin: 40px 20px;
  display: flex;
  justify-content:center;
  align-items: center;
}
.hallModal{
  background-color: #1a1a1a;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}
.filmdModalParent{
  position: fixed;
  top: 0;
  background-color: transparent;
  width: 100vw;
  height: 100vh;
  padding: 80px;
  //margin: 40px 20px;
  display: flex;
  justify-content:center;
  align-items: center;
}
.filmModal {
  background-color: #1a1a1a;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  //padding: 50px;

.filmModal::-webkit-scrollbar {
  display: none;
}

.filmModal {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

  .rate {
    display: flex;
    align-items: baseline;
    justify-content: center;
  }

  .rating-wrap {
    .wrap {
      .container {
        position: relative;
        padding: 87px 15px 121px 15px;

        .row {
          margin-top: 88px;

          .item {
            width: 100%;
            display: flex;
            align-items: center;
            border-radius: 22px;
            overflow: hidden;
            background: #151515;
            margin-bottom: 20px;
            transition: 0.35s;
            text-decoration: none;

            &:hover {
              background: #000000;
              box-shadow: 0 0 60px rgba(216, 0, 78, 0.57);

              .card .rating span::after {
                border-color: transparent #000000 transparent transparent;
              }
            }

            &:last-child {
              margin-bottom: 0;
            }

            img.preview {
              max-width: 521px;
              max-height: 311px;
              width: 100%;
              height: auto;
            }

            .card {
              padding: 30px 50px;
              max-width: 500px;

              h2 {
                margin-bottom: 20px;
              }

              .rating {
                display: flex;
                align-items: center;
                margin-bottom: 10px;

                span {
                  background: #d8004e;
                  height: 43px;
                  width: calc(224px - 77px);
                  position: relative;
                  margin-left: -15px;
                  margin-right: 2px;

                  &::before {
                    content: "";
                    height: 43px;
                    width: 77px;
                    background: #d8004e;
                    display: block;
                    position: absolute;
                    top: 0;
                    left: -77px;
                  }

                  &::after {
                    content: "";
                    transition: 0.35s;
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 21.5px 15px 21.5px 0;
                    border-color: transparent #151515 transparent transparent;
                    position: absolute;
                    right: -1px;
                    top: 0;
                  }
                }

                //.stars {
                //  position: relative;
                //  .white {
                //    position: absolute;
                //    top: 0;
                //    left: 0;
                //    background: url("../../assets/images/rating/white-stars.svg")
                //      no-repeat left;
                //    // background-size: cover;
                //    display: block;
                //    height: 22px;
                //  }
                //}
              }

              .views {
                display: flex;
                align-items: center;

                span {
                  font-size: 30px;
                  margin-left: 15px;
                }

                img {
                  width: 24px;
                  height: 24px;
                }
              }

              .info {
                display: flex;
                align-items: center;
                margin-top: 10px;

                .info-item {
                  font-size: 12px;
                  color: #9a9a9a;
                  padding-right: 18px;

                  &:nth-child(2) {
                    padding-left: 18px;
                    border-left: 1px solid #9a9a9a;
                  }

                  span {
                    color: #ffffff;
                  }
                }
              }

              .description {
                margin-top: 22px;
                position: relative;
                max-width: 100%;

                span {
                  max-width: 100%;
                }

                &::before {
                  content: "";
                  position: absolute;
                  top: -10px;
                  left: -30px;
                  width: 23px;
                  height: 33px;
                  background: url("../../assets/images/rating/quote.svg") no-repeat center;
                }
              }
            }
          }
        }

        .loader {
          margin-top: 60px;
        }
      }
    }
  }

  @media screen and (max-width: 1000px) {
    .rating-wrap {
      .wrap {
        .container {
          padding: 87px 15px 81px 15px;

          .row {
            margin-top: 60px;

            .item {
              margin-bottom: 15px;

              img.preview {
                max-width: 370px;
                max-height: 100%;
                width: 100%;
                height: 130% !important;
              }

              .card {
                padding: 15px 20px 15px 20px;

                .rating {
                  span {
                    font-size: 18px;
                    height: 27px;
                    width: calc(142px - 47px);

                    &::before {
                      height: 27px;
                      width: 47px;
                      left: -47px;
                    }

                    &::after {
                      border-width: 12.5px 15px 16.5px 0;
                    }
                  }
                }

                //.stars {
                //  transform: scale(0.7) translateX(-55px);
                //}
                .views {
                  span {
                    font-size: 20px;
                  }

                  img {
                    width: 17px;
                    height: 17px;
                  }
                }

                .description {
                  margin-left: 20px;
                  display: flex;

                  .text {
                    display: block;
                    max-width: 268px;
                    height: 16px;
                    overflow: hidden;
                  }

                  &::before {
                    top: 0;
                    left: -20px;
                    width: 16px;
                    height: 16px;
                    background-size: contain;
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  @media (max-width: 710px) {
    .rating-wrap {
      .wrap {
        .container {
          padding: 48px 15px 25px 15px;

          .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 25px;

            .item {
              max-width: 315px;
              min-width: 280px;
              width: 100%;
              margin: 7.5px;
              display: flex;
              flex-direction: column;
              top: 0;

              .card {
                padding: 14px;
                max-width: 315px;
                position: relative;

                .rating {
                  position: absolute;
                  top: -27px;
                  left: 15px;

                  .text-white {
                    padding-left: 20px;
                    display: flex;
                    align-items: center;
                    // &::before {
                    //   display: none;
                    // }
                  }
                }
              }
            }
          }

          .loader {
            margin-top: 21px;
          }

          .buttons {
            margin-top: 34px;
          }
        }
      }
    }
  }
}
</style>