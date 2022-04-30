// php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider" pour personnaliser
// CONFIGURATION FLASH MESSAGE
$('#flash-overlay-modal').modal();
// $('div.alert').not('.alert-important').delay(6000).fadeOut(600);

// $('body').click(function(e) {
//     if(!$('body').hasClass('sidebar-collapse')) {
//         $('body').addClass('sidebar-collapse');
//     }
// });
 //Ajax form message
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

if ($(".select").html() !== undefined) {
    $('.select').select2();
}
