@extends('components.layouts.admin-app')
@section('content')

    <div class="container px-0">
        @livewire('admin.manage-order', ['order_id' => $order_id])
    </div>

@endsection
