<?php
/* Smarty version 3.1.30, created on 2016-10-25 16:39:18
  from "D:\www\OpenServer\domains\xaver\lesson16\vendor\smarty\smarty\templates\install.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580f6086a08a48_76251097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6b5f5cba44e20d5e28091c86b0f5d4e64357009' => 
    array (
      0 => 'D:\\www\\OpenServer\\domains\\xaver\\lesson16\\vendor\\smarty\\smarty\\templates\\install.tpl',
      1 => 1476781703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_580f6086a08a48_76251097 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="alert alert-success" role="alert">
                    <p>Поздравляем! Дамп базы данных сделан успешно, нажмите на кнопку ниже, чтобы начать пользоваться сайтом.</p>
                    <br>
                    <a href="index.php" class="btn btn-success">Перейти на сайт</a>
                </div>
            <?php } elseif (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="alert alert-danger" role="alert">
                    <p>Произошла ошибка при работе с базой данных. Пожалуйста, попытайтесь снова.</p>
                    <a href="install.php" class="btn btn-secondary">Попробовать снова</a>
                    <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
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
                            <input type="password" name="password" class="form-control" id="password" placeholder="пароль" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="database_name" class="col-sm-4 form-control-label">Имя базы данных</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="database_name" class="form-control" id="database_name" placeholder="имя базы данных" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 col-sm-offset-10">
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
