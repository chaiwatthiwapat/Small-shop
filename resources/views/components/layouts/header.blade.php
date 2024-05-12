<section class="border-bottom">
    <nav id="admin-nav" class="px-3 d-flex align-items-center justify-content-between">
        <div onclick="toggleSidebar()" class="d-flex align-items-center gap-2 pointer">
            <svg id="icon-toggle-sidebar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-secondary pointer bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>

            <span class="text-secondary">ซ่อน/โชว์</span>
        </div>

        <div>
            <a href="{{ route('logout') }}" class="text-danger">ออกจากระบบ</a>
        </div>
    </nav>

    <style>
        #admin-nav {
            height: 60px;
        }
    </style>
</section>
