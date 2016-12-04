<?php
/* Smarty version 3.1.30, created on 2016-10-23 12:18:34
  from "D:\www\OpenServer\domains\xaver\lesson16\vendor\smarty\smarty\templates\table_row.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580c806a044755_49945650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6beed08980626d8a3b8993b466ebccee03eb641' => 
    array (
      0 => 'D:\\www\\OpenServer\\domains\\xaver\\lesson16\\vendor\\smarty\\smarty\\templates\\table_row.tpl.html',
      1 => 1477207050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580c806a044755_49945650 (Smarty_Internal_Template $_smarty_tpl) {
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getId();?>
</td>
    <td  class="width_tr1"><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getTitle();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getPrice();?>
</td>
    <td class="width_tr2 width_tr1"><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getSeller_name();?>
</td>
    <td>
        <a href="?id=<?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getId();?>
" title="Просмотреть | Редактировать" class="btn btn-info">
            <i class="glyphicon glyphicon-pencil"></i>
        </a>
        <button id="<?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getId();?>
" title="Удалить" class="delete btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>
<?php }
}
