{extends file="../core.tpl"}
{block name=title}{$type} Scoring Administration{/block}
{block name=template}weeklyScores{/block}
{block name=js}<script src="clientscripts/weekly.js"></script>{/block}
{block name=body}
	{if $type == "Rifle"}
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
	{assign "cleanDate" date("D jS M",$weekDate)}
	{assign "checkDate" date("Y-m-d",$weekDate)}
	<h1><em>{$type}</em> Weekly Scoring For {$cleanDate} <a class='button' href='dash.php?t={$thisUrl}'style="font-size: 0.5em;float: right;margin-top: 2px;">Cancel</a></h1>


	<div id='topSeachBox' style='height: 60px'>
		<div id='searchMain'>
			<span id='magGlass'>&#128269;</span>
			{if $type == "Pistol"}
				<input type='text' id='searchBox' onKeyup="search('pwa','{$current_uri}', '{$checkDate}', '{$current_series.id}')">
			{else}
				<input type='text' id='searchBox' onKeyup="search('rwa','{$current_uri}', '{$checkDate}', '{$current_series.id}')">
			{/if}
		</div>
		<div id='listResults'>
			<p id="searchResultsText">Search For Shooters</p>
			<ul id='searchResults'>
			</ul>
		</div>
	</div>
	<h2>Current Scores</h2>
	{if count($scores) > 0}
		<table>
			<tr>
				<th width='40%'>Name</th>
				<th width='10%'>Score</th>
				{if $type == "Pistol"}
					<th width='10%'>Handicap</th>
				{else}
					<th width='30%'>Match Type</th>
				{/if}
				<th colspan='2' width='30%'>Edit / Delete</th>
			</tr>
			{foreach from=$scores item=score}
				{if $type == "Pistol"}
					{if $score.handicap < 0}
						{assign "sString" "(Supported)"}
						{assign "hcap" "N/A"}
					{else}
						{assign "hcap" $score.handicap}

						{assign "sString" ""}
					{/if}
				{else}
					{assign "hcap" $score.match}
				{/if}
				<tr>
					<td>{$score.name} {$sString} 
						{if $score.male == '1'}
							<span class='gender male'>Male</span>
						{else}
							<span class='gender female'>Female</span>
						{/if}
					</td>
					<td>{$score.score}</td>
					{if $type == "Pistol"}
						<td>{$hcap}</td>
					{else}
						<td>{$matchTitles[$hcap]}</td>
					{/if}
					<td><a class='button edit'>Edit</a></td>
					<td><a class='button delete'>Delete</a></td>

				</tr>
			{/foreach}
		</table>
	{else}
	<p style="text-align: center;font-size: 23px;">There Are No Scores for Today<p>
	{/if}
{/block}