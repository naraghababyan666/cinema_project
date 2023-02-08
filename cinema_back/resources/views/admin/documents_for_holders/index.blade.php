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
                                        Тип документа
                                    </th>
                                    <th>
                                        Название/ФИО
                                    </th>
                                    <th>
                                        Свидетельство ОГРН/пасспорт
                                    </th>
                                    <th>
                                         Дата/время
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    @include('admin.documents_for_holders._table',['item'=>$document])
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
