<section id="register" class="position-relative">
    <div class="content w-default d-flex justify-content-center align-items-center">
        <form wire:submit="register" class="rounded">
            <h4 class="text-center">สมัครสมาชิก</h4>

            <div class="mb-3">
                <label>ชื่อ</label>
                <input wire:model="name" type="text" class="form-control">

                @error('name')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>อีเมล</label>
                <input wire:model="email" type="email" class="form-control">

                @error('email')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Key สำหรับเปลี่ยนรหัสผ่าน <span class="text-danger">แก้ไขไม่ได้</span></label>
                <input wire:model="key" type="text" class="form-control input-password">

                @error('key')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>รหัสผ่าน</label>
                <input wire:model="password" type="password" class="form-control input-password">

                @error('password')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>ยืนยันรหัสผ่าน</label>
                <input wire:model="password_confirmation" type="password" class="form-control input-password">

                @error('password')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-1">
                    <input onchange="viewPassword(event)" type="checkbox" id="view-password" class="mt-1 pointer">
                    <label for="view-password" class="pointer">ดูรหัสผ่าน</label>
                </div>

                <div>
                    <a wire:navigate href="{{ route('login') }}" class="text-primary">เข้าสู่ระรบบ</a>
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
            top: 300px;
            left: 10%;
            width: 200px;
            height: 200px;
        }

        .circle-2 {
            top: -100px;
            right: 15%;
            width: 300px;
            height: 300px;
        }

        .circle-3 {
            bottom: -100px;
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
