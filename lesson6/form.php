<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">
            <form method="post">
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Вы</label>
                    <div class="col-sm-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="private" value="option1" <?php echo $checked = (isset($ad['private']) && $ad['private'] == 'option1') ? 'checked=""' : ''; ?>>
                                Частное лицо
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="private" value="option2" <?php echo $checked = (isset($ad['private']) && $ad['private'] == 'option2') ? 'checked=""' : ''; ?>>
                                Компания
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                    <div class="col-sm-8">
                        <input type="text" name="seller_name" class="form-control" id="name" placeholder="Имя" value="<?php echo $value = (isset($ad['seller_name'])) ? $ad['seller_name'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 form-control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $value = (isset($ad['email'])) ? $ad['email'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="allow_mails" <?php echo $checked = (isset($ad['allow_mails'])) ? 'checked=""' : ''; ?>> Я не хочу получать вопросы по объявлению по e-mail
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                    <div class="col-sm-8">
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?php echo $value = (isset($ad['phone'])) ? $ad['phone'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cities" class="col-sm-4 form-control-label">Город</label>
                    <div class="col-sm-8">
                        <select name="location_id" class="form-control" id="cities">
                            <option>-- Выберите город --</option>
                            <option disabled="disabled">-- Города --</option>
                            <?php
                            if (isset($ad['location_id'])) {
                                show_cities($ad['location_id']);
                            } else {
                                show_cities();
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control" id="categories">
                            <option>-- Выберите категорию --</option>
                            <?php
                            if (isset($ad['category_id'])) {
                                show_categories($ad['category_id']);
                            } else {
                                show_categories();
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-4 form-control-label">Название объявления</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Название" value="<?php echo $value = (isset($ad['title'])) ? $ad['title'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-4 form-control-label">Описание объявления</label>
                    <div class="col-sm-8">
                        <textarea name="description" class="form-control" id="description" rows="3"><?php echo $value = (isset($ad['description'])) ? $ad['description'] : ''; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-4 form-control-label">Цена</label>
                    <div class="col-sm-3">
                        <input type="text" name="price" class="form-control" id="price" placeholder="0" value="<?php echo $value = (isset($ad['price'])) ? $ad['price'] : ''; ?>">
                    </div>
                    <label class="col-sm-2 form-control-label">руб.</label>
                </div>
                <?php if (!isset($ad)): ?>
                    <div class="form-group row">
                        <div class="col-sm-3 col-sm-offset-9">
                            <button type="submit" class="btn btn-primary">Опубликовать</button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="form-group row">
                        <a href="index.php" class="btn btn-secondary">Назад</a>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <br>
<?php if (!isset($_GET['id'])): ?>
    <div class="row">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">
            <h4>Уже опубликованные объявления</h4>
            <table class="table">
                <tr>
                    <th>Название объявления</th>
                    <th>Цена</th>
                    <th>Имя</th>
                    <th>&nbsp;</th>
                </tr>
                <?php if(!empty($_SESSION)) {show_ads_list(); ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4">Пока объявлений нет.</td>
                    </tr>
                <?php } ?>
            </table>
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Удаление объявления
                        </div>
                        <div class="modal-body">
                            Вы уверены?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                            <a class="btn btn-danger btn-ok">Удалить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
</body>
</html>
