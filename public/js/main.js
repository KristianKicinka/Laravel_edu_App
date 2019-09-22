$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

/*
Select2*/


$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});