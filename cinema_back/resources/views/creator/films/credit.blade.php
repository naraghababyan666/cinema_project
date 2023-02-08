@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <form action="@isset($item){{ route("creator.films.update",['id'=>$item->id]) }}@else{{ route("creator.films.store") }}@endisset" class="was-validated" method="POST" enctype="multipart/form-data">
                            @isset($item) @method('PATCH') @endisset
                            @csrf

                            <div class="card-header">
                                <a href="{{ route("creator.films.index") }}" class="text-primary mr-2">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>

                                <span class="font-weight-bold">@isset($item)Редактирование @else Создание @endisset фильма</span>

                                <div class="card-tools">
                                    @include('admin._include._card_tools')
                                </div>
                            </div>
                            <div class="card-body">
{{--                                <div class="row mb-3">--}}
{{--                                    <div class="col-2">--}}
{{--                                        @include('admin._include.credit_images',['N_Photo'=>1,'addPhoto'=>true])--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        @include('admin._include.form.input',['data'=>'title','label'=>'Название','placeholder'=>'Введите данные','length'=>150,'required'=>true])
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label>Жанры</label>
                                            <select name="genres_id[]" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="genres_id" tabindex="-1" aria-hidden="true" data-placeholder=" Сделайте выбор" multiple required>
                                                @foreach($genres as $genre)
                                                    <option value="{{ $genre->id }}" @if(isset($item) and $item->genre_id == $genre->id) selected @endif>{{ $genre->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Формат</label>
                                            <select name="format_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                                <option value="" selected disabled>Сделайте выбор</option>
                                                @foreach($formats as $format)
                                                    <option value="{{ $format->id }}" @if(isset($item) and $item->format_id == $format->id) selected @endif>{{ $format->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        @include('admin._include.form.input',['data'=>'duration','type'=>'number','label'=>'Длительность, мин.','placeholder'=>'Введите данные','length'=>3,'required'=>true])
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        @include('admin._include.form.input',['data'=>'kdm','label'=>'KDM','placeholder'=>'Введите данные','length'=>150,'required'=>true])
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        @include('admin._include.form.input',['data'=>'file','label'=>'Расположение','placeholder'=>'Введите данные','length'=>150,'required'=>true])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md mb-3">
                                        @include('admin._include.form.textarea',['data'=>'description','label'=>'Описание','placeholder'=>'Введите данные','length'=>1500,'required'=>true])
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end">
                                <input type="checkbox" name="is_active" data-bootstrap-switch data-off-color="danger" data-on-color="success" @if(!isset($item) or $item->is_active == true) checked @endif >
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
