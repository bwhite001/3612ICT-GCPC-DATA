{extends file="../../core.tpl"}
{block name=title}Pistol Scoring Administration{/block}
{block name=template}scoresheet{/block}
{block name=js}<script src="clientscripts/scoresheet.js"></script>{/block}
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
	<h1>
		<a class='back button edit' style='float:left' href="dash.php?t=se&id={$shooter.id}&backurl={$urri}">Edit Shooter</a>
		{$type} Scoresheet - {$shooter.firstname} {$shooter.lastname}
			{if $table == 'scores'}
				| {$match} Shot Match
			{/if}
		<a class='back button' href="{$goBack}">Cancel</a>
	</h1>
	<form action='action.php' method='post' id='scoresheetForm' onSubmit='return {if $table=='scores'}checkScores(){else}checkRifleScores(){/if}'>
		<div id='hcap'>
			{if $table=='scores'}
				<span class="formTitle">Handicap:</span>
		        <input class='formText' id='handicaptxt' type="number" name="handicap" old='{$score.handicap}' value='{$score.handicap}'>
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
		</div>
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
        <span style='display:block; clear:both; margin-bottom: 20px'></span>
       	<table>
	    	<tr>
	    		{if $table=='scores'}
		    		<th>Card</th>
		    	{else}
		    		<th>Shots</th>
		    	{/if}
	    		<th>1<sup>st</sup> Shot</th>
	    		<th>2<sup>nd</sup> Shot</th>
	    		<th>3<sup>rd</sup> Shot</th>
	    		<th>4<sup>th</sup> Shot</th>
	    		<th>5<sup>th</sup> Shot</th>
	    		<th>5 Shot Total</th>
	    		<th>10 Shot Total</th>
	    	</tr>
	    	{for $shot=1 to $match/5}
		    	<tr>
		    		{if $table=='scores'}
		    			<td>{$shot}</td>
		    		{else}
		    			<td>{($shot-1)*5}</td>
		    		{/if}
		    		<td class='inputInside'><input class='formText table row{$shot}' id='tableText{($shot-1)*5+0}' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row{$shot}' id='tableText{($shot-1)*5+1}' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row{$shot}' id='tableText{($shot-1)*5+2}' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row{$shot}' id='tableText{($shot-1)*5+3}' type='number' value='0'></td>
		    		<td class='inputInside'><input class='formText table row{$shot}' id='tableText{($shot-1)*5+4}' type='number' value='0'></td>
		    		<td class='inputInside' id='rowTotal{$shot}'>0</td>
		    		{if $shot%2 == 1}
		    			<td class='inputInside dTotal' rowspan='2' id='doubleTotal{$shot}'>0</td>
		    		{/if}
		    	</tr>
	    	{/for}
	    	<tr>
	    		<td colspan='7' style='text-align:right'>Total Score:</td>
	    		<td class='inputInside' id='overTotalDisplay'>0</td>
	    	</tr>
	    	<input id='overallTotal' name='score' type='hidden' value='0'>
    </table>
    <input class='button' style="display: block;margin: auto;" type='submit' value='Submit'>
    </form>
    <script type="text/javascript">
    	var shots = {$match};
    </script>
    <span style='display:block; clear:both; margin-bottom: 20px'></span>
{/block}