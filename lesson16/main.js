$(function(){
    // модальное окно при удалении
    // $('#confirm-delete').on('show.bs.modal', function(e) {
    //     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    // });

    // удаление объявлений с помощью $.getJSON
    $('a.delete').on('click', function(){
        // подготовка нужных переменных
        var tr = $(this).closest('tr');
        var id = $(this).attr('id');
        var give_id = {"id" : id};
        var container = $('#container');
        var emptydb = $('#emptydb');

        $.getJSON('server.php?action=delete', give_id, function(response){
            if (response.status == 'success') {
                // удаляем строчку объявления в таблице
                tr.fadeOut(300, function(){
                    $(this).remove();
                });
                // проверяем, пусто ли в таблице базы данных с объявлениями
                if (response.row == 'empty') {
                    // выводим информ. сообщение о том, что больше объявлений нет
                    $('table').hide();
                    emptydb.show();
                    // если нажать "закрыть" на информ. сообщении, то есть принудительно закрыть
                    $('#emptydb_button').on('click', function(){
                        emptydb.hide();
                        $('table').show();
                        $('tbody').html('<tr><td colspan="5">Пока объявлений нет.</td></tr>');
                    });
                    setTimeout(function(){
                        emptydb.fadeOut(500, function(){
                            $('table').show();
                            $('tbody').html('<tr><td colspan="5">Пока объявлений нет.</td></tr>');
                        });
                    }, 4000);
                    // выводим информ. сообщение об успешном удалении объявления
                } else {
                    container.removeClass('alert-danger').addClass('alert-info');
                    $('#container_info').text(response.msg);
                    container.show(); // у меня почему-то с функцией fadeIn() работает как-то коряво, не так как должен работать fadeIn(). Поэтому я сделал просто show()
                    setTimeout(function(){
                        container.fadeOut(500);
                    }, 3000);
                }
                // выводим информ. сообщение о неуспешном удалении объявления
            } else {
                // выводим инф. сообщении об успешном удалении объявления
                container.removeClass('alert-info').addClass('alert-danger');
                $('#container_info').text(response.msg);
                container.show();
                setTimeout(function(){
                    $('#container').fadeOut(1000);
                }, 3000);
            }
        });
    });

    // создание нового объявления
    $('#create').on('click', function(){
        // объявление нужных переменных


        $.post('server.php?action=create', function(response){
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
        }, 'json');
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
