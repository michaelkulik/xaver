$(function(){
    // модальное окно при удалении
    // $('#confirm-delete').on('show.bs.modal', function(e) {
    //     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    // });

    // удаление с помощью ajax
    $('a.delete').on('click', function(){
        var tr = $(this).closest('tr');
        var id = $(this).attr('id');

        var test = {"id":id};

        $.getJSON('server.php?action=delete',
            test,
            function(response){
                var container = $('#container');
                if (response.status == 'success') {
                    container.removeClass('alert-danger').addClass('alert-info');
                    $('#container_info').text(response.msg);
                    container.show(); // у меня почему-то с функцией fadeIn() работает как-то коряво, не так как должен работать fadeIn(). Поэтому я сделал просто show()
                    setTimeout(function(){
                        container.fadeOut(500);
                    }, 3000);
                    tr.remove();
                    if ($('tbody tr').html() === undefined) {
                        $('thead').hide();
                        $('#emptydb').show();
                        setTimeout(function(){
                            $('#emptydb').fadeOut(500, function(){
                                $('thead').show();
                                $('tbody').html('<tr><td colspan="5">Пока объявлений нет.</td></tr>');
                            });
                        }, 3000);
                    }
                } else {
                    container.removeClass('alert-info').addClass('alert-danger');
                    $('#container_info').text(response.msg);
                    container.show();
                    setTimeout(function(){
                        $('#container').fadeOut(1000);
                    }, 3000);
                }
        });

        /*
        // эта функция определяет базовые настройки ajax-а для всех запросов, которые будут выполнены когда-либо после этой функции (то есть для множества функций $.ajax() )
        // эта функция работает с $.get(), $.getJSON, $.post(), $.ajax(), исключение - $('selector').load()
        $.ajaxSetup({
            type:"POST",
            timeout:5000,
            dataType:"json", // может быть html, xml
        });

        $(document).bind('ajaxStart ajaxStop ajaxSend ajaxSuccess ajaxError ajaxComplete', function(event){
            console.log(event);
        });

        $.ajax({
            url: "server.php?action=delete",
            global: true, // ставится, чтобы возбуждались глобальные события
            data: test,
            success: function(response){ // локальное событие
                console.log('success', response);
            },
            error: function(response){
                console.log('error' ,response);
            },
            complete: function(response){
                console.log('complete' ,response);
            }
        });*/

        /*$.post('server.php?action=delete',
         test,
         function(response){
         var container = $('#container');
         if (response.status == 'success') {
             container.removeClass('alert-danger').addClass('alert-info');
             $('#container_info').text(response.msg);
             container.show();
             setTimeout(function(){
                container.fadeOut(500);
             }, 3000);
             tr.fadeOut('slow', function(){
                 $(this).remove();
             });
             if ($('tbody tr').html() === undefined) {
                $('tbody').html('<tr><td colspan="5">Пока объявлений нет.</td></tr>');
             }
         } else {
             container.removeClass('alert-info').addClass('alert-danger');
             $('#container_info').text(response.msg);
             container.show();
             setTimeout(function(){
                container.fadeOut(2500);
             }, 3000);
         }
         }, 'json');*/

        // $.get('server.php?action=delete',
        //     test,
        //     // чтобы поглядеть ответ с сервера нужно в функции ниже воспользоваться параметром
        //     function(response){
        //         console.log(response);
        //         // alert(response); // либо так для примера
        //         tr.fadeOut('1000', function(){
        //             $(this).remove();
        //             if ($('tbody tr').html() === undefined) {
        //                 $('tbody').html('<tr><td colspan="5">Пока объявлений нет.</td></tr>');
        //             }
        //         });
        //     });
    });
});
