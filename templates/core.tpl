<!DOCTYPE html>
<html>
    <head>
        <title>{block name=title}GCPC Dashboard{/block}</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/{block name=template}main{/block}.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/dash/{block name=template}main{/block}.js"></script>
    </head>
    <body>
        <div id='wrapper'>
            {include file="header.tpl"}
            <div id='content'>
                <div id='tabContent'>
                    {block name=body}<h1>Main Body</h1>{/block}
                </div>
            </div>
            {include file='footer.tpl'}
        </div>
    </body>
</html>
