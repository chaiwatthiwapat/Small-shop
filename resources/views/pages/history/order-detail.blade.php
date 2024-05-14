@extends('components.layouts.app')
@section('content')

    <div class="bg-white">
        <div class="py-3 w-default">
            @livewire('history.order-detail', ['order_id' => $order_id])
        </div>
    </div>

@endsection
