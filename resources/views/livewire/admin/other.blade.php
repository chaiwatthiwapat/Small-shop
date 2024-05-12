<section>
    <div class="bg-white p-4 rounded mb-4">
        <button wire:click="editFirst" onclick="backdropRemove()" class="button-primary px-3 py-2" data-bs-toggle="modal" data-bs-target="#modal-edit">แก้ไข</button>

        @livewire('components.first')
        @include('pages.admin.other.modal-edit')
    </div>
</section>
