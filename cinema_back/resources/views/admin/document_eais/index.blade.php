@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2" style="width: 100%">
        <section class="content" style="width: 100%;">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
{{--                            <a href="{{ route('admin.seances.create') }}" class="text-primary mr-2">--}}
{{--                                <i class="far fa-plus-square"></i>--}}
{{--                            </a>--}}

                            <span class="font-weight-bold">Документы ЕАИС</span>

                            <div class="card-tools">
                                @include('admin._include._card_tools')
                            </div>
                        </div>
                        <div class="card-body">
{{--                            @include('admin.seances._filters')--}}

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        №
                                    </th>
                                    <th>
                                        Пользователь
                                    </th>
                                    <th>
                                        Дата заполнения
                                    </th>
                                    <th>
                                        Название демонстратора фильмов (кинотеатра)
                                    </th>
                                    <th>
                                        ID кинотеатра
                                    </th>
                                    <th>
                                        Название киносети
                                    </th>
                                    <th>
                                        ID киносети
                                    </th>
                                    <th>
                                        Email киносети
                                    </th>
                                    <th>
                                        Наименование юридического лица
                                    </th>
                                    <th>
                                        Адрес юридического лица
                                    </th>
                                    <th>
                                        Код ОГРН (13 или 15 знаков)
                                    </th>
                                    <th>
                                        ИНН
                                    </th>
                                    <th>
                                        Регион
                                    </th>
                                    <th>
                                        Город (район)
                                    </th>
                                    <th>
                                        Населенный пункт
                                    </th>
                                    <th>
                                        Улица, номер дома
                                    </th>
                                    <th>
                                        Email киносети
                                    </th>
                                    <th>
                                        Телефон/факс
                                    </th>
                                    <th>
                                        Сайт демонстратора фильмов
                                    </th>
                                    <th>
                                        Номер автоинформатора о репертуаре
                                    </th>
                                    <th>
                                        Ответственное лицо (ФИО полностью)
                                    </th>
                                    <th>
                                        Наименование зала
                                    </th>
                                    <th>
                                        Кол-во мест в зале
                                    </th>
                                    <th>
                                        Поддержан ФК
                                    </th>
                                    <th>
                                        Оборудование кинозала(Проектор-Производитель)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Проектор-Модель)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Проектор-Серийный номер)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Сервер-Производитель)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Сервер-Модель)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Сервер-Серийный номер)
                                    </th>
                                    <th>
                                        Наименование зала
                                    </th>
                                    <th>
                                        Оборудование кинозала(Разрешение проектора)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Иные параметры)
                                    </th>
                                    <th>
                                        Оборудование кинозала(Дата установки оборудования)
                                    </th>
                                    <th>
                                        ЗВУКОВОЕ ОБОРУДОВАНИЕ(Наименование зала)
                                    </th>
                                    <th>
                                        ЗВУКОВОЕ ОБОРУДОВАНИЕ(Аналоговое-Производитель)
                                    </th>
                                    <th>
                                        ЗВУКОВОЕ ОБОРУДОВАНИЕ(Аналоговое-Модель)
                                    </th>
                                    <th>
                                        ЗВУКОВОЕ ОБОРУДОВАНИЕ(Цифровое-Производитель)
                                    </th>
                                    <th>
                                        ЗВУКОВОЕ ОБОРУДОВАНИЕ(Цифровое-Модель)
                                    </th>
                                    <th>
                                        Производитель билетного программного обеспечения (ПО)
                                    </th>
                                    <th>
                                        РАЗМЕЩЕНИЕ ДЕМОНСТРАТОРА ФИЛЬМОВ
                                    </th>
                                    <th>
                                        РЕГУЛЯРНОСТЬ КИНОПОКАЗА
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    @include('admin.document_eais._table',['item'=>$document])
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<style>
    .content-wrapper .content .row .col-12{
        max-width: inherit !important;
        width: auto !important;
    }
    .content-wrapper{
        background-color: transparent !important;
    }
</style>
