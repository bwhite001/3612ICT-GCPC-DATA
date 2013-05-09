<?php /* Smarty version Smarty-3.1.12, created on 2013-05-05 12:26:54
         compiled from "./templates/dashboardTabs/newAccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14211140265185b5220c8a19-13185432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01770b30c282ab56c60d2b7eefcc5716c106266e' => 
    array (
      0 => './templates/dashboardTabs/newAccount.tpl',
      1 => 1367717211,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1367715866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14211140265185b5220c8a19-13185432',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5185b5220dabf7_99847310',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5185b5220dabf7_99847310')) {function content_5185b5220dabf7_99847310($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Create New Admin Account</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/account.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="scripts/main.js"></script>
        
    </head>
    <body>
        <div id='wrapper'>
            <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div id='content'>
                <?php if ($_smarty_tpl->tpl_vars['error_string']->value!=''){?>
                    <p class='errorSting <?php echo $_smarty_tpl->tpl_vars['error_is_good']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['error_string']->value;?>
</p>
                <?php }?>
                <div id='tabContent'>
                    

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>