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

                            <span class="font-weight-bold">Кинозалы</span>

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
                                        Id Документа
                                    </th>
                                    <th>
                                        Пользователь
                                    </th>
                                    <th>
                                        Название кинотеатра
                                    </th>
                                    <th>
                                        Название кинозала
                                    </th>
                                    <th>
                                        Район
                                    </th>
                                    <th>
                                        Город
                                    </th>
                                    <th>
                                        Дом
                                    </th>
                                    <th>
                                        Количество рядов
                                    </th>
                                    <th>
                                        Количество мест в ряду
                                    </th>
                                    <th>
                                       Звуковое оборудование
                                    </th>
                                    <th>
                                        Ширина(м) экрана
                                    </th>
                                    <th>
                                        Длина(м) экрана
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($halls as $hall)
                                    @include('admin.halls._table',['item'=>$hall])
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
</style>
