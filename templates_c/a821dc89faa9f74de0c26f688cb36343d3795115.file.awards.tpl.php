<?php /* Smarty version Smarty-3.1.12, created on 2013-07-22 18:55:54
         compiled from "./templates/dashboardTabs/awards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90433899651ece2e0c2b256-03766035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a821dc89faa9f74de0c26f688cb36343d3795115' => 
    array (
      0 => './templates/dashboardTabs/awards.tpl',
      1 => 1374479752,
      2 => 'file',
    ),
    'a2ae5f1c08e748db862e1ff7d4d582d6fb0ebb6f' => 
    array (
      0 => '/var/www/templates/core.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90433899651ece2e0c2b256-03766035',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51ece2e0d91228_35804061',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ece2e0d91228_35804061')) {function content_51ece2e0d91228_35804061($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Scoring Administration Stats</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/statsMain.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        
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
                    
	<style type="text/css">
		#miniNav li {
			width: 465px;
		}
		#miniNav ul{
			width: 930px;
		}
		#miniNav a {
			width: initial;
		}
	</style>
	<div id='miniNav'>
		<ul>
			<li>
				<a <?php if ($_smarty_tpl->tpl_vars['miniNav']->value=='e'){?> id='miniNavSelected'<?php }else{ ?> href='dash.php?t=ae'<?php }?>>
					<span class='left'>Series Awards</span>
					<span class='right'>&infin;</span>
				</a>
			</li>
			<li>
				<a <?php if ($_smarty_tpl->tpl_vars['miniNav']->value=='y'){?> id='miniNavSelected'<?php }else{ ?> href='dash.php?t=ay'<?php }?>>
					<span class='left'>Yearly Awards</span>
					<span class='right'>&#128203;</span>
				</a>
			</li>
		</ul>
	</div>
	<div id='statsContent'>
		<?php echo $_smarty_tpl->getSubTemplate ("dashboardTabs/awards/".((string)$_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>