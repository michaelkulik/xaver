$(function(){
    // добавление и редактирование объявления
    $('.submitbutton').on('click', function() {
        var buttonpressed = $(this).attr('id');

        if (buttonpressed == 'create') {
            var options = {
                target: '#container_create',  // target element(s) to be updated with server response
                //beforeSubmit: showRequest, // pre-submit callback
                success: function(response){ // post-submit callback
                    var container = $('#container_create');
                    if (response.status == 'success') {
                        $('#lasttr').remove();
                        $('tbody').prepend(response.tr);
                        container.removeClass('alert-danger').addClass('alert-success');
                        $('#container_info_create').text(response.msg);
                        container.fadeIn('slow');
                        setTimeout(function(){
                            container.fadeOut(500);
                        }, 3000);
                    } else {
                        container.removeClass('alert-success').addClass('alert-danger');
                        $('#container_info_create').text(response.msg);
                        container.fadeIn('slow');
                        setTimeout(function(){
                            container.fadeOut(2500);
                        }, 3000);
                    }
                },

                // other available options:
                url: 'server.php?action=create', // override for form's 'action' attribute
                // type: type, // 'get' or 'post', override for form's 'method' attribute
                dataType: 'json', // 'xml', 'script', or 'json' (expected server response type)
                clearForm: false, // clear all form fields after successful submit
                resetForm: true // reset the form after successful submit

                // $.ajax options can be used here too, for example:
                // timeout: 3000
            };
            $('#ajax-form').ajaxForm(options);
        } else {
            var options = {
                target: '#container_delete_edit',  // target element(s) to be updated with server response
                //beforeSubmit: showRequest, // pre-submit callback
                success: function(response){ // post-submit callback
                    var container = $('#container_delete_edit');
                    if (response.status == 'success') {
                        container.removeClass('alert-danger').addClass('alert-success');
                        $('#container_info_delete_edit').text(response.msg);
                        container.fadeIn('slow');
                        setTimeout(function(){
                            container.fadeOut(500);
                        }, 3000);
                        // вставляем только что изменённые данные в поля формы
                        if (response.role == 'private') {
                            $('#role[value=private]').attr('checked', 'checked');
                        } else {
                            $('#role[value=company]').attr('checked', 'checked');
                        }
                        $('#seller_name').val(response.seller_name);
                        $('#email').val(response.email);
                        if (response.allow_mails == 'yes') {
                            $('#allow_mails').attr('checked', 'checked');
                        } else {
                            $('#allow_mails').removeAttr('checked');
                        }
                        $('#phone').val(response.phone);
                        $('#city_id').val(response.city_id);
                        $('#category_id').val(response.category_id);
                        $('#title').val(response.title);
                        $('#description').val(response.description);
                        $('#price').val(response.price);
                    } else {
                        container.removeClass('alert-info alert-success').addClass('alert-danger');
                        $('#container_info_delete_edit').text(response.msg);
                        container.fadeIn('slow');
                        setTimeout(function(){
                            container.fadeOut(2500);
                        }, 3000);
                    }
                },

                // other available options:
                url: 'server.php?action=edit', // override for form's 'action' attribute
                // type: type, // 'get' or 'post', override for form's 'method' attribute
                dataType: 'json', // 'xml', 'script', or 'json' (expected server response type)
                clearForm: false, // clear all form fields after successful submit
                resetForm: true // reset the form after successful submit

                // $.ajax options can be used here too, for example:
                // timeout: 3000
            };
            $('#ajax-form').ajaxForm(options);
        }
    });

    // удаление объявлений с помощью $.getJSON
    $('tbody').on('click', 'button.delete', function(){
        // подготовка нужных переменных
        var tr = $(this).closest('tr');
        var id = $(this).attr('id');
        var give_id = {"id" : id};
        var container = $('#container_delete_edit');
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
                        $('tbody').html(response.last_tr);
                    });
                    setTimeout(function(){
                        emptydb.fadeOut(500, function(){
                            $('table').show();
                            $('tbody').html(response.last_tr);
                        });
                    }, 4000);
                    // выводим информ. сообщение об успешном удалении объявления
                } else {
                    container.removeClass('alert-danger').addClass('alert-info');
                    $('#container_info_delete_edit').text(response.msg);
                    container.fadeIn('slow');
                    setTimeout(function(){
                        container.fadeOut(500);
                    }, 3000);
                }
                // выводим информ. сообщение о неуспешном удалении объявления
            } else {
                // выводим инф. сообщении об успешном удалении объявления
                container.removeClass('alert-info').addClass('alert-danger');
                $('#container_info_delete_edit').text(response.msg);
                container.fadeIn('slow');
                setTimeout(function(){
                    container.fadeOut(1000);
                }, 3000);
            }
        });
    });

    // вставка тестовых данных в поля формы
    $('button[name=fill]').on('click', function(){
        $('#seller_name').val('Николай');
        $('#email').val('nikolai@mail.ru');
        $('#phone').val('+79059051234');
        $('#role[value=private]').attr('checked', 'checked');
        $('#city_id').val(7);
        $('#category_id').val(3);
        $('#title').val('Audi ' + Math.round((Math.random() * 100) + 1));
        $('#description').val('ОТС. Звоните после 18:00.');
        return false;
    });

    // отмена клавиши ENTER для кнопки "Заполнить"
    $(document).bind('keypress', 'button[name=fill]', function (e) {
        if ( e.which == 13 ) return false;
    });
});