<?php
/* Smarty version 3.1.30, created on 2016-09-12 08:22:48
  from "/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/not_found.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d665d821dc57_62690250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed1391da2f75f7a585a54a9f14ad213953bc7f33' => 
    array (
      0 => '/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/not_found.tpl',
      1 => 1473668567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57d665d821dc57_62690250 (Smarty_Internal_Template $_smarty_tpl) {
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
