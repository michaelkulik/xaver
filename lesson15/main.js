$(function(){
    // подсветка заголовка на чёрном фоне
    // $('.note').tooltip();

    // модальное окно при удалении
    // $('#confirm-delete').on('show.bs.modal', function(e) {
    //     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    // });

    // ajax
    $('a.delete').on('click', function(){
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        $('#container').load('example_ajax.php?delete=' + id, function(){
            tr.fadeOut('slow', function(){
                $(this).remove();
            });
        });
    });
});
