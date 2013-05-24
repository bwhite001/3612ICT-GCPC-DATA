<?php /* Smarty version Smarty-3.1.12, created on 2013-05-25 10:13:40
         compiled from "./templates/dashboardTabs/pistol.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1346795526518b781e990d30-88102954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6652e982e269439b03cd3a59380a9188105f2deb' => 
    array (
      0 => './templates/dashboardTabs/pistol.tpl',
      1 => 1369437214,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1368063232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1346795526518b781e990d30-88102954',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518b781e9f1c25_84680510',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518b781e9f1c25_84680510')) {function content_518b781e9f1c25_84680510($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Pistol Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/week.css">
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
                    
	<?php $_smarty_tpl->tpl_vars["currentYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['current_series']->value['date_started'])), null, 0);?>
	<h1>Pistol Scoring Administration</h1>
	<h2>Current <em>Pistol</em> Weeks for Series <?php echo $_smarty_tpl->tpl_vars['current_series']->value['snumber'];?>
 - <?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
</h2>
	<table>
		<tr>
			<th width='5%'>Week <br/>Number</th>
			<th width='25%'>Wednesday</th>
			<th width='5%'>Day <br/>Count</th>
			<th width='25%'>Friday</th>
			<th width='5%'>Day <br/>Count</th>
			<th width='5%'>Weekly <br/>Total</th>
			<th width='30%'>Stats</th>
		</tr>
		<?php $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['w']->step = 1;$_smarty_tpl->tpl_vars['w']->total = (int)ceil(($_smarty_tpl->tpl_vars['w']->step > 0 ? 8+1 - (1) : 1-(8)+1)/abs($_smarty_tpl->tpl_vars['w']->step));
if ($_smarty_tpl->tpl_vars['w']->total > 0){
for ($_smarty_tpl->tpl_vars['w']->value = 1, $_smarty_tpl->tpl_vars['w']->iteration = 1;$_smarty_tpl->tpl_vars['w']->iteration <= $_smarty_tpl->tpl_vars['w']->total;$_smarty_tpl->tpl_vars['w']->value += $_smarty_tpl->tpl_vars['w']->step, $_smarty_tpl->tpl_vars['w']->iteration++){
$_smarty_tpl->tpl_vars['w']->first = $_smarty_tpl->tpl_vars['w']->iteration == 1;$_smarty_tpl->tpl_vars['w']->last = $_smarty_tpl->tpl_vars['w']->iteration == $_smarty_tpl->tpl_vars['w']->total;?>
			<?php $_smarty_tpl->tpl_vars["week"] = new Smarty_variable(getWeekly($_smarty_tpl->tpl_vars['current_series']->value,$_smarty_tpl->tpl_vars['w']->value,false), null, 0);?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['w']->value;?>
</td>
				<td><a href='dash.php?t=pw&week=<?php echo $_smarty_tpl->tpl_vars['w']->value;?>
&day=w'><?php echo $_smarty_tpl->tpl_vars['week']->value['wed'];?>
</a></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['week']->value['wedc'];?>
</strong></td>
				<td><a href='dash.php?t=pw&week=<?php echo $_smarty_tpl->tpl_vars['w']->value;?>
&day=f'><?php echo $_smarty_tpl->tpl_vars['week']->value['fri'];?>
</a></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['week']->value['fric'];?>
</strong></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['week']->value['total'];?>
</strong></td>
				<td><a href='dash.php?t=tw&week=<?php echo $_smarty_tpl->tpl_vars['w']->value;?>
&backurl=<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
'>Weekly Stats</a></td>
			</tr>
		<?php }} ?>
			<?php $_smarty_tpl->tpl_vars["celb"] = new Smarty_variable(getWeekly($_smarty_tpl->tpl_vars['current_series']->value,9,false), null, 0);?>
			<tr>
				<td>-</td>
				<td>Presentation Night <br/> <em><?php echo $_smarty_tpl->tpl_vars['celb']->value['wed'];?>
</em></td>
				<td><strong>N/A</strong></td>
				<td><a href='dash.php?t=pw&week=9&day=f'><?php echo $_smarty_tpl->tpl_vars['celb']->value['fri'];?>
</a></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['celb']->value['fric'];?>
</strong></td>
				<td><strong>N/A</strong></td>
				<td><a href='dash.php?t=tw&week=9&backurl=<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
'>Weekly Stats</a></td>
			</tr>
	</table>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>