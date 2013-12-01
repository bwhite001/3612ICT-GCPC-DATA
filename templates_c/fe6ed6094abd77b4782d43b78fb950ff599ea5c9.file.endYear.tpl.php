<?php /* Smarty version Smarty-3.1.12, created on 2013-11-30 23:12:19
         compiled from "./templates/prints/endYear.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105914923852969fb11fe359-97421728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe6ed6094abd77b4782d43b78fb950ff599ea5c9' => 
    array (
      0 => './templates/prints/endYear.tpl',
      1 => 1385813529,
      2 => 'file',
    ),
    '1618c41e762b7b98a0e4fb8217ffd9d9e5d1ca69' => 
    array (
      0 => '/var/www/templates/print.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
    '7d29c202dfed614c2b115318e19b440fef8da318' => 
    array (
      0 => './templates/prints/endYearSeries.tpl',
      1 => 1385811962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105914923852969fb11fe359-97421728',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52969fb195eee4_96442203',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52969fb195eee4_96442203')) {function content_52969fb195eee4_96442203($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
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

	<?php /*  Call merged included template "prints/endYearSeries.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('prints/endYearSeries.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '105914923852969fb11fe359-97421728');
content_5299d624222b70_30633463($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "prints/endYearSeries.tpl" */?>
</div>
<div class='page' style='clear:both; padding-top: 10mm'>
    <div class='pageheader'>
        <div class='cube male'>
            <span class='inside'>&#127942;</span>
        </div>
        <span class='header'>Weekly Stats Series <?php echo $_smarty_tpl->tpl_vars['series']->value['snumber'];?>
 | Page 2</span>
        <span class='subheader'><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</span>
        <div class='cube female'>
            <span class='inside'>&#127942;</span>
        </div>
        <span style='display:block; clear:both'></span>
    </div>
	<h1>Yearly Point Winners</h1>
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
						<?php $_smarty_tpl->tpl_vars["cleanDate"] = new Smarty_variable(date("jS M",$_smarty_tpl->tpl_vars['score']->value['date']), null, 0);?>
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
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['cleanDate']->value;?>
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
	<span style='display:block; clear:both'></span>
	<h1 class='second'>Yearly Overall</h1>
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
						<?php $_smarty_tpl->tpl_vars["cleanDate"] = new Smarty_variable(date("jS M",$_smarty_tpl->tpl_vars['score']->value['date']), null, 0);?>
						<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['count'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
							<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['cleanDate']->value;?>
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
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2013-11-30 23:12:20
         compiled from "./templates/prints/endYearSeries.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5299d624222b70_30633463')) {function content_5299d624222b70_30633463($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
?><h1 class='second'>Series Summary</h1>
<?php  $_smarty_tpl->tpl_vars['series'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['series']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aggArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['series']->key => $_smarty_tpl->tpl_vars['series']->value){
$_smarty_tpl->tpl_vars['series']->_loop = true;
?>
	<?php $_smarty_tpl->tpl_vars["seriesNum"] = new Smarty_variable($_smarty_tpl->tpl_vars['series']->value['num'], null, 0);?>
	<?php $_smarty_tpl->tpl_vars["maleAgg"] = new Smarty_variable($_smarty_tpl->tpl_vars['series']->value['maleAgg'], null, 0);?>
	<?php $_smarty_tpl->tpl_vars["femaleAgg"] = new Smarty_variable($_smarty_tpl->tpl_vars['series']->value['femaleAgg'], null, 0);?>
	<h3 class='series-title'>Series <?php echo $_smarty_tpl->tpl_vars['seriesNum']->value;?>
</h3>
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
<span style='clear:both; display:block; margin-bottom: 5mm'></span>
<?php } ?><?php }} ?>