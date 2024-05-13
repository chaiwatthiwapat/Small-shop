<section id="login" class="position-relative">
    <div class="content w-default d-flex justify-content-center align-items-center">
        <form wire:submit="login" class="rounded">
            <h4 class="text-center">เข้าสู่ระบบ</h4>

            <div class="mb-3">
                <label>อีเมล</label>
                <input wire:model="email" type="email" class="form-control">

                @error('email')
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>รหัสผ่าน</label>
                <input wire:model="password" type="password" class="form-control input-password">

                @error('password')
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-1 mb-3">
                <input onchange="viewPassword(event)" type="checkbox" id="view-password" class="mt-1 pointer">
                <label for="view-password" class="pointer">ดูรหัสผ่าน</label>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a wire:navigate href="{{ route('register') }}" class="text-primary">สมัครสมาชิก</a>
                </div>

                <div>
                    <a wire:navigate href="{{ route('forget-password') }}" class="text-primary">ลืมรหัสผ่าน</a>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="button-primary py-2 px-3">ตกลง</button>
            </div>
        </form>
    </div>

    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>
    <div class="circle circle-3"></div>


    @if(session()->has('register'))
        <script>
            Swal.fire({
                title: '',
                text: "{{ session('register') }}",
                icon: 'success'
            });
        </script>
    @endif

    @if(session()->has('changePassword'))
        <script>
            Swal.fire({
                title: '',
                text: "{{ session('changePassword') }}",
                icon: 'success'
            });
        </script>
    @endif

    <style>
        form {
            width: 400px;
            background-color: var(--white);
            box-shadow: var(--shadow-primary);
            padding: 20px;
        }

        .circle {
            position: absolute;
            border: 14px solid var(--light-primary);
            border-radius: 50%;
            z-index: -1;
        }

        .circle-1 {
            top: 100px;
            left: 0;
            transform: translateX(-50%);
            width: 400px;
            height: 400px;
        }

        .circle-2 {
            bottom: -150px;
            right: 5%;
            width: 300px;
            height: 300px;
        }

        .circle-3 {
            top: -100px;
            right: 20%;
            width: 200px;
            height: 200px;
        }

        @media (max-width: 768px) {
            .circle {
                display: none;
            }
        }
    </style>

</section>
