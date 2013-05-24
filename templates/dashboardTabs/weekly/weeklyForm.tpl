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
	        <input class='formText' id='handicaptxt' type="number" name="handicap" old='{$score.handicap}' value='{$score.handicap}'>
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
                {if $score.handicap == -1}
                    $("#handicaptxt").attr("disabled", "disabled"); 
                    $("#handicaptxt").attr("old", $("#handicaptxt").val());
                    $("#handicaptxt").val("-1");

                    $("#hiddenInput").html("<input type='hidden' name='handicap' value='-1'>");

                    $("#suportedCheck").attr("checked", "checked");
                {/if}
                </script>
            </div>
        {else}
        	<span class="formTitle">Match:</span>
	        <select class='formText select' name='handicap'>
                {if $type == "Edit"}
                    {for $i=0 to 2}
                        {if $score.match == $i}
                            <option value='{$i}' selected>{$matchTitles[$i]}</option>
                        {else}
                            <option value='{$i}'>{$matchTitles[$i]}</option>
                        {/if}
                    {/for}
                {else}
                    {for $i=0 to 2}
                        <option value='{$i}'>{$matchTitles[$i]}</option>
                    {/for}
                {/if}
	        </select>
        {/if}
        <span class="formTitle">Score:</span>
        <input class='formText' type="number" name="score" value='{$score.score}'>
        <input type='submit' class='button formtext' value='{$type}'>
        {if $type == "Edit"}
            <input type='hidden' name='id' value='{$score.id}'>
            <input type='hidden' name='code' value='we'>
        {else}
            <input type='hidden' name='code' value='wa'>
        {/if}
            <input type='hidden' name='shooter_id' value='{$shooter.id}'>
            <input type='hidden' name='series_id' value='{$series_id}'>
            <input type='hidden' name='date' value='{$date}'>

        	<input type='hidden' name='table' value='{$table}'>
            <input type='hidden' name='return_url' value='{$goBack}'>
            <input type='hidden' name='this_url' value='{$current_uri}'>
        {if $table=='scores'}
            {if $shooter.male == "1"}
                <input type='hidden' name='match' value='600'>
            {else}
                <input type='hidden' name='match' value='400'>
            {/if}
        {else}
            <input type='hidden' name='match' value='300'>
        {/if}
    </form>
    {if $table=='scores'}
        {assign "scoreUrl" "pws"}
        {if $shooter.male == "1"}
            {assign "scoreMatch" "60"}
        {else}
            {assign "scoreMatch" "40"}
        {/if}
    {else}
        {assign "scoreUrl" "rws"}
        {assign "scoreMatch" "30"}
    {/if}
    {if $type !='Edit'}
        <form action="dash.php?t={$scoreUrl}" method='post'>
            <input type='hidden' name='shooter_id' value='{$shooter.id}'>
            <input type='hidden' name='series_id' value='{$series_id}'>
            <input type='hidden' name='date' value='{$date}'>
            <input type='hidden' name='match' value='{$scoreMatch}'>
            <input type='hidden' name='return_url' value='{$goBack}'>
            <input class='button scoresheet' type='submit' value='Use Score Sheet'>
        </form>
    {/if}
    <span style='display:block; clear:both; margin-bottom: 20px'></span>
{/block}