$(document).ready(function() {
    $('logoutEvent').on('click', 'logout-form', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/logout',
            dataType: 'json',
            success: function(response)
            {
                window.location.href = '/logout';
            }
        });
    });
});
