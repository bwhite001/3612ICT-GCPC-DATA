<!DOCTYPE html>
<html>
    <head>
        <title>GCPC Admin Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/login.css">
    </head>
    <body>
        <div id="loginForm">
            <form id="signin_form" action="login.php" method="post">
                <h1>Log in</h1>
                {if $isError}
                <p class="someRandomClassThatWontGetConfusedWithTheOtherClasses">{$error}</p>
                {else if $error != ""}
                <p class="someRandomClassThatWontGetConfusedWithTheOtherClasses Green">{$error}</p>
                {/if}
                <div id="formContent">
                        <span class="entypo login">👤</span>
                        <div class="inputDiv">
                            <input type="text" name="username">
                        </div>
                        <span class="entypo login">🔑</span>
                        <div class="inputDiv">
                            <input type="password" name="password">
                        </div>
                    <div id="buttonDiv">
                        <input type="submit" class='button' value="Sign In">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
