@extends('components.layouts.app')
@section('content')

    <div class="bg-white">
        <div class="py-3 w-default">
            @livewire('history.order-list')
        </div>
    </div>

    @if(session()->has('success'))
        <script>
            Swal.fire({
                title: '',
                text: "{{ session('success') }}",
                icon: 'success',
            });
        </script>
    @endif

@endsection
