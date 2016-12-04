<?php
/* Smarty version 3.1.30, created on 2016-10-25 13:55:21
  from "D:\www\OpenServer\domains\xaver\lesson16\vendor\smarty\smarty\templates\not_found.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580f3a195a4f79_25616546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '090c18adb556075fff33f87b1ec7fbe6f4d00bd3' => 
    array (
      0 => 'D:\\www\\OpenServer\\domains\\xaver\\lesson16\\vendor\\smarty\\smarty\\templates\\not_found.tpl',
      1 => 1476015742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_580f3a195a4f79_25616546 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="row">
        <br>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Такой страницы не существует.</h4>
            <a href="index.php">Назад</a>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
