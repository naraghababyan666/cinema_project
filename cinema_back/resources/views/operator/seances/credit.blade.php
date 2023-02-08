@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <form action="@isset($item){{ route('operator.seances.update',['id'=>$item->id]) }}@else{{ route('operator.seances.store') }}@endisset" class="was-validated" method="POST" enctype="multipart/form-data">
                            @isset($item) @method('PATCH') @endisset
                            @csrf

                            <div class="card-header">
                                <a href="{{ route('operator.seances.index') }}" class="text-primary mr-2">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>

                                <span class="font-weight-bold">@isset($item)Редактирование @else Создание @endisset фильма</span>

                                <div class="card-tools">
                                    @include('admin._include._card_tools')
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Фильм</label>
                                            <select name="film_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                                <option value="" selected disabled>Сделайте выбор</option>
                                                @foreach($films as $film)
                                                    <option value="{{ $film->id }}" @if(isset($item) and $item->film_id == $film->id) selected @endif>{{ $film->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="form-group">
                                            <label>Кинозал</label>
                                            <select name="hall_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                                <option value="" selected disabled>Сделайте выбор</option>
                                                @foreach(['1','2','3'] as $hall)
                                                    <option value="{{ $hall }}" @if(isset($item) and $item->hall_id == $hall) selected @endif>{{ $hall }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="form-group">
                                            <label>День недели</label>
                                            <select name="day" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                                <option value="" selected disabled>Сделайте выбор</option>
                                                @foreach(['Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье'] as $day)
                                                    <option value="{{ $day }}" @if(isset($item) and $item->day == $day) selected @endif>{{ $day }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        @include('admin._include.form.input',['data'=>'start','type'=>'time','label'=>'Время начала','placeholder'=>'Введите данные','length'=>10,'required'=>true])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        @include('admin._include.form.input',['data'=>'duration_advertising','type'=>'number','label'=>'Рекламный блок, мин.','placeholder'=>'Введите данные','length'=>10,'required'=>true])
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        @include('admin._include.form.input',['data'=>'duration_service','type'=>'number','label'=>'Обслуживание зала, мин.','placeholder'=>'Введите данные','length'=>10,'required'=>true])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input text-dark" name="is_repeat" id="is_repeat" @if(isset($item) and $item->is_repeat == true) checked @endif>
                                            <label class="custom-control-label" for="is_repeat">Повторение</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end">
                                <div class="form-group mr-4">
                                    <select name="status_id" class="form-control" style="width: 100%;" required>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" @if(isset($item) and $item->status_id == $status->id) selected @endif>{{ $status->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
{{--    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace( 'description' );--}}
{{--        CKEDITOR.replace( 'specification' );--}}
{{--    </script>--}}

@endpush
