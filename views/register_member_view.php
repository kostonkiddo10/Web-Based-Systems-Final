<head>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/register_member_style.css">
</head>
<body>
    <h2> Photography Club Resource Management System </h2>
    <form method="post" action=register_member.php?action=add>
    <fieldset>
        <legend>Registration</legend>

        <div class="input-form first_name">
            <label class="input-label" for="first_name">First Name: </label>
            <input type="text" name="first_name"></input>
        </div>

        <div class="input-form last_name">
            <label class="input-label" for="last_name">Last Name: </label>
            <input type="text" name="last_name"></input>
        </div>

        <div class="input-form email">
            <label class="input-label" for="email">Email: </label>
            <input type="text" name="email"></input>
        </div>

        <div class="input-form password">
            <label class="input-label" for="passwrd">Password: </label>
            <input type="text" name="passwrd"></input>
        </div>

        <input class="submit-button" type="submit" value="Add">
    </fieldset>
    </form>

    <p><?= $message; ?></p>

    <a href="./login.php">Main</a>
</body>