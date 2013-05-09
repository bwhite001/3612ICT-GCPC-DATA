<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 11:19:33
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1496018141517e4de0344758-36695473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1367972306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1496018141517e4de0344758-36695473',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_517e4de036f0d1_33550288',
  'variables' => 
  array (
    'isError' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e4de036f0d1_33550288')) {function content_517e4de036f0d1_33550288($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>GCPC Admin Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/login.css">
    </head>
    <body>
        <div id="loginForm">
            <form id="signin_form" action="login.php" method="post">
                <h1>Log in</h1>
                <?php if ($_smarty_tpl->tpl_vars['isError']->value){?>
                <p class="someRandomClassThatWontGetConfusedWithTheOtherClasses"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
                <?php }elseif($_smarty_tpl->tpl_vars['error']->value!=''){?>
                <p class="someRandomClassThatWontGetConfusedWithTheOtherClasses Green"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
                <?php }?>
                <div id="formContent">
                        <span class="entypo login">👤</span>
                        <div class="inputDiv">
                            <input type="text" name="username">
                        </div>
                        <span class="entypo login">🔑</span>
                        <div class="inputDiv">
                            <input type="password" name="password">
                        </div>
                    <div id="buttonDiv">
                        <input type="submit" class='button' value="Sign In">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
<?php }} ?>