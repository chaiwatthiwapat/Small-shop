<section id="product-sample">
    <div class="content row px-0 w-default">
        <div class="mb-3">
            <h5 class="text-center">ตัวอย่างสินค้าของเรา</h5>
            <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis, sunt.</p>
        </div>

        <div class="row m-0">
            @forelse ($products as $value)
                <a wire:navigate href="{{ route('product.detail', $value->id) }}" class="d-block rounded col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                    <div class="item p-3 bg-white rounded">
                        <img width="100%" src="{{ url('storage/product', $value->image) }}" alt="">

                        <div class="d-flex flex-column">
                            <h5 class="m-0 mb-1 h5-sm">{{ $value->name }}</h5>
                            <p class="m-0 mb-1 value-detail d-md-block d-none">{{ $value->detail }}</p>
                            <p class="m-0 mb-1 d-md-block d-none">
                                ฿
                                <span class="text-danger me-1">{{ number_format($value->price, 0) }}</span>
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
        #product-sample {
            background-color: var(--light-primary);
        }

        #product-sample .item {
            transition: var(--smoot-300);
        }

        #product-sample .item:hover {
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
