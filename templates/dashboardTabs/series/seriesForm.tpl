{extends file="../../core.tpl"}
{block name=js}<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>{/block}
{block name=title}Create / Edit Series{/block}
{block name=template}seriesForm{/block}
{block name=body}
<h1>Series Administration Add / Edit Series <a class='back button' href="{$goBack}">Cancel</a></h1>
{if $type == "Add"}
   <h2>{$type} Series</h2>
{else}
	{assign "cleanDate" date("Y-m-d",strtotime($series.date_started))}
	{assign "currentYear" date("Y",strtotime($series.date_started))}
    <h2>{$type} Series - Series {$series.snumber} {$currentYear}</h2>
{/if}
<form action='action.php' method='post' id='seriesForm'>
    <span class="formTitle">Series Number:</span>
    <input class='formText' type="number" name="snumber" value='{$series.snumber}'>
    <span class="formTitle">Start Date (YYYY-MM-DD):</span>
    <input class='formText' type="text" name="date_started" id="datepicker" value='{$cleanDate}'>
    <span class="formTitle">Length: (weeks)</span>
    <input class='formText' type="number" name="length" value='{$series.length}'>
    {if $type == "Edit"}
        <input type='hidden' name='id' value='{$shooter.id}'>
        <input type='hidden' name='code' value='ee'>
    {else}
        <input type='hidden' name='code' value='ea'>
    {/if}
        <input type='hidden' name='return_url' value='{$goBack}'>

        <input type='submit' class='button formtext' value='{$type}'>
</form>
<span style="display:block; clear:both; height: 20px;"></span>
<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
</script>
{/block}