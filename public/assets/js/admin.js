function notify(message, type) {
    new $.notify({
        type: type,
        message: message
    });
}

$(document).ready(function () {
    $('.article__delete').click(function () {
        $(this).attr('disabled', true);
        $.post('/admin/article/delete/'+$(this).data('id'), { _token: $('meta[name="csrf-token"]').attr('content')}).then(e => {
            if (e.success) {
                $(this).attr('disabled', false);
                $('.articles__card[data-id="'+$(this).data('id')+'"]').remove();
                notify('Success delete', 'success');
            }
            if (e.error) {
                $(this).attr('disabled', false);
                return notify(e.message, 'error');
            }
        });
    });
});
