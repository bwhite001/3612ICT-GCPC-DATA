<?php /* Smarty version Smarty-3.1.12, created on 2013-05-25 10:26:06
         compiled from "./templates/dashboardTabs/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1418024889519d8075a6faf2-44412531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5428d16517623cb026f7bc0e3e3050e785b5348' => 
    array (
      0 => './templates/dashboardTabs/stats.tpl',
      1 => 1369437837,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1368063232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1418024889519d8075a6faf2-44412531',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_519d8075a70853_61393164',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519d8075a70853_61393164')) {function content_519d8075a70853_61393164($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Scoring Administration Stats</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/statsMain.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        
	<?php if ($_smarty_tpl->tpl_vars['hasJs']->value){?>
	    <script src="clientscripts/libraries/RGraph.common.core.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.key.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.dynamic.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.effects.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.tooltips.js" ></script>
	    <script src="clientscripts/libraries/RGraph.bar.js" ></script>
	    <script src="clientscripts/libraries/RGraph.line.js" ></script>
	    <script src="clientscripts/libraries/jquery.min.js" ></script>
		<script src="clientscripts/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
.js"></script>
	<?php }?>

	<link rel="stylesheet" type="text/css" href="stylesheets/dash/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
.css">

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
                    
	<div id='miniNav'>
		<ul>
			<li>
				<a <?php if ($_smarty_tpl->tpl_vars['miniNav']->value=='s'){?>id='miniNavSelected'<?php }else{ ?> href='dash.php?t=ts'<?php }?>>
					<span class='left'>Shooter Stats</span>
					<span class='right'>&#128101;</span>
				</a>
			</li>
			<li>
				<a <?php if ($_smarty_tpl->tpl_vars['miniNav']->value=='e'){?>id='miniNavSelected'<?php }else{ ?> href='dash.php?t=te'<?php }?>>
					<span class='left'>Current Series Stats</span>
					<span class='right'>&#128203;</span>
				</a>
			</li>
			<li>
				<a <?php if ($_smarty_tpl->tpl_vars['miniNav']->value=='y'){?>id='miniNavSelected'<?php }else{ ?> href='dash.php?t=ty'<?php }?>>
					<span class='left'>Yearly Stats</span>
					<span class='right'>&#128197;</span>
				</a>
			</li>
		</ul>
	</div>
	<div id='statsContent'>
		<?php echo $_smarty_tpl->getSubTemplate ("dashboardTabs/stats/".((string)$_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>