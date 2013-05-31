<h1>
	{if count($femaleShooters) > 0 && count($maleShooters) > 0}
		<a href="print.php?t=w&week={$weekNumber}" class='button back' style='float:left' target="_blank">Print</a>
	{/if}
	{$header} 
	<a href="{$goBack}" class='button back'>Back</a>
</h1>
<div class='smaller'>
	{if count($maleShooters)>0}
		<h2>Male Winners</h2>
		<canvas id="mgraph" class='graphCanvas'>
			<p>Please use google chrome</p>
		</canvas>
		<script type="text/javascript">
			var mdata = [];
			var mlabels = [];
		</script>
		<table class='newTable male'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Score</th>
				<th>Hcap</th>
				<th>Total</th>
				<th>STotal</th>
			</tr>
			{foreach from=$maleShooters item=score}
				{assign "shooter" getShooter($score.shooter_id)}
				<tr {cycle values=" ,class='newColor'"}>
					{if $score.points == 3}
						<td>1<sup>st</sup></td>
					{else if $score.points == 2}
						<td>2<sup>nd</sup></td>
					{else if $score.points == 1}
						<td>3<sup>rd</sup></td>
					{else}
						<td>-</td>
					{/if}
					<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
					<td>{$score.score}</td>
					<td>{$score.handicap}</td>
					<td>
						{if $score.total <= 600}
							{$score.total}
						{else}
							<span style='color:red'>{$score.total}</span>
						{/if}
					</td>
					<td>{$score.stotal}</td>
					<script type="text/javascript">
						mdata.push({$score.score});
						mlabels.push("{$shooter.firstname}");
					</script>
				</tr>
			{/foreach}
		</table>
		{else}
		<p style='text-align:center'>No Male Shooters Shot this Week</p>
	{/if}
	</div>
<div class='smaller'>
	{if count($femaleShooters) > 0}
		<h2 style='background-color:#B07;'>Female Winners</h2>
		<canvas id="fgraph" class='graphCanvas'>
			<p>Please use google chrome</p>
		</canvas>
		<script type="text/javascript">
			var fdata = [];
			var flabels = [];
		</script>
		<table class='newTable female'>
			<tr>
				<th>Pos</th>
				<th>Name</th>
				<th>Score</th>
				<th>Hcap</th>
				<th>Total</th>
				<th>STotal</th>
			</tr>
			{foreach from=$femaleShooters item=score}
				{assign "shooter" getShooter($score.shooter_id)}
				<tr {cycle values=" class='',class='newColor'"}>
					{if $score.points == 3}
						<td>1<sup>st</sup></td>
					{else if $score.points == 2}
						<td>2<sup>nd</sup></td>
					{else if $score.points == 1}
						<td>3<sup>rd</sup></td>
					{else}
						<td>-</td>
					{/if}
					<td><span style='font-size:0.8em'>{$shooter.firstname} {$shooter.lastname}</span></td>
					<td>{$score.score}</td>
					<td>{$score.handicap}</td>
					<td>
						{if $score.total <= 400}
							{$score.total}
						{else}
							<span style='color:red'>{$score.total}</span>
						{/if}
					</td>
					<td>{$score.stotal}</td>
					<script type="text/javascript">
						fdata.push({$score.score});
						flabels.push("{$shooter.firstname}");
					</script>
				</tr>
			{/foreach}
		</table>
	{else}
		<p style='text-align:center'>No Female Shooters Shot this Week</p>
	{/if}
</div>

<span style='display:block; clear:both;'></span>