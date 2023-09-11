$(document).ready(function() {
    $('.select-filter').on('change', function() {
        $.get('students/filter', $('form').serialize(), function(res) {
            $('#students').html(res);
        });
    });
});