<?php /* Smarty version Smarty-3.1.12, created on 2013-05-12 00:26:15
         compiled from "./templates/dashboardTabs/weekly/weeklyForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1980736818518e3a5d6ab7c9-66475404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f6f6f059b16eb0c50380105a1563b7e863b5f26' => 
    array (
      0 => './templates/dashboardTabs/weekly/weeklyForm.tpl',
      1 => 1368278773,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1368063232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1980736818518e3a5d6ab7c9-66475404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518e3a5d708545_10307367',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518e3a5d708545_10307367')) {function content_518e3a5d708545_10307367($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Pistol Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/weeklyForm.css">
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
                    
    <?php if ($_smarty_tpl->tpl_vars['table']->value=="rifle_scores"){?>
        <style type="text/css">
            #content h1 {
                background-color: #090;
            }
            #content h2 {
                background-color: #0C0;
            }
            #currentSeries {
                background-color: #5F7;
                border: solid 1px #0F3;
                color: #000;
            }
        </style>
    <?php }?>
	<h1><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Score - <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
<a class='back button' href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
">Cancel</a></h1>
	<form action='action.php' method='post' id='weeklyForm'>
		<?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
			<span class="formTitle">Handicap:</span>
	        <input class='formText' type="text" name="Handicap" value='<?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
'>
        <?php }else{ ?>
        	<span class="formTitle">Match:</span>
	        <select class='formText select'>

	        </select>
        <?php }?>
        <span class="formTitle">Score:</span>
        <input class='formText' type="text" name="Handicap" value='<?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
'>
        <input type='submit' class='button formtext' value='<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="Edit"){?>
            <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['score']->value['id'];?>
'>
            <input type='hidden' name='code' value='we'>
        <?php }else{ ?>
            <input type='hidden' name='code' value='wa'>
        <?php }?>
        	<input type='hidden' name='table' value='<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
'>
            <input type='hidden' name='return_url' value='<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
'>
    </form>
    <span style='display:block; clear:both; margin-bottom: 20px'></span>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>