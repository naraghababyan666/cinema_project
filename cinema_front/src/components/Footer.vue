<template>
  <footer>
    <div class="footer-first bg-black">
      <div class="container" :class="{ 'container-fluid': fluid }">
        <div class="contact">
          <a href="tel:+79951317777" class="text-medium text-white"
            ><img src="../assets/images/footer/phone.svg" alt="icon" />+7 995
            131 77 77</a
          >
          <a
            href="mailto:support@extrafintech.com"
            class="text-medium text-white"
            ><img src="../assets/images/footer/pen.svg" alt="icon" />
            support@extrafintech.com</a
          >
          <div class="time">
            <p class="text-white text-medium">Служба поддержки</p>
            <p class="text-gray text-regular">пн-пт 09:00-18:00 мск</p>
          </div>
        </div>
        <ul class="socials">
          <li>
            <a href="/"
              ><img src="../assets/images/footer/Instagram.svg" alt=""
            /></a>
          </li>
          <li>
            <a href="/"
              ><img src="../assets/images/footer/Facebook.svg" alt=""
            /></a>
          </li>
          <li>
            <a href="/"
              ><img src="../assets/images/footer/YouTube.svg" alt=""
            /></a>
          </li>
          <li>
            <a href="/"
              ><img src="../assets/images/footer/Telegram.svg" alt=""
            /></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-second">
      <div class="container" :class="{ 'container-fluid': fluid }">
        <div class="markets">
          <a class="g-play">
            <img
              src="../assets/images/footer/Gplay.svg"
              alt="Доступно в Google Play"
            />
          </a>
          <a class="app-store">
            <img
              src="../assets/images/footer/AppStore.svg"
              alt="Доступно в Google Play"
            />
          </a>
        </div>
        <ul class="socials">
          <li>
            <a href="/"
              ><img src="../assets/images/footer/Instagram.svg" alt=""
            /></a>
          </li>
          <li>
            <a href="/"
              ><img src="../assets/images/footer/Facebook.svg" alt=""
            /></a>
          </li>
          <li>
            <a href="/"
              ><img src="../assets/images/footer/YouTube.svg" alt=""
            /></a>
          </li>
          <li>
            <a href="/"
              ><img src="../assets/images/footer/Telegram.svg" alt=""
            /></a>
          </li>
        </ul>
        <p class="text-white text-regular">
          © {{ year }} ExtraCinema. Все права защищены.
        </p>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      year: new Date().getFullYear(),
    };
  },
  props: {
    fluid: {
      required: false,
      type: Boolean,
    },
  },
};
</script>

<style lang="scss" scoped>
.container-fluid {
  max-width: 100%;
}
footer {
  .footer-first {
    border-top: 1px solid #777777;
    padding: 28px 0;
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      .contact {
        display: flex;
        justify-content: space-between;
        a {
          text-decoration: none;
          font-size: 26px;
          display: flex;
          align-items: center;
          img {
            margin-right: 15px;
          }
          &:nth-child(1) {
            padding-right: 27px;
          }
          &:nth-child(2) {
            padding-right: 27px;
            padding-left: 27px;
            border-left: 1.5px solid #fff;
            border-right: 1.5px solid #fff;
            font-size: 20px;
          }
          &:hover {
            text-decoration: underline;
          }
        }
        .time {
          margin-left: 27px;
          p {
            font-size: 12px;
          }
        }
      }
      .socials {
        list-style-type: none;
        display: flex;
        li a:hover {
          img {
            filter: brightness(70%);
          }
        }
      }
    }
  }
  .footer-second {
    background: #090909;
    border-top: 1px solid #777777;
    padding: 21px 0;
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      .markets {
        display: flex;
        .g-play {
          margin-right: 17px;
        }
        .g-play,
        .app-store {
          cursor: pointer;
          border: 1px solid #a6a6a6;
          border-radius: 7px;
          width: 113px;
          height: 33px;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: 0.2s;
          img {
            width: 97px;
            height: 22px;
            transition: 0.2s;
          }
          &:hover {
            background: #ffffff;
            border: 1px solid #ffffff;
            img {
              filter: brightness(0);
            }
          }
        }
      }
      .socials {
        list-style-type: none;
        display: none;
        li a:hover {
          img {
            filter: brightness(70%);
          }
        }
      }
      p {
        font-size: 14px;
      }
    }
  }
}
@media screen and (max-width: 975px) {
  footer {
    .footer-first {
      .container {
        .contact {
          margin: auto;
          a {
            text-decoration: none;
            font-size: 26px;
            display: flex;
            align-items: center;
            font-size: 17px;

            img {
              margin-right: 10px;
            }
            &:nth-child(1) {
              padding-right: 20px;
            }
            &:nth-child(2) {
              padding-right: 20px;
              padding-left: 20px;
              font-size: 17px;
            }
            &:hover {
              text-decoration: underline;
            }
          }
          .time {
            text-align: center;
          }
        }
        .socials {
          display: none;
        }
      }
    }
    .footer-second {
      padding: 18px 39px;
      .container {
        .markets {
          .g-play {
            margin-right: 17px;
          }
        }
        .socials {
          display: flex;
        }
        p {
          font-size: 14px;
          max-width: 173px;
        }
      }
    }
  }
}
@media screen and (max-width: 835px) {
  footer {
    .footer-first {
      .container {
        .contact {
          width: 100%;
          display: flex;
          justify-content: space-between;
        }
      }
    }
    .footer-second {
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding: 18px 0;
      p {
        text-align: right;
        font-size: 14px;
      }
    }
  }
}
@media screen and (max-width: 694px) {
  footer {
    .footer-first {
      .container {
        .contact {
          margin: auto;
          flex-wrap: wrap;
          a {
            &:nth-child(2) {
              padding-right: 0;
              padding-left: 20px;
              border-left: 0;
              border-right: 0;
            }
          }
          .time {
            max-width: 400px;
            width: 100%;
            margin: auto;
            margin-top: 25px;
          }
        }
      }
    }
    .footer-second {
      padding: 18px 39px;
      .container {
        flex-wrap: wrap;
        .markets {
          .g-play {
            margin-right: 17px;
          }
        }
        .socials {
          display: flex;
        }
        p {
          font-size: 14px;
          max-width: 400px;
          margin: auto;
          margin-top: 25px;
          text-align: center;
        }
      }
    }
  }
}
@media screen and (max-width: 509px) {
  footer {
    .footer-first {
      padding: 18px 20px;

      .container {
        flex-direction: column;
        .contact {
          flex-direction: column;
          align-items: center;
          padding: 0 !important;
          a {
            padding: 0;
            &:nth-child(1) {
              font-size: 32px;
            }
            &:nth-child(2) {
              font-size: 22px;
              margin-top: 20px;
              padding-left: 0;
            }
          }
          .time {
            display: flex;
            justify-content: center;
            p {
              margin-left: 10px;
            }
          }
        }
        .socials {
          display: flex;
          margin-top: 29px;
        }
      }
    }
    .footer-second {
      padding: 18px 20px;
      .container {
        flex-direction: column;
        .markets {
          .g-play {
          }
        }
        .socials {
          display: none;
        }
        p {
        }
      }
    }
  }
}
@media screen and (max-width: 480px) {
  footer {
    .footer-first .container,
    .footer-second .container {
      padding: 0 15px !important;
    }
  }
}
@media screen and (max-width: 400px) {
  footer {
    .footer-first {
      .container {
        .contact {
          margin: auto;
          flex-wrap: wrap;
          a {
            &:nth-child(2) {
              font-size: 15px;
            }
            &:nth-child(1) {
              font-size: 24px;
            }
          }
          .time p {
            // flex-direction: column;
            font-size: 10px;
          }
        }
      }
    }
    .footer-second p {
      font-size: 10px !important;
    }
  }
}
@media screen and (max-width:330px) {
  footer {
    .footer-first {
      .container {
        .contact {
          a:nth-child(1) {
            font-size: 22px;
          }
        }
      }
    }
  }
}
</style>
