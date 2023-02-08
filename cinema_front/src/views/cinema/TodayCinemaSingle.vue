<template>
  <div class="today-single-wrap">
    <Header />
    <div class="container">
      <arrow-back />
      <div class="heading">
        <h1 class="h1 text-semi-bold text-white">Гениальное ограбление</h1>
        <div class="rating">
          <span class="text-white text-bold h1">{{ desc.rate }}</span>
          <div class="stars">
            <img src="@/assets/images/rating/gray-stars.svg" alt="Рейтинг" class="gray" />
            <div class="white" :style="{ width: desc.rate * 10 + '%' }"></div>
          </div>
        </div>
      </div>
      <div class="desc">
        <img src="@/assets/images/rating/example.png" :alt="desc.title" class="preview" />
        <div class="card">
          <p class="description text-regular text-gray p-sm">{{ desc.description }}</p>
          <div class="info">
            <div class="info-item text-regular">
              Страна:
              <span>{{ desc.country }}</span>
            </div>
            <div class="info-item text-regular">
              Год:
              <span>{{ desc.year }}</span>
            </div>
            <div class="info-item text-regular">
              <span>{{ desc.time }} мин.</span>
            </div>
          </div>
          <div class="info">
            <div class="info-item text-regular">
              Режиссер:
              <span class="decor">{{ desc.director }}</span>
            </div>
          </div>
          <div class="info">
            <div class="info-item text-regular">
              Жанр:
              <span class="decor">{{ desc.jangre }}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div v-for="(item, idx) in desc.content" :key="idx" class="item">
          <h2 class="text-white text-semi-bold h2">{{item.title}}</h2>
          <p v-for="(p, idx) in item.text" :key="idx" class="text-regular text-gray p-sm">{{p}}</p>
        </div>
        <div class="item">
          <h2 class="text-white text-semi-bold h2">Актеры</h2>
          <div class="actors-wrap">
            <div class="actors">
              <div v-for="(item, idx) in desc.actors" :key="idx" class="actors-item">
                <img src="@/assets/images/actor_example.png" :alt="item.name" />
                <router-link to="/" class="text-white text-regular p-sm">{{item.name}}</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <btn-group />
    </div>
    <Footer />
  </div>
</template>

<script>
import BtnGroup from "@/components/BtnGroup";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "@/components/ArrowBack";

export default {
  components: { BtnGroup, Header, Footer, ArrowBack },
  data: () => ({
    desc: {
      rate: 9.15,
      title: "Гениальное ограбление",
      views: 150,
      country: "Италия",
      time: 118,
      year: "2021",
      jangre: "Боевик, Триллер",
      director: "Жауме Балагеро",
      description:
        "Они ограбят самый защищённый в мире банк, используя только мозг",
      content: [
        {
          title: "Описание",
          text: [
            "Гениальный инженер спланировал ограбление века. Ему стало известно, что некий ценный артефакт окажется в банковском сейфе столетней давности. К сейфу нет чертежей, а система защиты включает в себя затопление камеры хранения вместе с грабителем. Эти трудности не останавливают молодого авантюриста и его напарника-искусствоведа. Дерзкий план они хотят осуществить средь бела дня почти в открытую: ведь вся Испания, включая сотрудников банка, как раз смотрит финал чемпионата мира по футболу 2010 года.",
          ],
        },
        {
          title: "Сюжет",
          text: [
            "Отчаянная группа охотников за сокровищами не знает отдыха. Годами они пытаются определить местонахождение очередного клада, а затем, когда оказываются на заветном месте, рискуют жизнями, чтобы добраться до золотых слитков или старинных артефактов.",
            "Однажды им удалось отыскать редчайшие экземпляры затонувшего много веков назад клада. Едва не погибнув под обрушившимися рифами, охотники вытащили на берег ящик, который, увы, тут же был передан испанским властям, наблюдавшим за операцией. В ходе суда подтвердилась судьба сокровищ – теперь они принадлежат испанской короне, а охотники вновь остались ни с чем.",
            "Не желая мириться с несправедливостью, команда решает переквалифицироваться в грабителей и, проникнув в Банк Испании, забрать то, что принадлежит им по праву. Для осуществления операции банда привлекает юного, но крайне образованного студента, который не видит света после окончания университета – всё вокруг кажется ему недостаточно увлекательным и, порой, даже унылым.",
            "План охотников был прост – пока вся страна смотрит финальный матч на площади перед банком, у них есть 105 минут на совершение операции. Смогут ли искатели приключений вернуть себе то, что принадлежит им по праву? Или им суждено навсегда забыть о сокровищах, поднятых со дна океана?",
          ],
        },
      ],
      actors: [
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
        { name: "Фамке Янссен" },
      ],
    },
  }),
};
</script>

<style lang="scss" scoped>
.today-single-wrap {
  .container {
    padding: 87px 15px 121px 15px;
    position: relative;
    .heading {
      display: flex;
      align-items: center;
      .rating {
        display: flex;
        align-items: flex-end;
        margin-left: 115px;
        span {
          background: #d8004e;
          height: 27px;
          width: calc(142px - 47px);
          position: relative;
          margin-left: -15px;
          margin-right: 2px;
          font-size: 18px;
          display: flex;
          align-items: center;
          justify-content: center;
          &::after {
            content: "";
            transition: 0.35s;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 12.5px 15px 16.5px 0;
            border-color: transparent #000000 transparent transparent;
            position: absolute;
            right: -1px;
            top: 0;
          }
        }
        .stars {
          position: relative;
          transform: scale(0.7) translateX(-55px);

          .white {
            position: absolute;
            top: 0;
            left: 0;
            background: url("../../assets/images/rating/white-stars.svg")
              no-repeat left;
            display: block;
            height: 22px;
          }
        }
      }
    }
    .desc {
      display: flex;
      align-items: flex-start;
      margin-top: 80px;
      img {
        border-radius: 22px;
        max-width: 557px;
        width: 100%;
        height: auto;
      }
      .card {
        padding: 15px 30px 30px 60px;
        .info {
          display: flex;
          align-items: center;
          margin-top: 10px;
          .info-item {
            font-size: 16px;
            color: #9a9a9a;
            padding-right: 18px;
            &:nth-child(2),
            &:nth-child(3) {
              padding-left: 18px;
              border-left: 1px solid #9a9a9a;
            }
            span {
              color: #ffffff;
            }
            .decor {
              text-decoration: underline;
              cursor: pointer;
            }
          }
        }
        .description {
          margin-bottom: 43px;
          position: relative;
          font-size: 16px;
          &::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -30px;
            width: 23px;
            height: 33px;
            background: url("../../assets/images/rating/quote.svg") no-repeat
              center;
          }
        }
      }
    }
    .row {
      margin-top: 62px;
      padding: 40px 50px 0 50px;
      background: linear-gradient(180deg, #151515 0%, rgba(21, 21, 21, 0) 100%);
      border-radius: 22px 22px 0px 0px;
      .item {
        margin-bottom: 30px;
        .actors-wrap {
          padding-bottom: 20px;
          overflow-y: hidden;
          overflow-x: scroll;
          .actors {
            margin-top: 30px;
            display: flex;

            &-item {
              margin-right: 20px;
              &:last-child {
                margin-right: 0;
              }
              img {
                border-radius: 9px;
                margin-bottom: 20px;
              }
            }
          }
        }
        &:last-child {
          margin-bottom: 0;
        }
        p {
          margin-top: 30px;
        }
      }
    }
    .buttons {
      margin-top: 80px;
    }
  }
}

@media (max-width: 1045px) {
  .today-single-wrap {
    .container {
      .desc {
        img {
          max-width: 350px;
        }
      }
    }
  }
}

@media (max-width: 834px) {
  .today-single-wrap {
    .container {
      padding: 87px 15px 81px 15px;
      .heading {
        .rating {
          max-width: 350px;
          margin-left: 40px;
        }
      }
      .desc {
        background: #151515;
        border-radius: 22px;
        overflow: hidden;
        margin-top: 22.82px;

        img {
          max-width: 350px;
          border-radius: 0;
        }
        .card {
          padding: 20px 20px 25px 20px;
          * {
            font-size: 14px !important;
          }

          .description {
            margin-bottom: 30px;
            margin-left: 20px;
            &::before {
              width: 16px;
              height: 16px;
              background-size: contain;
              top: 0;
              left: -20px;
            }
          }
          .info {
            margin-top: 20px;
          }
        }
      }
      .row {
        margin-top: 40px;
        padding: 27px 33px;
        .item {
          margin-bottom: 30px;
        }
      }
    }
  }
}
@media (max-width: 774px) {
  .today-single-wrap {
    .container {
      .heading {
        flex-wrap: wrap;
        .rating {
          max-width: 350px;
          margin-left: 15px;
          margin: 20px;
        }
      }
      .desc {
        background: transparent;
        border-radius: 22px;
        overflow: hidden;
        flex-direction: column;
        img {
          max-width: 480px;
          border-radius: 18px;
          margin: auto;
        }
        .card {
          padding: 20px 0 0 0;
          max-width: 480px;
          margin: auto;
          * {
            font-size: 14px !important;
          }

          .description {
            margin-bottom: 30px;
            margin-left: 20px;
            &::before {
              width: 16px;
              height: 16px;
              background-size: contain;
              top: 0;
              left: -20px;
            }
          }
          .info {
            margin-top: 20px;
          }
        }
      }
    }
  }
}

@media (max-width: 480px) {
  .today-single-wrap {
    .container {
      padding: 48px 15px 25px 15px;

      .heading {
        flex-wrap: wrap;
        .rating {
          max-width: 350px;
          margin-left: 15px;
          margin: 20px;
        }
      }
      .desc {
        background: transparent;
        border-radius: 22px;
        overflow: hidden;
        flex-direction: column;
        margin-top: 0;
        img {
          max-width: 480px;
          border-radius: 18px;
          margin: auto;
        }
        .card {
          padding: 20px 0 0 0;
          max-width: 480px;
          margin: auto;
          * {
            font-size: 12px !important;
          }
          .info {
            .info-item {
              padding-left: 9px !important;
              padding-right: 9px;
            }
          }
          .description {
            margin-bottom: 30px;
            margin-left: 20px;
            &::before {
              width: 16px;
              height: 16px;
              background-size: contain;
              top: 0;
              left: -20px;
            }
          }
          .info {
            margin-top: 20px;
          }
        }
      }
      .row {
        padding: 20px 15px;
        .actors-wrap {
          .actors {
            &-item {
              max-width: 132px;
              margin-right: 15px;
              img {
              max-width: 132px;
                
              }
            }
          }
        }
      }
      .buttons {
        margin-top: 40px;
      }
    }
  }
}
</style>