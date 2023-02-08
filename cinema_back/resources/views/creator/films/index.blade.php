@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <a href="{{ route('creator.films.create') }}" class="text-primary mr-2">
                                <i class="far fa-plus-square"></i>
                            </a>

                            <span class="font-weight-bold">Фильмы</span>

                            <div class="card-tools">
                                @include('admin._include._card_tools')
                            </div>
                        </div>
                        <div class="card-body">
                            @include('creator.films._filters')

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            №
                                        </th>
                                        <th>
                                            Название
                                        </th>
                                        <th>
                                            Жанры
                                        </th>
                                        <th>
                                            Формат
                                        </th>
                                        <th>
                                            Статус
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
                                    @foreach($films as $film)
                                        @include('creator.films._table',['item'=>$film])
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
