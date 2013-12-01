<?php /* Smarty version Smarty-3.1.12, created on 2013-06-01 06:59:39
         compiled from "./templates/dashboardTabs/series.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79045895251a9012b39c4b1-51360886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450d55537aa7c1f1928ce69b7150264ef86fbb22' => 
    array (
      0 => './templates/dashboardTabs/series.tpl',
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
  'nocache_hash' => '79045895251a9012b39c4b1-51360886',
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
  'unifunc' => 'content_51a9012b740500_82710937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a9012b740500_82710937')) {function content_51a9012b740500_82710937($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Series Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/series.css">
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
                    
	<h1>Series Administration</h1>
	<?php if (count($_smarty_tpl->tpl_vars['allYears']->value)>1){?>
		<p id='Listbox'>
			<span class='listboxTitle'>Pick A Year: </span>
			<?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allYears']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['year']->value['year']==$_smarty_tpl->tpl_vars['currentYear']->value){?>
					<span class='list_letter selected'><?php echo $_smarty_tpl->tpl_vars['year']->value['year'];?>
</span>
				<?php }else{ ?>
					<span class='list_letter'><a href='dash.php?t=e&year=<?php echo $_smarty_tpl->tpl_vars['year']->value['year'];?>
#Listbox'><?php echo $_smarty_tpl->tpl_vars['year']->value['year'];?>
</a></span>
				<?php }?>
			<?php } ?>
		</p>
	<?php }?>
	<h2>All Series in <?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
 <a class='button' href='dash.php?t=ea&backurl=<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
'style="font-size: 0.5em;float: right;margin-top: 2px;">New</a></h2>
	<?php if ($_smarty_tpl->tpl_vars['totalPages']->value>1){?>
		<p style='text-align:center; font-size: 0.8em;'>Page <?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
 out of <?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
</p>
	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['allSeries']->value)>0){?>
		<table id='seriesTable'>
			<tr>
				<th width='10%'>Series Number</th>
				<th width='25%'>Start Date</th>
				<th width='10%'>Length</th>
				<th width='25%'>Pres Date</th>
				<th width='30%' colspan='2'>Edit / Set Current Series</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['series'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['series']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allSeries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['series']->key => $_smarty_tpl->tpl_vars['series']->value){
$_smarty_tpl->tpl_vars['series']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars["date"] = new Smarty_variable(getSeriesDates($_smarty_tpl->tpl_vars['series']->value['date_started'],$_smarty_tpl->tpl_vars['series']->value['length']), null, 0);?>

				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['series']->value['snumber'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['date']->value['s'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['series']->value['length'];?>
 Week<?php if ($_smarty_tpl->tpl_vars['series']->value['length']>1){?>s<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['date']->value['f'];?>
</td>
					<td><a style='color: #07B;' href='dash.php?t=ee&id=<?php echo $_smarty_tpl->tpl_vars['series']->value['id'];?>
'>Edit Series</a></td>
					<?php if ($_smarty_tpl->tpl_vars['current_series']->value['id']!=$_smarty_tpl->tpl_vars['series']->value['id']){?>
						<td><a style='color: #07B;' href='action.php?code=ec&series_id=<?php echo $_smarty_tpl->tpl_vars['series']->value['id'];?>
&return_url=<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
'>Set As Current</a></td>
					<?php }else{ ?>
						<td>Current Series</td>
					<?php }?>

				</tr>
			<?php } ?>
		</table>
	<?php }else{ ?>
		<p style='margin:10px auto; text-align:center; font-size: 1.8em'>
			Please Create A Series
		</p>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['totalPages']->value>1){?>
		<div id="pages">
			<?php if ($_smarty_tpl->tpl_vars['currentPage']->value==1){?>
				<span class='prev list_page disabled'>Previous</span>
			<?php }else{ ?>
				<span class='prev list_page'><a href='dash.php?t=e&year=<?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
#pages'>Previous</a></span>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int)ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0){
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++){
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->tpl_vars['currentPage']->value){?>
					<span class='list_page selected'><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span>
				<?php }else{ ?>
					<span class='list_page'><a href='dash.php?t=e&year=<?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
#pages'><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></span>
				<?php }?>
			<?php }} ?>
			<?php if ($_smarty_tpl->tpl_vars['currentPage']->value==$_smarty_tpl->tpl_vars['totalPages']->value){?>
				<span class='next list_page disabled'>Next</span>
			<?php }else{ ?>
				<span class='next list_page'><a href='dash.php?t=e&year=<?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
#pages'>Next</a></span>
			<?php }?>
		</div>
	<?php }?>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>