<section id="product-detail">
    <div class="row w-default">
        <div class="px-lg-3 px-md-2 px-1 col-lg-6 col-md-6 mb-4">
            <div class="bg-white shadow-primary p-lg-5 p-md-4 p-sm-4 p-4 rounded ">
                <img id="main-image" class="col-12" src="{{ url('storage/product', $product->image) }}" alt="">

                <div class="row p-2 more-item row-gap-2">
                    <div class="px-1 col-lg-2 col-md-2 col-2 d-flex">
                        <div onclick="selectedImage('{{ url('storage/product', $product->image) }}')" class="p-1 d-flex border rounded pointer">
                            <img class="col-12" src="{{ url('storage/product', $product->image) }}" alt="">
                        </div>
                    </div>

                    @forelse ($product['subimage'] as $value)
                        <div class="px-1 col-lg-2 col-md-2 col-2 d-flex">
                            <div onclick="selectedImage('{{ url('storage/product-sub', $value) }}')" class="p-1 d-flex border rounded pointer">
                                <img class="col-12" src="{{ url('storage/product-sub', $value) }}" alt="">
                            </div>
                        </div>
                    @empty @endforelse
                </div>
            </div>
        </div>

        <div class="px-lg-3 px-md-2 px-1 col-lg-6 col-md-6 mb-5">
            <div class="detail p-lg-5 p-md-4 p-sm-4 p-4 shadow-primary bg-white rounded">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->detail }}</p>

                <hr class="text-primary my-4">

                <div class="d-flex flex-wrap justify-content-between align-items-center row-gap-3">
                    <div class="d-flex gap-2">
                        ฿
                        <strong class="text-primary">{{ number_format($product->price, 0) }}</strong>
                    </div>

                    @if(request()->is('admin*'))
                        <button disabled class="button-primary px-3 py-2 no-drop">เพิ่มลงตะกร้า</button>
                    @else
                        <button wire:click="addCart({{ $product->id }})" wire:loading.attr="disabled" class="button-primary px-3 py-2">
                            {{ $buttonAddCart }}
                        </button>
                    @endif
                </div>

                @if($buttonAddCart != 'เพิ่มลงตะกร้า')
                    <div class="text-end mt-3">
                        <a wire:navigate href="{{ route('shopping-cart') }}" class="text-primary">ดูตระกร้า</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function selectedImage(image) {
            $('#main-image').attr('src', image)
        }
    </script>


</section>
