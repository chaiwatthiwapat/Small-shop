<section id="shopping-cart">
    <div class="content row w-default align-items-start">
        <div class="px-1 col-lg-7 col-xl-8">
            <div class="cart-items rounded col-12 py-3 pb-5 mb-4">
                <div class="d-flex justify-content-between">
                    <h5>ตระกร้าสินค้า</h5>
                    <h5>{{ $items->count() }} รายการ</h5>
                </div>

                <hr class="text-primary mt-3 mb-4">

                <table>
                    <thead>
                        <tr>
                            <th class="py-2">สินค้า</th>
                            <th class="text-center py-2">จำนวน</th>
                            <th class="text-end py-2">ราคา</th>
                            <th class="text-end py-2">รวม</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($items as $value)
                            <tr>
                                <td class="py-3">
                                    <a wire:navigate href="{{ route('product.detail', $value->product->id) }}">
                                        <img width="100px" src="{{ url('storage/product', $value->product->image) }}" alt="">
                                    </a>

                                    <svg wire:click="deleteFromCart({{ $value->id }})" wire:loading.attr="disabled" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger pointer ms-1 bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-baseline gap-1">
                                        <button wire:click="changeQty({{ $value->id }}, '-')" class="button-qty fs-4">-</button>
                                        <span class="alert alert-primary py-0 px-2">{{ $value->quantity }}</span>
                                        <button wire:click="changeQty({{ $value->id }}, '+')" class="button-qty fs-4">+</button>
                                    </div>
                                </td>
                                <td class="text-end">฿{{ number_format($value->product->price, 0) }}</td>
                                <td class="text-end">฿{{ number_format($value->product->price * $value->quantity, 0) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-4 text-center" colspan="4">
                                    <div class="alert alert-primary px-2 py-1">ไม่พบข้อมูล</div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                <a wire:navigate href="{{ route('product.index') }}" class="text-primary d-block mt-3 w-fit">ดูสินค้าเพิ่ม</a>
            </div>
        </div>

        <div class="px-1 col-lg-5 col-xl-4">
            <div class="col-12 summary rounded py-3 pb-5">
                <form wire:submit="confirmOrder">
                    <div class="d-flex justify-content-between">
                        <h5>สรุป</h5>
                    </div>

                    <hr class="text-primary mt-3 mb-4">

                    <div class="d-flex justify-content-between py-2">
                        <h6>รวม</h6>
                        <h6>฿{{ number_format($total, 0) }}</h6>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-lg-12 col-md-6 col-sm-6">
                            <label class="mb-2">เลือกบริการจัดส่ง</label>
                            <select wire:model.change="deliveryId" class="form-control">
                                <option value="" hidden selected>-- เลือก --</option>

                                @forelse ($deliveryService as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }} - ฿{{ number_format($value->cost, 0) }}</option>
                                @empty @endforelse
                            </select>

                            @error('deliveryId')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 col-12">
                            <label>ที่อยู่ผู้รับ</label>
                            <textarea wire:model="address" rows="3" class="form-control"></textarea>

                            @error('deliveryId')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 col-lg-12 col-md-6 col-sm-6">
                            <label>ชื่อผู้รับ</label>
                            <input wire:model="name" type="text" class="form-control">

                            @error('name')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 col-lg-12 col-md-6 col-sm-6">
                            <label>เบอร์ผู้รับ</label>
                            <input wire:model="phone" type="text" class="form-control">

                            @error('phone')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 col-lg-12 col-md-6 col-sm-6">
                            <label>ช่องทางชำระเงิน</label>
                            <input wire:model="paymentMethod" disabled type="text" class="form-control">
                        </div>
                    </div>

                    <hr class="text-primary my-3">

                    <div>
                        <div class="d-flex justify-content-between">
                            <h6>รวมทั้งสิ้น</h6>
                            <h6>฿{{ number_format($grandTotal, 0) }}</h6>
                        </div>
                    </div>

                    <div>
                        @if($items->count() < 1)
                            <button type="button" class="button-primary px-3 py-2 w-100 no-drop">ไม่มีสินค้า</button>
                        @elseif(Auth::check() && Auth::user()->usertype == 'admin')
                            <button type="button" class="button-primary px-3 py-2 w-100 no-drop">กรุณาใช้บัญชี "สมาชิก"</button>
                        @elseif(Auth::check() && Auth::user()->usertype == 'member')
                            <button type="submit" class="button-primary px-3 py-2 w-100">ยืนยันคำสั่งซื้อ</button>
                        @else
                            <div>
                                <a wire:navigate href="{{ route('login') }}">
                                    <button type="button" class="button-primary px-3 py-2 w-100">เข้าสู่ระบบก่อนซื้อ</button>
                                </a>
                                <div class="text-danger">*กรุณาเข้าสู่ระบบก่อน</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .cart-items {
            background-color: var(--white);
            box-shadow: var(--shadow-primary);
            padding: 0 50px;
        }

        .button-qty {
            border-radius: 50%;
            border: none;
            background-color: transparent;
            color: var(--primary);
        }

        .summary {
            background-color: var(--white);
            box-shadow: var(--shadow-primary);
            padding: 0 50px;
        }

        @media (max-width: 578px) {
            table * {
                font-size: 12px;
            }

            table td img {
                width: 50px;
            }

            .cart-items, .summary {
                padding: 0 20px;
            }
        }
    </style>
</section>



