<?php /* Smarty version Smarty-3.1.12, created on 2013-05-13 23:51:32
         compiled from "./templates/dashboardTabs/weekly.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2074431478518b904b667299-42543098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff758a374125be99dfa9c2e3f75114b86d386084' => 
    array (
      0 => './templates/dashboardTabs/weekly.tpl',
      1 => 1368449490,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1368063232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2074431478518b904b667299-42543098',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518b904b6b1ad0_83311540',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518b904b6b1ad0_83311540')) {function content_518b904b6b1ad0_83311540($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/weeklyScores.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        <script src="clientscripts/weekly.js"></script>
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
                    
	<?php if ($_smarty_tpl->tpl_vars['type']->value=="Rifle"){?>
		<style type="text/css">
			#content h1 {
				background-color: #090;
			}
			#content h2 {
				background-color: #0C0;
			}
			#currentSeries {
				background-color: #5F7;
				border: solid 1px #0F3;
				color: #000;
			}
		</style>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars["cleanDate"] = new Smarty_variable(date("D jS M",$_smarty_tpl->tpl_vars['weekDate']->value), null, 0);?>
	<?php $_smarty_tpl->tpl_vars["checkDate"] = new Smarty_variable(date("Y-m-d",$_smarty_tpl->tpl_vars['weekDate']->value), null, 0);?>
	<h1><em><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</em> Weekly Scoring For <?php echo $_smarty_tpl->tpl_vars['cleanDate']->value;?>
 <a class='button' href='dash.php?t=<?php echo $_smarty_tpl->tpl_vars['thisUrl']->value;?>
'style="font-size: 0.5em;float: right;margin-top: 2px;">Cancel</a></h1>


	<div id='topSeachBox' style='height: 60px'>
		<div id='searchMain'>
			<span id='magGlass'>&#128269;</span>
			<?php if ($_smarty_tpl->tpl_vars['type']->value=="Pistol"){?>
				<input type='text' id='searchBox' onKeyup="search('pwa','<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['checkDate']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['current_series']->value['id'];?>
')">
			<?php }else{ ?>
				<input type='text' id='searchBox' onKeyup="search('rwa','<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['checkDate']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['current_series']->value['id'];?>
')">
			<?php }?>
		</div>
		<div id='listResults'>
			<p id="searchResultsText">Search For Shooters</p>
			<ul id='searchResults'>
			</ul>
		</div>
	</div>
	<?php if (count($_smarty_tpl->tpl_vars['scores']->value)>0){?>
		<h2>Current Scores - Total <?php echo count($_smarty_tpl->tpl_vars['scores']->value);?>
</h2>
		<table>
			<tr>
				<th width='40%'>Name</th>
				<th width='10%'>Score</th>
				<?php if ($_smarty_tpl->tpl_vars['type']->value=="Pistol"){?>
					<th width='10%'>Handicap</th>
				<?php }else{ ?>
					<th width='30%'>Match Type</th>
				<?php }?>
				<th colspan='2' width='30%'>Edit / Delete</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value){
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['type']->value=="Pistol"){?>
					<?php if ($_smarty_tpl->tpl_vars['score']->value['handicap']<0){?>
						<?php $_smarty_tpl->tpl_vars["sString"] = new Smarty_variable("(Supported)", null, 0);?>
						<?php $_smarty_tpl->tpl_vars["hcap"] = new Smarty_variable("N/A", null, 0);?>
					<?php }else{ ?>
						<?php $_smarty_tpl->tpl_vars["hcap"] = new Smarty_variable($_smarty_tpl->tpl_vars['score']->value['handicap'], null, 0);?>

						<?php $_smarty_tpl->tpl_vars["sString"] = new Smarty_variable('', null, 0);?>
					<?php }?>
				<?php }else{ ?>
					<?php $_smarty_tpl->tpl_vars["hcap"] = new Smarty_variable($_smarty_tpl->tpl_vars['score']->value['match'], null, 0);?>
				<?php }?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['sString']->value;?>
 
						<?php if ($_smarty_tpl->tpl_vars['score']->value['male']=='1'){?>
							<span class='gender male'>Male</span>
						<?php }else{ ?>
							<span class='gender female'>Female</span>
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
					<?php if ($_smarty_tpl->tpl_vars['type']->value=="Pistol"){?>
						<td><?php echo $_smarty_tpl->tpl_vars['hcap']->value;?>
</td>
					<?php }else{ ?>
						<td><?php echo $_smarty_tpl->tpl_vars['matchTitles']->value[$_smarty_tpl->tpl_vars['hcap']->value];?>
</td>
					<?php }?>

					<?php $_smarty_tpl->tpl_vars["uri"] = new Smarty_variable(urlencode($_smarty_tpl->tpl_vars['current_uri']->value), null, 0);?>
					<td><a class='button edit' href='dash.php?t=<?php echo $_smarty_tpl->tpl_vars['thisUrl']->value;?>
we&id=<?php echo $_smarty_tpl->tpl_vars['score']->value['id'];?>
&backurl=<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
'>Edit</a></td>

					<?php if ($_smarty_tpl->tpl_vars['type']->value=="Pistol"){?>
						<td><a class='button delete' href='action.php?code=wd&id=<?php echo $_smarty_tpl->tpl_vars['score']->value['id'];?>
&table=scores&backurl=<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
'>Delete</a></td>
					<?php }else{ ?>
						<td><a class='button delete' href='action.php?code=wd&id=<?php echo $_smarty_tpl->tpl_vars['score']->value['id'];?>
&table=rifle_scores&backurl=<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
'>Delete</a></td>
					<?php }?>
				</tr>
			<?php } ?>
		</table>
		<script type="text/javascript">
			$(".button.delete").click(function (event) {
				if (!confirm('Are you sure you want to delete this score?')) {
					event.preventDefault();
				}
			});
		</script>
	<?php }else{ ?>
	<h2>No Current Scores</h2>
	<p style="text-align: center;font-size: 23px;">There Are No Scores for Today<p>
	<?php }?>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>