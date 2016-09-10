<?php
/* Smarty version 3.1.30, created on 2016-09-10 04:04:51
  from "/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d38663964ea2_48719569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '549fcc08091f57b3cd2ec26c933e127b0f2e569f' => 
    array (
      0 => '/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/index.tpl',
      1 => 1473480294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57d38663964ea2_48719569 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/public/xaver/lesson12/vendor/smarty/smarty/libs/plugins/function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">
            <form method="post">
                
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Вы</label>
                    <div class="col-sm-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="role" value="private" <?php if (isset($_smarty_tpl->tpl_vars['ad']->value) && $_smarty_tpl->tpl_vars['ad']->value->getRole() == 'private') {?> checked="" <?php } elseif (empty($_GET)) {?> checked="" <?php }?>>
                                Частное лицо
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="role" value="company" <?php if (isset($_smarty_tpl->tpl_vars['ad']->value) && $_smarty_tpl->tpl_vars['ad']->value->getRole() == 'company') {?> checked="" <?php }?>>
                                Компания
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                    <div class="col-sm-8">
                        <input type="text" name="seller_name" class="form-control" id="name" placeholder="Имя" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getSeller_name();
}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 form-control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getEmail();
}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="allow_mails" <?php if (isset($_smarty_tpl->tpl_vars['ad']->value) && $_smarty_tpl->tpl_vars['ad']->value->getAllow_mails() == 'yes') {?> checked="" <?php }?>> Я не хочу получать вопросы по объявлению по e-mail
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                    <div class="col-sm-8">
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
echo $_smarty_tpl->tpl_vars['ad']->value->getPhone();
}?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cities" class="col-sm-4 form-control-label">Город</label>
                    <div class="col-sm-8">
                        <select name="city_id" class="form-control" id="cities">
                            <option>-- Выберите город --</option>
                            <option disabled="disabled">-- Города --</option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cities']->value,'selected'=>isset($_smarty_tpl->tpl_vars['ad']->value) ? $_smarty_tpl->tpl_vars['ad']->value->getCity_id() : null),$_smarty_tpl);?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control" id="categories">
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
                        <input type="text" name="title" class="form-control" id="title" placeholder="Название" value="<?php if (isset($_smarty_tpl->tpl_vars['ad']->value)) {
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
                        <div class="col-sm-7">
                            <a href="index.php" class="btn btn-secondary">Назад</a>
                        </div>
                        <div class="col-sm-5">
                            <button name="fill" class="btn btn-secondary">Заполнить</button>
                            <button name="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    <?php } else { ?>
                        <div class="col-sm-5 col-sm-offset-7">
                            <button name="fill" class="btn btn-secondary">Заполнить</button>
                            <button name="submit" class="btn btn-success">Добавить</button>
                        </div>
                    <?php }?>
                </div>
            </form>
        </div>
    </div>
    <br>
    <?php if (!isset($_GET['id'])) {?>
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-lg-offset-2">
                <h4>Уже опубликованные объявления</h4>
                <table class="table">
                    <tr>
                        <th>Название объявления</th>
                        <th>Цена</th>
                        <th>Имя</th>
                        <th>Действия</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ads']->value, 'ad');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->value) {
?>
                        <tr>
                            <td><a href='?id=<?php echo $_smarty_tpl->tpl_vars['ad']->value->getId();?>
'><?php echo $_smarty_tpl->tpl_vars['ad']->value->getTitle();?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ad']->value->getPrice();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ad']->value->getSeller_name();?>
</td>
                            <td><a href='#' data-href='?delete=<?php echo $_smarty_tpl->tpl_vars['ad']->value->getId();?>
' data-toggle='modal' data-target='#confirm-delete'>Удалить</a></td>
                        </tr>
                        <?php
}
} else {
?>

                        <tr><td colspan="4">Пока объявлений нет.</td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
    <?php }?>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
