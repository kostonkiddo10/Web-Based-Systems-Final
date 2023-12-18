<html>
    <head>
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="../styles/item_details_style.css">
    </head>
    <body>
        <nav class="navbar">
            <ul>
                <li><a href="./inventory_list.php">Home</a></li>
                <li><a href="./login.php?action=logout">Logout</a></li>
            </ul>
        </nav>
        <h2><?= $item["itemName"]; ?></h2>

        <?= $image; ?>
        <p>Owner: <?= $owner["name"]; ?></p>
        <p>Status: <?= $item["status"]; ?></p>
        <?= $borrower_name; ?>
        <?= $owner_options ?>
        <?= $borrower_options ?>
    </body>
</html>