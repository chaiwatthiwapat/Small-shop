<section id="product-latest">
    <div class="row w-default">
        <div class="mb-4">
            @include('livewire.components.filter')
        </div>

        <div class="row m-0 p-0">
            @forelse ($products as $value)
                <a wire:navigate href="{{ route('product.detail', $value->id) }}" class="d-block col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6 mb-4">
                    <div class="item shadow-primary rounded p-3">
                        <img width="100%" src="{{ url('storage/product', $value->image) }}" alt="">

                        <div class="d-flex flex-column">
                            <h5 class="m-0 mb-1 h5-sm">{{ $value->name }}</h5>
                            <p class="m-0 mb-1 value-detail d-md-block d-none">{{ $value->detail }}</p>
                            <p class="m-0 mb-1 d-md-block d-none">
                                <span class="text-danger me-1">{{ number_format($value->price, 0) }}</span>฿
                            </p>
                        </div>
                    </div>
                </a> 
            @empty
                <div class="d-flex justify-content-center mt-3">
                    <span class="d-block alert alert-primary px-3 py-2">ไม่พบข้อมูล</span>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        #product-latest .item {
            transition: var(--smoot-300);
        }

        #product-latest .item:hover {
            transform: scale(1.02);
        }

        .value-detail {
            max-height: 50px;
            height: auto;
            overflow-y: hidden;
        }

        @media (max-width: 768px) {
            .h5-sm {
                font-size: 12px !important;
            }
        }
    </style>
</section>
