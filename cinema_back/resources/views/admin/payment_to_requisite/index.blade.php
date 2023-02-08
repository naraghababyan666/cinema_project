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

                            <span class="font-weight-bold">Оплата по реквизитам</span>

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
                                        Название организации
                                    </th>
                                    <th>
                                        Название банка
                                    </th>
                                    <th>
                                        Расчетный счет
                                    </th>
                                    <th>
                                        Корреспондентский счет
                                    </th>
                                    <th>
                                        ОГРН
                                    </th>
                                    <th>
                                        ИНН
                                    </th>
                                    <th>
                                        КПП
                                    </th>
                                    <th>
                                        БИК
                                    </th>
                                    <th>
                                        Доступно к выводу
                                    </th>
                                    <th>
                                        Сумма к выводу
                                    </th>
                                    <th class="text-center w-auto">
                                        Отправлено
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    @include('admin.payment_to_requisite._table',['item'=>$payment])
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
