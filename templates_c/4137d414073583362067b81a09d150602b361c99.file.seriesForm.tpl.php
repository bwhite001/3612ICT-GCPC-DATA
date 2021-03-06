<?php /* Smarty version Smarty-3.1.12, created on 2014-01-28 10:27:51
         compiled from "./templates/dashboardTabs/series/seriesForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68887124652e6eb77e2d754-29680832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4137d414073583362067b81a09d150602b361c99' => 
    array (
      0 => './templates/dashboardTabs/series/seriesForm.tpl',
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
  'nocache_hash' => '68887124652e6eb77e2d754-29680832',
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
  'unifunc' => 'content_52e6eb781643c8_45308634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e6eb781643c8_45308634')) {function content_52e6eb781643c8_45308634($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Create / Edit Series</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/seriesForm.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
                    
<h1>Series Administration Add / Edit Series <a class='back button' href="<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
">Cancel</a></h1>
<?php if ($_smarty_tpl->tpl_vars['type']->value=="Add"){?>
   <h2><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Series</h2>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars["cleanDate"] = new Smarty_variable(date("Y-m-d",strtotime($_smarty_tpl->tpl_vars['series']->value['date_started'])), null, 0);?>
	<?php $_smarty_tpl->tpl_vars["currentYear"] = new Smarty_variable(date("Y",strtotime($_smarty_tpl->tpl_vars['series']->value['date_started'])), null, 0);?>
    <h2><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Series - Series <?php echo $_smarty_tpl->tpl_vars['series']->value['snumber'];?>
 | <?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
</h2>
<?php }?>
<form action='action.php' method='post' id='seriesForm'>
    <span class="formTitle">Series Number:</span>
    <input class='formText' type="number" name="snumber" value='<?php echo $_smarty_tpl->tpl_vars['series']->value['snumber'];?>
'>
    <span class="formTitle">Start Date (YYYY-MM-DD):</span>
    <input class='formText' type="text" name="date_started" id="datepicker" value='<?php echo $_smarty_tpl->tpl_vars['series']->value['date_started'];?>
'>
    <span class="formTitle">Length: (weeks)</span>
    <input class='formText' type="number" name="length" value='<?php echo $_smarty_tpl->tpl_vars['series']->value['length'];?>
'>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="Edit"){?>
        <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['series']->value['id'];?>
'>
        <input type='hidden' name='code' value='ee'>
    <?php }else{ ?>
        <input type='hidden' name='code' value='ea'>
    <?php }?>
        <input type='hidden' name='return_url' value='<?php echo $_smarty_tpl->tpl_vars['goBack']->value;?>
'>

        <input type='submit' class='button formtext' value='<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'>
</form>
<span style="display:block; clear:both; height: 20px;"></span>
<script type="text/javascript">
  $(function() {
    $("#datepicker").datepicker(
    {
        dateFormat: 'yy-mm-dd',
        defaultDate: '<?php echo $_smarty_tpl->tpl_vars['cleanDate']->value;?>
'
    });
  });
</script>

                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html>
<?php }} ?>