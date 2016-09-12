<?php
/* Smarty version 3.1.30, created on 2016-09-12 08:18:15
  from "/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d664c7dd7812_61898160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0bc86a1cd787a68637c3d2113a4581a7059327d' => 
    array (
      0 => '/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/error.tpl',
      1 => 1473668295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_57d664c7dd7812_61898160 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="row">
        <br>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Упс!</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
