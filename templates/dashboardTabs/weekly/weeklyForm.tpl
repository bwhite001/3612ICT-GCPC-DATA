{extends file="../../core.tpl"}
{block name=title}Pistol Scoring Administration{/block}
{block name=template}weeklyForm{/block}
{block name=body}
    {if $table == "rifle_scores"}
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
    {/if}
    {assign "urri" urlencode($goBack)}
	<h1><a class='back button edit' href="dash.php?t=se&id={$shooter.id}&backurl={$urri}">Edit Shooter</a>{$type} Score - {$shooter.firstname} {$shooter.lastname}<a class='back button' href="{$goBack}">Cancel</a></h1>
	<form action='action.php' method='post' id='weeklyForm'>
		{if $table=='scores'}
			<span class="formTitle">Handicap:</span>
	        <input class='formText' type="text" name="handicap" value='{$score.handicap}'>
        {else}
        	<span class="formTitle">Match:</span>
	        <select class='formText select'>
                {for $i=0 to 2}
                <option value='{$i}'>{$matchTitles[$i]}</option>
                {/for}
	        </select>
        {/if}
        <span class="formTitle">Score:</span>
        <input class='formText' type="text" name="Handicap" value='{$score.handicap}'>
        <input type='submit' class='button formtext' value='{$type}'>
        {if $type == "Edit"}
            <input type='hidden' name='id' value='{$score.id}'>
            <input type='hidden' name='code' value='we'>
        {else}
            <input type='hidden' name='code' value='wa'>
        {/if}

            <input type='hidden' name='series_id' value='{$series_id}'>
            <input type='hidden' name='date' value='{$date}'>

        	<input type='hidden' name='table' value='{$table}'>
            <input type='hidden' name='return_url' value='{$goBack}'>
        {if $table=='scores'}
            {if $shooter.male == "1"}
                <input type='hidden' name='match' value='600'>
            {else}
                <input type='hidden' name='match' value='400'>
            {/if}
        {else}
            <input type='hidden' name='match' value='300'>
        {/else}
    </form>
    <span style='display:block; clear:both; margin-bottom: 20px'></span>
{/block}