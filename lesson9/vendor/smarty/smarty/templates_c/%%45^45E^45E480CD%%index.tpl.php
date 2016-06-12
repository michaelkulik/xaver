<?php /* Smarty version 2.6.25-dev, created on 2016-06-12 00:57:00
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'index.tpl', 58, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
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
                                <input type="radio" name="role" value="private" <?php if (isset ( $this->_tpl_vars['ad']['role'] ) && $this->_tpl_vars['ad']['role'] == 'private'): ?> checked="" <?php elseif (empty ( $_GET )): ?> checked="" <?php endif; ?>>
                                Частное лицо
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="role" value="company" <?php if (isset ( $this->_tpl_vars['ad']['role'] ) && $this->_tpl_vars['ad']['role'] == 'company'): ?> checked="" <?php endif; ?>>
                                Компания
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                    <div class="col-sm-8">
                        <input type="text" name="seller_name" class="form-control" id="name" placeholder="Имя" value="<?php if (isset ( $this->_tpl_vars['ad']['seller_name'] )): ?><?php echo $this->_tpl_vars['ad']['seller_name']; ?>
<?php endif; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 form-control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php if (isset ( $this->_tpl_vars['ad']['email'] )): ?><?php echo $this->_tpl_vars['ad']['email']; ?>
<?php endif; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="allow_mails" <?php if (isset ( $this->_tpl_vars['ad']['allow_mails'] ) && $this->_tpl_vars['ad']['allow_mails'] == 'yes'): ?> checked="" <?php endif; ?>> Я не хочу получать вопросы по объявлению по e-mail
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                    <div class="col-sm-8">
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?php if (isset ( $this->_tpl_vars['ad']['phone'] )): ?><?php echo $this->_tpl_vars['ad']['phone']; ?>
<?php endif; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cities" class="col-sm-4 form-control-label">Город</label>
                    <div class="col-sm-8">
                        <select name="city_id" class="form-control" id="cities">
                            <option>-- Выберите город --</option>
                            <option disabled="disabled">-- Города --</option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cities'],'selected' => $this->_tpl_vars['ad']['city_id']), $this);?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control" id="categories">
                            <option>-- Выберите категорию --</option>
                            <?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parent_cat']):
?>
                                <optgroup label="<?php echo $this->_tpl_vars['parent_cat']['0']; ?>
">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['parent_cat']['sub'],'selected' => $this->_tpl_vars['ad']['category_id']), $this);?>

                                </optgroup>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-4 form-control-label">Название объявления</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Название" value="<?php if (isset ( $this->_tpl_vars['ad']['title'] )): ?><?php echo $this->_tpl_vars['ad']['title']; ?>
<?php endif; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-4 form-control-label">Описание объявления</label>
                    <div class="col-sm-8">
                        <textarea name="description" class="form-control" id="description" rows="3"><?php if (isset ( $this->_tpl_vars['ad']['description'] )): ?><?php echo $this->_tpl_vars['ad']['description']; ?>
<?php endif; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-4 form-control-label">Цена</label>
                    <div class="col-sm-3">
                        <input type="number" name="price" class="form-control" id="price" placeholder="0" value="<?php if (isset ( $this->_tpl_vars['ad']['price'] )): ?><?php echo $this->_tpl_vars['ad']['price']; ?>
<?php endif; ?>">
                    </div>
                    <label class="col-sm-2 form-control-label">руб.</label>
                </div>
                <div class="form-group row">
                    <?php if (isset ( $_GET['id'] )): ?>
                    <div class="col-sm-7">
                        <a href="index.php" class="btn btn-secondary">Назад</a>
                    </div>
                    <div class="col-sm-5">
                        <button name="fill" class="btn btn-secondary">Заполнить</button>
                        <button name="submit" class="btn btn-success">Сохранить</button>
                    </div>
                    <?php else: ?>
                    <div class="col-sm-5 col-sm-offset-7">
                        <button name="fill" class="btn btn-secondary">Заполнить</button>
                        <button name="submit" class="btn btn-success">Сохранить</button>
                    </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    <br>
    <?php if (! isset ( $_GET['id'] )): ?>
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
                <?php $_from = $this->_tpl_vars['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ad']):
?>
                    <tr>
                        <td><a href='?id=<?php echo $this->_tpl_vars['ad']['id']; ?>
'><?php echo $this->_tpl_vars['ad']['title']; ?>
</a></td>
                        <td><?php echo $this->_tpl_vars['ad']['price']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['ad']['seller_name']; ?>
</td>
                        <td><a href='#' data-href='?delete=<?php echo $this->_tpl_vars['ad']['id']; ?>
' data-toggle='modal' data-target='#confirm-delete'>Удалить</a></td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="4">Пока объявлений нет.</td></tr>
                <?php endif; unset($_from); ?>
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>