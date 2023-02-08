@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
{{--                            <a href="{{ route('admin.seances.create') }}" class="text-primary mr-2">--}}
{{--                                <i class="far fa-plus-square"></i>--}}
{{--                            </a>--}}

                            <span class="font-weight-bold">Процент</span>

                            <div class="card-tools">
                                @include('admin._include._card_tools')
                            </div>
                        </div>
                        <form action="{{route('admin.make_percent.update', ['id' => 1, 'make_percent' => 'percent']) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body" style="display: flex; align-items: center">
                                <div class="col-md-8 ">
                                    Процент - {{$percents[0]->percent}}%
                                </div>
                                <div class="col-md-4 " style="display: flex; align-items: center">
                                    @include('admin._include.form.input',['data'=>'percent','type'=>'number','placeholder'=>'Введите процент','length'=>3, 'max' => 100,'required'=>true])
                                    <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
