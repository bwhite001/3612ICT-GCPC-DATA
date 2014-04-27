<?php /* Smarty version Smarty-3.1.12, created on 2014-01-28 16:42:20
         compiled from "./templates/dashboardTabs/stats/weeklyStats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145218410252e7433c9ef3c2-73148241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d56359b3f71dd6f2d0ee28fbf0cefb1eed24713' => 
    array (
      0 => './templates/dashboardTabs/stats/weeklyStats.tpl',
      1 => 1370008508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145218410252e7433c9ef3c2-73148241',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'femaleShooters' => 0,
    'maleShooters' => 0,
    'weekNumber' => 0,
    'header' => 0,
    'goBack' => 0,
    'score' => 0,
    'shooter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52e7433cd1c9e4_80750592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e7433cd1c9e4_80750592')) {function content_52e7433cd1c9e4_80750592($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
?><h1>
	<?php if (count($_smarty_tpl->tpl_vars['femaleShooters']->value)>0&&count($_smarty_tpl->tpl_vars['maleShooters']->value)>0){?>
		<a href="print.php?t=w&week=<?php echo $_smarty_tpl->tpl_vars['weekNumber']->value;?>
" class='button back' style='float:left' target="_blank">Print</a>
	<?php }?>
	<?php echo $_smarty_tpl->tpl_vars['header']->value;?>
 
	<a href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
" class='button back'>Back</a>
</h1>
<div class='smaller'>
	<?php if (count($_smarty_tpl->tpl_vars['maleShooters']->value)>0){?>
		<h2>Male Winners</h2>
		<canvas id="mgraph" class='graphCanvas'>
			<p>Please use google chrome</p>
		</canvas>
		<script type="text/javascript">
			var mdata = [];
			var mlabels = [];
		</script>
		<table class='newTable male'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Score</th>
				<th>Hcap</th>
				<th>Total</th>
				<th>STotal</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleShooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<?php if ($_smarty_tpl->tpl_vars['score']->value['points']==3){?>
						<td>1<sup>st</sup></td>
					<?php }elseif($_smarty_tpl->tpl_vars['score']->value['points']==2){?>
						<td>2<sup>nd</sup></td>
					<?php }elseif($_smarty_tpl->tpl_vars['score']->value['points']==1){?>
						<td>3<sup>rd</sup></td>
					<?php }else{ ?>
						<td>-</td>
					<?php }?>
					<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['score']->value['total']<=600){?>
							<?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>

						<?php }else{ ?>
							<span style='color:red'><?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>
</span>
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['stotal'];?>
</td>
					<script type="text/javascript">
						mdata.push(<?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
);
						mlabels.push("<?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
");
					</script>
				</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
		<p style='text-align:center'>No Male Shooters Shot this Week</p>
	<?php }?>
	</div>
<div class='smaller'>
	<?php if (count($_smarty_tpl->tpl_vars['femaleShooters']->value)>0){?>
		<h2 style='background-color:#B07;'>Female Winners</h2>
		<canvas id="fgraph" class='graphCanvas'>
			<p>Please use google chrome</p>
		</canvas>
		<script type="text/javascript">
			var fdata = [];
			var flabels = [];
		</script>
		<table class='newTable female'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Score</th>
				<th>Hcap</th>
				<th>Total</th>
				<th>STotal</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleShooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" class='',class='newColor'"),$_smarty_tpl);?>
>
					<?php if ($_smarty_tpl->tpl_vars['score']->value['points']==3){?>
						<td>1<sup>st</sup></td>
					<?php }elseif($_smarty_tpl->tpl_vars['score']->value['points']==2){?>
						<td>2<sup>nd</sup></td>
					<?php }elseif($_smarty_tpl->tpl_vars['score']->value['points']==1){?>
						<td>3<sup>rd</sup></td>
					<?php }else{ ?>
						<td>-</td>
					<?php }?>
					<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['score']->value['total']<=400){?>
							<?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>

						<?php }else{ ?>
							<span style='color:red'><?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>
</span>
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['stotal'];?>
</td>
					<script type="text/javascript">
						fdata.push(<?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
);
						flabels.push("<?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
");
					</script>
				</tr>
			<?php } ?>
		</table>
	<?php }else{ ?>
		<p style='text-align:center'>No Female Shooters Shot this Week</p>
	<?php }?>
</div>

<span style='display:block; clear:both;'></span><?php }} ?>