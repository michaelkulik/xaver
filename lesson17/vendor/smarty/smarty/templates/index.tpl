{include file="header.tpl"}

<div class="container">
    <br>
    <div class="row">

        {*Первая колонка*}

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
                    <form id="ajax-form" method="post">
                        <input type="hidden" name="id" id="id" value="{if isset($ad)}{$ad->getId()}{/if}">
                        <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Вы</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="role" name="role" value="private" {if isset($ad) && $ad->getRole() eq 'private'} checked="" {elseif empty($smarty.get)} checked="" {/if}>
                                        Частное лицо
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="role" name="role" value="company" {if isset($ad) && $ad->getRole() eq 'company'} checked="" {/if}>
                                        Компания
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                            <div class="col-sm-8">
                                <input type="text" id="seller_name" name="seller_name" class="form-control" placeholder="Имя" value="{if isset($ad)}{$ad->getSeller_name()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 form-control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{if isset($ad)}{$ad->getEmail()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="allow_mails" name="allow_mails" {if isset($ad) && $ad->getAllow_mails() eq 'yes'} checked="" {/if}> Я не хочу получать вопросы по объявлению по e-mail
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                            <div class="col-sm-8">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Телефон" value="{if isset($ad)}{$ad->getPhone()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cities" class="col-sm-4 form-control-label">Город</label>
                            <div class="col-sm-8">
                                <select name="city_id" class="form-control" id="city_id">
                                    <option>-- Выберите город --</option>
                                    <option disabled="disabled">-- Города --</option>
                                    {html_options options = $cities selected = (isset($ad)) ? $ad->getCity_id() : null}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                            <div class="col-sm-8">
                                <select name="category_id" class="form-control" id="category_id">
                                    <option>-- Выберите категорию --</option>
                                    {foreach from = $cats item = parent_cat}
                                        <optgroup label="{$parent_cat.0}">
                                            {html_options options = $parent_cat.sub selected = (isset($ad)) ? $ad->getCategory_id() : null}
                                        </optgroup>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 form-control-label">Название объявления</label>
                            <div class="col-sm-8">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Название" value="{if isset($ad)}{$ad->getTitle()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 form-control-label">Описание объявления</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" id="description" rows="3">{if isset($ad)}{$ad->getDescription()}{/if}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 form-control-label">Цена</label>
                            <div class="col-sm-3">
                                <input type="number" name="price" class="form-control" id="price" placeholder="0" value="{if isset($ad)}{$ad->getPrice()}{/if}">
                            </div>
                            <label class="col-sm-2 form-control-label">руб.</label>
                        </div>
                        <div class="form-group row">
                            {if isset($smarty.get.id)}
                                <div class="col-lg-7">
                                    <a href="index.php" class="btn btn-default">Вернуться на главную</a>
                                </div>
                                <div class="col-lg-5">
                                    <button name="fill" class="btn btn-default">Заполнить</button>
                                    <button id="edit" class="btn btn-success submitbutton">Сохранить</button>
                                </div>
                            {else}
                                <div class="col-lg-7 col-lg-offset-5">
                                    <button name="fill" class="btn btn-default">Заполнить</button>
                                    <button id="create" class="btn btn-success submitbutton">Добавить объявление</button>
                                </div>
                            {/if}
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {*Вторая колонка*}

        <div class="col-xs-12 col-lg-6">

            <div id="container_delete_edit" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
                <button onclick="$('#container').hide(); return false;" type="button" class="close" style="float: right;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="container_info_delete_edit"></div>
            </div>
            {if !isset($smarty.get.id)}
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
                            {if $ads_rows}
                                {$ads_rows}
                            {else}
                                {include file="table_last_tr.tpl.html"}
                            {/if}
                            </tbody>
                        </table>
                        {* начало - Всплывающее окно для подтверждения удаления *}
                        {*<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">*}
                        {*<div class="modal-dialog">*}
                        {*<div class="modal-content">*}
                        {*<div class="modal-header">*}
                        {*Удаление объявления*}
                        {*</div>*}
                        {*<div class="modal-body">*}
                        {*Вы уверены?*}
                        {*</div>*}
                        {*<div class="modal-footer">*}
                        {*<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>*}
                        {*<a class="btn btn-danger btn-ok">Удалить</a>*}
                        {*</div>*}
                        {*</div>*}
                        {*</div>*}
                        {*</div>*}
                        {* конец - Всплывающее окно для подтверждения удаления *}
                    </div>
                </div>
            {/if}
        </div>

    </div>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
<script src="./js/main.js"></script>
<script src="./js/jquery.form.min.js"></script>

{include file="footer.tpl"}