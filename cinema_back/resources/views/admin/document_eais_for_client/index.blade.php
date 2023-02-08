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

                            <span class="font-weight-bold">Документы ЕАИС . Контакты клиента</span>

                            <div class="card-tools">
                                @include('admin._include._card_tools')
                            </div>
                        </div>
                        <div class="card-body">
{{--                            @include('admin.document_eais_for_client._filters')--}}

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        №
                                    </th>
                                    <th>
                                        Имя пользователья
                                    </th>
                                    <th>
                                        Город
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Код страны
                                    </th>
                                    <th>
                                        Номер телефона
                                    </th>
                                    <th>
                                        Отправлено
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    @include('admin.document_eais_for_client._table',['item'=>$document])
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
