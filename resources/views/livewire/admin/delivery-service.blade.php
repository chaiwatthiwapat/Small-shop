<section class="bg-white p-4 rounded">
    <div class="d-flex flex-wrap row-gap-3 justify-content-between align-items-center">
        <button onclick="backdropRemove()" type="button" class="button-primary px-3 py-2" data-bs-toggle="modal" data-bs-target="#modal-create">
            บริการจัดส่ง
        </button>

        <div class="w-fit">
            <input wire:model.live="search" type="search" class="form-control" placeholder="ค้นหา">
        </div>
    </div>

    @include('pages.admin.delivery-service.modal-create')
    @include('pages.admin.delivery-service.modal-edit')
    @include('pages.admin.delivery-service.list')
</section>
