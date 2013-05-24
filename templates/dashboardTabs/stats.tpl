{extends file="../core.tpl"}
{block name=title}Scoring Administration Stats{/block}
{block name=template}statsMain{/block}
{block name=js}
	{if $hasJs}
	    <script src="clientscripts/libraries/RGraph.common.core.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.key.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.dynamic.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.effects.js" ></script>
	    <script src="clientscripts/libraries/RGraph.common.tooltips.js" ></script>
	    <script src="clientscripts/libraries/RGraph.bar.js" ></script>
	    <script src="clientscripts/libraries/RGraph.line.js" ></script>
	    <script src="clientscripts/libraries/jquery.min.js" ></script>
		<script src="clientscripts/{$template}.js"></script>
	{/if}

	<link rel="stylesheet" type="text/css" href="stylesheets/dash/{$template}.css">
{/block}
{block name=body}
	<div id='miniNav'>
		<ul>
			<li>
				<a {if $miniNav == s}id='miniNavSelected'{else} href='dash.php?t=ts'{/if}>
					<span class='left'>Shooter Stats</span>
					<span class='right'>&#128101;</span>
				</a>
			</li>
			<li>
				<a {if $miniNav == e}id='miniNavSelected'{else} href='dash.php?t=te'{/if}>
					<span class='left'>Current Series Stats</span>
					<span class='right'>&#128203;</span>
				</a>
			</li>
			<li>
				<a {if $miniNav == y}id='miniNavSelected'{else} href='dash.php?t=ty'{/if}>
					<span class='left'>Yearly Stats</span>
					<span class='right'>&#128197;</span>
				</a>
			</li>
		</ul>
	</div>
	<div id='statsContent'>
		{include file="dashboardTabs/stats/$template.tpl"}
	</div>
{/block}