$(function(){
    // модальное окно при удалении
    // $('#confirm-delete').on('show.bs.modal', function(e) {
    //     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    // });

    // удаление с помощью ajax
    $('a.delete').on('click', function(){
        var tr = $(this).closest('tr');
        var id = $(this).attr('id');
        $('#container').load('server.php?action=delete&id=' + id, function(){ // что здесь можно взамен селектора #container поставить?
            tr.fadeOut('1000', function(){
                $(this).remove();
                if ($('tbody tr').html() === undefined) {
                    $('tbody').html('<tr><td colspan="5">Пока объявлений нет.</td></tr>');
                }
            });
        });
    });
});
