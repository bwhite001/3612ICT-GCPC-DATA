<!DOCTYPE html>
<html>
    <head>
        <title>Care Group</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style/main.css">
        <link rel="stylesheet" type="text/css" href="style/content/{$template}.css">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="scripts/external/flexslide/jquery.flexslider.js"></script>
        <script src="scripts/main.js"></script>
    </head>
    <body>
        <form id="signin_form" action="user_sessions" method="post">
            <h1>Log-in</h1>
            <p class="someRandomClassThatWontGetConfusedWithTheOtherClasses"></p>
            <div id="formContent">
                <label class="input">
                    <span class="entypo">👤</span>
                    <div class="inputDiv">
                        <input type="text" name="username">
                    </div>
                </label>
                <label class="input">
                    <span class="entypo">🔑</span>
                    <div class="inputDiv">
                        <input type="password" name="password">
                    </div>
                </label>
                <div id="buttonDiv">
                    <input type="submit" value="Sign In">
                </div>
            </div>
        </form>
    </body>
</html>
