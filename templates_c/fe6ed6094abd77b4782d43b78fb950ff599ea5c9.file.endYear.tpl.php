<?php /* Smarty version Smarty-3.1.12, created on 2013-12-11 15:44:37
         compiled from "./templates/prints/endYear.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187023084352a7e9537d4772-14579187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe6ed6094abd77b4782d43b78fb950ff599ea5c9' => 
    array (
      0 => './templates/prints/endYear.tpl',
      1 => 1386737054,
      2 => 'file',
    ),
    '1618c41e762b7b98a0e4fb8217ffd9d9e5d1ca69' => 
    array (
      0 => '/var/www/templates/print.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187023084352a7e9537d4772-14579187',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52a7e953de7c12_60869082',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a7e953de7c12_60869082')) {function content_52a7e953de7c12_60869082($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
?><!DOCTYPE html>
<html>
    <head>
        <title>Pistol Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media='all' href="stylesheets/prints/main.css">
        <link rel="stylesheet" type="text/css" media='all' href="stylesheets/prints/yearly.css">
        <link rel="stylesheet" type="text/css" media='print' href="stylesheets/print.css">
    </head>
    <body>
        <div class='page'>
            <div class='pageheader'>
                <div class='cube male'>
                    <span class='inside'>&#127942;</span>
                </div>
                <span class='header'>End Of Series Presentation</span>
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

	<h1>Yearly Stats</h1>
	<span class='title'>Total Competitors</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['stats']->value['total'];?>
 - (<?php echo $_smarty_tpl->tpl_vars['stats']->value['prb'][0];?>
 Pistol, <?php echo $_smarty_tpl->tpl_vars['stats']->value['prb'][1];?>
 Rifle and <?php echo $_smarty_tpl->tpl_vars['stats']->value['prb'][2];?>
 Both)</span>
	<span class='title'>Pistol Compertors</span>
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

	<h1 class="second">Yearly Point Winners</h1>
	<?php  $_smarty_tpl->tpl_vars['vals'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vals']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aggAll']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vals']->key => $_smarty_tpl->tpl_vars['vals']->value){
$_smarty_tpl->tpl_vars['vals']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars["cssValue"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['css'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['title'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars["shooters"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['results'], null, 0);?>
		<div class='block <?php echo $_smarty_tpl->tpl_vars['cssValue']->value;?>
'>
			<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 Winners</h2>
			<?php if (count($_smarty_tpl->tpl_vars['shooters']->value)>0){?>
				<table>
					<tr>
						<th>Pos</th>
						<th>Name</th>
						<th>Points</th>
						<th>Count</th>
						<th>Max</th>
						<th>Date</th>
						<th>Avg</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['score']->value['points'];?>
</span></td>
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</span></td>
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</span></td>
							<td><span style='font-size:0.6em'><?php echo $_smarty_tpl->tpl_vars['score']->value['date'];?>
</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
						</tr>
					<?php } ?>
				</table>
		<?php }else{ ?>
			<p style='text-align:center'>No Shooters Entered This Series</p>
		<?php }?>
		</div>
	<?php } ?>
	<span style='display:block; clear:both; margin-bottom: 5mm'></span>
	<h1>Yearly Top Shots</h1>
	<?php  $_smarty_tpl->tpl_vars['vals'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vals']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yearTopShot']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vals']->key => $_smarty_tpl->tpl_vars['vals']->value){
$_smarty_tpl->tpl_vars['vals']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars["cssValue"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['css'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['title'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars["shooters"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['results'], null, 0);?>
		<div class='block <?php echo $_smarty_tpl->tpl_vars['cssValue']->value;?>
'>
			<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 Winners</h2>
			<?php if (count($_smarty_tpl->tpl_vars['shooters']->value)>0){?>
				<table>
					<tr>
						<th>Pos</th>
						<th>Name</th>
						<th>Count</th>
						<th>Max</th>
						<th>Date</th>
						<th>Avg</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							<td><span style='font-size:0.6em'><?php echo $_smarty_tpl->tpl_vars['score']->value['date'];?>
</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
						</tr>
					<?php } ?>
				</table>
		<?php }else{ ?>
			<p style='text-align:center'>No Shooters Entered This Series</p>
		<?php }?>
		</div>
	<?php } ?>

</div>
<div class='page' style='clear:both; padding-top: 10mm'>
    <div class='pageheader'>
        <div class='cube male'>
            <span class='inside'>&#127942;</span>
        </div>
        <span class='header'>End Of Series Presentation <br/> Page 2</span>
        <span class='subheader'><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</span>
        <div class='cube female'>
            <span class='inside'>&#127942;</span>
        </div>
        <span style='display:block; clear:both'></span>
    </div>
	<h1>Yearly Overall</h1>
	<?php  $_smarty_tpl->tpl_vars['vals'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vals']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yearOverall']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vals']->key => $_smarty_tpl->tpl_vars['vals']->value){
$_smarty_tpl->tpl_vars['vals']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars["cssValue"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['css'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['title'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars["shooters"] = new Smarty_variable($_smarty_tpl->tpl_vars['vals']->value['results'], null, 0);?>
		<div class='block <?php echo $_smarty_tpl->tpl_vars['cssValue']->value;?>
'>
			<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 Winners</h2>
			<?php if (count($_smarty_tpl->tpl_vars['shooters']->value)>0){?>
				<table>
					<tr>
						<th>Name</th>
						<th>Count</th>
						<th>Max</th>
						<th>Date</th>
						<th>Avg</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['s']['index']++;
?>
						<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
						<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['score']->value['date'];?>
</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
						</tr>
					<?php } ?>
				</table>
		<?php }else{ ?>
			<p style='text-align:center'>No Shooters Entered This Series</p>
		<?php }?>
		</div>
	<?php } ?>

        </div>
    </body>
</html><?php }} ?>