<section class="bg-white p-4 rounded">
    @include('pages.admin.order.modal-manage')


    <div class="mb-3">
        <a wire:navigate href="{{ route('admin.order.index') }}">
            <button class="button-danger px-3 py-2">กลับ</button>
        </a>

        <button onclick="backdropRemove()" class="button-primary px-3 py-2" data-bs-toggle="modal" data-bs-target="#modal-edit">
            จัดการ
        </button>
    </div>

    <div class="row row-gap-3" style="margin-inline: -5px !important;">
        <div class="col-xl-3 col-md-4 col-sm-6 col-12 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">รหัสคำสั่งซื้อ</h6>
                <p class="m-0">{{ $order->order_code }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-6 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">ชื่อผู้รับ</h6>
                <p class="m-0">{{ $order->name }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-6 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">เบอร์โทร</h6>
                <p class="m-0">{{ $order->phone }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-6 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">สถานะ</h6>
                <p class="m-0 {{ $order->status == 'canceled' ? 'text-danger' : '' }}">
                    {{ match($order->status) {
                        'new' => 'ใหม่',
                        'shipping' => 'จัดส่งแล้ว',
                        'success' => 'สำเร็จ',
                        'canceled' => 'ยกเลิกแล้ว',
                    } }}
                </p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-6 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">ช่องทางชำระเงิน</h6>
                <p class="m-0">{{ $order->payment_method }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-6 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">บริการจัดส่ง</h6>
                <p class="m-0">{{ $order->delivery->name }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-6 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">ค่าส่ง</h6>
                <p class="m-0">฿{{ number_format($order->delivery->cost, 0) }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6 col-12 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">หมายเลขติดตามพัสดุ</h6>
                <p class="m-0">
                    @if($order->percel_number != NULL)
                        {{ $order->percel_number }}
                    @elseif($order->status == 'canceled')
                        <span class="text-danger">ยกเลิกแล้ว</span>
                    @else
                        รอดำเนินการ
                    @endif
                </p>
            </div>
        </div>

        <div class="px-1 col-lx-9 col-md-9">
            <div class="bg-white shadow-primary rounded px-3 py-4">
                <h6 class="color-primary">ที่อยู่ผู้รับ</h6>
                <p class="m-0">{{ $order->address }}</p>
            </div>
        </div>

        <div class="col-xl-3 col-md-3 px-1">
            <div class="shadow-primary rounded px-3 py-4 bg-white">
                <h6 class="color-primary">รวมทั้งสิ้น</h6>
                <p class="m-0">฿{{ number_format($order->grand_total, 0) }}</p>
            </div>
        </div>

        <div class="mt-3">
            <table>
                <thead>
                    <tr>
                        <th class="py-2">สินค้า</th>
                        <th class="py-2">จำนวน</th>
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
                            </td>
                            <td>{{ $value->quantity }}</td>
                            <td class="text-end">฿{{ number_format($value->unit_price, 0) }}</td>
                            <td class="text-end">฿{{ number_format($value->total_amount, 0) }}</td>
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
        </div>
    </div>


    <script>
        function confirmCancelOrder(id, action) {
            Swal.fire({
                title: '',
                text: 'ยกเลิกคำสั่งซื้อนี้หรือไม่',
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#999',
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ไม่ใช่'
            }).then(result => {
                if(result.isConfirmed) {
                    Livewire.dispatch(action, { id: id });
                }
            });
        }
    </script>


    <style>
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
