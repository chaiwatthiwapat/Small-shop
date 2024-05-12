$(window).on('success', () => success());

function success() {
    Swal.fire({
        title: '',
        text: 'สำเร็จ',
        icon: 'success',
        showConfirmButton: true,
    });
}

function confirmDelete(id, action) {
    Swal.fire({
        title: '',
        text: 'ต้องการลบหรือไม่',
        icon: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: 'red',
        cancelButtonColor: '#999',
        confirmButtonText: 'ลบ',
        cancelButtonText: 'ยกเลิก'
    }).then(result => {
        if(result.isConfirmed) {
            Livewire.dispatch(action, { id: id });
        }
    });
}

