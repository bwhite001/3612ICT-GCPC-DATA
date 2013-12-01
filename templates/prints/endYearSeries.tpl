<h1 class='second'>Series Summary</h1>
{foreach from=$aggArray item=series}
	{assign "seriesNum" $series.num}
	{assign "maleAgg" $series.maleAgg}
	{assign "femaleAgg" $series.femaleAgg}
	<h3 class='series-title'>Series {$seriesNum}</h3>
	<div class='block male'>
		<h2>Male Winners</h2>
		{if count($maleAgg)>0}
			<table>
				<tr>
					<th>Pos</th>
					<th>Name</th>
					<th>Points</th>
					<th>Count</th>
					<th>Max</th>
					<th>Avg</th>
				</tr>
				{foreach from=$maleAgg item=score name=s}
					{assign "shooter" getShooter($score.shooter_id)}
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
						<td>{$score.avg}</td>
					</tr>
				{/foreach}
			</table>
	{else}
		<p style='text-align:center'>No Shooters Entered This Series</p>
	{/if}
	</div>
	<div class='block female'>
		<h2>Female Winners</h2>
		{if count($femaleAgg)>0}
		<table>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Points</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			{foreach from=$femaleAgg item=score name=s}
				{assign "shooter" getShooter($score.shooter_id)}
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
					<td>{$score.avg}</td>
				</tr>
			{/foreach}
		</table>
	{else}
		<p style='text-align:center'>No Shooters Entered This Series</p>
	{/if}
	</div>
<span style='clear:both; display:block; margin-bottom: 5mm'></span>
{/foreach}