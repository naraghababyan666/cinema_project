<template>
  <div class="form">
    <div class="buttons">
      <button
        @click="clickHandler('fillForMe')"
        class="text-regular"
        :class="{ btnActive: currentView === 'fillForMe' }"
      >
        Заполнить за меня
      </button>
      <button
        @click="clickHandler('fillByMySelf')"
        class="text-regular"
        :class="{ btnActive: currentView === 'fillByMySelf' }"
      >
        Заполнить самому
      </button>
    </div>
    <div class="content-wrap">
      <div v-if="currentView === 'fillForMe'" class="fillForMe">
        <div class="content fillForMeContent">
          <div class="p-wrap">
            <p class="text-regular">
              Уважаемый клиент! Для удобства и экономии вашего времени мы готовы
              предоставить услугу заполнения документов.
            </p>
            <Btn class="useBtn" text="Воспользоваться услугой" fluid />
          </div>

          <div class="row">
            <div class="col">
              <h3 class="text-semi-bold">УДОБНО</h3>
              <p class="text-regular">
                Берем функцию заполнения документов на себя
              </p>
            </div>
            <div class="col">
              <h3 class="text-semi-bold">КОРРЕКТНО</h3>
              <p class="text-regular">
                Корректно заполним все необходимые данные
              </p>
            </div>
            <div class="col">
              <h3 class="text-semi-bold">СВОЕВРЕМЕННО</h3>
              <p class="text-regular">
                Никогда не опоздаем со сроком отправки отчета
              </p>
            </div>
          </div>
        </div>
        <div @click="toFillForMe()">
          <Btn class="useBtn" text="Воспользоваться услугой" center />
        </div>
        <div class="message msg_success" v-if="fillForMe">
          <p>Ваш запрос принят.</p>
        </div>
      </div>
      <div v-if="currentView === 'fillByMySelf'">
        <div class="containerFluid">
          <div class="row date">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Дата заполнения
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-sm"
                  placeholder="ЧЧ/ММ/ГГГ"
                  v-model="date_of_completion"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row name_film">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Название демонстратора
                  фильмов
                  <span style="color: grey; font-size: 15px">(кинотеатра)</span>
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="demonistrator_film_name"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row id_hall">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  ID кинотеатра
                  <span style="color: grey; font-size: 15px">
                    - заполняется, если кинотеатр уже зарегистрирован в
                    ЕАИС</span
                  >
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-lg" v-model="id_hall" />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row cinema_network">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  Название киносети
                  <span style="color: grey; font-size: 15px">
                    - заполняется, если кинотеатр входит в киносеть, кроме того
                    необходимо отдельно</span
                  ><br /><a href="#" class="cinema_link"
                    >заполнить регистрационную форму киносети</a
                  >
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-xl"
                  v-model="cinema_network_name"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row id_cinema_network">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  ID киносети
                  <span style="color: grey; font-size: 15px">
                    - заполняется, если кинотеатр уже зарегистрирован в
                    ЕАИС</span
                  >
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-lg"
                  v-model="cinema_network_id"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row email">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  Email киносети
                  <span style="color: grey; font-size: 15px">
                    - заполняется, если кинотеатр входит в киносеть и
                    отчитывается не самостоятельно, а от киносети (в противном
                    случае заполняется поле 14). Может быть указан только один
                    email.</span
                  >
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-big"
                  v-model="cinema_network_email"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row person_name">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Наименование юридического
                  лица
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="legal_entity_name"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row person_address">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Адрес юридического лица
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="legal_entity_address"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row ogrn">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Код ОГРН (13 или 15 знаков)
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-md" v-model="ogrn_code" />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row inn">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>ИНН
                </p>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-md" v-model="inn" />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!---------------АДРЕС ДЕМОНСТРАТОРА ФИЛЬМОВ (кинотеатра)------------>
          <div class="row hall_address">
            <div class="col-xl-12">
              <p>
                <span style="color: red">*</span>АДРЕС ДЕМОНСТРАТОРА ФИЛЬМОВ
                (кинотеатра)
              </p>
            </div>
          </div>
          <div class="row telephone_fax">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Регион
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="demonistrator_film_region"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row country">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Город (район)
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="demonistrator_film_city"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row locality">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">Населенный пункт</p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="demonistrator_film_locality"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row street">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Улица, номер дома
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="demonistrator_film_street"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row email_network">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  Email киносети
                  <span style="color: grey; font-size: 15px">
                    - заполняется, если кинотеатр входит в киносеть и
                    отчитывается не самостоятельно, а от киносети (в противном
                    случае заполняется поле 14). Может быть указан только один
                    email.</span
                  >
                </p>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-xl"
                  v-model="demonistrator_film_email"
                />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!------------------КОНТАКТЫ------------------------------------------>
          <div class="row contact">
            <div class="col-xl-12">
              <p>КОНТАКТЫ</p>
            </div>
          </div>
          <div class="row telephone_fax">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Телефон/факс
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="telephone_fax"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row film_site">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">Сайт демонстратора фильмов</p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="demonistrator_film_site"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row number_repertoire">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">Номер автоинформатора о репертуаре</p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="autoinformer_number"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row person_full_name">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Ответственное лицо
                  <span style="color: grey; font-size: 15px">
                    (ФИО полностью)</span
                  >
                </p>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-md" v-model="full_name" />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!----------------------НАЗВАНИЯ И ОБОРУДОВАНИЕ ЗАЛОВ--------------------->
          <div class="row name_hall">
            <div class="col-xl-12">
              <div class="text">
                <p>
                  <span style="color: red">*</span>НАЗВАНИЯ И ОБОРУДОВАНИЕ ЗАЛОВ
                </p>
                <p style="color: grey">
                  (даже если в кинотеатре только один зал) <br />
                  Наименование залов (заполняется ТОЧНО так же, как залы
                  называются в билетном комплексе или же будут называться в
                  программах ручного ввода)
                </p>
                <p style="color: #d8004e">
                  В случае несоответствия названий – данные загружаться не
                  будут!
                </p>
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Наименование зала
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="name_and_hardware_name_hall"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row hall_seats">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Кол-во мест в зале
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="name_and_hardware_seats_in_hall"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row fc">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Поддержан ФК
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="name_and_hardware_support"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row hall_hardware">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Оборудование кинозала
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="hall_hardware_desc">
                <div class="projector">
                  <div class="projector_title">
                    <p>Проектор</p>
                  </div>
                  <div class="projector_description">
                    <div class="projector_desc">
                      <p>Производитель</p>
                      <input
                        class="input_dark"
                        v-model="hardware_projector_manufacturer"
                      />
                    </div>
                    <div class="projector_desc">
                      <p>Модель</p>
                      <input
                        class="input_dark"
                        v-model="hardware_projector_model"
                      />
                    </div>
                    <div class="projector_desc">
                      <p>Серийный номер</p>
                      <input
                        class="input_dark"
                        v-model="hardware_projector_serial_number"
                      />
                    </div>
                  </div>
                </div>
                <div class="server">
                  <div class="server_title">
                    <p>Сервер</p>
                  </div>
                  <div class="server_description">
                    <div class="server_desc">
                      <p>Производитель</p>
                      <input
                        class="input_dark"
                        v-model="hardware_server_manufacturer"
                      />
                    </div>
                    <div class="server_desc">
                      <p>Модель</p>
                      <input
                        class="input_dark"
                        v-model="hardware_server_model"
                      />
                    </div>
                    <div class="server_desc">
                      <p>Серийный номер</p>
                      <input
                        class="input_dark"
                        v-model="hardware_server_serial_number"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row add_hall">
            <div class="col col-xl-4">
              <div
                class="date__title"
                style="display: flex; justify-content: space-between"
              >
                <p class="date__title_p">Добавить кинозал</p>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  fill="red"
                  class="bi bi-plus-circle-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"
                  />
                </svg>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-md" />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!-----------------------ТИП ОБОРУДОВАНИЯ КИНОТЕАТРА------------------------>
          <div class="row name_hall">
            <div class="col-xl-12">
              <div class="text">
                <p>
                  <span style="color: red">*</span>ТИП ОБОРУДОВАНИЯ КИНОТЕАТРА
                </p>
                <p style="color: grey">
                  (В случае наличия ставится Х ) <br />Наименования залов
                  указываются ТОЧНО так же, как в п.22)
                </p>
              </div>
            </div>
          </div>
          <div class="row hardware_type">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Наименование зала
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="hardware_type_name_hall"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row hall_hardware">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Оборудование кинозала
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="hall_hardware_desc">
                <div class="projector">
                  <div class="projector_title">
                    <p>Разрешение проектора</p>
                  </div>
                  <div class="projector_description">
                    <div class="projector_desc">
                      <input
                        type="checkbox"
                        checked
                        id="2d_1k"
                        value="2d_1k"
                        v-model="hardware_type"
                      />
                      <label
                        for="2d_1k"
                        style="color: #ffffff; margin-left: 5px"
                        >2D - 1K <br />
                        <p
                          style="
                            font-size: 12px;
                            line-height: 140%;
                            color: #555555;
                            width: 80%;
                            padding-left: 20px;
                          "
                        >
                          (разрешение проектора около 1000 строк)
                        </p></label
                      >
                    </div>
                    <div class="projector_desc">
                      <input
                        type="checkbox"
                        id="2d_2k"
                        value="2d_2k"
                        v-model="hardware_type"
                      />
                      <label
                        for="2d_2k"
                        style="color: #ffffff; margin-left: 5px"
                        >2D - 2K <br />
                        <p
                          style="
                            font-size: 12px;
                            line-height: 140%;
                            color: #555555;
                            width: 80%;
                            padding-left: 20px;
                          "
                        >
                          (разрешение проектора около 2000 строк)
                        </p></label
                      >
                    </div>
                    <div class="projector_desc">
                      <input
                        type="checkbox"
                        id="2d_4k"
                        value="2d_4k"
                        v-model="hardware_type"
                      />
                      <label
                        for="2d_4k"
                        style="color: #ffffff; margin-left: 5px"
                        >2D - 4K <br />
                        <p
                          style="
                            font-size: 12px;
                            line-height: 140%;
                            color: #555555;
                            width: 80%;
                            padding-left: 20px;
                          "
                        >
                          (разрешение проектора около 4000 строк)
                        </p></label
                      >
                    </div>
                  </div>
                </div>
                <div class="server">
                  <div class="server_title">
                    <p>Иные параметры</p>
                  </div>
                  <div class="server_description">
                    <div class="server_desc">
                      <input
                        type="checkbox"
                        checked
                        id="3d"
                        value="3D"
                        v-model="hardware_type_other_settings"
                      />
                      <label for="3d" style="color: #ffffff; margin-left: 5px"
                        >3D</label
                      >
                    </div>
                    <div class="server_desc">
                      <input
                        type="checkbox"
                        id="imax"
                        value="IMAX"
                        v-model="hardware_type_other_settings"
                      />
                      <label for="imax" style="color: #ffffff; margin-left: 5px"
                        >IMAX</label
                      >
                    </div>
                    <div class="server_desc">
                      <input
                        type="checkbox"
                        id="dvd"
                        value="DVD"
                        v-model="hardware_type_other_settings"
                      />
                      <label for="dvd" style="color: #ffffff; margin-left: 5px"
                        >DVD</label
                      >
                    </div>
                    <div class="server_desc">
                      <input
                        type="checkbox"
                        id="wrap_film"
                        value="WRAP"
                        v-model="hardware_type_other_settings"
                      />
                      <label
                        for="wrap_film"
                        style="color: #ffffff; margin-left: 5px"
                        >Пленка</label
                      >
                    </div>
                  </div>
                </div>
                <div class="server">
                  <div class="server_description">
                    <p style="color: white">Дата установки оборудования</p>
                    <input
                      type="text"
                      placeholder="ЧЧ/ММ/ГГГГ"
                      v-model="hardware_type_add_date"
                      style="
                        background: #212121;
                        border: none;
                        border-radius: 2px;
                        padding: 5px;
                      "
                    />
                  </div>
                </div>
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row add_hall">
            <div class="col col-xl-4">
              <div
                class="date__title"
                style="display: flex; justify-content: space-between"
              >
                <p class="date__title_p">Добавить кинозал</p>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  fill="red"
                  class="bi bi-plus-circle-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"
                  />
                </svg>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-md" />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!----------------------ЗВУКОВОЕ ОБОРУДОВАНИЕ-------------------------------->
          <div class="row name_hall">
            <div class="col-xl-12">
              <div class="text">
                <p><span style="color: red">*</span>ЗВУКОВОЕ ОБОРУДОВАНИЕ</p>
                <p style="color: grey">
                  (В случае наличия ставится Х )<br />
                  Наименования залов указываются ТОЧНО так же, как в п.22)
                </p>
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Наименование зала
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="voice_hardware_name_hall"
                />
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row hall_hardware">
            <div class="col col-xl-4">
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Тип
                </p>
              </div>
              <div class="line"></div>
            </div>
            <div class="col col-xl-8">
              <div class="hall_hardware_desc">
                <div class="projector">
                  <div class="projector_title">
                    <p>Аналоговое</p>
                  </div>
                  <div class="projector_description">
                    <div class="hardware_desc">
                      <p>Производитель</p>
                      <input
                        class="input_dark"
                        v-model="voice_hardware_analog_manufacturer"
                      />
                    </div>
                    <div class="hardware_desc">
                      <p>Модель</p>
                      <input
                        class="input_dark"
                        v-model="voice_hardware_analog_model"
                      />
                    </div>
                  </div>
                </div>
                <div class="server">
                  <div class="server_title">
                    <p>Цифровое</p>
                  </div>
                  <div class="server_description">
                    <div class="hardware_desc">
                      <p>Производитель</p>
                      <input
                        class="input_dark"
                        v-model="voice_hardware_digital_manufacturer"
                      />
                    </div>
                    <div class="hardware_desc">
                      <p>Модель</p>
                      <input
                        class="input_dark"
                        v-model="voice_hardware_digital_model"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="line"></div>
            </div>
          </div>
          <div class="row add_hall">
            <div class="col col-xl-4">
              <div
                class="date__title"
                style="display: flex; justify-content: space-between"
              >
                <p class="date__title_p">Добавить кинозал</p>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  fill="red"
                  class="bi bi-plus-circle-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"
                  />
                </svg>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="content__date">
                <input type="text" class="input-size-md" />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!------------------------ЗВУКОВОЕ ОБОРУДОВАНИЕ ------------------------------>
          <div class="row name_hall">
            <div class="col-xl-12">
              <div class="text">
                <p><span style="color: red">*</span>ЗВУКОВОЕ ОБОРУДОВАНИЕ</p>
                <p style="color: grey">
                  (В случае наличия ставится Х )<br />
                  Наименования залов указываются ТОЧНО так же, как в п.22)
                </p>
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <p class="date__title_p">
                  <span style="color: red">*</span>Производитель билетного
                  программного обеспечения (ПО)
                </p>
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  class="input-size-md"
                  v-model="ticketing_software_manufacturer"
                />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!-----------------------АЗМЕЩЕНИЕ ДЕМОНСТРАТОРА ФИЛЬМОВ ------------------->
          <div class="row name_hall">
            <div class="col-xl-12">
              <div class="text">
                <p>
                  <span style="color: red">*</span>РАЗМЕЩЕНИЕ ДЕМОНСТРАТОРА
                  ФИЛЬМОВ
                </p>
                <p style="color: grey">(отмечается Х)</p>
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="otdelnoe"
                  name="placement"
                  checked
                  value="Отдельное здание"
                  v-model="placement"
                />
                <label for="otdelnoe" style="margin-left: 10px"
                  >Отдельное здание</label
                >
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  placeholder="X"
                  class="input-size-md"
                  style="padding: 5px"
                />
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="kompleks"
                  name="placement"
                  value="Торгово-развлекательный комплекс"
                  v-model="placement"
                />
                <label for="kompleks" style="margin-left: 10px"
                  >Торгово-развлекательный комплекс</label
                >
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line"></div>
              <div class="content__date">
                <input type="text" class="input-size-md" />
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="kultura"
                  name="placement"
                  value="Учреждение культуры"
                  v-model="placement"
                />
                <label for="kultura" style="margin-left: 10px"
                  >Учреждение культуры</label
                >
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line"></div>
              <div class="content__date">
                <input type="text" class="input-size-md" style="padding: 5px" />
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="drugoe"
                  name="placement"
                  value="Другое (указать)"
                  v-model="placement"
                />
                <label for="drugoe" style="margin-left: 10px"
                  >Другое (указать)</label
                >
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
            <div class="col col-xl-8">
              <div class="line"></div>
              <div class="content__date">
                <input type="text" class="input-size-md" style="padding: 5px" />
              </div>
              <div class="line" style="margin-bottom: 0px"></div>
            </div>
          </div>
          <!----------------РЕГУЛЯРНОСТЬ КИНОПОКАЗА-------------------------------------->
          <div class="row name_hall">
            <div class="col-xl-12">
              <div class="text">
                <p><span style="color: red">*</span>РЕГУЛЯРНОСТЬ КИНОПОКАЗА</p>
                <p style="color: grey">(отмечается Х)</p>
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line" style="margin-top: 0px"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="amenor"
                  name="regularity"
                  value="Ежедневно"
                  v-model="regularity"
                  checked
                />
                <label for="amenor" style="margin-left: 10px">Ежедневно</label>
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line" style="margin-top: 0px"></div>
              <div class="content__date">
                <input
                  type="text"
                  placeholder="X"
                  class="input-size-md"
                  style="padding: 5px"
                />
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="4-6shabaty"
                  name="regularity"
                  value="4-6 сеансов в неделю"
                  v-model="regularity"
                />
                <label for="4-6shabaty" style="margin-left: 10px"
                  >4-6 сеансов в неделю</label
                >
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line"></div>
              <div class="content__date">
                <input type="text" class="input-size-md" style="padding: 5px" />
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="1-3shabaty"
                  name="regularity"
                  value="1-3 сеанса в неделю"
                  v-model="regularity"
                />
                <label for="1-3shabaty" style="margin-left: 10px"
                  >1-3 сеанса в неделю</label
                >
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line"></div>
              <div class="content__date">
                <input type="text" class="input-size-md" style="padding: 5px" />
              </div>
            </div>
          </div>
          <div class="row name_of_hall">
            <div class="col col-xl-4">
              <div class="line"></div>
              <div class="date__title">
                <input
                  type="radio"
                  id="1-3amisy"
                  name="regularity"
                  value="1-3 сеанса в месяц"
                  v-model="regularity"
                />
                <label for="1-3amisy" style="margin-left: 10px"
                  >1-3 сеанса в месяц</label
                >
              </div>
            </div>
            <div class="col col-xl-8">
              <div class="line"></div>
              <div class="content__date">
                <input type="text" class="input-size-md" style="padding: 5px" />
              </div>
            </div>
          </div>
        </div>
        <div class="direktor">
          <div class="pashton">
            <p style="color: #ffffff">Генеральный директор</p>
          </div>

          <div class="nadpis">
            <p style="color: grey">Расшифровка подписи (Фамилия/Инициалы)</p>
            <input type="text" />
          </div>
          <img src="@/assets/images/documents/nadpis.png" />
        </div>
        <div class="buxgalter">
          <div class="pashton">
            <p style="color: #ffffff">Главный бухгалтер</p>
          </div>
          <div class="nadpis">
            <p style="color: grey">Расшифровка подписи (Фамилия/Инициалы)</p>
            <input type="text" />
          </div>
          <img src="@/assets/images/documents/nadpis.png" />
        </div>
        <div class="msg_success" v-show="hasSuccess">
          <p>ЕАИС Документы успешно отправлен</p>
        </div>
        <div class="msg_error" v-show="hasError">
          <p>Проверьте правильность заполненной формы</p>
        </div>
        <div class="btns">
          <button class="p-sm text-semi-bold print">
            <img src="@/assets/images/documents/print.svg" />
            Распечатать
          </button>
          <button
            class="btn text-white text-semi-bold"
            style="width: 45%"
            @click="sendDocuments"
          >
            Отправить
          </button>
          <!--          <Btn text="Отправить" class="send" @click="log"/>-->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Btn from "@/components/Btn";
import axios from "axios";

export default {
  components: { Btn },
  data() {
    return {
      currentView: "fillForMe",
      date_of_completion: "",
      demonistrator_film_name: "",
      id_hall: "",
      cinema_network_name: "",
      cinema_network_id: "",
      cinema_network_email: "",
      legal_entity_name: "",
      legal_entity_address: "",
      ogrn_code: "",
      inn: "",
      demonistrator_film_region: "",
      demonistrator_film_city: "",
      demonistrator_film_locality: "",
      demonistrator_film_street: "",
      demonistrator_film_email: "",
      telephone_fax: "",
      demonistrator_film_site: "",
      autoinformer_number: "",
      full_name: "",
      name_and_hardware_name_hall: "",
      name_and_hardware_seats_in_hall: "",
      name_and_hardware_support: "",
      hardware_projector_manufacturer: "",
      hardware_projector_model: "",
      hardware_projector_serial_number: "",
      hardware_server_manufacturer: "",
      hardware_server_model: "",
      hardware_server_serial_number: "",
      hardware_type_name_hall: "",
      hardware_type: [],
      hardware_type_2d_1k: "",
      hardware_type_2d_2k: "",
      hardware_type_2d_4k: "",
      hardware_type_3d: "",
      hardware_type_imax: "",
      hardware_type_dvd: "",
      hardware_type_wrap: "",
      hardware_type_other_settings: [],
      hardware_type_add_date: "",
      voice_hardware_name_hall: "",
      voice_hardware_analog_manufacturer: "",
      voice_hardware_analog_model: "",
      voice_hardware_digital_manufacturer: "",
      voice_hardware_digital_model: "",
      ticketing_software_manufacturer: "",
      placement_demonistration_film: "",
      regularity_demonistration_film: "",
      regularity: "Ежедневно",
      placement: "Отдельное здание",
      hasSuccess: false,
      hasError: false,
      fillForMe: false,
    };
  },
  methods: {
    toFillForMe() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/upload-eais-docs-for-client")
        .then((res) => {
          if (res.data.success) {
            this.fillForMe = !this.fillForMe;
          }
        });
    },
    clickHandler(view) {
      this.currentView = view;
    },
    sendDocuments() {
      axios
        .post(process.env.VUE_APP_API_URL + "api/upload-eais-docs", {
          date_of_completion: this.date_of_completion,
          demonistrator_film_name: this.demonistrator_film_name,
          id_hall: this.id_hall,
          cinema_network_name: this.cinema_network_name,
          cinema_network_id: this.cinema_network_id,
          cinema_network_email: this.cinema_network_email,
          legal_entity_name: this.legal_entity_name,
          legal_entity_address: this.legal_entity_address,
          ogrn_code: this.ogrn_code,
          inn: this.inn,
          demonistrator_film_region: this.demonistrator_film_region,
          demonistrator_film_city: this.demonistrator_film_city,
          demonistrator_film_locality: this.demonistrator_film_locality,
          demonistrator_film_street: this.demonistrator_film_street,
          demonistrator_film_email: this.demonistrator_film_email,
          telephone_fax: this.telephone_fax,
          demonistrator_film_site: this.demonistrator_film_site,
          autoinformer_number: this.autoinformer_number,
          full_name: this.full_name,
          name_and_hardware_name_hall: this.name_and_hardware_name_hall,
          name_and_hardware_seats_in_hall: this.name_and_hardware_seats_in_hall,
          name_and_hardware_support: this.name_and_hardware_support,
          hardware_projector_manufacturer: this.hardware_projector_manufacturer,
          hardware_projector_model: this.hardware_projector_model,
          hardware_projector_serial_number:
            this.hardware_projector_serial_number,
          hardware_server_manufacturer: this.hardware_server_manufacturer,
          hardware_server_model: this.hardware_server_model,
          hardware_server_serial_number: this.hardware_server_serial_number,
          hardware_type_name_hall: this.hardware_type_name_hall,
          hardware_type: JSON.stringify(this.hardware_type),
          hardware_type_other_settings: JSON.stringify(
            this.hardware_type_other_settings
          ),
          hardware_type_add_date: this.hardware_type_add_date,
          voice_hardware_name_hall: this.voice_hardware_name_hall,
          voice_hardware_analog_manufacturer:
            this.voice_hardware_analog_manufacturer,
          voice_hardware_analog_model: this.voice_hardware_analog_model,
          voice_hardware_digital_manufacturer:
            this.voice_hardware_digital_manufacturer,
          voice_hardware_digital_model: this.voice_hardware_digital_model,
          ticketing_software_manufacturer: this.ticketing_software_manufacturer,
          regularity: JSON.stringify(this.regularity),
          placement: JSON.stringify(this.placement),
        })
        .then((res) => {
          if (res.data.success) {
            this.hasSuccess = true;
            this.hasError = false;
          } else {
            this.hasError = true;
            this.hasSuccess = false;
          }
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.message {
  font-size: 20px;
  margin-top: 10px;
}
.msg_error,
.msg_success {
  text-align: center;
}
.msg_error {
  color: red;
}
.msg_success {
  color: #27ae60;
}
.btn {
  font-size: 16px;
  text-decoration: none;
  padding: 13px 92px;
  background: #27ae60;
  border-radius: 10px;
  transition: 0.1s;
  border: 0;
  outline: 0;
  &:hover {
    background: #279e48;
  }
  &:disabled,
  &[disabled] {
    background: #7fa48e;
  }
}
input[type="radio"]:checked {
  filter: invert(100%) hue-rotate(90deg) brightness(1);
}
input[type="checkbox"]:checked {
  filter: invert(100%) hue-rotate(90deg) brightness(0.8);
}
input[type="checkbox"],
input[type="radio"] {
  filter: invert(100%) hue-rotate(90deg) brightness(1);
}
.fillForMeContent .row {
  display: flex;
  justify-content: space-between !important;
}
.containerFluid {
  position: relative;
  border: 0.5px solid #444444;
  box-sizing: border-box;
  border-radius: 10px;
  margin-bottom: 20px;
}
.containerFluid > * {
  position: relative;
}
.direktor,
.buxgalter {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 15px;
}
.direktor input,
.buxgalter input {
  width: 100%;
  margin-top: 5px;
  background: #161616;
  border-radius: 2px;
  border: none;
  padding: 5px;
}
//.direktor:first-child, .buxgalter:first-child{
//  width: 25%;
//}
//.direktor:nth-child(2){
//  width: 50%;
//}
//.direktor:last-child, .buxgalter:last-child{
//  width: 25%;
//}
.input_dark {
  background: #212121;
  border-radius: 2px;
  border: none;
  padding: 5px;
  width: 100%;
}
.btns {
  margin-top: 50px;
  display: flex;
  justify-content: space-between;
}
.btns .print {
  color: white;
  width: 45%;
  background-color: transparent;
  border: 3px solid #27ae60;
  box-sizing: border-box;
  border-radius: 10px;
  padding: 15px;
}
.btns .print:hover {
  background: #161616;
}
.btns .send {
  padding: 18px;
  width: 45%;
}
.input-size-sm {
  background: #161616;
  border-radius: 4px;
  height: 30px;
  border: none;
  width: 100%;
}
.input-size-md {
  background: #161616;
  border-radius: 4px;
  height: 44px;
  border: none;
  width: 100%;
}
.content__date {
  height: 100%;
}
.content__date input {
  height: 100%;
}
.input-size-lg {
  background: #161616;
  border-radius: 4px;
  height: 65px;
  border: none;
  width: 100%;
}
.input-size-xl {
  background: #161616;
  border-radius: 4px;
  height: 100px;
  border: none;
  width: 100%;
}
.input-size-big {
  background: #161616;
  border-radius: 4px;
  height: 124px;
  border: none;
  width: 100%;
}
input {
  padding-left: 10px;
  color: #ffffff;
}
input:focus {
  outline: none;
}
.hall_hardware_desc {
  background-color: #161616;
  padding: 10px 20px;
  position: relative;
}
.hall_hardware_desc > * {
  margin-bottom: 5px;
}
.hall_hardware_desc .projector_title,
.hall_hardware_desc .server_title {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 140%;
  color: #ffffff;
}

.col-xl-4,
.col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.col-xl-12 {
  padding: 15px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  color: white;
}
.col-xl-12 .text {
  width: 100%;
  padding: 10px 50px;
  text-align: center;
}
.date .col-xl-4 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 15px 15px 0px 15px;
  font-family: Montserrat sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 140%;
}
.date .col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 15px 15px 0px 15px;
}
.date__description {
  background: #252424;
  border-radius: 5px;
  padding: 15px;
}
.date__description > * {
  margin: 8px 0px;
}
.date__description .name__order p,
.date__description .check__order p,
.date__description .password__order p {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 116.5%;
  margin-bottom: 5px;

  color: #767676;
}
.date__description .password__order {
  display: flex;
  width: 100%;
  justify-content: space-between;
}
.date__title_p {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 140%;
  color: #ffffff;
}
.date__input {
  width: 100%;
  background: #161616;
  border-radius: 2px;
  height: 25px;
}

/*------------------------------*/

.name_film .col-xl-4 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  //padding: 15px 15px 0px 15px;
  font-family: Montserrat sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 140%;
}
.name_film .col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.id_hall .col-xl-4 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  font-family: Montserrat sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 140%;
}
.id_hall .col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.cinema_link {
  color: green;
}
/*------------------------------------------*/
.email .col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.containerFluid .row {
  display: flex;
  align-self: flex-end;
  /*padding: 10px 0px;*/
}
.line {
  margin: 10px 0px;
  width: 100%;
  height: 0.5px;
  background-color: #444444;
}
.col-xl-8 {
  padding: 0px 15px 5px 15px;
  width: 65%;
}
.col-xl-4 {
  padding: 0px 15px 5px 15px;
  width: 35%;
  border-right: 0.5px solid #444444;
  color: #fff;
}
.projector_description {
  display: flex;
  justify-content: space-between;
}
.projector_desc {
  font-family: Montserrat;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 140%;
  color: #555555;
  width: 32%;
}
.hardware_desc {
  font-family: Montserrat;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 140%;
  color: #555555;
  width: 49%;
}
.server_description {
  display: flex;
  justify-content: space-between;
}
.server_desc {
  font-family: Montserrat;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 140%;
  color: #555555;
  width: 32%;
}

.form {
  max-width: 871px;
  width: 100%;
  margin: 73px auto 35px auto;
  .buttons {
    display: inline-flex;
    border-radius: 10px 10px 0 0;
    overflow: hidden;
    button {
      width: 290px;
      height: 49px;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #181818;
      border: 0;
      outline: 0;
      color: #4e4e4e;
    }
    .btnActive {
      background: #212121;
      color: #ffffff;
      font-family: "SemiBold";
    }
  }
  .content-wrap {
    padding: 67px 42px 80px 42px;
    background: #212121;
    border-radius: 0 10px 10px 10px;
    .fillForMe {
      display: flex;
      flex-direction: column;
      justify-content: center;

      .content {
        display: flex;
        flex-direction: column;
        .p-wrap {
          p {
            color: #bcbcbc;
            font-size: 16px;
            margin-bottom: 90px;
            max-width: 618px;
            width: 100%;
          }
          button {
            display: none;
          }
        }
        .row {
          display: flex;
          justify-content: space-between;
          .col {
            max-width: 170px;
            width: 100%;
            &:nth-child(1) {
              margin-left: 50px;
            }
            h3 {
              color: #ffffff;
              position: relative;
              &::before {
                content: "";
                display: block;
                width: 35px;
                height: 35px;
                background: url("../../assets/images/dashboard/checked.svg")
                  no-repeat center;
                background-size: contain;
                position: absolute;
                top: 0;
                left: -50px;
              }
            }
            p {
              color: #7c7c7c;
              font-size: 14px;
            }
          }
        }
      }
      button {
        margin-top: 75px;
      }
    }
  }
}

@media screen and (max-width: 834px) {
  .form {
    margin: 87px auto 369px auto;
    .content-wrap {
      padding: 88px 45px 67px 45px;
      .fillForMe {
        .content {
          flex-direction: row;
          justify-content: space-between;
          .p-wrap {
            max-width: 244px;
            p {
              line-height: 22px;
            }
            button {
              display: block;
              padding: 12px;
              font-size: 16px;
            }
          }
          .row {
            flex-direction: column;
            .col {
              max-width: 302px;
              p {
                margin-bottom: 20px;
                margin-top: 10px;
              }
              &:nth-child(1) {
                margin-left: 0;
              }
            }
          }
        }

        button {
          display: none;
        }
      }
    }
  }
}

@media screen and (max-width: 800px) {
  .form {
    margin: 87px auto 369px auto;
    .content-wrap {
      padding: 88px 45px 67px 45px;
      .fillForMe {
        .content {
          flex-direction: row;
          justify-content: space-between;
          .p-wrap {
            max-width: 244px;
            p {
              line-height: 22px;
            }
            button {
              display: block;
              padding: 12px;
              font-size: 16px;
            }
          }
          .row {
            flex-direction: column;
            margin-left: 75px;
            .col {
              max-width: 100% !important;
              p {
                margin-bottom: 20px;
                margin-top: 10px;
              }
              &:nth-child(1) {
                margin-left: 0;
              }
            }
          }
        }
      }
    }
  }
}

@media screen and (max-width: 680px) {
  .form {
    margin: 87px auto 369px auto;
    .buttons {
      button {
        width: 180px;
        font-size: 14px;
      }
    }
    .content-wrap {
      .fillForMe {
        .content {
          flex-wrap: wrap;
          .p-wrap {
            max-width: 100%;
            p {
              margin-bottom: 20px;
            }
            button {
              display: none;
            }
          }
          .row {
            flex-direction: column;
            padding-left: 50px;
            margin-left: 0;
            .col {
              max-width: 402px !important;
              p {
                margin-bottom: 20px;
                margin-top: 10px;
              }
              &:nth-child(1) {
                margin-left: 0;
              }
            }
          }
        }

        button {
          display: block;
          margin-top: 40px;
        }
      }
    }
  }
}
@media screen and (max-width: 480px) {
  .form {
    margin: 71px auto 40px auto;
    .buttons {
      button {
        padding: 10px;
        border-radius: 10px;
        width: 137px;
        &:nth-child(1) {
          margin-right: 10px;
        }
      }
      .btnActive {
        border: 0.5px solid #777777;
      }
    }
    .content-wrap {
      background: transparent !important;
      padding: 40px 0 0 0;
    }
  }
}
input:checked {
  background-color: green;
}
@media screen and (max-width: 370px) {
  .form .buttons button {
    max-width: 110px !important;
    font-size: 11px;
  }
}
</style>
