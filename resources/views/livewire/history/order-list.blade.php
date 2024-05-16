<section>
    <div class="mt-3">
        <div class="cart-items rounded col-12 py-3 pb-5 mb-4">
            <div class="d-flex justify-content-between">
                <h5>ประวัติการสั่งซื้อของคุณ</h5>
                <h5>{{ $orders->count() }} รายการ</h5>
            </div>

            <div>{{ Auth::check() ? Auth::user()->email : '' }}</div>

            <hr class="text-secondary mt-3 mb-4">

            <div class="table-overflow-x overflow-x-scroll rounded ">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="py-2">รหัสคำสั่งซื้อ</th>
                            <th class="py-2">สถานะ</th>
                            <th class="py-2 text-end">จำนวนเงิน</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $value)
                            <tr>
                                <td>{{ $value->order_code }}</td>
                                <td>
                                    <div class="px-2 py-0 w-fit m-0 space-nowrap
                                        alert {{ match($value->status) {
                                            'new' => 'alert-warning',
                                            'shipping' => 'alert-primary',
                                            'success' => 'alert-success',
                                            'canceled' => 'alert-danger',
                                            default => ''
                                        } }}
                                    ">
                                        {{ match($value->status) {
                                            'new' => 'ใหม่',
                                            'shipping' => 'จัดส่งแล้ว',
                                            'success' => 'สำเร็จ',
                                            'canceled' => 'ยกเลิกแล้ว',
                                            default => ''
                                        } }}
                                    </div>
                                </td>
                                <td class="text-end">฿{{ number_format($value->grand_total, 0) }}</td>
                                <td class="text-end">
                                    <a wire:navigate href="{{ route('history.order-detail', $value->id) }}">
                                        <button class="button-primary px-3 py-2 space-nowrap">รายละเอียด</button>
                                    </a>
                                </td>
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

        {{-- {{ $orders->links('vendor.livewire.bootstrap') }} --}}
    </div>
</section>
