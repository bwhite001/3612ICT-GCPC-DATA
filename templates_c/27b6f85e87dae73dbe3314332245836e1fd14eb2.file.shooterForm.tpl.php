<?php /* Smarty version Smarty-3.1.12, created on 2013-05-01 02:42:43
         compiled from "./templates/dashboardTabs/shooters/shooterForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:541675120517fe6731afee4-77361023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27b6f85e87dae73dbe3314332245836e1fd14eb2' => 
    array (
      0 => './templates/dashboardTabs/shooters/shooterForm.tpl',
      1 => 1367336561,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1367323598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '541675120517fe6731afee4-77361023',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_517fe6731e25b7_77122569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517fe6731e25b7_77122569')) {function content_517fe6731e25b7_77122569($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Create / Edit Shooters</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/shooterForm.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/dash/shooterForm.js"></script>
    </head>
    <body>
        <div id='wrapper'>
            <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div id='content'>
                <div id='tabContent'>
                    <h1>Main Body</h1>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>