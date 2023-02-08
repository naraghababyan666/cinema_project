@php $id = isset($item) ? $item->id : null; @endphp
<div class="modal fade" id="modal{{ $id }}show" tabindex="-1" role="dialog" aria-labelledby="modal{{ $id }}showLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="@isset($item){{ route('admin.seance_statuses.update',['id'=>$item->id]) }}@else{{ route('admin.seance_statuses.store') }}@endisset" class="was-validated" method="POST" enctype="multipart/form-data">
                @isset($item) @method('PATCH') @endisset
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modal{{ $id }}showLabel">@isset($data)Редактирование @else Создание @endisset статуса сеанса</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    @include('admin._include.form.input',['data'=>'title','label'=>'Название','placeholder'=>'Введите данные','length'=>150,'required'=>true])
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
