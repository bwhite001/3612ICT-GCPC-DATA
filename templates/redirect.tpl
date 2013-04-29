<form action='{$redirectUrl}' method='POST' name='quickSubmit'>
	{if $params != ""}
		{foreach from=$params key=name item=value}
			<input type='hidden' name='{$name}' value='{$value}'>
		{/foreach}
	{/if}
</form>
<script language="JavaScript">
	document.quickSubmit.submit();
</script>