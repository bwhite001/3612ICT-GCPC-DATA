<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard GCPC Scoring Pannel</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/dash/{$template}.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/dash/{$template}.js"></script>
    </head>
    <body>
        {assign "file" "dashboardTabs/{$template}.tpl"}
        {include file="header.tpl"}
        <div id='wrapper'>
            <div id='content'>
                <div id='navBar'>
                    <ul>
                    {foreach from=$navbar item=$nav}
                        <li>
                            <span class='nav_icon'>{$nav.icon}</span>
                            <span class='nav_text'>{$nav.text}</span>
                        </li>
                    {/foreach}
                    </ul>
                </div>
                <div id='tabContent'>
                    {include file=$file}
                </div>
            </div>
        </div>
        {include file='footer.tpl'}
    </body>
</html>
