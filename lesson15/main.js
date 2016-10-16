$(function(){
    $('.note').tooltip();
    // модальное окно при удалении
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    // ajax

});
