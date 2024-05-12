<section>
    <div wire:ignore.self class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">แก้ไขบริการจัดส่ง</h1>
                    <button wire:click="formClear" onclick="backdropRemove()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="updateDeliveryService">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">ชื่อบริการจัดส่ง</label>
                            <input wire:model="name" type="text" class="form-control">

                            @error('name')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name">ค่าส่ง</label>
                            <input wire:model="cost" type="text" class="form-control">

                            @error('cost')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex gap-1 align-items-center">
                            <span wire:loading class="text-primary text-end">รอสักครู่...</span>
                            <button wire:loading.attr="disabled" type="submit" class="button-primary px-3 py-2">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
