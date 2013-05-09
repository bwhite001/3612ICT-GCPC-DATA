<!DOCTYPE html>
<html>
    <head>
        <title>{block name=title}GCPC Dashboard{/block}</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/{block name=template}main{/block}.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="clientscripts/main.js"></script>
        {block name=js}{/block}
    </head>
    <body>
        <div id='wrapper'>
            {include file="header.tpl"}
            <div id='content'>
                {if $error_string != ""}
                    <p class='errorSting {$error_is_good}'>{$error_string}</p>
                {/if}
                <div id='tabContent'>
                    {block name=body}<h1>Main Body</h1>{/block}
                </div>
            </div>
            {include file='footer.tpl'}
        </div>
    </body>
</html>
