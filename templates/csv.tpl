{strip}
	{assign var="newline" value="\n"}
	{foreach from=$headers item=h name=hdr}
	    "{$h|replace:'"':'""'}"
	    {if !$smarty.foreach.hdr.last},{/if}
	{/foreach}
	{$newline}
	{foreach from=$data item=row name=res}
	    {foreach from=$row item=v name=val}
	        "{$v|replace:'"':'""'}"
	        {if !$smarty.foreach.val.last},{/if}
	    {/foreach}
	    {if !$smarty.foreach.res.last}{$newline}{/if}
	{/foreach}
{/strip}