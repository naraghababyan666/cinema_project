@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2" style="width: 100%">
        <section class="content" style="width: 100%;">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
{{--                            <a href="{{ route('admin.request.create') }}" class="text-primary mr-2">--}}
{{--                                <i class="far fa-plus-square"></i>--}}
{{--                            </a>--}}

                            <span class="font-weight-bold">Отчеты</span>

{{--                            <div class="card-tools">--}}
{{--                                @include('admin._include._card_tools')--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            №
                                        </th>
                                        <th>
                                            E-mail
                                        </th>
                                        <th>
                                            Имя фильма
                                        </th>
                                        <th>
                                            Пункт
                                        </th>
                                        <th>
                                            Дата добавления
                                        </th>
{{--                                        <th class="text-center w-auto">--}}
{{--                                            <i class="fas fa-cog"></i>--}}
{{--                                        </th>--}}
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach($requests as $request)
                                    @include('admin.request._table',['item'=>$request])
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
