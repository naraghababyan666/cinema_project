@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2" style="width: max-content; min-width: 80%">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <a href="{{ route('admin.advertisement.create') }}" class="text-primary mr-2">
                                <i class="far fa-plus-square"></i>
                            </a>

                            <span class="font-weight-bold">Рекламные ролики</span>

                            <div class="card-tools">
                                @include('admin._include._card_tools')
                            </div>
                        </div>
                        <div class="card-body">

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
                                        Название зала
                                    </th>
                                    <th>
                                        Имя реклама
                                    </th>
                                    <th>
                                        Длительность
                                    </th>
                                    <th>
                                        Видео ролик
                                    </th>
                                    <th>
                                        Дата добавления
                                    </th>
                                    <th class="text-center w-auto">
                                        <i class="fas fa-cog"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_advertisements as $advertisement)
                                    @include('admin.advertisement._table',['item'=>$advertisement])
                                @endforeach
                                </tbody>
                                <thead>
                                <tr>
                                    <th class="text-center" colspan="8">
                                        Рекламные ролики админа
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admin_advertisements as $advertisement)
                                    @include('admin.advertisement._tableAdmin',['item'=>$advertisement])
                                @endforeach

                                </tbody>
                            </table>
{{--                            <table id="example2" class="table table-bordered table-striped">--}}
{{--                                --}}
{{--                            </table>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
