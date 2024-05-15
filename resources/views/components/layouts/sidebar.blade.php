<section id="sidebar">
    <aside class="p-3">
        <div>
            <img width="100px" src="{{ url('storage/logo', 'shop-no-bg.png') }}" alt="">
        </div>

        <hr class="text-primary">

        <a wire:navigate href="{{ route('admin.index') }}" class="{{ Route::is('admin.index') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            หน้าแรก
        </a>

        <a wire:navigate href="{{ route('admin.order.index') }}" class="{{ request()->is('admin/order*') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            คำสั่งซื้อ
        </a>

        <a wire:navigate href="{{ route('admin.product.index') }}" class="{{ request()->is('admin/product*') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            สินค้า
        </a>

        <a wire:navigate href="{{ route('admin.category.index') }}" class="{{ request()->is('admin/category*') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            หมวดหมู่
        </a>

        <a wire:navigate href="{{ route('admin.delivery-service.index') }}" class="{{ request()->is('admin/delivery-service*') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            บริการจัดส่ง
        </a>

        <a wire:navigate href="{{ route('admin.contact.index') }}" class="{{ request()->is('admin/contact*') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            ช่องทางติดต่อ
        </a>

        <a wire:navigate href="{{ route('admin.other.index') }}" class="{{ request()->is('admin/other*') ? 'sidebar-active' : '' }} d-block sidebar-menu mb-1">
            อื่น ๆ
        </a>
    </aside>

    <script>
        if($(window).width() < 992){
            $('#sidebar').addClass('sidebar-show');
        }
    </script>

    <style>
        #sidebar {
            transition: var(--smoot-300);
            z-index: 10;
        }

        #sidebar aside {
            min-width: 250px;
            width: 250px;
            background-color: var(--white);
            min-height: 100vh;
            height: auto;
        }

        .sidebar-show {
            margin-left: -251px;
        }

        #sidebar .sidebar-menu {
            border-radius: 4px;
            padding: 12px;
            transition: var(--smoot-100);
        }

        #sidebar .sidebar-menu:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        #sidebar .sidebar-active {
            background-color: var(--light-primary);
        }

        @media (max-width: 992px) {
            #sidebar {
                position: fixed;
                left: 0;
                top: 61px;
                box-shadow: var(--shadow-primary);
            }
        }
    </style>
</section>
