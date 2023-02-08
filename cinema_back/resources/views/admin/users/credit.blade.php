@extends('admin._layout')

@section('content')
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row" id="editor">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <form action="@isset($item){{ route('admin.users.update',['id'=>$item->id]) }}@else{{ route('admin.users.store') }}@endisset" class="was-validated" method="POST" enctype="multipart/form-data">
                        @isset($item) @method('PATCH') @endisset
                        @csrf

                        <div class="card-header">
                            <a href="{{ route('admin.users.index') }}" class="text-primary mr-2">
                                <i class="fas fa-angle-double-left"></i>
                            </a>

                            <span class="font-weight-bold">@isset($item)Редактирование @else Создание @endisset пользователя</span>

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
                                <div class="col-md-4 mb-3">
                                    @include('admin._include.form.input',['name'=>'name', 'data'=>'Имя','label'=>'name','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('name') ?? ''])
                                </div>
                                <div class="col-md-4 mb-3">
                                    @include('admin._include.form.input',['name'=>'email', 'data'=>'E-mail','label'=>'email','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' =>old('email') ?? ''])
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Роль</label>
                                        <select name="role_id" class="form-control select2bs4" style="width: 100%;" required , value="{{$item->role_id ?? ''}}">
                                            <option value="" selected disabled>Сделайте выбор</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if(isset($item) and $item->role_id == $role->id) selected @endif>{{ $role->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    @include('admin._include.form.input',['name'=>'country_code', 'data'=>'телефонный код','label'=>'code','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('country_code') ?? ''])
                                </div>
                                <div class="col-md-4 mb-3">
                                    @include('admin._include.form.input',['name'=>'phone', 'data'=>'номер телефона','label'=>'phone','placeholder'=>'Введите данные','length'=>150,'required'=>true, 'value' => old('phone') ?? ''])
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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('specification');
</script>
@endpush
