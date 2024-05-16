<section>
    <div class="rounded shadow-primarya d-flex gap-2 justify-content-sm-end justify-content-center align-items-center">
        <label for="search-product" class="filter-view rounded d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="color-secondary bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            <input wire:model.live="search" id="search-product" type="search" class="input-search" placeholder="ค้นหา">
        </label>

        <label onclick="categoryToggle()" for="filter" class="filter-view pointer rounded position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="color-primary bi bi-sliders2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5M12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8m9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5m1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
            </svg>

            <div class="category bg-white rounded">
                <div wire:click="$set('category_id', '')" class="{{ $category_id == '' ? 'text-primary' : '' }} category-items px-3 py-2 mt-2">ทั้งหมด</div>

                @forelse ($categories as $value)
                    <div wire:click="$set('category_id', {{ $value->id }})" class="{{ $category_id == $value->id ? 'text-primary' : '' }} mb-2 category-items px-3 py-2">{{ $value->name }}</div>
                @empty
                    <div>ไม่พบข้อมูล</div>
                @endforelse
            </div>
        </label>
    </div>

    <script>
        function categoryToggle() {
            $('.category').toggleClass('category-show');
        }
    </script>

    <style>
        .filter-view {
            background-color: var(--light-primary);
            padding: 10px 20px;
        }

        .filter-view input::placeholder {
            color: var(--secondary);
        }

        .input-search {
            color: var(--primary);
            outline: none;
            border: none;
            background-color: transparent;
        }

        .category {
            position: absolute;
            right: 0;
            top: 80%;
            height: auto;
            min-width: 220px;
            border: 1px solid var(--light-primary);

            visibility: hidden;
            opacity: 0;
            z-index: 100;
            transition: var(--smoot-300);
        }

        .category-show {
            visibility: visible !important;
            opacity: 1 !important;
            top: 110% !important;
        }

        .category-items:hover {
            background: var(--light-primary) !important;
            color: var(--black) !important;
        }
    </style>
</section>
