<section>
    <div wire:ignore.self class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">จัดการ</h1>
                    <button onclick="backdropRemove()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="updateOrder">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="percel_number">หมายเลขติดตามพัสดุ</label>
                            <input wire:model="percel_number" type="text" class="form-control">

                            @error('percel_number')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="mb-1">สถานะ</label>
                            <div>
                                @if($order->status != 'canceled')
                                    <button wire:click="$set('status', 'new')" type="button" class="{{ $status == 'new' ? 'btn btn-success' : 'btn btn-secondary' }}" {{ $order->status != 'new' ? 'disabled' : '' }} {{ $order->status == 'success' ? 'hidden' : '' }}>
                                        ใหม่
                                    </button>
                                    <button wire:click="$set('status', 'shipping')" type="button" class="{{ $status == 'shipping' ? 'btn btn-primary' : 'btn btn-secondary' }}" {{ $order->status == 'success' ? 'disabled' : '' }} {{ $order->status == 'success' ? 'hidden' : '' }}>
                                        จัดส่งแล้ว
                                    </button>
                                    <button wire:click="$set('status', 'success')" type="button" class="{{ $status == 'success' ? 'btn btn-success' : 'btn btn-secondary' }}" {{ $order->status == 'success' ? 'disabled' : '' }}>
                                        {{ $order->status == 'success' ? 'สำเร็จแล้ว' : 'สำเร็จ' }}
                                    </button>
                                @endif
                                <button wire:click="$set('status', 'canceled')" type="button" class="{{ $status == 'canceled' ? 'btn btn-danger' : 'btn btn-secondary' }}" {{ $order->status == 'canceled' ? 'disabled' : '' }} {{ $order->status == 'success' ? 'hidden' : '' }}>
                                    {{ $order->status == 'canceled' ? 'ยกเลิกแล้ว' : 'ยกเลิก' }}
                                </button>
                            </div>

                            @error('status')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex gap-1 align-items-center">
                            <span wire:loading class="text-primary text-end">รอสักครู่...</span>

                            @if($order->status == 'canceled' || $order->status == 'success')
                                <button type="button" class="button-primary px-3 py-2 no-drop">บันทึก</button>
                            @else
                                <button wire:loading.attr="disabled" type="submit" class="button-primary px-3 py-2">บันทึก</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
