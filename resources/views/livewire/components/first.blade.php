<section id="first">
    <div class="content row align-items-center w-default">
        <div class="col-lg-6">
            <div class="col-lg-10 d-flex flex-column gap-3">
                <h1>{{ $first->title }}</h1>

                <p>
                    {{ $first->label }}
                </p>

                <div class="mb-4">
                    @if(request()->is('admin/*'))
                        <button class="button-primary px-5 py-2 no-drop">ดูสินค้า</button>
                    @else
                        <a wire:navigate href="{{ route('product.index') }}">
                            <button class="button-primary px-5 py-2">ดูสินค้า</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img width="100%" src="{{ url('storage/first', $first->image) }}" alt="">
        </div>
    </div>
</section>

