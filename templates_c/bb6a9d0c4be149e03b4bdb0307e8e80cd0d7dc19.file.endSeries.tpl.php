<?php /* Smarty version Smarty-3.1.12, created on 2013-11-28 12:42:40
         compiled from "./templates/prints/endSeries.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94301081151ef55b3850895-74254968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb6a9d0c4be149e03b4bdb0307e8e80cd0d7dc19' => 
    array (
      0 => './templates/prints/endSeries.tpl',
      1 => 1385602929,
      2 => 'file',
    ),
    '1618c41e762b7b98a0e4fb8217ffd9d9e5d1ca69' => 
    array (
      0 => '/var/www/templates/print.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94301081151ef55b3850895-74254968',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51ef55b3a2c925_39091383',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ef55b3a2c925_39091383')) {function content_51ef55b3a2c925_39091383($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
?><!DOCTYPE html>
<html>
    <head>
        <title>Pistol Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media='all' href="stylesheets/prints/main.css">
        <link rel="stylesheet" type="text/css" media='all' href="stylesheets/prints/weekly.css">
        <link rel="stylesheet" type="text/css" media='print' href="stylesheets/print.css">
    </head>
    <body>
        <div class='page'>
            <div class='pageheader'>
                <div class='cube male'>
                    <span class='inside'>&#127942;</span>
                </div>
                <span class='header'>End Of Year Presentation</span>
                <span class='subheader'><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</span>
                <div class='cube female'>
                    <span class='inside'>&#127942;</span>
                </div>
                <span style='display:block; clear:both'></span>
            </div>

            
	<style type="text/css">
		.value {
			margin: 8px inherit !important;
		}
		.title {
			margin: 8px 10px !important;
		}
		h2 {
			font-size: 1.3em;
		}
	</style>

	<h1>Weekly Stats</h1>
	<span class='title'>Total Shooters</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['stats']->value['total'];?>
 - (<?php echo $_smarty_tpl->tpl_vars['stats']->value['prb'][0];?>
 Pistol, <?php echo $_smarty_tpl->tpl_vars['stats']->value['prb'][1];?>
 Rifle and <?php echo $_smarty_tpl->tpl_vars['stats']->value['prb'][2];?>
 Both)</span>
	<span class='title'>Pistol Shooters</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['stats']->value['mfj'][0];?>
 Males, <?php echo $_smarty_tpl->tpl_vars['stats']->value['mfj'][1];?>
 Females, and <?php echo $_smarty_tpl->tpl_vars['stats']->value['mfj'][2];?>
 Juniors</span>
	<span class='title'>Total Matches</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['stats']->value['matches'][0]+$_smarty_tpl->tpl_vars['stats']->value['matches'][1];?>
 (<?php echo $_smarty_tpl->tpl_vars['stats']->value['matches'][0];?>
 Pistol and <?php echo $_smarty_tpl->tpl_vars['stats']->value['matches'][1];?>
 Rifle)</span>
	<span class='title'>Total Cards Scored</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['stats']->value['cards'][0]+$_smarty_tpl->tpl_vars['stats']->value['cards'][1];?>
 (<?php echo $_smarty_tpl->tpl_vars['stats']->value['cards'][0];?>
 Pistol and <?php echo $_smarty_tpl->tpl_vars['stats']->value['cards'][1];?>
 Rifle)</span>
	<span class='title'>Total Shots Fired</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['stats']->value['shots'][0]+$_smarty_tpl->tpl_vars['stats']->value['shots'][1];?>
 (<?php echo $_smarty_tpl->tpl_vars['stats']->value['shots'][0];?>
 Pistol and <?php echo $_smarty_tpl->tpl_vars['stats']->value['shots'][1];?>
 Rifle)</span>
	<span style='clear:both; display:block;'></span>

	<h1 class='second'>Aggregate Winners</h1>
	<div class='block male'>
		<h2>Male Winners</h2>
		<?php if (count($_smarty_tpl->tpl_vars['maleAgg']->value)>0){?>
			<table>
				<tr>
					<th>Pos</th>
					<th>Name</th>
					<th>Points</th>
					<th>Count</th>
					<th>Max</th>
					<th>Avg</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleAgg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
	<div class='block female'>
		<h2>Female Winners</h2>
		<?php if (count($_smarty_tpl->tpl_vars['femaleAgg']->value)>0){?>
		<table>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Points</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleAgg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<span style='display:block; clear:both; margin-bottom: 5mm'></span>
<h1>Series Top Shots</h1>
<div class='block male'>
	<h2>Male Top Shot</h2>
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
<div class='block female'>
	<h2>Female Top Shot</h2>
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
</div>
<div class='page' style='clear:both; padding-top: 10mm'>
 <div class='pageheader'>
        <div class='cube male'>
            <span class='inside'>&#127942;</span>
        </div>
        <span class='header'>Series Overall</span>
        <span class='subheader'><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</span>
        <div class='cube female'>
            <span class='inside'>&#127942;</span>
        </div>
        <span style='display:block; clear:both'></span>
 </div>
	<h1>Overall For the Series</h1>
	<div class='block male'>
	<h2>Male Shooters</h2>
	<?php if (count($_smarty_tpl->tpl_vars['maleOverall']->value)>0){?>
		<table class='newTable male'>
			<tr>
				<th>Name</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleOverall']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<td><span style='font-size:0.8em'><span style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span>, <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
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
	<div class='block female'>
	<h2>Female Shooters</h2>
	<?php if (count($_smarty_tpl->tpl_vars['femaleOverall']->value)>0){?>
		<table class='newTable female'>
			<tr>
				<th>Name</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleOverall']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
				<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
				<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
					<td><span style='font-size:0.8em'><span style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span>, <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
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

        </div>
    </body>
</html><?php }} ?>