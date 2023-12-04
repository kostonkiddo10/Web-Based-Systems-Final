<html>
    <body>
        <h2><?= $item["itemName"]; ?></h2>

        <?= $image; ?>
        <p>Owner: <?= $owner["name"]; ?></p>
        <p>Status: <?= $item["status"]; ?></p>
        <?= $borrower_name; ?>
    </body>
</html>