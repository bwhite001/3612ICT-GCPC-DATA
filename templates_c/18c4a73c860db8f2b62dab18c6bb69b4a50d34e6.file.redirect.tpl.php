<?php /* Smarty version Smarty-3.1.12, created on 2013-05-02 17:21:02
         compiled from "./templates/redirect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1194898374518205ce3447e1-95790956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18c4a73c860db8f2b62dab18c6bb69b4a50d34e6' => 
    array (
      0 => './templates/redirect.tpl',
      1 => 1365655428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1194898374518205ce3447e1-95790956',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'redirectUrl' => 0,
    'params' => 0,
    'name' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518205ce373c72_23343070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518205ce373c72_23343070')) {function content_518205ce373c72_23343070($_smarty_tpl) {?><form action='<?php echo $_smarty_tpl->tpl_vars['redirectUrl']->value;?>
' method='POST' name='quickSubmit'>
	<?php if ($_smarty_tpl->tpl_vars['params']->value!=''){?>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<input type='hidden' name='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
'>
		<?php } ?>
	<?php }?>
</form>
<script language="JavaScript">
	document.quickSubmit.submit();
</script><?php }} ?>