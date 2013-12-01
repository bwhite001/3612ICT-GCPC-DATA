{extends file="../core.tpl"}
{block name=title}Pistol Scoring Administration{/block}
{block name=template}week{/block}
{block name=body}
	{assign "currentYear" date("Y",strtotime($current_series.date_started))}
	<h1>Pistol Scoring Administration</h1>
	<h2>Current <em>Pistol</em> Weeks for Series {$current_series.snumber} - {$currentYear}</h2>
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
		{for $w=1 to $current_series.length}
			{assign "week" getWeekly($current_series, $w, false)}
			<tr>
				<td>{$w}</td>
				<td><a href='dash.php?t=pw&week={$w}&day=w'>{$week.wed}</a></td>
				<td><strong>{$week.wedc}</strong></td>
				<td><a href='dash.php?t=pw&week={$w}&day=f'>{$week.fri}</a></td>
				<td><strong>{$week.fric}</strong></td>
				<td><strong>{$week.total}</strong></td>
				<td><a href='dash.php?t=tw&week={$w}&backurl={$current_uri}'>Weekly Stats</a></td>
			</tr>
		{/for}
			{assign "celb" getWeekly($current_series, $current_series.length+1, false)}
			<tr>
				<td>-</td>
				<td>Presentation Night <br/> <em>{$celb.wed}</em></td>
				<td><strong>N/A</strong></td>
				<td><a href='dash.php?t=pw&week=9&day=f'>{$celb.fri}</a></td>
				<td><strong>{$celb.fric}</strong></td>
				<td><strong>N/A</strong></td>
				<td>
					<a href='dash.php?t=tw&week={$w}&backurl={$current_uri}'>Weekly Stats</a>
					<br/><br/>
					<a href='dash.php?t=ae&backurl={$current_uri}'>Series Awards</a>
				</td>

			</tr>
	</table>
{/block}