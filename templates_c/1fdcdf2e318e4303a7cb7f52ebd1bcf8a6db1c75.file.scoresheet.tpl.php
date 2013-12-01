<?php /* Smarty version Smarty-3.1.12, created on 2013-06-03 12:23:00
         compiled from "./templates/dashboardTabs/weekly/scoresheet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118737752451abeff4a01b10-75803872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fdcdf2e318e4303a7cb7f52ebd1bcf8a6db1c75' => 
    array (
      0 => './templates/dashboardTabs/weekly/scoresheet.tpl',
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
  'nocache_hash' => '118737752451abeff4a01b10-75803872',
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
  'unifunc' => 'content_51abeff4ede6b0_27444596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51abeff4ede6b0_27444596')) {function content_51abeff4ede6b0_27444596($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Pistol Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/scoresheet.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        <script src="clientscripts/scoresheet.js"></script>
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
                    
	<?php if ($_smarty_tpl->tpl_vars['table']->value=="rifle_scores"){?>
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
    <?php $_smarty_tpl->tpl_vars["urri"] = new Smarty_variable(urlencode($_smarty_tpl->tpl_vars['goBack']->value), null, 0);?>
	<h1>
		<a class='back button edit' style='float:left' href="dash.php?t=se&id=<?php echo $_smarty_tpl->tpl_vars['shooter']->value['id'];?>
&backurl=<?php echo $_smarty_tpl->tpl_vars['urri']->value;?>
">Edit Shooter</a>
		<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Scoresheet - <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>

			<?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
				| <?php echo $_smarty_tpl->tpl_vars['match']->value;?>
 Shot Match
			<?php }?>
		<a class='back button' href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
">Cancel</a>
	</h1>
	<form action='action.php' method='post' id='scoresheetForm' onSubmit='return <?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>checkScores()<?php }else{ ?>checkRifleScores()<?php }?>'>
		<div id='hcap'>
			<?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
				<span class="formTitle">Handicap:</span>
		        <input class='formText' id='handicaptxt' type="number" name="handicap" old='<?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
'>
	            <div id='hiddenInput'></div>
	            <div id='supported'>
	                <span class="formTitle">Supported:</span>
	                <input class="formText" type="checkbox" id="suportedCheck" style="width: 24px;margin-right: 25%;height: 24px;margin-top: 5px;margin-left: 0px;">
	                <script type="text/javascript">
	                $('#suportedCheck').mousedown(function() {
	                        if (!$(this).is(':checked')) {
	                            $("#handicaptxt").attr("disabled", "disabled"); 
	                            $("#handicaptxt").attr("old", $("#handicaptxt").val());
	                            $("#handicaptxt").val("-1");
	                            $("#hiddenInput").html("<input type='hidden' name='handicap' value='-1'>");
	                        }
	                        else {
	                            $("#handicaptxt").removeAttr("disabled");
	                            $("#handicaptxt").val($("#handicaptxt").attr("old"));
	                            $("#hiddenInput").html("");
	                        }

	                    });
	                <?php if ($_smarty_tpl->tpl_vars['score']->value['handicap']==-1){?>
	                    $("#handicaptxt").attr("disabled", "disabled"); 
	                    $("#handicaptxt").attr("old", $("#handicaptxt").val());
	                    $("#handicaptxt").val("-1");

	                    $("#hiddenInput").html("<input type='hidden' name='handicap' value='-1'>");

	                    $("#suportedCheck").attr("checked", "checked");
	                <?php }?>
	                </script>
	            </div>
	        <?php }else{ ?>
		        <span class="formTitle">Match:</span>
		        <select class='formText select' name='handicap'>
	                <?php if ($_smarty_tpl->tpl_vars['type']->value=="Edit"){?>
	                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	                        <?php if ($_smarty_tpl->tpl_vars['score']->value['match']==$_smarty_tpl->tpl_vars['i']->value){?>
	                            <option value='<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' selected><?php echo $_smarty_tpl->tpl_vars['matchTitles']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</option>
	                        <?php }else{ ?>
	                            <option value='<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['matchTitles']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</option>
	                        <?php }?>
	                    <?php }} ?>
	                <?php }else{ ?>
	                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	                        <option value='<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['matchTitles']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</option>
	                    <?php }} ?>
	                <?php }?>
		        </select>
		    <?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['type']->value=="Edit"){?>
            <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['score']->value['id'];?>
'>
            <input type='hidden' name='code' value='we'>
        <?php }else{ ?>
            <input type='hidden' name='code' value='wa'>
        <?php }?>
            <input type='hidden' name='shooter_id' value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['id'];?>
'>
            <input type='hidden' name='series_id' value='<?php echo $_smarty_tpl->tpl_vars['series_id']->value;?>
'>
            <input type='hidden' name='date' value='<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
'>

        	<input type='hidden' name='table' value='<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
'>
            <input type='hidden' name='return_url' value='<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
'>
            <input type='hidden' name='this_url' value='<?php echo $_smarty_tpl->tpl_vars['current_uri']->value;?>
'>
        <?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
            <?php if ($_smarty_tpl->tpl_vars['shooter']->value['male']=="1"){?>
                <input type='hidden' name='match' value='600'>
            <?php }else{ ?>
                <input type='hidden' name='match' value='400'>
            <?php }?>
        <?php }else{ ?>
            <input type='hidden' name='match' value='300'>
        <?php }?>
        <span style='display:block; clear:both; margin-bottom: 20px'></span>
       	<table>
	    	<tr>
	    		<?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
		    		<th>Card</th>
		    	<?php }else{ ?>
		    		<th>Shots</th>
		    	<?php }?>
	    		<th>1<sup>st</sup> Shot</th>
	    		<th>2<sup>nd</sup> Shot</th>
	    		<th>3<sup>rd</sup> Shot</th>
	    		<th>4<sup>th</sup> Shot</th>
	    		<th>5<sup>th</sup> Shot</th>
	    		<th>5 Shot Total</th>
	    		<th>10 Shot Total</th>
	    	</tr>
	    	<?php $_smarty_tpl->tpl_vars['shot'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['shot']->step = 1;$_smarty_tpl->tpl_vars['shot']->total = (int)ceil(($_smarty_tpl->tpl_vars['shot']->step > 0 ? $_smarty_tpl->tpl_vars['match']->value/5+1 - (1) : 1-($_smarty_tpl->tpl_vars['match']->value/5)+1)/abs($_smarty_tpl->tpl_vars['shot']->step));
if ($_smarty_tpl->tpl_vars['shot']->total > 0){
for ($_smarty_tpl->tpl_vars['shot']->value = 1, $_smarty_tpl->tpl_vars['shot']->iteration = 1;$_smarty_tpl->tpl_vars['shot']->iteration <= $_smarty_tpl->tpl_vars['shot']->total;$_smarty_tpl->tpl_vars['shot']->value += $_smarty_tpl->tpl_vars['shot']->step, $_smarty_tpl->tpl_vars['shot']->iteration++){
$_smarty_tpl->tpl_vars['shot']->first = $_smarty_tpl->tpl_vars['shot']->iteration == 1;$_smarty_tpl->tpl_vars['shot']->last = $_smarty_tpl->tpl_vars['shot']->iteration == $_smarty_tpl->tpl_vars['shot']->total;?>
		    	<tr>
		    		<?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
		    			<td><?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
</td>
		    		<?php }else{ ?>
		    			<td><?php echo ($_smarty_tpl->tpl_vars['shot']->value-1)*5;?>
</td>
		    		<?php }?>
		    		<td class='inputInside'><input class='formText table row<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
' id='tableText<?php echo ($_smarty_tpl->tpl_vars['shot']->value-1)*5+0;?>
' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
' id='tableText<?php echo ($_smarty_tpl->tpl_vars['shot']->value-1)*5+1;?>
' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
' id='tableText<?php echo ($_smarty_tpl->tpl_vars['shot']->value-1)*5+2;?>
' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
' id='tableText<?php echo ($_smarty_tpl->tpl_vars['shot']->value-1)*5+3;?>
' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
' id='tableText<?php echo ($_smarty_tpl->tpl_vars['shot']->value-1)*5+4;?>
' type='number' value='0'></td>
		    		<td class='inputInside' id='rowTotal<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
'>0</td>
		    		<?php if ($_smarty_tpl->tpl_vars['shot']->value%2==1){?>
		    			<td class='inputInside dTotal' rowspan='2' id='doubleTotal<?php echo $_smarty_tpl->tpl_vars['shot']->value;?>
'>0</td>
		    		<?php }?>
		    	</tr>
	    	<?php }} ?>
	    	<tr>
	    		<td colspan='7' style='text-align:right'>Total Score:</td>
	    		<td class='inputInside' id='overTotalDisplay'>0</td>
	    	</tr>
	    	<input id='overallTotal' name='score' type='hidden' value='0'>
    </table>
    <input class='button' style="display: block;margin: auto;" type='submit' value='Submit'>
    </form>
    <script type="text/javascript">
    	var shots = <?php echo $_smarty_tpl->tpl_vars['match']->value;?>
;
    </script>
    <span style='display:block; clear:both; margin-bottom: 20px'></span>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>