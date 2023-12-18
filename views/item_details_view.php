<html>
    <head>
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="../styles/item_details_style.css">
    </head>
    <body>
        <nav class="navbar">
            <ul class="unorderedList">
                <li class="listItem"><a href="./inventory_list.php">Home</a></li>
                <li class="listItem"><a href="./login.php?action=logout">Logout</a></li>
            </ul>
        </nav>
        <h2><?= $item["itemName"]; ?></h2>

        <?= $image; ?>
        <p>Owner: <?= $owner["name"]; ?></p>
        <p>Status: <?= $item["status"]; ?></p>
        <?= $borrower_name; ?>
        <?= $owner_options ?>
        <?= $owner_delete ?>
        <?= $borrower_options ?>
    </body>
</html>