$(document).ready(function () {
    $("#set-age").submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                //TODO - не правильное решение, нужно по другому решить.
                document.location.href = '/admin/index';
            }
        })
    });
});

$('.createUserLink').click(function (e) {
    e.preventDefault();
    $('#createUserForm').toggleClass('hidden-xs-up');
});