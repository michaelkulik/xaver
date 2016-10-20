<?php
/* Smarty version 3.1.30, created on 2016-10-18 11:29:08
  from "D:\www\OpenServer\domains\xaver\lesson15\vendor\smarty\smarty\templates\error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5805dd54be60a0_84396163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a3e9a0c473d12dfde8f61516e256b4bf9779c27' => 
    array (
      0 => 'D:\\www\\OpenServer\\domains\\xaver\\lesson15\\vendor\\smarty\\smarty\\templates\\error.tpl',
      1 => 1476779282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5805dd54be60a0_84396163 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    
        <br>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Упс!</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
            <p><a href="index.php">Обновить</a></p>
        </div>
    


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
