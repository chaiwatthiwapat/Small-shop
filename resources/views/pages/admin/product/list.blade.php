<section>
    <div class="table-overflow-x overflow-x-scroll bg-white rounded mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>ภาพ</th>
                    <th>หมวดหมู่</th>
                    <th>ชื่อสินค้า</th>
                    <th class="text-end">ราคา</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $value)
                    <tr>
                        <td>
                            <img width="50px" src="{{ url('storage/product', $value->image) }}" alt="">
                        </td>
                        <td>{{ $value->category->name }}</td>
                        <td>{{ $value->name }}</td>
                        <td class="text-end">{{ number_format($value->price, 0) }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <div>
                                    <a wire:navigate href="{{ route('admin.product.detail', $value->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="pointer text-info bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </div>

                                <div>
                                    <svg wire:click="editProduct({{ $value->id }})" onclick="backdropRemove()" data-bs-toggle="modal" data-bs-target="#modal-edit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pointer color-primary bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </div>

                                <div>
                                    <svg onclick="confirmDelete({{ $value->id }}, 'deleteProduct')" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pointer text-danger bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="d-flex justify-content-center align-items-center py-3">
                                <span class="alert alert-primary m-0 w-fit py-1 px-3 d-block">ไม่พบข้อมูล</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->links('vendor.livewire.bootstrap') }}
    </div>
</section>
