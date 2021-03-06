<?php
/* Smarty version 3.1.30, created on 2016-08-21 14:38:57
  from "/var/www/public/xaver/lesson11/vendor/smarty/smarty/templates/install.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57b9bd01f28084_11657776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb8c27f4f27789fe8e0dd31c49507ca016ab00e1' => 
    array (
      0 => '/var/www/public/xaver/lesson11/vendor/smarty/smarty/templates/install.tpl',
      1 => 1471779730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57b9bd01f28084_11657776 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">
            <style>
                label::after {
                    color: red; content: " *";
                }
            </style>
            <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
                <div class="col-xs-12">
                    <p>Поздравляем! Дамп базы данных сделан успешно, нажмите на кнопку ниже, чтобы перейти на сайт.</p>
                    <a href="index.php" class="btn btn-success">Перейти на сайт</a>
                </div>
            <?php } elseif (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="col-xs-12">
                    <p>Произошла ошибка при выполнении дампа базы данных. Пожалуйста, попытайтесь снова.</p>
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
