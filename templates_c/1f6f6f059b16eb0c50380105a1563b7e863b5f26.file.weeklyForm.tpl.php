<?php /* Smarty version Smarty-3.1.12, created on 2013-05-23 13:11:57
         compiled from "./templates/dashboardTabs/weekly/weeklyForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1980736818518e3a5d6ab7c9-66475404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f6f6f059b16eb0c50380105a1563b7e863b5f26' => 
    array (
      0 => './templates/dashboardTabs/weekly/weeklyForm.tpl',
      1 => 1369275055,
      2 => 'file',
    ),
    '41f71335de1fbf1321cccb138f7a8cc956f0ff30' => 
    array (
      0 => '/var/www/gcpc/templates/core.tpl',
      1 => 1368063232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1980736818518e3a5d6ab7c9-66475404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518e3a5d708545_10307367',
  'variables' => 
  array (
    'error_string' => 0,
    'error_is_good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518e3a5d708545_10307367')) {function content_518e3a5d708545_10307367($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Pistol Scoring Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/weeklyForm.css">
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
	<h1><a class='back button edit' href="dash.php?t=se&id=<?php echo $_smarty_tpl->tpl_vars['shooter']->value['id'];?>
&backurl=<?php echo $_smarty_tpl->tpl_vars['urri']->value;?>
">Edit Shooter</a><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Score - <?php echo $_smarty_tpl->tpl_vars['shooter']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['shooter']->value['lastname'];?>
<a class='back button' href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
">Cancel</a></h1>
	<form action='action.php' method='post' id='weeklyForm'>
		<?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
			<span class="formTitle">Handicap:</span>
	        <input class='formText' id='handicaptxt' type="number" name="handicap" old='<?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['score']->value['handicap'];?>
'>
            <div id='hiddenInput'></div>
            <div id='supported'>
                <span class="formTitle">Supported:</span>
                <input class="formText" type="checkbox" id="suportedCheck" style="width: 24px;margin-right: 48%;height: 24px;margin-top: 5px;margin-left: 0px;">
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
        <span class="formTitle">Score:</span>
        <input class='formText' type="number" name="score" value='<?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
'>
        <input type='submit' class='button formtext' value='<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'>
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
    </form>
    <?php if ($_smarty_tpl->tpl_vars['table']->value=='scores'){?>
        <?php $_smarty_tpl->tpl_vars["scoreUrl"] = new Smarty_variable("pws", null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['shooter']->value['male']=="1"){?>
            <?php $_smarty_tpl->tpl_vars["scoreMatch"] = new Smarty_variable("60", null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["scoreMatch"] = new Smarty_variable("40", null, 0);?>
        <?php }?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars["scoreUrl"] = new Smarty_variable("rws", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["scoreMatch"] = new Smarty_variable("30", null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value!='Edit'){?>
        <form action="dash.php?t=<?php echo $_smarty_tpl->tpl_vars['scoreUrl']->value;?>
" method='post'>
            <input type='hidden' name='shooter_id' value='<?php echo $_smarty_tpl->tpl_vars['shooter']->value['id'];?>
'>
            <input type='hidden' name='series_id' value='<?php echo $_smarty_tpl->tpl_vars['series_id']->value;?>
'>
            <input type='hidden' name='date' value='<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
'>
            <input type='hidden' name='match' value='<?php echo $_smarty_tpl->tpl_vars['scoreMatch']->value;?>
'>
            <input type='hidden' name='return_url' value='<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
'>
            <input class='button scoresheet' type='submit' value='Use Score Sheet'>
        </form>
    <?php }?>
    <span style='display:block; clear:both; margin-bottom: 20px'></span>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>