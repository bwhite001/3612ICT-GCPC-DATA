{extends file="../core.tpl"}
{block name=title}Rifle Scoring Administration{/block}
{block name=template}week{/block}
{block name=body}
	<style type="text/css">
		#content h1 {
			background-color: #090;
		}
		#content h2 {
			background-color: #0C0;
		}
		#content a {
			color: #090;
		}
		#currentSeries {
			background-color: #5F7;
			border: solid 1px #0F3;
			color: #000;
		}
	</style>
	{assign "currentYear" date("Y",strtotime($current_series.date_started))}
	<h1 class='rifle h1'>Rifle Scoring Administration</h1>
	<h2 class='rifle h2'>Current <em>Rifle</em> Weeks for Series {$current_series.snumber} - {$currentYear}</h2>
	<table>
		<tr>
			<th width='5%'>Week <br/>Number</th>
			<th width='25%'>Wednesday</th>
			<th width='5%'>Day <br/>Count</th>
			<th width='25%'>Friday</th>
			<th width='5%'>Day <br/>Count</th>
			<th width='5%'>Weekly <br/>Total</th>
			<th width='30%'>Stats</th>
		</tr>
		{for $w=1 to 8}
			{assign "week" getWeekly($current_series, $w, true)}
			<tr>
				<td>{$w}</td>
				<td><a href='dash.php?t=pw&week={$w}&day=w'>{$week.wed}</a></td>
				<td><strong>{$week.wedc}</strong></td>
				<td><a href='dash.php?t=pw&week={$w}&day=f'>{$week.fri}</a></td>
				<td><strong>{$week.fric}</strong></td>
				<td><strong>{$week.total}</strong></td>
				<td>
					<a href=''>Winners</a> <br/> 
					<a href=''>Overall</a>
				</td>
			</tr>
		{/for}
			{assign "celb" getWeekly($current_series, 9, true)}
			<tr>
				<td>-</td>
				<td>Presentation Night <br/> <em>{$celb.wed}</em></td>
				<td><strong>N/A</strong></td>
				<td><a href='dash.php?t=pw&week=9&day=f'>{$celb.fri}</a></td>
				<td><strong>{$celb.fric}</strong></td>
				<td><strong>N/A</strong></td>
				<td>
					<a href=''>Winners</a> <br/> 
					<a href=''>Overall</a>
				</td>
			</tr>
	</table>
{/block}