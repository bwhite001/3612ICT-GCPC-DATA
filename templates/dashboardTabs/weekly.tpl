{extends file="../core.tpl"}
{block name=title}{$type} Scoring Administration{/block}
{block name=template}weeklyScores{/block}
{block name=body}
	{assign "cleanDate" date("D jS M",$weekDate)}

	<h1>Weekly Scoring For {$cleanDate}</h1>
	<div id='topSeachBox' style='height: 60px'>
		<div id='searchMain'>
			<span id='magGlass'>&#128269;</span>
			<input type='text' id='searchBox'>
		</div>
		<div id='listResults'>
			<p id="searchResultsText">Search For Shooters</p>
			<ul id='searchResults'>
			</ul>
		</div>
	</div>
	<h2>Current Scores</h2>
	{if count($scores) > 0}
	{else}
	<p style="text-align: center;font-size: 23px;">There Are No Scores for Today<p>
	{/if}
{/block}