{include file="header.tpl"}

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-8 col-lg-offset-2">
            <form method="post">
                <div class="form-group row">
                    <label class="col-sm-4 form-control-label">Вы</label>
                    <div class="col-sm-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="role" value="private" {if isset($ad.role) && $ad.role eq 'private'} checked="" {elseif empty($smarty.get)} checked="" {/if}>
                                Частное лицо
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="role" value="company" {if isset($ad.role) && $ad.role eq 'company'} checked="" {/if}>
                                Компания
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 form-control-label">Ваше имя</label>
                    <div class="col-sm-8">
                        <input type="text" name="seller_name" class="form-control" id="name" placeholder="Имя" value="{if isset($ad.seller_name)}{$ad.seller_name}{/if}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 form-control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{if isset($ad.email)}{$ad.email}{/if}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="allow_mails" {if isset($ad.allow_mails) && $ad.allow_mails eq 'yes'} checked="" {/if}> Я не хочу получать вопросы по объявлению по e-mail
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 form-control-label">Телефон</label>
                    <div class="col-sm-8">
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="Телефон" value="{if isset($ad.phone)}{$ad.phone}{/if}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cities" class="col-sm-4 form-control-label">Город</label>
                    <div class="col-sm-8">
                        <select name="city_id" class="form-control" id="cities">
                            <option>-- Выберите город --</option>
                            <option disabled="disabled">-- Города --</option>
                            {html_options options = $cities selected = $ad.city_id}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-sm-4 form-control-label">Категория</label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control" id="categories">
                            <option>-- Выберите категорию --</option>
                            {foreach from = $cat item = parent_cat}
                                <optgroup label="{$parent_cat.0}">
                                    {html_options options = $parent_cat.sub selected = $ad.category_id}
                                </optgroup>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-4 form-control-label">Название объявления</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Название" value="{if isset($ad.title)}{$ad.title}{/if}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-4 form-control-label">Описание объявления</label>
                    <div class="col-sm-8">
                        <textarea name="description" class="form-control" id="description" rows="3">{if isset($ad.description)}{$ad.description}{/if}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-4 form-control-label">Цена</label>
                    <div class="col-sm-3">
                        <input type="number" name="price" class="form-control" id="price" placeholder="0" value="{if isset($ad.price)}{$ad.price}{/if}">
                    </div>
                    <label class="col-sm-2 form-control-label">руб.</label>
                </div>
                <div class="form-group row">
                    {if isset($smarty.get.id)}
                    <div class="col-sm-7">
                        <a href="index.php" class="btn btn-secondary">Назад</a>
                    </div>
                    <div class="col-sm-5">
                        <button name="fill" class="btn btn-secondary">Заполнить</button>
                        <button name="submit" class="btn btn-success">Сохранить</button>
                    </div>
                    {else}
                    <div class="col-sm-5 col-sm-offset-7">
                        <button name="fill" class="btn btn-secondary">Заполнить</button>
                        <button name="submit" class="btn btn-success">Сохранить</button>
                    </div>
                    {/if}
                </div>
            </form>
        </div>
    </div>
    <br>
    {if !isset($smarty.get.id)}
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
                {foreach from = $ads item = ad}
                    <tr>
                        <td><a href='?id={$ad.id}'>{$ad.title}</a></td>
                        <td>{$ad.price}</td>
                        <td>{$ad.seller_name}</td>
                        <td><a href='#' data-href='?delete={$ad.id}' data-toggle='modal' data-target='#confirm-delete'>Удалить</a></td>
                    </tr>
                {foreachelse}
                    <tr><td colspan="4">Пока объявлений нет.</td></tr>
                {/foreach}
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
    {/if}
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {ldelim}
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    {rdelim});
</script>

{include file="footer.tpl"}