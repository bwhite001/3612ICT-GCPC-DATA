<?php /* Smarty version Smarty-3.1.12, created on 2014-03-09 10:17:50
         compiled from "./templates/dashboardTabs/rifle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1514585032531ba51ef0f469-96968644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '412eae98d302f2b910a5ca547d38ec24249f21b4' => 
    array (
      0 => './templates/dashboardTabs/rifle.tpl',
      1 => 1374413990,
      2 => 'file',
    ),
    'a2ae5f1c08e748db862e1ff7d4d582d6fb0ebb6f' => 
    array (
      0 => '/var/www/templates/core.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1514585032531ba51ef0f469-96968644',
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
  'unifunc' => 'content_531ba51f251d53_04170300',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ba51f251d53_04170300')) {function content_531ba51f251d53_04170300($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Rifle Scoring Administration</title>
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
                    
	<style type="text/css">
		#content h1 {
			background-color: #090;
		}
		#content h2 {
			background-color: #0C0;
		}
		#content a {
			color: #090;
		}
		#currentSeries {
			background-color: #5F7;
			border: solid 1px #0F3;
			color: #000;
		}
	</style>
	<?php $_smarty_tpl->tpl_vars["currentYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['current_series']->value['date_started'])), null, 0);?>
	<h1 class='rifle h1'>Rifle Scoring Administration</h1>
	<h2 class='rifle h2'>Current <em>Rifle</em> Weeks for Series <?php echo $_smarty_tpl->tpl_vars['current_series']->value['snumber'];?>
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
		</tr>
		<?php $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['w']->step = 1;$_smarty_tpl->tpl_vars['w']->total = (int)ceil(($_smarty_tpl->tpl_vars['w']->step > 0 ? $_smarty_tpl->tpl_vars['current_series']->value['length']+1 - (1) : 1-($_smarty_tpl->tpl_vars['current_series']->value['length'])+1)/abs($_smarty_tpl->tpl_vars['w']->step));
if ($_smarty_tpl->tpl_vars['w']->total > 0){
for ($_smarty_tpl->tpl_vars['w']->value = 1, $_smarty_tpl->tpl_vars['w']->iteration = 1;$_smarty_tpl->tpl_vars['w']->iteration <= $_smarty_tpl->tpl_vars['w']->total;$_smarty_tpl->tpl_vars['w']->value += $_smarty_tpl->tpl_vars['w']->step, $_smarty_tpl->tpl_vars['w']->iteration++){
$_smarty_tpl->tpl_vars['w']->first = $_smarty_tpl->tpl_vars['w']->iteration == 1;$_smarty_tpl->tpl_vars['w']->last = $_smarty_tpl->tpl_vars['w']->iteration == $_smarty_tpl->tpl_vars['w']->total;?>
			<?php $_smarty_tpl->tpl_vars["week"] = new Smarty_variable(getWeekly($_smarty_tpl->tpl_vars['current_series']->value,$_smarty_tpl->tpl_vars['w']->value,true), null, 0);?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['w']->value;?>
</td>
				<td><a href='dash.php?t=rw&week=<?php echo $_smarty_tpl->tpl_vars['w']->value;?>
&day=w'><?php echo $_smarty_tpl->tpl_vars['week']->value['wed'];?>
</a></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['week']->value['wedc'];?>
</strong></td>
				<td><a href='dash.php?t=rw&week=<?php echo $_smarty_tpl->tpl_vars['w']->value;?>
&day=f'><?php echo $_smarty_tpl->tpl_vars['week']->value['fri'];?>
</a></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['week']->value['fric'];?>
</strong></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['week']->value['total'];?>
</strong></td>
			</tr>
		<?php }} ?>
			<?php $_smarty_tpl->tpl_vars["celb"] = new Smarty_variable(getWeekly($_smarty_tpl->tpl_vars['current_series']->value,$_smarty_tpl->tpl_vars['current_series']->value['length']+1,true), null, 0);?>
			<tr>
				<td>-</td>
				<td>Presentation Night <br/> <em><?php echo $_smarty_tpl->tpl_vars['celb']->value['wed'];?>
</em></td>
				<td><strong>N/A</strong></td>
				<td><a href='dash.php?t=rw&week=9&day=f'><?php echo $_smarty_tpl->tpl_vars['celb']->value['fri'];?>
</a></td>
				<td><strong><?php echo $_smarty_tpl->tpl_vars['celb']->value['fric'];?>
</strong></td>
				<td><strong>N/A</strong></td>
			</tr>
	</table>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>