$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

/*
Select2*/


$(document).ready(function() {
    $('.js-example-placeholder-multiple').select2({
        placeholder: {
            id: '-1', // the value of the option
            text: 'Choose'
        }
    });
});


$(".js-example-templating").select2({

});


