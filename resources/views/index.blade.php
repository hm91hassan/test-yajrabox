@extends('layouts.app')

@section('content')

@dump($title);
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {!! $dataTable->table([], true) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')


<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>


{!! $dataTable->scripts() !!}

<script>
    function test() {
        alert('working');
    }
</script>
@endpush