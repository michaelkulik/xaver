<?php
/* Smarty version 3.1.30, created on 2016-11-26 12:15:41
  from "D:\www\OpenServer\domains\xaver\lesson16\vendor\smarty\smarty\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583952bd3d7a52_12727132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd20a8d8ba0749a5f878aefbe16c9c06ab9fa831d' => 
    array (
      0 => 'D:\\www\\OpenServer\\domains\\xaver\\lesson16\\vendor\\smarty\\smarty\\templates\\index.tpl',
      1 => 1480151739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:table_last_tr.tpl.html' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_583952bd3d7a52_12727132 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'D:\\www\\OpenServer\\domains\\xaver\\lesson16\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <br>
    <div class="row">

        

        <div class="col-xs-12 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Форма добавления / просмотра объявления
                </div>
                <div class="panel-body">
                    <div id="container_create" class="alert alert-success alert-dismissible" style="display: none;" role="alert">
                        <button onclick="$('#container_create').hide(); return false;" type="button" class="close" style="float: right;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div id="container_info_create"></div>
                    </div>
                    <form method="post">
                        <input type="hidden" name="id" id="id" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getId();
}?>">
                        <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Вы</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="role" name="role" value="private" <?php if (isset($_smarty_tpl->tpl_vars['ad']->value) && $_smarty_tpl->tpl_vars['ad']->value->getRole() == 'private') {?> checked="" <?php } elseif (empty($_GET)) {?> checked="" <?php }?>>
                                        Частное лицо
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="role" name="role" value="company" <?php if (isset($_smarty_tpl->tpl_vars['ad']->value) && $_smarty_tpl->tpl_vars['ad']->value->getRole() == 'company') {?> checked="" <?php }?>>
                                        Компания
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                            <div class="col-sm-8">
                                <input type="text" id="seller_name" name="seller_name" class="form-control" placeholder="Имя" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getSeller_name();
}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 form-control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getEmail();
}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="allow_mails" name="allow_mails" <?php if (isset($_smarty_tpl->tpl_vars['ad']->value) && $_smarty_tpl->tpl_vars['ad']->value->getAllow_mails() == 'yes') {?> checked="" <?php }?>> Я не хочу получать вопросы по объявлению по e-mail
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                            <div class="col-sm-8">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Телефон" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getPhone();
}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cities" class="col-sm-4 form-control-label">Город</label>
                            <div class="col-sm-8">
                                <select name="city_id" class="form-control" id="city_id">
                                    <option>-- Выберите город --</option>
                                    <option disabled="disabled">-- Города --</option>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cities']->value,'selected'=>isset($_smarty_tpl->tpl_vars['ad']->value) ? $_smarty_tpl->tpl_vars['ad']->value->getCity_id() : null),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                            <div class="col-sm-8">
                                <select name="category_id" class="form-control" id="category_id">
                                    <option>-- Выберите категорию --</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'parent_cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['parent_cat']->value) {
?>
                                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['parent_cat']->value[0];?>
">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['parent_cat']->value['sub'],'selected'=>isset($_smarty_tpl->tpl_vars['ad']->value) ? $_smarty_tpl->tpl_vars['ad']->value->getCategory_id() : null),$_smarty_tpl);?>

                                        </optgroup>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 form-control-label">Название объявления</label>
                            <div class="col-sm-8">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Название" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getTitle();
}?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 form-control-label">Описание объявления</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" id="description" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getDescription();
}?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 form-control-label">Цена</label>
                            <div class="col-sm-3">
                                <input type="number" name="price" class="form-control" id="price" placeholder="0" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getPrice();
}?>">
                            </div>
                            <label class="col-sm-2 form-control-label">руб.</label>
                        </div>
                        <div class="form-group row">
                            <?php if (isset($_GET['id'])) {?>
                                <div class="col-lg-7" style="display: none;" id="go-home">
                                    <a href="index.php" class="btn btn-default">Вернуться на главную</a>
                                </div>
                                <div class="col-lg-5">
                                    <button name="fill" class="btn btn-default">Заполнить</button>
                                    <button id="edit" class="btn btn-success">Сохранить</button>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-7 col-lg-offset-5">
                                    <button name="fill" class="btn btn-default">Заполнить</button>
                                    <button id="create" class="btn btn-success">Добавить объявление</button>
                                </div>
                            <?php }?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <div class="col-xs-12 col-lg-6">

            <div id="container_delete" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
                <button onclick="$('#container').hide(); return false;" type="button" class="close" style="float: right;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="container_info_delete"></div>
            </div>
            <?php if (!isset($_GET['id'])) {?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Уже опубликованные объявления
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>#</th>
                            <th>Название объявления</th>
                            <th>Цена</th>
                            <th>Имя</th>
                            <th>Действия</th>
                            </thead>
                            <tbody>
                            <div id="emptydb" class="alert alert-warning alert-dismissible" style="display: none;margin-bottom: 0px;" role="alert">
                                <button id="emptydb_button" type="button" class="close" style="float: right;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div>В базе данных больше нет объявлений.</div>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['ads_rows']->value) {?>
                                <?php echo $_smarty_tpl->tpl_vars['ads_rows']->value;?>

                            <?php } else { ?>
                                <?php $_smarty_tpl->_subTemplateRender("file:table_last_tr.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                            <?php }?>
                            </tbody>
                        </table>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            <?php }?>
        </div>

    </div>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/main.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
