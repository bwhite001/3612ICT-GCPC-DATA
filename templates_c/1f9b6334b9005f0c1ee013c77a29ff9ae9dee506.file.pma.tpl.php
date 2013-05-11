<?php /* Smarty version Smarty-3.1.12, created on 2013-05-12 00:16:50
         compiled from "./templates/dashboardTabs/pma.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1017376257518e43bf639de7-57547609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f9b6334b9005f0c1ee013c77a29ff9ae9dee506' => 
    array (
      0 => './templates/dashboardTabs/pma.tpl',
      1 => 1368278208,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1368063232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1017376257518e43bf639de7-57547609',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518e43bf697685_93215104',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518e43bf697685_93215104')) {function content_518e43bf697685_93215104($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>PHP My Admin</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        
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
                    
	<style type="text/css">
		iframe {
		    display: block;
		    width: 900px;
		    margin: auto;
		    border: solid 1px #ccc;
		    margin-bottom: 20px;
		    min-height: 450px;
		}
	</style>
<h1>phpMyAdmin</h1>
<iframe src="phpMyAdmin/"></iframe>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>