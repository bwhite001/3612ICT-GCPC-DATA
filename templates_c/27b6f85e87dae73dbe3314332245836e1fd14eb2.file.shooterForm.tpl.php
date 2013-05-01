<?php /* Smarty version Smarty-3.1.12, created on 2013-05-02 09:43:46
         compiled from "./templates/dashboardTabs/shooters/shooterForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:541675120517fe6731afee4-77361023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27b6f85e87dae73dbe3314332245836e1fd14eb2' => 
    array (
      0 => './templates/dashboardTabs/shooters/shooterForm.tpl',
      1 => 1367448225,
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
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_517fe6731e25b7_77122569',
  'has_nocache_code' => false,
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
                    
	<h1>Shooters Administration Add / Edit Shooter</h1>
	<h2>Add Shooter</h2>
	<form action='action.php' method='post' id='shooterForm'>
        <span class="formTitle">First Name:</span>
        <input class='formText' type="text" name="first">

        <span class="formTitle">Last Name:</span>
        <input class='formText' type="text" name="last">

    	<span class="formTitle">Gender:</span>
    	<select name="gender" class='formText select'>
    		<option value="true">M</option>
    		<option value="false">F</option>
    	</select>

    	<span class="formTitle">Age:</span>
    	<select name="jns" class='formText select'>
        	<option value="true">Senior</option>
        	<option value="false">Junior</option>
    	</select>
    	<span class="formTitle">Grade:</span>
    	<select class='formText select' name="grade">
        	<option value="0">D</option>
        	<option value="1">C</option>
        	<option value="2">B</option>
        	<option value="3">A</option>
        	<option value="4">Master</option>
    	</select>
        <span class="formTitle">Club #:</span>
        <input class='formText' type="text" name="clubn">
        <span class="formTitle">RFID:</span>
        <input class='formText' type="text" name="rfid">
        <input type='submit' class='button formtext' value='Create'>
	</form>
	<span style="display:block; clear:both; height: 20px;"></span>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>