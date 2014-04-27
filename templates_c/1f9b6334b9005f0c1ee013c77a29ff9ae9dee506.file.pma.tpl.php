<?php /* Smarty version Smarty-3.1.12, created on 2014-04-04 12:16:03
         compiled from "./templates/dashboardTabs/pma.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1840968589533e07d3066312-01078324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f9b6334b9005f0c1ee013c77a29ff9ae9dee506' => 
    array (
      0 => './templates/dashboardTabs/pma.tpl',
      1 => 1370008508,
      2 => 'file',
    ),
    'a2ae5f1c08e748db862e1ff7d4d582d6fb0ebb6f' => 
    array (
      0 => '/var/www/templates/core.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1840968589533e07d3066312-01078324',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_533e07d3192dc3_37187460',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533e07d3192dc3_37187460')) {function content_533e07d3192dc3_37187460($_smarty_tpl) {?><!DOCTYPE html>
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