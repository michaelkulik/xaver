<?php
/* Smarty version 3.1.30, created on 2016-08-26 06:50:04
  from "/var/www/public/xaver/lesson11/vendor/smarty/smarty/templates/not_found.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57bfe69ca4e3b8_29490979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b795cecbe52e05b33049ad4a15d5889e24ca6650' => 
    array (
      0 => '/var/www/public/xaver/lesson11/vendor/smarty/smarty/templates/not_found.tpl',
      1 => 1472191549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57bfe69ca4e3b8_29490979 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h3>Такой страницы не существует.</h3>
<a href="index.php">Назад</a>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
