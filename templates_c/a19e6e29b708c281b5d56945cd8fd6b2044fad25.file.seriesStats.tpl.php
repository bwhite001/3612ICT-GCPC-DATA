<?php /* Smarty version Smarty-3.1.12, created on 2013-07-22 18:39:52
         compiled from "./templates/dashboardTabs/stats/seriesStats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184485303351a9017e2ab106-79421072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19e6e29b708c281b5d56945cd8fd6b2044fad25' => 
    array (
      0 => './templates/dashboardTabs/stats/seriesStats.tpl',
      1 => 1374478683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184485303351a9017e2ab106-79421072',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51a9017e4e5b57_48185876',
  'variables' => 
  array (
    'current_series' => 0,
    'currentSeriesYear' => 0,
    'w' => 0,
    'weekp' => 0,
    'weekr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a9017e4e5b57_48185876')) {function content_51a9017e4e5b57_48185876($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["currentSeriesYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['current_series']->value['date_started'])), null, 0);?>
<h1>Series <?php echo $_smarty_tpl->tpl_vars['current_series']->value['snumber'];?>
, <?php echo $_smarty_tpl->tpl_vars['currentSeriesYear']->value;?>
 Statistics</h1>
<div id="container">
	<h2>Number Of Shooters for This Series</h2>
	<canvas id="graph" width="900" height="300">
		<p>Please use google chrome</p>
	</canvas>
</div>
<table>
	<tr>
		<th rowspan='2'>Week <br/>Number</th>
		<th colspan='3' style='border-left-width: 4px; border-bottom-width: 1px'>Pistol Scores</th>
		<th colspan='3' style='border-left-width: 4px; border-bottom-width: 1px'>Rifle Scores</th>
		<th rowspan='2' style='border-left-width: 4px;'>Weekly Stats</th>
	</tr>
	<tr>
		<th  style='border-top-width: 1px; border-left-width: 4px;'>Wed</th>
		<th style='border-top-width: 1px;' >Fri</th>
		<th style='border-top-width: 1px;' >Total</th>
		<th  style='border-top-width: 1px; border-left-width: 4px;'>Wed</th>
		<th style='border-top-width: 1px;' >Fri</th>
		<th style='border-top-width: 1px;' >Total</th>
	</tr>
	<script type="text/javascript">
		var tooltips = [[],[]];
		var data = [[],[]];
		var labels = [];
	</script>
	<?php $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['w']->step = 1;$_smarty_tpl->tpl_vars['w']->total = (int)ceil(($_smarty_tpl->tpl_vars['w']->step > 0 ? 8+1 - (1) : 1-(8)+1)/abs($_smarty_tpl->tpl_vars['w']->step));
if ($_smarty_tpl->tpl_vars['w']->total > 0){
for ($_smarty_tpl->tpl_vars['w']->value = 1, $_smarty_tpl->tpl_vars['w']->iteration = 1;$_smarty_tpl->tpl_vars['w']->iteration <= $_smarty_tpl->tpl_vars['w']->total;$_smarty_tpl->tpl_vars['w']->value += $_smarty_tpl->tpl_vars['w']->step, $_smarty_tpl->tpl_vars['w']->iteration++){
$_smarty_tpl->tpl_vars['w']->first = $_smarty_tpl->tpl_vars['w']->iteration == 1;$_smarty_tpl->tpl_vars['w']->last = $_smarty_tpl->tpl_vars['w']->iteration == $_smarty_tpl->tpl_vars['w']->total;?>
		<?php $_smarty_tpl->tpl_vars["weekp"] = new Smarty_variable(getWeekly($_smarty_tpl->tpl_vars['current_series']->value,$_smarty_tpl->tpl_vars['w']->value,false), null, 0);?>
		<?php $_smarty_tpl->tpl_vars["weekr"] = new Smarty_variable(getWeekly($_smarty_tpl->tpl_vars['current_series']->value,$_smarty_tpl->tpl_vars['w']->value,true), null, 0);?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['w']->value;?>
</td>
			<td style='border-left-width: 4px;'><?php echo $_smarty_tpl->tpl_vars['weekp']->value['wedc'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['weekp']->value['fric'];?>
</td>
			<td><strong><?php echo $_smarty_tpl->tpl_vars['weekp']->value['total'];?>
</strong></td>
			<td style='border-left-width: 4px;'><?php echo $_smarty_tpl->tpl_vars['weekr']->value['wedc'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['weekr']->value['fric'];?>
</td>
			<td><strong><?php echo $_smarty_tpl->tpl_vars['weekr']->value['total'];?>
</strong></td>
			<td style='border-left-width: 4px;'><a href='dash.php?t=tw&week=<?php echo $_smarty_tpl->tpl_vars['w']->value;?>
'>Week <?php echo $_smarty_tpl->tpl_vars['w']->value;?>
</a></td>
			<script type="text/javascript">
				data[0].push(<?php echo $_smarty_tpl->tpl_vars['weekp']->value['total'];?>
);
				data[1].push(<?php echo $_smarty_tpl->tpl_vars['weekr']->value['total'];?>
);
				tooltips[0].push("<?php echo $_smarty_tpl->tpl_vars['weekp']->value['total'];?>
 shooter(s)");
				tooltips[1].push("<?php echo $_smarty_tpl->tpl_vars['weekr']->value['total'];?>
 shooter(s)");
				labels.push("Week <?php echo $_smarty_tpl->tpl_vars['w']->value;?>
");
			</script>
		</tr>
	<?php }} ?>
		<?php $_smarty_tpl->tpl_vars["weekp"] = new Smarty_variable(getWeeklyTotals($_smarty_tpl->tpl_vars['current_series']->value,false), null, 0);?>
		<?php $_smarty_tpl->tpl_vars["weekr"] = new Smarty_variable(getWeeklyTotals($_smarty_tpl->tpl_vars['current_series']->value,true), null, 0);?>
		<tr>
			<td><strong>Totals:</strong></td>
			<td style='border-left-width: 4px;'><?php echo $_smarty_tpl->tpl_vars['weekp']->value['wedc'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['weekp']->value['fric'];?>
</td>
			<td><strong><?php echo $_smarty_tpl->tpl_vars['weekp']->value['total'];?>
</strong></td>
			<td style='border-left-width: 4px;'><?php echo $_smarty_tpl->tpl_vars['weekr']->value['wedc'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['weekr']->value['fric'];?>
</td>
			<td><strong><?php echo $_smarty_tpl->tpl_vars['weekr']->value['total'];?>
</strong></td>
			<td style='border-left-width: 4px;'>
				<a href='dash.php?t=ae'>Series Awards</a>
				<br/><br/>
				
				<strong>Overall Shooters: <?php echo $_smarty_tpl->tpl_vars['weekp']->value['total']+$_smarty_tpl->tpl_vars['weekr']->value['total'];?>
</strong>
											</td>
		</tr>
</table><?php }} ?>