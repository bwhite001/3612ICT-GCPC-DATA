{extends file="../core.tpl"}
{block name=title}Scoring Administration Stats{/block}
{block name=template}statsMain{/block}
{block name=js}
	<link rel="stylesheet" type="text/css" href="stylesheets/dash/{$template}.css">
{/block}
{block name=body}
	<style type="text/css">
		#miniNav li {
			width: 465px;
		}
		#miniNav ul{
			width: 930px;
		}
		#miniNav a {
			width: initial;
		}
	</style>
	<div id='miniNav'>
		<ul>
			<li>
				<a {if $miniNav == e} id='miniNavSelected'{else} href='dash.php?t=ae'{/if}>
					<span class='left'>Series Awards</span>
					<span class='right'>&infin;</span>
				</a>
			</li>
			<li>
				<a {if $miniNav == y} id='miniNavSelected'{else} href='dash.php?t=ay'{/if}>
					<span class='left'>Yearly Awards</span>
					<span class='right'>&#128203;</span>
				</a>
			</li>
		</ul>
	</div>
	<div id='statsContent'>
		{include file="dashboardTabs/awards/$template.tpl"}
	</div>
{/block}