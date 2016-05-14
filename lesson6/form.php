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
    <style>
        input:not(#form_submit) {float: right;} textarea {margin: 20px 0; float: right;} .fortextarea {margin: 20px 0;} select {margin-left: 40px;}
    </style>
    <div class="row">
        <div class="col-lg-8">
            <form method="post" class="">
                <div class="form-row-indented">
                    <label class="form-label-radio">
                        <input <?php if($private == 1) echo 'checked=""'; ?> type="radio" value="1" name="private">Частное лицо
                    </label>
                    <label class="form-label-radio">
                        <input <?php if($private === '0') echo 'checked=""'; ?> type="radio" value="0" name="private">Компания
                    </label>
                </div>
                <div class="form-row">
                    <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
                    <input type="text" maxlength="40" class="form-input-text" value="<?php echo $seller_name; ?>" name="seller_name" id="fld_seller_name">
                </div>
                <div class="form-row">
                    <label for="fld_email" class="form-label">Электронная почта</label>
                    <input type="email" class="form-input-text" value="<?php echo $email; ?>" name="email" id="fld_email">
                </div>
                <div class="form-row-indented">
                    <label style="margin: 10px 0;" for="allow_mails">
                        <input style="margin: 5px 0 0 20px" <?php if ($allow_mails == 1) echo 'checked=""'; ?> type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
                        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label>
                </div>
                <div class="form-row">
                    <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
                    <input type="text" class="form-input-text" value="<?php echo $phone; ?>" name="phone" id="fld_phone">
                </div>
                <div id="f_location_id" class="form-row form-row-required">
                    <label for="region" class="form-label">Город</label>
                    <?php show_cities($cities, $location_id); ?>
                </div>
                <div class="form-row">
                    <label for="fld_category_id" class="form-label">Категория</label>
                    <?php show_categories($categories, $category_id); ?>
                </div>
                <div id="f_title" class="form-row f_title">
                    <label for="fld_title" class="form-label">Название объявления</label>
                    <input type="text" maxlength="50" class="form-input-text-long" value="<?php echo $title; ?>" name="title" id="fld_title">
                </div>
                <div class="form-row">
                    <label for="fld_description" class="fortextarea" id="js-description-label">Описание объявления</label>
                    <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea"><?php echo $description; ?></textarea>
                    <div style="clear: both"></div>
                </div>
                <div id="price_rw" class="form-row rl">
                    <label id="price_lbl" for="fld_price" class="form-label">Цена</label>
                    <input type="text" maxlength="9" class="form-input-text-short" value="<?php echo $price; ?>" name="price" id="fld_price">
                </div>
                <?php if (empty($title)): ?>
                <div>
                    <input id="form_submit" value="Готово" type="submit">
                </div>
                <?php endif; ?>
                <a href="index.php">Назад</a>
            </form>
        </div>
    </div>
    <?php if (empty($title)) show_ads_list(); ?>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>
