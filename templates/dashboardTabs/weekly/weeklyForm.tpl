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
	<h1>{$type} Score - {$shooter.firstname} {$shooter.lastname}<a class='back button' href="{$goBack}">Cancel</a></h1>
	<form action='action.php' method='post' id='weeklyForm'>
		{if $table=='scores'}
			<span class="formTitle">Handicap:</span>
	        <input class='formText' type="text" name="Handicap" value='{$score.handicap}'>
        {else}
        	<span class="formTitle">Match:</span>
	        <select class='formText select'>

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
        	<input type='hidden' name='table' value='{$table}'>
            <input type='hidden' name='return_url' value='{$goBack}'>
    </form>
    <span style='display:block; clear:both; margin-bottom: 20px'></span>
{/block}