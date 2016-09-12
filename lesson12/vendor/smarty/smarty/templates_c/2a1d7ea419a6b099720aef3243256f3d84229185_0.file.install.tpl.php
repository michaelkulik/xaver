<?php
/* Smarty version 3.1.30, created on 2016-09-12 10:16:00
  from "/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/install.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d68060e413b1_06019440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a1d7ea419a6b099720aef3243256f3d84229185' => 
    array (
      0 => '/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/install.tpl',
      1 => 1473675357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57d68060e413b1_06019440 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12 col-lg-8">
            <style>
                label::after {
                    color: red; content: " *";
                }
            </style>
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
                <div class="col-xs-12 alert alert-success" role="alert">
                    <p>Поздравляем! Дамп базы данных сделан успешно, нажмите на кнопку ниже, чтобы перейти на сайт.</p>
                    <a href="index.php" class="btn btn-success">Перейти на сайт</a>
                </div>
            <?php } elseif (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="col-xs-12 alert alert-danger" role="alert">
                    <p>Произошла ошибка при работе с базой данных. Пожалуйста, попытайтесь снова.</p>
                    <a href="install.php" class="btn btn-secondary">Попробовать снова</a>
                </div>
            <?php } else { ?>
                <h4>Установка базы данных</h4>
                <br>
                <form method="post">
                    <div class="form-group row">
                        <label for="server_name" class="col-sm-4 form-control-label">Имя сервера</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="server_name" class="form-control" id="server_name" placeholder="localhost" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 form-control-label">Имя пользователя БД</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="username" class="form-control" id="username" placeholder="имя пользователя" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 form-control-label">Пароль</label>
                        <div class="col-sm-8">
                            <input type="password" required="" name="password" class="form-control" id="password" placeholder="пароль" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="database_name" class="col-sm-4 form-control-label">Имя базы данных</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="database_name" class="form-control" id="database_name" placeholder="имя базы данных" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-sm-offset-9">
                            <button name="submit" class="btn btn-primary">Установить</button>
                        </div>
                    </div>
                </form>
            <?php }?>
        </div>
    </div>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
