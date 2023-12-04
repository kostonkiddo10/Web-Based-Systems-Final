<html>
    <body>
        <h2> Photography Club Resource Management System </h2>

        <form method="post" action=login.php?action=login>
        <fieldset>
            <label for="email">Email </label>
            <input type="text" id="email" name="email" value="" size="64"><br>
            <label for="password">Password </label>
            <input type="password" name="password" value=""><br>
            <hr>
            <input type="submit" value="Login">
        </fieldset>
        </form>

        <p><?= $message; ?></p>

        <!-- <a href="./register_member.php">Not a member? Register now!</a> -->
    </body>
</html>