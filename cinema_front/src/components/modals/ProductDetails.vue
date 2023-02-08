<template>
  <div class="modal">
    <div class="blur"></div>
    <div class="wrap">
      <div @click="$emit('closeModal')" class="close">
        <img src="../../assets/images/common/close.svg" alt="Закрыть" />
      </div>
      <h2 class="text-semi-bold text-white">Подробнее о товаре</h2>
      <carousel @closeModal="$emit('closeModal')"/>
      <div class="row">
        <div class="info">
          <ul>
            <p class="text-semi-bold">Характеристики</p>
            <li v-for="(item, idx) in info" :key="idx">
              <span class="text-regular text-white">{{ item.title }}: </span>
              <span class="text-regular text-white">{{ item.value }}</span>
            </li>
          </ul>
          <div class="price">
            <p class="text-semi-bold">Цена за ед. товара</p>
            <p class="text-white text-semi-bold">
              20 000 <span class="text-regular text-white">руб.</span>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <h3 class="text-semi-bold">Описание</h3>
        <div class="text">
          <p class="text-regular">Проекторы HD и FULL HD модели EIKI EK-500U</p>
          <p class="text-regular">
            Компания EIKI, являющаяся ,пожалуй, самым известным лидером в сфере
            разработки и производства проекционной технологии , предлагает
            вашему вниманию новый видеопроектор модели EIKI EK-500U. В этом
            видеопроекторе используется модуль формирования изображения по
            технологии .
          </p>
          <p class="text-regular">
            Компания EIKI как правило использует именно такую LCD технологию - с
            целью создания изображения наилучшего качества. Видеопроектор EIKI
            EK-500U оснащен именно таким LCD модулем, который обеспечивает
            великолепное качество изображения в сочетании с высокой
            контрастностью. Проекторы HD и FULL HD модели EK-500U с яркостью
            5100 и разрешением матрицы WUXGA. Этот аппарат EIKI EK-500U имеет
            формат матрицы, лучше всего подходящий для Проекторы HD и FULL HD -
            16:10 и потому он имеет разрешение WUXGA.
          </p>
          <p class="text-regular">
            Покупатели непременно отметят высокую контрастность изображения -
            2500:1 - у этой модели EIKI EK-500U видеопроектора. Данный параметр
            обеспечивает идеальное качество и детализацию получаемого
            изображения - будь то просто цифровая картинка, компьютерная графика
            или печатный текст.
          </p>
          <p class="text-regular">
            В равной степени покупатели оценят богатый функционал видеопроектора
            - такие, как функция «Сдвиг объектива» с настройкой по вертикали и в
            горизонтальной плоскости, а также функцию исправления
            трапецеидальных искажений. По этим функциям специально отметим, что
            такой функционал есть не у всех моделей цифровых проекторов. И
            конечно же все покупатели оценят длительный срок службы лампы
            видеопроектора как в обычном, так и в ЭКО режиме - до 4000 часов.
          </p>
          <p class="text-regular">
            Пользователи, использующие данный видеопроектор для мобильных
            презентаций, обязательно оценят его отличные возможности, которые
            предполагает наличие нового цифрового входа MHL (Mobile
            High-Definition Link). Эта функция делает EIKI EK-500U
            исключительным аппаратом для работы и незаменимым при проведении
            встреч - благодаря его возможности отображать HD-графику с
            разрешением WUXGA со смартфонов и планшетов. Наличие всех типов
            видеовходов несомненно обеспечивает максимальную универсальность
            видеопроектора при воспроизведении разных источников сигнала. Так же
            добавляет удобства пользования EIKI EK-500U наличие у видеопроектора
            линзы с функцией масштабирования.
          </p>
          <p class="text-regular">
            При подсоединении EIKI EK-500U к всевозможным источникам
            видеосигнала данный аппарат с собственным разрешением WUXGA так же
            подходит для источников входных сигналов от VGA до WUXGA.
            Видеопроектор EIKI EK-500U обеспечивает простое подключение к
            различным устройствам благодаря использованию системы дистанционной
            настройки. Так же пользователи будут довольны поддержкой данной
            серии видеопроекторов с системой управления Crestron RoomView ™, а
            также возможностью работы видеопроектора с оборудованием
            дистанционной коммутации AMX.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Carousel from "@/components/carousels/ProductDetailsCarousel";
export default {
  components: { Carousel },
  name: "ProductDetails",
  data() {
    return {
      info: [
        { title: "Технология", value: "LCD" },
        { title: "Яркость", value: "(ANSI Lm)5100" },
        { title: "Разрешение", value: "Разрешение" },
        { title: "Формат изображения", value: "16:10" },
        { title: "Контрастность", value: "2500:1" },
        { title: "Наличие объектива", value: "с объективом" },
        { title: "Наличие HD BaseT", value: "нет" },
        { title: "Размер корпуса", value: "318x681x581" },
        { title: "Ресурс лампы", value: "4000" },
      ],
    };
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
.modal {
  height: 100vh;
  width: 100vw;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 200;
  overflow-y: scroll;
  overflow-x: hidden;
  padding: 40px;
  .blur {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: -1;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
  }
  .wrap {
    max-width: 766px;
    width: 100%;
    padding: 40px 49px 63px 49px;
    margin-top: 13 5px;
    background: #191919;
    margin: 100px auto 100px auto;
    border-radius: 20px;
    position: relative;
    .close {
      position: absolute;
      top: 20px;
      right: 22px;
      transition: 0.2s;
      &:hover {
        filter: brightness(70%);
      }
    }
    h2 {
      font-size: 24px;
      padding-bottom: 31px;
      border-bottom: 1px solid #444444;
      margin-bottom: 46px;
    }
    .row {
      .info {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        .price {
          p:nth-child(1) {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
            margin-bottom: 20px;
          }
          p:nth-child(2) {
            color: #ffffff;
            letter-spacing: 5%;
            font-size: 20px;
            span {
              font-size: 18px;
            }
          }
        }
        ul {
          list-style-type: none;
          margin-bottom: 31px;
          p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
            margin-bottom: 20px;
          }
          li {
            margin-top: 15px;
            span {
              font-size: 14px;
              letter-spacing: 5%;
              color: #858585;
              &:nth-child(2) {
                color: #ffffff;
              }
            }
          }
        }
      }
      h3 {
        color: rgba(255, 255, 255, 0.6);
        font-size: 16px;
        margin-bottom: 20px;
      }
      .text {
        height: 651px;
        overflow-y: scroll;
        padding-right: 20px;
        p {
          color: #777777;
          font-size: 16px;
          margin-top: 30px;
          &:nth-child(1) {
            margin-top: 0;
          }
        }
      }
    }
  }
}
@media screen and (max-width: 540px) {
  .modal {
    padding: 15px;
    .wrap {
      margin-top: 0 !important;
      padding: 40px 20px 63px 20px !important;
    }
  }
}
@media screen and (max-width: 500px) {
  .modal {
    padding: 120px 15px 15px 15px;
    .wrap {
      .row {
        .text {
          height: 275px;
        }
        .info {
          flex-direction: column-reverse;
          .price {
            width: 100%;
            padding-bottom: 30px;
            border-bottom: 1px solid #777777;
            margin-bottom: 30px;
            p:nth-child(2) {
              margin-top: -10px;
            }
          }
        }
      }
    }
  }
}
</style>

