$(function(){
    $('ul.myList a:contains(CSS)'); // 1. Все ссылки с текстом Css которые находятся в списке
    $('img:eq(2), img:nth-child(4)'); // 2. 3 и 4 картинки
    $('tr:first, tr:first + tr', '#languages tbody'); // 3. 1 и 2 строки в таблице (заголовок не учитывать)
    $('#languages tbody td:eq(10)'); /* или */ $('td:odd', '#languages tbody tr:last'); // 4. В последней строке таблицы подсветить ячейку второй колонки
});