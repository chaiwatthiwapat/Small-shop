<section>
    <div wire:ignore.self class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">แก้ไข</h1>
                    <button wire:click="closeModalFirst" onclick="backdropRemove()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="updateFirst">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title">หัวข้อ</label>
                            <input wire:model="title" type="text" class="form-control">

                            @error('title')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
 
                        <div class="mb-3">
                            <label for="label">คำอธิบาย</label>
                            <textarea wire:model="label" rows="4" class="form-control"></textarea>

                            @error('label')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image">ภาพ</label>
                            <input wire:model="image" type="file" class="form-control" accept="image/*">

                            @error('image')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @if($image != '')
                            <img class="mb-3" width="200px" src="{{ $image->temporaryUrl() }}" alt="">
                        @elseif($oldImage != '')
                            <img class="mb-3" width="200px" src="{{ url('storage/first', $oldImage) }}" alt="">
                        @endif
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
