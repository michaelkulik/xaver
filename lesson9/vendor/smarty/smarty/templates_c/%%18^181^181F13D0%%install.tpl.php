<?php /* Smarty version 2.6.25-dev, created on 2016-06-13 05:30:53
         compiled from install.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">
            <style>
                label::after {
                    color: red; content: " *";
                }
            </style>
            <?php if (isset ( $this->_tpl_vars['success'] )): ?>
                <div class="col-xs-12">
                    <p>Поздравляем! Дамп базы данных сделан успешно, нажмите на кнопку ниже, чтобы перейти на сайт.</p>
                    <a href="index.php" class="btn btn-success">Перейти на сайт</a>
                </div>
            <?php elseif (isset ( $this->_tpl_vars['error'] )): ?>
                <div class="col-xs-12">
                    <p>Произошла ошибка при выполнении дампа базы данных. Пожалуйста, попытайтесь снова.</p>
                    <a href="install.php" class="btn btn-secondary">Попробовать снова</a>
                </div>
            <?php else: ?>
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
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>