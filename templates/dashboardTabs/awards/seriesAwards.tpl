{assign "currentSeriesYear" date("Y",strtotime($current_series.date_started))}
<p style='text-align:center;'>Download Rifle CSV: <a style='color: #07B;' href='csv.php?t=e' target='_blank'>Click Here</a></p>
<h1>
<a href="print.php?t=e" class='button back' style='float:left' target="_blank">Print</a>
	Series {$current_series.snumber}, {$currentSeriesYear} Awards

	{if $goBack != ""}
		<a href="{$goBack}" class='button back'>Back</a>
	{/if}
</h1>

<div class='smaller'>
	<h2>Male Point Winners</h2>
	{if count($maleShooters)>0}
		<table class='newTable male'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Points</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			{foreach from=$maleShooters item=score name=s}
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
<div class='smaller'>
	<h2 style='background-color:#B07;'>Female Point Winners</h2>
		{if count($femaleShooters)>0}
		<table class='newTable female'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Points</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			{foreach from=$femaleShooters item=score name=s}
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
<span style='display:block; clear:both'></span>
<h1>Series Top Shots</h1>
<div class='smaller'>
	<h2>Male Top Shots</h2>
	{if count($maleTop)>0}
		<table class='newTable male'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			{foreach from=$maleTop item=score name=s}
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
<div class='smaller'>
	<h2 style='background-color:#B07;'>Female Top Shots</h2>
	{if count($femaleTop)>0}
		<table class='newTable female'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Count</th>
				<th>Max</th>
				<th>Avg</th>
			</tr>
			{foreach from=$femaleTop item=score name=s}
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
<span style='display:block; clear:both'></span>