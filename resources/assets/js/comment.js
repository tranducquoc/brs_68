$(document).ready(function() {
    $('.editEvent').on('click', function () {
        $(this).parents('.form-comment-book').addClass('current');

        var id = $('.current').find('.comment-id').val();
        var comment_content = $('.current').find('.edit_comment').val();

        $.ajax({
            url: $(this).attr('data-url'),
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                content: comment_content,
            },

            success: function(data) {
                $('.current').find('.comment-id').val(data.id);
                $('.current').find('.edit_comment').val(data.content);
                alert(data.id);
            },
         });

        $(this).parents('.form-comment-book').removeClass('current');

    });
});
