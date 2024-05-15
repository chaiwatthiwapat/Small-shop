<section>
    <div class="row row-gap-2" style="margin-inline: -5px !important;">
        <div wire:click="$set('status', 'new')" class="pointer widget col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 px-1">
            <div class="m-0 rounded alert alert-warning">
                <h6>ใหม่</h6>
                <p class="m-0">{{ $new }}</p>
            </div>
        </div>

        <div wire:click="$set('status', 'shipping')" class="pointer widget col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 px-1">
            <div class="m-0 rounded alert alert-primary">
                <h6>จัดส่งแล้ว</h6>
                <p class="m-0">{{ $shipping }}</p>
            </div>
        </div>

        <div wire:click="$set('status', 'success')" class="pointer widget col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 px-1">
            <div class="m-0 rounded alert alert-success">
                <h6>สำเร็จ</h6>
                <p class="m-0">{{ $success }}</p>
            </div>
        </div>

        <div wire:click="$set('status', 'canceled')" class="pointer widget col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 px-1">
            <div class="m-0 rounded alert alert-danger">
                <h6>ยกเลิกแล้ว</h6>
                <p class="m-0">{{ $canceled }}</p>
            </div>
        </div>
    </div>

    <style>
        .widget {
            transition: var(--smoot-300);
        }

        .widget:hover {
            transform: translateY(-5px);
        }
    </style>
</section>
