@extends('components.layouts.app')
@section('content')

    <div class="w-default row mt-3 px-lg-3 mb-3 px-1">
        <a wire:navigate href="{{ route('product.index') }}" class="button-primary w-fit px-3 py-2">
            ดูสินค้าอื่น
        </a>
    </div>
    @livewire('components.product-detail', [$id])

@endsection
