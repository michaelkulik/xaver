<?php
/* Smarty version 3.1.30, created on 2016-10-18 09:43:32
  from "D:\www\OpenServer\domains\xaver\lesson15\vendor\smarty\smarty\templates\table_row.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5805c494cc3279_48282872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22f90b0dea760f4c5e700a7d5e8f2c48201aed3b' => 
    array (
      0 => 'D:\\www\\OpenServer\\domains\\xaver\\lesson15\\vendor\\smarty\\smarty\\templates\\table_row.tpl.html',
      1 => 1476773011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5805c494cc3279_48282872 (Smarty_Internal_Template $_smarty_tpl) {
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getTitle();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getPrice();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getSeller_name();?>
</td>
    <td>
        <a href="?id=<?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getId();?>
" title="Просмотреть | Редактировать" class="btn btn-info">
            <i class="glyphicon glyphicon-pencil"></i>
        </a>
        <a href="#" id="<?php echo $_smarty_tpl->tpl_vars['table_ad']->value->getId();?>
" title="Удалить" class="delete btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </td>
</tr>
<?php }
}
