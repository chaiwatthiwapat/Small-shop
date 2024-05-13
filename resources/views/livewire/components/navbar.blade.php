<header id="header">
    <nav id="nav" class="position-relative w-default p-0">
        <a wire:navigate href="{{ route('index') }}" class="d-block">
            <img width="140px" src="{{ url('storage', 'logo/shop-no-bg.png') }}" alt="">
        </a>

        <ul class="navbar-menu">
            <li>
                <a wire:navigate href="{{ route('index') }}" class="{{ request()->is('/') ? 'text-primary' : '' }}">หน้าแรก</a>
            </li>

            <li>
                <a wire:navigate href="{{ route('product.index') }}" class="{{ request()->is('product*') ? 'text-primary' : '' }}">สินค้า</a>
            </li>

            <li>
                <a wire:navigate href="{{ route('shopping-cart') }}">
                    <div class="position-relative w-fit">
                        @if($countCart > 0)
                            <span class="text-danger">{{ $countCart }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="circle-red bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                            </svg>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-bag-check {{ request()->is('shopping-cart*') ? 'text-primary' : '' }}" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                        </svg>
                    </div>
                </a>
            </li>

            @if(Auth::check())
                <li>
                    <a wire:navigate href="{{ route('history') }}" class="{{ request()->is('history*') ? 'text-primary' : '' }}">ประวัติการซื้อ</a>
                </li>

                <li>
                    <a wire:navigate href="{{ route('logout') }}" class="text-danger">ออกจากระบบ</a>
                </li>
            @else
                <li>
                    <a wire:navigate href="{{ route('login') }}" class="{{ request()->is('auth*') ? 'text-primary' : '' }}">เข้าสู่ระบบ/สมัครสมาชิก</a>
                </li>
            @endif
        </ul>

        <div class="icon-toggle-menu position-relative">
            @if($countCart > 0)
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="events-none circle-red bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
            @endif

            <svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>

            <svg id="icon-x" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg d-none" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
            </svg>
        </div>
    </nav>


    <script>
        $('#icon-menu').click(function() {
            $('#icon-menu').addClass('d-none');
            $('#icon-x').removeClass('d-none');
            $('.navbar-menu').addClass('navbar-menu-show');
        })

        $('#icon-x').click(function() {
            $('#icon-menu').removeClass('d-none');
            $('#icon-x').addClass('d-none');
            $('.navbar-menu').removeClass('navbar-menu-show');
        })

        window.onscroll = () => navbarSticky();

        function navbarSticky() {
            const point = 300;
            if (document.body.scrollTop > point || document.documentElement.scrollTop > point) {
                $('#header').addClass('sticky-top shadow-sm');
            }
            else {
                $('#header').removeClass('sticky-top shadow-sm');
            }
        }
    </script>

    <style>
        #header {
            height: 80px;
            display: flex;
            align-items: center;
            background-color: var(--light-primary);
        }

        #nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sticky-top {
            position: fixed;
            left: 0;
            width: 100%;
            transition: var(--smoot-300);
            animation: animationNav var(--smoot-300);
        }

        .circle-red {
            position: absolute;
            top: 5px;
            right: -2px;
            color: var(--danger) !important;
        }

        @keyframes animationNav {
            from {
                top: -10px;
            }
            to {
                top: 0;
            }
        }

        .navbar-menu {
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .navbar-menu li a {
            display: block;
            padding: 5px 0;
            transition: var(--smoot-300);
        }

        .navbar-menu li a:hover {
            color: var(--primary);
        }

        .icon-toggle-menu {
            display: none;
        }

        .icon-toggle-menu svg {
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .navbar-menu {
                background-color: var(--white);
                position: absolute;
                width: 100%;
                left: 0;
                top: calc(100% - 10px);
                box-shadow: var(--shadow-primary);
                padding: 20px;
                visibility: hidden;
                opacity: 0;
                display: flex;
                flex-direction: column;
                gap: 5px;
                transition: var(--smoot-300);
                z-index: 10;
            }

            .navbar-menu-show {
                top: calc(100% + 10px);
                visibility: visible;
                opacity: 1;
            }

            .icon-toggle-menu {
                display: block;
            }
        }
    </style>
</header>




