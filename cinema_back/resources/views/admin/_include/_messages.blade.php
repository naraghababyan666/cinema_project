@if($errors->any() or session('success') or session('primary') or session('error'))
    @php
        if(session('success'))
        {
            $color = 'success';
        }
        elseif(session('primary'))
        {
            $color = 'primary';
        }
        elseif($errors->any() or session('error'))
        {
            $color = 'danger';
        }
    @endphp
{{--    <div class="container-fluid">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
                <div class="alert alert-default-{{ $color }} w-75 my-0" >
                    <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    @if(session('success'))
                        {!! session()->get('success') !!}
                    @elseif(session('primary'))
                        {!! session()->get('primary') !!}
                    @elseif(session('error'))
                        {!! session()->get('error') !!}
                    @elseif($errors->any())
                        @forelse($errors->all() as $error)
                            {{ $error }}
                        @empty
                            {!! session()->get('error') !!}
                        @endforelse
                    @endif
                </div>
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endif
