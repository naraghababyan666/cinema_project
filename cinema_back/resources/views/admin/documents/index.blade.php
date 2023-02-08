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

                            <span class="font-weight-bold">Документы</span>

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
                                        Тип зала
                                    </th>
                                    <th>
                                        Название юр. лица
                                    </th>
                                    <th>
                                        Название кинотеатра
                                    </th>
                                    <th>
                                        Свидетельство ОГРН текст
                                    </th>
                                    <th>
                                        Свидетельство ОГРН файл
                                    </th>
                                    <th>
                                        Область
                                    </th>
                                    <th>
                                        город
                                    </th>
                                    <th>
                                        Дом
                                    </th>
                                    <th>
                                        Ответственные лица - должность
                                    </th>
                                    <th>
                                        Ответственные лица - фото
                                    </th>
                                    <th>
                                        (Новый зал)  Название кинозала
                                    </th>
                                    <th>
                                        (Новый зал)  Схема или чертеж зала
                                    </th>
                                    <th>
                                         (Новый зал) Звуковой оборудование - инструкция
                                    </th>
                                    <th>
                                         (Новый зал) Звуковой оборудование - фото
                                    </th>
                                    <th>
                                         (Новый зал) Ширина(м) экрана
                                    </th>
                                    <th>
                                         (Новый зал) Длина(м) экрана
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    @include('admin.documents._table',['item'=>$document])
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
    .content-wrapper{
        background-color: transparent !important;
    }
    .content-wrapper .content .row .col-12{
        max-width: inherit !important;
        width: auto !important;
    }
</style>
