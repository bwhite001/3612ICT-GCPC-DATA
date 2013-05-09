<?php /* Smarty version Smarty-3.1.12, created on 2013-05-10 00:10:21
         compiled from "./templates/dashboardTabs/weekly.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2074431478518b904b667299-42543098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff758a374125be99dfa9c2e3f75114b86d386084' => 
    array (
      0 => './templates/dashboardTabs/weekly.tpl',
      1 => 1368105019,
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
                    
	<?php $_smarty_tpl->tpl_vars["cleanDate"] = new Smarty_variable(date("D jS M",$_smarty_tpl->tpl_vars['weekDate']->value), null, 0);?>

	<h1>Weekly Scoring For <?php echo $_smarty_tpl->tpl_vars['cleanDate']->value;?>
</h1>
	<div id='topSeachBox' style='height: 60px'>
		<div id='searchMain'>
			<span id='magGlass'>&#128269;</span>
			<input type='text' id='searchBox'>
		</div>
		<div id='listResults'>
			<p id="searchResultsText">Search For Shooters</p>
			<ul id='searchResults'>
			</ul>
		</div>
	</div>
	<h2>Current Scores</h2>
	<?php if (count($_smarty_tpl->tpl_vars['scores']->value)>0){?>
	<?php }else{ ?>
	<p style="text-align: center;font-size: 23px;">There Are No Scores for Today<p>
	<?php }?>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>