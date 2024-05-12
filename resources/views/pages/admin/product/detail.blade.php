@extends('components.layouts.app')
@section('content')

    <div class="content">
        @livewire('components.product-detail', [$id])
    </div>

@endsection
