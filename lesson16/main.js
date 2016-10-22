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
        var container = $('#container_delete');
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
                            $('tbody').html('<tr id="lasttr"><td colspan="5">Пока объявлений нет.</td></tr>');
                        });
                    }, 4000);
                    // выводим информ. сообщение об успешном удалении объявления
                } else {
                    container.removeClass('alert-danger').addClass('alert-info');
                    $('#container_info_delete').text(response.msg);
                    container.fadeIn('slow');
                    setTimeout(function(){
                        container.fadeOut(500);
                    }, 3000);
                }
                // выводим информ. сообщение о неуспешном удалении объявления
            } else {
                // выводим инф. сообщении об успешном удалении объявления
                container.removeClass('alert-info').addClass('alert-danger');
                $('#container_info_delete').text(response.msg);
                container.fadeIn('slow');
                setTimeout(function(){
                    container.fadeOut(1000);
                }, 3000);
            }
        });
    });

    // создание нового объявления
    $('#create').on('click', function(){
        // объявление нужных переменных
        var container = $('#container_create');

        // значения из полей формы
        var id = $('#id').val();
        var role = $('#role:checked').val();
        var seller_name = $('#seller_name').val();
        var email = $('#email').val();
        var allow_mails = $('#allow_mails:checked').val();
        var phone = $('#phone').val();
        var city_id = $('#city_id :selected').val();
        var category_id = $('#category_id :selected').val();
        var title = $('#title').val();
        var description = $('#description').val();
        var price = $('#price').val();

        var data = {
            "id":id,
            "role":role,
            "seller_name":seller_name,
            "email":email,
            "allow_mails":allow_mails,
            "phone":phone,
            "city_id":city_id,
            "category_id":category_id,
            "title":title,
            "description":description,
            "price":price
        };

        $.post('server.php?action=create', data, function(response){
            if (response.status == 'success') {
                $('#lasttr').remove();
                $('tbody').prepend('<tr>'
                    + '<td>' + response.id + '</td>'
                    + '<td  style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">' + response.title + '</td>'
                    + '<td>' + response.price + '</td>'
                    + '<td style="max-width: 80px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">' + response.seller_name + '</td>'
                    + '<td>'
                        + '<a href="?id=' + response.id + '" title="Просмотреть | Редактировать" class="btn btn-info">'
                            + '<i class="glyphicon glyphicon-pencil"></i>'
                        + '</a>'
                        + '<a id="' + response.id + '" title="Удалить" class="delete btn btn-danger">'
                            + '<i class="glyphicon glyphicon-trash"></i>'
                        + '</a>'
                    + '</td>'
                    + '</tr>').fadeIn('slow');
                container.removeClass('alert-danger').addClass('alert-success');
                $('#container_info_create').text(response.msg);
                container.fadeIn('slow');
                // setTimeout(function(){
                //     container.fadeOut(500);
                // }, 3000);
            } else {
                container.removeClass('alert-info').addClass('alert-danger');
                $('#container_info_create').text(response.msg);
                container.fadeIn('slow');
                // console.log(response.msg);
                // setTimeout(function(){
                //     container.fadeOut(2500);
                // }, 3000);
            }
        }, 'json');
    return false;
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
