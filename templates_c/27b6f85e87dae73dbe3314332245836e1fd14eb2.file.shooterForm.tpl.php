<?php /* Smarty version Smarty-3.1.12, created on 2013-05-05 12:05:25
         compiled from "./templates/dashboardTabs/shooters/shooterForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:541675120517fe6731afee4-77361023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27b6f85e87dae73dbe3314332245836e1fd14eb2' => 
    array (
      0 => './templates/dashboardTabs/shooters/shooterForm.tpl',
      1 => 1367582386,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1367715866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '541675120517fe6731afee4-77361023',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_517fe6731e25b7_77122569',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
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
                    
	<h1>Shooters Administration Add / Edit Shooter <a class='back button' href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
">Cancel</a></h1>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="Add"){?>
	   <h2><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Shooter</h2>
    <?php }else{ ?>
        <h2><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Shooter - <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</h2>
    <?php }?>
	<form action='action.php' method='post' id='shooterForm'>
        <span class="formTitle">First Name:</span>
        <input class='formText' type="text" name="firstname" value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
'>

        <span class="formTitle">Last Name:</span>
        <input class='formText' type="text" name="lastname" value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
'>
        <span class="formTitle">Gender:</span>

        <select name="male" id="male" class='formText select'>
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>

        <span class="formTitle">Age:</span>
        <select id='senior' name="senior" class='formText select'>
            <option value="1">Senior</option>
            <option value="0">Junior</option>
        </select>

        <span class="formTitle">Grade:</span>
        <select class='formText select' name="grade" id="grade">
            <option value="0">D</option>
            <option value="1">C</option>
            <option value="2">B</option>
            <option value="3">A</option>
            <option value="4">Master</option>
        </select>

        <?php if ($_smarty_tpl->tpl_vars['type']->value=="Edit"){?>
            <script type="text/javascript">
                $("#male").val(<?php echo $_smarty_tpl->tpl_vars['shooter']->value['male'];?>
)
                $("#senior").val(<?php echo $_smarty_tpl->tpl_vars['shooter']->value['senior'];?>
)
                $("#grade").val(<?php echo $_smarty_tpl->tpl_vars['shooter']->value['grade'];?>
)
            </script>
        <?php }?>
        <span class="formTitle">Club #:</span>
        <input class='formText' type="text" name="cnumber" value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['cnumber'];?>
'>
        <span class="formTitle">RFID:</span>
        <input class='formText' type="text" name="rfid" value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['rfid'];?>
'>
        <input type='submit' class='button formtext' value='<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="Edit"){?>
            <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['id'];?>
'>
            <input type='hidden' name='code' value='se'>
        <?php }else{ ?>
            <input type='hidden' name='code' value='sa'>
        <?php }?>
            <input type='hidden' name='return_url' value='<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
'>
	</form>
	<span style="display:block; clear:both; height: 20px;"></span>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>