<?php /* Smarty version Smarty-3.1.12, created on 2013-07-24 14:00:52
         compiled from "./templates/dashboardTabs/awards/seriesAwards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207179798551ece40b4d6570-03698132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2894657cc14e8c7cb68200836847d9b59f3058c7' => 
    array (
      0 => './templates/dashboardTabs/awards/seriesAwards.tpl',
      1 => 1374634137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207179798551ece40b4d6570-03698132',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51ece40b4d7a64_27893726',
  'variables' => 
  array (
    'current_series' => 0,
    'currentSeriesYear' => 0,
    'goBack' => 0,
    'maleShooters' => 0,
    'score' => 0,
    'shooter' => 0,
    'femaleShooters' => 0,
    'maleTop' => 0,
    'femaleTop' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ece40b4d7a64_27893726')) {function content_51ece40b4d7a64_27893726($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
?><?php $_smarty_tpl->tpl_vars["currentSeriesYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['current_series']->value['date_started'])), null, 0);?>
<p style='text-align:center;'>Download Rifle CSV: <a style='color: #07B;' href='csv.php?t=e' target='_blank'>Click Here</a></p>
<h1>
<a href="print.php?t=e" class='button back' style='float:left' target="_blank">Print</a>
	Series <?php echo $_smarty_tpl->tpl_vars['current_series']->value['snumber'];?>
, <?php echo $_smarty_tpl->tpl_vars['currentSeriesYear']->value;?>
 Awards

	<?php if ($_smarty_tpl->tpl_vars['goBack']->value!=''){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
" class='button back'>Back</a>
	<?php }?>
</h1>

<div class='smaller'>
	<h2>Male Point Winners</h2>
	<?php if (count($_smarty_tpl->tpl_vars['maleShooters']->value)>0){?>
		<table class='newTable male'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Points</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleShooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==0){?>
						<td>1<sup>st</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==1){?>
						<td>2<sup>nd</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==2){?>
						<td>3<sup>rd</sup></td>
					<?php }else{ ?>
						<td>-</td>
					<?php }?>
					<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['points'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
				</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		<p style='text-align:center'>No Shooters Entered This Series</p>
	<?php }?>
</div>
<div class='smaller'>
	<h2 style='background-color:#B07;'>Female Point Winners</h2>
		<?php if (count($_smarty_tpl->tpl_vars['femaleShooters']->value)>0){?>
		<table class='newTable female'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Points</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleShooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==0){?>
						<td>1<sup>st</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==1){?>
						<td>2<sup>nd</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==2){?>
						<td>3<sup>rd</sup></td>
					<?php }else{ ?>
						<td>-</td>
					<?php }?>
					<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['points'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
				</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		<p style='text-align:center'>No Shooters Entered This Series</p>
	<?php }?>
</div>
<span style='display:block; clear:both'></span>
<h1>Series Top Shots</h1>
<div class='smaller'>
	<h2>Male Top Shots</h2>
	<?php if (count($_smarty_tpl->tpl_vars['maleTop']->value)>0){?>
		<table class='newTable male'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleTop']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==0){?>
						<td>1<sup>st</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==1){?>
						<td>2<sup>nd</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==2){?>
						<td>3<sup>rd</sup></td>
					<?php }else{ ?>
						<td>-</td>
					<?php }?>
					<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
				</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		<p style='text-align:center'>No Shooters Entered This Series</p>
	<?php }?>
</div>
<div class='smaller'>
	<h2 style='background-color:#B07;'>Female Top Shots</h2>
	<?php if (count($_smarty_tpl->tpl_vars['femaleTop']->value)>0){?>
		<table class='newTable female'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleTop']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==0){?>
						<td>1<sup>st</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==1){?>
						<td>2<sup>nd</sup></td>
					<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['s']['index']==2){?>
						<td>3<sup>rd</sup></td>
					<?php }else{ ?>
						<td>-</td>
					<?php }?>
					<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
				</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		<p style='text-align:center'>No Shooters Entered This Series</p>
	<?php }?>
</div>
<span style='display:block; clear:both'></span><?php }} ?>