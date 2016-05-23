$(function () {
    $('.send-comment').click(function () {
        var messageBlock = $('.comment-message');

        $.post('add-comment', {
            message: messageBlock.val(),
            order_id: messageBlock.data('order-id')
        }).done(function (data) {
            messageBlock.val('');
            $('.comments-block').append(data);
        });

    });
});


