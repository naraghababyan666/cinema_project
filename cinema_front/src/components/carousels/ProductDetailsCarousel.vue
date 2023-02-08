<template>
  <div class="carousel">
    <div class="row">
      <!-- main carousel -->
      <VueSlickCarousel
        v-bind="settings"
        ref="c1"
        :asNavFor="$refs.c2"
        :focusOnSelect="true"
        class="preview"
      >
        <div v-for="(item, idx) in items" :key="idx">
          <img :src="item" alt="" />
        </div>
      </VueSlickCarousel>
      <div class="info">
        <h3 class="text-white text-semi-bold">Кинопроектор EIKI EK-Cinema</h3>
        <!-- carousel -->
        <VueSlickCarousel
          ref="c2"
          v-bind="settings2"
          :asNavFor="$refs.c1"
          :focusOnSelect="true"
          class="main"
        >
          <div v-for="(item, idx) in items" :key="idx">
            <img :src="item" alt="" />
          </div>
        </VueSlickCarousel>
        <div class="buttons">
          <button @click="showPrev">
            <img
              src="../../assets/images/cinema-order-equipment-page/arrow_white.svg"
              alt="Назад"
            />
          </button>
          <button @click="showNext">
            <img
              src="../../assets/images/cinema-order-equipment-page/arrow_white.svg"
              alt="Вперед"
            />
          </button>
        </div>
        <div class="add">
          <div class="input-group">
            <label class="text-regular">Количество</label>
            <div class="calc">
              <button @click="decrement">
                <img src="../../assets/images/common/minus.svg" alt="Убавить" />
              </button>
              <div class="screen text-white text-semi-bold">{{ amount }}</div>

              <button @click="increment">
                <img src="../../assets/images/common/plus.svg" alt="Добавить" />
              </button>
            </div>
          </div>
          <!-- <button class="add-btn text-white text-semi-bold">Добавить</button> -->
          <Btn @click.native="$emit('closeModal')" class="add-btn" text="Добавить" />
        </div>
      </div>
    </div>
    <!-- <button class="add-btn add-btn2 text-white text-semi-bold">Добавить</button> -->
    <Btn @click.native="$emit('closeModal')" class="add-btn add-btn2" text="Добавить" fluid />
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import Slide from "@/assets/images/slide_example.png";
import Btn from "@/components/Btn";

export default {
  name: "Carousel",
  components: { VueSlickCarousel, Btn },
  data() {
    return {
      // urls to images, you can get them from backend in the future
      amount: 1,
      items: [Slide, Slide, Slide, Slide, Slide, Slide, Slide, Slide],
      settings: {
        arrows: false,
        dots: false,
        slidesToShow: 1,
        fade: true,
      },
      settings2: {
        arrows: false,
        dots: false,
        slidesToShow: 4,
        responsive: [
          {
            breakpoint: 795,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 643,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      },
    };
  },
  methods: {
    showNext() {
      this.$refs.c1.next();
    },
    showPrev() {
      this.$refs.c1.prev();
    },
    increment() {
      this.amount++;
    },
    decrement() {
      if (this.amount == 1) {
        return;
      }
      this.amount--;
    },
  },
  mounted() {
    this.$nextTick(this.$forceUpdate);
  },
};
</script>

<style lang="scss" scoped>
.carousel {
  padding-bottom: 46px;
  margin-bottom: 36px;
  border-bottom: 1px solid #777777;
  display: flex;
  flex-direction: column;
  align-items: center;
  .row {
    display: flex;
    justify-content: space-between;
    width: 100%;
    h3 {
      font-size: 18px;
    }
    .preview {
      max-width: 224px;
      max-height: 224px;
      width: 100%;
      height: 100%;
      margin-right: 20px;
      * {
        outline: 0;
        border: 0;
      }
      img {
        max-width: 224px;
        max-height: 224px;
        width: 100%;
        height: 100%;
        border-radius: 10px;
      }
    }
    .info {
      position: relative;
      max-width: 424px;
      width: 100%;
      .buttons {
        position: absolute;
        top: 70px;
        left: 0;
        z-index: 20;
        max-width: 353px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        button {
          background: transparent;
          padding: 6px 9px;
          border: 0;
          outline: 0;
          background: rgba(0, 0, 0, 0.8);
          &:nth-child(1) {
            border-radius: 0 5px 5px 0;
            img {
              transform: rotate(-180deg);
            }
          }
          &:nth-child(2) {
            border-radius: 5px 0 0 5px;
          }
        }
      }
      .add {
        margin-top: 33px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        width: 100%;
        .input-group {
          label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
          }
          .calc {
            display: flex;
            align-items: center;
            margin-top: 12px;
            .screen {
              padding: 10px 30px;
              border: 1px solid rgba(255, 255, 255, 0.6);
              margin: 0 10px;
              text-align: center;
              width: 71px;
              font-size: 16px;
            }
            button {
              background: transparent;
              height: 36px;
              border: 0;
              outline: 0;
              display: flex;
              align-items: center;
            }
          }
        }
      }

      .main {
        max-width: 367px;
        width: 100%;
        margin-top: 20px;

        * {
          outline: 0;
          border: 0;
        }
        .slick-list {
          .slick-track {
            .slick-slide {
              img {
                filter: brightness(30%);
                border-radius: 10px;
                width: 77px;
                height: 77px;
              }
            }
            .slick-current {
              img {
                filter: brightness(100%);
              }
            }
          }
        }
      }
    }
  }
  .add-btn {
    padding: 5px 55px;
    height: 48px;
  }
  .add-btn2 {
    margin-top: 27px;
    display: none;
  }
}

@media screen and (max-width: 834px) {
  .carousel {
    padding-bottom: 46px;
    margin-bottom: 36px;
    border-bottom: 1px solid #777777;
    .row {
      display: flex;
      justify-content: space-between;
      h3 {
        font-size: 18px;
      }
      .preview {
        width: 180px;
        height: 180px;
        * {
          outline: 0;
          border: 0;
        }
        img {
          width: 180px;
          height: 180px;
          border-radius: 10px;
        }
      }
      .info {
        display: flex;
        flex-direction: column;
        max-width: 424px;
        width: 100%;
        .buttons {
          position: absolute;
          top: 70px;
          left: 0;
          z-index: 20;
          max-width: 353px;
          width: 100%;
          display: flex;
          justify-content: space-between;
          button {
            background: transparent;
            padding: 6px 9px;
            border: 0;
            outline: 0;
            background: rgba(0, 0, 0, 0.8);
            &:nth-child(1) {
              border-radius: 0 5px 5px 0;
              img {
                transform: rotate(-180deg);
              }
            }
            &:nth-child(2) {
              border-radius: 5px 0 0 5px;
            }
          }
        }
        .add {
          margin-top: 33px;
          display: flex;
          justify-content: space-between;
          align-items: flex-end;
          width: 100%;
          .input-group {
            label {
              color: rgba(255, 255, 255, 0.6);
              font-size: 16px;
            }
            .calc {
              display: flex;
              align-items: center;
              margin-top: 12px;
              .screen {
                padding: 10px 30px;
                border: 1px solid rgba(255, 255, 255, 0.6);
                margin: 0 10px;
                text-align: center;
                width: 71px;
                font-size: 16px;
              }
              button {
                background: transparent;
                height: 36px;
                border: 0;
                outline: 0;
                display: flex;
                align-items: center;
              }
            }
          }
        }
      }
    }
  }
}

@media screen and (max-width: 795px) {
  .main {
    max-width: 260px !important;
    width: 100%;
    margin-top: 20px;
  }
  .buttons {
    max-width: 251px !important;
  }
}
@media screen and (max-width: 720px) {
  .preview {
    width: 150px !important;
    height: 150px !important;
    img {
      width: 150px !important;
      height: 150px !important;
    }
  }
  .add-btn {
    padding: 5px 30px !important;
  }
}
@media screen and (max-width: 643px) {
  .info h3 {
    display: none !important;
  }
  .preview {
    width: 180px !important;
    height: 180px !important;
    img {
      width: 180px !important;
      height: 180px !important;
    }
  }
  .add-btn {
    display: none !important;
  }
  .add-btn2 {
    display: block !important;
    height: 35px !important;
  }
  .main {
    max-width: 180px !important;
    width: 100%;
    margin-top: 0 !important;
  }
  .buttons {
    max-width: 167px !important;
    top: 25px !important;
  }
}

@media screen and (max-width: 443px) {
  .preview {
    max-width: 120px !important;
    max-height: 120px !important;
    width: 100% !important;
    height: 100%;
    margin-right: 10px !important;
    img {
      width: 100% !important;
      height: 100% !important;
    }
  }
  .add {
    justify-content: flex-end !important;
    label {
      font-size: 12px !important;
    }
  }
}
@media screen and (max-width: 350px) {
  .preview {
    display: none !important;
  }
  .add {
    justify-content: center !important;
  }
}
</style>