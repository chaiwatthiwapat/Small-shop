<section>
    <div class="mb-3">
        @include('pages.admin.order.widget')
    </div>

    <div class="bg-white p-4 rounded">

        <div class="d-flex flex-wrap row-gap-3 justify-content-between align-items-baseline">
            <h6>
                คำสั่งซื้อ
            </h6>

            <div class="w-fit">
                <input wire:model.live="search" type="search" class="form-control" placeholder="รหัสคำสั่งซื้อ">
            </div>
        </div>

        @include('pages.admin.order.list')
    </div>
</section>

