<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 11:23:51
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2097426510517e68d90a9f84-81127902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1367972628,
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
    'currentUser' => 0,
    'navbar' => 0,
    'nav' => 0,
    'all_series' => 0,
    'current_series' => 0,
    'currentSeriesYear' => 0,
    'series' => 0,
    'thisYear' => 0,
    'current_uri' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517e68d90aac65_14832670')) {function content_517e68d90aac65_14832670($_smarty_tpl) {?><div id='headerStyle'>
	<div id="headerbar">
		<div id="users"><span id="currentUser"><?php echo $_smarty_tpl->tpl_vars['currentUser']->value['name'];?>
</span> | <a style='color:#07B' href="login.php?t=1">Logout</a></div>
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
            <a href='dash.php?t=<?php echo $_smarty_tpl->tpl_vars['nav']->value['uri'];?>
'>
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
    <?php if (count($_smarty_tpl->tpl_vars['all_series']->value)>0){?>
    <?php $_smarty_tpl->tpl_vars["currentSeriesYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['current_series']->value['date_started'])), null, 0);?>
    <p>Current Series: Series <?php echo $_smarty_tpl->tpl_vars['current_series']->value['snumber'];?>
, <?php echo $_smarty_tpl->tpl_vars['currentSeriesYear']->value;?>
</p>
    <span id="changeSeriesHolder">
        <span id="changeSeriesHolderLabel">Change:</span>
        <form action='action.php?code=ec' method='post'>
            <select id="changeSeries" name='series_id'>
                <?php  $_smarty_tpl->tpl_vars['series'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['series']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_series']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['series']->key => $_smarty_tpl->tpl_vars['series']->value){
$_smarty_tpl->tpl_vars['series']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['series']->value['id']!=$_smarty_tpl->tpl_vars['current_series']->value['id']){?>
                        <?php $_smarty_tpl->tpl_vars["thisYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['series']->value['date_started'])), null, 0);?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['series']->value['id'];?>
">Series <?php echo $_smarty_tpl->tpl_vars['series']->value['snumber'];?>
, <?php echo $_smarty_tpl->tpl_vars['thisYear']->value;?>
</option>
                    <?php }?>
                <?php } ?>
            </select>
            <input type='hidden' name='return_url' value='<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
'>
            <input type='submit' value='Update' class='button series'>
        </form>
    </span>
    <span style='clear:both'></span>
    <?php }else{ ?>
    <p style='float:none; text-align:center'>
        Please Create a Series
    </p>
    <?php }?>
</div><?php }} ?>