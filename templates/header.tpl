<div id='headerStyle'>
	<div id="headerbar">
		<div id="users"><span id="currentUser">Vicki J White</span> | <a href="">Logout</a></div>
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
            <a href='dash.php'>
                <span class='nav_icon'>{$nav.icon}</span>
                <span class='nav_text'>{$nav.text}</span>
            </a>
        </li>
    {/foreach}
    </ul>
</div>
<div id='currentSeries'>
    <p>Current Series: 2, 2013</p>
    <span id="changeSeriesHolder">
        Change:
        <select id="changeSeries">
                    <option value="1">1, 2013</option>
        </select>
        <a class='button'>Update</a>
    </span>
    <span style='clear:both'></span>
</div>