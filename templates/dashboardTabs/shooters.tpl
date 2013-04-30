{extends file="../core.tpl"}
{block name=title}Shooters Administration{/block}
{block name=template}shooter{/block}
{block name=body}
	<h1>Shooters Administration</h1>
	<p style='text-align: center;'>Add New Shooter: <a href='dash.php?t=sa' class='button' id='newshooter'>&#59136;</a>
	<form action='dash.php?t=s' method='get' id='searchShooters'>
		<span id='searchText'>&#128269;</span>
		<input type='text' name='query' id="searchTextbox" value='{$query}'/>

		<input class='button search' type='submit' value='Search' /> 
		<a class='button search clear' href='dash.php?t=s'>Clear</a>
	</form>
	{if $query != ""}
		{assign "q" "&query={$query}&"}
		<h2>Current Shooters that match '{$query}'</h2>
	{else}
		{assign "q" "&letter={$currentLetter}&"}
		<h2>Current Shooters</h2>
		<span id='letterText'>Search By Last Name:</span>
		<p id='Listbox'>
			{for $a=65 to 90}
			{assign "l" chr($a)}
				{if $shooterLetters[$l] <= 0}
					<span class='list_letter disabled'><span style='margin: 6px 0;display: block;'>{$l}</span></span>
				{else if $l == $currentLetter}
					<span class='list_letter selected'><span style='margin: 6px 0;display: block;'>{$l}</span></span>
				{else}
					<span class='list_letter'><a href='dash.php?t=s&letter={$l}'>{$l}</a></span>
				{/if}
			{/for}
		</p>
		<span style='display:block; clear:both'></span>
		<h3>All Shooters with the last name Starting With {$currentLetter}</h3>
		{if $totalPages > 1}
			<p style='text-align:center;'>Page {$currentPage} out of {$totalPages}</p>
			<div id="pages">
				<p style='margin:0px auto;float: right;'>
					{if $currentPage == 1}
						<span class='prev list_letter disabled'><span style='margin: 6px 0;display: block;'>Previous</span></span>
					{else}
						<span class='prev list_letter'><a href='dash.php?t=s{$q}page={$currentPage-1}'>Previous</a></span>
					{/if}
					{for $page=1 to $totalPages}
						{if $page == $currentPage}
							<span class='list_letter selected'><span style='margin: 6px 0;display: block;'>{$page}</span></span>
						{else}
							<span class='list_letter'><a href='dash.php?t=s{$q}page={$page}'>{$page}</a></span>
						{/if}
					{/for}
					{if $currentPage == $totalPages}
						<span class='next list_letter disabled'><span style='margin: 6px 0;display: block;'>Next</span></span>
					{else}
						<span class='next list_letter'><a href='dash.php?t=s{$q}page={$currentPage+1}'>Next</a></span>
					{/if}
				</p>
			</div>
		{/if}
	{/if}
	{if count($shooters) > 0}
		<table id='shooterTable'>
			<tr>
				<th width='50%'>Name</th>
				<th width='10%'>M/F</th>
				<th width='10%'>Grade</th>
				<th width='10%'>Junior</th>
				<th width='20%' colspan='2'>Edit and View Stats</th>
			</tr>
			{foreach from=$shooters item=shooter}
				<tr>
					<td>{$shooter.lastname}, {$shooter.firstname}</td>
					<td>{if $shooter.male}Male{else}Female{/if}</td>
					<td>{if $shooter.grade == 0}D{else if $shooter.grade == 1}C{else if $shooter.grade == 2}B{else if $shooter.grade == 3}A{else if $shooter.grade == 4}Master{/if}</td>
					<td>{if $shooter.senior}False{else}True{/if}</td>
					<td><a href="">Edit</a></td>
					<td><a href=''>Stats</a></td>
				</tr>
			{/foreach}
		</table>
	{else}
		<p style='margin:10px auto; text-align:center; font-size: 1.8em'>
			No Results Returned
		</p>
	{/if}
{/block}