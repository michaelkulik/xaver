{include file="header.tpl"}

<div class="container">
    <br>
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Форма добавления / просмотра объявления
                </div>
                <div class="panel-body">
                    <form method="post">
                        <input type="hidden" name="id" value="{if isset($ad)}{$ad->getId()}{/if}">
                        <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Вы</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="role" value="private" {if isset($ad) && $ad->getRole() eq 'private'} checked="" {elseif empty($smarty.get)} checked="" {/if}>
                                        Частное лицо
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="role" value="company" {if isset($ad) && $ad->getRole() eq 'company'} checked="" {/if}>
                                        Компания
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                            <div class="col-sm-8">
                                <input type="text" name="seller_name" class="form-control" id="name" placeholder="Имя" value="{if isset($ad)}{$ad->getSeller_name()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 form-control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{if isset($ad)}{$ad->getEmail()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="allow_mails" {if isset($ad) && $ad->getAllow_mails() eq 'yes'} checked="" {/if}> Я не хочу получать вопросы по объявлению по e-mail
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                            <div class="col-sm-8">
                                <input type="tel" name="phone" class="form-control" id="phone" placeholder="Телефон" value="{if isset($ad)}{$ad->getPhone()}{/if}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cities" class="col-sm-4 form-control-label">Город</label>
                            <div class="col-sm-8">
                                <select name="city_id" class="form-control" id="cities">
                                    <option>-- Выберите город --</option>
                                    <option disabled="disabled">-- Города --</option>
                                    {html_options options = $cities selected = (isset($ad)) ? $ad->getCity_id() : null}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                            <div class="col-sm-8">
                                <select name="category_id" class="form-control" id="categories">
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
                                <input type="text" name="title" class="form-control" id="title" placeholder="Название" value="{if isset($ad)}{$ad->getTitle()}{/if}">
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
                                <div class="col-xs-12 col-lg-5">
                                    <a href="index.php" class="btn btn-default">Назад</a>
                                </div>
                                <div class="col-xs-12 col-lg-7">
                                    <button name="fill" class="btn btn-default">Заполнить</button>
                                    <button name="submit" class="btn btn-success">Сохранить</button>
                                </div>
                            {else}
                                <div class="col-lg-12">
                                    <button name="fill" class="btn btn-secondary">Заполнить</button>
                                    <button name="submit" class="btn btn-success">Добавить объявление</button>
                                </div>
                            {/if}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            {if !isset($smarty.get.id)}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Уже опубликованные объявления
                    </div>
                    <div class="panel-body">
                        <div id="container"></div>
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Название объявления</th>
                                <th>Цена</th>
                                <th>Имя</th>
                                <th>Действия</th>
                            </thead>
                            <tbody>
                                {if $ads_rows}
                                    {$ads_rows}
                                {else}
                                    <tr><td colspan="5">Пока объявлений нет.</td></tr>
                                {/if}
                            </tbody>
                        </table>
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
<script src="./main.js"></script>

{include file="footer.tpl"}