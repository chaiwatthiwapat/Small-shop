<section>
    <div wire:ignore.self class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">แก้ไขช่องทางติดต่อ</h1>
                    <button onclick="backdropRemove()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="updateContact">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="facebook">Facebook</label>
                            <input wire:model="facebook" type="url" class="form-control">

                            @error('facebook')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="youtube">Youtube</label>
                            <input wire:model="youtube" type="url" class="form-control">

                            @error('youtube')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ig">IG</label>
                            <input wire:model="ig" type="url" class="form-control">

                            @error('ig')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="x">X</label>
                            <input wire:model="x" type="url" class="form-control">

                            @error('x')
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
