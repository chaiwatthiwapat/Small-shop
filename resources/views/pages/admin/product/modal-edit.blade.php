<section>
    <div wire:ignore.self class="modal modal-lg fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">แก้ไข</h1>
                    <button wire:click="formClear" onclick="backdropRemove()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="updateProduct">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-4">
                                <label for="name">หมวดหมู่สินค้า</label>
                                <select wire:model="category_id" class="form-control">
                                    @forelse ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @empty
                                    @endforelse
                                </select>

                                @error('category_id')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="name">ชื่อสินค้า</label>
                                <input wire:model="name" type="text" class="form-control">

                                @error('name')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label for="price">ราคา</label>
                                <input wire:model="price" type="text" class="form-control">

                                @error('price')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image">ภาพหลัก</label>
                            <input wire:model="image" type="file" class="form-control" accept="image/*">

                            @error('image')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @if($image != '')
                            <img class="mb-3" width="50px" src="{{ $image->temporaryUrl() }}" alt="">
                        @elseif($oldImage != '')
                            <img class="mb-3" width="50px" src="{{ url('storage/product', $oldImage) }}" alt="">
                        @endif

                        <div class="mb-3">
                            <label for="images">ภาพย่อย</label>
                            <input wire:model="images" type="file" class="form-control" multiple accept="image/*">

                            @error('images')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @if($images != [])
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($images as $value)
                                    <img class="mb-3" width="50px" src="{{ $value->temporaryUrl() }}" alt="">
                                @endforeach
                            </div>
                        @elseif($oldImages != [])
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($oldImages as $value)
                                    <img class="mb-3" width="50px" src="{{ url('storage/product-sub', $value) }}" alt="">
                                @endforeach
                            </div>
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
