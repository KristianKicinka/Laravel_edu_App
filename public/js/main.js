$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

/*
Select2*/


$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select users",
        allowClear: true,
        theme: "classic",
        width: "resolve"
    });
});