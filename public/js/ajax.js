$(document).ready(function(){
    $('#company').change(function () {
        $.get(
            '/ajax/users',
            {company: $(this).val()},
            function (data) {
                $('#user').html(data);
            }
        )
    })
});