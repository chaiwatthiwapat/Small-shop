<section id="forget-password" class="position-relative">
    <div class="content w-default d-flex justify-content-center align-items-center">
        @if($status == 'ok')
            <form wire:submit="changePassword" class="rounded">
        @else
            <form wire:submit="checkData" class="rounded">
        @endif
            <h4 class="text-center">ลืมรหัสผ่าน</h4>

            <div class="mb-3">
                <label>อีเมล</label>
                <input wire:model="email" {{ $status == 'ok' ? 'disabled' : '' }} type="email" class="form-control">

                @error('email')
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Key สำหรับเปลี่ยนหรัสผ่าน</label>
                <input wire:model="key" {{ $status == 'ok' ? 'disabled' : '' }} type="text" class="form-control">

                @error('key')
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
            </div>

            @if($status == 'ok')
                <div class="mb-3">
                    <label>รหัสผ่านใหม่</label>
                    <input wire:model="password" type="password" class="form-control input-password">

                    @error('password')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>ยืนยันรหัสผ่านใหม่</label>
                    <input wire:model="password_confirmation" type="password" class="form-control input-password">

                    @error('password')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex align-items-center gap-1 mb-3">
                    <input onchange="viewPassword(event)" type="checkbox" id="view-password" class="mt-1 pointer">
                    <label for="view-password" class="pointer">ดูรหัสผ่าน</label>
                </div>
            @endif

            <div class="mb-3">
                <a wire:navigate href="{{ route('login') }}" class="text-primary">เข้าสู่ระบบ</a>
            </div>

            <div class="text-end">
                <button type="submit" class="button-primary py-2 px-3">ตกลง</button>
            </div>
        </form>
    </div>

    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>

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
            bottom: -100px;
            right: 20%;
            width: 200px;
            height: 200px;
        }

        .circle-2 {
            top: -100px;
            left: 10%;
            width: 300px;
            height: 300px;
        }

        @media (max-width: 768px) {
            .circle {
                display: none;
            }
        }
    </style>
</section>
