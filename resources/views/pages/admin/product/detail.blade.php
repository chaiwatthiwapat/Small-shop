@extends('components.layouts.admin-app')
@section('content')

    <div class="content">
        @livewire('components.product-detail', [$id])
    </div>

@endsection
