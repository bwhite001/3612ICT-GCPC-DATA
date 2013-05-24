{assign "currentSeriesYear" date("Y",strtotime($current_series.date_started))}
<h1>Series {$current_series.snumber}, {$currentSeriesYear} Statistics</h1>
<div id="container">
	<h2>Number Of Shooters for This Series</h2>
	<canvas id="graph" width="900" height="300">
		<p>Please use google chrome</p>
	</canvas>
</div>
<table>
	<tr>
		<th rowspan='2'>Week <br/>Number</th>
		<th colspan='3' style='border-left-width: 4px; border-bottom-width: 1px'>Pistol Scores</th>
		<th colspan='3' style='border-left-width: 4px; border-bottom-width: 1px'>Rifle Scores</th>
		<th rowspan='2' style='border-left-width: 4px;'>Weekly Stats</th>
	</tr>
	<tr>
		<th  style='border-top-width: 1px; border-left-width: 4px;'>Wed</th>
		<th style='border-top-width: 1px;' >Fri</th>
		<th style='border-top-width: 1px;' >Total</th>
		<th  style='border-top-width: 1px; border-left-width: 4px;'>Wed</th>
		<th style='border-top-width: 1px;' >Fri</th>
		<th style='border-top-width: 1px;' >Total</th>
	</tr>
	<script type="text/javascript">
		var tooltips = [[],[]];
		var data = [[],[]];
		var labels = [];
	</script>
	{for $w=1 to 8}
		{assign "weekp" getWeekly($current_series, $w, false)}
		{assign "weekr" getWeekly($current_series, $w, true)}
		<tr>
			<td>{$w}</td>
			<td style='border-left-width: 4px;'>{$weekp.wedc}</td>
			<td>{$weekp.fric}</td>
			<td><strong>{$weekp.total}</strong></td>
			<td style='border-left-width: 4px;'>{$weekr.wedc}</td>
			<td>{$weekr.fric}</td>
			<td><strong>{$weekr.total}</strong></td>
			<td style='border-left-width: 4px;'><a href='dash.php?t=tw&week={$w}'>Week {$w}</a></td>
			<script type="text/javascript">
				data[0].push({$weekp.total});
				data[1].push({$weekr.total});
				tooltips[0].push("{$weekp.total} shooter(s)");
				tooltips[1].push("{$weekr.total} shooter(s)");
				labels.push("Week {$w}");
			</script>
		</tr>
	{/for}
		{assign "weekp" getWeeklyTotals($current_series,false)}
		{assign "weekr" getWeeklyTotals($current_series,true)}
		<tr>
			<td><strong>Totals:</strong></td>
			<td style='border-left-width: 4px;'>{$weekp.wedc}</td>
			<td>{$weekp.fric}</td>
			<td><strong>{$weekp.total}</strong></td>
			<td style='border-left-width: 4px;'>{$weekr.wedc}</td>
			<td>{$weekr.fric}</td>
			<td><strong>{$weekr.total}</strong></td>
			<td style='border-left-width: 4px;'><strong>Overall Shooters: {$weekp.total + $weekr.total}</strong></td>
		</tr>
</table>