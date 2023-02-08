<template>
  <div class="form">
    <div class="scroll-wrap">
      <p  v-if="noHall" class="noHall">У вас нет кинозалов</p>
      <div v-for="(item, idx) in halls" :key="idx" class="item">
        <div class="row">
          <h3 class="name text-white text-semi-bold"> ООО Мой кинозал « {{ item.name_hall }} »№ {{ idx + 1 }}</h3>
          <div class="buttons">
            <edit-btn
              @click.native="$emit('onEdit')"
              :show-text="showBtnText"
            />
            <delete-btn
              @click.native="deleteHandler(item)"
              :show-text="showBtnText"
            />
          </div>
        </div>
        <div class="row">
          <p class="subtitle text-regular">Адрес: </p>
          <p class="content text-regular">{{ item.region }}, {{item.city}}, {{item.house}}</p>
        </div>
        <div class="row">
          <p class="subtitle text-regular">Описание зала:</p>
          <p class="content text-regular">
<!--            Характеристики помещения:Ширина - {{item.hall_width}}м | Длина - {{item.hall_length }}м | Высота - {{item.hall_height}}м <br />-->
            Количество посадочных мест - {{item.hall_seats}} <br/>
            Звуковое оборудование: {{item.voice_hardware}} <br />
            Размер экрана։ Ширина - {{item.screen_width}}м, длина - {{item.screen_length}}м
          </p>
        </div>
      </div>
    </div>
    <add-btn @click.native="formActive = !formActive" text="Добавить Кинозал" />
    <div v-if="formActive" class="add-form">
      <p class="text-medium text-white">
        ТУТ ДОЛЖНА БЫТЬ ФОРМА, НО ЕЕ ПОКА НЕТ
      </p>
      <Btn text="Добавить" fluid />
    </div>
  </div>
</template>

<script>
import AddBtn from "@/components/AddBtn";
import Btn from "@/components/Btn";
import DeleteBtn from "@/components/DeleteBtn";
import EditBtn from "@/components/EditBtn";
import axios from "axios";

export default {
  components: { AddBtn, Btn, DeleteBtn, EditBtn },
  data() {
    return {
      formActive: false,
      showBtnText: true,
      noHall: false,
      halls: [],
      items: [
        {
          title: "ООО «Мой кинозал №1»",
          adress: "г. Тула, ул Металлургов, 100",
          desc:
            "<p>Характеристики помещения:Ширина - 10 м | Длина -  8 м | Высота - 3 м </p><p>Количество посадочных мест - 100</p><p>Звуковое оборудование: название 1, название 2, название 3.</p><p>Размер экрана: Ширина - 3 м, длина - 10 м</p><p>Фото зала с 4-х ракурсов: <span>Фото</span></p>",
        },
        {
          title: "ООО «Мой кинозал №2»",
          adress: "г. Тула, ул Металлургов, 100",
          desc:
            "<p>Характеристики помещения:Ширина - 10 м | Длина -  8 м | Высота - 3 м </p><p>Количество посадочных мест - 100</p><p>Звуковое оборудование: название 1, название 2, название 3.</p><p>Размер экрана: Ширина - 3 м, длина - 10 м</p><p>Фото зала с 4-х ракурсов: <span>Фото</span></p>",
        },
        {
          title: "ООО «Мой кинозал №3»",
          adress: "г. Тула, ул Металлургов, 100",
          desc:
            "<p>Характеристики помещения:Ширина - 10 м | Длина -  8 м | Высота - 3 м </p><p>Количество посадочных мест - 100</p><p>Звуковое оборудование: название 1, название 2, название 3.</p><p>Размер экрана: Ширина - 3 м, длина - 10 м</p><p>Фото зала с 4-х ракурсов: <span>Фото</span></p>",
        },
      ],
    };
  },
  methods: {
    deleteHandler(item) {
      this.items = this.items.filter((el) => el !== item);
    },
  },
  mounted() {
    if (window.screen.width <= 834) {
      this.showBtnText = false;
    }
    axios.post(process.env.VUE_APP_API_URL + 'api/get-halls').then((res) => {
      if(res.data.length == 0){
        this.noHall = true
      }else{
        this.halls = res.data
        console.log(this.halls)
      }

    })
  },
};
</script>

<style lang="scss" scoped>
.noHall{
  font-family: "SemiBold" !important;
  font-size: 16px;
  color: #ffffff;

}
.form {
  padding: 53px 74px 76px 74px;
  margin: 122px auto 66px auto;
  border-radius: 10px;
  max-width: 871px;
  width: 100%;
  background: #161616;
  .scroll-wrap {
    max-height: 607px;
    height: 100%;
    overflow-y: scroll;
    overflow-x: hidden;
    padding-right: 41px;
    .item {
      padding: 50px 0;
      border-bottom: 1px solid #464646;
      &:first-child {
        padding: 0 0 50px 0;
      }
      &:last-child {
        padding: 50px 0 0 0;
        border-bottom: 0;
      }
      .row {
        display: flex;
        &:nth-child(1) {
          justify-content: space-between;
          align-items: center;
          .buttons {
            display: flex;
            align-items: center;
            button {
              &:nth-child(2) {
                margin-left: 32px;
              }
            }
          }
        }
        &:nth-child(2),
        &:nth-child(3) {
          margin-top: 25px;
          .subtitle {
            min-width: 166px;
            color: #9a9a9a;
            font-size: 16px;
          }
          .content {
            color: #9a9a9a;
            font-size: 16px;
            line-height: 2em;
            p {
              span {
                color: #ffffff !important;
              }
            }
          }
        }
      }
    }
  }
  .add-form {
    margin-top: 40px;
    .btn {
      margin-top: 40px;
    }
  }
  .addBtn {
    margin-top: 67px;
  }
}
@media screen and (max-width: 834px) {
  .form {
    padding: 41px 37px 49px 37px;
    margin: 122px auto 66px auto;
    .scroll-wrap {
      .item {
        .row:nth-child(2),
        .row:nth-child(3) {
          flex-wrap: wrap;
          .subtitle {
            margin-bottom: 10px;
          }
        }
      }
    }
  }
}

@media screen and (max-width: 480px) {
  .form {
    background: transparent;
    padding: 0;
    margin: 88px auto 47px auto;
    .scroll-wrap {
      padding-right: 20px;
      .item {
        .row:nth-child(2),
        .row:nth-child(3) {
          flex-wrap: wrap;
        }
      }
    }
    .addBtn {
      margin-top: 50px;
    }
  }
}
</style>

<style lang="scss">
//Here I created not scoped styles, because its impossible to manage v-html under scoped styles (vue bug)
.content {
  p {
    margin-top: 17px;
    &:nth-child(1) {
      margin-top: 0;
    }
    span {
      color: #27ae60;
      text-decoration: underline;
      cursor: pointer;
      &:hover {
        text-decoration: none;
      }
    }
  }
}
</style>