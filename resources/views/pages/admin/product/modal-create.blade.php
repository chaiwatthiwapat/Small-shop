<section>
    <div wire:ignore.self class="modal modal-lg fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">เพิ่มสินค้า</h1>
                    <button onclick="backdropRemove()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit="createProduct">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-4">
                                <label for="category_id">หมวดหมู่สินค้า</label>
                                <select wire:model="category_id" class="form-control">
                                    <option value="" hidden selected></option>
                                    @forelse ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @empty @endforelse
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
                            <label for="detail">รายละเอียด</label>
                            <textarea wire:model="detail" rows="4" class="form-control"></textarea>

                            @error('detail')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
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
                        @endif

                        <div class="mb-3">
                            <label for="images">ภาพย่อย</label>
                            <input wire:model="images" type="file" class="form-control" multiple accept="image/*">

                            @error('images')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @if($images != '')
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($images as $value)
                                    <img class="mb-3" width="50px" src="{{ $value->temporaryUrl() }}" alt="">
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
