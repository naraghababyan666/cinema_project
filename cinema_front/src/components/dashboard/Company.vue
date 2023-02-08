<template>
  <div class="doc">
    <div class="form">
      <div class="containerFluid">
        <div class="row name__person">
          <div class="col col-xl-4">
            <p>Название юр. лица</p>
            <div class="line"></div>
          </div>
          <div class="col col-xl-8">
            <div class="inputBar">
              <input
                  type="text"
                  class="person__input"
                  placeholder="ООО «Кино»"
                  v-model="personName"
                  @click="personInput"
                  v-click-outside="closeInput"
              />
              <p :class="{'red_star' : $v.personName.$invalid,'green_star' : !$v.personName.$invalid  }" class="align-self-center">*</p>
            </div>
            <div class="line"></div>
          </div>
          <div class="person__pen">
            <img
                v-if="personInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
        <div class="row name__person">
          <div class="col col-xl-4">
            <p>Название кинотеатра</p>
            <div class="line"></div>
          </div>
          <div class="col col-xl-8">
            <div class="inputBar">
              <input
                  type="text"
                  class="person__input"
                  placeholder="«Красный площадь»"
                  v-model="name_theatre"
                  @click="personInput"
                  v-click-outside="closeInput"
              />
              <p :class="{'red_star' : $v.name_theatre.$invalid,'green_star' : !$v.name_theatre.$invalid  }" class="align-self-center">*</p>
            </div>
            <div class="line"></div>
          </div>
          <div class="person__pen">
            <img
                v-if="personInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
        <div class="row documents">
          <div class="col col-xl-4">
            <p>Уставные документы</p>
            <div class="line"></div>
          </div>
          <div class="col col-xl-8">
            <div
                class="document__upload"
                @click="documentsInput"
                v-click-outside="closeDocumentsInput"
            >
              <div class="current__document">
                <input type="file" id="firstDoc" @change="checkOgrnPhoto" />
                <input
                    type="text"
                    class="dark__input"
                    v-model="documents.first_doc_text"
                    placeholder="Свидетельство ОГРН/ОГРНИП"
                />
                <p :class="{'red_star' : $v.documents.first_doc_text.$invalid,'green_star' : !$v.documents.first_doc_text.$invalid  }" class="absoluteStar">*</p>
                <img
                    width="35px"
                    height="35px"
                    :src="first_doc_passport_photo"
                />
                <label for="firstDoc"
                ><img src="../../assets/images/dashboard/paperclip.png"
                /></label>
              </div>
            </div>
            <div class="line"></div>
          </div>
          <div class="documents__pen">
            <img
                v-if="documentsInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
        <div class="row address">
          <div class="col col-xl-4">
            <p>Адрес</p>
            <div class="line"></div>
          </div>
          <div class="col col-xl-8">
            <div class="address_all">
              <div class="flex_container">
                <div class="region">
                  <p>Область:</p>
                  <select v-model="address.region">
                    <option disabled selected>Выберите область</option>
                    <option>Амурская</option>
                    <option>Архангельская</option>
                    <option>Астраханская</option>
                    <option>Белгородская</option>
                    <option>Владимирская</option>
                    <option>Волгоградская</option>
                    <option>Вологодская</option>
                    <option>Воронежская</option>
                    <option>Ивановская</option>
                    <option>Иркутская</option>
                    <option>Калининградская</option>
                    <option>Калужская</option>
                    <option>Кемеровская</option>
                    <option>Кировская</option>
                    <option>Костромская</option>
                    <option>Курганская</option>
                    <option>Курская</option>
                    <option>Ленинградская</option>
                    <option>Липецкая</option>
                    <option>Магаданская</option>
                    <option>Московская</option>
                    <option>Мурманская</option>
                    <option>Нижегородская</option>
                    <option>Новгородская</option>
                    <option>Новосибирская</option>
                    <option>Омская</option>
                    <option>Оренбургская</option>
                    <option>Орловская</option>
                    <option>Пензенская</option>
                    <option>Псковская</option>
                    <option>Ростовская</option>
                    <option>Рязанская</option>
                    <option>Самарская</option>
                    <option>Саратовская</option>
                    <option>Сахалинская</option>
                    <option>Свердловская</option>
                    <option>Смоленская</option>
                    <option>Тамбовская</option>
                    <option>Тверская</option>
                    <option>Томская</option>
                    <option>Тульская</option>
                    <option>Тюменская</option>
                    <option>Ульяновская</option>
                    <option>Челябинская</option>
                    <option>Ярославская</option>
                    <option>Еврейская</option>
                  </select>
                </div>
                <div class="city">
                  <p>Город:</p>
                  <input v-model="address.city" type="text" placeholder="Выберите город" class="dark__input">
                </div>
              </div>
              <br>
              <div class="house">
                <p>Улица и дом: </p>
                <input v-model="address.house" type="text" CLASS="dark__input">
              </div>
            </div>
            <div class="line"></div>
          </div>
          <div class="address__pen">
            <img
                v-if="addressInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
        <div class="row person">
          <div class="col col-xl-4">
            <div class="person__adding">
              <p>Ответственные лица</p>
              <div class="add__person">
                <button
                    class="delete__person"
                    v-for="(item, key) in delete__person.id"
                    :key="key"
                    @click="delete_form(key)"
                >
                  Удалить <span style="color: green">-</span>
                </button>
                <button class="add__new__person" @click="addpeople()">
                  Добавить <span style="color: green">+</span>
                </button>
              </div>
            </div>
            <div class="line"></div>
          </div>
          <div class="col col-xl-8">
            <div
                class="person__info"
                @click="secondPersonInput"
                v-click-outside="closeSecondPersonInput"
            >
              <div
                  class="info__parent"
                  v-for="(item, key) in $v.people.$each.$iter"
                  :key="key"
              >

                <div class="current__info" >
                  <div class="current__info__name">
                    <p>ФИО:</p>
                    <input
                        type="text"
                        v-model="item.person_name.$model"
                        class="dark__input"
                        :class="status(item.person_name)"
                        style="width: 30%"
                    />
                    <!--                    <p>{{ item.person_name.$model }}</p>-->
                    <!--                    <p>{{ item }}</p>-->
                    <p :class="{'red_star' : item.person_name.$invalid,'green_star' : !item.person_name.$invalid  }" class="absoluteStar">*</p>
                  </div>
                  <div class="current__info__position">
                    <p>Должность:</p>
                    <select v-model="item.person_position.$model">
                      <option disabled="disabled" selected="selected" style="color: white">Выберите должность</option>
                      <option>Директор</option>
                      <option>Кассир</option>
                    </select>
                  </div>
                  <div class="current__info__screen">
                    <div style="display: flex; align-items: center">
                      <p>{{ item.person_photo_name.$model }}</p>
                      <img
                          height="35"
                          width="35"
                          class="visual_photo"
                          :src="
                          item.person_photo_visual.$model
                        "
                      />
                    </div>
                    <div>
                      <input
                          type="file"
                          :id="item.id.$model"
                          @change="checkPersonPhoto(item.id.$model, $event)"
                      />
                      <label :for="item.id.$model"
                      ><img src="../../assets/images/dashboard/paperclip.png"
                      /></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="line"></div>
          </div>
          <div class="second__person__pen">
            <img
                v-if="secondPersonInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
<!--        <div class="row payment">-->
<!--          <div class="col col-xl-4">-->
<!--            <div class="payment__title">-->
<!--              <p class="payment__title_p">Реквизиты</p>-->
<!--            </div>-->
<!--            <div class="line"></div>-->
<!--          </div>-->
<!--          <div class="col col-xl-8">-->
<!--            <div-->
<!--                class="payment__description"-->
<!--                @click="paymentInput"-->
<!--                v-click-outside="closePaymentInput"-->
<!--            >-->
<!--              <div class="name__order">-->
<!--                <div class="orderNameBar">-->
<!--                  <p>Название организации получателя</p>-->
<!--                  <span :class="{'red_star' : $v.payment.order_name.$invalid, 'green_star' : !$v.payment.order_name.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>-->
<!--                </div>-->
<!--                <input-->
<!--                    type="text"-->
<!--                    v-model="payment.order_name"-->
<!--                    class="payment__input"-->
<!--                />-->

<!--              </div>-->
<!--              <div class="check__order">-->
<!--                <div class="orderBar">-->
<!--                  <p>Счет получателя</p>-->
<!--                  <span :class="{'red_star' : $v.payment.order_card.$invalid, 'green_star' : !$v.payment.order_card.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>-->
<!--                </div>-->
<!--                <input-->
<!--                    type="number"-->
<!--                    v-model="payment.order_card"-->
<!--                    class="payment__input"-->
<!--                />-->
<!--              </div>-->
<!--              <div class="password__order">-->
<!--                <div class="inn__order">-->
<!--                  <div class="inn">-->
<!--                    <p>ИНН</p>-->
<!--                    <span :class="{'red_star' : $v.payment.inn.$invalid, 'green_star' : !$v.payment.inn.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>-->
<!--                  </div>-->

<!--                  <input-->
<!--                      type="number"-->
<!--                      v-model="payment.inn"-->
<!--                      class="dark__input"-->
<!--                      style="width: 90%"-->
<!--                  />-->
<!--                </div>-->
<!--                <div class="kpp__order">-->
<!--                  <div class="kpp">-->
<!--                    <p>КПП</p>-->
<!--                    <span :class="{'red_star' : $v.payment.kpp.$invalid, 'green_star' : !$v.payment.kpp.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>-->
<!--                  </div>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      v-model="payment.kpp"-->
<!--                      class="dark__input"-->
<!--                  />-->
<!--                </div>-->
<!--                <div class="bik__order">-->
<!--                  <div class="bik">-->
<!--                    <p>БИК</p>-->
<!--                    <span :class="{'red_star' : $v.payment.bik.$invalid, 'green_star' : !$v.payment.bik.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>-->
<!--                  </div>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      placeholder="00000"-->
<!--                      v-model="payment.bik"-->
<!--                      class="dark__input"-->
<!--                      style="width: 100%"-->
<!--                  />-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->

<!--            <div class="line"></div>-->
<!--          </div>-->
<!--          <div class="payment__pen">-->
<!--            <img-->
<!--                v-if="paymentInputActive"-->
<!--                src="../../assets/images/dashboard/pen_green.png"-->
<!--            />-->
<!--            <img v-else src="../../assets/images/dashboard/pen.png" />-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="row description__hall">-->
<!--          <div class="col col-xl-4">-->
<!--            <div class="title">-->
<!--              <p>Описание зала</p>-->
<!--              <svg-->
<!--                  xmlns="http://www.w3.org/2000/svg"-->
<!--                  width="16"-->
<!--                  height="16"-->
<!--                  fill="white"-->
<!--                  class="bi bi-caret-up-fill"-->
<!--                  viewBox="0 0 16 16"-->
<!--              >-->
<!--                <path-->
<!--                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"-->
<!--                />-->
<!--              </svg>-->
<!--            </div>-->
<!--            <div class="description__title">-->
<!--              <button class="dark__btn">Характеристики помещения</button>-->
<!--              <button class="dark__btn">Количество посадочных мест</button>-->
<!--              <button class="dark__btn">Звуковое оборудование</button>-->
<!--              <button class="dark__btn">Размер экрана</button>-->
<!--              <button class="dark__btn">Фото зала с 4-х ракурсов</button>-->
<!--            </div>-->
<!--            <div class="line"></div>-->
<!--          </div>-->
<!--          <div class="col col-xl-8">-->
<!--            <div-->
<!--                class="description"-->
<!--                @click="descriptionHallInput"-->
<!--                v-click-outside="closeDescriptionHallInput"-->
<!--            >-->
<!--              <div class="name_hall">-->
<!--                <div class="name_hall__title">-->
<!--                  <p>Название организации</p>-->
<!--                  <span :class="{'red_star' : $v.description.name_hall.$invalid, 'green_star' : !$v.description.name_hall.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>-->
<!--                </div>-->
<!--                <input-->
<!--                    type="text"-->
<!--                    v-model="description.name_hall"-->
<!--                    class="payment__input"-->
<!--                />-->

<!--              </div>-->
<!--              <div class="first_section">-->
<!--                <div class="scheme_photo">-->
<!--                  <div class="seat_scheme">-->
<!--                    <p>Схема или чертеж зала</p>-->
<!--                    <img-->
<!--                        width="35px"-->
<!--                        height="35px"-->
<!--                        class="visual_photo"-->
<!--                        :src="file__description_scheme"-->
<!--                    />-->
<!--                  </div>-->
<!--                  <div class="btns">-->
<!--                    <input-->
<!--                        type="file"-->
<!--                        id="description_photo"-->
<!--                        @change="descriptionHallScheme"-->
<!--                    />-->
<!--                    <img src="../../assets/images/dashboard/no_paperclip.png" />-->
<!--                    <label for="description_photo"-->
<!--                    ><img src="../../assets/images/dashboard/paperclip.png"-->
<!--                    /></label>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="scheme">-->
<!--                  <div class="row_count">-->
<!--                    <label for="rowCount" style=" text-align: left">Количество рядов</label>-->
<!--                    <span :class="{'red_star' : $v.description.row_count.$invalid, 'green_star' : !$v.description.row_count.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                    <input id="rowCount" type="number" class="dark__input" v-model="description.row_count">-->
<!--                  </div>-->
<!--                  <div class="seat_count" style="margin-left: 5px;">-->
<!--                    <label for="seatCount">Количество мест в ряду</label>-->
<!--                    <span :class="{'red_star' : $v.description.seat_count.$invalid, 'green_star' : !$v.description.seat_count.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                    <input id="seatCount" type="number" class="dark__input" v-model="description.seat_count">-->

<!--                  </div>-->


<!--                </div>-->
<!--                <div class="desc">-->
<!--                  <div class="width">-->
<!--                    <div class="desc_width">-->
<!--                      <p>Ширина (м):</p>-->
<!--                      <span :class="{'red_star' : $v.description.scheme_width.$invalid, 'green_star' : !$v.description.scheme_width.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                    </div>-->
<!--                    <input-->
<!--                        type="number"-->
<!--                        class="dark__input description__input"-->
<!--                        v-model="description.scheme_width"-->
<!--                        style="width: 50%"-->
<!--                    />-->
<!--                  </div>-->
<!--                  <div class="length">-->
<!--                    <div class="desc_length">-->
<!--                      <p>Длина (м):</p>-->
<!--                      <span :class="{'red_star' : $v.description.scheme_length.$invalid, 'green_star' : !$v.description.scheme_length.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                    </div>-->
<!--                    <input-->
<!--                        type="number"-->
<!--                        class="dark__input description__input"-->
<!--                        v-model="description.scheme_length"-->
<!--                        style="width: 50%"-->
<!--                    />-->
<!--                  </div>-->
<!--                  <div class="height">-->
<!--                    <div class="desc_height">-->
<!--                      <p>Высота (м):</p>-->
<!--                      <span :class="{'red_star' : $v.description.scheme_height.$invalid, 'green_star' : !$v.description.scheme_height.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                    </div>-->
<!--                    <input-->
<!--                        type="number"-->
<!--                        class="dark__input description__input"-->
<!--                        v-model="description.scheme_height"-->
<!--                        style="width: 50%"-->
<!--                    />-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="file">-->
<!--                <div class="file__upload">-->
<!--                  <p>Файл такой то</p>-->
<!--                  <img-->
<!--                      width="35px"-->
<!--                      height="35px"-->
<!--                      :src="file__upload_passport"-->
<!--                  />-->
<!--                </div>-->
<!--                <div class="paper__clips">-->
<!--                  <input-->
<!--                      type="file"-->
<!--                      id="descriptionHallFile"-->
<!--                      @change="creselPhoto"-->
<!--                  />-->
<!--                  <img src="../../assets/images/dashboard/no_paperclip.png" />-->
<!--                  <label for="descriptionHallFile"-->
<!--                  ><img src="../../assets/images/dashboard/paperclip.png"-->
<!--                  /></label>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="data">-->
<!--                <p>Внести данные:</p>-->
<!--                <input-->
<!--                    type="text"-->
<!--                    class="dark__input"-->
<!--                    v-model="description.description_hardware"-->
<!--                />-->
<!--                <span :class="{'red_star' : $v.description.description_hardware.$invalid, 'green_star' : !$v.description.description_hardware.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                <input type="file" id="hardwarePhoto" @change="voiceFile" />-->
<!--                <img-->
<!--                    width="35px"-->
<!--                    height="35px"-->
<!--                    :src="description_hardware_file"-->
<!--                />-->
<!--                <img src="../../assets/images/dashboard/no_paperclip.png" />-->
<!--                <label for="hardwarePhoto"-->
<!--                ><img src="../../assets/images/dashboard/paperclip.png"-->
<!--                /></label>-->
<!--              </div>-->
<!--              <div class="data__desc">-->
<!--                <div class="width">-->
<!--                  <p>Ширина (м):</p>-->
<!--                  <span :class="{'red_star' : $v.description.screen_width.$invalid, 'green_star' : !$v.description.screen_width.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      class="dark__input description__input"-->
<!--                      v-model="description.screen_width"-->
<!--                      style="width: 25%"-->
<!--                  />-->
<!--                </div>-->
<!--                <div class="length">-->
<!--                  <p>Длина (м):</p>-->
<!--                  <span :class="{'red_star' : $v.description.screen_length.$invalid, 'green_star' : !$v.description.screen_length.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      class="dark__input description__input"-->
<!--                      v-model="description.screen_length"-->
<!--                      style="width: 25%"-->
<!--                  />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="name__file">-->
<!--                <div class="name">-->
<!--                  <p>Название приложенного файла</p>-->
<!--                  <img width="35px" height="35px" :src="name__file_passport" />-->
<!--                </div>-->
<!--                <div class="paperClips">-->
<!--                  <input type="file" @change="photo" id="hallPhoto" />-->
<!--                  <img src="../../assets/images/dashboard/no_paperclip.png" />-->
<!--                  <label for="hallPhoto"-->
<!--                  ><img src="../../assets/images/dashboard/paperclip.png"-->
<!--                  /></label>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="line"></div>-->
<!--          </div>-->
<!--          <div class="description__hall__pen">-->
<!--            <img-->
<!--                v-if="descriptionHallInputActive"-->
<!--                src="../../assets/images/dashboard/pen_green.png"-->
<!--            />-->
<!--            <img v-else src="../../assets/images/dashboard/pen.png" />-->
<!--          </div>-->
<!--        </div>-->
        <div class="row add__hall">
          <div class="col col-xl-4">
            <div class="add__hall_title">
              <div class="add__hall_plus">
                <p>Добавить зал</p>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="red"
                    class="bi bi-plus-circle-fill"
                    viewBox="0 0 16 16"
                >
                  <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"
                  />
                </svg>
              </div>
              <div class="add__hall_btn">
                <button
                    class="delete__hall"
                    v-for="(item, key) in delete_hall.id"
                    :key="key"
                    @click="deleteHall(key)"
                >
                  Удалить <span style="color: green">-</span>
                </button>
                <button class="add__new__hall" @click="addHall()">
                  Добавить <span style="color: green">+</span>
                </button>
              </div>
            </div>
            <div class="line"></div>
          </div>
          <div
              class="col col-xl-8"
              @click="addHallInput"
              v-click-outside="closeAddHallInput"
          >
            <div
                class="add__hall_description"
                v-for="(item, key) in $v.add_hall.$each.$iter"
                :key="key"
            >
              <div class="name_hall">
                <div class="name_hall__title">
                  <p>Название зала </p>
                  <span :class="{'red_star' : item.name_hall.$invalid, 'green_star' : !item.name_hall.$invalid  }" class="align-self-center" style="margin-left: 5px">*</span>
                </div>
                <input
                    type="text"
                    v-model="item.name_hall.$model"
                    class="payment__input"
                />

              </div>
              <div class="scheme">
                <div style="display: flex; align-items: center">
                  <p>Схема или чертеж зала</p>
                  <!--                  <p>{{ item.hall_scheme_photo_visual.$model}}</p>-->
                  <img
                      height="35"
                      width="35"
                      class="visual_photo"
                      :src="
                          item.hall_scheme_photo_visual.$model
                        "
                  />
                </div>
                <input
                    type="file"
                    style="display: none"
                    :id="item.hall_scheme_photo.$model + item.id.$model"
                    @change="addHallSchemePhoto(item.id.$model, $event)"
                />
                <label :for="item.hall_scheme_photo.$model + item.id.$model"
                ><img src="../../assets/images/dashboard/paperclip.png"
                /></label>
              </div>
              <div class="scheme_description">
                <div class="row_count">
                  <label for="new_hall_row_count" style=" text-align: left">Количество рядов</label>
                  <span :class="{'red_star' : item.row_count.$invalid, 'green_star' : !item.row_count.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>
                  <input id="new_hall_row_count" type="number" class="dark__input" v-model="item.row_count.$model">
                </div>
                <div class="seat_count" style="margin-left: 5px;">
                  <label for="new_hall_seat_count">Количество мест в ряду</label>
                  <span :class="{'red_star' : item.seat_count.$invalid, 'green_star' : !item.seat_count.$invalid  }" class="align-self-center" style="margin-left: 5px; margin-top: 5px">*</span>
                  <input id="new_hall_seat_count" type="number" class="dark__input" v-model="item.seat_count.$model">

                </div>


              </div>
<!--              <div class="desc">-->
<!--                <div class="width">-->
<!--                  <p>Ширина (м):</p>-->
<!--                  <p :class="{'red_star' : item.hall_width.$invalid,'green_star' : !item.hall_width.$invalid  }" class="absoluteStar">*</p>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      v-model="item.hall_width.$model"-->
<!--                      class="dark__input"-->
<!--                      style="width: 50%"-->
<!--                  />-->
<!--                </div>-->
<!--                <div class="length">-->
<!--                  <p>Длина (м):</p>-->
<!--                  <p :class="{'red_star' : item.hall_length.$invalid,'green_star' : !item.hall_length.$invalid  }" class="absoluteStar">*</p>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      v-model="item.hall_length.$model"-->
<!--                      class="dark__input"-->
<!--                      style="width: 50%"-->
<!--                  />-->
<!--                </div>-->
<!--                <div class="height">-->
<!--                  <p>Высота (м):</p>-->
<!--                  <p :class="{'red_star' : item.hall_height.$invalid,'green_star' : !item.hall_height.$invalid  }" class="absoluteStar">*</p>-->
<!--                  <input-->
<!--                      type="number"-->
<!--                      v-model="item.hall_height.$model"-->
<!--                      class="dark__input"-->
<!--                      style="width: 100%"-->
<!--                  />-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="cresel">-->
<!--                <div style="display: flex; align-items: center">-->
<!--                  <p>Приложить схему с нумерацией кресел</p>-->
<!--                  <img-->
<!--                      height="35"-->
<!--                      width="35"-->
<!--                      class="visual_photo"-->
<!--                      :src="-->
<!--                          item.hall_cresel_photo_visual.$model-->
<!--                        "-->
<!--                  />-->
<!--                </div>-->
<!--                <input-->
<!--                    type="file"-->
<!--                    style="display: none"-->
<!--                    :id="item.hall_cresel_photo.$model + item.id.$model"-->
<!--                    @change="addHallCreselPhoto(item.id.$model, $event)"-->
<!--                />-->
<!--                <label :for="item.hall_cresel_photo.$model + item.id.$model  "-->
<!--                ><img src="../../assets/images/dashboard/paperclip.png"-->
<!--                /></label>-->
<!--              </div>-->
              <div class="more__description">
                <p>Ширина экрана(м):</p>
                <p :class="{'red_star' : item.hall_screen_width.$invalid,'green_star' : !item.hall_screen_width.$invalid  }" class="absoluteStar">*</p>
                <input
                    type="number"
                    v-model="item.hall_screen_width.$model"
                    class="dark__input more__input"
                />
                <p>Длина экрана(м):</p>
                <p :class="{'red_star' : item.hall_screen_length.$invalid,'green_star' : !item.hall_screen_length.$invalid  }" class="absoluteStar">*</p>
                <input
                    type="number"
                    v-model="item.hall_screen_length.$model"
                    class="dark__input more__input"
                />
              </div>
              <div class="voice__upload" style="align-items: center">
                <p>Звуковое оборудование:</p>
                <p :class="{'red_star' : item.hall_voice_desc.$invalid,'green_star' : !item.hall_voice_desc.$invalid  }" class="absoluteStar">*</p>
                <input
                    class="dark__input voice__upload__input"
                    v-model="item.hall_voice_desc.$model"
                    type="text"
                />
                <img
                    height="35"
                    width="35"
                    class="visual_photo"
                    :src="
                          item.hall_voice_photo_visual.$model
                        "
                />
                <input
                    type="file"
                    style="display: none"
                    :id="item.hall_voice_photo.$model + item.id.$model"
                    @change="addHallVoicePhoto(item.id.$model, $event)"
                />
                <label :for="item.hall_voice_photo.$model + item.id.$model"
                ><img src="../../assets/images/dashboard/paperclip.png"
                /></label>
              </div>
<!--              <div class="photo">-->
<!--                <div style="display: flex; align-items: center">-->
<!--                  <p>Приложить фото</p>-->
<!--                  <img-->
<!--                      height="35"-->
<!--                      width="35"-->
<!--                      class="visual_photo"-->
<!--                      :src="-->
<!--                          item.hall_photo_visual.$model-->
<!--                        "-->
<!--                  />-->
<!--                </div>-->

<!--                <input-->
<!--                    type="file"-->
<!--                    style="display: none"-->
<!--                    :id="item.hall_photo.$model + item.id.$model"-->
<!--                    @change="addHallPhoto(item.id.$model, $event)"-->
<!--                />-->
<!--                <label :for="item.hall_photo.$model + item.id.$model"-->
<!--                ><img src="../../assets/images/dashboard/paperclip.png"-->
<!--                /></label>-->
<!--              </div>-->
            </div>
            <div class="line"></div>
          </div>
          <div class="add__hall__pen">
            <img
                v-if="addHallInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
        <div class="row contract">
          <div class="col col-xl-4">
            <button class="contract__icon">Оформить договор</button>
            <span>
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="25"
                  fill="#D8004E"
                  class="bi bi-arrow-right"
                  viewBox="0 0 16 16"
              >
                <path
                    fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                />
              </svg>
            </span>
          </div>
          <div
              class="col col-xl-8"
              @click="contractInput"
              v-click-outside="closeContractInput"
          >
            <input type="checkbox" id="checkbox">
            <label for="checkbox" class="checkbox-doc">Согласен на условия договора</label>
          </div>
          <div class="contract__pen">
            <img
                v-if="contractInputActive"
                src="../../assets/images/dashboard/pen_green.png"
            />
            <img v-else src="../../assets/images/dashboard/pen.png" />
          </div>
        </div>
      </div>
      <div class="btn" @click="check" >
        <button class="btn_success" >Отправить</button>
      </div>
      <p class="frontValid" v-show="frontValid">Проверьте правильность заполненной формы </p>
      <p class="errorMsg" v-show="error_msg">{{ error_msg }}</p>
      <p class="successMsg" v-show="success_msg">{{ success_msg }}</p>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import { id } from "../../../../cinema_back/public/admin/mdb/src/js/vendor/free/chart";
Vue.directive("click-outside", {
  bind: function (el, binding, vnode) {
    el.clickOutsideEvent = function (event) {
      // here I check that click was outside the el and his children
      if (!(el == event.target || el.contains(event.target))) {
        // and if it did, call method provided in attribute value
        vnode.context[binding.expression](event);
      }
    };
    document.body.addEventListener("click", el.clickOutsideEvent);
  },
  unbind: function (el) {
    document.body.removeEventListener("click", el.clickOutsideEvent);
  },
});
import Vuelidate from "vuelidate";
const touchMap = new WeakMap()

Vue.use(Vuelidate);
import { required, minLength } from 'vuelidate/lib/validators'

export default {
  name: "Company",
  data() {
    return {
      baseUrl: process.env.VUE_APP_API_URL,
      uploadedDocument: [],
      btnDisable: true,
      frontValid: false,
      person_name: '',
      people: [
        {
          id: 0,
          person_name: '',
          person_position: '',
          person_photo: "",
          person_photo_visual: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==',
          person_photo_name: 'Скан паспорта',
        }
      ],
      add_hall: [
        {
          id: 0,
          name_hall: '',
          hall_scheme_photo: 'hall_scheme_photo',
          hall_scheme_photo_visual: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==',
          seat_count: '',
          row_count: '',
          hall_voice_desc: '',
          hall_voice_photo: 'hall_voice_photo',
          hall_voice_photo_visual: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==',
          hall_screen_width: '',
          hall_screen_length: '',
        },
      ],
      checkDocument: "",
      error_msg: "",
      success_msg: "",
      num: 0,
      photo_all: [],
      hall_type: "private",
      personName: "",
      name_theatre: '',
      delete__person: {
          id: 1,
        },
      current__info: [
        {
          position: "Должность",
        },
      ],
      first_doc_passport_photo:
          "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
      file__upload_passport:
          "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
      file__description_scheme:
          "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
      description_hardware_file:
          "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
      name__file_passport:
          "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
      documents: {
        first_doc_text: "",
        first_doc_photo: "",
      },
      address: {
        region: '',
        city: '',
        house: '',
      },
      new_hall_name: [],
      new_hall_scheme_photo: [],
      new_hall_row_count: [],
      new_hall_seat_count: [],
      new_hall_width: [],
      new_hall_length: [],
      new_hall_height: [],
      new_hall_cresel_photo: [],
      new_hall_voice_desc: [],
      new_hall_voice_photo: [],
      new_hall_screen_width: [],
      new_hall_screen_length: [],
      new_hall_photo: [],
      person: [
        {
          id: 1,
          person_input: ["person_input1"],
          person_photo: ["person_photo1"],
        },
      ],

      person__passport_photo: [
        {
          person__passport_photo_id: 1,
          current_passport_photo:
              "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
        },
      ],
      person_str: "",
      payment: {
        order_name: "",
        order_card: "",
        inn: "",
        kpp: "",
        bik: "",
      },
      person_inputs: [],
      person_positions: [],
      person_photos: [],
      description: {
        name_hall: '',
        seat_count: '',
        row_count: '',
        scheme_photo: "",
        scheme_width: "",
        scheme_length: "",
        scheme_height: "",
        cresel_photo: "",
        description_hardware: "",
        description_hardware_photo: "",
        screen_width: "",
        screen_length: "",
        description_hall_photo: "",
      },
      // add_hall_photos: [
      //   {
      //     id: 1,
      //     cresel_photo: ['cresel_photo']
      //   }
      // ],

      delete_hall: {
        id: 1,
      },
      hall_id: 0,
      personInputActive: false,
      documentsInputActive: false,
      addressInputActive: false,
      secondPersonInputActive: false,
      paymentInputActive: false,
      descriptionHallInputActive: false,
      addHallInputActive: false,
      contractInputActive: false,
    };
  },

  validations: {
    personName: {
      required,
      minLength: minLength(5)
    },
    name_theatre: {
      required,
      minLength: minLength(3)
    },
    // name_hall: {
    //   required,
    //   minLength: minLength(3)
    // },
    // address: {
    //   required,
    //   minLength: minLength(5)
    // },
    ////////////////////////////////////////
    documents: {
      first_doc_text: {
        required,
        minLength: minLength(5)
      },
    },
    people: {
      required,
      $each: {
        id: {
          required,
        },
        person_name: {
          required,
          minLength: minLength(5)
        },
        person_position: {
          required
        },
        person_photo: {
          required
        },
        person_photo_visual: {
          required
        },
        person_photo_name: {
          required
        },
      }

    },
    add_hall: {
      required,
      $each: {
        id: {
          required
        },
        name_hall: {
          required,
          minLength: minLength(3)
        },
        hall_scheme_photo: {
          required
        },
        hall_scheme_photo_visual: {
          required
        },
        seat_count: {
          required,
          minLength: minLength(1)
        },
        row_count: {
          required,
          minLength: minLength(1)
        },
        hall_voice_desc: {
          required,
          minLength: minLength(6)
        },
        hall_voice_photo: {
          required
        },
        hall_voice_photo_visual: {
          required
        },
        hall_screen_width: {
          required,
          minLength: minLength(1)
        },
        hall_screen_length: {
          required,
          minLength: minLength(1)
        }
      }
    },
    ////////////////////////////////////////////
    // payment:{
    //   order_name: {
    //     required,
    //     minLength: minLength(5)
    //   },
    //   order_card: {
    //     required,
    //     minLength: minLength(10)
    //   },
    //   inn: {
    //     required,
    //     minLength: minLength(8)
    //   },
    //   kpp: {
    //     required,
    //     minLength: minLength(5)
    //   },
    //   bik: {
    //     required,
    //     minLength: minLength(5)
    //   }
    // },
    // description: {
    //   name_hall: {
    //     required,
    //     minLength: minLength(3)
    //   },
    //   seat_count: {
    //     required,
    //     minLength: minLength(1)
    //   },
    //   row_count: {
    //     required,
    //     minLength: minLength(1)
    //   },
    //   scheme_width: {
    //     required,
    //     minLength: minLength(1)
    //   },
    //   scheme_length: {
    //     required,
    //     minLength: minLength(1)
    //   },
    //   scheme_height: {
    //     required,
    //     minLength: minLength(1)
    //   },
    //   description_hardware: {
    //     required,
    //     minLength: minLength(6)
    //   },
    //   screen_width: {
    //     required,
    //     minLength: minLength(1)
    //   },
    //   screen_length: {
    //     required,
    //     minLength: minLength(1)
    //   }
    // }
  },
  watch: {

    // requestHandle(){
    //   this.$v.$touch()
    //   if(!this.$v.$invalid){
    //     this.btnDisable = false
    //   }
    // },
  },
  methods: {
    status(validation) {
      return {
        error: validation.$error,
        dirty: validation.$dirty
      }
    },
    delayTouch($v) {
      $v.$reset()
      if (touchMap.has($v)) {
        clearTimeout(touchMap.get($v))
      }
      touchMap.set($v, setTimeout($v.$touch, 1000))
    },
    delete_form(key) {
      this.delete__person.id--
      // this.person.splice(key, 1);
      this.people.splice(key, 1);
    },
    addpeople(){
      this.people.push(
          {
            id: this.num + 1,
            person_name: '',
            person_photo: "",
            person_photo_visual: "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
            person_photo_name: 'Скан паспорта'
          })
      let current_id = this.num + 1;
      this.num = current_id;
      this.delete__person.id++
    },
    // addForm() {
    //   let current_id = this.num + 1;
    //   // let person_id = this.person.id + 1
    //   // this.person.id = person_id
    //   this.num = current_id;
    //   this.person__passport_photo_id++;
    //   let photos = {
    //     id: current_id,
    //     current_passport_photo:
    //       "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
    //   };
    //   this.person__passport_photo.push(photos);
    //   let arr = {
    //     id: current_id,
    //     delete__person: "Удалить",
    //   };
    //   this.delete__person.push(arr);
    //   let person = {
    //     id: current_id,
    //     person_input: [],
    //     person_photo: [],
    //   };
    //   person.person_input.push("person_input" + current_id);
    //   person.person_photo.push("person_photo" + current_id);
    //   this.person.push(person);
    // },
    addHall() {
      // this.hall_id++;
      this.add_hall.push(
          {
            id: this.hall_id + 1,
            name_hall: '',
            hall_scheme_photo: 'hall_scheme_photo',
            hall_scheme_photo_visual: "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
            row_count: '',
            seat_count: '',
            hall_voice_desc: '',
            hall_voice_photo: 'hall_voice_photo',
            hall_voice_photo_visual: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==',
            hall_screen_width: '',
            hall_screen_length: '',
          }
      )

      let number = this.hall_id + 1;
      this.hall_id = number;
      this.delete_hall.id++;


      // let add_new_hall = {
      //   id: this.hall_id,
      //   hall_scheme_photo: [],
      //   hall_width: [],
      //   hall_length: [],
      //   hall_height: [],
      //   hall_cresel_photo: [],
      //   hall_voice_desc: [],
      //   hall_voice_photo: [],
      //   hall_screen_width: [],
      //   hall_screen_length: [],
      //   hall_photo: [],
      // };

      // add_new_hall.hall_scheme_photo.push("hall_scheme_photo" + this.hall_id);
      // add_new_hall.hall_width.push("hall_width" + this.hall_id);
      // add_new_hall.hall_length.push("hall_length" + this.hall_id);
      // add_new_hall.hall_height.push("hall_height" + this.hall_id);
      // add_new_hall.hall_cresel_photo.push("hall_cresel_photo" + this.hall_id);
      // add_new_hall.hall_voice_desc.push("hall_voice_desc" + this.hall_id);
      // add_new_hall.hall_voice_photo.push("hall_voice_photo" + this.hall_id);
      // add_new_hall.hall_screen_width.push("hall_screen_width" + this.hall_id);
      // add_new_hall.hall_screen_length.push("hall_screen_length" + this.hall_id);
      // add_new_hall.hall_photo.push("hall_photo" + this.hall_id);
      // this.add_hall.push(add_new_hall);
    },
    deleteHall(key) {
      this.delete_hall.id--;
      this.add_hall.splice(key, 1);
    },
    personInput() {
      this.personInputActive = true;
    },
    closeInput() {
      this.personInputActive = false;
    },
    documentsInput() {
      this.documentsInputActive = true;
    },
    closeDocumentsInput() {
      this.documentsInputActive = false;
    },
    addressInput() {
      this.addressInputActive = true;
    },
    closeAddressInput() {
      this.addressInputActive = false;
    },
    secondPersonInput() {
      this.secondPersonInputActive = true;
    },
    closeSecondPersonInput() {
      this.secondPersonInputActive = false;
    },
    paymentInput() {
      this.paymentInputActive = true;
    },
    closePaymentInput() {
      this.paymentInputActive = false;
    },
    descriptionHallInput() {
      this.descriptionHallInputActive = true;
    },
    closeDescriptionHallInput() {
      this.descriptionHallInputActive = false;
    },
    addHallInput() {
      this.addHallInputActive = true;
    },
    closeAddHallInput() {
      this.addHallInputActive = false;
    },
    contractInput() {
      this.contractInputActive = true;
    },
    closeContractInput() {
      this.contractInputActive = false;
    },
    checkOgrnPhoto(e) {
      this.documents.first_doc_photo = e.target.files[0];
      this.first_doc_passport_photo = e.target.files[0];
      if (this.first_doc_passport_photo) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.first_doc_passport_photo = e.target.result;
        };
        reader.readAsDataURL(this.first_doc_passport_photo);
      }
    },
    checkProtocolPhoto(e) {
      this.documents.second_doc_photo = e.target.files[0];
      this.second_doc_passport_photo = e.target.files[0];
      if (this.second_doc_passport_photo) {
        let reader = new FileReader();
        reader.onload = (a) => {
          this.second_doc_passport_photo = a.target.result;
        };
        reader.readAsDataURL(this.second_doc_passport_photo);
      }
    },
    checkCharterPhoto(e) {
      this.documents.third_doc_photo = e.target.files[0];
      this.third_doc_passport_photo = e.target.files[0];
      if (this.third_doc_passport_photo) {
        let reader = new FileReader();
        reader.onload = (a) => {
          this.third_doc_passport_photo = a.target.result;
        };
        reader.readAsDataURL(this.third_doc_passport_photo);
      }
    },
    descriptionHallScheme(e) {
      this.description.scheme_photo = e.target.files[0];
      this.file__description_scheme = e.target.files[0];
      if (this.file__description_scheme) {
        let reader = new FileReader
        reader.onload = a => {
          this.file__description_scheme = a.target.result
        }
        reader.readAsDataURL(this.file__description_scheme)
      }
    },
    creselPhoto(e) {
      this.description.cresel_photo = e.target.files[0];
      this.file__upload_passport = e.target.files[0];
      if (this.file__upload_passport) {
        let reader = new FileReader();
        reader.onload = (a) => {
          this.file__upload_passport = a.target.result;
        };
        reader.readAsDataURL(this.file__upload_passport);
      }
    },
    voiceFile(e) {
      this.description.description_hardware_photo = e.target.files[0];
      this.description_hardware_file = e.target.files[0];
      if (this.description_hardware_file) {
        let reader = new FileReader();
        reader.onload = (a) => {
          this.description_hardware_file = a.target.result;
        };
        reader.readAsDataURL(this.description_hardware_file);
      }
    },

    photo(e) {
      this.description.photo = e.target.files[0];
      this.name__file_passport = e.target.files[0];
      if (this.name__file_passport) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.name__file_passport = e.target.result;
        };
        reader.readAsDataURL(this.name__file_passport);
      }
    },
    checkPersonPhoto(id, e) {
      // this.person.push(item.person_photo)
      this.people.map((item) => {
        if (item.id == id) {
          item.person_photo = e.target.files[0];
        }
      });

      this.people.map((photo) => {
        if(photo.id == id){
          photo.person_photo_visual = e.target.files[0]
          photo.person_photo_name = e.target.files[0].name
          if (this.person__passport_photo) {
            let reader = new FileReader
            reader.onload = e => {
              photo.person_photo_visual = e.target.result

            }
            reader.readAsDataURL(photo.person_photo_visual);
          }
        }

      })
    },
    addHallCreselPhoto(id, e) {
      this.add_hall.map((item) => {
        if (item.id == id) {
          item.hall_cresel_photo = e.target.files[0];
        }
      });
      this.add_hall.map((item) => {
        if (item.id == id) {
          item.hall_cresel_photo = e.target.files[0];
          item.hall_cresel_photo_visual = e.target.files[0]
          if (item.hall_cresel_photo_visual) {
            let reader = new FileReader
            reader.onload = e => {
              item.hall_cresel_photo_visual = e.target.result
            }
            reader.readAsDataURL(item.hall_cresel_photo_visual);
          }
        }
      });

    },
    addHallSchemePhoto(id, e) {
      this.add_hall.map((item) => {
        if (item.id == id) {
          item.hall_scheme_photo = e.target.files[0];
          item.hall_scheme_photo_visual = e.target.files[0]
          if (item.hall_scheme_photo_visual) {
            let reader = new FileReader
            reader.onload = e => {
              item.hall_scheme_photo_visual = e.target.result
            }
            reader.readAsDataURL(item.hall_scheme_photo_visual);
          }
        }
      });
    },
    addHallVoicePhoto(id, e) {
      this.add_hall.map((item) => {
        if (item.id == id) {
          item.hall_voice_photo = e.target.files[0];
          item.hall_voice_photo_visual = e.target.files[0]
          if (item.hall_voice_photo_visual) {
            let reader = new FileReader
            reader.onload = e => {
              item.hall_voice_photo_visual = e.target.result
            }
            reader.readAsDataURL(item.hall_voice_photo_visual);
          }
        }
      });

    },
    addHallPhoto(id, e) {
      this.add_hall.map((item) => {
        if (item.id == id) {
          item.hall_photo = e.target.files[0];
          item.hall_photo_visual = e.target.files[0]
          if (item.hall_photo_visual) {
            let reader = new FileReader
            reader.onload = e => {
              item.hall_photo_visual = e.target.result
            }
            reader.readAsDataURL(item.hall_photo_visual);
          }
        }
      });

    },
    // check(){
    //   console.log(this.people)
    //   this.person_inputs.push(this.people.person_name)
    //   console.log(this.person_inputs)
    // }
    check() {
      this.person_inputs = []
      this.person_positions = []
      this.new_hall_name = []
      this.new_hall_scheme_photo = []
      this.new_hall_row_count = []
      this.new_hall_seat_count = []
      this.new_hall_width = []
      this.new_hall_length = []
      this.new_hall_height = []
      this.new_hall_voice_photo = []
      this.new_hall_voice_desc = []
      this.new_hall_screen_width = []
      this.new_hall_screen_length = []

        this.$v.$touch()
        if (this.$v.$invalid) {
          // this.new_hall_width = [],
          // this.new_hall_length = [],
          // this.new_hall_height = [],
          // this.new_hall_voice_desc = [],
          // this.new_hall_screen_width = [],
          // this.new_hall_screen_width = [],
          // this.new_hall_screen_length = [],
          // this.person_name = [],
          console.log(this.$v)
          this.frontValid = true
        } else {
          let files = new FormData();
          files.append("hall_type", this.hall_type);
          files.append("personName", this.personName);
          files.append("name_theatre", this.name_theatre);
          files.append("documents_first_doc_text", this.documents.first_doc_text);
          files.append("documents_first_doc_photo", this.documents.first_doc_photo);
          // files.append("documents_second_doc_text", this.documents.second_doc_text);
          // files.append("documents_second_doc_photo", this.documents.second_doc_photo);
          // files.append("documents_third_doc_text", this.documents.third_doc_text);
          // files.append("documents_third_doc_photo", this.documents.third_doc_photo);
          files.append("region", this.address.region);
          files.append("city", this.address.city);
          files.append("house", this.address.house);
          // files.append("payment_order_name", this.payment.order_name);
          // files.append("payment_order_card", this.payment.order_card);
          // files.append("payment_inn", this.payment.inn);
          // files.append("payment_kpp", this.payment.kpp);
          // files.append("payment_bik", this.payment.bik);
          // files.append("description_name_hall", this.description.name_hall);
          // files.append("description_seat_count", this.description.seat_count);
          // files.append("description_row_count", this.description.row_count);
          // files.append("description_scheme_photo", this.description.scheme_photo);
          // files.append("description_scheme_width", this.description.scheme_width);
          // files.append("description_scheme_length", this.description.scheme_length);
          // files.append("description_scheme_height", this.description.scheme_height);
          // files.append("description_cresel_photo", this.description.cresel_photo);
          // files.append("description_voice_input", this.description.description_hardware);
          // files.append("description_voice_photo", this.description.description_hardware_photo);
          // files.append("description_screen_width", this.description.screen_width);
          // files.append("description_screen_length", this.description.screen_length);
          // files.append("description_photo", this.description.photo);
          this.add_hall.map((item) => {
            this.new_hall_name.push(item.name_hall);
            this.new_hall_row_count.push(item.row_count);
            this.new_hall_seat_count.push(item.seat_count);
            this.new_hall_voice_desc.push(item.hall_voice_desc);
            this.new_hall_screen_width.push(item.hall_screen_width);
            this.new_hall_screen_length.push(item.hall_screen_length);
            let scheme_photo = "new_hall_scheme_photo_" + item.id;
            let voice_photo = "new_hall_voice_photo_" + item.id;
            files.append(scheme_photo, item.hall_scheme_photo);
            files.append(voice_photo, item.hall_voice_photo);
          });
          files.append('new_hall_name', JSON.stringify(this.new_hall_name));
          files.append('new_hall_row_count', JSON.stringify(this.new_hall_row_count));
          files.append('new_hall_seat_count', JSON.stringify(this.new_hall_seat_count));
          files.append("new_hall_voice_desc", JSON.stringify(this.new_hall_voice_desc));
          files.append("new_hall_screen_width", JSON.stringify(this.new_hall_screen_width));
          files.append("new_hall_screen_length", JSON.stringify(this.new_hall_screen_length));
          files.append('hall_count', this.hall_id);

          this.people.map((item) => {
            this.person_inputs.push(item.person_name);
            this.person_positions.push(item.person_position);
            files.append('person_photo_' + (item.id), item.person_photo)
          });

          files.append("person_name", JSON.stringify(this.person_inputs));
          files.append("person_position", JSON.stringify(this.person_positions));

          console.log(this.people)
          axios
              .post(process.env.VUE_APP_API_URL + "api/upload-docs", files)
              .then((res) => {
                if (res.data.error) {
                  this.error_msg = res.data.error;
                } else if (res.data.success) {
                  this.success_msg = res.data.success;
                  this.$router.push('/cinema/dashboard')
                  this.$router.go()
                }
              });
        }
    },
  },
  mounted() {
    this.personName = ''
    this.documents.first_doc_text = ''
    this.documents.first_doc_photo = ''
    this.address.house = ''
    this.address.city = ''
    this.address.house = ''
    this.personName = ''


    axios.post(process.env.VUE_APP_API_URL + "api/get-my-document").then((res) => {
      this.uploadedDocument = res.data.document
      if(this.uploadedDocument !== null){
        this.personName = this.uploadedDocument['personName']
        this.documents.first_doc_text = this.uploadedDocument['document_ogrn_text']
        this.address.region = this.uploadedDocument['region']
        this.address.city = this.uploadedDocument['city']
        this.address.house = this.uploadedDocument['house']
        this.documents.first_doc_photo = this.uploadedDocument['document_ogrn_photo']
        this.first_doc_passport_photo = this.baseUrl + 'storage/images/' + this.uploadedDocument['document_ogrn_photo']

        if(JSON.parse(this.uploadedDocument['person_name']).length !== 1) {
          this.people = []
          this.delete__person.id = 0
          // for(let aaa in JSON.parse(this.uploadedDocument['person_photo'])){
          //   if (JSON.parse(this.uploadedDocument['person_photo']).hasOwnProperty(aaa)) {
          //     alert(aaa); // 'a'
          //     alert(JSON.parse(this.uploadedDocument['person_photo'])[aaa]); // 'hello'
          //   }
          // }
          JSON.parse(this.uploadedDocument['person_name']).forEach((element) => {
                this.people.push(
                    {
                      id: this.num + 1,
                      person_name: '',
                      person_position: '',
                      person_photo: '',
                      person_photo_visual: "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
                      person_photo_name: 'Скан паспорта',
                    })

            let current_id = this.num + 1;
            this.num = current_id;
            this.delete__person.id++;
          })
          JSON.parse(this.uploadedDocument['person_name']).forEach((element, id) => {
              let current = this.people.find(elem => elem.id === id +1)
              current.person_name = element
              this.person_inputs.push(element);
          })
          JSON.parse(this.uploadedDocument['person_position']).forEach((element, id) => {
            let current = this.people.find(elem => elem.id === id +1)
            current.person_position = element
            this.person_positions.push(element);
          })
          JSON.parse(this.uploadedDocument['person_photo']).forEach((element, id) => {
            console.log(element)
            let current = this.people.find(elem => elem.id === id +1)
                for (var key in element) {
                  // eslint-disable-next-line no-prototype-builtins
                  if (element.hasOwnProperty(key)) {
                    current.person_photo = element[key]
                    current.person_photo_name = element[key]
                    current.person_photo_visual = this.baseUrl+ 'storage/images/' + element[key]
                  }
                }
            })

            // let current = this.people.find(elem => elem.id === id + 1)
            // // console.log(current)
            // current.person_photo = element['person_photo_'+id]
            // current.person_photo_visual = this.baseUrl+ 'storage/images/' + element['person_photo_'+id]
            // this.person_photos.push(element)
        }
        else{
          let photo = JSON.parse(this.uploadedDocument['person_photo'])
          for (var key in photo[0]) {
            // eslint-disable-next-line no-prototype-builtins
            if (photo[0].hasOwnProperty(key)) {
              this.people[0].person_photo_name = photo[0][key]
              this.people[0].person_photo = photo[0][key]
              this.people[0].person_photo_visual = this.baseUrl+ 'storage/images/' + photo[0][key]
            }
          }
          console.log(JSON.parse(this.uploadedDocument['person_photo']))
            this.people[0].person_name = JSON.parse(this.uploadedDocument['person_name'])[0]
            this.person_inputs.push(this.people.person_name);
            this.people[0].person_position = JSON.parse(this.uploadedDocument['person_position'])[0]
            this.person_positions.push(this.people.person_position);
          //   this.people[0].person_photo_visual = this.baseUrl + 'storage/images/' + JSON.parse(this.uploadedDocument['person_photo'])[0]['person_photo_0']
          // this.people[0].person_photo = JSON.parse(this.uploadedDocument['person_photo'])[0]['person_photo_0']
          // this.people[0].person_photo_name = JSON.parse(this.uploadedDocument['person_photo'])[0]['person_photo_0']
          // console.log(JSON.parse(this.uploadedDocument['person_photo'])[0]['person_photo_0'])
        }

        if(JSON.parse(this.uploadedDocument['new_hall_name']).length !== 1){
          this.add_hall.push(
              {
                id: this.hall_id + 1,
                name_hall: '',
                hall_scheme_photo: 'hall_scheme_photo',
                hall_scheme_photo_visual: "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==",
                row_count: '',
                seat_count: '',
                hall_voice_desc: '',
                hall_voice_photo: 'hall_voice_photo',
                hall_voice_photo_visual: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSk3LjouFx8zODM4NygtLisBCgoKBQ0NDg8PDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAEf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AyigqAIAACoAKgAAAAAAAAAAACgIKgKgAAAAAAAAAAAAoCAAACoAAAKioAACoAAqACoAAAAAqAAAAAKgAAAAAAAAACgIqKCKgAogKgAAAqCggAAAAAAAAKCKgAqAAAAAAAAAAAKioAKAgqACoAAAAAKgAAAAKgACoAACoAAAAAAAAAAAAAAKCKAIAAqKCKIAKgAAAAKIAqACoqAAAAAAAAAAAAAAAAoIAAqAAqACgIAAAAAAAAAAAAAAAAqAAAAAAAAAAACoACgIACoAAAAAAACoAAAAAAAAAAAqCggAAAAKAgAAALUUEBQQVAAAAAAABUAAAAAAAFQAVABUAAAAAAAAAAAAABQRRAAABQBAAAAAAAAAAAAAAAAAAAAAAVAAFBAAAUEAAFQFEAVFQFQUEAAAAAAAAAAAABQQVABQEAAAAAAAAAAIAAACoAqAAAAqAAAAAAAAAAAAAAAKgAAAqAAAAAAAAAD//2Q==',
                hall_screen_width: '',
                hall_screen_length: '',
              }
          )

          let number = this.hall_id + 1;
          this.hall_id = number;
          this.delete_hall.id++;

          JSON.parse(this.uploadedDocument['new_hall_name']).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.name_hall = element
            this.new_hall_name.push(element);
          })
          JSON.parse(this.uploadedDocument['new_hall_hardware_description']).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.hall_voice_desc = element
            this.new_hall_voice_desc.push(element);
          })
          JSON.parse(this.uploadedDocument['new_hall_screen_length']).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.hall_screen_length = element
            this.new_hall_screen_length.push(element);
          })
          JSON.parse(this.uploadedDocument['new_hall_screen_width']).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.hall_screen_width = element
            this.new_hall_screen_width.push(element);
          })
          JSON.parse(JSON.parse(this.uploadedDocument['new_hall_row_count'])).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.row_count = element
            this.new_hall_row_count.push(element);
          })
          JSON.parse(JSON.parse(this.uploadedDocument['new_hall_seat_count'])).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.seat_count = element
            this.new_hall_seat_count.push(element);
          })
          JSON.parse(this.uploadedDocument['new_hall_scheme_photo']).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.hall_scheme_photo = element['new_hall_scheme_photo_'+id]
            current.hall_scheme_photo_visual = this.baseUrl + "storage/images/" + element['new_hall_scheme_photo_'+id]
          })
          JSON.parse(this.uploadedDocument['new_hall_hardware_photo']).forEach((element, id) => {
            let current = this.add_hall.find(elem => elem.id === id)
            current.hall_voice_photo = element['new_hall_voice_photo_'+id]
            current.hall_voice_photo_visual = this.baseUrl + "storage/images/" + element['new_hall_voice_photo_'+id]
          })

        }else {
          this.add_hall[0].name_hall = JSON.parse(this.uploadedDocument['new_hall_name'])[0]
          this.add_hall[0].hall_voice_desc = JSON.parse(this.uploadedDocument['new_hall_hardware_description'])[0]
          this.add_hall[0].hall_screen_length = JSON.parse(this.uploadedDocument['new_hall_screen_length'])[0]
          this.add_hall[0].hall_screen_width = JSON.parse(this.uploadedDocument['new_hall_screen_width'])[0]
          this.add_hall[0].row_count = JSON.parse(JSON.parse(this.uploadedDocument['new_hall_row_count']))[0]
          this.add_hall[0].seat_count = JSON.parse(JSON.parse(this.uploadedDocument['new_hall_seat_count']))[0]
          this.add_hall[0].hall_voice_photo_visual = this.baseUrl + 'storage/images/' + JSON.parse(this.uploadedDocument['new_hall_hardware_photo'])[0]['new_hall_voice_photo_0']
          this.add_hall[0].hall_voice_photo = JSON.parse(this.uploadedDocument['new_hall_hardware_photo'])[0]['new_hall_voice_photo_0']
          this.add_hall[0].hall_scheme_photo_visual = this.baseUrl + 'storage/images/' + JSON.parse(this.uploadedDocument['new_hall_scheme_photo'])[0]['new_hall_scheme_photo_0']
          this.add_hall[0].hall_scheme_photo = JSON.parse(this.uploadedDocument['new_hall_scheme_photo'])[0]['new_hall_scheme_photo_0']
        }
      }
    })
    document.title = "Extra Cinema | Загрузка документов";
  },
}
</script>

<style scoped>
.checkbox-doc{
  color: white;
}
.dirty {
  border:1px solid #8E8;
  background: #EFE;
}
.dirty:focus {
  outline-color: #8E8;
}
.error {
  border-color: red;
  background: #FDD;
}
.frontValid{
  padding: 15px;
  color: red;
}
.visual_photo{
  margin: 5px 10px;
}
.btn_success:disabled{
  pointer-events: none;
  background-color: #7fa48e;
}
.absoluteStar{
  /*position: absolute;*/
  margin-top: 5px; /*right: 0;*/
}
.inputBar{
  display: flex;
  align-items: center;
}
.addressBar{
  display: flex;
  align-items: center;
}
.orderNameBar{
  display: flex;
  align-items: center;
}
.orderBar, .inn, .kpp, .bik, .desc_width, .desc_length, .desc_height{
  display: flex;
  align-items: center;
}
.dirty {
  border-color: #5A5;
  background: #EFE;
}

.dirty:focus {
  outline-color: #8E8;
}

.error {
  border-color: red;
  background: #FDD;
}

.error:focus {
  outline-color: #F99;
}
.red_star{
  color:red;
  margin: 0px 5px 0px 3px;
}
.green_star{
  color:green;
  margin: 0px 5px 0px 2px;
}
.document__sucess {
  width: 100%;
  /*height: 300px;*/
  padding: 20px;
  background-color: grey;
  margin-top: 60px;
  border-radius: 10px;
  font-size: 18px;
  text-align: center;
  margin-bottom: 20px;
}
.errorMsg {
  padding: 10px;
  color: red;
  font-size: 18px;
}
.successMsg {
  padding: 10px;
  color: green;
  font-size: 18px;
}
input[type="file"] {
  display: none;
}
.btn_success {
  width: 100%;
  background: #27ae60;
  border-radius: 10px;
  padding: 15px;
  border: none;
  cursor: pointer;
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 16px;
  line-height: 140%;
  /* or 22px */

  text-align: center;

  /* white */

  color: #ffffff;
}
.containerFluid {
  position: relative;
  border: 1px solid grey;
  border-radius: 7px;
  margin-bottom: 20px;
}
.containerFluid > * {
  position: relative;
}
.name__person {
  font-family: "Montserrat", sans-serif;
  font-size: 14px;
}
.col-xl-4 {
  padding: 5px 15px;
  width: 25%;
  border-right: 1px solid grey;
  color: #fff;
}
.documents .col-xl-4 {
  font-family: "Montserrat", sans-serif;
  font-size: 14px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.col-xl-8 {
  padding: 5px 15px;
  width: 75%;
}
.line {
  margin: 5px 0px;
  width: 100%;
  height: 0.5px;
  background-color: #444444;
}
input {
  width: 100%;
  background-color: transparent;
  border: none;
  color: #ffffff;
}
input:focus {
  outline: none;
}
input::placeholder {
  padding-left: 5px;
}
.dark__input {
  width: 80%;
  background-color: #161616;
  border-radius: 2px;
  height: 25px;
}
.document__upload {
  background-color: #252424;
  padding: 15px;
  border-radius: 5px;
  width: 100%;
}
.address_all{
  background-color: #252424;
  padding: 20px 15px;
  border-radius: 5px;
  width: 100%;
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 116.5%;
  color: #767676;
}
.address_all .house{
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.address_all .flex_container .region, .address_all .flex_container .city{
  display: flex;
  align-items: center;
  justify-content: center;
}
.address_all .flex_container .region p,  .address_all .flex_container .city p, .address_all .house p{
  margin-right: 10px;
}
.address_all .flex_container{
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.current__document {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 10px 0px;
}
.row {
  display: flex;
  align-self: flex-end;
  /*padding: 10px 0px;*/
}

/* person */
.person .col-xl-4,
.person .col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.add__person {
  background-color: #252424;
  border-radius: 5px;
  height: auto;
  padding: 0px 10px;
}
.delete__person,
.add__new__person {
  background-color: transparent;
  width: 100%;
  text-align: left;
  padding: 15px 10px;
  border: none;
  outline: none;
  color: #b9b9b9;
}
.add__new__person {
  font-weight: 600;
  color: white;
}
.delete__person:not(:last-child) {
  border-bottom: 1px solid grey;
}
.info__parent {
  background-color: #252424;
  border-radius: 5px;
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 116.5%;
  color: #767676;
  margin-bottom: 10px;
}
.person .col-xl-4 .person__adding p {
  margin-bottom: 10px;
}
.current__info {
  padding: 10px;
  border-bottom: 0.5px solid #444444;
}
.current__info:last-child {
  border-bottom: none;
}
.current__info__name{
  display: flex;
  align-items: center;
}
.current__info__position{
  margin-top: 10px;
  display: flex;
  align-items: center;
}
select{
  /*background-color: #161616;*/
  background: #161616;;
  color: white;
  border: none;
  height: 25px;
}
select:focus-visible{
  border: none;
  outline: none;
}
select::-ms-expand {
  display: none;
}

.current__info__screen {
  margin-top: 5px;
  display: flex;
  justify-content: space-between;
}

/* Payment */
.payment .col-xl-4 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.payment__description {
  background: #252424;
  border-radius: 5px;
  padding: 15px;
}
.payment__description > * {
  margin: 8px 0px;
}
.payment__description .name__order p,
.payment__description .check__order p,
.payment__description .password__order p {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 116.5%;
  margin-bottom: 5px;

  color: #767676;
}
.payment__description .password__order {
  display: flex;
  width: 100%;
  justify-content: space-between;
}
.payment__title_p {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 140%;
  color: #ffffff;
}
.payment__input {
  width: 100%;
  background: #161616;
  border-radius: 2px;
  height: 25px;
}

/* contract */
.contract .col-xl-4 {
  display: flex;
  justify-content: space-between;
}
.contract .col-xl-8{
  display: flex;
  justify-content: flex-start;
  align-items: center;
}
.contract .col-xl-8 input{
  width: auto;
  margin-right: 10px;
}
.contract__icon {
  font-family: "Montserrat", sans-serif;
  background-color: transparent;
  border: none;
  font-style: normal;
  font-weight: normal;
  font-size: 15px;
  line-height: 140%;
  color: #ffffff;
}
.contract__link {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 14px;
  line-height: 140%;
  text-decoration-line: underline;
  color: #27ae60;
}

/* Add Hall*/
.add__hall .col-xl-4 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.add__hall .col-xl-4 .add__hall_title .add__hall_plus {
  font-family: "Montserrat", sans-serif;
  font-size: 14px;
  display: flex;
  justify-content: space-between;
}
.delete__hall,
.add__new__hall {
  background-color: transparent;
  width: 100%;
  text-align: left;
  padding: 15px 10px;
  border: none;
  outline: none;
  color: #b9b9b9;
}
.add__new__hall {
  font-weight: 600;
  color: white;
}
.delete__hall:not(:last-child) {
  border-bottom: 1px solid grey;
}
.add__hall_btn {
  margin-top: 10px;
  background-color: #252424;
  border-radius: 5px;
  height: auto;
  padding: 0px 10px;
}
.add__hall_description {
  background: #252424;
  border-radius: 5px;
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 116.5%;
  color: #767676;
  margin-bottom: 10px;
}

.add__hall_description .desc,
.add__hall_description .scheme_description,
.add__hall_description .cresel,
.add__hall_description .voice__upload,
.add__hall_description .photo {
  display: flex;
  justify-content: space-between;
  padding: 15px;
  align-items: center;
}
.add__hall_description .scheme_description{
  border-bottom: 0.5px solid #444444;
}
.add__hall_description .scheme{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding:10px 15px;
  border-bottom: 0.5px solid #444444;
}
.add__hall_description .more__description {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 15px;
}
.add__hall_description .more__description > * {
  margin-right: 10px;
}
.add__hall_description .desc,
.add__hall_description .cresel,
.add__hall_description .more__description {
  border-bottom: 0.5px solid #444444;
}
.voice__upload__input {
  margin-right: 10px;
}
.more__input {
  width: 20%;
}
.add__hall_description .desc > * {
  display: flex;
  align-items: center;
}

/* Description__hall */
.description__hall .col-xl-8 .name_hall{
  display: flex;
  align-items: center;
  justify-content: center;
}
.description__hall .col-xl-8 .name_hall .name_hall__title{
  display: flex;
  /*align-items: center;*/
  justify-content: center;
}
.add__hall .col-xl-8 .name_hall{
  display: flex;
  align-items: center;
  justify-content: center;
}
.add__hall .col-xl-8 .name_hall .name_hall__title{
  display: flex;
  /*align-items: center;*/
  justify-content: center;
}

.description__hall .title {
  font-size: 14px;
  font-family: "Montserrat", sans-serif;
  display: flex;
  justify-content: space-between;
}
.description__hall .description__title {
  background: #252424;
  border-radius: 5px;
}
.description__hall .description__title .dark__btn {
  background-color: transparent;
  border: none;
  outline: none;
  width: 100%;
  padding: 10px;
  border-bottom: 0.5px solid #444444;
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 116.5%;
  color: #b9b9b9;
  text-align: left;
  vertical-align: center;
}
.description__hall .description__title .dark__btn:last-child {
  border-bottom: none;
}
.description__hall .col-xl-8 .description {
  background: #252424;
  border-radius: 5px;
  /*padding: 15px;*/
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 116.5%;
  color: #767676;
}
.description__hall .col-xl-4,
.description__hall .col-xl-8 {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.add__hall .col-xl-8 .name_hall{
  padding: 15px;
  border-bottom: 0.5px solid #444444;
}
.add__hall .col-xl-8 .add__hall_description .scheme_description, .add__hall .col-xl-8 .add__hall_description .scheme_description > *{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.description__hall .col-xl-8 .description .name_hall,
.description__hall .col-xl-8 .description .first_section,
.description__hall .col-xl-8 .description .file,
.description__hall .col-xl-8 .description .data,
.description__hall .col-xl-8 .description .name__file,
.description__hall .col-xl-8 .description .data__desc {
  padding: 11px;
  border-bottom: 0.5px solid #444444;
}
.description__hall .col-xl-8 .description .first_section .scheme, .description__hall .col-xl-8 .description .first_section .scheme > *{
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.description__hall .col-xl-8 .description .first_section .scheme_photo .seat_scheme, .description__hall .col-xl-8 .description .first_section .scheme .scheme_photo .btns{
  display: flex;
  align-items: center;
}
.first_section .scheme_photo{
  display: flex;
  justify-content:space-between;
  align-items: center;
}
.description__hall .col-xl-8 .description .name__file {
  border-bottom: none;
}
.description__hall .col-xl-8 .scheme,
.description__hall .col-xl-8 .desc {
  display: flex;
  justify-content: space-between;
}
.description__hall .col-xl-8 .desc .width,
.description__hall .col-xl-8 .desc .length,
.description__hall .col-xl-8 .desc .height {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-direction: row;
  padding-right: 5px;
}
.description__hall .col-xl-8 .desc .width input,
.description__hall .col-xl-8 .desc .length input,
.description__hall .col-xl-8 .desc .height input {
  justify-self: flex-start;
}
.description__input::placeholder {
  text-align: center;
}
.description__hall .col-xl-8 .description .file .file__upload {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}
.description__hall .col-xl-8 .description .file .file__upload img,
.description__hall .col-xl-8 .description .data img,
.description__hall .col-xl-8 .description .name__file .name img {
  margin-left: 10px;
}
.description__hall .col-xl-8 .description .file,
.description__hall .col-xl-8 .description .data,
.description__hall .col-xl-8 .description .name__file {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.description__hall .col-xl-8 .description .data__desc {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}
.description__hall .col-xl-8 .description .data__desc .width,
.description__hall .col-xl-8 .description .data__desc .length {
  width: auto;
  display: flex;
  align-items: center;
}
.description__hall .col-xl-8 .description .name__file .name {
  display: flex;
  align-items: center;
}
.description__hall .col-xl-8 .description .data__desc .width input,
.description__hall .col-xl-8 .description .data__desc .length input {
  margin-left: 5px;
}

.error_input{
  border: 2px solid red;
}
/* */
.person__pen {
  position: absolute;
  top: 5px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.documents__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.address .col-xl-4 {
  font-family: "Montserrat", sans-serif;
  font-size: 14px;
  display:flex;
  flex-direction: column;
  justify-content: space-between;
}
.address__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.second__person__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.payment__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.description__hall__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.add__hall__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
.contract__pen {
  position: absolute;
  top: 0px;
  right: -30px;
  border-bottom: 0.5px solid #444444;
}
/* */
.form {
  margin: 50px auto 80px auto;
  padding: 41px 81px 38px 45px;
  background: #161616;
  border-radius: 10px;
  max-width: 920px;
  width: 100%;
  min-height: 70vh;
  .btn {
    margin-top: 34px;
  }
}
</style>
