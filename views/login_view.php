<html>
    <head>
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="../styles/login_style.css">
    </head>
    <body>
        <h2> Photography Club Resource Management System </h2>

        <div class="login-field">
            <form method="post" action=login.php?action=login>
            <fieldset>
                <label for="email">Email </label>
                <input type="text" id="email" name="email" value=""><br>
                <label for="password">Password </label>
                <input type="password" name="password" id="password" value=""><br>
                <hr>
                <input type="submit" value="Login">
            </fieldset>
            </form>
        </div>

        <p><?= $message; ?></p>

        <!-- <a href="./register_member.php">Not a member? Register now!</a> -->
    </body>
</html>