function notify(message, type) {
    new $.notify({
        type: type,
        message: message
    });
}

$(document).ready(function () {
    $('.send_review').click(function () {
        $(this).attr('disabled', true);
        $.post('/review/new', { _token: $('meta[name="csrf-token"]').attr('content'), id: $('.send_review').data('id'), username: $('#username').val(), feedback: $('#feedback').val() }).then(e => {
            if (e.success) {
                $(this).attr('disabled', false);
                $('.article__feedbacks').prepend('<div class="article__review"><div class="article__review_name">'+e.name+'</div><div class="article__review_text">'+e.review+'</div></div>');
                $('#username').val('');
                $('#feedback').val('');
                notify('The review was successfully left', 'success');
            }
            if (e.error) {
                $(this).attr('disabled', false);
                return notify(e.message, 'error');
            }
        });
    });
});
