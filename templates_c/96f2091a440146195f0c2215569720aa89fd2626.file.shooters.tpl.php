<?php /* Smarty version Smarty-3.1.12, created on 2013-12-11 15:27:11
         compiled from "./templates/dashboardTabs/shooters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181235886752a7e99f1ba0d6-13696874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96f2091a440146195f0c2215569720aa89fd2626' => 
    array (
      0 => './templates/dashboardTabs/shooters.tpl',
      1 => 1370008508,
      2 => 'file',
    ),
    'a2ae5f1c08e748db862e1ff7d4d582d6fb0ebb6f' => 
    array (
      0 => '/var/www/templates/core.tpl',
      1 => 1370008507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181235886752a7e99f1ba0d6-13696874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52a7e99f606992_78688064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a7e99f606992_78688064')) {function content_52a7e99f606992_78688064($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Shooters Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/shooter.css">
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
                    
	<h1>Shooters Administration</h1>
	<form action='dash.php?t=s' method='get' id='searchShooters'>
		<span id='searchText'>&#128269;</span>
		<input type='text' name='query' placeholder='Search By Firstname or Lastname or Both' id="searchTextbox" value='<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
'/>

		<input class='button search' type='submit' value='Search' /> 
		<a class='button search clear' href='dash.php?t=s'>Clear</a>
	</form>
	<?php if ($_smarty_tpl->tpl_vars['query']->value!=''){?>
		<?php $_smarty_tpl->tpl_vars["q"] = new Smarty_variable("&query=".((string)$_smarty_tpl->tpl_vars['query']->value)."&", null, 0);?>
		<h2>Current Shooters that match '<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
'<a href='dash.php?t=sa' class='button' id='newshooter'>New</a></h2>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars["q"] = new Smarty_variable("&letter=".((string)$_smarty_tpl->tpl_vars['currentLetter']->value)."&", null, 0);?>
		<h2>Current Shooters <a href='dash.php?t=sa' class='button' id='newshooter'>New</a></h2>
		<span id='letterText'>Search By Last Name:</span>
		<p id='Listbox'>
			<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? 90+1 - (65) : 65-(90)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 65, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
			<?php $_smarty_tpl->tpl_vars["l"] = new Smarty_variable(chr($_smarty_tpl->tpl_vars['a']->value), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['shooterLetters']->value[$_smarty_tpl->tpl_vars['l']->value]<=0){?>
					<span class='list_letter disabled'><span style='margin: 6px 0;display: block;'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</span></span>
				<?php }elseif($_smarty_tpl->tpl_vars['l']->value==$_smarty_tpl->tpl_vars['currentLetter']->value){?>
					<span class='list_letter selected'><span style='margin: 6px 0;display: block;'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</span></span>
				<?php }else{ ?>
					<span class='list_letter'><a href='dash.php?t=s&letter=<?php echo $_smarty_tpl->tpl_vars['l']->value;?>
#Listbox'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</a></span>
				<?php }?>
			<?php }} ?>
		</p>
		<span style='display:block; clear:both'></span>
		<h3>All Shooters with the last name Starting With <?php echo $_smarty_tpl->tpl_vars['currentLetter']->value;?>
</h3>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['totalPages']->value>1){?>
		<p style='text-align:center;'>Page <?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
 out of <?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
</p>
		<div id="pages">
			<p style='margin:0px auto;float: right;'>
				<?php if ($_smarty_tpl->tpl_vars['currentPage']->value==1){?>
					<span class='prev list_letter disabled'><span style='margin: 6px 0;display: block;'>Previous</span></span>
				<?php }else{ ?>
					<span class='prev list_letter'><a href='dash.php?t=s<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
#pages'>Previous</a></span>
				<?php }?>
				<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int)ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0){
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++){
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
					<?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['currentPage']->value){?>
						<span class='list_letter selected'><span style='margin: 6px 0;display: block;'><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span></span>
					<?php }else{ ?>
						<span class='list_letter'><a href='dash.php?t=s<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
#pages'><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></span>
					<?php }?>
				<?php }} ?>
				<?php if ($_smarty_tpl->tpl_vars['currentPage']->value==$_smarty_tpl->tpl_vars['totalPages']->value){?>
					<span class='next list_letter disabled'><span style='margin: 6px 0;display: block;'>Next</span></span>
				<?php }else{ ?>
					<span class='next list_letter'><a href='dash.php?t=s<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
#pages'>Next</a></span>
				<?php }?>
			</p>
		</div>
	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['shooters']->value)>0){?>
		<table id='shooterTable'>
			<tr>
				<th width='50%'>Name</th>
				<th width='10%'>M/F</th>
				<th width='10%'>Grade</th>
				<th width='10%'>Junior</th>
				<th width='20%' colspan='2'>Edit and View Stats</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['shooter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shooter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shooters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shooter']->key => $_smarty_tpl->tpl_vars['shooter']->value){
$_smarty_tpl->tpl_vars['shooter']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
, <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['shooter']->value['male']){?>Male<?php }else{ ?>Female<?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['shooter']->value['grade']==0){?>D<?php }elseif($_smarty_tpl->tpl_vars['shooter']->value['grade']==1){?>C<?php }elseif($_smarty_tpl->tpl_vars['shooter']->value['grade']==2){?>B<?php }elseif($_smarty_tpl->tpl_vars['shooter']->value['grade']==3){?>A<?php }elseif($_smarty_tpl->tpl_vars['shooter']->value['grade']==4){?>Master<?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['shooter']->value['senior']){?>No<?php }else{ ?>Yes<?php }?></td>
					<?php $_smarty_tpl->tpl_vars["backurl"] = new Smarty_variable(urlencode("dash.php?t=s".((string)$_smarty_tpl->tpl_vars['q']->value)."page=".((string)$_smarty_tpl->tpl_vars['currentPage']->value)), null, 0);?>
					<td><a style='color:#07B' href='dash.php?t=se&id=<?php echo $_smarty_tpl->tpl_vars['shooter']->value['id'];?>
&backurl=<?php echo $_smarty_tpl->tpl_vars['backurl']->value;?>
'>Edit</a></td>
					<td><a style='color:#07B' href=''>Stats</a></td>
				</tr>
			<?php } ?>
		</table>
	<?php }else{ ?>
		<p style='margin:10px auto; text-align:center; font-size: 1.8em'>
			No Results Returned
		</p>
	<?php }?>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>