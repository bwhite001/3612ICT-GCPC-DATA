<?php /* Smarty version Smarty-3.1.12, created on 2013-07-24 14:01:34
         compiled from "./templates/csv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4148398251ef43669406c3-33976823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f71be0d80aa466d5ba9604dd15c74db8d85a2dc0' => 
    array (
      0 => './templates/csv.tpl',
      1 => 1374634885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4148398251ef43669406c3-33976823',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51ef4366aaf608_65462466',
  'variables' => 
  array (
    'headers' => 0,
    'h' => 0,
    'newline' => 0,
    'data' => 0,
    'row' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ef4366aaf608_65462466')) {function content_51ef4366aaf608_65462466($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/libs/smarty/libs/plugins/modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars["newline"] = new Smarty_variable("\n", null, 0);?><?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['h']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['headers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['h']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['h']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
$_smarty_tpl->tpl_vars['h']->_loop = true;
 $_smarty_tpl->tpl_vars['h']->iteration++;
 $_smarty_tpl->tpl_vars['h']->last = $_smarty_tpl->tpl_vars['h']->iteration === $_smarty_tpl->tpl_vars['h']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['hdr']['last'] = $_smarty_tpl->tpl_vars['h']->last;
?>"<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['h']->value,'"','""');?>
"<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['hdr']['last']){?>,<?php }?><?php } ?><?php echo $_smarty_tpl->tpl_vars['newline']->value;?>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['row']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['row']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['row']->iteration++;
 $_smarty_tpl->tpl_vars['row']->last = $_smarty_tpl->tpl_vars['row']->iteration === $_smarty_tpl->tpl_vars['row']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['res']['last'] = $_smarty_tpl->tpl_vars['row']->last;
?><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['val']['last'] = $_smarty_tpl->tpl_vars['v']->last;
?>"<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['v']->value,'"','""');?>
"<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['val']['last']){?>,<?php }?><?php } ?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['res']['last']){?><?php echo $_smarty_tpl->tpl_vars['newline']->value;?>
<?php }?><?php } ?><?php }} ?>