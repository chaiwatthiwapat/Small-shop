<section id="forget-password" class="position-relative">
    <div class="content w-default d-flex justify-content-center align-items-center">
        <form>
            <h4 class="text-center">ลืมรหัส่ผ่าน</h4>

            <div class="mb-3">
                <label>อีเมล</label>
                <input type="email" class="form-control">
            </div>

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
