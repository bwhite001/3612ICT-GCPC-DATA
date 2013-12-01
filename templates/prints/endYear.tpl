{extends file="../print.tpl"}
{block name=title}Pistol Scoring Administration{/block}
{block name=template}yearly{/block}
{block name=header}End Of Series Presentation{/block}
{block name=subheader}{$header}{/block}
{block name=body}
	<style type="text/css">
		.value {
			margin: 8px inherit !important;
		}
		.title {
			margin: 8px 10px !important;
		}
		h2 {
			font-size: 1.3em;
		}
	</style>

	<h1>Yearly Stats</h1>
	<span class='title'>Total Competitors</span>
	<span class='value'>{$stats.total} - ({$stats.prb[0]} Pistol, {$stats.prb[1]} Rifle and {$stats.prb[2]} Both)</span>
	<span class='title'>Pistol Compertors</span>
	<span class='value'>{$stats.mfj[0]} Males, {$stats.mfj[1]} Females, and {$stats.mfj[2]} Juniors</span>
	<span class='title'>Total Matches</span>
	<span class='value'>{$stats.matches[0] + $stats.matches[1]} ({$stats.matches[0]} Pistol and {$stats.matches[1]} Rifle)</span>
	<span class='title'>Total Cards Scored</span>
	<span class='value'>{$stats.cards[0] + $stats.cards[1]} ({$stats.cards[0]} Pistol and {$stats.cards[1]} Rifle)</span>
	<span class='title'>Total Shots Fired</span>
	<span class='value'>{$stats.shots[0] + $stats.shots[1]} ({$stats.shots[0]} Pistol and {$stats.shots[1]} Rifle)</span>
	<span style='clear:both; display:block;'></span>

	{include file='prints/endYearSeries.tpl'}
</div>
<div class='page' style='clear:both; padding-top: 10mm'>
    <div class='pageheader'>
        <div class='cube male'>
            <span class='inside'>&#127942;</span>
        </div>
        <span class='header'>Weekly Stats Series {$series.snumber} | Page 2</span>
        <span class='subheader'>{$header}</span>
        <div class='cube female'>
            <span class='inside'>&#127942;</span>
        </div>
        <span style='display:block; clear:both'></span>
    </div>
	<h1>Yearly Point Winners</h1>
	{foreach from=$aggAll item=vals}
		{assign "cssValue" $vals.css}
		{assign "title" $vals.title}
		{assign "shooters" $vals.results}
		<div class='block {$cssValue}'>
			<h2>{$title} Winners</h2>
			{if count($shooters)>0}
				<table>
					<tr>
						<th>Pos</th>
						<th>Name</th>
						<th>Points</th>
						<th>Count</th>
						<th>Max</th>
						<th>Date</th>
						<th>Avg</th>
					</tr>
					{foreach from=$shooters item=score name=s}
						{assign "shooter" getShooter($score.shooter_id)}
						{assign "cleanDate" date("jS M",$score.date)}
						<tr {cycle values=" ,class='newColor'"}>
							{if $smarty.foreach.s.index == 0}
								<td>1<sup>st</sup></td>
							{else if $smarty.foreach.s.index == 1}
								<td>2<sup>nd</sup></td>
							{else if $smarty.foreach.s.index == 2}
								<td>3<sup>rd</sup></td>
							{else}
								<td>-</td>
							{/if}
							<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
							<td>{$score.points}</td>
							<td>{$score.count}</td>
							<td>{$score.score}</td>
							<td><span style='font-size:0.8em'>{$cleanDate}</span></td>
							<td>{$score.avg}</td>
						</tr>
					{/foreach}
				</table>
		{else}
			<p style='text-align:center'>No Shooters Entered This Series</p>
		{/if}
		</div>
	{/foreach}
	<span style='display:block; clear:both'></span>
	<h1 class='second'>Yearly Overall</h1>
	{foreach from=$yearOverall item=vals}
		{assign "cssValue" $vals.css}
		{assign "title" $vals.title}
		{assign "shooters" $vals.results}
		<div class='block {$cssValue}'>
			<h2>{$title} Winners</h2>
			{if count($shooters)>0}
				<table>
					<tr>
						<th>Name</th>
						<th>Count</th>
						<th>Max</th>
						<th>Date</th>
						<th>Avg</th>
					</tr>
					{foreach from=$shooters item=score name=s}
						{assign "shooter" getShooter($score.shooter_id)}
						{assign "cleanDate" date("jS M",$score.date)}
						<tr {cycle values=" ,class='newColor'"}>
							<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
							<td>{$score.count}</td>
							<td>{$score.score}</td>
							<td><span style='font-size:0.8em'>{$cleanDate}</span></td>
							<td>{$score.avg}</td>
						</tr>
					{/foreach}
				</table>
		{else}
			<p style='text-align:center'>No Shooters Entered This Series</p>
		{/if}
		</div>
	{/foreach}
{/block}