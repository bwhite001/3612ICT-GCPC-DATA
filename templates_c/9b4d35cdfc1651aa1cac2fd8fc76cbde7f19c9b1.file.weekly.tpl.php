<?php /* Smarty version Smarty-3.1.12, created on 2013-11-29 00:00:36
         compiled from "./templates/prints/weekly.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114414783751abef84747d68-86109380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b4d35cdfc1651aa1cac2fd8fc76cbde7f19c9b1' => 
    array (
      0 => './templates/prints/weekly.tpl',
      1 => 1385643633,
      2 => 'file',
    ),
    '1618c41e762b7b98a0e4fb8217ffd9d9e5d1ca69' => 
    array (
      0 => '/var/www/templates/print.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114414783751abef84747d68-86109380',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51abef85099b66_01127928',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51abef85099b66_01127928')) {function content_51abef85099b66_01127928($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/libs/smarty/libs/plugins/function.cycle.php';
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
                <span class='header'>Weekly Stats Series <?php echo $_smarty_tpl->tpl_vars['series']->value['snumber'];?>
 | Page 1</span>
                <span class='subheader'><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</span>
                <div class='cube female'>
                    <span class='inside'>&#127942;</span>
                </div>
                <span style='display:block; clear:both'></span>
            </div>

            
	<h1>Weekly Stats</h1>
	<span class='title'>Total Shooters</span>
	<span class='value'><?php echo count($_smarty_tpl->tpl_vars['maleWed']->value)+count($_smarty_tpl->tpl_vars['maleFri']->value)+count($_smarty_tpl->tpl_vars['femaleWed']->value)+count($_smarty_tpl->tpl_vars['femaleFri']->value);?>
</span>
	<span class='title'>Totals Shooters Wednesday</span>
	<span class='value'><?php echo count($_smarty_tpl->tpl_vars['maleWed']->value)+count($_smarty_tpl->tpl_vars['femaleWed']->value);?>
</span>
	<span class='title'>Totals Shooters Friday</span>
	<span class='value'><?php echo count($_smarty_tpl->tpl_vars['maleFri']->value)+count($_smarty_tpl->tpl_vars['femaleFri']->value);?>
</span>
	<span class='title'>Total Male Shooters</span>
	<span class='value'><?php echo count($_smarty_tpl->tpl_vars['maleWed']->value)+count($_smarty_tpl->tpl_vars['maleFri']->value);?>
</span>
	<span class='title'>Total Female Shooters</span>
	<span class='value'><?php echo count($_smarty_tpl->tpl_vars['femaleWed']->value)+count($_smarty_tpl->tpl_vars['femaleFri']->value);?>
</span>
	<span class='title'>Weekly Top Shot Male</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['maleTS']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['maleTS']->value['score'];?>
</span>
	<span class='title'>Weekly Top Shot Female</span>
	<span class='value'><?php echo $_smarty_tpl->tpl_vars['femaleTS']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['femaleTS']->value['score'];?>
</span>

	<span style='clear:both; display:block;'></span>
	<h1 class='second'>Weekly Winners</h1>
	<div class='block male'>
		<h2>Male Winners</h2>
		<?php if (count($_smarty_tpl->tpl_vars['maleWinners']->value)>0){?>
			<table>
				<tr>
					<th>Pos</th>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleWinners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
					</tr>
				<?php } ?>
			</table>
		<?php }else{ ?>
			<p style='text-align:center'>There are no Male Winners!</p>
		<?php }?>
	</div>
	<div class='block female'>
		<h2>Female Winners</h2>
		<?php if (count($_smarty_tpl->tpl_vars['femaleWinners']->value)>0){?>
			<table>
				<tr>
					<th>Pos</th>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleWinners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							<?php if ($_smarty_tpl->tpl_vars['score']->value['total']<=400){?>
								<?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>

							<?php }else{ ?>
								<span style='color:blue'><?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>
</span>
							<?php }?>
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['score']->value['stotal'];?>
</td>
					</tr>
				<?php } ?>
			</table>
		<?php }else{ ?>
			<p style='text-align:center'>There are no Female Winners!</p>
		<?php }?>
	</div>
	<span style='display:block; clear:both'></span>
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
	<h1>Overall Wednesday <?php echo $_smarty_tpl->tpl_vars['wed']->value;?>
</h1>
		<div class='block male'>
		<h2>Male Shooters</h2>
		<?php if (count($_smarty_tpl->tpl_vars['maleWed']->value)>0){?>
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleWed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>

					<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
						<?php if ($_smarty_tpl->tpl_vars['score']->value['handicap']>-1){?>
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
						<?php }else{ ?>
						<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
 Supported</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
							<td colspan='3'>N/A</td>
						<?php }?>
						<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
					</tr>
				<?php } ?>
			</table>
		<?php }else{ ?>
			<p style='text-align:center'>There are no Male Shooters Today!</p>
		<?php }?>
	</div>
	<div class='block female'>
		<h2>Female Shooters</h2>
		<?php if (count($_smarty_tpl->tpl_vars['femaleWed']->value)>0){?>
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleWed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
					<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
						<?php if ($_smarty_tpl->tpl_vars['score']->value['handicap']>-1){?>
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
									<span style='color:blue'><?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>
</span>
								<?php }?>
							</td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['stotal'];?>
</td>
						<?php }else{ ?>
						<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
 Supported</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
							<td colspan='3'>N/A</td>
						<?php }?>
						<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
					</tr>
				<?php } ?>
			</table>
		<?php }else{ ?>
			<p style='text-align:center'>There are no Female Shooters Today!</p>
		<?php }?>
	</div>
	<span style='display:block; clear:both'></span>
	<h1 class='second'>Overall Friday <?php echo $_smarty_tpl->tpl_vars['fri']->value;?>
</h1>
		<div class='block male'>
		<h2>Male Shooters</h2>
		<?php if (count($_smarty_tpl->tpl_vars['maleFri']->value)>0){?>
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maleFri']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
					<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
						<?php if ($_smarty_tpl->tpl_vars['score']->value['handicap']>-1){?>
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
						<?php }else{ ?>
						<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
 Supported</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
							<td colspan='3'>N/A</td>
						<?php }?>
						<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
					</tr>
				<?php } ?>
			</table>
		<?php }else{ ?>
			<p style='text-align:center'>There are no Male Shooters Today!</p>
		<?php }?>
	</div>
	<div class='block female'>
		<h2>Female Shooters</h2>
		<?php if (count($_smarty_tpl->tpl_vars['femaleFri']->value)>0){?>
			<table>
				<tr>
					<th>Name</th>
					<th>Score</th>
					<th>Hcap</th>
					<th>Total</th>
					<th>STotal</th>
					<th>Avg</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['femaleFri']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars["shooter"] = new Smarty_variable(getShooter($_smarty_tpl->tpl_vars['score']->value['shooter_id']), null, 0);?>
					<tr <?php echo smarty_function_cycle(array('values'=>" ,class='newColor'"),$_smarty_tpl);?>
>
						<?php if ($_smarty_tpl->tpl_vars['score']->value['handicap']>-1){?>
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
									<span style='color:blue'><?php echo $_smarty_tpl->tpl_vars['score']->value['total'];?>
</span>
								<?php }?>
							</td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['stotal'];?>
</td>
						<?php }else{ ?>
						<td><span style='font-size:0.8em'><?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
 Supported</span></td>
							<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
							<td colspan='3'>N/A</td>
						<?php }?>
						<td><?php echo $_smarty_tpl->tpl_vars['score']->value['avg'];?>
</td>
					</tr>
				<?php } ?>
			</table>
		<?php }else{ ?>
			<p style='text-align:center'>There are no Female Shooters Today!</p>
		<?php }?>
	</div>
	<span style='display:block; clear:both; margin-bottom: 5mm'></span>

        </div>
    </body>
</html><?php }} ?>