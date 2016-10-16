<?php
/* Smarty version 3.1.30, created on 2016-09-09 04:57:21
  from "/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/table_row.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d24131a66db5_54324110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f75a915a9504fe2d2dc9a6916ab85ef4cf8d8c1c' => 
    array (
      0 => '/var/www/public/xaver/lesson12/vendor/smarty/smarty/templates/table_row.tpl.html',
      1 => 1473397043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d24131a66db5_54324110 (Smarty_Internal_Template $_smarty_tpl) {
?>
<tr>
    <td><a href='?id=' . <?php echo $_smarty_tpl->tpl_vars['ad']->value->getId();?>
><?php echo $_smarty_tpl->tpl_vars['ad']->value->getTitle();?>
</a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['ad']->value->getPrice();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['ad']->value->getSeller_name();?>
</td>
    <td><a href='#' data-href='?delete=<?php echo $_smarty_tpl->tpl_vars['ad']->value->getId();?>
' data-toggle='modal' data-target='#confirm-delete'>Удалить</a></td>
</tr>
<?php }
}
