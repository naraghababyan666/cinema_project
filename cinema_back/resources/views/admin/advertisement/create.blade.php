@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <form action="{{ route('admin.advertisement.store') }}" class="was-validated" method="POST" enctype="multipart/form-data">
                            @isset($item) @method('PATCH') @endisset
                            @csrf

                            <div class="card-header">
                                <a href="{{ route('admin.advertisement.index') }}" class="text-primary mr-2">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>

                                <span class="font-weight-bold">@isset($item)Редактирование @else Создание @endisset реклам</span>

                                <div class="card-tools">
                                    @include('admin._include._card_tools')
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        @include('admin._include.form.input',['data'=>'title','type'=>'text','label'=>'Название реклама','placeholder'=>'Введите данные','length'=>30,'required'=>true])
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        @include('admin._include.form.input',['data'=>'duration','type'=>'number','label'=>'Длительность(сек)','placeholder'=>'Введите данные','length'=>3,'required'=>true])
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        @include('admin._include.form.video',['data'=>'file','type'=>'number','label'=>'Видео','placeholder'=>'Введите данные','length'=>10,'required'=>true])
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end">

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
