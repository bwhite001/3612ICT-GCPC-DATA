<div id='headerStyle'>
	<div id="headerbar">
		<div id="users"><span id="currentUser">{$currentUser.name}</span> | <a style='color:#07B' href="login.php?t=1">Logout</a></div>
		<h1>Control Panel</h1>
		<h2>Air Pistol Admin Panel v2.0</h2>
	</div>
</div>
<div id='navBar'>
    <ul>
    {foreach from=$navbar item=nav}
        {if $nav.selected == 1}
        <li class='nav_item selected'>
        {else}
        <li class='nav_item'>
        {/if}
            <a href='dash.php?t={$nav.uri}'>
                <span class='nav_icon'>{$nav.icon}</span>
                <span class='nav_text'>{$nav.text}</span>
            </a>
        </li>
    {/foreach}
    </ul>
</div>
<div id='currentSeries'>
    {if count($all_series) > 0}
    {assign "currentSeriesYear" date("Y",strtotime($current_series.date_started))}
    <p>Current Series: Series {$current_series.snumber}, {$currentSeriesYear}</p>
    <span id="changeSeriesHolder">
        <span id="changeSeriesHolderLabel">Change:</span>
        <form action='action.php?code=ec' method='post'>
            <select id="changeSeries" name='series_id'>
                {foreach from=$all_series item=series}
                    {if $series.id != $current_series.id}
                        {assign "thisYear" date("Y",strtotime($series.date_started))}
                        <option value="{$series.id}">Series {$series.snumber}, {$thisYear}</option>
                    {/if}
                {/foreach}
            </select>
            <input type='hidden' name='return_url' value='{$current_uri}'>
            <input type='submit' value='Update' class='button series'>
        </form>
    </span>
    <span style='clear:both'></span>
    {else}
    <p style='float:none; text-align:center'>
        Please Create a Series
    </p>
    {/if}
</div>