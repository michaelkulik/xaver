{include file="header.tpl"}

<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-xs-12 col-lg-8">
            <style>
                label::after {ldelim}
                    color: red; content: " *";
                {rdelim}
            </style>
            {if isset($success)}
                <div class="col-xs-12 alert alert-success" role="alert">
                    <p>Поздравляем! Дамп базы данных сделан успешно, нажмите на кнопку ниже, чтобы перейти на сайт.</p>
                    <a href="index.php" class="btn btn-success">Перейти на сайт</a>
                </div>
            {elseif isset($error)}
                <div class="col-xs-12 alert alert-danger" role="alert">
                    <p>Произошла ошибка при работе с базой данных. Пожалуйста, попытайтесь снова.</p>
                    <a href="install.php" class="btn btn-secondary">Попробовать снова</a>
                </div>
            {else}
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
                        <div class="col-sm-3 col-sm-offset-9">
                            <button name="submit" class="btn btn-primary">Установить</button>
                        </div>
                    </div>
                </form>
            {/if}
        </div>
    </div>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

{include file="footer.tpl"}