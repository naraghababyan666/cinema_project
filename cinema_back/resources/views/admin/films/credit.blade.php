@extends('admin._layout')

@section('content')
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row" id="editor">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="@isset($item){{ route('admin.films.update',['id'=>$item->id]) }}@else{{ route('admin.films.store') }}@endisset" class="was-validated" method="POST" enctype="multipart/form-data">
                        @isset($item) @method('PUT') @endisset
                        @csrf

                        <div class="card-header">
                            <a href="{{ route('admin.films.index') }}" class="text-primary mr-2">
                                <i class="fas fa-angle-double-left"></i>
                            </a>

                            <span class="font-weight-bold">@isset($item)Редактирование @else Создание @endisset фильма</span>

                            <div class="card-tools">
                                @include('admin._include._card_tools')
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div class="row mb-3">--}}
                            {{-- <div class="col-2">--}}
                            {{-- @include('admin._include.credit_images',['N_Photo'=>1,'addPhoto'=>true])--}}
                            {{-- </div>--}}
                            {{-- </div>--}}

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    @include('admin._include.form.input',['data'=>'title','label'=>'Название','placeholder'=>'Введите данные','length'=>150,'required'=>true])
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Жанры</label>
                                        <select name="genres_id[]" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="genres_id" tabindex="-1" aria-hidden="true" data-placeholder=" Сделайте выбор" multiple required>
                                            @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}" @if(is_array(old('genres_id')) && in_array($genre->id, old('genres_id'))) selected
                                                @elseif(isset($item) && ($item->genre_id == $genre->id)) selected
                                                @endif
                                                >{{ $genre->title }}</option>
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
                                            @if(!old('format_id') || !(isset($item)))
                                            <option value="" selected disabled>Сделайте выбор</option>
                                            @endif
                                            @foreach($formats as $format)
                                            <option value="{{ $format->id }}" @if(old('format_id')) selected @elseif(isset($item) && $item->format_id == $format->id) selected
                                                @endif
                                                >{{ $format->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    @include('admin._include.form.input',['data'=>'duration','type'=>'number','label'=>'Длительность, мин.','placeholder'=>'Введите данные','length'=>3,'required'=>true])
                                </div>
                                <div class="col-md-2 mb-3">
                                    @include('admin._include.form.input',['data'=>'rating','type'=>'text','label'=>'Рейтинг','placeholder'=>'Введите рейтинг','value' => $item->rating, 'max' => 10,'length'=>5,'required'=>true])
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Прокат</label>
                                        <select name="rent_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                            @if(!old('rent_id') || !(isset($item)))
                                                <option value="" selected disabled>Сделайте выбор</option>
                                            @endif
                                            @foreach($rents as $rent)
                                                <option value="{{ $rent->rent }}" @if(old('rent_id')) selected @elseif(isset($item) && $item->rent_id == $rent->id) selected
                                                @endif
                                                >{{ $rent->rent_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                        @include('admin._include.form.input',['data'=>'file','label'=>'Расположение','placeholder'=>'Введите данные','length'=>150,'required'=>true])
                                    </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    @include('admin._include.form.textarea',['data'=>'description','label'=>'Описание','placeholder'=>'Введите данные','length'=>1500,'required'=>true])
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    @include('admin._include.form.image',['data'=>'image','label'=>'Изображение','required'=>true])
                                </div>
                                <div class="col-md mb-3">
                                    @include('admin._include.form.video',['data'=>'file','label'=>'Видео файл','required'=>true])
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <input type="checkbox" name="is_active" data-bootstrap-switch data-off-color="danger" data-on-color="success" @if(!isset($item) or $item->is_active == true) checked @endif >
                            <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            <label for="delete" class="btn btn-danger ml-4">Удалить</label>
                        </div>
                    </form>
                    <form action="{{ route('admin.films.destroy', [ 'id'=> $item->id ]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" style="display: none;" id="delete"></button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
{{-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>--}}
{{-- <script>--}}
{{-- CKEDITOR.replace( 'description' );--}}
{{-- CKEDITOR.replace( 'specification' );--}}
{{-- </script>--}}

@endpush
