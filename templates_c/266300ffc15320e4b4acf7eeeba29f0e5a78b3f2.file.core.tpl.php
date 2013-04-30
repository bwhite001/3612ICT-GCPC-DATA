<?php /* Smarty version Smarty-3.1.12, created on 2013-04-30 15:19:27
         compiled from "./templates/core.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1540133245517e63f2613141-22729810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '266300ffc15320e4b4acf7eeeba29f0e5a78b3f2' => 
    array (
      0 => './templates/core.tpl',
      1 => 1367295552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1540133245517e63f2613141-22729810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_517e63f27944c0_87471582',
  'variables' => 
  array (
    'template' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e63f27944c0_87471582')) {function content_517e63f27944c0_87471582($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Dashboard GCPC Scoring Pannel</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/dash/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
.js"></script>
    </head>
    <body>
        <?php $_smarty_tpl->tpl_vars["file"] = new Smarty_variable("dashboardTabs/".((string)$_smarty_tpl->tpl_vars['template']->value).".tpl", null, 0);?>
        <div id='wrapper'>
            <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div id='content'>
                <div id='tabContent'>
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['file']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>