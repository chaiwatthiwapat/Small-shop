function backdropRemove() {
    $('.modal-backdrop').not(':first').remove();
}

function viewPassword(event) {
    if(event.target.checked) {
        $('.input-password').attr('type', 'text');
    }
    else {
        $('.input-password').attr('type', 'password');
    }
}

function toggleSidebar() {
    $('#sidebar').toggleClass('sidebar-show')
}

$(window).on('modal-create-hide', function() {
    $('#modal-create').modal('hide');
    $('.modal-backdrop').remove();
})

$(window).on('modal-edit-hide', function() {
    $('#modal-edit').modal('hide');
    $('.modal-backdrop').remove();
})





