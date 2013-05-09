{extends file="../core.tpl"}
{block name=title}Series Administration{/block}
{block name=template}series{/block}
{block name=body}
	<h1>Series Administration</h1>
	{if count($allYears) > 1}
		<p id='Listbox'>
			<span class='listboxTitle'>Pick A Year: </span>
			{foreach from=$allYears item=year}
				{if $year.year == $currentYear}
					<span class='list_letter selected'>{$year.year}</span>
				{else}
					<span class='list_letter'><a href='dash.php?t=e&year={$year.year}#Listbox'>{$year.year}</a></span>
				{/if}
			{/foreach}
		</p>
	{/if}
	<h2>All Series in {$currentYear} <a class='button' href='dash.php?t=ea&backurl={$current_uri}'style="font-size: 0.5em;float: right;margin-top: 2px;">New</a></h2>
	{if $totalPages > 1}
		<p style='text-align:center; font-size: 0.8em;'>Page {$currentPage} out of {$totalPages}</p>
	{/if}
	{if count($allSeries) > 0}
		<table id='seriesTable'>
			<tr>
				<th width='10%'>Series Number</th>
				<th width='25%'>Start Date</th>
				<th width='10%'>Length</th>
				<th width='25%'>Pres Date</th>
				<th width='30%' colspan='2'>Edit / Set Current Series</th>
			</tr>
			{foreach from=$allSeries item=series}
			{assign "date" getSeriesDates($series.date_started, $series.length)}

				<tr>
					<td>{$series.snumber}</td>
					<td>{$date.s}</td>
					<td>{$series.length} Week{if $series.length > 1}s{/if}</td>
					<td>{$date.f}</td>
					<td><a style='color: #07B;' href='dash.php?t=ee&id={$series.id}'>Edit Series</a></td>
					{if $current_series.id != $series.id}
						<td><a style='color: #07B;' href='action.php?code=ec&series_id={$series.id}&return_url={$current_uri}'>Set As Current</a></td>
					{else}
						<td>Current Series</td>
					{/if}

				</tr>
			{/foreach}
		</table>
	{else}
		<p style='margin:10px auto; text-align:center; font-size: 1.8em'>
			Please Create A Series
		</p>
	{/if}
	{if $totalPages > 1}
		<div id="pages">
			{if $currentPage == 1}
				<span class='prev list_page disabled'>Previous</span>
			{else}
				<span class='prev list_page'><a href='dash.php?t=e&year={$currentYear}&page={$currentPage-1}#pages'>Previous</a></span>
			{/if}
			{for $page=1 to $totalPages}
				{if $page == $currentPage}
					<span class='list_page selected'>{$page}</span>
				{else}
					<span class='list_page'><a href='dash.php?t=e&year={$currentYear}&page={$page}#pages'>{$page}</a></span>
				{/if}
			{/for}
			{if $currentPage == $totalPages}
				<span class='next list_page disabled'>Next</span>
			{else}
				<span class='next list_page'><a href='dash.php?t=e&year={$currentYear}&page={$currentPage+1}#pages'>Next</a></span>
			{/if}
		</div>
	{/if}
{/block}