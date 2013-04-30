<?php /* Smarty version Smarty-3.1.12, created on 2013-04-30 16:03:08
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2097426510517e68d90a9f84-81127902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1367298187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2097426510517e68d90a9f84-81127902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_517e68d90aac65_14832670',
  'variables' => 
  array (
    'navbar' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e68d90aac65_14832670')) {function content_517e68d90aac65_14832670($_smarty_tpl) {?><div id='headerStyle'>
	<div id="headerbar">
		<div id="users"><span id="currentUser">Vicki J White</span> | <a href="">Logout</a></div>
		<h1>Control Panel</h1>
		<h2>Air Pistol Admin Panel v2.0</h2>
	</div>
</div>
<div id='navBar'>
    <ul>
    <?php  $_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nav']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navbar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->key => $_smarty_tpl->tpl_vars['nav']->value){
$_smarty_tpl->tpl_vars['nav']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['nav']->value['selected']==1){?>
        <li class='nav_item selected'>
        <?php }else{ ?>
        <li class='nav_item'>
        <?php }?>
            <a href='dash.php'>
                <span class='nav_icon'><?php echo $_smarty_tpl->tpl_vars['nav']->value['icon'];?>
</span>
                <span class='nav_text'><?php echo $_smarty_tpl->tpl_vars['nav']->value['text'];?>
</span>
            </a>
        </li>
    <?php } ?>
    </ul>
</div>
<div id='currentSeries'>
    <p>Current Series: 2, 2013</p>
    <span id="changeSeriesHolder">
        Change:
        <select id="changeSeries">
                    <option value="1">1, 2013</option>
        </select>
        <a class='button'>Update</a>
    </span>
    <span style='clear:both'></span>
</div><?php }} ?>