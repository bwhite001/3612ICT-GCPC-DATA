<!DOCTYPE html>
<html>
    <head>
        <title>{block name=title}GCPC Dashboard Print{/block}</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media='all' href="stylesheets/prints/main.css">
        <link rel="stylesheet" type="text/css" media='all' href="stylesheets/prints/{block name=template}main{/block}.css">
        <link rel="stylesheet" type="text/css" media='print' href="stylesheets/print.css">
    </head>
    <body>
        <div class='page'>
            <div class='pageheader'>
                <div class='cube male'>
                    <span class='inside'>&#127942;</span>
                </div>
                <span class='header'>{block name=header}Some Header Text{/block}</span>
                <span class='subheader'>{block name=subheader}Some Sub Header Text{/block}</span>
                <div class='cube female'>
                    <span class='inside'>&#127942;</span>
                </div>
                <span style='display:block; clear:both'></span>
            </div>

            {block name=body}{/block}
        </div>
    </body>
</html>