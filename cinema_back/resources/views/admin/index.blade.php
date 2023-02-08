@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2" style="width: fit-content;">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
