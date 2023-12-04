<html>
    <head>
        <link rel="stylesheet" href="../styles/global.css">
    </head>
    <body>
        <h2><?= $item["itemName"]; ?></h2>

        <?= $image; ?>
        <p>Owner: <?= $owner["name"]; ?></p>
        <p>Status: <?= $item["status"]; ?></p>
        <?= $borrower_name; ?>
    </body>
</html>